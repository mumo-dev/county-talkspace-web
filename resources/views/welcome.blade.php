<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Satisfy|Sofia" rel="stylesheet">
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
        


            .container{
                height: 100vh;
                width:100%;
                display:flex;
                align-items: center;
                justify-content: center;
                flex-wrap: wrap;
            }


            .side {
                height:100%;
                width:50%;
                text-align:center;
        
            }

            .left {
                background-color:white;
                
            }

            .right {
                background-image: linear-gradient(to bottom right,#00d1b2, #006d5d);
                
            }

            .logo {
                margin-top:30%;
         
            }

            .welcome {
               margin-top:30%;
              
            }

            .welcome h1{
                font-family: 'Satisfy', cursive;
                color:white;
                font-weight:bold;
                font-size:4rem;
                text-shadow: 1px 4px 2px black;

            }
            .btn {
                color: #00d1b2;
                padding:10px 20px;
                background-color:white;
                text-decoration:none;
                font-size:16px;
                font-weight:bold;
                border-radius: 2px;
                border:none;
                box-shadow: 1px 2px 2px #006d5d;
            }

            .btn:hover, btn:focus {
            
                color:#006d5d;
               
            }

            {{-- 670px --}}

            @media only screen and (max-width: 680px) {
               
                .welcome h1{
                    font-size:2.5rem;
                    text-shadow: 1px 4px 2px black;
                }

                .side {
                    height:50%;
                    width:100%;
                    text-align:center;
                }

                .logo {
                    margin-top:0;
         
                }

                .welcome {
                    margin:20% auto;
                }

                
            }
          
        </style>
    </head>
    <body>
    
            <div class="container">
                <div class="side left">
                    <div class="logo">
                        <img src="/images/logo_c.png">
                    </div>
                  
                </div>
    
                <div class="side right">

                    <div class="welcome">
                   
                        <h1> Welcome to County TalkSpace</h1>
                        @if (Route::has('login'))
                            
                                @auth
                                    <a class="btn" href="{{ url('/home') }}">Home</a>
                                @else
                                    <a class="btn"  style="margin-right:16px" href="{{ route('login') }}">Login</a>

                                    @if (Route::has('register'))
                                        <a class="btn"  href="{{ route('register') }}">Register</a>
                                    @endif
                                @endauth
                        
                        @endif
                    </div>
                </div>
            </div>
                
    </body>
</html>
