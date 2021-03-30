@extends('template.layout')
@section('content')
    <div class="container">
        <div class="row" style="padding-top: 50px">
            <div class="col s4">
                <div class="card-panel teal">
                    <div class="card-action">
                        <a class="white-text" href="{{route('user.index')}}">Users List</a>
                    </div>
                </div>
            </div>
            <div class="col s4">
                <div class="card-panel teal">
                    <div class="card-action">
                        <a class="white-text" href="{{route('user.create')}}">Add user</a>
                    </div>
                </div>
            </div>
            <div class="col s4">
                <div class="card-panel teal">
                    <div class="card-action">
                        <a class="white-text" href="{{route('machine.create')}}">Add Machine</a>
                    </div>
                </div>
            </div>
            <div class="col s4">
                <div class="card-panel teal">
                    <div class="card-action">
                        <a class="white-text" href="{{route('machine.index')}}">Machine List</a>
                    </div>
                </div>
            </div>
            <div class="col s4">
                <div class="card-panel teal">
                    <div class="card-action">
                        <a class="white-text" href="{{route('assign-machine')}}">Tag Machine</a>
                    </div>
                </div>
            </div>
            <div class="col s4">
                <div class="card-panel teal">
                    <div class="card-action">
                        <a class="white-text" href="{{route('detag-machine')}}">Detag Machine</a>
                    </div>
                </div>
            </div>
            <div class="col s4">
                <div class="card-panel teal">
                    <div class="card-action">
                        <a class="white-text" href="{{route('invoice.index')}}">Invoice</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection