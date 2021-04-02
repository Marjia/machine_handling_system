<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use App\Models\Machines;
use App\Models\TaggedUsersMachines;
use App\Models\User;
use App\Models\UserSessions;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class GenerateInvoicePdfController extends Controller
{
    public function invoices($id){
        $invoice = Invoices::findOrFail($id);

        $users=User::all();
        $userSession= UserSessions::findOrFail($invoice->user_sessions_id);
        $machines = Machines::all();
        $tag = TaggedUsersMachines::all();
        
        // return view('admin.invoices.createPdf',
        // ['invoice'=>$invoice,'users'=>$users,
        // 'usersession'=>$userSession,
        // 'machine'=>$machines,'tag'=>$tag]);

        $data = [
            'invoice' => $invoice,
            'users'=>$users,
            'usersession'=>$userSession,
            'machine'=>$machines,
            'tag'=>$tag
        ];
        $pdf = PDF::loadView('admin.invoices.createPdf',$data);

        return $pdf->download('machcinesystem.pdf');

    }
}
