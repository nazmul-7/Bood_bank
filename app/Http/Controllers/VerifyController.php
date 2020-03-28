<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\SendCode;

use Hash;

class VerifyController extends Controller
{
	public function getVerify()
    {
    	return view('verify');
    }

    public function postVerify(Request $request)
    {
    	if ($user = User::where('verification_token',$request->verification_token)->first()) {
    		$user->is_active=1;
    		$user->save();
    		return redirect()->route('login')->withMessage('Your acount is activated,Please Signin now.');
    	} else {
    		return back()->withMessage('Verify Code is not correct. Please Try again');
    	}
    }

    public function resendVerify(Request $request,$phone)
    {
        //$v = $request->verification_token;

        $user = User::where('phone',$phone)->first();
        //dd($user);
        $user->verification_token = SendCode::sendCode($user->phone);
        $user->save();

        return back()->withMessage('Verify code sent');
    }

    public function resetPassword(Request $request)
    {
        $validation = $request->validate([
                'phone' => 'required|max:12',
            ]);

        if ($user = User::where('phone',$request->phone)->first()) {
            $user->verification_token = SendCode::sendCode($user->phone);
            $user->save();
            return redirect()->route('verifyPhone')->withMessage('Please Enter Verification Code.');
        } else {
            return back()->withMessage('The number you provided is not in our list. Please try again !');
        }
    }

    public function verifyPhone()
    {
        return view('auth.passwords.verifyPhone');
    }

    public function verifyToken(Request $request)
    {
        if ($user = User::where('verification_token',$request->verification_token)->first()) {
            $user->is_active=1;
            $user->save();
            $phone = $user->phone;
            return view('auth.passwords.phone',compact('phone'))->withMessage('You can change your password now.');
        } else {
            return back()->withMessage('Verify Code is not correct. Please Try again');
        }
    }


    public function resetPhone()
    {
        return view('auth.passwords.phone');
    }

    public function resetPasswordPassword (Request $request){
        $validation = $request->validate([
                'password' => 'required|min:8|confirmed',
                'password_confirmation' => 'required|min:8',
         ]);

        if ($user = User::where('phone',$request->phone)->first()) {
            $password = $request->password;
            $user->password = Hash::make($password);
            $user->save();
            return redirect()->route('login')->withMessage('Your password is changed,Please Sign in now.');
        } else {
            return back()->withMessage('Something went wrong, please try again');
        }
        


    }
}
