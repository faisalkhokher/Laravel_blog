<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    {{-- Main theme --}}
    <link rel="stylesheet" href="{{ asset('css/modifybootstrap.css') }}">
    {{-- close --}}

    <link href="{{ asset('css/stylecolor.css') }}" rel="stylesheet">

    <link href="{{ asset('css/btn.css') }}" rel="stylesheet">


    {{-- CODEPEN LINKS  --}}

    <link href="{{ asset('css/Box.css') }}" rel="stylesheet">

    <link href="{{ asset('css/dark.css') }}" rel="stylesheet">

    <link href="{{ asset('css/toaster.css') }}" rel="stylesheet">

    {{-- Test
    <link href="{{ asset('css/test.css') }}" rel="stylesheet"> --}}
    
    <link href="{{ asset('css/test.css') }}" rel="stylesheet"> 
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

    @yield('css')
</head>
<body>
        @include('includes.tawk')
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">   
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
                                    <a class="dropdown-item" href="{{ route ('settings') }}">Settings</a>

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



           @auth


           
           <div class="container">

           

                <div class="row">
                        <div class="col-md-4">
                           {{-- LIST OF CMS  --}}

                           <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="{{ route ('home') }}">Dashboard</a>
                                </li>
                            </ul>

                        {{-- Admin gaurd --}}
                        @if (Auth::user() -> admin)
                        <ul class="list-group">
                                <li class="list-group-item">
                                   <a href="{{ route ('user.index') }}">Users</a>
                                </li>
                            </ul>
                            <ul class="list-group">
                                <li class="list-group-item">
                                   <a href="{{ route ('user.create') }}">Create User</a>
                                </li>
                            </ul>
                            
                        @endif
                        <ul class="list-group">
                            <li class="list-group-item">
                               <a href="{{ route ('user.profile') }}">My Profile</a>
                            </li>
                        </ul>


                            <ul class="list-group">
                                <li class="list-group-item">
                                   <a href="{{ route ('posts.create') }}">Create Post</a>
                                </li>
                            </ul>
                            <ul class="list-group">
                                <li class="list-group-item">
                                   <a href="{{ route ('posts.index') }}">View Post</a>
                                </li>
                            </ul>
                            <ul class="list-group">
                                <li class="list-group-item">
                                   <a href="{{ route ('posts.trashed') }}">Trash Posts</a>
                                </li>
                            </ul>
                            <ul class="list-group">
                                    <li class="list-group-item">
                                       <a href="{{ route ('cat.create') }}">Create Category</a>
                                    </li>
                                </ul>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                       <a href="{{ route ('cat.index') }}">View Category</a>
                                    </li>
                                </ul>
                                <ul class="list-group">
                                        <li class="list-group-item">
                                           <a href="{{ route ('tag.create') }}">Create Tags </a>
                                        </li>
                                    </ul>
                                    <ul class="list-group">
                                            <li class="list-group-item">
                                               <a href="{{ route ('tag.index') }}">View Tags </a>
                                            </li>
                                    </ul>
                               

                        </div>

                        <div class="col-md-8">
                                @yield('content')
                        </div>
                    </div>
           </div>

             @else
             @yield('content')



             
           @endauth




        </main>
    </div>

    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> --}}

 <!-- Scripts -->
 <script src="{{ asset('js/app.js') }}"   ></script>
 
 <script src="{{ asset('js/Box.js') }}" ></script>
 <script src="{{ asset('js/toster.js') }}" ></script>


<script>
@if(Session::has('success'))
toastr.success("{{ Session::get ('success')}}")
@endif
</script>

<script>
@if(Session::has('error'))
toastr.error("{{ Session::get ('error')}}")
@endif
</script>

    <script>
    @if(Session::has('info'))
    toastr.info("{{ Session::get ('info')}}")
    @endif
    </script>
       <script>
        @if(Session::has('warning'))
        toastr.warning("{{ Session::get ('warning')}}")
        @endif
        </script>
       




@yield('script');


</body>
</html>
