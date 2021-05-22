@extends('template.layout')

@section('content')

<div class="container">
    <div class="row">
        <table>
            <thead>
              <!-- <tr>
                <div class="center" style="padding: 8px"><h1 class="primary-title"></h1></div>
              </tr> -->

              <tr>
                <th>Invoice number</th>
                <th>User Session Id</th>
                <th>From date</th>
                <th>To date</th>
                <th>Amount</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>


                      <form method="GET"  action="{{ route('create-pdf')}}" class="col s12">
                        @csrf

                      @forelse ($invoices as $invoice)
                      <tr>
                          <td>

                              {{$invoice->invoices_no}}
                          </td>
                          <td>
                              {{$invoice->user_sessions_id}}
                          </td>
                        <td>{{ $invoice->from_date }}</td>
                        <td>{{ $invoice->to_date }}</td>
                        <td>{{ $invoice->amount }}</td>
                        <td>
                          <!-- <a class="btn" href="{{ route('invoice.edit', $invoice->id) }}">create invoice</a> -->

                          <p>
                            <label>
                              <input type="checkbox" class="filled-in" name="checkArr[]" value="{{$invoice->id}}" />
                              <span></span>
                            </label>
                          </p>
                        </td>
                      </tr>

                      @empty
                        <tr><td>No session available!!</td></tr>
                      @endforelse
                      <tr>
                        <td>
                          <div class="row">
                              <div class="col s12">
                                  <button type="submit" class="btn">Generate PDF Invoice</button>

                              </div>
                          </div>
                        </td>

                      </tr>
               </form>
                
            </tbody>
          </table>
    </div>
</div>
@endsection
