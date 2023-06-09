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
        @vite('resources/css/newdrop.css')
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
                    <li><a href="{{ url('/drop') }}" class="alert">LAST DROP</a></li>
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
        </div>

        <section class="shop" id="shop">
            <div class="container">
                <div class="box">
                    <img src="{{ asset('storage\01.png') }}">
                    <h4>I'm a product</h4>
                    <h5>$15.00</h5>
                    <div class="cart">
                        <a href="#"><i class='bx bx-cart' ></i></a>
                    </div>
                </div>
    
                <div class="box">
                    <img src="{{ asset('storage\01.png') }}">
                    <h4>I'm a product</h4>
                    <h5>$15.00</h5>
                    <div class="cart">
                        <a href="#"><i class='bx bx-cart' ></i></a>
                    </div>
                </div>
    
                <div class="box">
                    <img src="{{ asset('storage\01.png') }}">
                    <h4>I'm a product</h4>
                    <h5>$15.00</h5>
                    <div class="cart">
                        <a href="#"><i class='bx bx-cart' ></i></a>
                    </div>
                </div>
    
                <div class="box">
                    <img src="{{ asset('storage\01.png') }}">
                    <h4>I'm a product</h4>
                    <h5>$15.00</h5>
                    <div class="cart">
                        <a href="#"><i class='fa-solid fa-cart' ></i></a>
                    </div>
                </div>   
            </div>
        </section>
        

        
