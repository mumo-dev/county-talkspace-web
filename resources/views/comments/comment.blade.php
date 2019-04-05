@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-10 col-lg-8">
          <nav aria-label="breadcrumb" class="mt-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Post</a></li>
              <li class="breadcrumb-item active" aria-current="page">Comments</li>
            </ol>
          </nav>
          <div class="card">
            <div class="card-body">
               <app-post v-bind:post="{{$comment[0]}}" v-bind:iscomment="true"></app-post>

                <ul class="list-unstyled"  style="margin-left:64px;">
                  <li class="media">
                    <div class="media-body">
                      <app-create-comment v-bind:post_id="{{ $comment[0]->id}}" v-bind:iscomment="true"></app-create-comment>
                    </div>
                    
                  </li>
                
                  <hr/>
                  {{-- comments for this post here --}}
                  <app-comments v-bind:postid="{{$comment[0]->id }}" v-bind:iscomment="true"></app-comments>
                </ul>
            </div>
          </div>


      </div>
  </div>
</div>

@endsection