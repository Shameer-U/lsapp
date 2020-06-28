<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        if(empty(session('id')) ){
            return redirect('/users'); 
        }

        $user_id = session('id');
        $user = User::find($user_id);
        return view('dashboard')->with('posts', $user->posts);/* since we added relationship between User and Post we can write like this */
    }
}
