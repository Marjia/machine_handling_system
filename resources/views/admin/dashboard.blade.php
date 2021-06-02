@extends('template.layout')
@section('content')
    <div class="container">
     @guest
      @include('auth.login')
     @endguest
      @auth
        <div class="row" style="padding-top: 50px">
            <div class="col s4">
                <div class="card-panel blue darken-4">
                    <div class="card-action">
                        <a class="white-text" href="{{route('user.index')}}">Users List</a>
                    </div>
                </div>
            </div>
            <div class="col s4">
                <div class="card-panel indigo darken-4">
                    <div class="card-action">
                        <a class="white-text" href="{{route('user.create')}}">Add user</a>
                    </div>
                </div>
            </div>
            <div class="col s4">
                <div class="card-panel indigo darken-4">
                    <div class="card-action">
                        <a class="white-text" href="{{route('machine.create')}}">Add Machine</a>
                    </div>
                </div>
            </div>
            <div class="col s4">
                <div class="card-panel blue darken-4">
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
                <div class="card-panel red darken-4">
                    <div class="card-action">
                        <a class="white-text" href="{{route('detag-machine')}}">Detag Machine</a>
                    </div>
                </div>
            </div>
            <div class="col s4">
                <div class="card-panel deep-orange darken-4">
                    <div class="card-action">
                        <a class="white-text" href="{{route('invoice.index')}}">Create Invoice</a>
                    </div>
                </div>
            </div>
            <div class="col s4">
                <div class="card-panel green darken-4">
                    <div class="card-action">
                        <a class="white-text" href="{{route('user-session.index')}}">Session Create</a>
                    </div>
                </div>
            </div>
        </div>
      @endauth
    </div>

@endsection
