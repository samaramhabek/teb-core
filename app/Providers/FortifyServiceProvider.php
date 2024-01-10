<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $request = request();
        if ($request->is('admin') || $request->is('admin/*')) {
            Config::set('fortify.guard', 'admin');
            Config::set('fortify.prefix', 'admin');
        }

        if ($request->is('doctor') || $request->is('doctor/*')) {
            Config::set('fortify.guard', 'doctor');
            Config::set('fortify.prefix', 'doctor');
        }

        $this->app->instance(LoginResponse::class, new class implements LoginResponse {
            public function toResponse($request)
            {
                if ($request->user('admin')) {
                    return redirect()->intended('/admin');
                }
               elseif($request->user('doctor')){
                return redirect()->intended('/doctors');
                }
                else {
                    return redirect()->intended('/dashboard');
                }
            }
        });

        $this->app->instance(LogoutResponse::class, new class implements LogoutResponse {
            public function toResponse($request)
            {
                //dd($request);
                if ($request->is('admin') || $request->is('admin/*')) {
                    return redirect('/admin/login');
                }elseif($request->is('doctor') || $request->is('doctor/*')){
                    return redirect('/doctor/login');
                }
                 else {
                    return redirect('admin/login');
                }

            }
        });
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

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        $request = request();

        if ($request->is('admin') || $request->is('admin/*')) {
            Fortify::loginView(function () {
                return view('backend.auth.login');
            });
        }
       elseif ($request->is('doctor') || $request->is('doctor/*')) {
            Fortify::loginView(function () {
                return view('backend.auth.loginnew');
            });
        }else{
            Fortify::loginView(function () {
                return view('auth.login');
            });
        }
    }
}
