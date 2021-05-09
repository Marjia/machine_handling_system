@extends('template.layout')
@section('content')

<div class="container">
  <div class="row">
    <table>
      <thead>
        <tr>
            <th>User Name</th>
            <th>Machine No.</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Payment Status</th>
            <th>Actions</th>
            <th></th>
        </tr>
      </thead>
      <tbody>

        <form method="POST"  action="{{ route('invoice.store')}}" class="col s12">
          @csrf

        @forelse ($invoices as $invoice)
        <tr>
            <td>
                {{$invoice->name}}
            </td>
            <td>
                {{$machines->find($invoice->taggedUsersMachines()->first()->machine_id)->machine_no}}
            </td>
          <td>{{ $invoice->start_time }}</td>
          <td>{{ $invoice->end_time }}</td>
          <td>{{ $invoice->is_invoiced }}</td>
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
                    <button type="submit" class="btn">Create Invoice</button>
                </div>
            </div>
          </td>

        </tr>
    </form>
        <tr>
          <td>
            <form method="POST"  action="{{ route('date-invoice.store') }}" class="col s12" >
              @csrf
              <!-- @method('PUT') -->
              <div class="row">
                <div class="input-field col s6">
                    <!-- <label for="name">Start time : </label> -->
                    <!-- <input type="date" name="machine_no" value=""> -->
                    <!-- @error('machine_no')
                        <p>{{ $message }}</p>
                    @enderror -->

                      <input type="text" class="datepicker" name="start_date" value="<?php echo date("Y-m-d", strtotime($invoices[0]->start_time));?>" required>
                      <input type="text" class="timepicker" name="start_time" value="<?php echo date("h:i A", strtotime($invoices[0]->start_time));?>" required>


                </div>
                <div class="input-field col s6">
                    <!-- <label for="name">End time : </label> -->

                        <input type="text" class="datepicker" name="end_date" value="<?php echo date("Y-m-d", strtotime($invoices[1]->start_time));?>" required>
                        <input type="text" class="timepicker" name="end_time" value="<?php echo date("h:i A", strtotime($invoices[1]->start_time));?>" required>

                    <!-- @error('machine_no')
                        <p>{{ $message }}</p>
                    @enderror -->
                </div>
                  <div class="col s6">
                    <button type="submit" class="btn">Create Invoice</button>
                  </div>
              </div>
            </form>
          </td>
        </tr>
        <tr>
          <td>
            <div class="row">
                <div class="col s12">
                  <a class="btn" href="{{ route('generate-invoices',$invoice->id) }}">Generate Invoice</a>
                </div>
            </div>
          </td>

        </tr>
      </tbody>
    </table>
  </div>
</div>

@endsection
@section('customJs')
      <script type="text/javascript">

      document.addEventListener('DOMContentLoaded', function() {
          var elems = document.querySelectorAll('.datepicker');
          // console.log(elems);
          var instances = M.Datepicker.init(elems);
          var elems = document.querySelectorAll('.timepicker');
          var instances = M.Timepicker.init(elems);
          });

      </script>

@endsection
