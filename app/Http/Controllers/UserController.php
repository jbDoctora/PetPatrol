<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
//delete niya ni if mo error
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    //
    public function create()
    {
        return view('users.register-owner');
    }

    public function createNew()
    {
        return view('users.register-trainer');
    }

    public function edit(User $user)
    {
        $user = auth()->user();
        return view('users.user-profile', ['user' => $user]);
    }

    public function index()
    {
        return view('users.index');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'birthday' => 'required',
            'sex' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'id_verify' => 'nullable',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
            'role' => 'required'
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);
        // delete niya ni
        // event(new Registered($user));
        if ($user->role == 0) {
            $user->sendEmailVerificationNotification();
        }

        auth()->login($user);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
        }
        $user = auth()->user();
        if ($user->role == 0) {
            auth()->login($user);
            return redirect('/owner')->with('message', 'You are now logged in as an owner!');
        } elseif ($user->role == 1) {
            auth()->login($user);
            return redirect('/trainer')->with('message', 'You are now logged in as a trainer!');
        } else {
            auth()->login($user);
            return redirect('/')->with('message', 'You are now logged in!');
        }
        return redirect('/')->with('message', 'You are now logged in!');
        //return redirect('/')->with('message','User created and logged in!');  
    }
    public function login()
    {
        return view('users.login');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
    }

    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            $user = auth()->user();
            if ($user->role == 0) {
                return redirect('/owner')->with('message', 'You are now logged in as an owner!');
            } elseif ($user->role == 1) {
                return redirect('/trainer')->with('message', 'You are now logged in as a trainer!');
            } else {
                return redirect('/')->with('message', 'You are now logged in!');
            }
        }
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}
