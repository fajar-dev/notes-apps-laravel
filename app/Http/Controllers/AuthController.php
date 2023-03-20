<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function reset(){
        $value = [
            'route' => 'Reset',
            'description' => 'This is the about page.',
        ];
        return view('reset',  compact('value'));
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
