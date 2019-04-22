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
          <a class="btn btn-success" href="{{ route('admin.event.create')}}">CREATE EVENT</a>
          <hr>
        <h5 class="text-center"> Current Events</h5>
         {{-- <app-polls v-bind:polls ="{{ $polls }}" :isadmin="true"></app-polls> --}}
         <div class="list-group ">
            <a href="#" class="list-group-item list-group-item-action">
                <div class>
                    Yoyettsnb Geneferd awaresnnnns
                     <span class="float-right">
                      <i class="fa fa-clock-o mx-2 text-info"></i> matharee 
                      <i class="fa fa-calendar mx-2 text-info"></i>21st March 2019
                    </span> 
                </div>
                
            </a>
            <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
            <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
            <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
            <a href="#" class="list-group-item list-group-item-action ">Vestibulum at eros</a>
        </div>
      </div>
    </div>
    


    
</div>
@endsection