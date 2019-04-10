@extends('layouts.app')
@section('content')

<div class="container mt-2">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">Polls</li>
        </ol>
        {{-- <h5>Available Polls</h5> --}}
        <app-polls v-bind:polls ="{{ $polls }}"></app-polls>
      </div>
    </div>
</div>

@endsection