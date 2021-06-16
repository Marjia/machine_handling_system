@extends('template.layout')
@section('content')
@guest
@include('auth.login')
@endguest
@auth
<div class="container">
  <div class="center" style="padding: 20px"> <h1 class="primary-title">User Details</h1></div>
      <div class="row" style="padding:15px">
        <div class="card col s6 offset-s3">
          <?php
            $name = ucwords($users->name );
            $lastName = ucwords($users->last_name );
            $firstName = ucwords($users->first_name );
            $companyName = ucwords($users->company_name);
            $accountName = ucwords($users->bank_account_type);
            $created_by = ucwords($created_by);
            $modified_by = ucwords($modified_by);
            $created_atCarb = \Carbon\Carbon::parse( $users->created_at );
            $created_at = $created_atCarb->format('M d,Y ,h:i A');

           ?>
          <table>
              <thead>
                <tr>
                  <div class="center" style="padding: 8px"> <h3 class="primary-title">{{ $name }}</h3></div>
                </tr>
              </thead>

              <tbody>
                  <tr>
                      <th>First Name</th>
                      <td>{{ $firstName }}</td>
                  </tr>
                  <tr>
                    <th>Last Name</th>
                    <td>{{ $lastName }}</td>
                  </tr>
                  <tr>
                    <th>Email </th>
                    <td>{{ $users->email }}</td>
                  </tr>
                  <tr>
                    <th>Company name</th>
                    <td>{{ $companyName }}</td>
                  </tr>
                  <tr>
                    <th>Phone Number</th>
                    <td>{{ $users->phone_number }}</td>
                  </tr>
                  <tr>
                    <th>Address</th>
                    <td>{{ $users->address}}</td>
                  </tr>
                  <tr>
                    <th>Web Address</th>
                    <td>{{ $users->web_site }}</td>
                  </tr>
                  <tr>
                    <th>Bank Account</th>
                    <td>{{ $accountName }}</td>
                  </tr>
                  <tr>
                    <th>Admin</th>
                    <td>{{ $users->is_admin }}</td>
                  </tr>
                  <tr>
                    <th>Admin</th>
                    <td>{{ $users->is_admin }}</td>
                  </tr>
                  <tr>
                    <th>Tagged</th>
                    <td>{{ $users->is_tagged }}</td>
                  </tr>
                  <tr>
                    <th>Created By</th>
                    <td>{{ $created_by }}</td>
                  </tr>
                  <tr>
                    <th>Modified By</th>
                    <td>{{ $modified_by }}</td>
                  </tr>
                  <tr>
                    <th>Created At</th>
                    <td>{{ $created_at }}</td>
                  </tr>
                  <tr>
                    <th>Modifed At</th>
                    <td>{{ $modified_at }}</td>
                  </tr>
                  <tr>
                    <th>Active</th>
                    <td>{{$users->is_active}}</td>
                  </tr>

                </tbody>

            </table>

        </div>
    </div>
</div>
@endauth
@endsection
