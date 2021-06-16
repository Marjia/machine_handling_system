@extends('template.layout')
@section('content')
    <div class="container">
     @guest
      @include('auth.login')
     @endguest
      @auth
        <div class="row" style="padding-top: 50px">

            <div class="col s12 m6">
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
            </div>

<!--
            <div class="col s4">
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
            </div> -->
        </div>
      @endauth
    </div>

@endsection
