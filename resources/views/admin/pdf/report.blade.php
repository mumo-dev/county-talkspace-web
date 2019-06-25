<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="/css/app.css" rel="stylesheet">

</head>
<body>
    <div class="container mt-3">
       <div class="row justify-content-center">
           <div class="col-md-10">
               <h5 class="text-center">County TalkSpace Application Reports</h5>
               <hr class="m-0">
               <div class="card">
                    {{-- {{\Carbon\Carbon::parse($event->end_time)->toDayDateTimeString()}} --}}
                   <div class="card-header bg-white">
                    <h5 class="m-0 text-info" id="header">
                            Reports for Dates  {{\Carbon\Carbon::parse($start)->toDayDateTimeString()}} -
                            {{\Carbon\Carbon::parse($end)->toDayDateTimeString()}}
                    </h5>
                </div>
                   <div class="card-body">
                        <table class="table" style="width:auto">
                            <tbody>
                                <tr>
                                    <th>Users</th>
                                    <td>: {{$total_users}}</td>

                                </tr>

                                <tr>
                                    <th>New users</th>
                                    <td>: {{$users}}</td>
                                </tr>

                                <tr>
                                    <th>Posts</th>
                                    <td>: {{$posts}}</td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-info"><strong> category percentages and response rates</strong></td>
                                </tr>
                                <tr>
                                    <td>Opinions- {{$opinion}}%</td>
                                </tr>
                                <tr>
                                    <td colspan="3">Complains- {{$complain}}% with {{$response_rate_complains}}% response rate</td>
                                </tr>
                                <tr>
                                    <td colspan="3">Enquiries- {{$enquiry}}% with {{$response_rate_enquiries}}% response rate</td>
                                </tr>

                                <tr>
                                    <th>Events</th>
                                    <td>: {{$events}}</td>

                                </tr>

                                <tr>
                                    <th>News</th>
                                    <td>: {{$news}}</td>
                                </tr>
                                <tr>
                                    <th>Total Polls Conducted</th>
                                    <td>: {{$polls}}</td>

                                </tr>
                                <tr>
                                    <td colspan="3">{{$pollPartcipants}}% of users participate</td>
                                </tr>

                                <tr>
                                        <th>Total Service's Requested</th>
                                        <td>: {{$services}}</td>

                                </tr>
                                <tr>
                                        <td colspan="5"> {{$ambulance_perc}}% Ambulance services requests | {{$fire_perc}}% Firefighting services requests</td>
                                </tr>


                            </tbody>
                        </table>
                        <hr class="m-0">
                   </div>
               </div>
           </div>
       </div>
    </div>


</body>
</html>
