<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDonationRequest;
use App\Models\Donation;
use Illuminate\Support\Facades\Mail;
use App\Mail\DonationFormSubmitted;
use App\Http\Controllers\Controller; 

class DonationController extends Controller
{
    public function store(StoreDonationRequest $request)
    {
        $donation = Donation::create($request->validated());

        Mail::to('info@easeneurocare.org')->send(new DonationFormSubmitted($donation));

        return back()->with('success', 'Thank you for your donation! we will contact you soon.');
    }
}
?>

