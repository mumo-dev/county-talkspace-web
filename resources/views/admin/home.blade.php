@extends('admin.layouts.app') @section('content')
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.home')}}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Posts</li>
            </ol>

            <!-- Page Content -->
           
            <!-- <app-create-post v-bind:id="{{Auth::id()}}"></app-create-post> -->
        </div>
        <!-- /.container-fluid -->
@endsection
