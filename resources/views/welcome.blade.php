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
            <img src="{{ asset('storage\cartel-publicidad.jpg') }}" width="300" height="300" alt="Descripción de la imagen">
            
        </div>
        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" style=" z-index: -1;">
            <path fill="#695F55" d="M48.1,-64.7C62.8,-65.4,75.5,-52.8,76.3,-38.5C77.1,-24.2,66.1,-8.1,54.8,1.5C43.5,11.2,31.9,14.4,26.1,24.6C20.3,34.8,20.3,51.9,12.6,63.8C4.8,75.6,-10.6,82.2,-17.7,73.9C-24.8,65.6,-23.5,42.4,-35.3,30C-47.1,17.5,-71.9,15.7,-76.7,8.6C-81.5,1.5,-66.3,-10.9,-59.2,-27.2C-52,-43.5,-52.9,-63.6,-44.4,-65.7C-35.9,-67.9,-17.9,-52,-0.6,-51.1C16.7,-50.1,33.4,-64,48.1,-64.7Z" 
            transform="translate(20 80)" />
        </svg>
        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
            <path fill="#CE9F69" d="M47.2,-65.9C57.4,-57.5,59.4,-38.7,54.9,-24.5C50.4,-10.2,39.4,-0.5,36.4,12.8C33.4,26.1,38.5,43.1,33.8,43.8C29.1,44.6,14.5,29.1,1.3,27.4C-12,25.7,-24.1,37.7,-34.6,38.8C-45.1,40,-54.2,30.3,-51.4,20.9C-48.7,11.6,-34.2,2.6,-30.8,-10.6C-27.4,-23.9,-35.1,-41.4,-31.8,-52C-28.5,-62.7,-14.2,-66.6,2.1,-69.5C18.5,-72.4,36.9,-74.3,47.2,-65.9Z" 
            transform="translate(180 160)" />
          </svg>
        <section id="slideshow-container">
            <canvas id="canvas" width="1204" height="1000"></canvas>
            <div>
                <h1>SEE NEW DROP</h1>
                <button><a href="{{ url('/drop') }}">SHOP NOW</a></button>
            </div>
        </section>


        <section id="sec-01">
            <div class="container">
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
            </div>
        </section>

        <section class="services">
            <div class="row">
                <div class="servi">
                    <i class="fa-sharp fa-solid fa-truck-fast"></i>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing</p>   
                </div>
                <div class="servi">
                    <i class="fa fa-dolly"></i>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing</p>   
                </div>
            </div>
        </section>

        <footer>

            <div class="footer-content">
        
              <h3>Scullyon</h3>
        
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vitae felis scelerisque, gravida sapien non, cursus augue. Aenean id pretium turpis. Suspendisse eros nunc, sollicitudin nec.</p>
        
              <ul class="socials">
        
                <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
        
                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
        
                <li><a href="#"><i class="fa-brands fa-google-plus"></i></a></li>
        
                <li><a href="#"><i class="fa-brands fa-tiktok"></i></a></li>
        
                <li><a href="#"><i class="fa-brands fa-linkedin-square"></i></a></li>
        
              </ul>
        
            </div>
        </footer>

    </body>
    </html>
