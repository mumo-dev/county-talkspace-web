<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/app.css')}}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
        

            .content {
                text-align: center;
                height: 100vh;
                background-image: linear-gradient(to bottom right,#00d1b2, #006d5d);
            }

            .full-height {
                height: 100% !important;
            }

          
        </style>
    </head>
    <body>
    
    <div class="content">
        <div class="container">
           <div class="row justify-content-center align-items-center ">
                <div class="col-md-6">
                    <div class="full-height">
                         <img src="/images/logo.png">
                    </div>
                </div>
                <div class=" col-md-6 ">
                    @if (Route::has('login'))
                        
                            @auth
                                <a href="{{ url('/home') }}">Home</a>
                            @else
                                <a href="{{ route('login') }}">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">Register</a>
                                @endif
                            @endauth
                       
                    @endif
                </div>
           </div>
        </div>
      </div>
    </body>
</html>
