<header>
    <nav class="navbar navbar-fixed-top" style="display: block;">
        <ul>
            <li><a href="/">UK CYCLING EVENTS</a></li>
            <li><a href="{{ route('races') }}">RACES</a></li>
            @guest
            <li><a class="login">SIGN IN</a></li>
            <li><a class="register">SIGN UP</a></li>
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
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
            CART<span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
        </ul>
    </div>
            <a href="">CART</a></li>
        </ul>
    </nav>
</header>

