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
                <th>tagged Id</th>
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

                        <div class="col s12">
              <!-- style="border: 5px solid red;float:left" -->
                            <?php if (Session::has('taggederror')): ?>
                              <div class="alert alert-danger deep-orange darken-4 white-text" style="padding: 20px;
                                margin-bottom: 15px;
                                font-size: 22px;">

                                  {{Session::get('taggederror')}}

                              </div>
                            <?php endif; ?>
                        </div>

                        <div class="col s12">
              <!-- style="border: 5px solid red;float:left" -->
                        <?php if (Session::has('error')): ?>
                          <div class="alert alert-danger deep-orange darken-4 white-text" style="padding: 20px;
                            margin-bottom: 15px;
                            font-size: 22px;">

                              {{Session::get('error')}}

                          </div>
                        <?php endif; ?>
                        </div>
                      @forelse ($invoices as $invoice)
                      <tr>
                          <td>

                              {{$invoice->invoices_no}}
                          </td>
                          <td>{{$invoice->tagged_users_machines_id}}</td>
                          <td>
                              {{$invoice->user_sessions_id}}
                          </td>
                        <td>{{ $invoice->start_time }}</td>
                        <td>{{ $invoice->end_time }}</td>
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
