@extends('layouts.app')
 @section('content')

<div class="container mt-2">
    <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href=" ">Events</a>
                </li>
                <li class="breadcrumb-item active"></li>
    </ol>
    <div class="row">
        <div class="col-md-8">




            <h5 class="p-2" id="upcomingEvents"
             style="background-color:#7fe8d8;border-radius:.25rem"> Upcoming Events</h5>
            @forelse ($upcomingEvents as $event )

            <div class="card mb-2">
                <div class="card-header bg-white">
                    <h4 class="m-0 p-0">{{ $event->name }}</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex">
                        <div class="mr-5">
                            <span
                                class="text-primary text-uppercase "
                                style="font-weight:500;margin-right:15px;"
                            >
                                Location:</span
                            >
                            <i class="fa fa-clock-o mx-2 text-info"></i>
                            {{ $event->location }}
                        </div>

                    </div>
                    <div class="mt-1">
                            <span class="text-primary text-uppercase " style="font-weight:500"> Start Date: </span>
                             <i class="fa fa-calendar mx-2 text-info">
                              </i> {{\Carbon\Carbon::parse($event->start_time)->toDayDateTimeString()}}
                    </div>

                    <div class="mt-1">
                            <span class="text-primary text-uppercase " style="font-weight:500; margin-right:15px;"> End Date: </span>
                             <i class="fa fa-calendar mx-2 text-info">
                              </i> {{\Carbon\Carbon::parse($event->end_time)->toDayDateTimeString()}}
                    </div>
                    <div class="mt-2">
                        <span
                            class="text-primary text-uppercase "
                            style="font-weight:500"
                            >Description:</span
                        >
                        <br />
                        <p>{{ $event->description}}</p>
                    </div>
                    <p>
                        <span
                            class="text-primary text-uppercase "
                            style="font-weight:500"
                            >Guests:</span
                        >
                        {{ $event->guests}}
                    </p>
                </div>
            </div>

            @empty
            <p> No Upcoming Events</p>

            @endforelse

            <div class="mt-2">
              {{ $upcomingEvents->links()}}
            </div>


            <h5 class="p-2" id="pastEvents" style="background-color:#7fe8d8;border-radius:.25rem"> Past Events</h5>
              @forelse ($pastEvents as $event )

            <div class="card mb-2">
                <div class="card-header bg-white">
                    <h4 class="m-0 p-0">{{ $event->name }}</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex">
                        <div class="mr-5">
                            <span
                                class="text-primary text-uppercase "
                                style="font-weight:500;margin-right:15px;"
                            >
                                Location:</span
                            >
                            <i class="fa fa-clock-o mx-2 text-info"></i>
                            {{ $event->location }}
                        </div>

                    </div>
                    <div class="mt-1">
                            <span class="text-primary text-uppercase " style="font-weight:500"> Start Date: </span>
                             <i class="fa fa-calendar mx-2 text-info">
                              </i> {{\Carbon\Carbon::parse($event->start_time)->toDayDateTimeString()}}
                    </div>

                    <div class="mt-1">
                            <span class="text-primary text-uppercase " style="font-weight:500; margin-right:15px;"> End Date: </span>
                             <i class="fa fa-calendar mx-2 text-info">
                              </i> {{\Carbon\Carbon::parse($event->end_time)->toDayDateTimeString()}}
                    </div>
                    <div class="mt-2">
                        <span
                            class="text-primary text-uppercase "
                            style="font-weight:500"
                            >Description:</span
                        >
                        <br />
                        <p>{{ $event->description}}</p>
                    </div>
                    <p>
                        <span
                            class="text-primary text-uppercase "
                            style="font-weight:500"
                            >Guests:</span
                        >
                        {{ $event->guests}}
                    </p>
                </div>
            </div>

            @empty
            <p> No  Events</p>

            @endforelse

            <div class="mt-2">
              {{ $pastEvents->links()}}
            </div>




          </div>
        <div class="col-md-4" style="margin-top:45px;">
            <div class="card">
              <div class="card-body">
                <ul>
                    <li><a href="#upcomingEvents" class="text-info">Upcoming Events</a> </li>

                    <li> <a href="#pastEvents" class="text-info">Past Events</a></li>
                </ul>

              </div>
            </div>

        </div>
    </div>
</div>

    @endsection

