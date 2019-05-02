@extends('layouts.app')
@section('content')

<div class="container mt-2">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">News</li>
        </ol>

        <h5 class=""> Most Recent News</h5>
       
         @foreach ($news as $newsDetails)

            <div class="card mb-2">
              <div class="card-body">
                <div class="card-title m-0 p-0 text-info"> <h5 class="m-0 p-0"> {{ $newsDetails->title }}</h5></div>
                <div class="card-text">
                <div><small class="text-muted"> Posted on : {{ $newsDetails->created_at}}</small></div>
                {{ substr($newsDetails->description,0, mt_rand(80, 200))  }}...

                <br>
                 <a href="{{ route('news.show', $newsDetails->id)}}" class="btn btn-info btn-sm">Read More</a>

                </div>
              </div>
            </div>
        
         @endforeach    
     

        <div class="mt-3">
         {{-- {{ $news->links()}} --}}
        </div>

      </div>
    </div>
</div>

@endsection