@extends('template.layout')

@section('content')

<!-- @php
    dd($tag->user_id);
@endphp -->

<div class="container">
    <div class="row">
        <table>
            <thead>
              <tr>
                <div class="center" style="padding: 8px"> <h1 class="primary-title">{{ $machine->machine_no }}</h1></div>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Active</th>
                    <td>{{ $machine->is_active }}</td>
                </tr>
                <tr>
                  <th>Created By: </th>
                  <td>{{$users->name }}</td>
                </tr>
                <tr>
                  <th>Created at: </th>
                  <td>{{$machine->created_at }}</td>
                </tr>
                <tr>
                  <th>Tagged: </th>
                  <td>{{$machine->is_tagged }}</td>
                </tr>
                <tr>
                  <th>Tagged User: </th>
                  // <td>{{$tag}}</td>
                </tr>
            </tbody>
          </table>
    </div>
</div>
@endsection
