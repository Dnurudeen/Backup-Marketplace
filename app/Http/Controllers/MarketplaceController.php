<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Click;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;

class MarketplaceController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve the search query
        // $query = $request->input('search');
        $query = Item::query();

        // Search the 'name', 'description', or other relevant fields in the items table
        if ($request->has('search') && !empty($request->input('search'))) {
            $query->where('name', 'LIKE', '%' . $request->input('search') . '%')
                    ->orWhere('description', 'LIKE', '%' . $request->input('search') . '%')
                    ->paginate(10);  // paginate results
        }


        if ($request->has('category_id') && !empty($request->input('category_id'))) {
            $query->where('category_id', $request->input('category_id'));
        }

        if ($request->has('item_type') && !empty($request->input('item_type'))) {
            $query->where('item_type', $request->input('item_type'));
        }

        if ($request->has('condition') && !empty($request->input('condition'))) {
            $query->where('condition', $request->input('condition'));
        }

        if ($request->has('make') && !empty($request->input('make'))) {
            $query->where('make', 'like', '%' . $request->input('make') . '%');
        }

        if ($request->has('region') && !empty($request->input('region'))) {
            $query->where('location', $request->input('region'));
        }

        if ($request->has('year') && !empty($request->input('year'))) {
            $query->whereYear('manufaction_year', $request->input('year'));
        }

        if ($request->has('min_price') && !empty($request->input('min_price'))) {
            $minPrice = (int) filter_var($request->input('min_price'), FILTER_SANITIZE_NUMBER_INT);
            $query->where(DB::raw("CAST(REPLACE(REPLACE(REPLACE(price, '₦', ''), ',', ''), '.00', '') AS UNSIGNED)"), '>=', $minPrice);
        }

        if ($request->has('max_price') && !empty($request->input('max_price'))) {
            $maxPrice = (int) filter_var($request->input('max_price'), FILTER_SANITIZE_NUMBER_INT);
            $query->where(DB::raw("CAST(REPLACE(REPLACE(REPLACE(price, '₦', ''), ',', ''), '.00', '') AS UNSIGNED)"), '<=', $maxPrice);
        }

        // Get the filtered results
        // $items = $query->get();

        // Get the filtered results with eager loading
        $items = $query->with('user.subscriptions')->get();

        // // $items = $query->paginate(10);
        $categories = Category::all();


        // Sort items by active subscriptions first
        $sortedItems = $items->sortByDesc(function ($item) {
            return $item->user && $item->user->subscriptions
                ->where('status', 'active')
                ->where('expires_at', '>', now())
                ->isNotEmpty();
        });

        // Paginate after sorting
        $perPage = 8;
        $currentPage = \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage();
        $pagedItems = $sortedItems->slice(($currentPage - 1) * $perPage, $perPage)->all();

        // Manually create the paginator
        $items = new LengthAwarePaginator(
            $pagedItems,
            $sortedItems->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        $selectedCategory = $request->input('category_id');


        // $item = Item::findOrFail($id);

        // $agent = new Agent();

        // if ($agent->isMobile()) {
        //     // Handle mobile view logic
        //     $device = 'mobile';
        // } else {
        //     // Handle desktop view logic
        //     $device = 'desktop';
        // }

        // // Track clicks, including device type
        // Click::create([
        //     'item_id' => $item->id,
        //     'device_type' => $request->isMobile() ? 'mobile' : 'desktop',  // Detect device type
        // ]);


        return view('marketplace.index', compact('items', 'categories', 'selectedCategory'));
    }




    public function viewItem($id)
    {
        $item = Item::with('category', 'seller')->findOrFail($id);

        $relatedAds = Item::where('id', $item->id)
        ->where(function ($query) use ($item) {
            $query->where('name', 'like', '%' . $item->name . '%')
                ->orWhere('category_id', 'like', '%' . $item->category_id . '%')
                ->orWhere('model',  'like', '%' . $item->model . '%');
        })->limit(6)->get();

        // $cat = Item::where('category_id', $categories->name);


        // Fetch the items with pagination (16 items per page)
        // $items = Item::orderBy('created_at', 'desc')->paginate(16);

        $dealers_ads = Item::where('user_id', $item->user_id)->where('id','!=',$item->id)->latest()->get();


        // Get active subscribed sellers
        $items = Item::with('user')
        ->whereHas('user.subscriptions', function ($query) {
            $query->where('status', 'active')
                  ->where('expires_at', '>', now());
        })
        ->orWhereDoesntHave('user.subscriptions') // If you want to show non-subscribers too
        ->get();

        // Fetch all items with the user and subscriptions relationships
        // $items = Item::with('user.subscriptions')->paginate(16);

        // Sort items by active subscriptions first


        return view('marketplace.item', compact('item', 'relatedAds', 'dealers_ads', 'items'));
    }


    // public function trackItemClick(Request $request)
    // {
    //     $agent = new Agent();

    //     if ($agent->isMobile()) {
    //         // Handle mobile view logic
    //         $device = 'mobile';
    //     } else {
    //         // Handle desktop view logic
    //         $device = 'desktop';
    //     }

    //     // Save the click data (assuming you have a Click model)
    //     Click::create([
    //         'item_id' => $request->input('item_id'),
    //         'device_type' => $device,
    //         // other click data...
    //     ]);

    //     return response()->json(['status' => 'success']);
    // }
}
