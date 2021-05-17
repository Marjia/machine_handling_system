<?php

namespace App\Http\Controllers;
use App\Models\Invoices;
use App\Models\Machines;
use App\Models\TaggedUsersMachines;
use App\Models\User;
use App\Models\UserSessions;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DatePickerInvoice extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
  */
    // public function index()
    // {
    //   $invoices = UserSessions::join('users','users.id','=','user_sessions.user_id')
    //              ->select(['users.name','user_sessions.id','user_sessions.start_time','user_sessions.end_time','user_sessions.tagged_users_machines_id',
    //              'user_sessions.is_invoiced'])
    //              ->where('is_invoiced','NO')
    //              // ->where('end_time',"!=",'NULL')
    //              ->orderBy('users.name', 'asc')
    //              ->get();
    //
    // //  dd($invoices);
    //
    //     return view('admin.invoices.index', ['invoices'=> $invoices,
    //     'machines'=>Machines::all()]);
    // }
    //
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
        //dd($request->all());
        $inputs = $request->all();
        $startDateTimeStr = $inputs['start_date'] . " " . $inputs['start_time'];
        $endDateTimeStr = $inputs['end_date'] . " " . $inputs['end_time'];
        // Amar bujte subista hobe
        $startDateTime = Carbon::parse($startDateTimeStr)->format('Y-m-d H:i:s');
        // Subusta
        $endDateTime = Carbon::parse($endDateTimeStr)->format('Y-m-d H:i:s');
        // dd($startDateTime);
        // Hello
        // ddd($startDateTime, $endDateTime);

      if($startDateTime<$endDateTime)
      {

        $userSession = UserSessions::where("start_time",">=", $startDateTime)
                                ->where("start_time","<=", $endDateTime)
                                ->get();

    //  dd($invoice->all());

        $var= $userSession->all();
        $len= count($var);
        //dd($len);

        for ($i=0; $i < $len ; $i++) {

              //   echo $var[$i];
                  //$userSession = UserSessions::findOrFail($i);

               echo $userSession[$i]."  "."\n";


                  $percent = ($request->input('discount') * $userSession[$i]-> session_rate) / 100;
                  $total = $userSession[$i]-> session_rate - $percent;
                  //dd($total);
                  $invoice = new Invoices();

                  $invoice->invoices_no = $userSession[$i]->id;
                  $invoice->user_sessions_id = $userSession[$i]->id;
                  $invoice->from_date  = $userSession[$i]-> start_time;
                  $invoice->to_date   = $userSession[$i]-> end_time;
                  $invoice->discount = 10;
                  $invoice->amount   = $userSession[$i]->session_rate;
                  $invoice->final_amount   = $total;
                  $invoice->tax_amount = 20;
                  $invoice->total_payable_amount = $invoice->final_amount+$invoice->tax_amount+$invoice->discount;
                  $invoice->is_active = "YES";
                  $invoice->save();


                  $userSession[$i]->is_invoiced ="YES";
                  $userSession[$i]->save();
        }
       //return redirect('/invoice');

        echo "comparison done\n\n";
      }
      else {
        return back()->with('error','please enter valid date');
      }
        //ddd(gettype($startDateTime));
    }
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
