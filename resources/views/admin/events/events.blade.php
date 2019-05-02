@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.home') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Events</li>
    </ol>

    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <div class="row ">
      <div class="col-md-12">
          {{-- <app-create-poll></app-create-poll> --}}
          <a class="btn btn-success btn-sm" href="{{ route('admin.event.create')}}">CREATE EVENT</a>
          <hr>
        <h5 class=" p-2 " style="background-color:#d3f6df"> Upcoming Events</h5>
         {{-- <app-polls v-bind:polls ="{{ $polls }}" :isadmin="true"></app-polls> --}}
         <div class="list-group">
         @forelse ($upcomingEvents as $event)
            
            <a href="{{ route('admin.event.show', $event->id)}}" class="list-group-item list-group-item-action">
                <div class="row">
                    <div class="col-sm-5 ">
                        {{ $event->name }}
                    </div>   
                    <div  class="col-sm-3">
                        <i class="fa fa-clock-o mx-2 text-info"></i> {{ $event->location }}
                    </div>
                    <div class="col-sm-4">
                        <i class="fa fa-calendar mx-2 text-info"></i>
                        {{\Carbon\Carbon::parse($event->start_time)->toDayDateTimeString()}}
                    </div> 
                </div>
            </a>
        
        @empty
            <p> No Events posted</p>
        @endforelse  
        </div>

        <div class="mt-3">
         {{ $upcomingEvents->links()}}
        </div>

        {{-- past events --}}

        <h5 class="p-2" style="background-color:#d3f6df"> Past Events</h5>
         {{-- <app-polls v-bind:polls ="{{ $polls }}" :isadmin="true"></app-polls> --}}
         <div class="list-group">
         @forelse ($pastEvents as $event)
            
            <a href="{{ route('admin.event.show', $event->id)}}" class="list-group-item list-group-item-action">
                <div class="row">
                    <div class="col-sm-5 ">
                        {{ $event->name }}
                    </div>   
                    <div  class="col-sm-3">
                        <i class="fa fa-clock-o mx-2 text-info"></i> {{ $event->location }}
                    </div>
                    <div class="col-sm-4">
                        <i class="fa fa-calendar mx-2 text-info"></i>
                        {{\Carbon\Carbon::parse($event->start_time)->toDayDateTimeString()}}
                    </div> 
                </div>
            </a>
        
        @empty
            <p> No Events posted</p>
        @endforelse  
        </div>

        <div class="mt-3">
         {{ $pastEvents->links()}}
        </div>

      </div>
    </div>

</div>


@endsection