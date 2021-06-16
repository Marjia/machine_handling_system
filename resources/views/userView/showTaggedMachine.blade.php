@extends('template.layout')
@section('content')
@guest
@include('auth.login')
@endguest
@auth
<div class="container">
    <div class="center" style="padding: 20px"> <h2 class="primary-title">Tagged Machines</h2></div>
    <div class="row">
      <div class="card col s6 offset-s3">
        <table>
            <thead>
              <tr>
                  <!-- <th>User Name</th> -->
                  <th>Machine No.</th>
                  <th>Session Rate</th>
                  <th>Tagged Date</th>
                  <th>Active</th>
                  <!-- <th>Actions</th> -->
                  <th></th>
              </tr>
            </thead>
            <tbody>
              @forelse ($taggedMachines as $tag)
              <tr>

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

                <?php
                  $created_at = $tag->created_at;
                  $created_atF = $created_at->format('D, jS F Y');
                 ?>
                <td>{{$tag->hourly_session_charge}}  {{$tag->currency}}</td>
                <td>{{$created_atF}}</td>
                <td>{{ $tag->is_active }}</td>
                <!-- <td><a class="btn" href="{{ route('delete-detag', $tag->id) }}">Detag</a></td>
                <td><a class="btn" href="#">Edit Session Rate</a></td> -->
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
