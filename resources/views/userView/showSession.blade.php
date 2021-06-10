@extends('template.layout')
@section('content')

@guest
 @include('auth.login')
@endguest

@auth
 <div class="container">
   <div class="row">
     <table>
       <thead>
         <tr>
             <th>session Id</th>
             <th>tagged Id</th>
             <th>Machine No.</th>
             <th>Start Time</th>
             <th>End Time</th>
             <th>Payment Status</th>
             <th></th>
         </tr>
       </thead>
       <tbody>
         <tr>
            @forelse ($invoices as $invoice)
             <td>{{$invoice->id}}</td>
             <td>{{$invoice->tagged_users_machines_id}}</td>
             <td>
                 {{$machines->find($invoice->taggedUsersMachines()->first()->machine_id)->machine_no}}
             </td>
           <td>{{ $invoice->start_time }}</td>
           <td>{{ $invoice->end_time }}</td>
           <td>{{ $invoice->is_invoiced }}</td>
         </tr>
         @empty
           <tr><td>No session available!!</td></tr>
         @endforelse
       </tbody>
     </table>
   </div>
 </div>
 @endauth

@endsection
