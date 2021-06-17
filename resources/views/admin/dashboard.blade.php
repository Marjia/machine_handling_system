@extends('template.layout')
@section('content')
  @guest
   @include('auth.login')
  @endguest
      @auth
      <div class="main-content">
        <main>
          <div class="cards">
            <a href="route('user.index')">
              <div class="card-single" style="background:white;color:black;">
                <div>
                  <h2 style="color:black">Add</h2>
                  <span style="color:#424242">Users</span>
                </div>
                <div>
                  <span class="las la-user-plus" style="color:#424242"></span>
                </div >
              </div>
            </a>
            <a href="#">
            <div class="card-single" style="background:white;color:black;">
              <div>
                <h2 style="color:black">Add</h2>
                <span style="color:#424242">Machine</span>
              </div>
              <div>
                <span class="las la-laptop" style="color:#424242"></span>
              </div>
            </div>
            </a>
            <a href="#">
            <div class="card-single" style="background:white;color:black;">
              <div>
                <h2 style="color:black">User</h2>
                <span style="color:#424242">List</span>
              </div>
              <div>
                <span class="las la-users" style="color:#424242"></span>
              </div>
            </div>
            </a>
            <a href="#">
            <div class="card-single">
              <div>
                <h2>Machine</h2>
                <span>List</span>
              </div>
              <div>
                <span class="las la-microchip"></span>
              </div>
            </div>
            </a>
            <a href="route('user.index')">
              <div class="card-single" style="background:white;color:black;">
                <div>
                  <h2 style="color:black">Tag</h2>
                  <span style="color:#424242">Machine Users</span>
                </div>
                <div>
                  <span class="las la-tags" style="color:#424242"></span>
                </div >
              </div>
            </a>
            <a href="#">
            <div class="card-single"  style="background:white;color:black;">
              <div>
                <h2 style="color:black">Detag</h2>
                <span style="color:#424242">Machine</span>
              </div>
              <div>
                <span class="las la-cut" style="color:#424242"></span>
              </div>
            </div>
            </a>
            <a href="#">
            <div class="card-single"  style="background:white;color:black;">
              <div>
                <h2 style="color:black">Create</h2>
                <span style="color:#424242">Sessions</span>
              </div>
              <div>
                <span class="las la-chart-line" style="color:#424242"></span>
              </div>
            </div>
            </a>
            <a href="#">
            <div class="card-single">
              <div>
                <h2>Edit</h2>
                <span>Session Rate</span>
              </div>
              <div>
                <span class="las la-edit"></span>
              </div>
            </div>
            </a>
            <a href="#">
            <div class="card-single"  style="background:white;color:black;">
              <div>
                <h2 style="color:black">Create</h2>
                <span style="color:#424242">Invoice</span>
              </div>
              <div>
                <span class="las la-clipboard" style="color:#424242"></span>
              </div>
            </div>
            </a>
            <a href="#">
            <div class="card-single"  style="background:white;color:black;">
              <div>
                <h2 style="color:black">Show</h2>
                <span style="color:#424242">Invoice</span>
              </div>
              <div>
                <span class="las la-chart-bar"  style="color:#424242"></span>
              </div>
            </div>
            </a>

          </div>

        </main>

      </div>

      <!-- <div class="container">
        <div class="row" style="padding-top: 50px"> -->

            <!-- <div class="col s12 m6">
              <div class="card horizontal">
                <div class="card-image">
                  <img src="https://images.unsplash.com/photo-1527689368864-3a821dbccc34?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" >
                </div>
                <div class="card-stacked">
                  <div class="card-content">
                    <p>Create new users account</p>
                  </div>
                  <div class="card-action">
                    <h6><a href="{{route('user.index')}}" style="color: #0d47a1">Add User</a></h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="col s12 m6">
              <div class="card horizontal">
                <div class="card-image">
                  <img src="https://images.unsplash.com/photo-1552391744-a4b00ba67cec?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Njh8fGNvbXB1dGVyJTIwaGFyZHdhcmV8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60">
                </div>
                <div class="card-stacked"  style="padding-top:40px">
                  <div class="card-content">
                    <p>Add new machines</p>
                  </div>
                  <div class="card-action">
                    <h6><a href="{{route('user.index')}}" style="color: #0d47a1">Add Machine</a></h6>
                  </div>
                </div>
              </div>
            </div>

            <div class="col s12 m6">
              <div class="card horizontal">
                <div class="card-image">
                  <img src="https://images.unsplash.com/photo-1516031190212-da133013de50?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80">
                </div>
                <div class="card-stacked" style="padding-top:40px">
                  <div class="card-content">
                    <p>See all user list and information</p>
                  </div>
                  <div class="card-action">
                    <h6><a href="{{route('user.index')}}" style="color: #0d47a1">Machine List</a></h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="col s12 m6">
              <div class="card horizontal">
                <div class="card-image col s6">
                  <img src="https://images.unsplash.com/photo-1616531770192-6eaea74c2456?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80">
                </div>
                <div class="card-stacked">
                  <div class="card-content">
                    <p>See all machines list and machine information</p>
                  </div>
                  <div class="card-action">
                    <h6><a href="{{route('user.index')}}" style="color: #0d47a1">User List</a></h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="col s12 m6" style="background:#efebe9">
              <div class="card horizontal">
                <div class="card-image col s6"  style="padding:40px">
                  <img src="/img/tagg-machine.png">
                </div>
                <div class="card-stacked" style="padding-top:40px">
                  <div class="card-content">
                    <p>Tag a mechine with user</p>
                  </div>
                  <div class="card-action">
                    <h6><a href="{{route('user.index')}}" style="color: #0d47a1">Tag Machine User</a></h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="col s12 m6" style="background:#efebe9">
              <div class="card horizontal">
                <div class="card-image col s6"  style="padding:40px">
                  <img src="/img/detag-machine.png">
                </div>
                <div class="card-stacked" style="padding-top:40px">
                  <div class="card-content">
                    <p>Detag machine from user</p>
                  </div>
                  <div class="card-action">
                    <h6><a href="{{route('user.index')}}" style="color: #0d47a1">Detag Machine</a></h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="col s12 m6" style="background:#efebe9">
              <div class="card horizontal">
                <div class="card-image col s6"  style="padding:40px">
                  <img src="/img/session.png">
                </div>
                <div class="card-stacked" style="padding-top:40px">
                  <div class="card-content">
                    <p>Create session for machine</p>
                  </div>
                  <div class="card-action">
                    <h6><a href="{{route('user.index')}}" style="color: #0d47a1">Create Session</a></h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="col s12 m6" style="background:#efebe9">
              <div class="card horizontal">
                <div class="card-image col s6"  style="padding:40px">
                  <img src="/img/edit-session-rate.png">
                </div>
                <div class="card-stacked">
                  <div class="card-content">
                    <p>Edit session rate for machines</p>
                  </div>
                  <div class="card-action">
                    <h6><a href="{{route('user.index')}}" style="color: #0d47a1">Edit Session Rate</a></h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="col s12 m6" style="background:#efebe9">
              <div class="card horizontal">
                <div class="card-image col s6"  style="padding:40px">
                  <img src="/img/create-invoice.png">
                </div>
                <div class="card-stacked">
                  <div class="card-content">
                    <p>Create Invoice for sessions</p>
                  </div>
                  <div class="card-action">
                    <h6><a href="{{route('user.index')}}" style="color: #0d47a1">Create Invoice</a></h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="col s12 m6" style="background:#efebe9">
              <div class="card horizontal">
                <div class="card-image col s6"  style="padding:40px">
                  <img src="/img/show-invoice.png">
                </div>
                <div class="card-stacked">
                  <div class="card-content">
                    <p>Show list of Invoices</p>
                  </div>
                  <div class="card-action">
                    <h6><a href="{{route('user.index')}}" style="color: #0d47a1">Show Invoice</a></h6>
                  </div>
                </div>
              </div>
            </div> -->


            <!-- <div class="col s4">
                <div class="card-panel blue darken-4" style="background: linear-gradient(90deg,#0d47a1 ,#2962ff);">
                    <div class="card-action">
                        <a class="white-text" href="{{route('user.index')}}">Users List</a>
                    </div>
                </div>
            </div>
            <div class="col s4">
                <div class="card-panel indigo darken-4" style="background: linear-gradient(90deg,#1a237e,#5c6bc0);">
                    <div class="card-action">
                        <a class="white-text" href="{{route('user.create')}}">Add user</a>
                    </div>
                </div>
            </div>
            <div class="col s4">
                <div class="card-panel indigo darken-4" style="background: linear-gradient(90deg,#1a237e,#5c6bc0);">
                    <div class="card-action">
                        <a class="white-text" href="{{route('machine.create')}}">Add Machine</a>
                    </div>
                </div>
            </div>
            <div class="col s4">
                <div class="card-panel blue darken-4" style="background: linear-gradient(90deg,#0d47a1 ,#2962ff);">
                    <div class="card-action">
                        <a class="white-text" href="{{route('machine.index')}}">Machine List</a>
                    </div>
                </div>
            </div>
            <div class="col s4">
                <div class="card-panel yellow darken-4">
                    <div class="card-action">
                        <a class="white-text" href="{{route('assign-machine')}}">Tag Machine User</a>
                    </div>
                </div>
            </div>
            <div class="col s4">
                <div class="card-panel red darken-4" style="background: linear-gradient(90deg,#b71c1c,#d50000);">
                    <div class="card-action">
                        <a class="white-text" href="{{route('detag-machine')}}">Detag Machine</a>
                    </div>
                </div>
            </div>
            <div class="col s4">
                <div class="card-panel" style="background: linear-gradient(90deg,#bf360c,#ff5722);">
                    <div class="card-action">
                        <a class="white-text" href="{{route('invoice.index')}}">Create Invoice</a>
                    </div>
                </div>
            </div>
            <div class="col s4">
                <div class="card-panel" style="background: linear-gradient(90deg,#004d40,#26a69a );">
                    <div class="card-action">
                        <a class="white-text" href="{{route('user-session.index')}}">Session Create</a>
                    </div>
                </div>
            </div>
            <div class="col s4">
                <div class="card-panel" style="background: linear-gradient(90deg,#01579b,#039be5);">
                    <div class="card-action">
                        <a class="white-text" href="{{route('edit-rate.index')}}">Edit Session Rate</a>
                    </div>
                </div>
            </div>
            <div class="col s4">
                <div class="card-panel" style="background: linear-gradient(90deg,#33691e,#558b2f );">
                    <div class="card-action">
                        <a class="white-text" href="{{route('invoice.show',1)}}">Show Invoices</a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
  @endauth
@endsection
