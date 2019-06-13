<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\ServiceRequested;
use  App\Http\Requests\ServiceRequest;
use App\Service;
use App\User;
use App\Comment;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('services.index');
    }



    public function store(ServiceRequest $request)
    {
        $data = $request->validated();

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = uniqid(). '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $imagename);
            $data['image_url'] = $imagename;
        }

        $service = auth()->user()->services()->create($data);

        $admins = User::where('user_type','!=',0)->get();

        //notify all admins of service request
        foreach($admins as $admin){
            $admin->notify(new ServiceRequested($service));
        }

        return response()->json([
            'message'=>'Service request successful',
            'data'=>$service
        ]);

    }

    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }


    public function fetchAllByUserServices($userId)
    {
        $services = Service::where('user_id', $userId)->latest()->paginate(30);
        return response()->json($services, 200);
    }

    public function storeComment(Request $request)
    {
        $message = $request->comment;
        $serviceId = $request->serviceId;

        $service = Service::find($serviceId);

        $comment = new Comment();
        $comment->message = $message;
        $comment->user_id = auth()->user()->id;

        $comment =$service->comments()->save($comment);

        return response()->json($comment);
    }

    public function fetchComments($id)
    {
        $comments = Service::find($id)->comments()->with('user')->get();
        return response()->json($comments);
    }

    // Admin methodss;;;


    public function adminIndex()
    {
        $services = Service::with('user')->latest()->paginate(20);
        return view('admin.services.index', compact('services'));
    }

    public function adminShow($id)
    {
        $service = Service::with('user')->findOrFail($id);
        if($service->status == 0){
            $service->status = 1;
            $service->save();
        }

        return view('admin.services.show', compact('service'));
    }


}
