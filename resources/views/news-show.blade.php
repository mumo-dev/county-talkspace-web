@extends('layouts.app')
@section('content')

<div class="container mt-2">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
             <a href="{{ route('news') }}">News</a>
            </li>
            <li class="breadcrumb-item active"></li>
        </ol>

    
      
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
        
        </div> 
   

</div>



@endsection