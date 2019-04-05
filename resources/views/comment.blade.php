@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-10 col-lg-8 ">
          <nav aria-label="breadcrumb" class="mt-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Post</a></li>
              <li class="breadcrumb-item active" aria-current="page">Comments</li>
            </ol>
          </nav>
          <app-post v-bind:post="{{$post[0]}}"></app-post>
          <div class>
              <div class="form-group m-0 p-0">
                <textarea class="form-control autoExpand" placeholder="comment... "
                   rows='1' data-min-rows='0' v-model="post">
                </textarea>
              </div>
          </div>


      </div>
  </div>
</div>

@endsection