<?php

namespace App\Http\Controllers\Auth;

use App\Helper\JWTToken;
use App\Http\Controllers\Controller;
use App\Mail\OTPMail;
use App\Mail\PasswordResetMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Str;

class UserAuthController extends Controller
{
    public function registerVerification(Request $request)
    {
        $validatedRequest = $request->validate([
            'firstName' => 'required|between:4,20',
            'lastName' => 'sometimes|between:4,10',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|digits:11|numeric',
            'password' => 'required|min:8',
        ]);
        $otp = rand(132628, 979431);
        $validatedRequest['password'] = Hash::make($validatedRequest['password']);
        session(['otp' => $otp, 'userInfo' => $validatedRequest]);
        Mail::to($request->email)->send(new OTPMail($otp));

        return redirect()->route('user.OTPPage');
    }

    public function register(Request $request)
    {
        try {
            if ($request->otp == session('otp')) {
                User::create(session('userInfo'));
                session()->flush();
                return redirect()->route('user.login');
            } else {
                return back()->withErrors(['message' => 'OTP verification failed!']);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Something Wrong!']);
        }
    }

    public function resetVerification(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        $otp = rand(132628, 979431);
        session(['otp' => $otp, 'email' => $request->email]);
        Mail::to($request->email)->send(new OTPMail($otp));

        return redirect()->route('user.OTPPage');
    }

    public function resetPassword(Request $request)
    {
        try {
            if ($request->otp == session('otp')) {
                $user = User::where('email', session('email'))->first();
                $newPassword = str()->password(length: 8, letters: true, numbers: true, symbols: true);
                $user->password = Hash::make($newPassword);
                $user->save();
                Mail::to($user->email)->send(new PasswordResetMail($newPassword));
                session()->flush();

                return redirect()->route('user.login');
            } else {
                return back()->withErrors(['message' => 'OTP verification failed!']);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Something Wrong!']);
        }

    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
            'remember' => 'required|boolean',
        ]);
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();
        if ($user && Hash::check($password, $user->password)) {
            if ($request->input('remember') === true) {
                $time = time() + 60 * 60 * 24 * 30;
            } else {
                $time = time() + 60 * 60 * 24;
            }
            $token = JWTToken::createToken($email, $user->id, 'user', $time);
            // dd($token);
            return redirect()->intended(route('profile'))->cookie('token', $token, $time);
        } else {
            return back()->withErrors(['message' => 'Invalid Credentials']);
        }
    }

    public function logout()
    {
        return redirect(route('index'))->cookie('token', '', -1);
    }
}
