<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
            return redirect()->route('login')->with('success','Login failed, please try again');
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
        // $cek = DB::table('users')->where('email', $request->email)->get();
        // // dd($cek);
        // if(empty($cek)){
        //     return redirect()->route('register')->with('success','Registration is failed, please login');
        // }else{
            $register = new User;
            $register->name  = $request->name;
            $register->email  = $request->email;
            $register->password  = bcrypt($request->password);
            $register->remember_token  = Str::random(60);
            $register->save();
            return redirect()->route('login')->with('success','Registration is successful, please login');
        // }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
