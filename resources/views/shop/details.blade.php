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
        @vite('resources/css/details.css')
    </head>
<body>

    <div id="container" class="container-main" >
        @if (Route::has('login'))
        <header>
            <a href="{{ url('/') }}" class="logo">
                <x-application-logo class="w-30 h-20" id="logNav" />
            </a>

            <ul class="nav">
                <li><a href="{{ url('/') }}" class="">COLLECTION</a></li>
                <li><a href="{{ url('/drop') }}" class="alert">NEW DROP</a></li>
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
        <div class="product-detail">
            <div class="pd-images">
                <img src="" alt="">
                <img src="" alt="">
                <img src="" alt="">
                <img src="" alt="">
                <img src="{{asset("storage/02.png")}}" alt="">
                <img src="{{asset("storage/02.png")}}" alt="">
                <img src="{{asset("storage/02.png")}}" alt="">
                <img src="{{asset("storage/02.png")}}" alt="">
            </div>

            <div class="pd-infos">
                <div class="pd-header">
                    <p class="name">MEN'S PULL-OVER JACKET IN BLUE</p>
                    <p class="price">$ 2500</p>
                    <p class="short-des">Pull-Over Jacket in blue Japanese denim is from the look 52 of the Balenciaga's Winter 22</p>
                </div>

                <div class="size">
                    <p>SIZE: </p>
                    <select name="size" id="">
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                    </select>
                    <div class="button-action">
                        <button>Add to cart</button>
                    </div>
                </div>

                <ul>
                    <li>Collection, 360° Show.</li>
                    <li>This item is unisex</li>
                    <li>Oversize fit</li>
                    <li>Attached hood</li>
                    <li>2 slash pockets at front</li>
                    <li>Adjustable buttoning at waist</li>
                    <li>Made in Spain</li>
                    <li>Dry cleaning</li>
                    <li>Material: 100% cotton</li>
                </ul>

                <div class="expand">
                    <p>
                        <span>PRODUCT SUSTAINABILITY</span>
                    </p>
                    <p>
                        <span>FREE SHIPPING, FREE RETURNS</span>
                    </p>
                    <p>
                        <span>PAYMENT</span>
                        
                    </p>
                </div><!--expand-->
            </div>
        </div><!--product-detail-->
    </div><!--container-->   
</body>
</html>
