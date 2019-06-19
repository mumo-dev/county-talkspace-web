<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Comment;
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
        return view('admin.reports', compact('total_user'));
    }


    public function getReports(Request $request)
    {
        $startDate = $request->query('start');
        $endDate = $request->query('end');
        $from = date($startDate);
        $to = date($endDate);

        $new_users = User::where('user_type', 0)->whereBetween('created_at', [$from, $to])->get()->count();
        $total_posts = Post::whereBetween('created_at', [$from, $to])->get()->count();

        $opinion = Post::where('tag','opinion')->whereBetween('created_at', [$from, $to])->get()->count();
        $complains = Post::where('tag','complain')->whereBetween('created_at', [$from, $to])->get()->count();
        $enquiry = Post::where('tag','enquiry')->whereBetween('created_at', [$from, $to])->get()->count();

        if($total_posts == 0){
            $opinionCount = 0;
            $complainCount = 0;
            $enquiryCount = 0;
        }else {
            $opinionCount = round($opinion / $total_posts * 100);

            $complainCount = round($complains / $total_posts * 100);

            $enquiryCount = round($enquiry / $total_posts * 100);
        }

        //here
        $poll_participate = Vote::select('user_id')->whereBetween('created_at', [$from, $to])->distinct()->get()->count();
        $total_users = User::whereDay('created_at', '<=', $to)->where('user_type',0)->get()->count();
        if($total_users > 0){
          $poll_perc = round($poll_participate / $total_users * 100);
        }
        else {
            $poll_perc = 0;
        }


        $polls = Poll::whereBetween('created_at', [$from, $to])->get()->count();

        $services = Service::whereBetween('created_at', [$from, $to])->get()->count();
        $ambulances = Service::where('type','ambulance')->whereBetween('created_at', [$from, $to])->get()->count();
        $fire = Service::where('type','firefighting')->whereBetween('created_at', [$from, $to])->get()->count();

        if($services > 0){
            $amb_perc = round($ambulances / $services * 100);
            $fire_perc = round($fire / $services * 100);
        }else {
            $amb_perc = 0;
            $fire_perc = 0;
        }

        $events = Event::whereBetween('created_at', [$from, $to])->get()->count();
        $news = News::whereBetween('created_at', [$from, $to])->get()->count();


        $complains = Post::whereBetween('created_at', [$from, $to])->where('tag', 'complain')->get();
        $enquirys = Post::whereBetween('created_at', [$from, $to])->where('tag', 'enquiry')->get();

        $admins = User::select('id')->where('user_type','>', 0)->get()->map(function($item){
            return $item['id'];
        });


        $complainComments = 0;
        $complains->map(function($complain) use ($admins, &$complainComments){
            $count = $complain->comments()->whereIn('user_id', $admins)->get()->count();
            if($count > 0){
                $complainComments += 1;
            }
        });

        $enquiryComments = 0;

        $enquirys->map(function($enquiry) use ($admins,&$enquiryComments){
            $count = $enquiry->comments()->whereIn('user_id', $admins)->get()->count();
            if($count > 0){
                $enquiryComments += 1;
            }
        });


        if(count($complains)> 0){
            $responseRateComplains = round($complainComments /count($complains) * 100);
        }else {
            $responseRateComplains = 0;
        }

        if(count($enquirys)> 0){
            $responseRateEnquiries = round($enquiryComments/ count($enquirys) * 100);
        }else {
            $responseRateEnquiries = 0;
        }

        return response()->json([
            'users'=> $new_users,
            'posts'=> $total_posts,
            'opinion' => $opinionCount,
            'complain' => $complainCount,
            'enquiry' => $enquiryCount,
            'pollPartcipants' => $poll_participate,
            'polls'=>$polls,
            'services'=>$services,
            'events' => $events,
            'news'=>$news,
            'ambulance_perc'=>$amb_perc,
            'fire_perc'=>$fire_perc,
            'response_rate_complains' => $responseRateComplains,
            'response_rate_enquiries' => $responseRateEnquiries
        ]);
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




    public function userStats()
    {

        return view('stats');
    }


    public function getStats()
    {
        $total_posts = Post::all()->count();
        $opinion = Post::where('tag','opinion')->get();
        $complains = Post::where('tag','complain')->get();
        $enquirys = Post::where('tag','enquiry')->get();

        if($total_posts == 0){
            $opinionCount = 0;
            $complainCount = 0;
            $enquiryCount = 0;
        }else {
            $opinionCount = round(count($opinion) / $total_posts * 100);

            $complainCount = round(count($complains) / $total_posts * 100);

            $enquiryCount = round(count($enquirys) / $total_posts * 100);
        }

        $admins = User::select('id')->where('user_type','>', 0)->get()->map(function($item){
            return $item['id'];
        });


        $complainComments = 0;
        $complains->map(function($complain) use ($admins, &$complainComments){
            $count = $complain->comments()->whereIn('user_id', $admins)->get()->count();
            if($count > 0){
                $complainComments += 1;
            }
        });

        $enquiryComments = 0;

        $enquirys->map(function($enquiry) use ($admins,&$enquiryComments){
            $count = $enquiry->comments()->whereIn('user_id', $admins)->get()->count();
            if($count > 0){
                $enquiryComments += 1;
            }
        });


        if(count($complains)> 0){
            $responseRateComplains = round($complainComments /count($complains) * 100);
        }else {
            $responseRateComplains = 0;
        }

        if(count($enquirys)> 0){
            $responseRateEnquiries = round($enquiryComments/ count($enquirys) * 100);
        }else {
            $responseRateEnquiries = 0;
        }

        return response()->json([
            'opinions'=> $opinionCount,
            'complains' => $complainCount,
            'enquiries' => $enquiryCount,
            'response_rate_complains' => $responseRateComplains,
            'response_rate_enquiries' => $responseRateEnquiries
        ]);


    }
}
