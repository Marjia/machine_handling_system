<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TaggedUsersMachines;
use App\Models\Machines;
use App\Models\UserSessions;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class UserSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $taggmachine= TaggedUsersMachines::where('is_active','YES')->get();

      return view('admin.userSession.index', ["taggedMachines"=>$taggmachine,"machines"=>Machines::all(), "users"=>User::all()]);
      //  return view('admin.userSession.index',['users'=>User::all()]);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
      $var = $request->all();
      $user = 0;

      $input = TaggedUsersMachines::findOrFail($id);
        $start_time=Carbon::now();
        $userSession = new UserSessions();

        $userId = $input->user_id;

        $userSession->user_id=$userId;
        $userSession->tagged_users_machines_id=$input->id;
        $userSession->session_rate = $input->hourly_session_charge;
        $userSession->logged_at=Carbon::now();
        $userSession->start_time=$start_time;
        if($userId%2 != 0){
        $userSession->end_time=Carbon::now()->addDay();}
        else {
          $userSession->end_time=Carbon::now()->addDay(2);
        }
        $userSession->save();

        //return view('admin.userSession.sessionEnd',['userSession'=>$userSession]);
        return redirect('/user-session');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update($id)
    // {
    //   $userSession = UserSessions::findOrFail($id);
    //   $userSession->end_time=Carbon::now();
    //   $userSession->save();
    //   return redirect('/user-session');
    //
    //
    //
    // }

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
