
@extends('template.layout')

@section('content')


<div class="container">
    <div class="row">

        <table>
            <thead>
              <tr>
                  <th>User Name.</th>
                  <th>Sessions</th>
                  <th></th>
              </tr>
            </thead>
            <tbody>
              @forelse ($users as $user)
              <tr>
                <td>
                  <a href="#"> 
                    {{ $user->name }}
                  </a>
                </td>
                <td><a class="btn" href="#">Start</a></td>
                <td><a class="btn" href="#">OFF</a></td>
              </tr>
              @empty
                <tr><td>No machine included!!</td></tr>
              @endforelse
            </tbody>
          </table>
    </div>
</div>    
@endsection
