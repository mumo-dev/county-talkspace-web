@extends('layouts.app')
@section('content')

<div class="container mt-2">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">Services</li>

           
        </ol>

        @if (session('message'))
          <div class="alert alert-success" role="alert">
              {{ session('message') }}
          </div>
        @endif

        <a class="btn btn-sm btn-outline-secondary mb-2" href="{{ route('services.create')}}">Request For Service</a>



         
     


           
      </div>
    </div>
</div>

@endsection