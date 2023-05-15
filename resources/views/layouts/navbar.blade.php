<nav class="navigation">
    <section class="container">

        <!-- Logo -->
        <a href="/posts" class="navigation-title">Forgeddit</a>

        <ul class="navigation-list float-right">

            <!-- Default Links -->
            <li class="navigation-item">
                <a class="navigation-link" href="/posts">Posts</a>
            </li>

            @if(Auth::check())
            <li class="navigation-item">
                <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a class="navigation-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                               this.closest('form').submit();">
                                
                        Log Out
                    </a>
                </form>
            </li>

            @else
            <!-- Guest Links -->
            <li class="navigation-item">
                <a class="navigation-link" href="{{ route('login') }}">Log In</a>
            </li>

            <li class="navigation-item">
                <a class="navigation-link" href="{{ route('register')}}">Register</a>
            </li>
            @endif
        </ul>

    </section>
</nav>
