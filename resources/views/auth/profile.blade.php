
@extends('template.layout')

@section('content')

<div class="container">
    <div class="row">

        <table>
            <thead>
              <tr>
                <div class="center" style="padding: 8px"> <h1 class="primary-title">{{ auth()->user()->name}}</h1></div>
              </tr>
            </thead>

            <tbody>
                <tr>
                    <th>Last Name</th>
                    <td>{{ auth()->user()->last_name }}</td>
                </tr>
            </tbody>

            <tbody>
                <tr>
                  <th>First Name</th>
                  <td>{{auth()->user()->first_name }}</td>
                </tr>
            </tbody>

            <tbody>
              <tr>
                <th>Email </th>
                <td>{{ auth()->user()->email }}</td>
              </tr>
            </tbody>

            <tbody>
                <tr>
                  <th>Company name</th>
                  <td>{{ auth()->user()->company_name }}</td>
                </tr>
              </tbody>

          </table>
    </div>
</div>

@endsection
