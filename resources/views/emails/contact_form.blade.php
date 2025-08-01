<h2>New Contact Us/Appointment Booking Form Submission</h2>

<p><strong>Name:</strong> {{ $contact->first_name }} {{ $contact->last_name }}</p>
<p><strong>Email:</strong> {{ $contact->email }}</p>
<p><strong>Phone:</strong> {{ $contact->phone_number }}</p>
<p><strong>Subject:</strong> {{ $contact->subject }}</p>
<p><strong>Message:</strong> {{ $contact->message }}</p>

@if($contact->services)
<p><strong>Services:</strong> {{ $contact->services }}</p>
@endif

@if($contact->appointment_date)
<p><strong>Date:</strong> {{ $contact->appointment_date->format('F j, Y') }}</p>
@endif

@if($contact->appointment_time)
<p><strong>Time:</strong> {{ $contact->formatted_time }}</p>
@endif
