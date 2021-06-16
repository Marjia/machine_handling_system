
@extends('template.layout')
@section('content')
@guest
@include('auth.login')
@endguest
@auth
<div class="container">
  <div class="center" style="padding: 20px"> <h1 class="primary-title">Create Session</h1></div>
  <div class="row card" style="padding: 10px">
      <form method="POST"  action="{{ route('user-session.store' )}}" class="col s12">
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
      <div>
        <button type="submit" class="btn">start</button>
      </div>

    </form>


<!--
        <table>
            <thead>
              <tr>
                  <th>User Name</th>
                  <th>Machine No.</th>
                  <th>Session</th>
                  <th></th>
              </tr>
            </thead>
            <tbody>
               <tr>
                     <td>
                         <form method="POST"  action="{{ route('user-session.store' )}}" class="col s12">
                            @csrf
                           <select name="user" id="user_id">
                               <option value="" disabled selected>Select</option>

                             @foreach ($users as $user)
                               <option value="{{ $user->id }}">{{ $user->name }}</option>
                             @endforeach

                           </select>

                           @error('name')
                               <p>{{ $message }}</p>
                           @enderror
                         </td>
                       </tr>
                       <tr>
                       <td>
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
                     </td>
                    </tr>
                   <tr>
                    <td><button type="submit" class="btn">start</button></td>
                  </tr>
                </form>
            </tbody>
          </table> -->


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
