<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Event;
use App\News;
use App\Service;
use App\Poll;
use App\Vote;
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
        $users = User::where('user_type',0)->get();
        $total_user = count($users);

        $new_users = User::where('user_type', 0)->whereMonth('created_at', '=', date('m'))->get();
        $new_user_count = count($new_users);

        $total_posts = Post::all()->count();
        $total_posts_month = Post::whereMonth('created_at', '=', date('m'))->get()->count();
        $total_posts_today = Post::whereDay('created_at', '=', date('d'))->get()->count();

        $opinion = Post::where('tag','opinion')->get()->count();
        $complains = Post::where('tag','complain')->get()->count();
        $enquiry = Post::where('tag','enquiry')->get()->count();


        $opinionCount = round($opinion / $total_posts * 100);

        $complainCount = round($complains / $total_posts * 100);

        $enquiryCount = round($enquiry / $total_posts * 100);


        $last_month = Post::whereMonth('created_at', '=', date('m')-1)->get()->count();
        $current_month = Post::whereMonth('created_at', '=', date('m'))->get()->count();
        if($last_month > 0){
            $posts_increase = round($current_month / $last_month * 100);
        }else {
            $posts_increase = 100;
        }

        $yesterday = Post::whereDay('created_at', '=', date('d')-1)->get()->count();
        $today = Post::whereDay('created_at', '=', date('d'))->get()->count();
        if($yesterday > 0){
            $posts_increase_tday = round($today / $yesterday * 100);
        }else {
            $posts_increase_tday = 100;
        }

        $poll_participate = Vote::select('user_id')->distinct()->get()->count();

        $poll_perc = round($poll_participate / $total_user * 100);


        $polls = Poll::all()->count();

        $services = Service::all()->count();
        $ambulances = Service::where('type','ambulance')->get()->count();
        $fire = Service::where('type','firefighting')->get()->count();

        $amb_perc = round($ambulances / $services * 100);
        $fire_perc = round($fire / $services * 100);

        $events = Event::all()->count();
        $news = News::all()->count();

        return view('admin.reports', compact('total_user','new_user_count','total_posts','total_posts_month',
                'total_posts_today','opinionCount','complainCount','enquiryCount', 'polls','services',
                'events','news','posts_increase','posts_increase_tday','poll_perc','amb_perc','fire_perc'));
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
