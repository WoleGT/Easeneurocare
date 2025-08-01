<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;
use App\Models\WorkWithUs;

class WorkWithUsFormSubmitted extends Mailable
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
        // Set the email subject and view
    $email = $this->subject('New WorkWithUs Form Submission')
                  ->view('emails.workwithus_form')
                  ->with(['workwithus' => $this->workwithus]);

    if ($this->workwithus->cv_path) {
        $cvFullPath = storage_path('app/public/' . $this->workwithus->cv_path);
        $originalName = basename($this->workwithus->cv_path);
        $email->attach($cvFullPath, [
            'as' => $originalName,
            'mime' => \Illuminate\Support\Facades\File::mimeType($cvFullPath),
        ]);
    }

    // Attach Statement
    if ($this->workwithus->statement_path) {
        $statementFullPath = storage_path('app/public/' . $this->workwithus->statement_path);
        $originalName = basename($this->workwithus->statement_path);
        $email->attach($statementFullPath, [
            'as' => $originalName,
            'mime' => \Illuminate\Support\Facades\File::mimeType($statementFullPath),
        ]);
    }

    return $email;
}

}
