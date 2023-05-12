<nav>

    <!-- Logo -->
    <h1>Forgeddit</h1>

    <!-- Guest Links -->
    <ul>
        <li>
            <a href="/posts">Posts</a>
        </li>

        <li>
            <a href="/users">Users</a>
        </li>
    </ul>


    <!-- User Links -->
    @if(Auth::check())
        <ul>
            <li>
                <a href="/userpage">{{ Auth::user()->name }}'s Page</a>
            </li>
    
            <li>
                <a href="/usersettings">Settings</a>
            </li>

            <li>
                <a href="/usernotifs">Notifications</a>
            </li>

            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        
                        Log Out
                    </a>
                </form>
            </li>
        </ul>
    
    <!-- Guest Links -->
    @else
        <ul>
            <li>
                <a href="{{ route('login') }}">Log In</a>
            </li>

            <li>
                <a href="{{ route('register')}}">Register</a>
            </li>
        </ul>
    @endif

</nav>
