<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css" rel="stylesheet" type="text/css"/>

    <style>
    .navbar-dark .navbar-nav .nav-link {
    color: rgba(255, 255, 255);
}
    </style>
</head>
<body>
    <div id="app">

      @include('layouts.header')

        <main>
            @yield('content')
        </main>
    </div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script>
// Options
    var options = {
            segmentShowStroke : true,
            segmentStrokeColor : "#fff",
            segmentStrokeWidth : 2,
            percentageInnerCutout : 50,
            animationSteps : 100,
            animationEasing : "easeOutBounce",
            animateRotate : true,
            animateScale : false,
            responsive: true,
            maintainAspectRatio: true,
            showScale: true,
            animateScale: true
    };
    $.get('/user-reports', function(response) {
                // alert("success");

                $('#complain').text(response.response_rate_complains);
                $('#enquiry').text(response.response_rate_enquiries);

            // console.log(response);
            var ctx = document.getElementById('myChart').getContext("2d");

            // var donutEl = document.getElementById("donut").getContext("2d");

            var data = {
                datasets: [{
                    data: [response.opinions, response.complains, response.enquiries],
                    backgroundColor:['#ff0000','#00ff00','#0000ff'],
                }],

                // These labels appear in the legend and in the tooltips when hovering different arcs
                labels: [
                    'Opinions',
                    'Complains',
                    'Enquiries'
                ]
            };

            var myDoughnutChart = new Chart(ctx, {
                type: 'doughnut',
                data: data,
                options: options
            });

    });



    function markAsRead(event,id, postId){

        event.preventDefault();
        $.ajax({
            url:'/notifications/posts',
            type:'post',
            data: {
                'id': id,
                '_token': '{{ csrf_token()}}'
            },
            success: function(data, textStatus, jQxhr){
                console.log(data)
            },
            error: function(jQxhr,textStatus, err){
                console.log(err)
            },
        });

        window.location.href='/posts/'+postId+'/comments'
    }
</script>
</body>
</html>
