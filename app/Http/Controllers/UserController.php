<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
//delete niya ni if mo error
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;

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

    public function editPassword()
    {
        $user = auth()->user();
        return view('owner.change-password', ['user' => $user]);
    }

    public function index()
    {
        return view('users.index');
    }

    public function updateProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->only(['name', 'sex', 'address', 'phone_number', 'email', 'profile_photo']);

        if ($request->hasFile('profile_photo')) {
            // Delete the old file
            Storage::delete('image/' . $user->profile_photo);

            // Store the new file
            $data['profile_photo'] = $request->file('profile_photo')->store('profile_photo', 'public');
        }

        $user->update($data);

        return redirect()->back()->with('message', 'User updated successfully.');
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        // Verify old password
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'The old password is incorrect.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('message', 'Password updated successfully.');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'birthday' => 'required',
            'sex' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'id_verify' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
            'role' => 'required'
        ]);

        if ($request->hasFile('id_verify')) {
            $formFields['id_verify'] = $request->file('id_verify')->store('id_verification', 'public');
        }

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);
        // delete niya ni
        // event(new Registered($user));
        if ($user->role == 0) {
            $user->sendEmailVerificationNotification();
        }

        auth()->login($user);


        $user = auth()->user();
        if ($user->role == 0) {
            auth()->login($user);
            return redirect('/owner')->with('message', 'You are now logged in as an owner!');
        } elseif ($user->role == 1) {
            auth()->login($user);
            return redirect('/trainer')->with('message', 'You are now logged in as a trainer!');
        } elseif ($user->role == 3) {
            auth()->login($user);
            return redirect('/admin')->with('message', 'Welcome Admin!');
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
                return redirect('/owner');
            } elseif ($user->role == 1) {
                return redirect('/trainer');
            } elseif ($user->role == 3) {
                return redirect('/admin');
            } else {
                return redirect('/');
            }
        }
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function showBanned()
    {
        return view('errors.banned');
    }
}
