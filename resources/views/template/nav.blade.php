<nav class="grey darken-3">
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
                    <!-- <li>
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
                   </li> -->
                @endauth
            </ul>
        </div>
    </div>

<!-- <div class="sidebar">
  <div class="sidebar-brand">
    <h5>
      <span class="lab la-accusoft"></span>
       Machine Manage
    </h5>
  </div>
  <div class="sidebar-menu">
    <ul>
      <li>
        <a href="#">
          <span class="las la-igloo"></span>
          <span style="color:black;">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="las la-igloo"></span>
          <span style="color:black;">Profile</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="las la-igloo"></span>
          <span style="color:black;">Add User</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="las la-igloo"></span>
          <span style="color:black;">Add Machine</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="las la-igloo"></span>
          <span style="color:black;">User List</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="las la-igloo"></span>
          <span style="color:black;">Machine List</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="las la-igloo"></span>
          <span style="color:black;">Tag Machine User</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="las la-igloo"></span>
          <span style="color:black;">Detag Machine</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="las">
            <img src="/img/tagg-machine.png" style="height:15px; width:15px;">
          </span>
          <span style="color:black;">Create Session</span>
        </a>
      </li>

    </ul>
  </div>
</div>
<div class="main-content">
  <header>
    <h1>
      <label for="">
        <span class="las la-bars"></span>
      </label>
      Dashboard
    </h1>

    <div class="search-wraper">
      <span class="las la-search"></span>
      <input type="search" placeholder="search here">
    </div>
    <div class="user-wrapper">
      <img src="/img/tagg-machine.png" width="40px" height="40px" alt="">
    </div>
    <div>
        <h4>Coco Spencer</h4>
        <small>Admin</small>
    </div>
  </header>
</div> -->


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

</nav>
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
