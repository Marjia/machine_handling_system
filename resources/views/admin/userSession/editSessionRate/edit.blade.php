@extends('template.layout')
@section('content')
@guest
@include('auth.login')
@endguest
@auth
<div class="container">
  <div class="center" style="padding: 20px"> <h1 class="primary-title">Change Session Rate</h1></div>
  <div class="row card" style="margin-left:10%; margin-right: 10%;">
    <form class="col s8 offset-s2" action="{{route('edit-rate.update',$taggedMachines->id)}}" method="POST" style="padding:8px">
      @csrf
      @method('PUT')
        <table>
          <thead>
            <tr>
              <th>Name</th>
              <th>Machine No</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{$user->name}}</td>
              <td>{{$machine->machine_no}}</td>
            </tr>
            <tr>
              <td>
                <div class="row input-field col s4">
                  <label for="hourly_session_charge">Session Rate</label>
                  <input type="text" name="hourly_session_charge" value="{{ old('hourly_session_charge', $taggedMachines->hourly_session_charge)}}" >
                </div>
                <div class="row col s4">
                  <button type="submit" name="button" class="btn" style="margin:5px">Update</button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
    </form>
  </div>
</div>
@endauth
@endsection
@section('customJs')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>
@endsection
