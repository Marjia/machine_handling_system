
@extends('template.layout')

@section('content')
<div class="container">
  @guest
   @include('auth.login')
  @endguest
</div>

<div class="container">
 @auth
    <div class="center" style="padding: 20px"> <h1 class="primary-title">Machine List</h1></div>
    <div class="row" style="padding:15px">
     <div class="card col s6 offset-s3" style="padding:15px">
       <table>
           <thead>
             <tr>
                 <th style="text-align:center">Machine No.</th>
                 <th style="text-align:center">Active</th>
                 <th style="text-align:center">Actions</th>
             </tr>
           </thead>
           <tbody>
             @forelse ($machines as $machine)
             <tr>
               <td style="text-align:center">
                 <a href=" {{ route('machine.show',[$machine->id]) }} ">
                   {{ $machine->machine_no }}
                 </a>
               </td>
               <td  style="text-align:center">{{ $machine->is_active }}</td>
               <td style="text-align:center"><a class="btn" href="{{ route('machine.edit', ['machine'=>$machine->id]) }}">Edit</a></td>
               <td style="text-align:center"><a class="btn" href="{{ route('machine-delete', $machine->id) }}">Delete</a></td>
             </tr>
             @empty
               <tr><td>No machine included!!</td></tr>
             @endforelse
           </tbody>
         </table>

     </div>
    </div>
 @endauth
</div>
@endsection
