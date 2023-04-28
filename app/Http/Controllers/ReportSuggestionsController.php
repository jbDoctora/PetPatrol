<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ReportSuggestions;
use App\Http\Controllers\Controller;

class ReportSuggestionsController extends Controller
{
    //DEFAULT
    public function showHelpCenter()
    {
        return view('users.help');
    }

    //ADMIN SIDE
    public function showHelp()
    {
        $report = ReportSuggestions::all();

        return view('admin.help-center', compact('report'));
    }

    public function showAboutUs()
    {
        return view('users.about-us');
    }

    public function storeReport(Request $request)
    {
        $data = $request->validate([
            'name' => 'nullable',
            'description' => 'required',
            'report_type' => 'required'
        ]);
        $data['name'] = $request->input('name');
        $data['description'] = $request->input('description');
        $data['report_type'] = $request->input('report_type');
        ReportSuggestions::create($data);

        return redirect()->back()->with('message', 'Report/Inquiry successfully submitted');
    }

    public function showCancellation()
    {
        return view('users.cancellation-policy');
    }
}
