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
                <th>total Session Id</th>
                <th>total Amount</th>
                <th>Last Date payment</th>
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
                             $createdDate = $invoice->created_at;
                             $lastDate =  $createdDate->addDay(5)->format('d.m.Y');
                            ?>

                          <?php endforeach;
                          // dd($id);
                           ?>
                          <td>
                              {{$invoiceNumber}}
                          </td>

                          <td>{{$len}}</td>
                          <td>
                              {{$totalAmount}}
                          </td>
                        <td>{{ $lastDate }}</td>
                        <td><a class="btn" href="{{ route('create-pdf',['id'=>$id]) }}">Generate Invoice PDF</a></td>
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
                        <tr><td>No session available!!</td></tr>
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
