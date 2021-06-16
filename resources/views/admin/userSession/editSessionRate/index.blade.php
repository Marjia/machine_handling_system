@extends('template.layout')
@section('content')
@guest
@include('auth.login')
@endguest
@auth
<div class="container">
  <div class="center" style="padding: 20px"> <h1 class="primary-title">Edit Session Rate</h1></div>
  <div class="row">
    <div class="card col s8 offset-s2" style="padding:30px">
      <table>
          <thead>
            <tr>
                <th>User Name</th>
                <th>Machine No.</th>
                <th>Session Rate</th>
                <th>Active</th>
                <th>Actions</th>
                <th></th>
            </tr>
          </thead>
          <tbody>
            @forelse ($tagMachines as $tag)
            <tr>
              @foreach ($users as $user)
                @php
                    if($tag->user_id == $user->id)
                    {
                        echo"
                        <td>
                               $user->name
                        </td>
                        ";
                    }
                @endphp

              @endforeach

              @foreach ($machines as $machine)
                @php
                    if($tag->machine_id == $machine->id)
                    {
                        echo"
                        <td>
                               $machine->machine_no
                        </td>
                        ";
                    }
                @endphp

              @endforeach
              <td>{{ $tag->is_active }}</td>
              <td>{{$tag->hourly_session_charge}} {{$tag->currency}}</td>
              <td><a class="btn" href="{{route('edit-rate.edit',[$tag->id])}}">Edit Session Rate</a></td>
            </tr>
            @empty
              <tr><td>No machine tagged!!</td></tr>
            @endforelse
          </tbody>
        </table>

    </div>
  </div>
</div>
@endauth
@endsection
