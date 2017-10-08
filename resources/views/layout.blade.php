<html lang="{{ app()->getLocale() }}">
    <head>
        <title>{{ $title or 'Megatech' }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link href="{{ asset('public/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('public/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar3">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('public/images/logo.png') }}" alt="Megatech">
                    </a>
                </div>

                <div id="navbar3" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ url('/') }}">Ínicio</a></li>
                        <li><a href="{{ route('admin-edit') }}">Admin</a></li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                            {!! Form::open(['route' => 'logout', 'style' => 'display:none;', 'id' => 'logout-form']) !!}
                            {!! Form::close() !!}
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
        <script src="{{ asset('public/js/jquery.min.js') }}"></script>
        <script src="{{ asset('public/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        @stack('scripts')
    </body>
</html>
