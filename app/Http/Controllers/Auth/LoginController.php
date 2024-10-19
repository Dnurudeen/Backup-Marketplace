<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Redirect users after login based on their roles.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $user
     * @return mixed
     */
    // protected function authenticated(Request $request, $user)
    // {
    //     if ($user->hasRole('admin')) {
    //         // Redirect admins to the admin dashboard
    //         return redirect('/admin');
    //     } elseif ($user->hasRole('seller')) {
    //         // Redirect sellers to their item listing page
    //         return redirect('/seller/items');
    //     } else {
    //         // Default redirection for other users
    //         return redirect('/seller/items');
    //     }
    // }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Get the authenticated user
            $user = Auth::user();

            // Check if the user has a specific role
            if ($user->hasRole('seller')) {
                // Redirect to seller dashboard
                return redirect('/seller/items');
            } elseif ($user->hasRole('admin')) {
                // Redirect to admin dashboard
                return redirect('/admin');
            } else {
                // Default for other users
                return redirect('/seller/items');
            }
        }

        return back()->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
