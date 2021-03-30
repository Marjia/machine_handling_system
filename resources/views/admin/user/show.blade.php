
@extends('template.layout')

@section('content')

<div class="container">
    <div class="row">

        <table>
            <thead>
              <tr>
                <div class="center" style="padding: 8px"> <h1 class="primary-title">{{ $users->name }}</h1></div>
              </tr>
            </thead>

            <tbody>
                <tr>
                    <th>Last Name</th>
                    <td>{{ $users->last_name }}</td>
                </tr>
            </tbody>

            <tbody>
                <tr>
                  <th>First Name</th>
                  <td>{{ $users->first_name }}</td>
                </tr>
            </tbody>
    
            <tbody>
              <tr>
                <th>Email </th>
                <td>{{ $users->email }}</td>
              </tr>
            </tbody>
            
            <tbody>
                <tr>
                  <th>Company name</th>
                  <td>{{ $users->company_name }}</td>
                </tr>
              </tbody>

          </table>   
    </div>
</div>
    
@endsection





 


