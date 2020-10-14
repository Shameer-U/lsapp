<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller /*changed HomeCotroller to DashboardController*/
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('/dashboard')->with('posts', $user->posts);/* since we added relationship between User and Post we can write like this */
        /*chages view name from 'home' to 'dashboard' */
    }
}
