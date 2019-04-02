<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
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
        return view('home');
    }

    // 
    public function adminHome()
    {
        return view('admin.home');
    }

    public function showProfile(User $user)
    {
        if($user->user_type > 0){
            $user = null;
        }
        return view('profile', compact('user'));
    }
}
