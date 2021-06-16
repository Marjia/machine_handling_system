@extends('template.layout')
@section('content')
@guest
 @include('auth.login')
@endguest
@auth
 <div class="container">
   <div class="center" style="padding: 20px"> <h2 class="primary-title">Create Invoice</h2></div>
   <div class="row">
     <div class="card col s12">
       <table>
         <thead>
           <tr>
               <th>session Id</th>
               <th>Machine No.</th>
               <th>Start Time</th>
               <th>End Time</th>
               <th>Payment Status</th>
               <th>Actions</th>
               <th></th>
           </tr>
         </thead>
         <tbody>
            <tr>
              @forelse ($invoices as $invoice)
               <td>{{$invoice->id}}</td>
               <td>
                   {{$machines->find($invoice->taggedUsersMachines()->first()->machine_id)->machine_no}}
               </td>
               <?php
                     $start = \Carbon\Carbon::parse( $invoice->start_time );
                     $start_time = $start->format('M d,Y ,h:i A');
                    //dd($start_time);
                     $end = \Carbon\Carbon::parse( $invoice->end_time );
                     $end_time = $end->format('M d,Y ,h:i A');
                ?>
             <td>
               {{ $start_time }}
             </td>
             <td>{{ $end_time }}</td>
             <td>{{ $invoice->is_invoiced }}</td>
             <td>
              <a class="btn" href="{{ route('invoice.edit', [$invoice->id]) }}">Create Invoice</a>
             </td>
           </tr>
           @empty
             <tr><td>No session available!!</td></tr>
           @endforelse

     </tbody>
   </table>
     <table>
       <tbody>
         <tr>
           <!-- Using DatePickerInvoice controllers store method -->
           <form class="col s24" action="{{ route('date-invoice.store') }}" method="POST">
             @csrf
              <?php
               $len = count($invoices);
               if ($len>=2):
              ?>
                <td>
                  <div class="row">
                    <div class="input-field col s6">
                      <label>From Date Time</label>
                      <input type="text" class="datepicker" name="start_date" value="<?php echo date("M d,Y", strtotime($invoices[0]->start_time));?>" required>
                      <input type="text" class="timepicker" name="start_time" value="<?php echo date("h:i A", strtotime($invoices[0]->start_time));?>" required>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="row">
                    <div class="input-field col s6">
                      <label>To Date Time</label>
                      <input type="text" class="datepicker" name="end_date" value="<?php echo date("M d,Y", strtotime($invoices[1]->end_time));?>" required>
                      <input type="text" class="timepicker" name="end_time" value="<?php echo date("h:i A", strtotime($invoices[1]->end_time));?>" required>
                      <?php if (Session::has('error')): ?>
                        <div class="alert alert-danger white-text"
                             style="padding: 5px;
                                   margin-bottom: 5px;
                                   font-size: 15px;
                                   background:#DC2626;">
                          {{Session::get('error')}}
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="row">
                    <div class="input-field col s6">
                      <label>Discount</label>
                      <input type="number" name="discount" value="discount">
                    </div>
                  </div>
                  <?php if (Session::has('discount_error')): ?>
                    <div class="alert alert-danger white-text"
                         style="padding: 5px;
                               margin-bottom: 5px;
                               font-size: 15px;
                               background:#DC2626;">
                      {{Session::get('discount_error')}}
                    </div>
                  <?php endif; ?>
                </td>
                <td>
                  <button type="submit" class="btn">Create Invoice</button>
                </td>
                <td></td>
              <?php else: ?>
                <!-- <td>start_date</td>
                <td>end_date</td>
                <td>discount input</td>
                <td>button</td> -->
              <?php endif; ?>
           </form>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endauth

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
