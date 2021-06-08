@extends('template.layout')
@section('content')
<div class="container">
    <div class="row">
        <form class="col s12" method="POST" action="{{route('user.store')}}">
            @csrf
            <div class="row">
                <div class="input-field col s6">
                    {{-- Frist Name Start --}}
                    <label for="first_name">First Name : </label>
                    <input type="text" name="first_name" value="{{ old('first_name')}}">
                    @error('first_name')
                        <p>{{ $message }}</p>
                    @enderror
                    {{-- First Name End --}}
                </div>
                <div class="input-field col s6">
                    {{-- Last Name Start --}}
                    <label for="last_name">Last Name : </label>
                    <input type="text" name="last_name" value="{{ old('last_name')}}">
                    @error('last_name')
                        <p>{{ $message }}</p>
                    @enderror
                    {{-- Last Name End --}}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <label for="name">Name : </label>
                    <input type="text" name="name" value="{{ old('name')}}">
                    @error('name')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <label for="email">E-mail : </label>
                    <input type="text" name="email" value="{{ old('email')}}">
                    @error('email')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <label for="company_name">Company Name : </label>
                    <input type="text" name="company_name" value="{{ old('company_name')}}">
                    @error('company_name')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <label for="phone_number">Phone Number : </label>
                    <input type="number" name="phone_number" value="{{ old('phone_number')}}">
                    @error('phone_number')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <label for="address">Address : </label>
                    <textarea name="address" id="address_id" class="materialize-textarea" ></textarea>
                    @error('address')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <label for="tax_reg_no">Tax Registration Number : </label>
                    <input type="number" name="tax_reg_no" value="{{ old('tax_reg_no')}}">
                    @error('tax_reg_no')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <label for="bank_account_type">Bank Account Type : </label>
                    <input type="text" name="bank_account_type" value="{{ old('bank_account_type')}}">
                    @error('bank_account_type')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <label for="web_site">Web Site Address : </label>
                    <input type="text" name="web_site" value="{{ old('web_site')}}">
                    @error('web_site')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <select name="is_admin">
                      <option value="" disabled selected>Select</option>
                      <option value="NO"  >NO</option>
                      <option value="YES" >YES</option>
                    </select>
                    <label>Admin</label>
                    @error('is_admin')
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
                <div class="input-field col s12">
                    <label for="password">Password : </label>
                    <input type="password" name="password">
                    @error('password')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <label for="password_confirmed">Retype Password : </label>
                    <input type="password" name="password_confirmation">
                    @error('password')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <button type="submit" class="btn">Add new user</button>
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
