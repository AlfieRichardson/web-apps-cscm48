<html>
    <head>
        <title>forgeddit - @yield('title')</title>

        @include('layouts.navbar')
    </head>

    <body>
        <h1>@yield('title')</h1>
        
        <div>
            @yield('content')
        </div>
    </body>
</html>