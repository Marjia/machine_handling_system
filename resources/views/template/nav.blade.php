
<nav class="grey darken-3">
    <div class="container">
        <div class="nav-wrapper">
            <a href="{{route('home')}}" class="brand-logo">Home</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                @guest
                    <li><a href="{{route('login')}}">Log In</a></li>
                @endguest
                @auth
                    <li><a href="{{ route('adminDashboard') }}">{{ auth()->user()->name }}</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav> 
