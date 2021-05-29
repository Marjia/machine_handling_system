@extends('template.layout')
@section('content')

<div class="container">
  <div class="row">
    <table>
      <thead>
        <tr>
            <th>User Name</th>
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

        <form method="POST"  action="{{ route('invoice.store')}}" class="col s12">
          @csrf

        <tr>
          <?php //dd(count($invoices))
             // $terminate=0;
             // $contVar=0;
             // $skipVar=0;
             $i=0;
             // $sizeArray=count($invoices);
          ?>
           @forelse ($invoices as $invoice)
           <?php
              // $terminate = 0;
              //   echo "<h>{{$invoice->name}}</h1>";
              //   //$i =$contVar;
              //   // while ($i < $sizeArray && $terminate == 0) {
              //   //   echo $i;
              //   //   //echo "{{$invoices[$i]->tagged_users_machines_id}}\n\n";
              //   //   if($invoices[$i]->user_id!=$invoices[$i+1]->user_id)
              //   //   {
              //   //     $terminate = 1;
              //   //   }
              //   //   $i++;
              //   //   //$contVar++;
              //   // }
              //
              //   $skipVar = $contVar;
              //  //dd($invoices[3]->user_id);
              //   for ($i=$skipVar; $i <=$sizeArray && $terminate == 0 ; $i++) {
              //
              //     $checkId=$invoices[$i]->user_id;
              //    echo "checkId------".$checkId;
              //    //echo "user name------\n\n\n".$invoices[$i]->name."\n\n";
              //    //echo "later user name------".$invoices[$i+1]->name;
              //     echo "{{$machines->find($invoices[$i]->taggedUsersMachines()->first()->machine_id)->machine_no}}\n\n";
              //     echo "{{$invoices[$i]->tagged_users_machines_id}}\n\n";
              //
              //    if($invoices[$i]->tagged_users_machines_id!=$invoices[$i+1]->tagged_users_machines_id)
              //    {
              //      //echo "terminate if\n\n";
              //      $terminate = 1;
              //      //$contVar=$i;
              //     //echo "contvar----".$contVar;
              //    }
              //    //$terminate = 0;
              //
              //  }
               //echo "loop end";

               //echo "checkId==".$checkId;
               //
               // if($checkId==$invoices[$contVar+1]->user_id){
               //  continue;
               // }


            ?>
            <td>
                {{$invoice->name}}
            </td>
            <td>{{$invoice->tagged_users_machines_id}}</td>
            <td>
                {{$machines->find($invoice->taggedUsersMachines()->first()->machine_id)->machine_no}}
            </td>
          <td>{{ $invoice->start_time }}</td>
          <td>{{ $invoice->end_time }}</td>
          <td>{{ $invoice->is_invoiced }}</td>
          <td>
            <?php
             // if ($invoices[$i]->tagged_users_machines_id!=$invoices[$i+1]->tagged_users_machines_id)
             //  {
            ?>
            <p>
              <label>
                <input type="checkbox" class="filled-in" name="checkArr[]" value="{{$invoice->id}}"/>
                <span></span>
              </label>
            </p>
          </td>
          <?php
           // }
           // $i++;
           // ?>
        </tr>

        @empty
          <tr><td>No session available!!</td></tr>
        @endforelse
        <tr>
          <td>
            <div class="row">
              <div class="input-field col s12">
                <label>Discount Rate</label>
                <input type="number" name="discount" value="discount">
              </div>
                <div class="col s12">
 <!-- style="border: 5px solid red;float:left" -->
                    <button type="submit" class="btn">Create Invoice</button>
                    <?php if (Session::has('error')): ?>
                      <div class="alert alert-danger">


                          {{Session::get('error')}}

                      </div>
                    <?php endif; ?>
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
