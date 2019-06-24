<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Audit;
use Carbon\Carbon;

class EventController extends Controller
{

    public function __construct()
    {
        # code...
    }

    public function index()
    {
        $upcomingEvents = Event::where('start_time', '>=', date('Y-m-d').' 00:00:00')
                            ->orderBy('created_at')
                            ->paginate(20);
        $pastEvents = Event::where('start_time', '<', date('Y-m-d').' 00:00:00')
                            ->orderBy('created_at')
                            ->paginate(20);

        return view('admin.events.events', compact('upcomingEvents', 'pastEvents'));
    }


    public function showEvents()
    {
        $upcomingEvents = Event::where('start_time', '>=', date('Y-m-d').' 00:00:00')
                            ->orderBy('created_at')
                            ->paginate(20);
        $pastEvents = Event::where('start_time', '<', date('Y-m-d').' 00:00:00')
                        ->orderBy('created_at')
                        ->paginate(20);

        return view('events', compact('upcomingEvents','pastEvents'));
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
            'end_time'=>'required|date|after:today',
            'location'=>'required',
            'description'=>'required',
        ]);

        // $startTime = $request->start_time;
        // $endTime  = $request->end_time;

        // $events = Event::where('location', $request->location)->get();
        // if($events != null){
        //     foreach($events as $event){

        //         if($startTime >= $event->start_time && $startTime <= $event->end_time && $event->id !=){
        //             return redirect()->back()->withMessage('Another event has been scheduled at that location at that time');
        //         }

        //         if($startTime < $event->start_time && ($endTime > $event->start_time && $endTime < $event->end_time)){
        //             return redirect()->back()->withMessage('Another event has been scheduled at  that location at that time');
        //         }
        //     }
        // }

        $event = Event::find($request->id);
        $event->name = $request->name;
        $event->start_time = $request->start_time;
        $event->end_time = $request->end_time;
        $event->location = $request->location;
        $event->description = $request->description;
        $event->guests = $request->guests;
        $event->save();

         //store audit record
         Audit::create([
            'user_id'=>auth()->user()->id,
            'type'=>'Event',
            'action' =>'update'
        ]);

        return redirect()->route('admin.event.show', $event->id)
                        ->withMessage('Event updated successfully');
    }

    public function store(Request $request)
    {
        //validate
        $this->validate($request, [
            'name'=>'required',
            'start_time'=>'required|date|after:today',
            'end_time'=>'required|date|after:today',
            'location'=>'required',
            'description'=>'required',
        ]);

        $startTime = $request->start_time;
        $endTime  = $request->end_time;

        $events = Event::where('location', $request->location)->get();
        if($events != null){
            foreach($events as $event){

                if($startTime >= $event->start_time && $startTime <= $event->end_time){
                    return redirect()->back()->withMessage('Another event has been scheduled at that location at that time');
                }

                if($startTime < $event->start_time && ($endTime > $event->start_time && $endTime < $event->end_time)){
                    return redirect()->back()->withMessage('Another event has been scheduled at  that location at that time');
                }
            }
        }

        Event::create([
            'name'=>$request->name,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'location' => $request->location,
            'description' => $request->description,
            'guests' => $request->guests
        ]);

         //store audit record
         Audit::create([
            'user_id'=>auth()->user()->id,
            'type'=>'Event',
            'action' =>'create'
        ]);

        return redirect()->route('admin.events')->withMessage('Event created successfully ');

    }

    public function delete(Request $request)
    {

        $event = Event::find($request->id);
        $event->delete();

         //store audit record
         Audit::create([
            'user_id'=>auth()->user()->id,
            'type'=>'Event',
            'action' =>'create'
        ]);

        return redirect()->route('admin.events')
                        ->withMessage('Event deleted successfully');
    }
}
