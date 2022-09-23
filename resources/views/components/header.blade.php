<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>GroomRoom</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <div class="page">
        <!-- Header -->
        <header class="header">
            <div class="header__inner container">
                <a href="{{ route('home')  }}"><img src={{asset('assets/img/logo.png')}} alt="" class="header__logo"></a>
                <nav class="header__nav">
                    @auth
                    <a href="{{ route('user', ['userId' => auth()->user()->id]) }}">
                        Личный кабинет
                    </a>
                    <a href="{{ route('logout') }}">Вытий</a>
                    @endauth
                    
                    @if (auth()->user() && auth()->user()->isAdmin())
                        <a href="{{ route('admin', ['adminId' => auth()->user()->id]) }}">
                            Админ панель
                        </a>
                    @endif
                </nav>
            </div>
        </header>
        <!-- /.Header -->
