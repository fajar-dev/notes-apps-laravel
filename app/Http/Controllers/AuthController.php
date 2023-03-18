<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        $value = [
            'route' => 'Login',
            'description' => 'This is the about page.',
        ];
        return view('login',  compact('value'));
    }
}
