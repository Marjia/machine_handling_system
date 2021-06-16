
@extends('template.layout')

@section('content')

<div class="container">
    <div class="row">

        <table>
            <thead>
              <tr>
                  <th>Machine No.</th>
                  <th>Active</th>
                  <th>Actions</th>
                  <th></th>
              </tr>
            </thead>
            <tbody>
              @forelse ($machines as $machine)
              <tr>
                <td>
                  <a href=" {{ route('machine.show',[$machine->id]) }} "> 
                    {{ $machine->machine_no }}
                  </a>
                </td>
                <td>{{ $machine->is_active }}</td>
                <td><a class="btn" href="{{ route('machine.edit', ['machine'=>$machine->id]) }}">Edit</a></td>
                <td><a class="btn" href="{{ route('machine-delete', $machine->id) }}">Delete</a></td>
              </tr>
              @empty
                <tr><td>No machine included!!</td></tr>
              @endforelse
            </tbody>
          </table>
    </div>
</div>
@endsection
