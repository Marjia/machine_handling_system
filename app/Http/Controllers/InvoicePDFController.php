<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf ;
class InvoicePDFController extends Controller
{
    private $pdf;
    public function __construct()
    {
    }
    public function createPDF()
    {
        $this->pdf = new Fpdf;
// This Create New Pdf page
        $this->pdf->AliasNbPages();
        $this->pdf->AddPage('P', 'A4', 0);
// This function is for header
//         $this->pdf->tableTop();
// // This function is body
//         $this->pdf->headerTable();
//         $this->pdf->viewTable();

        //header and logo

        //$this->pdf->SetFont(float);
        $this->pdf->SetFont('Arial','B',10);

        $this->pdf->SetY(5);
        $this->pdf->SetX(23);

        $this->pdf->SetFillColor(0,0,0);
        $this->pdf->SetTextColor(255,255,255);
        $this->pdf->MultiCell(33,5,'Machine Handling System',1,'C',true);
        $this->pdf->Ln(0);

        $this->pdf->SetFont('Arial','',9);
        $this->pdf->SetY(5);
        $this->pdf->SetX(58);
        $this->pdf->SetTextColor(0,0,0);
        //cell(width,height,text,border,end line,align)
        $this->pdf->Cell(100,6,'Mirpur DOHS, 11 Avenue-11 House #1188, Flat #A1',0,0,'L');
        $this->pdf->SetY(10);
        $this->pdf->SetX(58);
        $this->pdf->Cell(100,6,'info@kazispin.com https://kazispin.com +8801404040575',0,0,'L');
        $this->pdf->Ln(20);

        //title cell

        $this->pdf->SetY(20);
        $this->pdf->SetX(28);
        $this->pdf->SetFont('Arial','B',15);
        $this->pdf->Cell(150,10,'Session Invoice',0,0,'C');

        //invoice information

        $this->pdf->SetY(35);
        $this->pdf->SetX(125);
        $this->pdf->SetFont('Arial','',9);
        $this->pdf->Cell(26,6,'Invoice No:',1,0,'L');
        $this->pdf->SetFont('Arial','',9);
        $this->pdf->Cell(40,6,'0222',1,0,'L');

        $this->pdf->Ln(0);

        $this->pdf->SetY(41);
        $this->pdf->SetX(125);
        $this->pdf->SetFont('Arial','',9);
        $this->pdf->Cell(26,6,'Tracking No:',1,0,'L');
        $this->pdf->SetFont('Arial','',9);
        $this->pdf->Cell(40,6,'0222',1,0,'L');
        $this->pdf->Ln(0);

        $this->pdf->SetY(47);
        $this->pdf->SetX(125);
        $this->pdf->SetFont('Arial','',9);
        $this->pdf->Cell(26,6,'Billing Period:',1,0,'L');
        $this->pdf->SetFont('Arial','',9);
        $this->pdf->SetFillColor(255,255,255);
        $this->pdf->MultiCell(40,6,'0222','LRTB','L',false);
        $this->pdf->Ln(0);

        $this->pdf->SetY(53);
        $this->pdf->SetX(125);
        $this->pdf->SetFont('Arial','',9);
        $this->pdf->Cell(26,6,'Email:',1,0,'L');
        $this->pdf->SetFont('Arial','',9);
        $this->pdf->Cell(40,6,'example@gmail.com',1,0,'L');

       //Billed to information

        $this->pdf->SetY(71);
        $this->pdf->SetX(23);
        $this->pdf->SetFont('Arial','B',10);
        $this->pdf->Cell(26,8,'Billed To: ',0,0,'L');

        $this->pdf->Ln(0);
        $this->pdf->SetY(77);
        $this->pdf->SetX(23);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(80,8,'Marco Orishini',0,0,'L');

        $this->pdf->Ln(0);
        $this->pdf->SetY(82);
        $this->pdf->SetX(23);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(80,8,'Bank account type',0,0,'L');

        $this->pdf->Ln(0);
        $this->pdf->SetY(87);
        $this->pdf->SetX(23);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(80,8,'example@gmail.com www.examplesite.com',0,0,'L');

        $this->pdf->Ln(0);
        $this->pdf->SetY(92);
        $this->pdf->SetX(23);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(16,8,'Address :',0,0,'L');
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(80,8,'Mirpur DOHS, 11 Avenue-11 House #1188, Flat #A1',0,0,'L');

        $this->pdf->Ln(0);
        $this->pdf->SetY(97);
        $this->pdf->SetX(23);
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(16,8,'Contact :',0,0,'L');
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(80,8,'01987754632',0,0,'L');

        //Machine information

        $this->pdf->SetY(65);
        $this->pdf->SetX(125);
        $this->pdf->SetFont('Arial','',9);
        $this->pdf->Cell(36,6,'Machine No:',1,0,'L');
        $this->pdf->SetFont('Arial','',9);
        $this->pdf->Cell(30,6,'M-12',1,0,'L');

        $this->pdf->Ln(0);

        $this->pdf->SetY(71);
        $this->pdf->SetX(125);
        $this->pdf->SetFont('Arial','',9);
        $this->pdf->Cell(36,6,'Expense Per session:',1,0,'L');
        $this->pdf->SetFont('Arial','',9);
        $this->pdf->Cell(30,6,'123.00',1,0,'L');
        $this->pdf->Ln(0);

        //invoice table

        $this->pdf->Ln(0);
        $this->pdf->SetY(115);
        $this->pdf->SetX(25);
        $this->pdf->SetFillColor(242,242,242);
        $this->pdf->SetFont('Arial','B',9);
        $this->pdf->Cell(28,8,'Session ID',1,0,'C',true);
        $this->pdf->SetFont('Arial','B',9);
        $this->pdf->Cell(28,8,'Session Rate',1,0,'C',true);
        $this->pdf->SetFont('Arial','B',9);
        $this->pdf->Cell(28,8,'Discount',1,0,'C',true);
        $this->pdf->SetFont('Arial','B',9);
        $this->pdf->Cell(28,8,'Taxable',1,0,'C',true);
        $this->pdf->SetFont('Arial','B',9);
        $this->pdf->Cell(28,8,'5% Tax',1,0,'C',true);
        $this->pdf->SetFont('Arial','B',9);
        $this->pdf->Cell(28,8,'Grandtotal',1,0,'C',true);

// loop code
  $var = 123;
 for ($i=0; $i <8 ; $i++) {

   $this->pdf->Ln(0);
   $this->pdf->SetY($var);
   $this->pdf->SetX(25);
   $this->pdf->SetFont('Arial','',9);
   $this->pdf->Cell(28,5,'12',1,0,'C');
   $this->pdf->SetFont('Arial','',9);
   $this->pdf->Cell(28,5,'122',1,0,'C');
   $this->pdf->SetFont('Arial','',9);
   $this->pdf->Cell(28,5,'10%',1,0,'C');
   $this->pdf->SetFont('Arial','',9);
   $this->pdf->Cell(28,5,'42.00',1,0,'C');
   $this->pdf->SetFont('Arial','',9);
   $this->pdf->Cell(28,5,'5% ',1,0,'C');
   $this->pdf->SetFont('Arial','',9);
   $this->pdf->Cell(28,5,'243.00',1,0,'C');

   $var =$var+5;

 }

 //dd($var);
        // $this->pdf->Ln(0);
        // $this->pdf->SetY(123);
        // $this->pdf->SetX(25);
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'12',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'122',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'10%',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'42.00',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'5% ',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'243.00',1,0,'C');
        //
        // $this->pdf->Ln(0);
        // $this->pdf->SetY(128);
        // $this->pdf->SetX(25);
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'15',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'122',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'10%',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'42.00',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'5% ',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'243.00',1,0,'C');
        //
        // $this->pdf->Ln(0);
        // $this->pdf->SetY(133);
        // $this->pdf->SetX(25);
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'20',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'122',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'10%',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'42.00',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'5% ',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'243.00',1,0,'C');
        //
        // $this->pdf->Ln(0);
        // $this->pdf->SetY(138);
        // $this->pdf->SetX(25);
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'23',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'122',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'10%',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'42.00',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'5% ',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'243.00',1,0,'C');
        //
        //
        // $this->pdf->Ln(0);
        // $this->pdf->SetY(143);
        // $this->pdf->SetX(25);
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'28',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'122',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'10%',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'42.00',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'5% ',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'243.00',1,0,'C');
        //
        // $this->pdf->Ln(0);
        // $this->pdf->SetY(148);
        // $this->pdf->SetX(25);
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'30',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'122',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'10%',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'42.00',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'5% ',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'243.00',1,0,'C');
        //
        // $this->pdf->Ln(0);
        // $this->pdf->SetY(153);
        // $this->pdf->SetX(25);
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'33',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'122',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'10%',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'42.00',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'5% ',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'243.00',1,0,'C');
        //
        // $this->pdf->Ln(0);
        // $this->pdf->SetY(158);
        // $this->pdf->SetX(25);
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'39',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'122',1,0,'C');
        // $this->pdf->Cell(28,5,'10%',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'42.00',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'5% ',1,0,'C');
        // $this->pdf->SetFont('Arial','',9);
        // $this->pdf->Cell(28,5,'243.00',1,0,'C');
//Banking Detail

$varY = $var+20;
        $this->pdf->Ln(0);
        $this->pdf->SetY($varY);
        $this->pdf->SetX(25);
        $this->pdf->SetFont('Arial','B',9);
        $this->pdf->Cell(24,8,'Banking Details:',0,0,'L');

        $this->pdf->Ln(0);
        $this->pdf->SetY($varY+5);
        $this->pdf->SetX(25);
        $this->pdf->SetFont('Arial','',9);
        $this->pdf->Cell(13,8,'Bank:',0,0,'L');
        $this->pdf->Cell(28,8,'ADCb Bank',0,0,'L');

        $this->pdf->Ln(0);
        $this->pdf->SetY($varY+10);
        $this->pdf->SetX(25);
        $this->pdf->SetFont('Arial','',9);
        $this->pdf->Cell(18,8,'Acount Title:',0,0,'L');
        $this->pdf->Cell(28,8,'Cosomporo',0,0,'L');

        $this->pdf->Ln(0);
        $this->pdf->SetY($varY+15);
        $this->pdf->SetX(25);
        $this->pdf->SetFont('Arial','',9);
        $this->pdf->Cell(17,8,'Acount No:',0,0,'L');
        $this->pdf->Cell(28,8,'# 24553617682',0,0,'L');

        $this->pdf->Ln(0);
        $this->pdf->SetY($varY+20);
        $this->pdf->SetX(25);
        $this->pdf->SetFont('Arial','',9);
        $this->pdf->Cell(17,8,'Swift Code:',0,0,'L');
        $this->pdf->Cell(28,8,'# 3834792',0,0,'L');

        $this->pdf->Ln(0);
        $this->pdf->SetY($varY+25);
        $this->pdf->SetX(25);
        $this->pdf->SetFont('Arial','',9);
        $this->pdf->Cell(13,8,'Branch:',0,0,'L');
        $this->pdf->Cell(28,8,'Dhaka',0,0,'L');

        //grand total information

        $this->pdf->SetY(193);
        $this->pdf->SetX(125);
        $this->pdf->SetFont('Arial','',9);
        $this->pdf->Cell(26,6,'Total Session:',1,0,'L');
        $this->pdf->SetFont('Arial','',9);
        $this->pdf->Cell(40,6,'08',1,0,'L');

        $this->pdf->Ln(0);

        $this->pdf->SetY(199);
        $this->pdf->SetX(125);
        $this->pdf->SetFont('Arial','',9);
        $this->pdf->Cell(26,6,'Total amount:',1,0,'L');
        $this->pdf->SetFont('Arial','',9);
        $this->pdf->Cell(40,6,'976.00 AED',1,0,'L');
        $this->pdf->Ln(0);

        $this->pdf->SetY(205);
        $this->pdf->SetX(125);
        $this->pdf->SetFont('Arial','',9);
        $this->pdf->Cell(26,6,'Total Discount:',1,0,'L');
        $this->pdf->SetFont('Arial','',9);
        $this->pdf->SetFillColor(255,255,255);
        $this->pdf->MultiCell(40,6,'144.00 AED','LRTB','L',false);
        $this->pdf->Ln(0);

        $this->pdf->SetY(211);
        $this->pdf->SetX(125);
        $this->pdf->SetFont('Arial','',9);
        $this->pdf->Cell(26,6,'Total Taxable:',1,0,'L');
        $this->pdf->SetFont('Arial','',9);
        $this->pdf->Cell(40,6,'3045.00 AED',1,0,'L');
        $this->pdf->Ln(0);

        $this->pdf->SetY(217);
        $this->pdf->SetX(125);
        $this->pdf->SetFont('Arial','',9);
        $this->pdf->Cell(26,6,'Tax Amount:',1,0,'L');
        $this->pdf->SetFont('Arial','',9);
        $this->pdf->Cell(40,6,'204.00 AED',1,0,'L');
        $this->pdf->Ln(0);

        $this->pdf->SetY(223);
        $this->pdf->SetX(125);
        $this->pdf->SetFont('Arial','',9);
        $this->pdf->Cell(26,6,'Amount Payable:',1,0,'L');
        $this->pdf->SetFont('Arial','',9);
        $this->pdf->Cell(40,6,'405.00 AED',1,0,'L');
        $this->pdf->Ln(0);

        $this->pdf->Output('invoice_file.php', 'I');
        exit;
    }

}
