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
            $login = $request->email; // Field name pada form login (bisa berisi Email, NIS, atau NUPTK)
            $password = $request->password;

            $user = null;

            // 1. Cek langsung di tabel User berdasarkan Email, NIS, atau NUPTK
            $user = User::where('email', $login)
                ->orWhere('nis', $login)
                ->orWhere('nuptk', $login)
                ->first();

            // 2. Jika belum ditemukan, periksa relasi ke tabel Siswa berdasarkan NIS
            if (!$user) {
                $siswa = \App\Models\siswa::where('nis', $login)->first();
                if ($siswa) {
                    $user = User::where('email', $siswa->email)->first();
                }
            }

            // 3. Jika belum ditemukan, periksa relasi ke tabel Guru berdasarkan NUPTK
            if (!$user) {
                $guru = \App\Models\guru::where('nuptk', $login)->first();
                if ($guru) {
                    $user = User::where('email', $guru->email)->first();
                }
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
