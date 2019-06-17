@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.home') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Events</li>
    </ol>




    <div class="row justify-content-center">
      <div class="col-md-8">
        @if (session('message'))
          <div class="alert alert-success" role="alert">
              {{ session('message') }}
          </div>
       @endif
        <div class="card">
          <div class="card-header bg-white"> <h4 class="m-0 p-0">{{ $event->name }} </h4></div>
          <div class="card-body">
              <div class="d-flex">
                <div  class="mr-5">
                 <span class="text-primary text-uppercase " style="font-weight:500;margin-right:8px;"> Location:</span>
                  <i class=" text-info mx-2 fas fa-map-marker-alt"></i> {{ $event->location }}

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
              <span class="text-primary text-uppercase " style="font-weight:500">Description:</span> <br>
              <p> {{ $event->description}}</p>
            </div>
            <p>
              <span  class="text-primary text-uppercase " style="font-weight:500">Guests:</span>
              {{ $event->guests}}
            </p>
          </div>

          <div class="card-footer bg-white">
            <a class="btn btn-success" href="{{ route('admin.event.edit', $event->id)}}">Edit</a>
            <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#deleteEventModal">
              Delete
          </button>
          </div>
        </div>

      </div>


    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="deleteEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLabel">Delete This Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('admin.event.delete')}}" method="post">
          @csrf
          <input type="hidden" value="{{ $event->id }}" name="id">
          <div class="modal-body">
            Once deleted, the data is unrecoverable <br>
            Are you sure u want to delete this  Event?

          </div>
          <div class="modal-footer m-0 p-1">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-danger">Delete</button>
          </div>
      </form>
    </div>
  </div>
</div>
@endsection
