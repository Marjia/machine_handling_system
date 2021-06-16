@extends('template.layout')
@section('content')
@guest
@include('auth.login')
@endguest
@auth
<div class="container">
  <div class="center" style="padding: 20px"> <h1 class="primary-title">User List</h1></div>
  <div class="row card" style="padding:15px">
    <table>
      <thead>
        <tr>
            <th>Name</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Company</th>
            <th>Admin</th>
            <th>Active</th>
            <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($users as $user)
        <tr>
          <td>
            <a href=" {{ route('user.show',['user'=>$user->id]) }} ">
              <?php
                $userName = ucwords($user->name);
                $firstName = ucwords($user->first_name);
                $lastName = ucwords($user->last_name);
                $companyName = ucwords($user->company_name);
               ?>
              {{ $userName }}
            </a>
          </td>
          <td>{{$firstName}} {{$lastName}}</td>
          <td>{{$user->email}}</td>
          <td style="text-align:center;">{{$user->phone_number}}</td>
          <td>{{$companyName}}</td>
          <td>{{$user->is_admin}}</td>
          <td>{{ $user->is_active }}</td>
          <td><a class="btn" href="{{ route('user.edit', $user->id) }}">Edit</a></td>
          <td><a class="btn" href="{{ route('user-delete', $user->id) }}">Delete</a></td>
        </tr>
        @empty
          <tr><td>No user added!!</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endauth
@endsection
