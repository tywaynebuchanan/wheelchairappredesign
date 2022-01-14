<?Php
require("auth/auth.php");
$location = $_GET['location'];
$home = $_GET['home'];

    $sql="select * from tblresidentdata WHERE location1 = '$home' ORDER By firstname ASC";
    // $count = mysqli_num_rows($sql);
    require('fpdf/fpdf.php');
    $pdf = new FPDF(); 
    // $pdf->setMargins(20,20, 11.7);
    $pdf->AddPage();
    // $pdf->Image('images/logo.png',5,70,33.78);
    // $pdf->Cell(100, 100, 'TITLE');
    
    $width_cell=array(10,35,35,15,25,25,25);
    $pdf->SetFont('Arial','B',14);
    
    //Background color of header//
    $pdf->SetFillColor(193,229,252);
    
    // Header starts /// 
    
    //First header column //
    // $pdf->Cell($width_cell[0],10,'ID',1,0,'C',true);
    //Second header column//
    $pdf->Cell($width_cell[1],8,'Firstname',1,0,'C',true);
    //Third header column//
    $pdf->Cell($width_cell[2],8,'Lastname',1,0,'C',true); 
    //Fourth header column//
    $pdf->Cell($width_cell[3],8,'Age',1,0,'C',true);
    //Third header column//
    $pdf->Cell($width_cell[4],8,'Gender',1,0,'C',true); 

    $pdf->Cell($width_cell[5],8,'Parish',1,0,'C',true); 
    $pdf->Cell($width_cell[5],8,'D.O.A',1,0,'C',true); 

    $pdf->Cell($width_cell[5],8,'F.P.O',1,1,'C',true); 
    //// header ends ///////
    
    $pdf->SetFont('Arial','',12);
    //Background color of header//
    $pdf->SetFillColor(235,236,236); 
    //to give alternate background fill color to rows// 
    $fill=false;
    
    /// each record is one row  ///
    foreach ($conn->query($sql) as $row) {
    // $pdf->Cell($width_cell[0],10,$row['id'],1,0,'C',$fill);
    $pdf->Cell($width_cell[1],8,$row['firstname'],1,0,'C',$fill);
    $pdf->Cell($width_cell[2],8,$row['lastname'],1,0,'C',$fill);
    $pdf->Cell($width_cell[3],8,$row['age'],1,0,'C',$fill);
    $pdf->Cell($width_cell[4],8,$row['gender'],1,0,'C',$fill);
    $pdf->Cell($width_cell[5],8,$row['parish'],1,0,'C',$fill);
    $pdf->Cell($width_cell[6],8,$row['doa'],1,0,'C',$fill);
    $pdf->Cell($width_cell[6],8,$row['fpo'],1,1,'C',$fill);
    //to give alternate background fill  color to rows//
    $fill = !$fill;
    }

    /// end of records /// 
    
    $pdf->Output();


?>
