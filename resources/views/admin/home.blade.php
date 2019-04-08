@extends('admin.layouts.app') @section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.home') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Posts</li>
    </ol>

    <!-- Page Content -->

    <!-- <app-create-post v-bind:id="{{Auth::id()}}"></app-create-post> -->

    <!--
    <ul class="nav nav-tabs " id="myTab" role="tablist"  >
        <li class="nav-item">
            <a
                class="nav-link active"
                id="home-tab"
                data-toggle="tab"
                href="#opinions"
                role="tab"
                aria-controls="home"
                aria-selected="true"
                >Opinions</a
            >
        </li>
        <li class="nav-item">
            <a
                class="nav-link"
                id="profile-tab"
                data-toggle="tab"
                href="#enquiries"
                role="tab"
                aria-controls="profile"
                aria-selected="false"
                >Enquiries</a
            >
        </li>
        <li class="nav-item">
            <a
                class="nav-link"
                id="contact-tab"
                data-toggle="tab"
                href="#complains"
                role="tab"
                aria-controls="contact"
                aria-selected="false"
                >Complains</a
            >
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div
            class="tab-pane fade show active"
            id="opinions"
            role="tabpanel"
            aria-labelledby="home-tab">

            <app-admin-posts v-bind:tag="'opinion'"></app-admin-posts>
        </div>
        <div
            class="tab-pane fade"
            id="enquiries"
            role="tabpanel"
            aria-labelledby="profile-tab">

            <app-admin-posts v-bind:tag="'enquiry'"></app-admin-posts>
        </div>
        <div
            class="tab-pane fade"
            id="complains"
            role="tabpanel"
            aria-labelledby="contact-tab">

            <app-admin-posts v-bind:tag="'complain'"></app-admin-posts>
        </div>
    </div>

    -->
    <app-posts v-bind:tag="'opinion'" v-bind:isadmin="'true'"></app-posts>

</div>
<!-- /.container-fluid -->
@endsection
