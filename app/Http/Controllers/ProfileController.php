<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        $value = [
            'route' => 'Profile',
            'description' => 'This is the about page.',
        ];
        return view('profile', compact('value'));
    }
}
