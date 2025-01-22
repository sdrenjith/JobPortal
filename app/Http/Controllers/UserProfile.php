<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfile extends Controller
{
    public function showProfile(){
/*************  ✨ Codeium Command ⭐  *************/
    /**
     * Display the user's profile page if authenticated, otherwise redirect to the sign-in page.
     *
     * @return \Illuminate\Http\Response
     */

/******  3acc49c7-2287-4fe6-b1e6-3a6645616ff4  *******/
        if (!auth()->check()) {
            return redirect()->route('login');
        }else{
            return view('theme.account-profile');
        }
    }

    public function accountSettings(){
        if (!auth()->check()) {
            return redirect()->route('login');
        }else{
            return view('theme.account-settings');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }


}

