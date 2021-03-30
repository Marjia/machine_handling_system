<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use App\Models\Machines;
use App\Models\TaggedUsersMachines;
use App\Models\User;
use App\Models\UserSessions;
use Illuminate\Http\Request;

class GenerateInvoicePdfController extends Controller
{
    public function invoices($id){
        $invoice = Invoices::findOrFail($id);
        
        return view('admin.invoices.createPdf',
        ['invoice'=>$invoice]);
    }
}
