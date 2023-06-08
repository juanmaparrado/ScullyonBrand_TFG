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
           
        <div id="container" class="container-main" >
            @if (Route::has('login'))
            <header>
                <a href="{{ url('/') }}" class="logo">
                    <x-application-logo class="w-30 h-20" id="logNav" />
                </a>

                <ul class="nav">
                    <li><a href="{{ url('/') }}" class="">COLLECTION</a></li>
                    <li><a href="{{ url('/') }}" class="alert">LAST DROP</a></li>
                    <li><a href="{{ url('/team') }}" class="">THE TEAM</a></li>
                    @role('admin')
                        <li><a href="{{ url('/dashboard') }}" class="">Admin</a></li>
                    @endrole
                </ul>
                <ul class="log">
                    @auth
                    @else
                        <li><a href="{{ route('login') }}" class="">Log in</a></li>

                        @if (Route::has('register'))
                        <li><a href="{{ route('register') }}" class="">Register</a></li>
                        @endif
                    @endauth
                    <li><i class="fa-solid fa-user" id="profileIcon"></i></li>

                </ul>
            </header>
        @endif
            <img src="{{ asset('storage\cartel-publicidad.jpg') }}" width="300" height="300" alt="Descripción de la imagen">
            
        </div>
        <section id="sec-01">
            <div class="container">
                <h2 class="main-title">REveal elements on scrol</h2>
                <div class="content">
                    <div class="image">
                        <img src="{{ asset('storage\cartel-publicidad.jpg') }}" alt="">
                    </div>
                    <div class="text-box">
                        <h3>Lorem ipsum dolor </h3>
                        <p>
                            sit amet consectetur, adipisicing elit. Nemo adipisci 
                            saepe iure consequuntur dolores neque cupiditate. At et possimus perspiciatis similique 
                            sit quo quos ex aliquid quia, ratione, odit qui?
                        </p>
                    </div>
                </div>
                <div class="media-icon">
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                    <a href=""><i class="fa-brands fa-tiktok"></i></a>
                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                    <a href=""><i class="fa-brands fa-facebook"></i></a>
                </div>
            </div>
        </section>
        
        <section id="slideshow-container">
            <canvas id="canvas" width="1204" height="1000"></canvas>
            <div>
                <h1>GO TO THE NEW COLLECTION</h1>
                <button><a href="{{ route('login') }}">SHOP NOW</a></button>
            </div>
        </section>


    </body>
    </html>
