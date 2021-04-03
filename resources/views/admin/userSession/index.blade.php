
@extends('template.layout')
@section('content')

<div class="container">
    <div class="row">

        <table>
            <thead>
              <tr>
                  <th>User Name</th>
                  <th>Machine No.</th>
                  <th>Session</th>
                  <th></th>
              </tr>
            </thead>
            <tbody>
              @forelse ($taggedMachines as $tag)
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
                <td><a class="btn" href="{{ route('user-session.edit', $tag->id) }}">Start</a></td>

              </tr>
              @empty
                <tr><td>No machine tagged!!</td></tr>
              @endforelse
            </tbody>
          </table>
    </div>
</div>
@endsection
