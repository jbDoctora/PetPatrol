<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\AdminPetType;
use App\Models\AdminService;
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

    public function showAdminService()
    {
        $service = AdminService::all();
        return view('admin.view-service', compact('service'));
    }

    public function showAdminPetType()
    {
        $petType = AdminPetType::all();
        return view('admin.view-petType', compact('petType'));
    }

    public function showBookings()
    {
        $bookings = Booking::all();
        return view('admin.bookings', compact('bookings'));
    }

    public function storeService(Request $request)
    {
        $formFields = $request->validate([
            'admin_service' => 'required',
        ]);
        $formFields['isPosted'] = $request->input('isPosted');
        AdminService::create($formFields);

        return redirect()->back()->with('message', 'New service added');
    }

    public function storePetType(Request $request)
    {
        $formFields = $request->validate([
            'admin_petType' => 'required',
        ]);
        $formFields['isPosted'] = $request->input('isPosted');
        AdminPetType::create($formFields);

        return redirect()->back()->with('message', 'New pet type added');
    }
}
