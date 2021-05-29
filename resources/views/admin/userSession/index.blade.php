
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
                <td>
                  <a class="btn" href="{{ route('user-session.edit', $tag->id) }}">Start</a>
                  <!-- <div class="switch" id='switchId'>
                     <label>
                       Off
                       <input type="checkbox" id= "@php $tag->id;@endphp" name="switchName">
                       <span class="lever"></span>
                       Start
                     </label>
                   </div> -->
                </td>
                <td>
                  <!-- <form  method="post"  action="{{ route('user-session.update', $tag->id) }}">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn">OFF</button>
                  </form> -->
                  <!-- <a class="btn" href="{{ route('user-session.update', $tag->id) }}">OFF</a> -->
                </td>

              </tr>
              @empty
                <tr><td>No machine tagged!!</td></tr>
              @endforelse
            </tbody>
          </table>
    </div>
</div>
@endsection
<!-- @section('customJs')
    <script>
        var switcDiv = document.getElementsByName('switchName');

        switcDiv.forEach((item) => {
          item.addEventListener('change', function(){
            //console.log(item.id, item.checked);
            sessionStart(item.id, item.checked);
          });
        });

        function sessionStart(m_id, is_started){
          var xhr = new XMLHttpRequest();
          xhr.open('GET', 'user-session/'+m_id+'/edit?start=' + is_started, true);
          xhr.send();
        }
    </script>
@endsection -->
