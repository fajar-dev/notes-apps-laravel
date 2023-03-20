<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function password_change(Request $request){
        // dd(Hash::check($request->old_password, auth()->user()->password));
        if(!Hash::check($request->password_old, auth()->user()->password) ){
            return redirect()->route('profile')->with('success',"Old Password Doesn't match!");
        }else{
            $profile = User::find(Auth::user()->id);
            $profile->password  = Hash::make($request->password_new);
            $profile->save();
            return redirect()->route('logout');
        }
    }
}
