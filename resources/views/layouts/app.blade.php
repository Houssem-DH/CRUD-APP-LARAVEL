<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>


    <base href="{{ URL::asset('/') }}" target="_top">

    
  

    <!-- css -->
    
   
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/register.css">


    <!-- Fonts -->

    
    
    <link href="{{ asset('css/fonts-bunny.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">





    <!-- Scripts -->
    <script src="js/sweetalert.min.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>


    <div id="app">

        <style>
            body {
                background: #e2eaef;
                font-family: "Open Sans", sans-serif;
            }

            h2 {
                color: #000;
                font-size: 26px;
                font-weight: 300;
                text-align: center;
                text-transform: uppercase;
                position: relative;
                margin: 30px 0 60px;
            }

            h2::after {
                content: "";
                width: 100px;
                position: absolute;
                margin: 0 auto;
                height: 4px;
                border-radius: 1px;
                background: #000000;
                left: 0;
                right: 0;
                bottom: -20px;
            }

            img {
                width: 450px,
                    height: 300px
            }
        </style>





        </head>

        <body>


            <div id="app">




                <nav class="navbar navbar-expand-md navbar-light fixed-top bg-white shadow-sm">
                    <div class="container">
                        <img src="img/logo.png" alt="sigma" width="120" height="60" href="{{ url('/') }}">
                        
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="/">Home <span class="sr-only"></span></a>
                                </li>
                                @if (Auth::check())
                                @if (Auth::user()->role == 0)
                                <li class="nav-item active">
                                    <a class="nav-link" href="my-posts/{{ Auth::user()->id }}">My Posts <span class="sr-only"></span></a>
                                </li>
                                @endif
                                @endif
                                
                               
                                    

                            </ul>

                        </div>

                        <!-- Right Side Of Navbar -->
                        <form class="form-inline my-2 my-lg-0 pr-5" type="get" action="{{ route('search') }}">
                            <input class="form-control mr-sm-2" name="query" type="search" placeholder="Search"
                                aria-label="Search">
                            <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
                        </form>

                        <ul class="navbar-nav ms-auto">





                            <!-- ============================================================== -->


                            </li>


                            <!-- ============================================================== -->
                            <!-- User profile and search -->
                            <!-- ============================================================== -->

                            @guest


                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a class="
                            nav-link
                            dropdown-toggle
                            text-muted
                            waves-effect waves-dark
                            pro-pic
                          "
                                        href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <img src="assets/uploads/user/{{ Auth::user()->image }}" alt="user"
                                            class="rounded-circle" width="31" />
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-end user-dd animated"
                                        aria-labelledby="navbarDropdown">
                                        @if (Auth::user()->role == 1)
                                            <a class="dropdown-item" href="{{ url('dashboard') }}">Dashboard</a>
                                        @endif
                                        
                                        <a class="dropdown-item" href="profile/{{ Auth::user()->id }}"> My
                                            Profile</a>




                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                             {{ __('Logout') }}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>


                                    </ul>
                                </li>
                            @endguest
                            <!-- ============================================================== -->
                            <!-- User profile and search -->
                            <!-- ============================================================== -->

                        </ul>


                    </div>
            </div>
            </nav>




            @if (session('message'))
                <div class="alert alert-dismissible alert-danger">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Oh snap! </strong>{{ session('message') }}
                </div>
            @endif


            <main class="py-4">
                @yield('content')
            </main>
    </div>


    
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
     <script src="js/popper.min.js" >
    </script>
    <script src="js/bootstrap.min.js">
    </script>
  

</body>

</html>
