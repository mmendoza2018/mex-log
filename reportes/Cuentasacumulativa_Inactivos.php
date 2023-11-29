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
            $this->Cell(105,10,'REPORTE DE CUENTAS ACUMULATIVAS INACTIVAS',0,0,'C');

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
           require_once("../model/Cuentasacumulativa_model.php");
           require_once("../controller/Cuentasacumulativa_controller.php");
    }

    $objCuentasacumulativa = new Cuentasacumulativa();
    $listado = $objCuentasacumulativa->Listar_Cuentasacumulativa_Inactivos();

try {
    // Instanciation of inherited class
    $pdf = new PDF('L','mm',array(216,330));
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','',11);
    $pdf->SetFillColor(255,255,255);
    $pdf->Cell(30,5,'No.',0,0,'L',1);
    $pdf->Cell(34,5,'Codigo',0,0,'L',1);
    $pdf->Cell(88,5,'Nombre',0,0,'L',1);
    $pdf->Cell(22,5,'Nivel',0,0,'L',1);
    /*$pdf->Cell(35,5,'id tipo gasto',0,0,'L',1);*/
    $pdf->Cell(42,5,'Tipo gasto',0,0,'L',1);
    /*$pdf->Cell(35,5,'id atributo',0,0,'L',1);*/
    $pdf->Cell(95,5,'Atributo',0,0,'L',1);
    
   /* $pdf->Cell(22,5,'P. Venta',0,0,'C',1);
    $pdf->Cell(22,5,'Stock',0,0,'C',1);*/
    $pdf->Line(322,28,10,28);
    $pdf->Line(322,37,10,37);
    $pdf->Ln(9);
    $total = 0;

    if (is_array($listado) || is_object($listado))
    {
        foreach ($listado as $row => $column) {

            /*$nit = $column['concepto'];
            $telefono = $column['egreso'];

*/
            $pdf->setX(9);
            $pdf->Cell(30,5,$column["id_acumulativa"],0,0,'L',1);
            $pdf->Cell(35,5,$column["codigo_acumulativa"],0,0,'L',1);
            $pdf->Cell(90,5,$column["nombre"],0,0,'L',1);
            $pdf->Cell(22,5,$column["nivel"],0,0,'L',1);
           /* $pdf->Cell(60,5,$column["id_tipodegasto"],0,0,'L',1);*/
            $pdf->Cell(40,5,$column["nombre_tipodegasto"],0,0,'L',1);
            /*$pdf->Cell(30,5,$column["id_atributo"],0,0,'L',1);*/
            $pdf->Cell(70,5,$column["nombre_atributo"],0,0,'L',1);
            
            
            /*$pdf->Cell(22,5,$column["stock"],0,0,'C',1);*/
            $pdf->Ln(6);
            $get_Y = $pdf->GetY();
            $total = $total + 1;
        }

        $pdf->Line(322,$get_Y+1,10,$get_Y+1);
        $pdf->SetFont('Arial','B',11);
        $pdf->Text(10,$get_Y + 10,'TOTAL DE CUENTAS ACUMULATIVA INACTIVAS : '.number_format($total));
    }


    $pdf->Output('I','Clientes_Inativos.pdf');



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
