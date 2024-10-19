<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Item;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class AdminController extends Controller
{
    public function dashboard()
    {
        $userCount = User::count();
        $itemCount = Item::count();
        $subscriptionCount = Subscription::count();
        return view('admin.dashboard', compact('userCount', 'itemCount', 'subscriptionCount'));
    }
}

