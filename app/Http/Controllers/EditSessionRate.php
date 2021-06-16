<?php

namespace App\Http\Controllers;

use App\Models\Machines;
use App\Models\TaggedUsersMachines;
use App\Models\User;
use App\Models\UserSessions;
use Illuminate\Http\Request;

class EditSessionRate extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $taggmachine= TaggedUsersMachines::where('is_active','YES')->get();

      return view('admin.userSession.editSessionRate.index', ["tagMachines"=>$taggmachine,"machines"=>Machines::all(), "users"=>User::all()]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd($id);
        $taggmachine= TaggedUsersMachines::findOrFail($id);
        $user = User::findOrFail($taggmachine->user_id);
        $machine = Machines::findOrFail($taggmachine->machine_id);
        //dd($taggmachine->user_id,$user,$machine);

        return view('admin.userSession.editSessionRate.edit', ["taggedMachines"=>$taggmachine,"machine"=>$machine, "user"=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->hourly_session_charge,$id);

        $tagMachine = TaggedUsersMachines::findOrFail($id);
        $tagMachine->hourly_session_charge = $request->hourly_session_charge;
        $tagMachine->save();

       return(redirect('/edit-rate'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
