<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class UsersController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }
    
    
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $users = DB::table('users')
                ->where('email', '=', $email)
                ->where('password', '=', $password)
                ->get();

        if (count($users) === 1) {
            $request->session()->put('id', $users[0]->id);
            $request->session()->put('name', $users[0]->name);
            $request->session()->put('email', $users[0]->email);
            $request->session()->put('password', $users[0]->password);

            return redirect('/posts')->with('success', 'Login successfull');
        } 
        else 
        {
            return redirect('/users')->with('error', 'User does not exist');
        }
        
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
