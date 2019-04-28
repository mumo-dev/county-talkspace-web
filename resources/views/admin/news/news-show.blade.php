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

    

    <div class="row justify-content-center">
      <div class="col-md-8">
      
        @if (session('message'))
          <div class="alert alert-success" role="alert">
              {{ session('message') }}
          </div>
        @endif

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
            <a href="{{ route('admin.news.edit', $news->id)}}" class="btn btn-success">Edit</a>
            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteNewsModal">Delete</button>
          </div>
        </div> 
      </div>
    </div>

</div>

{{-- modal --}}
<div class="modal fade" id="deleteNewsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLabel">Delete This News Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('admin.news.delete')}}" method="post">
          @csrf
          <input type="hidden" value="{{ $news->id }}" name="id"> 
          <div class="modal-body">
            Once deleted, the data is unrecoverable <br>
            Are you sure u want to delete this  News Item?
          
          </div>
          <div class="modal-footer m-0 p-1">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-danger">Delete</button>
          </div>
      </form>
    </div>
  </div>
</div>

@endsection