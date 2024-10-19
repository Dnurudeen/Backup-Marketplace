<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function showPaymentsPage()
    {
        $payments = Payment::where('seller_id', auth()->id())->get();
        return view('payments.index', compact('payments')); // Display payments page
    }

    public function processPayment(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        // Simulate payment processing
        $payment = Payment::create([
            'seller_id' => auth()->id(),
            'amount' => $request->amount,
            'payment_status' => 'completed',
            'transaction_id' => uniqid('txn_', true),
        ]);

        return redirect()->route('payments')->with('success', 'Payment processed successfully!');
    }
}
