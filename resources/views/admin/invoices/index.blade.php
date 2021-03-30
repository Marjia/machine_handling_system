@extends('template.layout')
@section('content')

<div class="container">
  <div class="row">
    <table>
      <thead>
        <tr>
            <th>User Name</th>
            <th>Machine No.</th>
            <th>Payment Status</th>
            <th>Actions</th>
            <th></th>
        </tr>
      </thead>
      <tbody>

        {{-- @php
            dd($invoices);
        @endphp --}}

        @forelse ($invoices as $invoice)
        <tr>
            <td>
                {{$users->find($invoice->taggedUsersMachines()->first()->user_id)->name}}
            </td>
            <td>
                {{$machines->find($invoice->taggedUsersMachines()->first()->machine_id)->machine_no}}
            </td>
          <td>{{ $invoice->is_invoiced }}</td>
          <td><a class="btn" href="{{ route('invoice.edit', $invoice->id) }}">Pay</a></td>
        </tr>
        @empty
          <tr><td>No session available!!</td></tr>
        @endforelse
      </tbody>
    </table>                                
  </div>
</div>
    
@endsection





 

