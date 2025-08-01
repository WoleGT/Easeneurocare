<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormSubmitted;

class ContactController extends Controller
{
    public function index()
    {
      return view('contact');
    }


    public function store(StoreContactRequest $request)
    
{
    $contact = Contact::create($request->validated());    

     try {
    Mail::to('info@easeneurocare.org')->send(new ContactFormSubmitted($contact));
    } catch (\Exception $e) {
    \Log::error('Mail sending failed: ' . $e->getMessage());
   }

    return back()->with('success', 'Your message has been submitted.');
}


}


