<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    // Show Register Screen
    public function register_screen()  {
        return view('users.register');
    }

    // Create New User
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3' ],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
        ]);

        // Hash Password
        $formFields['password'] = \bcrypt($formFields['password']);

        // Create New User
        $user = User::create($formFields);
        auth()->login($user);

        return \redirect('/')->with('message', 'User created and logged in.');
    }

    // Log Out User
    public function logout(Request $request) {
        // Set the current user to null
        auth()->logout(); 
        // Destroy the current session
        $request->session()->invalidate(); 
        // Regenerate CSRF token for new session
        $request->session()->regenerateToken();

        return \redirect('/')->with('message', 'You have been logged out!');
    }

    // Show Log In Screen
    public function login_screen()  {
        return view('users.login');
    }

    // Login User
    public function authenticate(Request $request) {
        // Check the information from the form
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);
        // if $formFields is truthy 
        if(auth()->attempt($formFields)) {
            // Regenerate CSRF token for new session
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You are now logged in.');
        }
        // if $formFields doesn't exist
        return back()->withErrors(['email' => 'Invalid Credential'])->onlyInput();
    }
}
