<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Models\WorkWithUs;
use App\Mail\WorkWithUsFormSubmitted;
use App\Mail\WorkWithUsConfirmation;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class WorkwithUsController extends Controller
{
    
  public function index()
    {
        return view('workwithus');
    }

    
  public function store(Request $request)
    {
        // 1. Validate inputs
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone_number' => 'nullable|string|max:20',
            'role' => 'required|string|max:50',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'statement' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // 2. Handle file uploads
        $cvPath = $request->hasFile('cv') ? $request->file('cv')->store('cv_uploads', 'public') : null;
        $statementPath = $request->hasFile('statement') ? $request->file('statement')->store('statement_uploads', 'public') : null;

        // 3. Save to database
        $workwithus = WorkWithUs::create([
            ...$validatedData,
            'cv_path' => $cvPath,
            'statement_path' => $statementPath,
        ]);

        // 4. Send email to Admin with attachments
        Mail::to('info@easeneurocare.org')->send(new WorkWithUsFormSubmitted($workwithus));

        // 5. Send confirmation email to applicant
        Mail::to($workwithus->email)->send(new WorkWithUsConfirmation($workwithus));

        return back()->with('success', 'Application submitted successfully.');
    }
}
