@extends('template.layout')
@section('content')
<div class="container">
@guest
@include('auth.login')
@endguest
</div>
 <div class="container">
@auth
   <div class="center" style="padding: 20px"> <h1 class="primary-title">Tag Machine User</h1></div>
   <div class="row card" style="padding: 10px">
         <form method="POST"  action="{{ route('assign-machine') }}" class="col s12">
            @csrf

            <div class="row" style="padding-top: 30px">
                <div class="input-field col s6">
                    <select name="user" id="user_id">

                        <option value="" disabled selected>Select</option>
                      @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                      @endforeach

                    </select>
                    <label>User Name</label>
                    @error('name')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="input-field col s6">
                    <select name="machine_no" id="machine_id">
                      <option value="" disabled selected>Select</option>

                      @foreach ($machines as $machine)
                        <option value="{{ $machine->id }}">{{ $machine->machine_no }}</option>
                      @endforeach

                    </select>
                    <label>Machine No.</label>
                            @error('machine_no')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <label for="hourly_session_charge">Hourly session charge : </label>
                    <input type="number" name="hourly_session_charge" value="{{ old('hourly_session_charge')}}" max="999.00">
                    @error('hourly_session_charge')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="input-field col s6">
                    <select name="currency" id="currency">
                      <option value="" disabled selected>Select</option>


                        <option value="BDT">BDT</option>
                        <option value="AED">AED</option>
                        <option value="USD">USD</option>

                    </select>
                    <label>Currency</label>
                    @error('currency')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
            {{-- <div class="row">
                <div class="input-field col s12">
                    <label for="start">Date : </label>
                    <input type="date" name="tagged_at" value="2018-01-01" min="2018-01-01" max="2030-12-31">
                    @error('tagged_at')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </dUser Nameiv> --}}
            <!-- <div class="input-field col s12">
                <select name="is_active">
                  <option value="" disabled selected>Select</option>
                  <option value="NO"  >NO</option>
                  <option value="YES" >YES</option>
                </select>
                <label>Active</label>
                @error('is_active')
                    <p>{{ $message }}</p>
                @enderror
            </div> -->
            <div class="row">
                <div class="col s12">
                    <button type="submit" class="btn">Tag machine</button>
                </div>
            </div>
        </form>
     </div>
@endauth
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
