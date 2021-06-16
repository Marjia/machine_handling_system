
@extends('template.layout')

@section('content')
@guest
@include('auth.login')
@endguest
@auth
<div class="container">
    <div class="row">
      <?php
       $name = ucwords(auth()->user()->name);
       ?>
      <div class="center" style="padding: 8px"> <h1 class="primary-title">{{ $name}}</h1></div>
      <div class="card col s6 offset-s3">
        <table>
            <thead>
            </thead>
            <tbody>
              <tr>
                <th>First Name</th>
                <td>{{auth()->user()->first_name }}</td>
              </tr>
                <tr>
                    <th>Last Name</th>
                    <td>{{ auth()->user()->last_name }}</td>
                </tr>
                <tr>
                  <th>Email </th>
                  <td>{{ auth()->user()->email }}</td>
                </tr>
                <tr>
                  <th>Company name</th>
                  <td>{{ auth()->user()->company_name }}</td>
                </tr>
            </tbody>
          </table>
      </div>
    </div>
</div>
@endauth
@endsection
