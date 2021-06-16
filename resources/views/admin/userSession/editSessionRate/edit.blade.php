@extends('template.layout')
@section('content')
<div class="container">
  <div class="row">
    <form class="col s12" action="{{route('edit-rate.update',$taggedMachines->id)}}" method="POST" style="margin:10%;">
      @csrf
      @method('PUT')
      <table>
        <tbody>
          <?php
          //dd($taggedMachines);
           ?>
          <tr>
            <th>User name:</th>
            <td>{{$user->name}}</td>
          </tr>
          <tr>
            <th>Machine No:</th>
            <td>{{$machine->machine_no}}</td>
          </tr>
          <tr>
            <td>
              <div class="row input-field">
                <label for="hourly_session_charge">Session Rate</label>
                <input type="text" name="hourly_session_charge" value="{{ old('hourly_session_charge', $taggedMachines->hourly_session_charge)}}" >
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <button type="submit" name="button" class="btn">Update</button>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>
</div>
@endsection
@section('customJs')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>
@endsection
