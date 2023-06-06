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
        <link rel="stylesheet" href="{{ asset('build/assets/landing.css') }}">
    </head>
    <body class="antialiased">
            @if (Route::has('login'))
                <header>
                    <a href="{{ url('/') }}" class="logo">
                        <x-application-logo class="w-30 h-20" id="logNav" />
                    </a>

                    <ul class="nav">
                        <li><a href="{{ url('/') }}" class="">COLLECTION</a></li>
                        <li><a href="{{ url('/') }}" class="alert">NEW DROP</a></li>
                        <li><a href="{{ url('/') }}" class="">THE TEAM</a></li>
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
        <div id="container" class="container-main" >
            <img src="{{ asset('storage\cartel-publicidad.jpg') }}" width="300" height="300" alt="Descripción de la imagen">
            
        </div>
        <section id="slideshow-container">
            <canvas id="canvas" width="1204" height="1000"></canvas>
            <div>
                <h1>GO TO THE NEW COLLECTION</h1>
                <button><a href="{{ route('login') }}">SHOP NOW</a></button>
            </div>
        </section>
        <script>
            const i1 = "https://images.unsplash.com/photo-1675257020144-ae2f0369900a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=710&q=80";
            const i2 = "https://images.unsplash.com/photo-1674908850980-13d381e2c5f8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=684&q=80"; 
            const i3 = "https://images.unsplash.com/photo-1675257020144-ae2f0369900a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=710&q=80";
            const i4 = "https://images.unsplash.com/photo-1674908850980-13d381e2c5f8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=684&q=80"; 
            const images = [i1,i2,i3,i4]
            const canvas = document.getElementById("canvas");
            const ctx = canvas.getContext("2d");
            let currentImageIndex = 0;
    
            function drawImage() {
            const image = new Image();
            image.src = images[currentImageIndex];
            image.onload = function() {
            ctx.drawImage(image, 0, 0, canvas.width, canvas.height);
            setTimeout(nextImage, 5000);
            };
            }
            function nextImage() {
            currentImageIndex++;
            if (currentImageIndex >= images.length) {
                currentImageIndex = 0;
            }
            drawImage();
            }
    
            drawImage();
    
            const h1 = document.querySelector('#slideshow-container h1');
            const button = document.querySelector('#slideshow-container button');
    
            const bounceAnimation = anime({
            targets: [h1, button],
            translateY: {
                value: [+100, 0],
                duration: 3300,
                elasticity: 600,
            },
            loop: true
            });
        </script>
    </body>
    </html>
