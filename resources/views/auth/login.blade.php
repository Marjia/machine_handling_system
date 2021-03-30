@extends('template.layout')

@section('content')

 <div class="container">
     <div class="row">
         <form method="POST"  action="{{ route('login') }}" class="col s12">
            @csrf

            <div class="row">
                <div class="input-field col s12">
                    <label for="email">Email : </label>
                    <input type="email" name="email" value="{{ old('email')}}">
                    @error('email')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <label for="password">Password : </label>
                    <input type="password" name="password">
                    @error('password')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <button type="submit" class="btn">login</button>
                </div>
            </div>
        </form>
     </div>
 </div>
@endsection






 