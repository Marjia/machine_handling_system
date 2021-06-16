<?php

namespace App\Http\Controllers;

use App\Models\Machines;
use App\Models\TaggedUsersMachines;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignMachineController extends Controller
{
    public function create(){

        // $users= User::where('is_tagged','NO')->get();
        $machines= Machines::where('is_tagged','NO')->where('is_delete', 'NO')->where('is_active','YES')->get();
        $user = User::where('is_deleted', 'NO')->where('is_active','YES')->get();
        return view('admin.machine.assignMachine',["machines"=>$machines,"users"=>$user]);
    }

    public function store(Request $request){
       //$input = $request->all();



       $request->validate([

        'user'=>'required',
        'machine_no'=>'required',
        'hourly_session_charge'=>'required',
        'currency'=>'required',
        // 'is_active'=>'required',
        // 'tagged_at'=>'required',

      ]);

       $taggedMachine = new TaggedUsersMachines();

       $taggedMachine->user_id = $request->input('user');
       $taggedMachine->machine_id=$request->input('machine_no');
       $taggedMachine->hourly_session_charge=$request->input('hourly_session_charge');
       $taggedMachine->currency=$request->input('currency');
       $taggedMachine->tagged_at=$request->input('tagged_at');
       $taggedMachine->is_active="YES";
       $taggedMachine->tagged_by= Auth::user()->id;
       $taggedMachine->tagged_at=  Carbon::now();
    //    $taggedMachine->detagged_by= Auth::user()->id;

       $user=$request->input('user');
       $machine=$request->input('machine_no');

       $taggedMachine->save();



       $machines = Machines::findOrFail($machine);

       $machines->is_tagged="YES";

       $machines->save();



       $users = User::findOrFail($user);

       $users->is_tagged="YES";

       $users->save();

       return redirect('/tagged-machine');


    }
}
