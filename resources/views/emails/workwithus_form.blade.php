<h2>New Application Submitted</h2>

<p><strong>Name:</strong> {{ $workwithus->first_name }} {{ $workwithus->last_name }}</p>
<p><strong>Email:</strong> {{ $workwithus->email }}</p>
<p><strong>Phone:</strong> {{ $workwithus->phone_number ?? 'N/A' }}</p>
<p><strong>Role Applied For:</strong> {{ ucfirst($workwithus->role) }}</p>

@if($workwithus->cv_path)
<p><strong>CV:</strong> Attached</p>
@endif

@if($workwithus->statement_path)
<p><strong>Personal Statement:</strong> Attached</p>
@endif
