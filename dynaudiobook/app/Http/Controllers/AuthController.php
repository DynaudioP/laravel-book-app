<?php

namespace App\Http\Controllers;

use App\Models\profile;
use App\Models\User;
use Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8'
        ]);

        $roleData = User::count();

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = $roleData === 0 ? 'admin' : 'user';

        $user->save();

        return redirect('/')->with('success', "Berhasil Register");
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/')->with('success', "Berhasil Login");
        }

        return back()->withErrors([
            'email' => 'Invalid User',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->intended('/')->with('success', "Berhasil Logout");
    }

    public function getProfile()
    {
        $userAuth = Auth::User()->profile;

        $userId = Auth::id();

        $profileData = profile::where('user_id', $userId)->first();

        if ($userAuth) {
            return view("profile.edit", ['profile' => $profileData]);
        } else {
            return view("profile.create");
        }
    }

    public function createProfile(Request $request) {
        
        $request->validate([
            'age' => 'required|numeric',
            'address' => 'required',
        ]);

        $userId = Auth::id();

        $profile = new profile;
        $profile->age = $request->input('age');
        $profile->address = $request->input('address');
        $profile->user_id = $userId;

        $profile->save();

        return redirect('/profile');
    }

    public function updateProfile(Request $request, $id) {
        
        $request->validate([
            'age' => 'required|numeric',
            'address' => 'required',
        ]);

        $profile = profile::find($id);
        $profile->age = $request->input('age');
        $profile->address = $request->input('address');

        $profile->save();

        return redirect('/')->with('success', "Berhasil Update Profile");
    }
}
