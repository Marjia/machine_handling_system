@extends('admin.dashboard')
@section('usercontent')
<div class="container">
    <div class="row">
        <form class="col s12" method="POST" action="{{route('userPosts.update', ['userPost'=>$userPost->id])}}">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col s6">
                    {{-- Frist Name Start --}}
                    <label for="first_name">First Name : </label>
                    <input type="text" name="first_name" value="{{ old('first_name', $userPost->first_name)}}">
                    @error('first_name')
                        <p>{{ $message }}</p>
                    @enderror
                    {{-- First Name End --}}
                </div>
                <div class="col s6">
                    {{-- Last Name Start --}}
                    <label for="last_name">Last Name : </label>
                    <input type="text" name="last_name" value="{{ old('last_name', $userPost->last_name)}}">
                    @error('last_name')
                        <p>{{ $message }}</p>
                    @enderror
                    {{-- Last Name End --}}
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <label for="name">Name : </label>
                    <input type="text" name="name" value="{{ old('name', $userPost->name)}}">
                    @error('name')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col s12">
                    <label for="company_name">Company Name : </label>
                    <input type="text" name="company_name" value="{{ old('company_name', $userPost->company_name)}}">
                    @error('company_name')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <label for="email">Email : </label>
                    <input type="text" name="email" value="{{ old('email', $userPost->email)}}">
                    @error('email')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <label for="phone_number">Phone Number : </label>
                    <input type="number" name="phone_number" value="{{ old('phone_number', $userPost->phone_number)}}">
                    @error('phone_number')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <label for="address">Address : </label>
                    <textarea name="address" id="address_id" class="materialize-textarea">{{ old('address', $userPost->address)}}</textarea>
                    @error('address')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <label for="tax_reg_no">Tax Registration Number : </label>
                    <input type="number" name="tax_reg_no" value="{{ old('tax_reg_no', $userPost->tax_reg_no)}}">
                    @error('tax_reg_no')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div>
                    <label style="padding-left: 6px">Admin</label>
                    <select name="is_admin">
                      <option  value="">Select</option>
                      <option value="NO"  
                          @php
                          // ddd(old('is_admin', $userPost->is_admin));
                          echo (old('is_admin', $userPost->is_admin) == 'NO') ? 'selected' : "";
                          @endphp>NO</option>
                      <option value="YES"  
                      @php
                      echo (old('is_admin', $userPost->is_admin) == 'YES') ? 'selected' : "";
                      @endphp>YES</option>
                    </select>
                    @error('is_admin')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div>
                    <label>Active</label>
                    <select name="is_active">
                      <option value="">Select</option>
                      <option value="NO"  
                          @php
                          // ddd(old('is_admin', $userPost->is_admin));
                          echo (old('is_active', $userPost->is_active) == 'NO') ? 'selected' : "";
                          @endphp>NO</option>
                      <option value="YES"  
                      @php
                      echo (old('is_active', $userPost->is_active) == 'YES') ? 'selected' : "";
                      @endphp>YES</option>
                    </select>
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




