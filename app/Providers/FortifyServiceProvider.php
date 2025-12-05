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
            $login = $request->email; // tetap pakai name="email" di form
            $password = $request->password;

            // $user = User::where('email', $login)
            //     ->orWhere('nis', $login)
            //     ->orWhere('nupt', $login)
            //     ->first();

            if(User::where('email', $login)->exists()){
                $user = User::where('email', $login)->first();
            } elseif (User::where('nis', $login)->exists()){
                $emailSiswa = User::where('nis', $login)->firstOrFail();
                $user = User::where('email', $emailSiswa->email)->first();
            } elseif (User::where('nuptk', $login)->exists()){
                $emailGuru = User::where('nuptk', $login)->firstOrFail();
                $user = User::where('email', $emailGuru->email)->first();
            }

            if ($user && Hash::check($password, $user->password)) {
                return $user;
            }
            dd($user);
            // return null;
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
