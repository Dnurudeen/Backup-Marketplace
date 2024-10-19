<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function index()
    {
        $items = Item::where('user_id', auth()->id())->get();
        return view('seller.index', compact('items'));
    }
    public function faq(){
        return view('seller.faq');
    }
    public function personalInfo(){
        return view('seller.personal-info');
    }
    public function deleteAccount(){
        return view('seller.delete-account');
    }
    public function updateInfo(Request $request){
        $request->validate([
            'seller_phone' => 'required|string',
            'seller_gender' => 'required|string',
            'seller_location' => 'required|string',
        ]);

        // $user = User::findOrFail($id);
        $user = Auth::user();
        // $user = auth()->user();
        $user->phone = $request->input('seller_phone');
        $user->gender = $request->input('seller_gender');
        $user->location = $request->input('seller_location');

        $user->update($request->all());
        return redirect()->route('personal.info')->with('success', 'Profile updated successfully.');
    }

    public function createItem()
    {
        $categories = Category::all();
        // $categories = Category::with('subcategories')->get();

        return view('seller.create-item', compact('categories'));
    }

    public function storeItem(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'condition' => 'required|in:new,foreign_used,nigerian_used',

            'images' => 'required|array|min:2|max:15', // Ensure at least 2 and at most 15 images
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Each image validation

            'location' => 'required|string|max:255',
            'youtube_link' => 'required|string|max:255',
            'item_type' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            // 'manufaction_year' => 'required|string|max:255',
            'exchange_possible' => 'required|string|max:255',
            'negotiable' => 'numeric',
        ]);

        Item::create(array_merge($request->all(), ['user_id' => auth()->id()]));
        return redirect()->route('seller.items')->with('success', 'Item listed successfully.');
    }

    public function editItem($id)
    {
        $item = Item::findOrFail($id);
        $categories = Category::all();
        return view('seller.edit-item', compact('item', 'categories'));
    }

    public function updateItem(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'condition' => 'required|in:new,foreign_used,nigerian_used',

            'location' => 'required|string|max:255',
            'youtube_link' => 'required|string|max:255',
            'item_type' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            // 'manufaction_year' => 'required|string|max:255',
            'exchange_possible' => 'required|string|max:255',
            'negotiable' => 'numeric',
        ]);

        $item = Item::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('seller.items')->with('success', 'Item updated successfully.');
    }

    public function destroyItem($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()->route('seller.items')->with('success', 'Item deleted successfully.');
    }

    public function destroyAccount(){
        // $user = User::findOrFail($id);
        $user = Auth::user();

        // Delete related items first to avoid foreign key constraint errors
        $user->items()->delete();

        // Now delete the user
        $user->delete();

        // return view('logout');
        return redirect()->route('login')->with('success', 'Account deleted successfully.');
    }
}

