<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'VideoClub') }}</title>

    <!-- Styles -->
    <link href="{{url('/css/app.css')}}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ url('/css/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
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
                    <a class="navbar-brand" href="#">
                        <span class="glyphicon glyphicon-tower" aria-hidden="true"></span>
                        {{ config('app.name', 'VideoClub') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>     
                        <!-- Authentication Links -->
                        @if (Auth::guest())

                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        </ul>
                        @else
                        {{-- ul mio no se si funciona --}}
                         <ul class="nav navbar-nav">   
                            <li{{ Request::is('catalog*') && !Request::is('catalog/create')? ' class=active' : ''}}>
                                <a href="{{url('/catalog')}}">
                                    <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                                    Catálogo
                                </a>
                            </li>
                            <li{{ Request::is('catalog/create') ? ' class=active' : ''}}>
                                <a href="{{url('/catalog/create')}}">
                                    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                                    Nueva película
                                </a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        @endif
                    
                </div>
            </div>
        </nav>
        <div class="container">
            @notification()
        @yield('content')
        </div>
        
    </div>

    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    {{-- <script src="/js/bootstrap/bootstrap.min.js"></script> --}}
    <!-- Scripts App -->
    <script src="/js/app.js"></script>
</body>
</html>
