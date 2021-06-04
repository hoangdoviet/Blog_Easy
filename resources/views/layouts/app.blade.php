<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/select2.css')}}" rel="stylesheet">


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
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    @if (! Auth::guest())
                        <ul class="nav navbar-nav">
                            <li><a href="{{ url('admin/posts') }}">{{ __('view.Posts') }}</a></li>
                            <li><a href="{{ url('admin/categories') }}">{{ __('view.Categories') }}</a></li>
                            <li><a href="{{ url('admin/comments') }}">{{ __('view.Comments') }}</a></li>
                            <li><a href="{{ url('admin/tags') }}">{{ __('view.Tags') }}</a></li>

                            @if (Auth::user()->is_admin)
                                <li><a href="{{ url('admin/users') }}">{{ __('view.Users') }}</a></li>
                            @endif
                        </ul>
                    @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">{{ __('auth.Login') }}</a></li>
                            <li><a href="{{ route('register') }}">{{ __('auth.Register') }}</a></li>
                        @else
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('logout') }}">{{ __('auth.Logout') }}</a>
                            </li>

                        @endif
                             <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Language</a>
                                <ul class="dropdown-menu" role="menu">
                                     <li><a href="{!! route('blog.change-language', ['en']) !!}">{{ __('view.English') }}</a></li>
                                     <li><a href="{!! route('blog.change-language', ['vi']) !!}">{{ __('view.VietNam') }}</a></li>
                                </ul>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                @include('flash::message')
            </div>
        </div>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
