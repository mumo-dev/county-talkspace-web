@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.home') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">News</li>
    </ol>

    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <div class="row ">
      <div class="col-md-12">
          {{-- <app-create-poll></app-create-poll> --}}
          <a class="btn btn-success" href="{{ route('admin.news.create')}}">ADD NEW</a>
          <hr>
        <h5 class=""> Most Recent News</h5>
         {{-- <app-polls v-bind:polls ="{{ $polls }}" :isadmin="true"></app-polls> --}}
         <div class="list-group">
         {{-- @foreach ($events as $event)
            
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
                        {{$event->start_time }}
                    </div> 
                </div>
            </a>
        
         @endforeach    --}}
        </div>

        <div class="mt-3">
         {{-- {{ $events->links()}} --}}
        </div>

        {{-- past events --}}

      </div>
    </div>

</div>


@endsection