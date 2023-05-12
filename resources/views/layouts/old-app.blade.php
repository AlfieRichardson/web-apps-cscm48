<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">

        <!-- Google Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">

        <!-- CSS Reset -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">

        <!-- Milligram CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">


        <title>forgeddit - @yield('title')</title>
    </head>

    <body>
        <main class="wrapper">
            @include('layouts.navbar')
            <header class="header">
                <section class="container">
                    <h1>@yield('title')</h1>
                    @yield('description')
                </section>
            </header>
            
            @if (session('message'))

            <section class="container">
                <p><b>{{ session('message') }}</b></p>
            </section>

            @endif

            @if ($errors->any())

            <section class="container">
                <p>Errors!</p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </section>

            @endif
            
            @yield('content')

            <footer class="footer">
                <section class="container">
                    <p class="description">
                        Created by Alfie Richardson (Student Number: 851009)
                    </p>
                </section>
            </footer>
        </main>
    </body>
</html>