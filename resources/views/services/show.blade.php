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
                <a href="{{ route('services') }}">Services</a>
            </li>
            <li  class="breadcrumb-item active"> Details</li>
            
        </ol>

          @if (session('message'))
          <div class="alert alert-success" role="alert">
              {{ session('message') }}
          </div>
         @endif

        <div class="card">
            <div class="card-body">
                <div class="media">
                  <img 
                  src="{{ Auth::user()->photo_url == null ? '/images/user.png' : '/images/thumbnails/'.Auth::user()->photo_url }}" 
                  class="mr-3 rounded-circle" alt="user photo" width="50" height="50"/>
                  <div class="media-body">
                    <h5 class="my-0 text-black"> Request for {{ $service->type }} services </h5>
                    <p class="text-secondary font-weight-light my-0 mb-2" style="font-size:14px;">
                     {{ $service->created_at->toDayDateTimeString()}}
                     </p>
                    <p> {{  $service->description }}
                    @if ($service->image_url != null)
                        <div>
                          <img src="{{ '/images/'.$service->image_url }}" class="img-responsive">
                        </div>
                    @endif
                    </p>
                  </div>
                </div>
            </div>
        </div>
           
      </div>
    </div>
</div>

@endsection