<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Item;
use App\Models\Click;
use Illuminate\Support\Facades\DB;

class PerformanceController extends Controller
{
    public function performance()
    {
        // Get the date 7 days ago
        $startDate = Carbon::now()->subDays(7);
        $endDate = Carbon::now();

        // Fetch items listed and format the dates for Chart.js
        $itemsListed = Item::whereBetween('created_at', [$startDate, $endDate])
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->pluck('count', 'date')
            ->mapWithKeys(function ($count, $date) {
                return [Carbon::parse($date)->format('Y-m-d') => $count];
            });

        // Fetch clicks and format dates
        $itemClicks = Item::whereBetween('created_at', [$startDate, $endDate])
        ->select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(click_count) as total_clicks'))
        ->groupBy(DB::raw('DATE(created_at)'))
        ->get()
        ->mapWithKeys(function ($item) {
            return [Carbon::parse($item->date)->format('Y-m-d') => $item->total_clicks];
        });
        // $itemClicks = Click::whereBetween('created_at', [$startDate, $endDate])
        //     ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
        //     ->groupBy('date')
        //     ->pluck('count', 'date')
        //     ->mapWithKeys(function ($count, $date) {
        //         return [Carbon::parse($date)->format('Y-m-d') => $count];
        //     });

        // Fetch mobile views and format dates
        $mobileViews = Click::whereBetween('created_at', [$startDate, $endDate])
            ->where('device_type', 'mobile')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->pluck('count', 'date')
            ->mapWithKeys(function ($count, $date) {
                return [Carbon::parse($date)->format('Y-m-d') => $count];
            });

        return view('performance.index', compact('itemsListed', 'itemClicks', 'mobileViews'));
    }
}
