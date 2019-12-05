<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title> @yield('title', 'Hollywood Hipster | The hipest movie reviews this side of the west coast ')</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', 'Hollywood Hipster | The hipest movie reviews this side of the west coast ')</title>
        <link rel="stylesheet" href="/css/app.css">
        <style>
            .genre, .roles, .inline-block{
                display: inline-block;
            }

            .film-card img {
               width: 100%;
            }
        </style>
    </head>
<body>
<!-- TOPBAR SECTION -->



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
                                @auth
                                    <a href="{{ url('/home') }}">Dashboard</a>
                                @endauth

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    @can('edit-users')
                                        <a class="dropdown-item" href="{{ route('admin.users.index') }}">
                                            User management
                                        </a>
                                    @endcan
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

        <main>
            @yield('content')
        </main>
    </div>
    <script src="/js/app.js"></script>
    <script>

            var initialval = document.querySelector('[name="rating"]');
            var stars = document.querySelectorAll('[data-rating] .star');

            if(initialval && initialval.value){
                for(let i = 0; i< stars.length; i++){
                    if(stars[i].getAttribute('data-rating') == initialval.value){
                        stars[i].classList.add('selected');
                        stars[i].parentNode.classList.add('is-voted');
                    }
                }
            }

            for(let i = 0; i< stars.length; i++){
                stars[i].addEventListener('click', function(){
                    var siblings = this.parentNode.children;

                    for(let j = 0; j< siblings.length; j++){
                        siblings[j].classList.remove('selected');
                    }

                    this.classList.add('selected');
                    this.parentNode.classList.add('is-voted');
                    initialval.value = this.getAttribute('data-rating');
                });
            }


        </script>
</body>
</html>

