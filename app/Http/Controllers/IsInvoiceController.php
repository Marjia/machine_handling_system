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
                 //->join('invoices','user_sessions_id','=','user_sessions.id')
                 ->select(['users.name','user_sessions.user_id','user_sessions.id',
                 'user_sessions.start_time',
                 'user_sessions.end_time','user_sessions.tagged_users_machines_id',
                 'user_sessions.is_invoiced'])//,'invoices.amount','invoices.discount',
                // 'invoices.final_amount','invoices.tax_amount'])
                 ->where('is_invoiced','NO')
                 // ->where('end_time',"!=",'NULL')
                 ->orderBy('users.name', 'asc')
                 ->orderBy('user_sessions.tagged_users_machines_id','asc')
                 ->get();

    // dd($invoices);
    //
    // $arrayOfTaggedId = [];
    //
    // foreach ($invoices as $taggedId) {
    //   //echo $taggedId->user_id."\n\n".$taggedId->tagged_users_machines_id."\n\n";
    //   if (isset($arrayOfTaggedId[$taggedId->user_id])) {
    //     $i = count($arrayOfTaggedId[$taggedId->user_id]);
    //   } else{
    //     $i = 0;
    //   }
    //   $arrayOfTaggedId[$taggedId->user_id][$i] = $taggedId->tagged_users_machines_id;
    //
    // // else {
    //   //array_push( $taggedId->tagged_users_machines_id, $arrayOfTaggedId[$taggedId->user_id][i]);
    // // }
    // }
    //
    //  dd($arrayOfTaggedId);
    // dd();




        return view('admin.invoices.index', ['invoices'=> $invoices,
        'machines'=>Machines::all()]);

        //'arrayOfTaggedId'=>$arrayOfTaggedId
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

       //dd($request->checkArr);

       //dd

       if($request->discount == NULL)
       {
         $discount = 0;
       }
       else {
         $discount = $request->discount;
       }

      if($request->checkArr==NULL){
        return back()->with('error','select to create invoice');
      }
      else {


                $var=$request->checkArr;
                $len= count($var);
                //dd($len);
                echo $len."\n\n\n";
                  $userSession = UserSessions::findOrFail($var);
                  arrSrt[]=sort($userSession->tagged_users_machines_id);

        for ($i=0; $i < $len ; $i++) {
               //asort($userSession[$i]->tagged_users_machines_id);

                 echo $userSession[$i]->tagged_users_machines_id;
                 //echo $var[$i]."\n\n\n";
                  // $userSession = UserSessions::findOrFail($var);
                  //
                  // if($i!=$len-1){
                  //   if ($userSession[$i]->tagged_users_machines_id==$userSession[$i+1]->tagged_users_machines_id) {
                  //     echo "same\n\n\n\n";
                  //   }
                  //   else {
                  //     echo "different\n\n\n\n";
                  //   }
                  // }
                  //
                  //  echo "tagged\n\n\n\n".$userSession[$i]->tagged_users_machines_id;
                 //
                  //
                  // $percent = ($discount * $userSession-> session_rate) / 100;
                  // $total = $userSession->session_rate - $percent;
                  // //dd($total);
                  // $invoice = new Invoices();
                  //
                  // $invoice->invoices_no = $userSession->id;
                  // $invoice->user_sessions_id = $userSession->id;
                  // $invoice->from_date  = $userSession-> start_time;
                  // $invoice->to_date   = $userSession-> end_time;
                  // $invoice->discount = $discount;
                  // $invoice->amount   = $userSession->session_rate;
                  // $invoice->final_amount   = $total;
                  // $invoice->tax_amount = 20;
                  // $invoice->total_payable_amount = $invoice->final_amount+$invoice->tax_amount+$invoice->discount;
                  // $invoice->is_active = "YES";
                  // $invoice->save();
                  //
                  //
                  // $userSession->is_invoiced ="YES";
                  // $userSession->save();
        }
       //return redirect('/invoice');
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
        return view('admin.invoices.show',['invoices'=> Invoices::all()]);
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
