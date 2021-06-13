@extends('template.layout')
@section('content')
    <div class="container">
     @guest
      @include('auth.login')
     @endguest
     @auth
        <div class="row" style="padding-top: 12%">
            <div class="col s6">
                <div class="card-panel blue darken-4">
                    <div class="card-action">
                        <a class="white-text" href="{{route('profile')}}">profile</a>
                    </div>
                </div>
            </div>
            <div class="col s6">
                <div class="card-panel yellow darken-4">
                    <div class="card-action">
                        <a class="white-text" href="{{route('show-tagged-machine.index')}}">Tagged Machines</a>
                    </div>
                </div>
            </div>
          </br></br>
            <div class="col s6">
                <div class="card-panel deep-orange darken-4">
                    <div class="card-action">
                        <a class="white-text" href="{{route('user-invoice.index')}}">Create Invoice</a>
                    </div>
                </div>
            </div>
        </div>
      @endauth
    </div>

@endsection
