<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Item;
use App\Models\Payment;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function showAdsPage()
    {
        $items = Item::where('user_id', auth()->id())->get();
        return view('ads.index', compact('items'));
    }

    public function createAd(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'ad_type' => 'required|in:paid,free',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        Ad::create([
            'item_id' => $request->item_id,
            'ad_type' => $request->ad_type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        // Payment::create([
        //     'seller_id' => auth()->id(),
        //     'amount' => $request->amount,
        //     'payment_status' => 'completed',
        //     'transaction_id' => uniqid('txn_', true),
        // ]);

        return redirect()->route('ads')->with('success', 'Ad created successfully!');
    }
}
