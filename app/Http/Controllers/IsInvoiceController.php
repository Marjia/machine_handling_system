<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use App\Models\Machines;
use App\Models\TaggedUsersMachines;
use App\Models\User;
use App\Models\UserSessions;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


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


      if($request->checkArr==NULL){
        return back()->with('error','select to create invoice');
      }
      else {

        $var=$request->checkArr;
        //$len= count($var);

        $userSessions = UserSessions::findOrFail($var)->groupBy('tagged_users_machines_id');

          $invoi=rand(10,1000);
        foreach ($userSessions as $res=>$resu) {

          // $userSession = $resu->first();
          $increametnInvoice= rand(0,10);
          $invoi = $invoi + $increametnInvoice;
          if($increametnInvoice%2 != 0){
            $invoiceNumberStr = "xyz";
          }
          else {
            $invoiceNumberStr = "abc";
          }

           $invoiceNumberFull = $invoiceNumberStr.str_pad($invoi,5,'0',STR_PAD_LEFT);

            foreach ($resu as $userSession) {
              //$invoi= $invoi + 0;


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

        // foreach ($invoices as $totalInv) {
        //   $len = count($totalInv);
        //   echo "\n\n\nlength\n\n\n\n".$len;
        //    $totalAmount = 0;
        //   foreach ($totalInv as $invoi) {
        //       $totalAmount = $invoi->amount + $totalAmount;
        //       $createdDate = $invoi->created_at;
        //       $lastDate =  $createdDate->addDay(5)->format('d.m.Y');
        //       //$lastDate =Carbon::createFromFormat('Y.m.d', $date);
        //   }
        //   echo "\n\n\n\ntotal amaount\n\n\n\n".$lastDate;
        // }
       //  $length=count($invoices);
       //  echo "\n\n\nlength full\n\n\n".$length;
      // dd($lastDate);
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
