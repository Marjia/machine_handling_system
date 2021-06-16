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
      $machines= Machines::where('is_delete', 'NO')->where('is_active','YES')->get();
      $user = User::where('is_deleted', 'NO')->where('is_active','YES')->get();

      return view('admin.userSession.index', ["taggedMachines"=>$taggmachine,"machines"=>$machines, "users"=>$user]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $user = $request->user;
     //dd($user);
         
          $input = TaggedUsersMachines::where('user_id',$user)
                                        ->where('machine_id',$request->machine_no)
                                         ->where('is_active',"YES")
                                         ->first();
          //dd($input);
         if($input == NULL)
         {
           echo "machine is not tagged with";
         }
         else {
           echo "ghuma";

               $start_time=Carbon::now();
               $userSession = new UserSessions();

               $userId = $input->user_id;

               $userSession->user_id=$userId;
               $userSession->tagged_users_machines_id=$input->id;
               $userSession->session_rate = $input->hourly_session_charge;
               $userSession->currency = $input->currency;
               $userSession->logged_at=Carbon::now();
               $userSession->start_time=$start_time;
               if($userId %2 != 0){
               $userSession->end_time=Carbon::now()->addDay();}
               else {
                 $userSession->end_time=Carbon::now()->addDay(2);
               }
               $userSession->save();

           //     //return view('admin.userSession.sessionEnd',['userSession'=>$userSession]);
           //     return redirect('/user-session');

         }


        //dd($input);
    }

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
    // public function edit(Request $request)
    // {
    //   //$var = $request->all();
    //   // $user = 0;
    //   // dd($request);
    //   $input = TaggedUsersMachines::findOrFail($id)
    //                                ->where('user_id',)
    //                                ->where('machine_id',)
    //                                ->where('is_active','YES');
    //     $start_time=Carbon::now();
    //     $userSession = new UserSessions();
    //
    //     $userId = $input->user_id;
    //
    //     $userSession->user_id=$userId;
    //     $userSession->tagged_users_machines_id=$input->id;
    //     $userSession->session_rate = $input->hourly_session_charge;
    //     $userSession->logged_at=Carbon::now();
    //     $userSession->start_time=$start_time;
    //     if($userId %2 != 0){
    //     $userSession->end_time=Carbon::now()->addDay();}
    //     else {
    //       $userSession->end_time=Carbon::now()->addDay(2);
    //     }
    //     $userSession->save();
    //
    //     //return view('admin.userSession.sessionEnd',['userSession'=>$userSession]);
    //     return redirect('/user-session');
    //
    // }

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
