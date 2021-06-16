@extends('template.layout')
@section('content')
@guest
@include('auth.login')
@endguest
@auth
 <div class="container">
     <div class="center" style="padding: 20px"> <h1 class="primary-title">Add Machine</h1></div>
     <div class="row card" style="padding:15px">
         <form method="POST"  action="{{ route('machine.store') }}" class="col s12">
            @csrf

            <div class="row">
                <div class="input-field col s12">
                    <label for="name">Machine No. : </label>
                    <input type="text" name="machine_no" value="{{ old('name')}}">
                    @error('machine_no')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <!-- <div class="row">
                <div class="input-field col s12">
                    <select name="is_active">
                      <option value="" disabled selected>Select</option>
                      <option value="NO"  >NO</option>
                      <option value="YES" >YES</option>
                    </select>
                    <label>Active</label>
                    @error('is_active')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div> -->
            <div class="row">
                <div class="col s12">
                    <button type="submit" class="btn">Add new machine</button>
                </div>
            </div>
        </form>
     </div>
 </div>
@endauth
@endsection
@section('customJs')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>
@endsection
