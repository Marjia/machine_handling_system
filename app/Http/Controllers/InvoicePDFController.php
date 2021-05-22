<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoices;

use Codedge\Fpdf\Fpdf\Fpdf ;

class InvoicePDFController extends Controller {
    private $pdf;
    //public function __construct(){}

    function Footer(){
        // Go to 1.5 cm from bottom
        $this->pdf->SetY(-20.5);
        // Select Arial italic 8
        $this->pdf->SetFont('Arial','I',8);
        // Print current and total page numbers
        $this->pdf->Cell(0,0,'Page '.$this->pdf->PageNo().'/{nb}',0,0,'C');

    }

    public function createPDF(Request $request){
        $this->pdf = new Fpdf();
        // This Create New Pdf page
        $this->pdf->AddPage('P', 'A4', 0);
        $this->Footer();
        $this->pdf->AliasNbPages();


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
        $this->pdf->Cell(45,5,'0222',1,0,'L');
        $this->pdf->Ln(0);

        $this->pdf->SetY(45);
        $this->pdf->SetX(118);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(32,10,'Billing Period','LRTB','L',false);
        $this->pdf->MultiCell(45,5,'2021-05-02 07:46:26 to 2021-05-06 13:09:07','LRTB','L',false);
        $this->pdf->Ln(0);

        $this->pdf->SetY(55);
        $this->pdf->SetX(118);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(32,5,'Invoice Generated',1,0,'L');
        //$this->pdf->SetFillColor(255,255,255);
        $this->pdf->MultiCell(45,5,'12/3/2021','LRTB','L',false);
        $this->pdf->Ln(0);

        $this->pdf->SetY(60);
        $this->pdf->SetX(118);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(32,5,'Due date',1,0,'L');
        $this->pdf->Cell(45,5,'12/4/2021',1,0,'L');

       //Billed to information

        $this->pdf->SetY(45);
        $this->pdf->SetX(14);
        $this->pdf->SetFont('Arial','B',11);
        $this->pdf->Cell(26,8,'Billed To: ',0,0,'L');

        $this->pdf->Ln(0);
        $this->pdf->SetY(51);
        $this->pdf->SetX(14);
        $this->pdf->SetFont('Arial','',11);
        $this->pdf->Cell(80,8,'Marco Orishini',0,0,'L');

        $this->pdf->Ln(0);
        $this->pdf->SetY(56);
        $this->pdf->SetX(14);
        $this->pdf->SetFont('Arial','',11);
        $this->pdf->Cell(80,8,'Bank account type',0,0,'L');

        $this->pdf->Ln(0);
        $this->pdf->SetY(61);
        $this->pdf->SetX(14);
        $this->pdf->SetFont('Arial','',11);
        $this->pdf->Cell(80,8,'example@gmail.com www.examplesite.com',0,0,'L');

        $this->pdf->Ln(0);
        $this->pdf->SetY(66);
        $this->pdf->SetX(14);
        $this->pdf->SetFont('Arial','',11);
        $this->pdf->Cell(18,8,'Address :',0,0,'L');
        $this->pdf->SetY(67);
        $this->pdf->SetX(32);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->MultiCell(75,6,'Mirpur DOHS, 11 Avenue-11 House #1188, Flat #A1',0,'L',false);

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
        $this->pdf->Cell(32,6,'M-12',1,0,'L');

        $this->pdf->Ln(0);

        $this->pdf->SetY(77);
        $this->pdf->SetX(118);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(45,6,'Expense Per session',1,0,'L');
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(32,6,'123.00',1,0,'L');
        $this->pdf->Ln(0);

        //invoice table

        $this->pdf->Ln(0);
        $this->pdf->SetY(91);
        $this->pdf->SetX(14);
        $this->pdf->SetFillColor(242,242,242);
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(30,8,'Session ID',1,0,'C',true);
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(30,8,'Base(AED)',1,0,'C',true);
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(30,8,'Discount %',1,0,'C',true);
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(30,8,'Taxable(AED)',1,0,'C',true);
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(30,8,'5% Tax',1,0,'C',true);
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(30,8,'Payable (AED)',1,0,'C',true);

// loop code

// dd($request->checkArr);
//   $arrayVar = $request->checkArr;
//   $len = count($arrayVar);
  $var = 99;
 for ($i=0; $i <24 ; $i++) {
//30

   //$invoice = Invoices::findOrFail(3);

  //echo $invoice

   // $this->pdf->Ln(0);
   // $this->pdf->SetY($var);
   // $this->pdf->SetX(14);
   // $this->pdf->SetFont('Arial','',11);
   // $this->pdf->Cell(30,5,$invoice->invoices_no,1,0,'C');
   // $this->pdf->SetFont('Arial','',11);
   // $this->pdf->Cell(30,5,$invoice->amount,1,0,'C');
   // $this->pdf->SetFont('Arial','',11);
   // $this->pdf->Cell(30,5,$invoice->discount,1,0,'C');
   // $this->pdf->SetFont('Arial','',11);
   // $this->pdf->Cell(30,5,$invoice->tax_amount,1,0,'C');
   // $this->pdf->SetFont('Arial','',11);
   // $this->pdf->Cell(30,5,'5% ',1,0,'C');
   // $this->pdf->SetFont('Arial','',11);
   // $this->pdf->Cell(30,5,$invoice->total_payable_amount,1,0,'C');

//   $varTest=104.00;
//
// $varStr = (st1ring)$varTest;
//dd($varStr);


   $this->pdf->Ln(0);
   $this->pdf->SetY($var);
   $this->pdf->SetX(14);
   $this->pdf->SetFont('Arial','',11);
   $this->pdf->Cell(30,5,23,1,0,'C');
   $this->pdf->SetFont('Arial','',11);
   $this->pdf->Cell(30,5,'111.00',1,0,'C');
   $this->pdf->SetFont('Arial','',11);
   $this->pdf->Cell(30,5,'6.00',1,0,'C');
   $this->pdf->SetFont('Arial','',11);
   $this->pdf->Cell(30,5,'104.34',1,0,'C');
   $this->pdf->SetFont('Arial','',11);
   $this->pdf->Cell(30,5,'5.22 ',1,0,'C');
   $this->pdf->SetFont('Arial','',11);
   $this->pdf->Cell(30,5,109.56,1,0,'C');

   if($i>=30){

     //$this->pdf->SetAutoPageBreak(25);
     $this->pdf->AddPage();
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
        $this->pdf->Cell(28,8,'ADCb Bank',0,0,'L');

        $this->pdf->Ln(0);
        $this->pdf->SetY($varY+10);
        $this->pdf->SetX(14);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(20,8,'Acount Title',0,0,'L');
        $this->pdf->Cell(4,8,':',0,0,'L');
        $this->pdf->Cell(28,8,'Cosomporo',0,0,'L');

        $this->pdf->Ln(0);
        $this->pdf->SetY($varY+15);
        $this->pdf->SetX(14);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(20,8,'Acount No',0,0,'L');
        $this->pdf->Cell(4,8,':',0,0,'L');
        $this->pdf->Cell(28,8,'# 24553617682',0,0,'L');

        $this->pdf->Ln(0);
        $this->pdf->SetY($varY+20);
        $this->pdf->SetX(14);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(20,8,'Swift Code',0,0,'L');
        $this->pdf->Cell(4,8,':',0,0,'L');
        $this->pdf->Cell(28,8,'# 3834792',0,0,'L');

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
        $this->pdf->Cell(41,6,'23',1,0,'L');

        $this->pdf->Ln(0);

        $this->pdf->SetY($varY+6);
        $this->pdf->SetX(120);
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(30,6,'Total amount','LTB',0,'L');
        $this->pdf->Cell(4,6,':','RTB',0,'L');
        $this->pdf->Cell(41,6,'976.00  BDT',1,0,'L');
        $this->pdf->Ln(0);

        $this->pdf->SetY($varY+12);
        $this->pdf->SetX(120);
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(30,6,'Total Discount','LTB',0,'L');
        $this->pdf->Cell(4,6,':','RTB',0,'L');
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->SetFillColor(255,255,255);
        $this->pdf->MultiCell(41,6,'144.00  BDT','LRTB','L',false);
        $this->pdf->Ln(0);

        $this->pdf->SetY($varY+18);
        $this->pdf->SetX(120);
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(30,6,'Total Taxable','LTB',0,'L');
        $this->pdf->Cell(4,6,':','RTB',0,'L');
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(41,6,'3045.00  BDT',1,0,'L');
        $this->pdf->Ln(0);

        $this->pdf->SetY($varY+24);
        $this->pdf->SetX(120);
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(30,6,'Tax Amount','LTB',0,'L');
        $this->pdf->Cell(4,6,':','RTB',0,'L');
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(41,6,'204.00  BDT',1,0,'L');
        $this->pdf->Ln(0);

        $this->pdf->SetY($varY+30);
        $this->pdf->SetX(120);
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(30,6,'Amount Payable','LTB',0,'L');
        $this->pdf->Cell(4,6,':','RTB',0,'L');
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(41,6,'405.00  BDT',1,0,'L');
        $this->pdf->Ln(40);

        //dd($this->pdf->GetY(),$varY+30,$this->pdf->GetPageheight());

        $this->pdf->Output('invoice_file.php', 'I');
        exit;
    }

}
