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
             <th>Actions</th>
             <th></th>
         </tr>
       </thead>
       <tbody>

         <form method="POST"  action="{{ route('invoice.store')}}" class="col s24">
           @csrf

         <tr>
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
             <td>{{$invoice->id}}</td>
             <td>{{$invoice->tagged_users_machines_id}}</td>
             <td>
                 {{$machines->find($invoice->taggedUsersMachines()->first()->machine_id)->machine_no}}
             </td>
           <td>{{ $invoice->start_time }}</td>
           <td>{{ $invoice->end_time }}</td>
           <td>{{ $invoice->is_invoiced }}</td>
           <td>
             <p>
               <label>
                 <input type="checkbox" class="filled-in" name="checkArr[]" value="{{$invoice->id}}"/>
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
               <div class="input-field col s6">
                 <label>Discount Rate</label>
                 <input type="number" name="discount" value="discount">
               </div>
                 <div class="col s12">
  <!-- style="border: 5px solid red;float:left" -->
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
