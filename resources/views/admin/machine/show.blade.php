@extends('template.layout')

@section('content')
<div class="container">
  @guest
  @include('auth.login')
  @endguest
</div>

<div class="container">
@auth
<div class="center" style="padding: 20px"> <h1 class="primary-title">Machine Details</h1></div>
    <div class="row" style="padding:15px">
      <div class="card col s6 offset-s3" style="padding:20px">
        <?php
          $name = ucwords($users->name);
          $tagged_by = ucwords($tagged_by);
          $tagged_with = ucwords($tagged_with);
          $created_atCarb = \Carbon\Carbon::parse( $machine->created_at);
          $created_at = $created_atCarb->format('M d,Y ,h:i A');
          $modified_atCarb = \Carbon\Carbon::parse($machine->updated_at);
          $modified_at = $modified_atCarb->format('M d,Y ,h:i A');

         ?>
        <table>
            <thead>
              <tr>
                <div class="center" style="padding: 8px"> <h3 class="primary-title">{{ $machine->machine_no }}</h3></div>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Active</th>
                    <td>{{ $machine->is_active }}</td>
                </tr>
                <tr>
                  <th>Created By: </th>
                  <td>{{$name }}</td>
                </tr>
                <tr>
                  <th>Created at: </th>
                  <td>{{ $created_at }}</td>
                </tr>
                <tr>
                  <th>Modified at: </th>
                  <td>{{ $modified_at }}</td>
                </tr>
                <tr>
                  <th>Tagged: </th>
                  <td>{{$machine->is_tagged }}</td>
                </tr>
                <tr>
                  <th>Tagged By: </th>
                  <td>{{$tagged_by}}</td>
                </tr>
                <tr>
                  <th>Tagged User: </th>
                 <td>{{$tagged_with}}</td>
                </tr>
            </tbody>
          </table>

      </div>
    </div>
@endauth
</div>
@endsection
