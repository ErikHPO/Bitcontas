@extends('layouts.layout')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bitcontas - Pague suas contas com bitcoin.</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-image:url({{ URL::to('/img/80e07f8a.png') }});
                /*background-image: radial-gradient( #FFFF99,#FFFF66, #FFCC00);*/
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 24px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registrar</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <img src="{{ URL::to('/img/logo.webp') }}" alt="BitContas" style="width:50%; height:50%; ">
                    
                </div>

                <div class="links">
                    @if (Route::has('login'))
                    
                    @auth
                    <a href="{{route('bills.index')}}">Pagar contas</a>
                    <a href="{{ route('home') }} ">Ir para meu Dashboard</a>
                    
                    @else
                    <a href="{{ route('register')   }} " title="">Registrar</a>
                    
                    
                    
                    <a href="{{ route('login') }}" title="">Fazer Login</a>
                    @endauth
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>
