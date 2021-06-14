@extends('template.layout')
@section('content')
    <div class="container">
     @guest
      @include('auth.login')
     @endguest
      @auth
        <div class="row" style="padding-top: 50px">
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
            </div>
        </div>
      @endauth
    </div>

@endsection
