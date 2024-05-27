<?php

/** @noinspection PhpUndefinedClassInspection */

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\OTPVerificationController;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Notifications\AppEmailVerificationNotification;
use Hash;
use GeneaLabs\LaravelSocialiter\Facades\Socialiter;
use Socialite;
use App\Models\Cart;
use App\Models\Doctor;
use App\Models\DoctorUser;
use App\Models\Patient;
use App\Rules\Recaptcha;
use App\Services\SocialRevoke;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        $messages = array(
            'name.required' => translate('Name is required'),
            'email_or_phone.required' => $request->register_by == 'email' ? translate('Email is required') : translate('Phone is required'),
            'email_or_phone.email' => translate('Email must be a valid email address'),
            'email_or_phone.numeric' => translate('Phone must be a number.'),
            'email_or_phone.unique' => $request->register_by == 'email' ? translate('The email has already been taken') : translate('The phone has already been taken'),
            'password.required' => translate('Password is required'),
            'password.confirmed' => translate('Password confirmation does not match'),
            'password.min' => translate('Minimum 6 digits required for password')
        );
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required|min:6|confirmed',
            'email_or_phone' => [
                'required',
                Rule::when($request->register_by === 'email', ['email', 'unique:users,email']),
                Rule::when($request->register_by === 'phone', ['numeric', 'unique:users,phone']),
            ],
            // 'g-recaptcha-response' => [
            //     Rule::when(get_setting('google_recaptcha') == 1, ['required', new Recaptcha()], ['sometimes'])
            // ]
        ], $messages);

        if ($validator->fails()) {
            return response()->json([
                'result' => false,
                'message' => $validator->errors()->all()
            ]);
        }

        $user = new User();
        $user->name = $request->name;
        if ($request->register_by == 'email') {

            $user->email = $request->email_or_phone;
        }
        if ($request->register_by == 'phone') {
            $user->phone = $request->email_or_phone;
        }
        $user->password = bcrypt($request->password);
        $user->verification_code = rand(100000, 999999);
        $user->save();


        $user->email_verified_at = null;
        if ($user->email != null) {
            if (BusinessSetting::where('type', 'email_verification')->first()->value != 1) {
                $user->email_verified_at = date('Y-m-d H:m:s');
            }
        }

        if ($user->email_verified_at == null) {
            if ($request->register_by == 'email') {
                try {
                    $user->notify(new AppEmailVerificationNotification());
                } catch (\Exception $e) {
                }
            } else {
                $otpController = new OTPVerificationController();
                $otpController->send_code($user);
            }
        }

        $user->save();
        //create token
        $user->createToken('tokens')->plainTextToken;

        return $this->loginSuccess($user->id);
    }

    public function resendCode()
    {
        $user = auth()->user();
        $user->verification_code = rand(100000, 999999);

        if ($user->email) {
            try {
                $user->notify(new AppEmailVerificationNotification());
            } catch (\Exception $e) {
            }
        } else {
            $otpController = new OTPVerificationController();
            $otpController->send_code($user);
        }

        $user->save();

        return response()->json([
            'result' => true,
            'message' => translate('Verification code is sent again'),
        ], 200);
    }

    public function confirmCode(Request $request)
    {
        if($request->type==='doctor'){
           $doctor= Doctor::where('id',$request->id)->first();
           if($doctor->verfication_code==$request->verfication_code){

              return response()->json([
                'result' => true,
                'message' => ('Your account is now verified'),
            ], 200);
        }

        }
        // $user = auth()->user();

        // if ($user->verification_code == $request->verification_code) {
        //     $user->email_verified_at = date('Y-m-d H:i:s');
        //     $user->verification_code = null;
        //     $user->save();
        //     return response()->json([
        //         'result' => true,
        //         'message' => ('Your account is now verified'),
        //     ], 200);
        // } else {
        //     return response()->json([
        //         'result' => false,
        //         'message' => translate('Code does not match, you can request for resending the code'),
        //     ], 200);
        // }
    }

    public function verifyCode(Request $request)
{
    // Validate the incoming request
    $validator = Validator::make($request->all(), [
        'id' => 'required|integer',
        'type' => 'required|in:doctor,patient',
        'verification_code' => 'required|numeric',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'result' => false,
            'message' => $validator->errors()->all()
        ]);
    }

    $userId = $request->id;
    $userType = $request->type;
    $verificationCode = $request->verification_code;

    // Determine the user's phone number based on their type and ID
    if ($userType === 'doctor') {
        $user = Doctor::find($userId);
        if ($user) { 
            // Check if $doctor is not null
                              $doc = []; // Initialize $doc as an empty array for each iteration
                          $doc['id'] = $user->id ?? null; 
                          $doc['first_name'] = $user->getTranslation('first_name', app()->getLocale());
                          $doc['last_name'] = $user->getTranslation('last_name', app()->getLocale());
                          $doc['username'] = $user->username;
                          $doc['title'] = $user->getTranslation('title', app()->getLocale());
                          $doc['email'] = $user->email;
                          $doc['gender'] = $user->gender;
                          $doc['Phone'] = $user->Phone;
                          $doc['description'] = $user->getTranslation('description', app()->getLocale());
                          $doc['is_trainer'] = $user->is_trainer;
                          $doc['area_id'] = $user->area ? $user->area->getTranslation('name', app()->getLocale()) : '';
                          $doc['lat'] = $user->lat;
                          $doc['lang'] = $user->lang;
                          $doc['city_id'] = $user->city ? $user->city->getTranslation('name', app()->getLocale()) : '';
                          $data[] = $doc;
                       
        }
    } elseif ($userType === 'patient') {
        $user = Patient::find($userId);
        $doc['id'] = $user->id ?? null; 
        $doc['first_name'] = $user->getTranslation('first_name', app()->getLocale());
        $doc['last_name'] = $user->getTranslation('last_name', app()->getLocale());
        $doc['username'] = $user->username;
      //  $doc['title'] = $user->getTranslation('title', app()->getLocale());
        $doc['email'] = $user->email;
       // $doc['gender'] = $user->gender;
        $doc['Phone'] = $user->Phone;
        $data[] = $doc;
     
    } else {
        return response()->json(['result' => false, 'message' => 'Invalid user type'], 400);
    }

    if (!$user) {
        return response()->json(['result' => false, 'message' => 'User not found'], 404);
    }

    // Retrieve the stored verification code
//     $storedCode = Cache::get('verification_code_' . $user->phone);
// dd($storedCode);
//     if ($storedCode && $storedCode == $verificationCode) {
//         // Code is valid, log the user in
//         // Generate a token or session for the user
//         $token = $user->createToken('auth_token')->plainTextToken;
if ($user->verification_code && $user->verification_code == $verificationCode) {
    // Code is valid, log the user in
    // Generate a token or session for the user
    $token = $user->createToken('auth_token')->plainTextToken;

    // Optionally, you can clear the verification code after successful login
    $user->verification_code = null;
    $user->save();

        return response()->json(['result' => true, 'message' => 'Login successful', 'token' => $token, 'user' => $data], 200);
    } else {
        return response()->json(['result' => false, 'message' => 'Invalid verification code'], 400);
    }
}


    // public function login(Request $request)
    // {
        
    //     $messages = array(
    //         'field.required' => $request->field == 'username' ? 'User Name is required' :'Phone is required',
    //        // 'email.email' =>'Email must be a valid email address',
    //         'phone.numeric' => 'Phone must be a number.',
    //       //  'password.required' => 'Password is required',
    //     );
    //     $validator = Validator::make($request->all(), [
    //        'user_type' => 'required',
    //         'field' => 'required',
    //         // 'email' => [
    //         //     'required',
    //              Rule::when($request->field === 'username', ['required']),
    //             Rule::when($request->field === 'phone', ['numeric', 'required']),
    //        // ]
    //     ], $messages);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'result' => false,
    //             'message' => $validator->errors()->all()
    //         ]);
    //     }

    //     $doctor = $request->has('user_type') && $request->user_type == 'doctor';
    //     $patient = $request->has('user_type') && $request->user_type == 'patient';
    //     $doctor_users = $request->has('doctor_users') && $request->user_type == 'doctor_users';
        
    //     $field = $request->field;

    //     if ($doctor) {
    //         $doctor = Doctor::where(function ($query) use ($field) {
    //                 $query->where('username', $field)
    //                     ->orWhere('phone', $field);
    //             })->first();
              
    //               if ($doctor) { // Check if $doctor is not null
    //                   $doc = []; // Initialize $doc as an empty array for each iteration
    //               $doc['id'] = $doctor->id ?? null; 
    //               $doc['first_name'] = $doctor->getTranslation('first_name', app()->getLocale());
    //               $doc['last_name'] = $doctor->getTranslation('last_name', app()->getLocale());
    //               $doc['title'] = $doctor->getTranslation('title', app()->getLocale());
    //               $doc['email'] = $doctor->email;
    //               $doc['gender'] = $doctor->gender;
    //               $doc['Phone'] = $doctor->Phone;
    //               $doc['description'] = $doctor->getTranslation('description', app()->getLocale());
    //               $doc['is_trainer'] = $doctor->is_trainer;
    //               $doc['area_id'] = $doctor->area ? $doctor->area->getTranslation('name', app()->getLocale()) : '';
    //               $doc['lat'] = $doctor->lat;
    //               $doc['lang'] = $doctor->lang;
    //               $doc['city_id'] = $doctor->city ? $doctor->city->getTranslation('name', app()->getLocale()) : '';
    //               $data[] = $doc;
    //               }else{
    //                 return response()->json(['result' => false, 'message' => 'account not found', 'doctor' => null], 400);
    //               }

    //             return response()->json(['result' => true, 'message' => 'exist doctor', 'doctor' => $data], 200);
    //     } elseif ($patient) {
    //         $patient = Patient::where(function ($query) use ($field) {
    //                 $query->where('username', $field)
    //                     ->orWhere('phone', $field);
    //             })
    //             ->first();
    //             return response()->json(['result' => true, 'message' => 'exist patient', 'patient' => $patient], 200);
    //     } elseif($doctor_users) {
    //         $helper = DoctorUser::where(function ($query) use ($field) {
    //                 $query->where('username', $field)
    //                     ->orWhere('phone', $field);
    //             })
    //             ->first();
    //             return response()->json(['result' => true, 'message' => 'exist helper doctor ', ' doctor helper' => $helper], 200);
    //          //   log::info($user);
    //     }
    //     // if (!$delivery_boy_condition) {
    //     // if (!$delivery_boy_condition && !$seller_condition) {
    //     //     if (\App\Utility\PayhereUtility::create_wallet_reference($request->identity_matrix) == false) {
    //     //         return response()->json(['result' => false, 'message' => 'Identity matrix error', 'user' => null], 401);
    //     //     }
    //     // }

    //     // if ($user != null) {
    //     //     if (!$user->banned) {
    //     //         if (FacadesHash::check($request->password, $user->password)) {

    //     //             // if ($user->email_verified_at == null) {
    //     //             //     return response()->json(['result' => false, 'message' => translate('Please verify your account'), 'user' => null], 401);
    //     //             // }
    //     //             return $this->loginSuccess($user->id);
    //     //         } else {
    //     //             return response()->json(['result' => false, 'message' => 'Unauthorized', 'user' => null], 401);
    //     //         }
    //     //     } else {
    //     //         return response()->json(['result' => false, 'message' => 'User is banned', 'user' => null], 401);
    //     //     }
    //     // }
    //      else {
    //         return response()->json(['result' => false, 'message' => 'account not found', 'user' => null], 400);
    //     }
    // }




    public function login(Request $request)
{
    $messages = array(
        'field.required' => $request->field == 'username' ? 'User Name is required' : 'Phone is required',
        'phone.numeric' => 'Phone must be a number.',
    );
    
    $validator = Validator::make($request->all(), [
        'user_type' => 'required|in:doctor,patient',
        'field' => 'required',
        Rule::when($request->field === 'username', ['required']),
        Rule::when($request->field === 'phone', ['numeric', 'required']),
    ], $messages);

    if ($validator->fails()) {
        return response()->json([
            'result' => false,
            'message' => $validator->errors()->all()
        ]);
    }

    $user_type = $request->user_type;
    $field = $request->field;

    if ($user_type == 'doctor') {
        $user = Doctor::where('username', $field)->orWhere('phone', $field)->first();
        if ($user) { 
            // Check if $doctor is not null
                              $doc = []; // Initialize $doc as an empty array for each iteration
                          $doc['id'] = $user->id ?? null; 
                          $doc['first_name'] = $user->getTranslation('first_name', app()->getLocale());
                          $doc['last_name'] = $user->getTranslation('last_name', app()->getLocale());
                          $doc['username'] = $user->username;
                          $doc['title'] = $user->getTranslation('title', app()->getLocale());
                          $doc['email'] = $user->email;
                          $doc['gender'] = $user->gender;
                          $doc['Phone'] = $user->Phone;
                          $doc['description'] = $user->getTranslation('description', app()->getLocale());
                          $doc['is_trainer'] = $user->is_trainer;
                          $doc['area_id'] = $user->area ? $user->area->getTranslation('name', app()->getLocale()) : '';
                          $doc['lat'] = $user->lat;
                          $doc['lang'] = $user->lang;
                          $doc['city_id'] = $user->city ? $user->city->getTranslation('name', app()->getLocale()) : '';
                          $data[] = $doc;
                          $verificationCode = rand(100000, 999999); // Generate a 6-digit code
                          $user->verification_code = $verificationCode;
                          $user->save();
        }


        if (!$user) {
            return response()->json(['result' => false, 'message' => 'Account not found', 'user' => null], 400);
        }
    
        // // Send verification code to user's phone
        // $verificationCode = rand(100000, 999999); // Generate a 6-digit code
        // // Here you should send the code to the user's phone via an SMS gateway
    
        // // Store the code in a cache or database for later verification
        // Cache::put('verification_code_' . $user->phone, $verificationCode, now()->addMinutes(10));
    
        return response()->json(['result' => true, 'message' => 'Verification code sent', 'doctor' => $data], 200);
        //   }else{
                        //     return response()->json(['result' => false, 'message' => 'account not found', 'doctor' => null], 400);
                        //   }
    } elseif ($user_type == 'patient') {
        $user = Patient::where('username', $field)->orWhere('phone', $field)->first();
        $doc['id'] = $user->id ?? null; 
        $doc['first_name'] = $user->getTranslation('first_name', app()->getLocale());
        $doc['last_name'] = $user->getTranslation('last_name', app()->getLocale());
        $doc['username'] = $user->username;
      //  $doc['title'] = $user->getTranslation('title', app()->getLocale());
        $doc['email'] = $user->email;
       // $doc['gender'] = $user->gender;
        $doc['Phone'] = $user->Phone;
        $data[] = $doc;
        $verificationCode = rand(100000, 999999); // Generate a 6-digit code
        $user->verification_code = $verificationCode;
        $user->save();
        if (!$user) {
            return response()->json(['result' => false, 'message' => 'Account not found', 'user' => null], 400);
        }
    
        // Send verification code to user's phone
        // $verificationCode = rand(100000, 999999); // Generate a 6-digit code
        // // Here you should send the code to the user's phone via an SMS gateway
    
        // // Store the code in a cache or database for later verification
        // Cache::put('verification_code_' . $user->phone, $verificationCode, now()->addMinutes(10));
    
        return response()->json(['result' => true, 'message' => 'Verification code sent', 'patient' => $data], 200);

    }

    // if (!$user) {
    //     return response()->json(['result' => false, 'message' => 'Account not found', 'user' => null], 400);
    // }

    // // Send verification code to user's phone
    // $verificationCode = rand(100000, 999999); // Generate a 6-digit code
    // // Here you should send the code to the user's phone via an SMS gateway

    // // Store the code in a cache or database for later verification
    // Cache::put('verification_code_' . $user->phone, $verificationCode, now()->addMinutes(10));

    // return response()->json(['result' => true, 'message' => 'Verification code sent', 'user' => $data], 200);
}

    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function logout(Request $request)
    {

        $user = request()->user();
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();

        return response()->json([
            'result' => true,
            'message' => translate('Successfully logged out')
        ]);
    }

    public function socialLogin(Request $request)
    {
        if (!$request->provider) {
            return response()->json([
                'result' => false,
                'message' => translate('User not found'),
                'user' => null
            ]);
        }

        switch ($request->social_provider) {
            case 'facebook':
                $social_user = Socialite::driver('facebook')->fields([
                    'name',
                    'first_name',
                    'last_name',
                    'email'
                ]);
                break;
            case 'google':
                $social_user = Socialite::driver('google')
                    ->scopes(['profile', 'email']);
                break;
            case 'twitter':
                $social_user = Socialite::driver('twitter');
                break;
            case 'apple':
                $social_user = Socialite::driver('sign-in-with-apple')
                    ->scopes(['name', 'email']);
                break;
            default:
                $social_user = null;
        }
        if ($social_user == null) {
            return response()->json(['result' => false, 'message' => translate('No social provider matches'), 'user' => null]);
        }

        if ($request->social_provider == 'twitter') {
            $social_user_details = $social_user->userFromTokenAndSecret($request->access_token, $request->secret_token);
        } else {
            $social_user_details = $social_user->userFromToken($request->access_token);
        }

        if ($social_user_details == null) {
            return response()->json(['result' => false, 'message' => translate('No social account matches'), 'user' => null]);
        }

        $existingUserByProviderId = User::where('provider_id', $request->provider)->first();

        if ($existingUserByProviderId) {
            $existingUserByProviderId->access_token = $social_user_details->token;
            if ($request->social_provider == 'apple') {
                $existingUserByProviderId->refresh_token = $social_user_details->refreshToken;
                if (!isset($social_user->user['is_private_email'])) {
                    $existingUserByProviderId->email = $social_user_details->email;
                }
            }
            $existingUserByProviderId->save();
            return $this->loginSuccess($existingUserByProviderId->id);
        } else {
            $existing_or_new_user = User::firstOrNew(
                [['email', '!=', null], 'email' => $social_user_details->email]
            );

            $existing_or_new_user->user_type = 'customer';
            $existing_or_new_user->provider_id = $social_user_details->id;

            if (!$existing_or_new_user->exists) {
                if ($request->social_provider == 'apple') {
                    if ($request->name) {
                        $existing_or_new_user->name = $request->name;
                    } else {
                        $existing_or_new_user->name = 'Apple User';
                    }
                } else {
                    $existing_or_new_user->name = $social_user_details->name;
                }
                $existing_or_new_user->email = $social_user_details->email;
                $existing_or_new_user->email_verified_at = date('Y-m-d H:m:s');
            }

            $existing_or_new_user->save();

            return $this->loginSuccess($existing_or_new_user->id);
        }
    }

    public function loginSuccess($user_id, $token = null)
    {
        $user=User::whereId($user_id)->first();
        if (!$token) {
            $token = $user->createToken('API Token')->plainTextToken;
        }
        return response()->json([
            'result' => true,
            'message' => translate('Successfully logged in'),
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_at' => null,
            'user' => [
                'id' => $user->id,
                'type' => $user->user_type,
                'name' => $user->name,
                'email' => $user->email,
                'avatar' => $user->avatar,
                'avatar_original' => uploaded_asset($user->avatar_original),
                'phone' => $user->phone,
                'email_verified' => $user->email_verified_at != null
            ]
        ]);
    }


    protected function loginFailed()
    {

        return response()->json([
            'result' => false,
            'message' => translate('Login Failed'),
            'access_token' => '',
            'token_type' => '',
            'expires_at' => null,
            'user' => [
                'id' => 0,
                'type' => '',
                'name' => '',
                'email' => '',
                'avatar' => '',
                'avatar_original' => '',
                'phone' => ''
            ]
        ]);
    }


    public function account_deletion()
    {
        if (auth()->user()) {
            Cart::where('user_id', auth()->user()->id)->delete();
        }

        // if (auth()->user()->provider && auth()->user()->provider != 'apple') {
        //     $social_revoke =  new SocialRevoke;
        //     $revoke_output = $social_revoke->apply(auth()->user()->provider);

        //     if ($revoke_output) {
        //     }
        // }

        $auth_user = auth()->user();
        $auth_user->tokens()->where('id', $auth_user->currentAccessToken()->id)->delete();
        $auth_user->customer_products()->delete();

        User::destroy(auth()->user()->id);

        return response()->json([
            "result" => true,
            "message" => translate('Your account deletion successfully done')
        ]);
    }

    public function getUserInfoByAccessToken(Request $request)
    {
        $token = PersonalAccessToken::findToken($request->access_token);
        if (!$token) {
            return $this->loginFailed();
        }
        $user = $token->tokenable;

        if ($user == null) {
            return $this->loginFailed();
        }

        return $this->loginSuccess($user->id, $request->access_token);
    }
}
