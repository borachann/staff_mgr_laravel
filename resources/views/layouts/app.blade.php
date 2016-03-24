<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <!-- Fonts -->
    <link href="/css/font-awesome-4.5.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="/css/font.css" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/jquery-ui.css">
    <!-- Styles -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/styles.css" rel='stylesheet' type='text/css'>

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}



    @stack('styles')
</head>

<body id="app-layout">
    @if (Auth::user())
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                   <!--  <a class="navbar-brand" href="{{ url('/') }}">
                       Staff
                   </a> -->
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                    <!-- <li><a class="fa fa-home fa-fw"></a></li> -->
                        <li><a href="{{ route('staff.index') }}"><i class="fa fa-home fa-lg"></i>&nbsp; Home</a></li>
                        <!-- <li ></li>&nbsp; Home  -->
                    </ul>
                    <ul class="nav navbar-nav">
                        <li><a>Search :</a></li>
                    </ul>
                    <form role="search" class="navbar-form navbar-left" method="GET" action="{{ route('staff.index') }}">
                        <div class="form-group">
                            <input type="text" name="key" value="{{ isset($key) ? $key : '' }}" placeholder="Search" class="form-control">
                        </div>
                    </form>
                    <ul class="nav navbar-nav">
                        <li>{{ link_to_route('staff.create', 'Create New Employee', null) }}</li>
                    </ul>

                    <ul class="nav navbar-nav">
                        <li>{{ link_to_route('staff.create', 'Report', null) }}</li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    @endif

<div class="container">
        @yield('content')
</div>

    <script src="/js/common.js"></script>

    @stack('scripts')

    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
