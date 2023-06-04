<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .background-svg {
                position: fixed; /* Fija el elemento en la ventana del navegador */
                top: 0;
                left: 0;
                z-index: -1; /* Coloca el SVG detrás del contenido */
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <!-- Agrega el SVG como fondo -->
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" style="position: fixed; z-index: -2;">
                <path fill="#695F55" d="M48.1,-64.7C62.8,-65.4,75.5,-52.8,76.3,-38.5C77.1,-24.2,66.1,-8.1,54.8,1.5C43.5,11.2,31.9,14.4,26.1,24.6C20.3,34.8,20.3,51.9,12.6,63.8C4.8,75.6,-10.6,82.2,-17.7,73.9C-24.8,65.6,-23.5,42.4,-35.3,30C-47.1,17.5,-71.9,15.7,-76.7,8.6C-81.5,1.5,-66.3,-10.9,-59.2,-27.2C-52,-43.5,-52.9,-63.6,-44.4,-65.7C-35.9,-67.9,-17.9,-52,-0.6,-51.1C16.7,-50.1,33.4,-64,48.1,-64.7Z" transform="translate(0 120)" />
            </svg>
            
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" style="position: fixed; z-index: -2; ">
                <path fill="#CE9F69" d="M47.2,-65.9C57.4,-57.5,59.4,-38.7,54.9,-24.5C50.4,-10.2,39.4,-0.5,36.4,12.8C33.4,26.1,38.5,43.1,33.8,43.8C29.1,44.6,14.5,29.1,1.3,27.4C-12,25.7,-24.1,37.7,-34.6,38.8C-45.1,40,-54.2,30.3,-51.4,20.9C-48.7,11.6,-34.2,2.6,-30.8,-10.6C-27.4,-23.9,-35.1,-41.4,-31.8,-52C-28.5,-62.7,-14.2,-66.6,2.1,-69.5C18.5,-72.4,36.9,-74.3,47.2,-65.9Z" transform="translate(180 125)" />
              </svg>

            <div>
                <a href="/">
                    <x-application-logo class="w-40 h-30" />
                </a>
            </div>
    
            <div>
                {{ $slot }}
            </div>
        </div>
    </body>
    
