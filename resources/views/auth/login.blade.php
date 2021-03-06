@extends('template.layout')

@section('content')

<div class="main-content">
  <div class="container">
      <div class="row" style="padding-top:60px;">
          <form method="POST"  action="{{ route('login') }}" class="col s12">
             @csrf
             <div class="row" style="margin-top: 10%">
               <div class="col s12 m8 l4 offset-m2 offset-l4">
                 <div class="card">

                   <div class="card-action grey darken-3 white-text">
                     <h3>Login </h3>
                   </div>

                   <div class="card-content">
                     <div class="input-field form-field">
                       <label for="email">Email :</label>
                       <input type="email" name="email" value="{{ old('email')}}">
                       @error('email')
                           <p>{{ $message }}</p>
                       @enderror
                     </div><br>

                     <div class="input-field form-field">
                       <label for="password">Password</label>
                       <input type="password" name="password">
                       @error('password')
                           <p>{{ $message }}</p>
                       @enderror
                     </div><br>

                     <div class="form-field">
                       <button class="btn-large waves-effect waves-dark grey darken-3" style="width:100%;">Login</button>
                     </div><br>
                   </div>

                 </div>
               </div>
             </div>
         </form>
      </div>

  </div>

</div>
@endsection
