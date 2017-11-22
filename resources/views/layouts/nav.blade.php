<header>
    <nav class="navbar navbar-fixed-top" style="display: block;">
        <ul>
            <li><a href="/">UK CYCLING EVENTS</a></li>
            <li><a href="{{ route('races') }}">RACES</a></li>
            @guest
            <li><a class="login" onclick="document.getElementById('login-modal').style.display='block'; document.getElementById('signup-modal').style.display='none'">SIGN IN</a></li>
            <li><a class="register" onclick="document.getElementById('register-modal').style.display='block'; document.getElementById('login-modal').style.display='none';">SIGN UP</a></li>
            @else
            <li><a href="/profile"> {{ Auth::user()->name }} </a></li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">LOGOUT</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
            @endguest
            <li>
                <div class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        CART
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
</header>

