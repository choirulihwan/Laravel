<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    @yield('styles')
    
    <!-- Scripts -->
    <!--<script src="{{ asset('js/app.js') }}" defer></script>-->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        @if(Session::has('success'))
            $(document).ready(function() {
                toastr.success("{{ Session::get('success') }}");
            });
        @endif

        @if(Session::has('info'))
            $(document).ready(function() {
                toastr.info("{{ Session::get('info') }}");
            });
        @endif
    </script>
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

        <main class="py-4">
            <div class="container">
                <div class="row">
                    @if(Auth::check())
                        <div class="col-lg-3">
                            <ul class="list-group">
                                <li class="list-group-item"><a href="{{ route('home') }}">Home</a></li>
                                
                                @if(Auth::user()->admin)
                                <li class="list-group-item"><a href="{{ route('users') }}">List Users</a></li>
                                <li class="list-group-item"><a href="{{ route('user.create') }}">Create new User</a></li>
                                @endif

                                <li class="list-group-item"><a href="{{ route('categories') }}">List categories</a></li>
                                <li class="list-group-item"><a href="{{ route('category.create') }}">Create new category</a></li>
                                <li class="list-group-item"><a href="{{ route('tags') }}">List tags</a></li>
                                <li class="list-group-item"><a href="{{ route('tag.create') }}">Create new tag</a></li>
                                <li class="list-group-item"><a href="{{ route('posts') }}">List posts</a></li>
                                <li class="list-group-item"><a href="{{ route('post.trashed') }}">Trashed posts</a></li>
                                <li class="list-group-item"><a href="{{ route('post.create') }}">Create new post</a></li>

                                <li class="list-group-item"><a href="{{ route('user.profile') }}">My profile</a></li>
                                @if(Auth::user()->admin)
                                    <li class="list-group-item"><a href="{{ route('settings') }}">Settings</a></li>
                                @endif
                            </ul>
                        </div>
                    @endif
                    
                    @guest
                        <div class="col-lg-12">
                    @else
                        <div class="col-lg-9">
                    @endguest
                        
                    @if(Session::has('info'))
                        <div class="alert alert-primary" role="alert-info">
                            {{ Session::get('info') }}
                        </div>
                    @endif

                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                        
                    @yield('content')
                    </div>
                    
                </div>
            </div>            
        </main>
    </div>

    
    @yield('scripts')

</body>
</html>
