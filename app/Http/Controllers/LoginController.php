<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('theme.account-signin');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            // Determine the appropriate Filament panel based on user role
            switch ($user->role) {
                case 'admin':
                    return redirect()->route('filament.admin.pages.admin-dashboard');
                case 'company':
                    return redirect()->route('filament.admin.pages.company-dashboard');
                case 'user':
                    return redirect()->route('filament.admin.pages.user-dashboard');
                default:
                    return redirect()->route('home');
            }
        }
    
        return redirect()->back()->withErrors(['Invalid email or password']);
    }
    
//     public function authenticated(Request $request, $user)
// {
//     if ($user->role === 'admin') {
//         return redirect()->route('admin.dashboard');
//     } elseif ($user->role === 'company') {
//         return redirect()->route('company.dashboard');
//     } else {
//         return redirect()->route('user.dashboard');
//     }
// }
}
