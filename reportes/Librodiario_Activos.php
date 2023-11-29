<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        if ($this->page == 1)
        {
            // Logo
            //  $this->Image('logo.png',10,6,30);
            // Arial bold 15
            $this->SetFont('Arial','B',15);
            // Move to the right
            $this->Cell(105);
            // Title
            $this->Cell(105,10,'REPORTE DE LIBRO DIARIO MOVIMIENTOS ACTIVOS',0,0,'C');

            // Line break
            $this->Ln(20);
        }
    }

// Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(275,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'L');
        $this->Cell(43.2,10,date('d/m/Y H:i:s'),0,0,'C');
    }
}

    function __autoload($className){
            $model = "../model/". $className ."_model.php";
            $controller = "../controller/". $className ."_controller.php";

           /*require_once($model);
           require_once($controller);*/
           require_once("../model/Librodiario_model.php");
           require_once("../controller/Librodiario_controller.php");
    }

    $objLibrodiario = new Librodiario();
    $listado = $objLibrodiario->Listar_Librodiario_Activos();

try {
    // Instanciation of inherited class
    $pdf = new PDF('L','mm',array(216,330));
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','',11);
    $pdf->SetFillColor(255,255,255);
    $pdf->Cell(15,5,'No.',0,0,'L',1);
    $pdf->Cell(34,5,'Fecha',0,0,'L',1);
    $pdf->Cell(76,5,'Cuenta de registro',0,0,'L',1);
    $pdf->Cell(33,5,'Ingreso',0,0,'L',1);
    $pdf->Cell(20,5,'Egreso',0,0,'L',1);
    $pdf->Cell(40,5,'Saldo',0,0,'C',1);
    $pdf->Cell(60,5,'Cuenta acumulativa',0,0,'C',1);
  /*  $pdf->Cell(22,5,'Stock',0,0,'C',1);*/
    $pdf->Line(322,28,10,28);
    $pdf->Line(322,37,10,37);
    $pdf->Ln(9);
    $total = 0;

    if (is_array($listado) || is_object($listado))
    {
        foreach ($listado as $row => $column) {

            $nombre_cuentaderegistro = $column['nombre_cuentaderegistro'];
            

            $pdf->setX(9);
            $pdf->Cell(15,5,$column["id_librodiario"],0,0,'L',1);
            $pdf->Cell(35,5,$column["fecha"],0,0,'L',1);
            $pdf->Cell(70,5,$nombre_cuentaderegistro,0,0,'L',1);
            $pdf->Cell(30,5,$column["ingreso"],0,0,'C',1);
            $pdf->Cell(33,5,$column["egreso"],0,0,'C',1);
            $pdf->Cell(27,5,$column["saldo"],0,0,'C',1);
            $pdf->Cell(60,5,$column["nombre_cuentaacumulativa"],0,0,'C',1);
            /*$pdf->Cell(22,5,$column["stock"],0,0,'C',1);*/
            $pdf->Ln(6);
            $get_Y = $pdf->GetY();
            $total = $total + 1;
        }

        $pdf->Line(322,$get_Y+1,10,$get_Y+1);
        $pdf->SetFont('Arial','B',11);
        $pdf->Text(10,$get_Y + 10,'TOTAL DE MOVIMIENTOS ACTIVOS : '.number_format($total));
    }


    $pdf->Output('I','Librodiario_Activos.pdf');



} catch (Exception $e) {

    // Instanciation of inherited class
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L','Letter');
    $pdf->Text(50,50,'ERROR AL IMPRIMIR');
    $pdf->SetFont('Times','',12);
    $pdf->Output();

}

?>
