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
                <th>Invoice ID</th>
                <th>Total Number of Sessions</th>
                <th>Total Amount</th>
                <th>Due Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

          <?php //dd($invoices); ?>



                      @forelse ($invoices as $i)

                      <?php  ?>

                      <tr>
                          <?php
                            $len = count($i);
                            $totalAmount = 0;

                           foreach ($i as $invoice):
                             $totalAmount = $invoice->amount + $totalAmount;
                             $invoiceNumber = $invoice->invoices_no;
                             $id = $invoice->id;
                             $currency = $invoice->currency;
                             $createdDate = $invoice->created_at;
                             //dd($createdDate->format('D, jS F Y'));
                             $addedDate =  $createdDate->addDay(5);//->format('D, jS F Y');
                             //dd(strtotime($addedDate)->addDay(2));
                             //dd($createdDate->format('D, jS F Y'));
                             $weekDay = date('D',strtotime($addedDate));
                             if($weekDay == "Fri")
                             {
                               $lastDate = $addedDate->addDay(2)->format('D, jS F Y');
                              // dd($lastDate);
                             }
                             if($weekDay == "Sat")
                             {
                               $lastDate = $addedDate->addDay(1)->format('D, jS F Y');
                               //dd($lastDate);
                             }
                             else {
                               $lastDate = $addedDate->format('D, jS F Y');
                             }

                             // if($invoice->id %3 == 0)
                             // {
                             //   $currency = "AED";
                             // }
                             // else {
                             //   $currency = "BDT";
                             // }
                             //->format('D, jS F Y');
                            ?>

                          <?php endforeach;
                          // dd($id);
                           ?>
                          <td>
                              {{$invoiceNumber}}
                          </td>

                          <td>{{$len}}</td>
                          <td>
                              {{$totalAmount}} {{$currency}}
                          </td>
                          <td>
                              {{$lastDate}}
                          </td>
                        <td>
                          <a class="btn" href="{{ route('create-pdf',['id'=>$id]) }}">Show PDF</a>
                        </td>
                        <td>
                          <a class="btn" href="#">Pay</a>
                        </td>
                        <!-- <td>{{ $invoice->amount }}</td>
                        <td>


                          <p>
                            <label>
                              <input type="checkbox" class="filled-in" name="checkArr[]" value="{{$invoice->id}}" />
                              <span></span>
                            </label>
                          </p>
                        </td> -->
                      </tr>

                      @empty
                        <tr><td>No invoice available!!</td></tr>
                      @endforelse
                      <!-- <tr>
                        <td>
                          <div class="row">
                              <div class="col s12">
                                  <button type="submit" class="btn">Generate PDF Invoice</button>

                              </div>
                          </div>
                        </td>

                      </tr> -->
               <!-- </form> -->

            </tbody>
          </table>
    </div>
</div>
@endsection
