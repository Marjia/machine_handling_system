<?php

namespace App\Http\Controllers;

use App\Models\Machines;
use App\Models\TaggedUsersMachines;
use App\Models\User;
use App\Models\UserSessions;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\Auth;

class DetagMachineController extends Controller
{
    public function create(){

        $taggmachine= TaggedUsersMachines::where('is_active','YES')->get();

        return view('admin.machine.detag', ["taggedMachines"=>$taggmachine,"machines"=>Machines::all(), "users"=>User::all()]);
    }

    public function edit($id){

        $input = TaggedUsersMachines::findOrFail($id);

       // dd($input);

        $input->is_active="NO";
        $input->detagged_by= Auth::user()->id;
        $input->detagged_at=Carbon::now();
        
        $input->save();

        $userSession = new UserSessions();

        $userSession->user_id=$input->user_id;
        $userSession->tagged_users_machines_id=$input->id;
        $userSession->start_time=$input->tagged_at;
        $userSession->end_time=$input->detagged_at;
        $userSession->session_rate = $input->hourly_session_charge;
        $userSession->logged_at=Carbon::now();

        $userSession->save();

        $machine=$input->machine_id;

       // dd($machine);
        $machines = Machines::findOrFail($machine);

        //dd($machines);

        $machines->is_tagged="NO";

 
       // dd($machines);
        $machines->save();
 


        return redirect('/tagged-machine');


    }
}
