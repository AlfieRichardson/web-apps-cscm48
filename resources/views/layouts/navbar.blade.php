<nav class="navigation">
    <section class="container">

        <!-- Logo -->
        <a href="/posts" class="navigation-title">Forgeddit</a>

        <ul class="navigation-list float-right">

            <!-- Default Links -->
            <li class="navigation-item">
                <a class="navigation-link" href="/posts">Posts</a>
            </li>

            <li class="navigation-item">
                <a class="navigation-link" href="/users">Users</a>
            </li>

            @if(Auth::check())
            <!-- User Links -->
            <li class="navigation-item">
                <a class="navigation-link" href="/userpage">{{ Auth::user()->name }}'s Page</a>
            </li>
        
            <li class="navigation-item">
                <a class="navigation-link" href="/usersettings">Settings</a>
            </li>

            <li class="navigation-item">
                <a class="navigation-link" href="/usernotifs">Notifications</a>
            </li>

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
