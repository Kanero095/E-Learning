<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        Fortify::authenticateUsing(function (Request $request) {
            $login = trim($request->email ?? '');
            $password = $request->password;

            if ($login === '' || empty($password)) {
                return null;
            }

            $user = null;

            // 1. Jika input adalah format Email (mengandung '@')
            if (filter_var($login, FILTER_VALIDATE_EMAIL) || str_contains($login, '@')) {
                $user = User::where('email', strtolower($login))->first();
            }
            // 2. Jika input adalah digit angka (NIS atau NUPTK)
            elseif (ctype_digit($login)) {
                // Cek langsung pada tabel User (kolom nis atau nuptk bertipe string)
                $user = User::where('nis', $login)
                    ->orWhere('nuptk', $login)
                    ->first();

                // Jika belum ditemukan dan digit >= 12 (NUPTK biasanya 16-18 digit), cek tabel Guru
                if (!$user && strlen($login) >= 12) {
                    $guru = \App\Models\guru::where('nuptk', $login)->first();
                    if ($guru) {
                        $user = User::where('email', $guru->email)->first();
                    }
                }

                // Jika belum ditemukan dan nilai angka masuk range 32-bit integer (NIS), cek tabel Siswa
                if (!$user && strlen($login) <= 10 && (float)$login <= 2147483647) {
                    $siswa = \App\Models\siswa::where('nis', (int)$login)->first();
                    if ($siswa) {
                        $user = User::where('email', $siswa->email)->first();
                    }
                }
            }
            // 3. Jika input bukan email dan bukan murni angka
            else {
                $user = User::where('email', $login)
                    ->orWhere('nis', $login)
                    ->orWhere('nuptk', $login)
                    ->first();
            }

            // 4. Verifikasi kecocokan password jika user ditemukan
            if ($user && Hash::check($password, $user->password)) {
                return $user;
            }

            return null;
        });


        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())) . '|' . $request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
