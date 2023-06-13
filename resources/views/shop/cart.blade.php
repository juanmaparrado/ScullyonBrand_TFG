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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Styles -->
        <!--Enlace a archivo externo de css-->
        @vite('resources/css/cart.css')
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
        </div>

        <div class="wrap cf">
            <h1 class="projTitle">SCULLYON Shopping Cart</h1>
            <div class="heading cf">
              <a href="{{route('drop')}}" class="continue">Continue Shopping</a>
            </div>
            <div class="cart">
              <ul class="cartWrap">
                <li class="items odd">
                    <div class="infoWrap"> 
                        <div class="cartSection">
                            <img src="" alt="sdgf" class="itemImg" />
                            <p class="itemNumber">1</p>
                            <h3 id="nameProduct">Name</h3>
                            <p> <input type="text"  class="qty" placeholder="1"/> x 5 <!-- price --></p>
                        </div>  
                        <div class="prodTotal cartSection">
                            <p>$<!--precio total-->15</p>
                        </div>
                        <div class="cartSection removeWrap">
                            <a href="#" class="remove">x</a>
                        </div>
                    </div>
                </li>
              </ul>
            </div>            
            <div class="subtotal cf">
              <ul>
                <li class="totalRow"><span class="label">Subtotal</span><span class="value">$35.00</span></li>
                    <li class="totalRow"><span class="label">Shipping</span><span class="value">$0.00</span></li>
                    <li class="totalRow final"><span class="label">Total</span><span class="value">$35.00</span></li>
                    <li class="totalRow"><a href="#" class="btn continue">Checkout</a></li>
              </ul>
            </div>
          </div>

    </body>
</html>