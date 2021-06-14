<?php

namespace App\Http\Controllers;
use App\Models\Invoices;
use App\Models\Machines;
use App\Models\TaggedUsersMachines;
use App\Models\User;
use App\Models\UserSessions;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class DatePickerInvoice extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
  */
    public function index()
    {
      $invoicesDatepicker = UserSessions::join('users','users.id','=','user_sessions.user_id')
                 ->select(['users.name','user_sessions.id','user_sessions.start_time','user_sessions.end_time','user_sessions.tagged_users_machines_id',
                 'user_sessions.is_invoiced'])
                 ->where('is_invoiced','NO')
                 // ->where('end_time',"!=",'NULL')
                 ->orderBy('users.name', 'asc')
                 ->get();

    //  dd($invoices);

        return view('admin.invoices.index', ['invoices'=> $invoicesDatepicker,
        'machines'=>Machines::all()]);
    }
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

      //  dd($request->discount,$startDateTime,$endDateTime);

      if($request->discount>=50){
        return back()->with('discount_error','Discount can not be more then 49%');
      }elseif ($request->discount == NULL ) {
        $discount= 1;
      }else {
          $discount = $request->discount;
      }
      //dd($discount);

      if($startDateTime<$endDateTime)
      {
        $userSessions = UserSessions::where("start_time",">=", $startDateTime)
                                ->where("start_time","<=", $endDateTime)
                                ->where('is_invoiced','NO')
                                ->where('user_id', "=", Auth::user()->id)
                                ->get()
                                ->groupBy('tagged_users_machines_id');

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

          $percent = ($discount * $userSession-> session_rate) / 100;
          $total = $userSession->session_rate - $percent;
          //dd($total);
          $invoice = new Invoices();

          $invoice->invoices_no = $invoiceNumberFull;
          $invoice->user_sessions_id = $userSession->id;
          //echo "userId\n\n\n".$v->id."\n\n\ninvoice number\n\n\n".$invoiceNumberFull;
          $invoice->from_date  = $userSession->start_time;
          $invoice->to_date   = $userSession->end_time;
          $invoice->discount = $discount;
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

       return redirect()->route('user-invoice.show',1);
     }

      else {
        //echo "date time is not correct";
        return back()->with('error','please enter valid date');
      }

    }

}
