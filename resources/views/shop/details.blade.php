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
                    <p>Quantity: </p>
                    <select id="qty">
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    <div class="button-action">
                        <form action="{{ route('cart.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="hidden" name="name" value="{{ $product->name }}">
                            <input type="hidden" name="price" value="{{ $product->price }}">
                            <input type="hidden" name="size" id="size">
                            <input type="hidden" name="quantity" id="quantity">
                            <button type="submit" class="submitAdd">Add to cart</button>
                        </form> 
                    </div>
                </div>

                <ul>
                    <li>This item is unisex</li>
                    <li>Oversize fit</li>
                    <li>Made in Spain</li>
                    <li>Dry cleaning</li>
                    <li>Material: 100% cotton</li>
                </ul>

                <div class="expand">
                    <p><span>PRODUCT SUSTAINABILITY</span></p>
                    Your style, our commitment. At Scullyon, we care about the environment.
                     That's why every garment we design combines fashion and sustainability for a brighter future.
                    <p><span>Delivery</span></p>
                    We take care of every detail of your delivery. 
                    At Scullyon, we strive to deliver your purchases safely and guarantee an exceptional experience.
                    Delivery time:3 to 7 business days.
                    <p><span>PAYMENT & RETURNS</span></p>
                    Hassle-free and easy returns. If you're not completely satisfied with your purchase, 
                    Scullyon offers a simple and convenient return process to ensure your satisfaction.
                </div>
            </div>
        </div><!--product-detail-->
    </div><!--container--> 


    <section id="testimonials">
        <!--heading--->
        <div class="testimonial-heading">
            <span>Reviews</span>
            <form action="{{route('reviews.create')}}" method="GET">
                <input type="hidden" name="product_id" value="{{$product->id}}">
            <button type="submit" class="btn">Add Review</button></a>
            </form>
        </div>
        <div class="testimonial-box-container">
            @foreach ( $reviews as $review )
            <div class="testimonial-box">
                <!--top------------------------->
                <div class="box-top">
                    <!--profile----->
                    <div class="profile">
                        <!--name-and-username-->
                        <div class="name-user">
                            <strong>{{$review->user->name}}</strong>
                            <span>{{$review->user->email}}</span>
                        </div>
                    </div>
                    <div class="client-comment">
                        <p>{{$review->body}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</body>
</html>
