@extends('template.layout')

@section('content')

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
            </tbody>
          </table>   
    </div>
</div>    
@endsection





 


