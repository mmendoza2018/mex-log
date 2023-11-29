<?php

require __DIR__.'./vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

include "conexion/dbOKJCV.php";
include "conexion/php_conexionOKJCV.php";

 
// jcv trae el otro archivo el de la factura
ob_start(); //buffer para que acepte recoger lo que hay en el archivo html en este caso: factura_html porque en realidad tenemos un archivo php ahi se captura ese archivos
require 'factura_html.php'; 
$html  = ob_get_clean(); // JCV EN TESTA VARIABLE A TRAVÉS DE ESTE METODO SE GUARDA EL CONTENIDO DEL ARHIVO PARA PODER SACARLOS

$html2pdf = new HTML2PDF('P', 'A4', 'es', true, 'UTF-8');
//$html2pdf->setTestTdInOnePage(false);
//$html2pdf->setTestTdInOnePage(false);
//$html2pdf->setTestTdInOnePage(false);
$html2pdf->writeHTML($html);
$html2pdf->Output('factura.pdf');

 //$html2pdf = new HTML2PDF();
 //$html2pdf->writeHTML('<h1>Hola Papi</h1>');


//$html2pdf->Output('usuarios.pdf');