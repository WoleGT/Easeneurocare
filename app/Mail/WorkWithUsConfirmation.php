<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WorkWithUsConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($workwithus)
    {
        $this->workwithus = $workwithus;
    }


    public function build()
    {
        return $this->subject('Work With Us Confirmation')
                    ->view('emails.workwithus_confirmation')
                    ->with(['workwithus' => $this->workwithus]);
    }
    
}

    
