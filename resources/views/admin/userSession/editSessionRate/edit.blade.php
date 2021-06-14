@extends('template.layout')
@section('content')
<div class="container">
  <div class="row">
    <form class="col s12" action="{{route('edit-rate.update',1)}}" method="POST" style="margin:10%;">
      @csrf
      @method('PUT')
      <table>
        <tbody>
          <tr>
            <th>User name:</th>
            <td></td>
          </tr>
          <tr>
            <th>Machine No:</th>
            <td></td>
          </tr>
          <tr>
            <th>Session Rate</th>
            <td></td>
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
