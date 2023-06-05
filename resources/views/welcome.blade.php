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
        <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            background-color: white;
            font-family: 'figtree', sans-serif;
        }
        header{
            position: fixed;
            top: 0;
            right: 0;
            width: 100%;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            z-index: 1000;
            padding: 33px 9%;
            box-shadow: 0 0 10px rgba(56, 56, 56, 0.8);
        }

        .logo{
            width: 100px;
            height: 40px;
            object-fit: cover;
        }
        
        .nav{
            display: flex;
        }
        .nav a{
            text-decoration: none;
            font-size: 20px;
            font-weight: 500;
        }
        .nav li{
            list-style: none;
            margin-left: 60px;
        }

        .log{
            display: flex;
            align-items: center;
            justify-content: space-between
        }

        .log a{
            text-decoration: none;
            color: black;
            font-size: 15px;
            font-weight: 500;
            margin-left: 20px;
        }

        .alert{
            color: #E28743;
        }

        .nav a:hover{
            border-bottom: 2px solid #E28743;
        }
        #profileIcon{
                display: none;
            }





/*****************************HERO SECTION ***************************/

        .container-main {
            width: 100%;
            height: 100vh;
            display: grid;
            place-items: center;
            margin-bottom: 5%;
        }

        .container-main img {
            padding-top: 5%;
            width: 100%;
            height: 100vh;
            object-fit: cover;
            
            opacity: 0.8;
        }
        /******SLIDESHOW********/
        section{
            padding:12%;
            padding-top: 0%;
            display: grid;
            place-items: center;
            grid-template-columns: 1fr 1fr ;
            column-gap: 20px;
        }
        section canvas{
            border-radius: 6%;
            
            width: 100%;
            object-fit: cover;
        }
        section div{
            width: 100%;
            display:grid;
            place-items: center;
            row-gap: 20px;
        }
        /*****BOTON********/
        div h1{
            font-size: 100%;
            font-weight: 100;
            color: black;
            text-align:center;
        }
        button {
            padding: 1% 9%;
            border: transparent;
            box-shadow: 8px 10px 8px rgb(226,135,67,0.7);
            background: black;
            border-radius: 4px;
        }
        button a{
            font-size: 100%;
            color: white;
            text-decoration: none;
        }
        
        button:hover {
            background: rgb(2,0,36);
            background: linear-gradient(-30deg, rgba(0,0,0,1) 65%, rgb(226,135,67,0.7) 100%);
        }
        
        button:active {
            transform: translate(0em, 0.2em);
        }


        @media(max-width:1100px){
            header{
                padding: 15px 3%;
            }
            .nav a{
                font-size: 15px;
                font-weight: 500;
            }
            .log a{
                display: none;
            }
            #profileIcon{
                display: grid;
                place-items: center;
                width: 60px;
                height: 60px;
            }
            #logNav{
                width: 100px;
                height: 60px;
            }
            .container-main{
                height: 0% !important;
            }
            .container-main img{
                width:100% !important;
                height: auto !important;
                opacity: 0.8;
            }
        }
    @media(max-width: 790px){
        header{
            padding: 15px 2% !important;
            justify-content: center;
        }
        .nav a{
            font-size: 8px !important;
        }
        .nav li{
            margin-left: 18px;
        }
        .log a{
            display: none;
        }
        #profileIcon{
            display: grid;
            place-items: center;
            width: 10px;
            height: 10px;
            margin-left: 50px !important;
        }
        #logNav{
            width: 100px;
            height: 50px;
        }
        .container-main{
            height: 0% !important;
        }
        .container-main img{
            width:100% !important;
            height: auto !important;
            opacity: 0.8;
        }
    }

    </style>
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
