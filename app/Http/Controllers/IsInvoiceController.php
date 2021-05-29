<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use App\Models\Machines;
use App\Models\TaggedUsersMachines;
use App\Models\User;
use App\Models\UserSessions;
use Illuminate\Http\Request;

class IsInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $invoices = UserSessions::join('users','users.id','=','user_sessions.user_id')
                 ->select(['users.name','user_sessions.user_id','user_sessions.id','user_sessions.start_time',
                 'user_sessions.end_time','user_sessions.tagged_users_machines_id',
                 'user_sessions.is_invoiced'])
                 ->where('is_invoiced','NO')
                 // ->where('end_time',"!=",'NULL')
                 //->orderBy('user_sessions.tagged_users_machines_id','asc')
                 ->orderBy('users.name', 'asc')
                 ->get();

    // dd($invoices);

    // $arrayOfTaggedId = [];
    //
    // foreach ($invoices as $taggedId) {
    //   echo $taggedId->user_id."\n\n".$taggedId->tagged_users_machines_id;
    //   array_push($taggedId->tagged_users_machines_id, $arrayOfTaggedId[$taggedId->user_id]);
    // }
    //
    // print_r($arrayOfTaggedId);
    // dd();




        return view('admin.invoices.index', ['invoices'=> $invoices,
        'machines'=>Machines::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $invoice = $request->all();

        dd( $request->all());
        $userSession = UserSessions::where($invoice->user_sessions_id,'==','id');
        return view('admin.invoices.createPdf',['invoices'=>$invoice,'userSession'=>$userSession]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       // dd($request->discount);

       // $request->validate([
       //
       //    'invoices_number' => 'required|unique:invoices,invoices_no,'
       //
       // ]);

      if($request->checkArr==NULL){
        return back()->with('error','select to create invoice');
      }
      else {


                $var=$request->checkArr;
                $len= count($var);
                $terminate=0;
                $createInvoice=0;

                for ($j=0; $j < $len && $terminate == 0; $j++) {
                  $userSession = UserSessions::findOrFail($var);
                  if($j+1!=$len)
                  {
                    if ($userSession[$j]->tagged_users_machines_id==$userSession[$j+1]->tagged_users_machines_id) {
                      //echo "same";
                     $terminate==0;
                    }
                    else {

                      return back()->with('taggederror','select same tagged Id');
                      $terminate=1;
                      $createInvoice=1;
                    }
                  }

                }
                echo $createInvoice;
                if($request->discount == NULL)
                {
                  $discount = 0;
                }
                else {
                  $discount = $request->discount;
                }
              for ($i=0; $i < $len && $createInvoice == 0; $i++) {

                       //echo $var[$i];
                      $userSession = UserSessions::findOrFail($var[$i]);

                         //echo $userSession;
                       //

                        $percent = ($request->input('discount') * $userSession-> session_rate) / 100;
                        $total = $userSession-> session_rate - $percent;
                        //dd($total);
                        $invoice = new Invoices();

                        $invoice->invoices_no = $userSession->id;
                        $invoice->user_sessions_id = $userSession->id;
                        $invoice->from_date  = $userSession-> start_time;
                        $invoice->to_date   = $userSession-> end_time;
                        $invoice->discount = $discount;
                        $invoice->amount   = $userSession->session_rate;
                        $invoice->final_amount   = $total;
                        $invoice->tax_amount = 20;
                        $invoice->total_payable_amount = $invoice->final_amount+$invoice->tax_amount+$invoice->discount;
                        $invoice->is_active = "YES";
                        $invoice->save();


                        $userSession->is_invoiced ="YES";
                        $userSession->save();
              }

              // $invoice = new Invoices();
              //
              // if($request->discount == NULL)
              // {
              //   $invoice->discount = 0;
              // }
              // else{
              //   $invoice->discount = $request->discount;
              // }
              // $invoice->invoices_no=$user_session_id;
              // $invoice->user_sessions_id = $user_session_id;
              // $invoice->amount = $amount;
              // $invoice->tax_amount = 20;
              // $invoice->final_amount = $total;
              // $invoice->total_payable_amount = $total_payable_amount;
              // $invoice->from_date  = $start_time;
              // $invoice->to_date   = $end_time;
              // $invoice->is_active = "YES";
              // $invoice->save();

          return redirect('/invoice');
     }
        //dd($len);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      $invoices = Invoices::join('user_sessions','user_sessions.id','=','invoices.user_sessions_id')
                 ->select(['invoices.id','invoices.amount','invoices.invoices_no','invoices.user_sessions_id','user_sessions.start_time',
                 'user_sessions.end_time','user_sessions.tagged_users_machines_id',
                 'user_sessions.is_invoiced'])
                 //->where('is_invoiced','NO')
                 // ->where('end_time',"!=",'NULL')
                 ->orderBy('user_sessions.tagged_users_machines_id','asc')
                 //->orderBy('users.name', 'asc')
                 ->get();
        return view('admin.invoices.show',['invoices'=> $invoices]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $invoice = $request->all();
        dd($invoice);

        //return view('admin.invoices.create',['invoices'=>$invoice]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        dd($request->all());

        //$userSession = UserSessions::findOrFail($id);


        // $request->validate([
        //     'discount'=>'required',
        //     'tax_amount' => 'required',
        //
        // ]);
        //
        // $percent = ($request->input('discount') * $userSession-> session_rate) / 100;
        // $total = $userSession-> session_rate - $percent;
        // //dd($total);
        // $invoice = new Invoices();
        //
        // $invoice->invoices_no = $userSession->id;
        // $invoice->user_sessions_id = $userSession->id;
        // $invoice->from_date  = $userSession-> start_time;
        // $invoice->to_date   = $userSession-> end_time;
        // $invoice-> discount = $request->input('discount');
        // $invoice->amount   = $userSession-> session_rate;
        // $invoice->final_amount   = $total;
        // $invoice-> tax_amount = $request->input('tax_amount');
        // $invoice->total_payable_amount = $invoice->final_amount+$invoice->tax_amount+$invoice->discount;
        // $invoice-> is_active = "YES";
        // $invoice->save();
        //
        //
        // $userSession->is_invoiced ="YES";
        // $userSession->save();
        //
        // //return redirect(route('invoice.show',$invoice->id));
        //
        // return redirect('/invoice');
    }

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
