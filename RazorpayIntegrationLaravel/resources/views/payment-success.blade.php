<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h4>Payment Success</h4>
            </div>
            <div class="card-body">
                <p><strong>Name:</strong> {{ $payment->name }}</p>
                <p><strong>Email:</strong> {{ $payment->email }}</p>
                <p><strong>Mobile:</strong> {{ $payment->mobile }}</p>
                <p><strong>Amount:</strong> {{ $payment->amount }}</p>
                <p><strong>Purpose:</strong> {{ $payment->purpose }}</p>
                <p><strong>Payment Request ID:</strong> {{ $payment->payment_request_id }}</p>
                <p><strong>Payment Status:</strong> {{ $payment->payment_status }}</p>
                @if ($payment->payment_id)
                <p><strong>Payment ID:</strong> {{ $payment->payment_id }}</p>
                @endif
            </div>
        </div>
        <button class="btn btn-success " type="button" onclick="window.location='http://127.0.0.1:8000/cashfree/payments/create'">make payment</button>
    </div>
</body>

</html>