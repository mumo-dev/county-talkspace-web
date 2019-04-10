@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if($user != null)
        <div class="col-md-4">
            <app-profile v-bind:userdetails="{{$user}}" v-bind:currentuserid="{{ Auth::id() }}"></app-profile>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-body"></div>
            </div>
        </div>
        @else
        <div class="col-md-8">
            <div class="card mb-0">
                <div class="card-body">
                   <p class="text-center text-bold text-danger">  Whoops!, User Not Found </p>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
