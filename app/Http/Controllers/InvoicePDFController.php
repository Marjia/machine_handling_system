<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoices;
use App\Models\Machines;
use App\Models\TaggedUsersMachines;
use App\Models\User;
use App\Models\UserSessions;
use Codedge\Fpdf\Fpdf\Fpdf ;
use Carbon\Carbon;

class InvoicePDFController extends Controller {
    private $pdf;
    //public function __construct(){}

    function Header(){
      //header and logo
       $this->pdf->SetFont('Arial','B',10);
       $this->pdf->SetY(10);
       $this->pdf->SetX(23);
       $this->pdf->SetFillColor(0,0,0);
       $this->pdf->SetTextColor(255,255,255);
       $this->pdf->MultiCell(39,8,'Machine Handling System',0,'C',true);
       $this->pdf->Ln(1);

      $this->pdf->SetFont('Arial','',10.5);
      $this->pdf->SetY(12);
      $this->pdf->SetX(66);
      $this->pdf->SetTextColor(0,0,0);
      //cell(width,height,text,border,end line,align)
      $this->pdf->Cell(100,6,'Mirpur DOHS, 11 Avenue-11 House #1188, Flat #A1',0,0,'L');
      $this->pdf->SetY(19);
      $this->pdf->SetX(66);
      $this->pdf->Cell(100,6,'info@kazispin.com https://kazispin.com +8801404040575',0,0,'L');
      $this->pdf->Ln(20);
      }

    function Footer(){
        // Go to 1.5 cm from bottom
        $this->pdf->SetY(-20.5);
        // Select Arial italic 8
        $this->pdf->SetFont('Arial','I',8);
        // Print current and total page numbers
        $this->pdf->Cell(0,0,'Page '.$this->pdf->PageNo().'/{nb}',0,0,'C');

    }

    public function createPDF($id){

    $invoiceInput = Invoices::findOrFail($id);
    $invoices = Invoices::where('invoices_no',$invoiceInput->invoices_no)->get();
    $len = count($invoices);
  //  dd($invoices);

      // if($request->checkArr==NULL){
      //   return back()->with('error','select to create invoice');
      // }
      // else {


        //$invoice = Invoices::findOrFail($var)->first();
        //dd($invoice);
       $startDateTimeStr = $invoices[0]->from_date;
       $start_time = Carbon::parse($startDateTimeStr)->format('D, jS F Y');

       $endDateTimeStr = $invoices[$len-1]->to_date;
      $end_time = Carbon::parse($endDateTimeStr)->format('D, jS F Y');

      $created_time = $invoices[0]->created_at;
      $created = Carbon::parse($created_time)->format('D, jS F Y');

      $lastDateStr = $invoices[$len-1]->created_at;
      $createdDate = Carbon::parse($lastDateStr);

      $addedDate =  $createdDate->addDay(5);//->format('D, jS F Y');
      //dd(strtotime($addedDate)->addDay(2));
      //dd($createdDate->format('D, jS F Y'));
      $weekDay = date('D',strtotime($addedDate));
      if($weekDay == "Fri")
      {
        $lastDate = $addedDate->addDay(2)->format('D, jS F Y');
       // dd($lastDate);
      }
      if($weekDay == "Sat")
      {
        $lastDate = $addedDate->addDay(1)->format('D, jS F Y');
        //dd($lastDate);
      }
      else {
        $lastDate = $addedDate->format('D, jS F Y');
      }


      // dd($lastDate);

        // $invoices = Invoices::where('id',$var)
        //            ->join('user_sessions','user_sessions.id','=','invoices.user_sessions_id')
        //            ->select(['invoices.id','invoices.amount','invoices.invoices_no','invoices.user_sessions_id','user_sessions.start_time',
        //            'user_sessions.end_time','user_sessions.tagged_users_machines_id',
        //            'user_sessions.is_invoiced'])
        //            ->get();
        //            // ->where('end_time',"!=",'NULL')
        //            //->orderBy('user_sessions.tagged_users_machines_id','asc')
        //            //->orderBy('users.name', 'asc')
        //            //->get();
        // dd($invoices);

        $userSession = UserSessions::findOrFail($invoiceInput->user_sessions_id);
//dd($userSession);
        $user = User::findOrFail($userSession->user_id);
//dd($user->name);
        $taggedUser = TaggedUsersMachines::findOrFail($userSession->tagged_users_machines_id);

        $machine = Machines::findOrFail($taggedUser->machine_id);
//dd($machine);
    //    for ($j=0; $j < $len && $terminate == 0; $j++) {





        $this->pdf = new Fpdf();
        // This Create New Pdf page
        $this->pdf->AddPage('P', 'A4', 0);
        $this->Header();
        $this->Footer();
        $this->pdf->AliasNbPages();

        //title cell

        $this->pdf->SetY(28);
        $this->pdf->SetX(28);
        $this->pdf->SetFont('Arial','B',16);
        $this->pdf->Cell(150,11,'Tax Invoice',0,0,'C');

        //invoice information

        $this->pdf->SetY(40);
        $this->pdf->SetX(118);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(32,5,'Invoice No',1,0,'L');
        $this->pdf->Cell(45,5,$invoiceInput->invoices_no,1,0,'L');
        $this->pdf->Ln(0);

        $this->pdf->SetY(45);
        $this->pdf->SetX(118);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(32,10,'Billing Period','LRTB','L',false);
        $this->pdf->MultiCell(45,5,$start_time.' to '.$end_time,'LRTB','L',false);
        $this->pdf->Ln(0);

        $this->pdf->SetY(55);
        $this->pdf->SetX(118);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(32,5,'Invoice Generated',1,0,'L');
        //$this->pdf->SetFillColor(255,255,255);
        $this->pdf->MultiCell(45,5,$created,'LRTB','L',false);
        $this->pdf->Ln(0);

        $this->pdf->SetY(60);
        $this->pdf->SetX(118);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(32,5,'Due date',1,0,'L');
        $this->pdf->Cell(45,5,$lastDate,1,0,'L');

       //Billed to information

        $this->pdf->SetY(45);
        $this->pdf->SetX(14);
        $this->pdf->SetFont('Arial','B',11);
        $this->pdf->Cell(26,8,'Billed To: ',0,0,'L');

        $this->pdf->Ln(0);
        $this->pdf->SetY(51);
        $this->pdf->SetX(14);
        $this->pdf->SetFont('Arial','',11);
        $this->pdf->Cell(80,8,ucwords($user->name),0,0,'L');

        $this->pdf->Ln(0);
        $this->pdf->SetY(56);
        $this->pdf->SetX(14);
        $this->pdf->SetFont('Arial','',11);
        $this->pdf->Cell(80,8,$user->bank_account_type,0,0,'L');

        $this->pdf->Ln(0);
        $this->pdf->SetY(61);
        $this->pdf->SetX(14);
        $this->pdf->SetFont('Arial','',11);
        $this->pdf->Cell(80,8,$user->email.'  '.$user->web_site,0,0,'L');

        $this->pdf->Ln(0);
        $this->pdf->SetY(66);
        $this->pdf->SetX(14);
        $this->pdf->SetFont('Arial','',11);
        $this->pdf->Cell(18,8,'Address :',0,0,'L');
        $this->pdf->SetY(67);
        $this->pdf->SetX(32);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->MultiCell(75,6,$user->address,0,'L',false);

      //  'Mirpur DOHS, 11 Avenue-11 House #1188, Flat #A1'

        $this->pdf->Ln(0);
        $this->pdf->SetY(78);
        $this->pdf->SetX(14);
        $this->pdf->SetFont('Arial','',11);
        $this->pdf->Cell(16,8,'Contact :',0,0,'L');
        $this->pdf->SetFont('Arial','',11);
        $this->pdf->Cell(80,8,'01987754632',0,0,'L');

        //Machine information

        $this->pdf->SetY(71);
        $this->pdf->SetX(118);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(45,6,'Machine No',1,0,'L');
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(32,6,$machine->machine_no,1,0,'L');

        $this->pdf->Ln(0);

        $this->pdf->SetY(77);
        $this->pdf->SetX(118);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(45,6,'Expense Per session',1,0,'L');
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(32,6,$taggedUser->hourly_session_charge,1,0,'L');
        $this->pdf->Ln(0);

        //invoice table

        $this->pdf->Ln(0);
        $this->pdf->SetY(91);
        $this->pdf->SetX(14);
        $this->pdf->SetFillColor(242,242,242);
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(30,8,'Session ID',1,0,'C',true);
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(30,8,'Base',1,0,'C',true);
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(30,8,'Discount %',1,0,'C',true);
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(30,8,'Taxable',1,0,'C',true);
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(30,8,'5% Tax',1,0,'C',true);
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(30,8,'Payable ',1,0,'C',true);
//
// // loop code
//
// // dd($request->checkArr);
  // $arrayVar = $request->checkArr;
  // $len = count($arrayVar);
   $var = 99;

   $grandAmount = 0;
   $grandDiscount = 0;
   $grandTaxable = 0;
   $grandPercentTax = 0;
   $grandPayable = 0;
 for ($i=0; $i <$len ; $i++) {
//30

   //$invoice = Invoices::findOrFail($arrayVar[$i]);

  //echo $invoice;

   $this->pdf->Ln(0);
   $this->pdf->SetY($var);
   $this->pdf->SetX(14);
   $this->pdf->SetFont('Arial','',11);
   $this->pdf->Cell(30,5,$invoices[$i]->user_sessions_id,1,0,'C');
   $this->pdf->SetFont('Arial','',11);
   $this->pdf->Cell(30,5,$invoices[$i]->amount,1,0,'C');
   $this->pdf->SetFont('Arial','',11);
   $this->pdf->Cell(30,5,$invoices[$i]->discount.'%',1,0,'C');
   $this->pdf->SetFont('Arial','',11);
   $this->pdf->Cell(30,5,$invoices[$i]->tax_amount,1,0,'C');
   $this->pdf->SetFont('Arial','',11);
   $this->pdf->Cell(30,5,'5% ',1,0,'C');
   $this->pdf->SetFont('Arial','',11);
   $this->pdf->Cell(30,5,$invoices[$i]->total_payable_amount,1,0,'C');


   $grandAmount = $invoices[$i]->amount + $grandAmount;
   $grandDiscount = $invoices[$i]->discount + $grandDiscount;
   $grandTaxable = $invoices[$i]->tax_amount + $grandTaxable;
   $grandPercentTax = 5 + $grandPercentTax;
   $grandPayable = $invoices[$i]->total_payable_amount + $grandPayable;
   $currency = $invoices[$i]->currency;

//   $varTest=104.00;
//
// $varStr = (st1ring)$varTest;
//dd($varStr);


   // $this->pdf->Ln(0);
   // $this->pdf->SetY($var);
   // $this->pdf->SetX(14);
   // $this->pdf->SetFont('Arial','',11);
   // $this->pdf->Cell(30,5,23,1,0,'C');
   // $this->pdf->SetFont('Arial','',11);
   // $this->pdf->Cell(30,5,'111.00',1,0,'C');
   // $this->pdf->SetFont('Arial','',11);
   // $this->pdf->Cell(30,5,'6.00',1,0,'C');
   // $this->pdf->SetFont('Arial','',11);
   // $this->pdf->Cell(30,5,'104.34',1,0,'C');
   // $this->pdf->SetFont('Arial','',11);
   // $this->pdf->Cell(30,5,'5.22 ',1,0,'C');
   // $this->pdf->SetFont('Arial','',11);
   // $this->pdf->Cell(30,5,109.56,1,0,'C');

   if($var>=$this->pdf->GetPageheight()-30 ){

     //$this->pdf->SetAutoPageBreak(true);
     $this->pdf->AddPage();
     $this->Header();
     $this->Footer();
     $var=19+15;
   }


   $var =$var+5;

 }


//Banking Detail


$varY = $var+10;
        $this->pdf->Ln(0);
        $this->pdf->SetY($varY);
        $this->pdf->SetX(14);
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(24,8,'Banking Details:',0,0,'L');

        $this->pdf->Ln(0);
        $this->pdf->SetY($varY+5);
        $this->pdf->SetX(14);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(20,8,'Bank',0,0,'L');
        $this->pdf->Cell(4,8,':',0,0,'L');
        $this->pdf->Cell(28,8,'ADCB Bank',0,0,'L');

        $this->pdf->Ln(0);
        $this->pdf->SetY($varY+10);
        $this->pdf->SetX(14);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(20,8,'Acount Title',0,0,'L');
        $this->pdf->Cell(4,8,':',0,0,'L');
        $this->pdf->Cell(28,8,'cosmoprome',0,0,'L');

        $this->pdf->Ln(0);
        $this->pdf->SetY($varY+15);
        $this->pdf->SetX(14);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(20,8,'Acount No',0,0,'L');
        $this->pdf->Cell(4,8,':',0,0,'L');
        $this->pdf->Cell(28,8,'# 242980980',0,0,'L');

        $this->pdf->Ln(0);
        $this->pdf->SetY($varY+20);
        $this->pdf->SetX(14);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(20,8,'Swift Code',0,0,'L');
        $this->pdf->Cell(4,8,':',0,0,'L');
        $this->pdf->Cell(28,8,'# weqeq980',0,0,'L');

        $this->pdf->Ln(0);
        $this->pdf->SetY($varY+25);
        $this->pdf->SetX(14);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(20,8,'Branch',0,0,'L');
        $this->pdf->Cell(4,8,':',0,0,'L');
        $this->pdf->Cell(28,8,'Dhaka',0,0,'L');

        //grand total information

        $this->pdf->SetY($varY);
        $this->pdf->SetX(120);
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(30,6,'Total Session','LTB',0,'L');
        $this->pdf->Cell(4,6,':','RTB',0,'L');
        $this->pdf->Cell(41,6,$len,1,0,'L');

        $this->pdf->Ln(0);

        $this->pdf->SetY($varY+6);
        $this->pdf->SetX(120);
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(30,6,'Total amount','LTB',0,'L');
        $this->pdf->Cell(4,6,':','RTB',0,'L');
        $this->pdf->Cell(41,6,$grandAmount.'  '.$currency,1,0,'L');
        $this->pdf->Ln(0);

        $this->pdf->SetY($varY+12);
        $this->pdf->SetX(120);
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(30,6,'Total Discount','LTB',0,'L');
        $this->pdf->Cell(4,6,':','RTB',0,'L');
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->SetFillColor(255,255,255);
        $this->pdf->MultiCell(41,6,$grandDiscount.'  '.$currency,'LRTB','L',false);
        $this->pdf->Ln(0);

        $this->pdf->SetY($varY+18);
        $this->pdf->SetX(120);
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(30,6,'Total Taxable','LTB',0,'L');
        $this->pdf->Cell(4,6,':','RTB',0,'L');
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(41,6,$grandTaxable.'  '.$currency,1,0,'L');
        $this->pdf->Ln(0);

        $this->pdf->SetY($varY+24);
        $this->pdf->SetX(120);
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(30,6,'Tax Amount','LTB',0,'L');
        $this->pdf->Cell(4,6,':','RTB',0,'L');
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(41,6,$grandPercentTax.'  '.$currency,1,0,'L');
        $this->pdf->Ln(0);

        $this->pdf->SetY($varY+30);
        $this->pdf->SetX(120);
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(30,6,'Amount Payable','LTB',0,'L');
        $this->pdf->Cell(4,6,':','RTB',0,'L');
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(41,6,$grandPayable.'  '.$currency,1,0,'L');
        $this->pdf->Ln(40);

    //    dd($this->pdf->GetY(),$this->pdf->GetPageheight());

        $this->pdf->Output('invoice_file.php', 'I');
        exit;
      //}
  //  }

}
}
