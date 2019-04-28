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
        $events = Event::paginate(20);
     
        return view('admin.events.events', compact('events'));
    }

    public function show(Event $event)
    {
        return view('admin.events.event-show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('admin.events.event-edit', compact('event'));
    }

    public function create()
    {
     
        return view('admin.events.events-create');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'start_time'=>'required|date|after:today',
            'location'=>'required',
            'description'=>'required',
        ]);
        $event = Event::find($request->id);
        $event->name = $request->name;
        $event->start_time = $request->start_time;
        $event->location = $request->location;
        $event->description = $request->description;
        $event->guests = $request->guests;
        $event->save();

        return redirect()->route('admin.event.show', $event->id)
                        ->withMessage('Event updated successfully');
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

    public function delete(Request $request)
    {
      
        $event = Event::find($request->id);
        $event->delete();

        return redirect()->route('admin.events')
                        ->withMessage('Event deleted successfully');
    }
}
