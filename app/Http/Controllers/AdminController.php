<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function showTrainerApproval()
    {
        $users = DB::table('users')->where('role', 1)->where('admin_approve', 0)->get();
        return view('admin.trainer-approval', compact('users'));
    }

    public function updateApproval(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update($request->only(['admin_approve']));

        return redirect()->back()->with('message', 'Updated Successfully!');
    }

    public function showUsers()
    {
        $users = User::whereIn('role', [0, 1])->get();

        return view('admin.view-users', compact('users'));
    }
}
