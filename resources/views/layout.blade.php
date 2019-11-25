<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Tutorial</title>
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css" /> -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }} ">
    <style>
        .margin-chris{
            margin: 20px 10px;
        }
        .show-label{
            width : 150px;
        }
        *, body{
            font-family: Tahoma;
        }
    </style>
</head>
<body>
        @if(Auth::check())
        <div class="row d-flex justify-content-center">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="width:80%">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item {{ Route::currentRouteName() == 'shows.index' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('shows.index') }}">Show</a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteName() == 'audiences.index' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('audiences.index') }}">Audience</a>
                        </li>
                    </ul>
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" style="color:rgba(255,255,255,.5)">
                        Logout
                    </a>                 
                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>     
            </div>
            </nav>
        </div>
 
        @endif
        <div class="container">
            @yield('content')
        </div>
    <!-- <script src="{{ asset('js/app.js') }}" type="text/js"></script> -->
    <script src="{{ asset('js/jquery-3.2.1.slim.min.js') }}" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="{{ asset('js/popper.min.js') }}" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="{{ asset('js/bootstrap.min.js') }}" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>