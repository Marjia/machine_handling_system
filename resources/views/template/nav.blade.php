
<nav class="grey darken-3">
    <div class="container">
        <div class="nav-wrapper">
            <a href="{{route('home')}}" class="brand-logo">Home</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                @guest
                    <li><a href="{{route('login')}}">Log In</a></li>
                @endguest
                @auth
                    <li><a href="{{ route('profile') }}">{{ auth()->user()->name }}</a>
                    </li>
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li>
                  	<form action="{{route('logout')}}" method="post">
                  	  @csrf
                  	  <button type="submit" class="btn grey darken-3">Logout</button>
                  	</form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
