<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function showSubscriptionPage()
    {
        $subscriptions = Subscription::where('seller_id', auth()->id())->get();

        return view('subscriptions.index', compact('subscriptions')); // Display subscription page
    }


    public function subscribe(Request $request)
    {
        $request->validate([
            'plan_type' => 'required|in:weekly,monthly,yearly',
        ]);


        // Define the plan amounts
        $plans = [
            'weekly' => 5000,   // $10 for weekly plan
            'monthly' => 10000,  // $30 for monthly plan
            'yearly' => 15000,  // $300 for yearly plan
        ];

        // Get the selected plan type and corresponding amount
        $planType = $request->plan_type;
        $amount = $plans[$planType];

        // Set expiration date based on plan type
        if ($planType == 'weekly') {
            $expiresAt = Carbon::now()->addWeek();
        } elseif ($planType == 'monthly') {
            $expiresAt = Carbon::now()->addMonth();
        } else {
            $expiresAt = Carbon::now()->addYear();
        }

        // Calculate expiration date
        // $expiresAt = Carbon::now();
        // if ($request->plan_type === 'weekly') $expiresAt->addWeek();
        // if ($request->plan_type === 'monthly') $expiresAt->addMonth();
        // if ($request->plan_type === 'yearly') $expiresAt->addYear();

        // $user = auth()->user();

        // Create or update the subscription record for the seller
        $subscription = Subscription::updateOrCreate(
            ['seller_id' => auth()->id()],
            // ['user_id' => $user->id],
            ['user_id' => auth()->id()],
            [
                'plan_type' => $planType,
                'status' => 'active',
                'expires_at' => $expiresAt,
            ]
        );

        // Assume payment is successful and generate a transaction ID
        $transactionId = uniqid('txn_'); // You can replace this with actual payment processing logic

        // Save payment details to the payments table
        Payment::create([
            'seller_id' => auth()->id(),
            'amount' => $amount,
            'payment_status' => 'completed',
            'transaction_id' => $transactionId,
        ]);

        // Create subscription
        // Subscription::create([
        //     'seller_id' => auth()->id(),
        //     'plan_type' => $request->plan_type,
        //     'status' => 'active',
        //     'expires_at' => $expiresAt,
        // ]);

        // Payment::create([
        //     'seller_id' => auth()->id(),
        //     'amount' => $request->amount,
        //     'payment_status' => 'completed',
        //     'transaction_id' => uniqid('txn_', true),
        // ]);

        return redirect()->route('subscribe')->with('success', 'Subscription created successfully!');
    }
}
