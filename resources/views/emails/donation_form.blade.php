<h2>New Donation Form Submission</h2>

<p><strong>Full Name:</strong> {{ $donation->full_name }}</p>
<p><strong>Email:</strong> {{ $donation->email }}</p>
<p><strong>Frequency:</strong> {{ ucfirst($donation->frequency) }}</p>
<p><strong>Amount:</strong> ₦{{ number_format($donation->amount, 2) }}</p>
<p><strong>Payment Method:</strong> {{ ucwords(str_replace('_', ' ', $donation->payment_method)) }}</p>
