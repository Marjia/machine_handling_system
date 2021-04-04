@extends('template.layout')

@section('content')

<div class="container">
    <div class="row">
        <table>
            <thead>
              <tr>
                <div class="center" style="padding: 8px"><h1 class="primary-title"></h1></div>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <th>User Session ID :</th>
                    <td>00{{$invoice->user_sessions_id}}</td>
                </tr>
                <tr>
                    <th>From :</th>
                    <td>{{$invoice->from_date}}</td>
                </tr>
                <tr>
                    <th>To :</th>
                    <td>{{$invoice->to_date}}</td>
                </tr>
                <tr>
                    <th>Session Rate :</th>
                    <td>{{$invoice->amount}}.00</td>
                </tr>
                <tr>
                    <th>Discount :</th>
                    <td>{{$invoice->discount}}%</td>
                </tr>
                <tr>
                    <th>Tax :</th>
                    <td>{{$invoice->tax_amount}}.00</td>
                </tr>
                <tr>
                    <th><h1 class="primary-title">Total :</h1></th>
                    <td>{{$invoice->total_payable_amount}}</td>
                </tr>
                <tr>
                    <div class="center">
                        {{-- @php
                            dd($invoice->id);
                        @endphp --}}
                        <td><a class="btn" href="{{ route('generate-invoices',$invoice->id) }}">Generate Invoice</a></td>
                    </div>
                </tr>
            </tbody>
          </table>
    </div>
</div>
@endsection
