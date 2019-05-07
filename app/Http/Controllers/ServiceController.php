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

    public function create()
    {
        return view('services.create');
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
        
        auth()->user()->services()->create($data);

        return response()->json([
            'message'=>'Service request successful'
        ]);

    }
}
