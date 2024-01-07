<?php

namespace App\Http\Controllers;

use App\Mail\otpMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    // registration page view
    public function registration()
    {
        if (!Auth::check()) {
            return view('auth.registration.registration');
        }
        return redirect()->back();
    }
    // login view
    public function loginView()
    {
        if (!Auth::check()) {
            return view('auth.login.login');
        }
        return redirect()->back();
    }
    // dashboard view
    public function dashboard()
    {
        if (Auth::check()) {
            return view('auth.dahsboard.dashboard');
        }
        return redirect()->back();
    }

    // forget view
    public function forget()
    {
        return view('auth.forget.forget');
    }
    // otp veryfiy
    public function veryfiyOtp()
    {
        return view('auth.otp.otp');
    }
    // reset
    public function reset()
    {
        return view('auth.reset.reset');
    }

    //==============================================
    // all post request

    // reigster post
    public function registerPost(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'fname' => ['required', 'string', 'max:20'],
            'lname' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'unique:users,email'],
            'phone' => ['required', 'max:11'],
            'password' => ['required', 'max:8'],
        ]);
        $store = User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);
        if ($store) {
            return redirect()->route('login.view');
        }

    }

    // login system
    public function loginPost(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid email or password');
        }
    }

    // logout system
    public function logOut()
    {
        Auth::logout();
        return redirect()->route('login.view');
    }

    // foreget system
    public function forgetPost(Request $request)
    {
        $count = User::where('email', $request->email)->count();
        if ($count == 1) {
            $sendOtp = rand(1000, 9999);
            // send to email otp
            Mail::to($request->email)->send(new otpMail($sendOtp));
            // update database otp
            User::where('email', $request->email)->update([
                'otp' => $sendOtp,
            ]);
            return redirect()->route('veryfiyOtp');
        } else {
            return redirect()->back()->with('error', 'Invalid Email');
        }
    }

    // post otp
    public function otpPost(Request $request)
    {
        $updateOtp = $request->checkOtp;
        $count = User::where('otp', $request->checkOtp)->count();
        if ($count == 1) {
            $userEmail = User::where('otp', $updateOtp)->select('email')->get();

            // get email
            foreach ($userEmail as $item) {
                $email = $item;
            }
            return view('auth.reset.reset', compact('updateOtp', 'email'));

        } else {
            return redirect()->back()->with('error', 'Invalid OTP');
        }
    }

    // update password
    public function savePwd(Request $request)
    {
        $otp = $request->updtOtp;
        $newPwd = $request->newPwd;
        $confirmPed = $request->confirmPed;

        if ($newPwd == $confirmPed) {
            User::where('otp', $otp)->update([
                'password' => Hash::make($newPwd),
                'otp' => 0,
            ]);
            return redirect()->route('login.view');
        } else {
            return redirect()->back()->with('error', 'password do not match');
        }
    }

}
