@extends('template.layout')
@section('content')
@guest
@include('auth.login')
@endguest
@auth
<div class="container">
    <div class="center" style="padding: 20px"> <h1 class="primary-title">Detag Machine</h1></div>
    <div class="row" style="padding: 10px">
      <div class="card col s6 offset-s3">
        <table>
            <thead>
              <tr>
                  <th>User Name</th>
                  <th>Machine No.</th>
                  <th>Active</th>
                  <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($taggedMachines as $tag)
              <tr>
                @foreach ($users as $user)
                  @php
                      if($tag->user_id == $user->id)
                      {
                          $name = ucwords($user->name);
                          echo"
                          <td>
                                 $name
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
                <td><a class="btn" href="{{ route('delete-detag', $tag->id) }}">Detag</a></td>
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
