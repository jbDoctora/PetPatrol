<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\PetInfo;
use App\Models\AdminPetType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

class PetInfoController extends Controller
{
    //
    // public function index(){
    //     $petinfo = PetInfo::paginate(9);
    //     return view('owner.pet-info-index',[
    //         'petinfo' => $petinfo
    //     ]);
    // }
    // public function index(){
    //     return view('owner.pet-info-index',[
    //         'petinfo' => PetInfo::paginate(9)
    //     ]);
    // }
    public function index()
    {
        $petinfo = PetInfo::where('owner_id', auth()->id())
            ->whereNotIn('book_status', ['disabled'])
            ->paginate(3);
        return view('owner.pet-info-index', compact('petinfo'));
    }
    public function create()
    {
        $adminPetType = AdminPetType::where('isPosted', 1)->get();
        return view('owner.pet-info-create', compact('adminPetType'));
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'pet_name' => 'required|unique:pet_info,pet_name,NULL,id,owner_id,' . auth()->id(),
            'years' => 'required',
            'months' =>
            [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    $ageInMonths = ($value + ($request->input('years') * 12));

                    if ($ageInMonths < 2) {
                        $fail('Pet should be two months above for training');
                    }
                },
            ],
            'breed' => 'required',
            'info' => 'nullable',
            'vaccine' => 'required',
            'vaccine_list' => 'required',
            'type' => 'required',
            'weight' => 'required',
        ], [
            'name.unique' => 'The pet name already exists on your end.',
            'months.min' => 'Pet should be two months above for training'
        ]);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('pet_photo', 'public');
        }
        $formFields['info'] = $request->input('info');
        $formFields['vaccine'] = $request->input('vaccine');
        $formFields['vaccine_list'] = $request->input('vaccine_list');
        $formFields['type'] = $request->input('type');
        $formFields['weight'] = $request->input('weight');
        $formFields['book_status'] = $request->input('book_status');
        $formFields['owner_id'] = auth()->id() ?? null;

        PetInfo::create($formFields);


        return redirect('/pet-info')->with('message', 'Pet added successfully!');
    }

    public function updateDisable(Request $request)
    {
        $pet = PetInfo::where('pet_id', $request->input('pet_id'))->first();

        $data = $request->validate([
            'book_status' => 'required',
            'pet_id' => 'required',
        ]);
        $pet->book_status = $request->input('book_status');

        $pet->update($data);

        return redirect()->back()->with('message', 'Successfully disabled your pet');
    }

    public function edit(Request $request, $id)
    {
        $pet_to_update = PetInfo::where('pet_id', $id)->first();
        $oldImagePath = $pet_to_update['image'];

        $formFields = $request->validate([
            'months' =>
            [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    $ageInMonths = ($value + ($request->input('years') * 12));

                    if ($ageInMonths < 2) {
                        $fail('Pet should be two months above for training');
                    }
                },
            ],
            'years' => 'required',
            'breed' => 'required',
            'weight' => 'required',
            'info' => 'nullable',
            'vaccine' => 'required',
            'vaccine_list' => 'required',
            'pet_name' => 'required',
            'image' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('pet_photo', 'public');

            // Delete the old image file
            Storage::disk('public')->delete($oldImagePath);
        }

        $pet_to_update->update($formFields);

        return redirect()->back()->with('message', 'Successfully updated!');
    }

    public function updateStatus($pet_id)
    {
        $pet = PetInfo::where('pet_id', $pet_id)->first();

        $data = $pet->book_status = 'deceased';
        $pet->update($data);
        // dd($pet);
        return redirect()->back()->with('message', 'We are sorry to hear about your pet');
    }

    public function showHistory($pet_id)
    {
        $pet = Booking::where('pet_id', $pet_id)
            ->select('booking.status', 'booking.trainer_name', 'booking.book_id')
            ->get();

        return view('owner.petTraining-history', compact('pet'));
    }
}
