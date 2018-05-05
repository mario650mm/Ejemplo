<!DOCTYPE html>
{{--}}<html lang="{{ app()->getLocale() }}">--}}
<html lang="{{\Illuminate\Support\Facades\Session::get('locale')}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title_page')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/fontawesome-all.min.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                @if(!\Auth::guest())
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        <i class="fas fa-address-book"></i>
                    </a>
                @endif
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @if(!\Auth::guest())
                        <a class="navbar-brand" href="{{ url('/users') }}">
                            <i class="fa fa-user"></i> @lang('users.users')
                        </a>
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                    <li><a href="{{ route('login') }}">@lang('login.login')</a></li>
                    <li><a href="{{ route('register') }}">@lang('login.register')</a></li>

                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false"
                               aria-haspopup="true" v-pre>
                                Idiomas <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}"/>
                                    <input type="hidden" id="lenguageHidden" name="lenguageHidden"
                                           value="es"/>
                                    <button type="button" id="btnEspanol">Español</button>
                                    {{--}}<a href="{{url('/changeLenguage')}}" onclick="event.preventDefault();
                                    document.getElementById('lenguageHidden').value = 'es';
                                    document.getElementById('lenguage-form').submit();>
                                        Español
                                    </a>



                                    <form id="lenguage-form" action="{{url('/changeLenguage')}}" method="POST"
                                    style="display: none;">
                                        {{ csrf_field() }}
                                        <input type="hidden" id="lenguageHidden" name="lenguageHidden" />
                                    </form>--}}
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false" aria-haspopup="true" v-pre>
                                <i class="fa fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @if(Session::get('success'))
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{Session::get('success')}}
            </div>
        @endif
        @if(Session::get('warning'))
            <div class="alert alert-warning">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{Session::get('warning')}}
            </div>
        @endif
        @if(Session::get('danger'))
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{Session::get('danger')}}
            </div>
        @endif
        @yield('content')
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
<script type="text/javascript">
    $("#btnEspanol").click(function (event) {
        event.preventDefault();
        $.ajax({
            // En data puedes utilizar un objeto JSON, un array o un query string
            method: "POST",
            url: "{{url('/changeLenguage')}}",
            data: {"_token": $("#_token").val(), "lenguageHidden": "es"},
            success: function (data) {
                window.location.href = "{{url('/users')}}";
            }
        });
    });
</script>
</body>
</html>
