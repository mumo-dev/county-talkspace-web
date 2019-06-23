<nav class="navbar navbar-expand-md navbar-dark navbar-laravel bg-primary">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                <img src="/images/logo.png" width="30" height="30" class="d-inline-block align-top rounded-circle" alt="">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else


                            <li class="nav-item">

                                <a class="nav-link" href="{{ route('news') }}">
                                 <i class="fas fa-blog"></i>
                                {{ __('News') }}
                                </a>
                            </li>

                            <li class="nav-item">

                                <a class="nav-link" href="{{ route('events') }}">
                                 <i class="far fa-calendar-alt"></i>
                                {{ __('Events') }}
                                </a>
                            </li>




                            <li class="nav-item">

                                <a class="nav-link" href="{{ route('services') }}">
                                <i class="fab fa-servicestack"></i>
                                {{ __('Services') }}
                                </a>
                            </li>

                             <li class="nav-item">

                                <a class="nav-link" href="{{ route('polls') }}">
                                 <i class="fas fa-poll"></i>
                                {{ __('Polls') }}
                                </a>
                            </li>

                            <li class="nav-item">

                                    <a class="nav-link" href="/stats">
                                     <i class="fas fa-poll"></i>
                                    {{ __('Stats') }}
                                    </a>
                                </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                   <i class="fas fa-globe"></i>Notifications
                                    <span class="badge badge-danger">
                                        @if(count(auth()->user()->unreadNotifications) > 0)
                                          {{ count(auth()->user()->unreadNotifications)}}
                                        @endif
                                    </span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   @forelse (auth()->user()->unreadNotifications as $notification)
                                <a class="dropdown-item" href="/posts/{{$notification->data['post']['id']}}/comments" onclick="markAsRead(event, '{{$notification->id}}','{{$notification->data['post']['id']}}')">
                                   <span class="text-info">

                                        {{ $notification->data['user']['id'] == 0 ? $notification->data['user']['name']: 'County Government'}} </span> commented on your post
                                </a>
                                   @empty
                                        <a class="dropdown-item" href="#">No unread notifications</a>
                                   @endforelse

                                </div>
                            </li>



                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{--   --}}
                                   <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                                    <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->user_type == 0)
                                        <a class="dropdown-item" href="{{ route('profile',Auth::id()) }}">Profile</a>
                                    @endif
                                    <a class="dropdown-item" href="/onlinehelp">Online Help</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>

        </nav>
