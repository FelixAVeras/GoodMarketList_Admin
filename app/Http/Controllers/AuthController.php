<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm() {
        if (Auth::check()) {
            return redirect()->route('markets.index');
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            if ($user->hasRole('admin') || $user->hasRole('manager')) {
                $request->session()->regenerate();
                
                return redirect()->intended('dashboard');
            }

            return back()->withErrors(['email' => 'Invalid credentials']);
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden.',
        ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
     
        $request->session()->flush();
        
        $request->session()->regenerate();

        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect()->route('login');
    }
}
