<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Image;

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
        $opinionCount = Post::where('tag','opinion')->where('read', 0)->get()->count();
        $enquiryCount = Post::where('tag','enquiry')->where('read', 0)->get()->count();
        $complainsCount = Post::where('tag','complain')->where('read', 0)->get()->count();
        return view('admin.home', compact('opinionCount','complainsCount','enquiryCount'));
    }


    public function reports()
    {
        return view('admin.reports');
    }

    public function showProfile(User $user)
    {
        if($user->user_type > 0){
            $user = null;
        }
       

        return view('profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = User::find($request->id);

        $photoUrl = $user->photo_url;
   
        if($request->hasFile('image')){

            if($user->photo_url != null){
                //delete the file
                unlink(public_path('/images/thumbnails/'). $photoUrl);
                unlink(public_path('/images/'). $photoUrl);
            }
            
            $image  = $request->file('image');
            $imagename = uniqid(). '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/thumbnails');
            $img = Image::make($image->getRealPath());
            $img->resize(100, 100, function($constraint){
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imagename);

        
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $imagename);

            $user->photo_url = $imagename;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return response()->json([
            'message'=>'Profile updated successfully'
        ], 200);


    }
}
