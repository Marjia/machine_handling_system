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
        return view('admin.invoices.index', ['invoices'=> UserSessions::all(),
        'users'=>User::all(),'machines'=>Machines::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create($id)
    // {

    //     $invoice = Invoices::findOrFail($id);

    //     dd($invoice);
    //     $userSession = UserSessions::where($invoice->user_sessions_id,'==','id');
    //     return view('admin.invoices.createPdf',['invoices'=>$invoice,'userSession'=>$userSession]);
    // }

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.invoices.show',['invoice'=> Invoices::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice = UserSessions::findOrFail($id);

        return view('admin.invoices.create',['invoices'=>$invoice]);
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
        $userSession = UserSessions::findOrFail($id);


        $request->validate([
            'discount'=>'required',
            'tax_amount' => 'required',

        ]);

        $percent = ($request->input('discount') * $userSession-> session_rate) / 100;
        $total = $userSession-> session_rate - $percent;
        //dd($total);
        $invoice = new Invoices();

        $invoice->invoices_no = $userSession->id;
        $invoice->user_sessions_id = $userSession->id;
        $invoice->from_date  = $userSession-> start_time;
        $invoice->to_date   = $userSession-> end_time;
        $invoice->amount   = $userSession-> session_rate;
        $invoice-> discount = $request->input('discount');
        $invoice->amount   = $userSession-> session_rate;
        $invoice->final_amount   = $total;
        $invoice-> tax_amount = $request->input('tax_amount');
        $invoice->total_payable_amount = $invoice->final_amount+$invoice->tax_amount+$invoice->discount;
        $invoice-> is_active = "YES";
        $invoice->save();$request->input('tax_amount')


        $userSession->is_invoiced ="YES";
        $userSession->save();

        return redirect(route('invoice.show',$invoice->id));
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
