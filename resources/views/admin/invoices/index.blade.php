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
             <th>User Name</th>
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



           <!-- <div class="col s12">
           <?php //if (Session::has('error')): ?>
             <div class="alert alert-danger deep-orange darken-4 white-text" style="padding: 20px;
               margin-bottom: 15px;
               font-size: 22px;">

                 {{Session::get('error')}}

             </div>
           <?php //endif; ?>
           </div> -->
           <tr>
            @forelse ($invoices as $invoice)
             <td>
                 {{$invoice->name}}
             </td>
             <td>{{$invoice->id}}</td>
             <td>
                 {{$machines->find($invoice->taggedUsersMachines()->first()->machine_id)->machine_no}}
             </td>
             <td>{{ $invoice->start_time }}</td>
             <td>{{ $invoice->end_time }}</td>
             <td>{{ $invoice->is_invoiced }}</td>
             <td>
               <a class="btn" href="{{ route('invoice.edit', [$invoice->id]) }}">Create Invoice</a>
             </td>
         </tr>
         @empty
         <tr><td>No session available!!</td></tr>
         @endforelse
     <!-- </form> -->
         <tr>
           <td>
             <form method="POST"  action="{{ route('invoice.store') }}" class="col s12" >
               @csrf
               <!-- @method('PUT') -->
            <?php
             $len = count($invoices);
             if ($len>2):
            ?>


               <div class="row">
                 <div class="input-field col s6">
                        <label>From Date Time</label>
                       <input type="text" class="datepicker" name="start_date" value="<?php echo date("Y-m-d", strtotime($invoices[0]->start_time));?>" required>
                       <input type="text" class="timepicker" name="start_time" value="<?php echo date("h:i A", strtotime($invoices[0]->start_time));?>" required>
                 </div>
                 <div class="input-field col s6">
                         <label>To Date Time</label>
                         <input type="text" class="datepicker" name="end_date" value="<?php echo date("Y-m-d", strtotime($invoices[1]->start_time));?>" required>
                         <input type="text" class="timepicker" name="end_time" value="<?php echo date("h:i A", strtotime($invoices[1]->start_time));?>" required>

                         <?php if (Session::has('error')): ?>
                           <div class="alert alert-danger">
                               {{Session::get('error')}}
                           </div>
                         <?php endif; ?>
                 </div>
                   <div class="col s6">
                     <button type="submit" class="btn">Create Invoice</button>
                   </div>
               </div>
             </form>
           <?php else: ?>
             <div class="input-field col s6">
                    <label>From Date Time</label>
                   <input type="text" class="datepicker" name="start_date" value="<?php echo date("Y-m-d")?>" required>
                   <input type="text" class="timepicker" name="start_time" value="<?php echo date("h:i A")?>" required>
             </div>
             <div class="input-field col s6">
                     <label>To Date Time</label>
                     <input type="text" class="datepicker" name="end_date" value="<?php echo date("Y-m-d");?>" required>
                     <input type="text" class="timepicker" name="end_time" value="<?php echo date("h:i A");?>" required>

                     <?php if (Session::has('error')): ?>
                       <div class="alert alert-danger">
                           {{Session::get('error')}}
                       </div>
                     <?php endif; ?>
             </div>
           <?php endif; ?>
           </td>
         </tr>
         <tr>
           <td>
             <div class="row">
                 <div class="col s12">
                   <a class="btn" href="{{ route('invoice.show',1) }}">Generate Invoice</a>
                 </div>
             </div>
           </td>
         </tr>
       </tbody>
     </table>
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
