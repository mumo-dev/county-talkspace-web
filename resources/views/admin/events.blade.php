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
      <div class="col-md-12">
          {{-- <app-create-poll></app-create-poll> --}}
          <a class="btn btn-success" href="{{ route('admin.event.create')}}">CREATE EVENT</a>
          <hr>
        <h5 class="text-center"> Current Events</h5>
         {{-- <app-polls v-bind:polls ="{{ $polls }}" :isadmin="true"></app-polls> --}}
      </div>
    </div>
    


    
</div>
@endsection