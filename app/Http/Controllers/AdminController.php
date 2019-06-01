<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Audit;

class AdminController extends Controller
{
    
    public function __construct()
    {   
        $this->middleware(['auth','super-admin']);
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

    public function deleteAccount(Request $request)
    {
        $user = User::find($request->userId);
        $user->delete();
        return redirect()->back()->withMessage('User deleted successfully');
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

    public function getLogs()
    {
        $logs = Audit::latest()->paginate(50);
        return view('admin.logs',compact('logs'));
    }
}
