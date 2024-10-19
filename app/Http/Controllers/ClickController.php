<?php

namespace App\Http\Controllers;

use App\Models\Click;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class ClickController extends Controller
{
    public function trackItemClick(Request $request)
    {
        $agent = new Agent();

        // Determine the device type: mobile or desktop
        $device = $agent->isMobile() ? 'mobile' : 'desktop';

        // Save the click data to the database
        Click::create([
            'item_id' => $request->input('item_id'),
            'device_type' => $device,
        ]);

        return response()->json(['status' => 'success']);
    }

    public function trackClick(Request $request, $id)
    {
        $item = Click::findOrFail($id);

        // Increment the click count
        $item->increment('click_count');

        // Redirect to the item detail page
        return redirect()->route('item.view', $id);
    }
}
