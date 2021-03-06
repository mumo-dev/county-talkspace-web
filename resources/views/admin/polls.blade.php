@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.home') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Polls</li>
    </ol>


    <div class="row justify-content-center">
      <div class="col-md-8">
          <app-create-poll></app-create-poll>
          <hr>
        <h5 class="text-center"> Poll Results</h5>
         <app-polls v-bind:polls ="{{ $polls }}" :isadmin="true"></app-polls>
      </div>
    </div>
    


    
</div>
@endsection