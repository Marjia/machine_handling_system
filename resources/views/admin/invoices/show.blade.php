@extends('template.layout')

@section('content')

<div class="container">
  @guest
   @include('auth.login')
  @endguest
  @auth
    <div class="center" style="padding: 20px"> <h1 class="primary-title">Invoice List</h1></div>
    <div class="row card" style="padding: 20px">
        <table>
            <thead>
              <tr>
                <th>Invoice ID</th>
                <th style="text-align:center;">Total Number of Sessions</th>
                <th>Creation Date</th>
                <th>Total Amount</th>
                <th>Due Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

                      @forelse ($invoices as $i)
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
                             $created_at = \Carbon\Carbon::parse( $invoice->created_at );
                             $created_atFormate = $created_at->format('D, jS F Y');
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

                          <td style="text-align:center;">{{$len}}</td>
                          <td>{{ $created_atFormate }}</td>
                          <td>
                              {{$totalAmount}} {{$currency}}
                          </td>
                          <td>
                              {{$lastDate}}
                          </td>
                          <td>
                            <a class="btn" href="{{ route('create-pdf',['id'=>$id]) }}" style="background: linear-gradient(60deg,#616161,#212121);">show PDF</a>
                           </td>
                           <td>
                             <a class='dropdown-trigger btn' href='#' data-target='dropdown1' style="background: linear-gradient(60deg,#c62828,#b71c1c);">Pay</a>

                                <ul id='dropdown1' class='dropdown-content'>
                                    <li>
                                      <a class="waves-effect waves-light modal-trigger" href="#modal1">cards</a>
                                    </li>
                                    <li><a class="waves-effect waves-light modal-trigger" href="#modal1">Mobile Banking</a></li>
                                    <li><a class="waves-effect waves-light modal-trigger" href="#modal1">Net Banking</a></li>
                                  </ul>
                             </td>
                        </tr>
                      @empty
                        <tr><td>No Invoice available!!</td></tr>
                      @endforelse
            </tbody>
          </table>
      </div>
</div>
<div id="modal1" class="modal col s4">
    <div class="modal-content col s4">
    <h4>Bank Details for payment</h4>
    <table>
        <tbody>
              <tr>
                <td>Bank :</td>
                <td>ADCB Bank</td>
              </tr>
              <tr>
                <td>Account Title :</td>
                <td>cosmoprome</td>
              </tr>
              <tr>
                <td>Account No:</td>
                <td># 242980980</td>
              </tr>
              <tr>
                <td>Swift Code :</td>
                <td># weqeq980</td>
              </tr>
              <tr>
                <td>Branch :</td>
                <td>Dhaka</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-close waves-effect waves-green btn-flat col s4">OK</a>
        </div>
     </div>
  @endauth
  </div>
@endsection
@section('customJs')
  <script>
     document.addEventListener('DOMContentLoaded', function() {
       var elems = document.querySelectorAll('.dropdown-trigger');
       var instances = M.Dropdown.init(elems);

        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems);
      });
 </script>
@endsection
