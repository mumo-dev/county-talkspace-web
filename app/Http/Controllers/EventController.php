<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{

    public function __construct()
    {
        # code...
    }

    public function index()
    {
        
     
        return view('admin.events');
    }

    public function create()
    {
     
        return view('admin.events-create');
    }

    public function store(Request $request)
    {
        //validate
        $this->validate($request, [
            'name'=>'required',
            'start_time'=>'required|date|after:today',
            'location'=>'required',
            'description'=>'required',
        ]);

        Event::create([
            'name'=>$request->name,
            'start_time' => $request->start_time,
            'location' => $request->location,
            'description' => $request->description,
            'guests' => $request->guests
        ]);

        return redirect()->route('admin.events')->withMessage('Event created successfully');
       
    }
}
