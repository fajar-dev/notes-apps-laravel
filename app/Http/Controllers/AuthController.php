<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login(){
        $value = [
            'route' => 'Login',
            'description' => 'This is the about page.',
        ];
        return view('login',  compact('value'));
    }

    public function login_action(Request $request ){
        if(Auth::attempt($request->only('email', 'password'))){
            return redirect()->route('notes');
        }else{
            return redirect()->route('login')->with('success','username or password is incorrect, please try again');
        }
    }

    public function register(){
        $value = [
            'route' => 'Register',
            'description' => 'This is the about page.',
        ];
        return view('register',  compact('value'));
    }

    public function register_action(Request $request ){
        $cek = User::where('email', $request->email)->first();
        if($cek == null){
            $register = new User;
            $register->name  = $request->name;
            $register->email  = $request->email;
            $register->password  = Hash::make($request->password);
            $register->remember_token  = Str::random(60);
            $register->save();
            return redirect()->route('login')->with('success','Registration is successful, please login');
        }else{
            return redirect()->route('register')->with('success','Registration failed, email is registered');
        }
    }

    public function forgot(){
        $value = [
            'route' => 'Forgot',
            'description' => 'This is the about page.',
        ];
        return view('forgot',  compact('value'));
    }

    public function forgot_action(Request $request ){
        $cek = User::where('email', $request->email)->first();
        if($cek == null){
            return redirect()->route('forgot')->with('success','failed, email is not registered');
        }else{
            $token = Str::random(10);
            DB::table('password_resets')->insert([
                'email' => $request->email, 
                'token' => $token, 
            ]); 
            Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
                $message->to($request->email);
                $message->subject('Reset Password');
            });
            return redirect()->route('login')->with('success','success, please check your email ');
        }
    }

    public function reset($token){
        $value = [
            'route' => 'Reset',
            'description' => 'This is the about page.',
        ];
        return view('reset', ['token' => $token], compact('value'));
    }

    public function reset_action(Request $request ){
        $updatePassword = DB::table('password_resets')->where([
            'email' => $request->email, 
            'token' => $request->token
        ])->first();
  
        if(!$updatePassword){
            return back()->withInput()->with('success', 'Invalid token!');
        }
        User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
        DB::table('password_resets')->where(['email'=> $request->email])->delete();
        return redirect()->route('login')->with('success','success, password changed');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
