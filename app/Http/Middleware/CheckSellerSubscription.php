<?php

namespace App\Http\Middleware;

use App\Models\Subscription;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class CheckSellerSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Get the logged-in seller's subscription
        $subscription = Subscription::where('seller_id', auth()->id())
        ->where('status', 'active')
        ->where('expires_at', '>', Carbon::now())
        ->first();

        // If no active subscription, redirect with an error message
        if (!$subscription) {
        return redirect()->route('subscribe')->with('error', 'You need an active subscription to access this page.');
        }

        return $next($request);
    }
}
