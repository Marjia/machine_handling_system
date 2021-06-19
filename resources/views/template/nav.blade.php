<!-- <nav class="grey darken-3">
    <div class="container">
        <div class="nav-wrapper">
            <a href="{{route('home')}}" class="brand-logo">Home</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                @guest
                    <li><a href="{{route('login')}}">Log In</a></li>
                @endguest
                @auth
                    <li>
                      <a class="dropdown-trigger grey darken-3" href="#!" data-target="dropdown1">
                        {{ auth()->user()->name }}
                      </a>
                      <ul id="dropdown1" class="dropdown-content grey darken-3">
                         <li><a href="{{ route('profile') }}">Profile</a></li>
                         <li>
                           <form id="formOne" action="{{route('logout')}}" method="post">
                             @csrf
                             <a type="submit" onclick="formOne.submit()" style="color:black; text-align:center;">Logout</a>
                           </form>
                         </li>
                       </ul>
                    </li>
                    </li>
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li>
                  	<form action="{{route('logout')}}" method="post">
                  	  @csrf
                  	  <button type="submit" class="btn grey darken-3">Logout</button>
                  	</form>
                    </li>
                     <li>
                      <a class='dropdown-trigger' href="{{ route('profile') }}" data-target='dropdown1'>Drop Me!</a>

                      <ul id='dropdown1' class='dropdown-content'>
                        <li><a href="#!">one</a></li>
                      </ul>
                   </li>
                @endauth
            </ul>
        </div>
    </div> -->

<input type="checkbox" id="nav-toggle">
<div class="sidebar">
  <div class="sidebar-brand">
    <h2>
      <span class="lab la-accusoft"></span>
      <span>Machine Manage</span>
    </h2>
  </div>
  <div class="sidebar-menu">
    <ul>
      <li>
        <a href="{{ route('dashboard') }}" class="active">
          <span class="las la-igloo"></span>
          <span>Dashboard</span>
        </a>
      </li>
      <li>
        <a href="{{ route('profile') }}">
          <span class="las la-user"></span>
          <span>Profile</span>
        </a>
      </li>
      <li>
        <a href="{{route('login')}}">
          <span class="las la-user"></span>
          <span>Log In</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="las la-user-plus"></span>
          <span>Add User</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="las la-laptop"></span>
          <span>Add Machine</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="las la-users"></span>
          <span>User List</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="las la-microchip"></span>
          <span>Machine List</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="las la-tags"></span>
          <span>Tag Machine User</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="las la-cut"></span>
          <span>Detag Machine</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="las la-chart-line">
          </span>
          <span>Create Session</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="las la-edit">
          </span>
          <span>Edit Session Rate</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="las la-clipboard">
          </span>
          <span>Create Invoice</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="las la-chart-bar">
          </span>
          <span>Show Invoice</span>
        </a>
      </li>

    </ul>
  </div>
</div>
<div class="main-content">
  <header>
    <h5>
      <label for="nav-toggle">
        <span class="las la-bars"></span>
      </label>
      Dashboard
    </h5>

    <!-- <div class="search-wrapper">
      <span class="las la-search"></span>
      <input type="search" placeholder="search here">
    </div> -->


@auth
    <div class="user-wrapper">
      <img src="https://www.itechway.net/wp-content/uploads/2017/06/girl-profile-pic-1024x683.jpeg"
      width="50px" height="50px" alt="">
      <div>
          <h4 style="color:black">{{ auth()->user()->name }} {{ auth()->user()->last_name }}</h4>
          <form id="formOne" action="{{route('logout')}}" method="post">
            @csrf
            <button type="submit" class="btn grey darken-3">Logout</button>
            <!-- <a type="submit" onclick="formOne.submit()" style="color:black; text-align:center;">Logout</a> -->
          </form>
          <!-- <small>Logout</small> -->
      </div>

    </div>
@endauth
  </header>
</div>


<!-- sidenave code pink one     -->
    <!-- <div id="mainbox" onclick="openfunction()">&#9776;</div>
    <div id="menu" class="sidemenu">
      <a href="#">Profile</a>
      <a href="#">Dashboard</a>
      <a href="#">Add User</a>
      <a href="#">Add Machine</a>
      <a href="#">User list</a>
      <a href="#">Machine list</a>
      <a href="#">Tag Machine User</a>
      <a href="#">Detag Machine User</a>
      <a href="#">Create Session</a>
      <a href="#">Edit Session Rate</a>
      <a href="#">Create Invoice</a>
      <a href="#">Show Invoice</a>
      <a href="#" class="closebtn" onclick="closefunction()">x</a>
    </div> -->

<!-- </nav> -->
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.dropdown-trigger');
      var instances = M.Dropdown.init(elems);
    });
    function openfunction(){
      document.getElementById("menu").style.width="260px";
      document.getElementById("mainbox").style.marginleft="260px";
    }
    function closefunction(){
      document.getElementById("menu").style.width="0px";
      document.getElementById("mainbox").style.marginleft="0px";
    }


</script>
