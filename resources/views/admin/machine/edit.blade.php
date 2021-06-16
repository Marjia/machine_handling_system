@extends('template.layout')

@section('content')
<div class="container">
  @guest
   @include('auth.login')
  @endguest
</div>
<div class="container">
 @auth
  <div class="center" style="padding: 20px"> <h1 class="primary-title">Edit Machine Details</h1></div>
   <div class="row" style="padding:15px">
         <form method="POST"  action="{{ route('machine.update', $machine->id )}}" class="card col s8 offset-s2" style="padding:40px">
            @csrf
            @method('PUT')

            <div class="row">
                <label for="name">Machine No. : </label>
                    <input type="text" name="machine_no" value="{{ old('name', $machine->machine_no)}}">
                    @error('machine_no')
                        <p>{{ $message }}</p>
                    @enderror
            </div>
            <div class="row">
                <div>
                    <label>Active</label>
                    <select name="is_active">
                      <option value="">Select</option>
                      <option value="NO"
                          @php
                          echo (old('is_active', $machine->is_active) == 'NO') ? 'selected' : "";
                          @endphp>NO</option>
                      <option value="YES"
                      @php
                      echo (old('is_active', $machine->is_active) == 'YES') ? 'selected' : "";
                      @endphp>YES</option>
                    </select>
                    <?php if (Session::has('error')): ?>
                      <div class="alert alert-danger">


                          {{Session::get('error')}}

                      </div>
                    <?php endif; ?>
                    @error('is_active')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <button type="submit" class="btn">Update</button>
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
