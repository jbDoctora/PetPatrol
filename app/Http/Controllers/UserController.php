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
use App\Jobs\SendEmailVerificationNotification;
use App\Notifications\AdminApprovedNotification;
use App\Notifications\NewlyRegisteredNotification;
use Illuminate\Notifications\Notifiable;

class UserController extends Controller
{
    use Notifiable;
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
        $oldImagePath = $user['profile_photo'];

        if ($request->hasFile('profile_photo')) {
            // Delete the old file
            Storage::disk('public')->delete($oldImagePath);

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
        $formFields = $request->validate(
            [
                'name' => 'required|regex:/^[\pL\s\-]+$/u',
                'birthday' => 'required',
                'sex' => 'required',
                'address' => 'required',
                'phone_number' => ['required', 'regex:/^(\+63|0)9\d{9}$/'],
                'id_verify' => 'required',
                'email' => ['required', 'email', Rule::unique('users', 'email')],
                'password' => 'required|confirmed|min:6',
                'role' => 'required'
            ],
            [
                'phone_number.regex' => 'Phone number is invalid',
                'name.regex' => 'Name should not contain number',
            ]
        );

        if ($request->hasFile('id_verify')) {
            $formFields['id_verify'] = $request->file('id_verify')->store('id_verification', 'public');
        }

        if ($request->hasFile('trainer_document')) {
            $formFields['trainer_document'] = $request->file('trainer_document')->store('trainer_documents', 'public');
        }

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);
        $user_to_notify = $user['id'];

        if ($user->role == 0) {
            SendEmailVerificationNotification::dispatch($user);
        }

        auth()->login($user);


        $user = auth()->user();
        if ($user->role == 0) {
            auth()->login($user);
            //DELETE IF MO ERROR
            $user_to_notify = User::where('id', auth()->user()->id)->first();
            $userData = [
                'message' => 'Welcome to Pet Patrol! You can now start requesting a pet trainer.'
            ];
            $user_to_notify->notify(new NewlyRegisteredNotification($userData));
            //END OF DELETION
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
