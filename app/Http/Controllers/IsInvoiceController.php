<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use App\Models\Machines;
use App\Models\TaggedUsersMachines;
use App\Models\User;
use App\Models\UserSessions;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class IsInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // dd( Auth::user()->id);
      $invoices = UserSessions::join('users','users.id','=','user_sessions.user_id')
                 ->select(['users.name','user_sessions.user_id','user_sessions.id','user_sessions.start_time','user_sessions.currency',
                 'user_sessions.end_time','user_sessions.tagged_users_machines_id',
                 'user_sessions.is_invoiced'])
                 ->where('is_invoiced','NO')
                //->where('user_id', "=", Auth::user()->id)
                 ->orderBy('users.name', 'asc')
                 ->get();

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

      $userSessions = UserSessions::where("start_time",">=", $startDateTime)
                              ->where("start_time","<=", $endDateTime)
                              ->where('is_invoiced','NO')
                              //->where('user_id', "=", Auth::user()->id)
                              ->get()
                              ->groupBy('tagged_users_machines_id');

    dd($userSessions->user_id);

    $invoi=rand(10,100);
  foreach ($userSessions as $res=>$resu) {

    // $userSession = $resu->first();
     $increametnInvoice= rand(0,9);
     $invoi = $invoi + $increametnInvoice;
     if($increametnInvoice%2 != 0){
       $invoiceNumberStr = "xyz";
     }
     else {
       $invoiceNumberStr = "abc";
     }

     $invoiceNumberFull = $invoiceNumberStr.str_pad($invoi,5,'0',STR_PAD_LEFT);

      //echo "invoice number".$invoiceNumber."\n\n\n\n";
     // echo "userId==\n\n\n".$tr->user_id."\n\n\n";
      foreach ($resu as $userSession) {
        //$invoi= $invoi + 0;
          //dd($userSession);

        $percent = ($request->input('discount') * $userSession-> session_rate) / 100;
        $total = $userSession->session_rate - $percent;
        //dd($total);
        $invoice = new Invoices();

        $invoice->invoices_no = $invoiceNumberFull;
        $invoice->user_sessions_id = $userSession->id;
        //echo "userId\n\n\n".$v->id."\n\n\ninvoice number\n\n\n".$invoiceNumberFull;
        $invoice->from_date  = $userSession->start_time;
        $invoice->to_date   = $userSession->end_time;
        $invoice->discount = 10;
        $invoice->amount   = $userSession->session_rate;
        $invoice->currency   = $userSession->currency;
        $invoice->final_amount   = $total;
        $invoice->tax_amount = 20;
        $invoice->total_payable_amount = $invoice->final_amount+$invoice->tax_amount+$invoice->discount;
        $invoice->is_active = "YES";
        $invoice->save();


        $userSession->is_invoiced ="YES";
        $userSession->save();


       }
     }

      return redirect('/invoice');
   }

    else {
      return back()->with('error','please enter valid date');
    }


      // dd($request->all());
      //
      //
      // if($request->checkArr==NULL){
      //   return back()->with('error','select to create invoice');
      // }
      // else {
      //
      //
      //   $var=$request->checkArr;
      //   //$len= count($var);
      //
      //   $userSessions = UserSessions::findOrFail($var)->groupBy('tagged_users_machines_id');
      //
      //     $invoi=rand(10,1000);
      //   foreach ($userSessions as $res=>$resu) {
      //
      //     // $userSession = $resu->first();
      //     $increametnInvoice= rand(0,10);
      //     $invoi = $invoi + $increametnInvoice;
      //     if($increametnInvoice%2 != 0){
      //       $invoiceNumberStr = "xyz";
      //     }
      //     else {
      //       $invoiceNumberStr = "abc";
      //     }
      //
      //      $invoiceNumberFull = $invoiceNumberStr.str_pad($invoi,5,'0',STR_PAD_LEFT);
      //
      //       foreach ($resu as $userSession) {
      //         //$invoi= $invoi + 0;
      //
      //
      //         $percent = ($request->input('discount') * $userSession-> session_rate) / 100;
      //         $total = $userSession->session_rate - $percent;
      //         //dd($total);
      //         $invoice = new Invoices();
      //
      //         $invoice->invoices_no = $invoiceNumberFull;
      //         $invoice->user_sessions_id = $userSession->id;
      //         //echo "userId\n\n\n".$v->id."\n\n\ninvoice number\n\n\n".$invoiceNumberFull;
      //         $invoice->from_date  = $userSession->start_time;
      //         $invoice->to_date   = $userSession->end_time;
      //         $invoice->discount = 10;
      //         $invoice->amount   = $userSession->session_rate;
      //         $invoice->currency   = $userSession->currency;
      //         $invoice->final_amount   = $total;
      //         $invoice->tax_amount = 20;
      //         $invoice->total_payable_amount = $invoice->final_amount+$invoice->tax_amount+$invoice->discount;
      //         $invoice->is_active = "YES";
      //         //$invoice->save();
      //
      //
      //         $userSession->is_invoiced ="YES";
      //         //$userSession->save();
      //       }
      //
      //   }
      //    $user= User::findOrFail($userSession->user_id);
      // //  dd($user->is_admin);
      //
      //   if ($user->is_admin == "NO") {
      //     return redirect('/user-invoice');
      //   }
      //   return redirect('/invoice');
      // }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      $invoices = Invoices::select("*")
                           ->orderBy('invoices_no','asc')
                           ->get()
                           ->groupBy('invoices_no');
      return view('admin.invoices.show',['invoices'=> $invoices]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //$invoice = $request;
        //dd($id);

        $userSession = UserSessions::findOrFail($id);
        $invoi=rand(10,1000);
        $increametnInvoice= rand(0,10);

        $invoi = $invoi + $increametnInvoice;
        if($increametnInvoice%2 != 0){
          $invoiceNumberStr = "xyz";
        }
        else {
          $invoiceNumberStr = "abc";
        }

         $invoiceNumberFull = $invoiceNumberStr.str_pad($invoi,5,'0',STR_PAD_LEFT);

         $percent = ($request->input('discount') * $userSession-> session_rate) / 100;
         $total = $userSession->session_rate - $percent;
         //dd($total);
         $invoice = new Invoices();

         $invoice->invoices_no = $invoiceNumberFull;
         $invoice->user_sessions_id = $userSession->id;
         //echo "userId\n\n\n".$v->id."\n\n\ninvoice number\n\n\n".$invoiceNumberFull;
         $invoice->from_date  = $userSession->start_time;
         $invoice->to_date   = $userSession->end_time;
         $invoice->discount = 10;
         $invoice->amount   = $userSession->session_rate;
         $invoice->currency   = $userSession->currency;
         $invoice->final_amount   = $total;
         $invoice->tax_amount = 20;
         $invoice->total_payable_amount = $invoice->final_amount+$invoice->tax_amount+$invoice->discount;
         $invoice->is_active = "YES";
         $invoice->save();


         $userSession->is_invoiced ="YES";
         $userSession->save();

        $user= User::findOrFail(Auth::user()->id);

         if ($user->is_admin == "NO") {
           return redirect('/user-invoice');
         }elseif($user->is_admin == "YES") {
           return redirect('/invoice');
         }


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
