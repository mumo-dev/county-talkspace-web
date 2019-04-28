@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.home') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{ route('admin.news')}}">News</a>
        </li>
        <li class="breadcrumb-item active">Details</li>

    </ol>

    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <div class="row justify-content-center">
      <div class="col-md-8">
          {{-- <app-create-poll></app-create-poll> --}}
          
        

        <div class="card">
          <div class="card-header bg-white">
           <h5 class="m-0 p-0 text-uppercase font-weight-bold"> {{ $news->title}}</h5>
          </div>
          @if ($news->photo_url != null)
           <img class="card-img-top rounded-0" src="/images/{{$news->photo_url}}">
          @endif  
          <div class="card-body pt-0">
           <small class="text-secondary mb-1">Posted on: {{ $news->created_at}}</small>
            <p class="card-text"> {{ $news->description}}</p>
            {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
          </div>
          <div class="card-footer bg-white d-flex justify-content-between">
            <a href="#" class="btn btn-success">Edit</a>
            <a href="#" class="btn btn-danger">Delete</a>
          </div>
        </div>
         
      </div>


    </div>

</div>


@endsection