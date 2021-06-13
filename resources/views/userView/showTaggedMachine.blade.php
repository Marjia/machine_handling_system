
@extends('template.layout')
@section('content')

<div class="container">
    <div class="row">

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
                  $session_rate = $tag->created_at;
                  $session_rateF = $session_rate->format('D, jS F Y');
                 ?>
                <td>{{$tag->hourly_session_charge}}  {{$tag->currency}}</td>
                <td>{{$session_rateF}}</td>
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
@endsection
