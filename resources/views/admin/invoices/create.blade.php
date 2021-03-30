@extends('template.layout')

@section('content')

 <div class="container">
     <div class="row">
         <form method="POST"  action="{{ route('invoice.update', $invoices->id )}}" class="col s12">
            @csrf
            @method('PUT')

            <div class="row">

                <table>
                    <thead>
                      <tr>
                        <div class="center" style="padding: 8px"> <h1 class="primary-title">Pay bill</h1></div>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>User Session ID</th>
                            <td>00{{$invoices->id}}</td>
                        </tr>
                        <tr>
                            <th>From</th>
                            <td>{{$invoices->start_time}}</td>
                        </tr>
                        <tr>
                            <th>To</th>
                            <td>{{$invoices->end_time}}</td>
                        </tr>
                        <tr>
                            <th>Session Rate</th>
                            <td>{{$invoices->session_rate}}.00</td>
                        </tr>
                    </tbody>
                  </table>   
            </div>

            <div class="row">
                <div>
                    <label>Discount</label>

                    <input type="text" name="discount" value="{{ old('discount')}}">
                    @error('discount')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div>
                    <label>Tax</label>

                    <input type="text" name="tax_amount" value="{{ old('tax_amount')}}">
                    @error('tax_amount')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <button type="submit" class="btn">Pay</button>
                </div>
            </div>
        </form>
     </div>
 </div>
@endsection
@section('customJs')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>
@endsection
