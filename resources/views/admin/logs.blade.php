@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.home') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Activity Logs</li>
    </ol>



    <ul class="list-group mt-3">

          @foreach ($logs as $log)
              <li class="list-group-item list-group-item-action">
                {{ $log->user->name }} {{ $log->action .'d'}} {{ $log->type }} item on {{ $log->created_at}}
              </li> 
          @endforeach
        
        </ul>

        <div class="mt-3">
         {{ $logs->links()}}
        </div>
</div>
@endsection