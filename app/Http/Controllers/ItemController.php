<?php

namespace App\Http\Controllers;

use App\Models\Click;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Jenssegers\Agent\Agent;

class ItemController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'location' => 'required|string|max:255',
            'images' => 'required|array|min:2|max:15',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'youtube_link' => 'nullable|url',
            'name' => 'required|string|max:255',
            'item_type' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'manufaction_year' => 'required|string|max:4',
            'make' => 'required|string|max:25',
            'condition' => 'required|string',
            'exchange_possible' => 'required|boolean',
            'description' => 'required|string',
            'price' => 'required|string',
            'negotiable' => 'required|boolean',
        ]);


        // Process image uploads and store paths in an array
        $imagePaths = [];
        foreach ($request->file('images') as $imageFile) {
            $imagePath = $imageFile->store('images', 'public');  // Store image in 'public/images' folder
            $imagePaths[] = $imagePath;
        }


        // Create the item
        $item = Item::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'category_id' => $request->category_id,
            'location' => $request->location,
            'youtube_link' => $request->youtube_link,
            'item_type' => $request->item_type,
            'model' => $request->model,
            'manufacture_year' => $request->manufacture_year,
            'make' => $request->make,
            'condition' => $request->condition,
            'exchange_possible' => $request->exchange_possible ?? false,
            'description' => $request->description,
            'price' => $request->price,
            'negotiable' => $request->negotiable ?? true,
            'images' => json_encode($imagePaths),  // Store image paths as JSON
        ]);

        // Create new item
        // $item = new Item();
        // $item->category_id = $request->category_id;
        // $item->user_id = auth()->id();
        // $item->location = $request->location;
        // // $item->images = json_encode($images);
        // // $item->images = $images;
        // $item->youtube_link = $request->youtube_link;
        // $item->name = $request->name;
        // $item->item_type = $request->item_type;
        // $item->model = $request->model;
        // $item->manufaction_year = $request->manufaction_year;
        // $item->condition = $request->condition;
        // $item->exchange_possible = $request->exchange_possible;
        // $item->description = $request->description;
        // $item->price = $request->price;
        // $item->negotiable = $request->negotiable;
        // $item->save();


        // Store and associate images with the item
        // foreach ($request->file('images') as $imageFile) {
        //     $imagePath = $imageFile->store('images', 'public');  // Store image in 'public/images' folder
        //     Image::create([
        //         'item_id' => $item->id,
        //         'image_path' => $imagePath,
        //     ]);
        // }


        return redirect()->route('seller.items')->with('success', 'Item listed successfully!');
    }

    public function show($id, Request $request)
    {
        $agent = new Agent();

        $item = Item::findOrFail($id);

        // Count the number of images
        $imageCount = $item->images->count();

        if ($agent->isMobile()) {
            // Handle mobile view logic
            $device = 'mobile';
        } else {
            // Handle desktop view logic
            $device = 'desktop';
        }

        // Track clicks, including device type
        Click::create([
            'item_id' => $item->id,
            'device_type' => $request->isMobile() ? 'mobile' : 'desktop',  // Detect device type
        ]);

        return view('seller.items.show', compact('item', 'imageCount'));
    }

    public function trackClick(Request $request, $id)
    {
        $item = Item::findOrFail($id);

        // Increment the click count
        $item->increment('click_count');

        // Redirect to the item detail page
        return redirect()->route('item.view', $id);
    }

}
