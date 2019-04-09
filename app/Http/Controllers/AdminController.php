<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class AdminController extends Controller
{
    
    public function __construct()
    {   
        // $this->middleware('admin');
    }
    
    public function getAccounts()
    {

       $users = User::where('user_type',1)->get();

       return view('admin.accounts', compact('users'));
    }

    public function createAccount()
    {
       return view('admin.create-account');
    }

    public function storeAccount(Request $request){
        $this->validate($request, [
            'name'=>'required|unique:users',
            'email'=>'required|email:unique:users',
            'password'=>'required|min:8|confirmed'
        ]);

        User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'user_type'=> 1
        ]);

        return redirect()->route('admin.accounts')->with('message', 'Account created successfully');
    }
}
