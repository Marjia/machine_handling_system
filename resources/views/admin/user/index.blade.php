@extends('template.layout')
@section('content')

<div class="container">
  <div class="row">
    <table>
      <thead>
        <tr>
            <th>Username</th>
            <th>Active</th>
            <th>Actions</th>
            <th></th>
        </tr>
      </thead>
      <tbody>
        @forelse ($users as $user)
        <tr>
          <td>
            <a href=" {{ route('user.show',['user'=>$user->id]) }} "> 
              {{ $user->name }}
            </a>
          </td>
          <td>{{ $user->is_active }}</td>
          <td><a class="btn" href="{{ route('user.edit', ['user'=>$user->id]) }}">Edit</a></td>
          <td><a class="btn" href="{{ route('user-delete', $user->id) }}">Delete</a></td>
        </tr>
        @empty
          <tr><td>No user added!!</td></tr>
        @endforelse
      </tbody>
    </table>                                
  </div>
</div>
    
@endsection





 

