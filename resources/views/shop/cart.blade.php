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

        <div class="wrap cf">
            <h1 class="projTitle">SCULLYON Shopping Cart</h1>
            @if (session()->has('success_message'))
            <br><p style="color:rgb(255, 0, 0); width:100%;">{{session()->get('success_message')}}</p>
            @endif
            <div class="heading cf">
                <a href="{{route('drop')}}" class="btnShopping">Continue Shopping</a>
            </div>
            <div class="cart">
            @if (Cart::count() > 0)
              <ul class="cartWrap">
                @foreach (Cart::content() as $item)
                <li class="items odd">
                    <div class="infoWrap"> 
                        <div class="cartSection">
                            <a href="{{ route('drop.details', ['productId' => $item->model->id]) }}">
                                <h3 id="nameProduct">{{$item->model->name}}</h3>
                            </a>
                            <p class="itemNumber">Size: {{$item->options->size}}</p><br>
                            <p> <input type="text"  class="qty" placeholder="1"/> x {{$item->model->price}} $</p>
                        </div>  
                        <div class="prodTotal cartSection">
                            <p>${{ $item->model->price }}</p>
                        </div>
                        <div class="cartSection removeWrap">
                            <form action=" {{route('cart.destroy',$item->rowId)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="remove" >x</button>
                            </form>
                        </div>
                    </div>
                </li>
                @endforeach
              </ul>
            
            @else
              <h1>No Item in cart.</h1>  
            @endif
            </div>            
            <div class="subtotal cf">
              <ul>
                <li><a href="{{ route('cart.empty')}}">Clear All</a></li>
                <li class="totalRow"><span class="label">Subtotal</span><span class="value">{{Cart::Subtotal()}} $</span></li>
                    <li class="totalRow"><span class="label">Shipping</span><span class="value"><del>$0.00</del></span></li>
                    <li class="totalRow"><span class="label">Tax (21%)</span><span class="value">{{Cart::tax()}}</span></li>
                    <li class="totalRow final"><span class="label">Total</span><span class="value">{{Cart::total()}} $</span></li>
                    <li class="totalRow"><a href="#" class="btn continue">Checkout</a></li>
              </ul>
            </div>
          </div>

    </body>
</html>