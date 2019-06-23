@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center my-2">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-white"><h4 class="m-0">Posts Statistics and Response Rates</h4></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8"> <canvas id="myChart" height="200"></canvas> </div>

                        <div>
                                <h4 style="text-decoration:underline"> Response Rates:</h4>
                                    Complains - <span id="complain"></span>%<br>
                                    Enquiries - <span id="enquiry"></span>%
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

@endsection
