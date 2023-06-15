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
        @vite('resources/css/checkout.css')
    </head>
    <body class="antialiased">       
        <div id="container" class="container-main" >
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" style="position: fixed; z-index: -2;" class="back">
                <path fill="#695F55" d="M48.1,-64.7C62.8,-65.4,75.5,-52.8,76.3,-38.5C77.1,-24.2,66.1,-8.1,54.8,1.5C43.5,11.2,31.9,14.4,26.1,24.6C20.3,34.8,20.3,51.9,12.6,63.8C4.8,75.6,-10.6,82.2,-17.7,73.9C-24.8,65.6,-23.5,42.4,-35.3,30C-47.1,17.5,-71.9,15.7,-76.7,8.6C-81.5,1.5,-66.3,-10.9,-59.2,-27.2C-52,-43.5,-52.9,-63.6,-44.4,-65.7C-35.9,-67.9,-17.9,-52,-0.6,-51.1C16.7,-50.1,33.4,-64,48.1,-64.7Z" transform="translate(-10 100)" />
            </svg>
            
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" style="position: fixed; z-index: -2;" class="back">
                <path fill="#CE9F69" d="M47.2,-65.9C57.4,-57.5,59.4,-38.7,54.9,-24.5C50.4,-10.2,39.4,-0.5,36.4,12.8C33.4,26.1,38.5,43.1,33.8,43.8C29.1,44.6,14.5,29.1,1.3,27.4C-12,25.7,-24.1,37.7,-34.6,38.8C-45.1,40,-54.2,30.3,-51.4,20.9C-48.7,11.6,-34.2,2.6,-30.8,-10.6C-27.4,-23.9,-35.1,-41.4,-31.8,-52C-28.5,-62.7,-14.2,-66.6,2.1,-69.5C18.5,-72.4,36.9,-74.3,47.2,-65.9Z" transform="translate(180 125)" />
              </svg>
            @if (Route::has('login'))
            <header>
                <a href="{{ url('/') }}" class="logo">
                    <x-application-logo class="w-30 h-20" id="logNav" />
                </a>
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

        <div class="screen flex-center">
        <form class="popup flex p-lg" action="{{route('checkout.store')}}" method="POST">
          @csrf
            <!-- CARD FORM -->
            <div class="flex-fill flex-vertical">
                <div class="card-data flex-fill flex-vertical">
                  <div class="flex-between">
                    <div class="card-property-title">
                      <strong>Email</strong>
                      <span>Choose a email to receive the confimation</span>
                    </div>
                    <div class="card-property-value">
                      <div class="input-container">
                        <input name="email" id="email" type="text" class="" placeholder="email@example.com">
                      </div>
                    </div>
                  </div>
                  <!--Adress -->
                  <div class="flex-between">
                    <div class="card-property-title">
                      <strong>City</strong>
                      <span></span>
                    </div>
                    <div class="card-property-value">
                      <div class="input-container">
                        <input name="city" id="city" type="text" class="" placeholder="City">
                      </div>
                    </div>
                  </div>
                  <div class="flex-between">
                    <div class="card-property-title">
                      <strong>Address</strong>
                      <span></span>
                    </div>
                    <div class="card-property-value">
                      <div class="input-container">
                        <input id="address" name="address" type="text" class="" placeholder="Example of street, X">
                      </div>
                    </div>
                  </div>
                  <div class="flex-between">
                    <div class="card-property-title">
                      <strong>Phone</strong>
                      <span></span>
                    </div>
                    <div class="card-property-value">
                      <div class="input-container">
                        <input id="phone" name="phone" type="text" class="" placeholder="XXX XX XX XX">
                      </div>
                    </div>
                  </div>
                  <div class="separation-line"></div>
                <!-- Card Number -->
                <div class="flex-between flex-vertical-center">
                    <div class="card-property-title">
                    <strong>Card Number</strong>
                    <span>Enter 16-digit card number on the card</span>
                    </div>
                </div>
                
                <!-- Card Field -->
                <div class="flex-between">
                    <div class="card-number flex-vertical-center flex-fill">
                    <div class="card-number-field flex-vertical-center flex-fill">
                
                    <input class="numbers" name="cardNumber" id="cardNumber" type="number" placeholder="0000-0000-0000-0000">
                </div>
            </div>
          </div>
          
          <!-- Expiry Date -->
          <div class="flex-between">
            <div class="card-property-title">
              <strong>Expiry Date</strong>
              <span>Enter the expiration date of the card</span>
            </div>
            <div class="card-property-value flex-vertical-center">
              <div class="input-container half-width">
                <input class="numbers" name="month"  id="month" type="number" min="1" max="12" step="1" placeholder="MM">  
              </div>
              <span class="m-md">/</span>
              <div class="input-container half-width">
                <input class="numbers" name="year" id="year" type="number" min="23" max="99" step="1" placeholder="YY">
              </div>
            </div>
          </div>
          
          <!-- CCV Number -->
          <div class="flex-between">
            <div class="card-property-title">
              <strong>CVC Number</strong>
              <span>Enter card verification code from the back of the card</span>
            </div>
            <div class="card-property-value">
              <div class="input-container">
                <input id="cvc" type="password">
              </div>
            </div>
          </div>
          <!-- Name -->
          <div class="flex-between">
            <div class="card-property-title">
              <strong>Cardholder Name</strong>
              <span>Enter cardholder's name</span>
            </div>
            <div class="card-property-value">
              <div class="input-container">
                <input id="cardName" name="cardName" type="text" class="uppercase" placeholder="CARDHOLDER NAME">
              </div>
            </div>
          </div>
          <div class="separation-line"></div>
          <div class="flex-fill flex-vertical right">
            <div>
              <div class="total-label f-secondary-color">Shipping <span class="">{{Cart::tax()}}</span></div>
              <div class="value">Total <strong>{{Cart::total()}}</strong></div>
            </div>
          </div>
          
        </div>
        <div class="action flex-center">
          <button type="submit" class="">Pay Now</button>
        </div>
      </div>
</div>