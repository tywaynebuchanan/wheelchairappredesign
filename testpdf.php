<?Php
require("auth/auth.php");
$location = $_GET['location'];
$home = $_GET['home'];

    $sql="select * from tblresidentdata WHERE location1 = '$home'";
    // $count = mysqli_num_rows($sql);
    require('fpdf/fpdf.php');
    $pdf = new FPDF(); 
    $pdf->AddPage();
    
    $width_cell=array(20,50,40,40,40);
    $pdf->SetFont('Arial','B',16);
    
    //Background color of header//
    $pdf->SetFillColor(193,229,252);
    
    // Header starts /// 
    //First header column //
    // $pdf->Cell($width_cell[0],10,'ID',1,0,'C',true);
    //Second header column//
    $pdf->Cell($width_cell[1],10,'Firstname',1,0,'C',true);
    //Third header column//
    $pdf->Cell($width_cell[2],10,'Lastname',1,0,'C',true); 
    //Fourth header column//
    $pdf->Cell($width_cell[3],10,'Age',1,0,'C',true);
    //Third header column//
    $pdf->Cell($width_cell[4],10,'GENDER',1,1,'C',true); 
    //// header ends ///////
    
    $pdf->SetFont('Arial','',14);
    //Background color of header//
    $pdf->SetFillColor(235,236,236); 
    //to give alternate background fill color to rows// 
    $fill=false;
    
    /// each record is one row  ///
    foreach ($conn->query($sql) as $row) {
    // $pdf->Cell($width_cell[0],10,$row['id'],1,0,'C',$fill);
    $pdf->Cell($width_cell[1],10,$row['firstname'],1,0,'L',$fill);
    $pdf->Cell($width_cell[2],10,$row['lastname'],1,0,'C',$fill);
    $pdf->Cell($width_cell[3],10,$row['age'],1,0,'C',$fill);
    $pdf->Cell($width_cell[4],10,$row['gender'],1,1,'C',$fill);
    //to give alternate background fill  color to rows//
    $fill = !$fill;
    }

    /// end of records /// 
    
    $pdf->Output();


?>
