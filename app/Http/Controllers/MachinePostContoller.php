<?php

namespace App\Http\Controllers;

use App\Models\Machines;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMachinePost;
use App\Models\TaggedUsersMachines;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MachinePostContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $machine= Machines::where('is_delete','NO')->get();

        return view('admin.machine.index',['machines'=>$machine]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.machine.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMachinePost $request)
    {
       $request->validated();
        //Machines::create($validatedData);
        $AddMachine = new Machines();
        $AddMachine->machine_no = $request->input('machine_no');
        $AddMachine->is_active = "YES";
        $AddMachine->created_by = Auth::user()->id;
        $AddMachine->save();

        return redirect('/machine');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //  $tag = TaggedUsersMachines::findOrFail($id);
        //$user_id = $tag->user_id;
        //dd($tag);
        $machine=Machines::findOrFail($id);
        $user= User::findOrFail($machine->created_by);
          $tag = TaggedUsersMachines::where('machine_id',$id)->get();
       //
        return view('admin.machine.show',['machine'=> $machine,'users'=>$user,'tag'=>$tag]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $machine = Machines::findOrFail($id);
        //
        // $tag = TaggedUsersMachines::where('machine_id',$id)->get();
        // $user= User::findOrFail($machine->created_by);

        return view('admin.machine.edit',['machine'=>$machine]);


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
        $machinePost = Machines::findOrFail($id);
  //       $tag = TaggedUsersMachines::findOrFail($id);
  // dd($tag);

        $request->validate([
            'is_active'=>'required',
            'machine_no' => 'required|unique:machines,machine_no,'.$machinePost->id

        ]);

        $machinePost->machine_no = $request->input('machine_no');

        $active=$request->input('is_active');

        if ($active == "NO" && $machinePost->is_tagged == "YES") {

             return back()->with('error','Machine is already in use');
        }
        else {
          $machinePost->is_active = $request->input('is_active');
        }


        $machinePost->modified_by = Auth::user()->id;
        $machinePost->updated_at = Carbon::now();
        $machinePost->save();

        return redirect(route('machine.show',$machinePost->id));
    }

}
