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
        @vite('resources/js/details.js')
    </head>
<body>

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
                <li><a href="{{route('cart')}}"><i class="fa-solid fa-cart-shopping" id="cartIcon"></i><span> {{Cart::Count()}}</span></a></li>
                @else
                    <li><a href="{{ route('login') }}" class="">Log in</a></li>

                    @if (Route::has('register'))
                    <li><a href="{{ route('register') }}" class="">Register</a></li>
                @endif
                @endauth
            </ul>
        </header>
    @endif     
    </div>


        <div class="product-detail">
            <div class="pd-images">
                @foreach ($product->images as $image)
                    <img src="{{ asset($image->url_image) }}" alt="">
                @endforeach
            </div>

            <div class="pd-infos">
                <div class="pd-header">
                    <p class="name">{{$product->name}}</p>
                    <p class="price">$ {{ $product->price }}</p>
                </div>

                <div class="size">
                    <p>SIZE: </p>
                    <select name="size" id="sizeSelect">
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                    </select>
                    <div class="button-action">
                        <form action="{{ route('cart.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="hidden" name="name" value="{{ $product->name }}">
                            <input type="hidden" name="price" value="{{ $product->price }}">
                            <input type="hidden" name="size" id="size" value="">
                            <button type="submit">Add to cart</button>
                        </form> 
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
                        
                    </p>En Scullyon miramos por el bienestar del medioambiente.
                    <p><span>Delivery</span></p>
                    <p><span>PAYMENT</span></p>
                </div>
            </div>
        </div><!--product-detail-->
    </div><!--container-->   
</body>
</html>
