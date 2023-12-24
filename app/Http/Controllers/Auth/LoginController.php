<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use Illuminate\Validation\ValidationException;
use App\Models\Doctor;
use Illuminate\Support\Facades\Route;

class LoginController extends Controller
{
    public function create()
    {
        // return Inertia::render('backend/auth/Loginnew');
        return view('backend/auth/Loginnew');
    }

    public function authenticate(Request $request)
    {
        //$credentials = Request::only('email');
      //  dd($credentials);
      $credentials = Request::only('phone');

    //   if (Auth::guard('doctor')->attempt($credentials)) {
    //       return redirect()->intended('/doctors/index');
    //   }
    $user = Doctor::where('phone', $credentials['phone'])->first();

    if ($user) {
        // Log in the user without checking the password
        Auth::guard('doctor')->login($user);
        return response()->json(Request::only('phone'));      // return redirect()->intended('doctor/doctor/create');
    }
    else{
        return response()->json([
            'phone' => [trans('auth.failed')],
        ]);
        }
    //   throw ValidationException::withMessages([
    //       'phone' => [trans('auth.failed')],
    //   ]);

        // $fieldType = filter_var($credentials['email'], FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        // if (Auth::guard('doctor')->attempt([$fieldType => $credentials['email_or_phone']])) {
        //     return redirect()->intended('/doctors/index');
        // }

        // throw ValidationException::withMessages([
        //     'email_or_phone' => [trans('auth.failed')],
        // ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    // public function store(LoginRequest $request): RedirectResponse
    // {
    //     $request->authenticate();

    //     $request->session()->regenerate();

    //     return redirect()->intended(RouteServiceProvider::HOME);
    // }

    /**
     * Destroy an authenticated session.
     */
    // public function destroy(Request $request): RedirectResponse
    // {
    //     Auth::guard('web')->logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();

    //     return redirect('/');
    // }
}
