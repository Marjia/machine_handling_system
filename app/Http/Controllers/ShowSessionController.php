<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use App\Models\Machines;
use App\Models\TaggedUsersMachines;
use App\Models\User;
use App\Models\UserSessions;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ShowSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //$id = Auth::user()->id;
      $invoices = UserSessions::join('users','users.id','=','user_sessions.user_id')
                 ->select(['users.name','user_sessions.user_id','user_sessions.id','user_sessions.start_time','user_sessions.currency',
                 'user_sessions.end_time','user_sessions.tagged_users_machines_id',
                 'user_sessions.is_invoiced'])
                 ->where('is_invoiced','NO')
                ->where('user_id', "=", Auth::user()->id)
                 //->orderBy('users.name', 'asc')
                 ->get();
        return view('userView.showSession', ['invoices'=> $invoices,
        'machines'=>Machines::all()]);

    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }
    //
    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }
    //
    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }
    //
    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }
    //
    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }
    //
    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
