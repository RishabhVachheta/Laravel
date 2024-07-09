<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CFPGPayment;
use Illuminate\Support\Facades\Log;

class CFPGPaymentController extends Controller
{
    public function create(Request $request)
    {
        return view('payment-create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'mobile' => 'required',
            'amount' => 'required'
        ]);

        $url = "https://sandbox.cashfree.com/pg/orders";

        $headers = array(
            "Content-Type: application/json",
            "x-api-version: 2022-01-01",
            "x-client-id: " . env('CASHFREE_API_KEY'),
            "x-client-secret: " . env('CASHFREE_API_SECRET')
        );

        $data = json_encode([
            'order_id' => 'order_' . rand(1111111111, 9999999999),
            'order_amount' => $validated['amount'],
            "order_currency" => "INR",
            "customer_details" => [
                "customer_id" => 'customer_' . rand(111111111, 999999999),
                "customer_name" => $validated['name'],
                "customer_email" => $validated['email'],
                "customer_phone" => $validated['mobile'],
            ],
            "order_meta" => [
                "return_url" => 'http://127.0.0.1:8000/cashfree/payments/success/?order_id={order_id}&order_token={order_token}'
            ]
        ]);

        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0); // Disable SSL host verification
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // Disable SSL peer verification


        $resp = curl_exec($curl);

        if ($resp === false) {
            $curlError = curl_error($curl);
            Log::error('CURL error: ' . $curlError);
            return redirect()->back()->with('error', 'Failed to connect to payment gateway: ' . $curlError);
        }

        curl_close($curl);

        Log::info('Raw response: ' . $resp);

        $decodedResp = json_decode($resp);

        if (json_last_error() !== JSON_ERROR_NONE) {
            Log::error('JSON decode error: ' . json_last_error_msg());
            return redirect()->back()->with('error', 'Failed to decode JSON response.');
        }

        Log::info('Decoded response: ', (array) $decodedResp);

        if (isset($decodedResp->payment_link)) {
            // Save the payment data to the database
            CFPGPayment::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'mobile' => $validated['mobile'],
                'amount' => $validated['amount'],
                'purpose' => 'Order Payment', // Add any purpose you want
                'payment_request_id' => $decodedResp->order_id, // Adjust as per the response structure
                'payment_link' => $decodedResp->payment_link,
                'payment_status' => 'Pending'
            ]);

            return redirect()->to($decodedResp->payment_link);
        } else {
            Log::error('Payment link not found in response.', (array) $decodedResp);
            return redirect()->back()->with('error', 'Payment link not found in response.');
        }
    }


    public function success(Request $request)
    {
        $orderId = $request->query('order_id');
        $paymentStatus = $request->query('payment_status'); // Example parameter from payment gateway

        // Find the payment entry by order_id and update the status
        $payment = CFPGPayment::where('payment_request_id', $orderId)->first();

        if ($payment) {
            $payment->update([
                'payment_status' => 'Completed', // Update with actual status
                'payment_id' => $request->query('payment_id') // Example parameter from payment gateway
            ]);

            return view('payment-success', compact('payment'));
        } else {
            return redirect()->back()->with('error', 'Payment not found.');
        }
    }
}
