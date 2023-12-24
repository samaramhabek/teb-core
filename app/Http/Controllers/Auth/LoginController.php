<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use Illuminate\Validation\ValidationException;
use App\Models\Doctor;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\AuthenticateDoctorRequest;

class LoginController extends Controller
{
    public function create()
    {
        // return Inertia::render('backend/auth/Loginnew');
        return view('backend/auth/Loginnew');
    }

    

    public function authenticate(AuthenticateDoctorRequest $request)
    {
        $credentials = $request->only('phone');
    
        $user = Doctor::where('phone', $credentials['phone'])->first();
    
        if ($user) {
            // Log in the user without checking the password
            Auth::guard('doctor')->login($user);
            return response()->json(Request::only('phone'));
        } else {
            return response()->json([
                'phone' => [trans('auth.failed')],
            ]);
        }
    }
    
 
    }

  
