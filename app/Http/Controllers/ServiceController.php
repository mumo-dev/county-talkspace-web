<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Requests\ServiceRequest;
use App\Service;

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

        return response()->json([
            'message'=>'Service request successful',
            'data'=>$service
        ]);

    }

    public function show(Service $service)
    {
        # code...
    }


    public function fetchAllByUserServices($userId)
    {
        $services = Service::where('user_id', $userId)->latest()->paginate(30);
        return response()->json($services, 200);
    }
}
