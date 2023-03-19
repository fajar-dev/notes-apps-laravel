<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $value = [
            'route' => 'Profile',
            'description' => 'This is the about page.',
        ];
        return view('profile', compact('value'));
    }

    public function profile_update(Request $request){
        $profile = User::find(Auth::user()->id);
        $profile->name  = $request->name;
        $profile->email  = $request->email;
        $profile->save();
        return redirect()->route('profile')->with('success','Your profile have been updated');
    }

    public function profile_delete(Request $request){
        $profile = User::find(Auth::user()->id);
        $profile->delete();
        return redirect()->route('logout');
    }
}
