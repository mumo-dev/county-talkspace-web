@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-white">
                    Profile
                    <a class="btn btn-primary btn-sm float-right" href="#" title="EDIT">
                        <i class="fas fa-pen"></i>
                    </a>
                </div>

                <div class="card-body">
                    <div class="photo text-center">
                        <img src="/images/user.png" class="img-fluid img-thumbnail"/>
                    </div>  
                   
                    <div class="details mt-2 font-weight-normal" style="font-size:1.2rem">
                        <span><i class="fas fa-user-tag text-primary"></i> mumorocks </span> <br>
                        <span><i class="fas fa-envelope text-primary mr-1"></i> mumorocks@test.com </span> <br>
                     </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-body"></div>
            </div>
        </div>
    </div>
</div>
@endsection
