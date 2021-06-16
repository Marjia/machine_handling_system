<?php

namespace App\Http\Controllers;

use App\Models\Machines;
use Illuminate\Http\Request;

class MachineDeactivationController extends Controller
{
    public function edit($id){

      // dd($id);

        $machinePost = Machines::findOrFail($id);

        //$request->validated();

        $machinePost->is_delete = "YES";
        $machinePost->save();

        return redirect('/machine');

    }
}
