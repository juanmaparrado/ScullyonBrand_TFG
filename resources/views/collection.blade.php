<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Scullyon Brand</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.2.0/anime.min.js"></script>
        <script src="https://kit.fontawesome.com/034f62ebdf.js" crossorigin="anonymous"></script>
        <!-- Styles -->
        <!--Enlace a archivo externo de css-->
        @vite('resources/css/landing.css')
        @vite('resources/js/landing.js')
    </head>
    <body class="antialiased">
           
        <div id="container" class="container-main" style="position: absolute" >
            @if (Route::has('login'))
            <header>
                <a href="{{ url('/') }}" class="logo">
                    <x-application-logo class="w-30 h-20" id="logNav" />
                </a>

                <ul class="nav">
                    <li><a href="{{ url('/collection')}}" class="">COLLECTION</a></li>
                    <li><a href="{{ url('/drop') }}" class="alert">NEW DROP</a></li>
                    <li><a href="{{ url('/team') }}" class="">THE TEAM</a></li>
                </ul>
                <ul class="log">
                    @auth
                    @role('admin')
                    <li><a href="{{ url('/dashboard') }}" class="adminlink">Admin</a></li>
                    @endrole
                    <li><a href="{{ route('profile.update')}}"><i class="fa-solid fa-user" id="profileIcon"></i></a></li>
                    <li><a href="{{route('cart')}}"><i class="fa-solid fa-cart-shopping" id="cartIcon"></i></a></li>
                    @else
                        <li><a href="{{ route('login') }}" class="">Log in</a></li>

                        @if (Route::has('register'))
                        <li><a href="{{ route('register') }}" class="">Register</a></li>
                    @endif
                    @endauth
                </ul>
            </header>
        @endif
            <img src="{{ asset('storage\ALLcollection.jpg') }}" width="300" height="300" alt="Descripción de la imagen">

        </div>

        

    </body>
    </html>