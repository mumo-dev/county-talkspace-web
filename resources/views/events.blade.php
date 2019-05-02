@extends('layouts.app') @section('content')

<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href=" ">Events</a>
                </li>
                <li class="breadcrumb-item active"></li>
            </ol>

            @foreach ($events as $event )

            <div class="card">
                <div class="card-header bg-white">
                    <h4 class="m-0 p-0">{{ $event->name }}</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex">
                        <div class="mr-5">
                            <span
                                class="text-primary text-uppercase "
                                style="font-weight:500"
                            >
                                Location:</span
                            >
                            <i class="fa fa-clock-o mx-2 text-info"></i>
                            {{ $event->location }}
                        </div>
                        <div class="">
                            <span
                                class="text-primary text-uppercase "
                                style="font-weight:500"
                            >
                                Date:
                            </span>
                            <i class="fa fa-calendar mx-2 text-info"> </i
                            >{{ \Carbon\Carbon::parse($event->start_time)->toDayDateTimeString()}}
                        </div>
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

            @endforeach

            <div class="mt-2">
              {{ $events->links()}}
            </div>
        </div>
    </div>

    @endsection
</div>
