<?php
 /*
session_start();
if (!isset($_SESSION['user_login_status']) and $_SESSION['user_login_status'] != 1) {
    header("location: ../../../login.php");
    exit;
}
*/
 
require '../../../pdfsjcv/vendor/autoload.php'; //JCV PARA JALAR LAS LIBRERIAS PARA PDF
use Spipu\Html2Pdf\Html2Pdf;

/* Connect To Database*/
include "../../dbOKJCV.php";
include "../../php_conexionOKJCV.php";
//Archivo de funciones PHP
include "../../funcionesOKJCV.php";
// // JCV ORIGINAL PERO LO CAMBIE  nombre _factura desde .php $id_factura = intval($_GET['id_factura']);
$id_factura = $_GET['id_factura']; 

$sql_count  = mysqli_query($conexion, "select * from facturas_compras where id_factura='" . $id_factura . "'");
$count      = mysqli_num_rows($sql_count);
if ($count == 0) {
    echo "<script>alert('Factura no encontrada')</script>";
    echo "<script>window.close();</script>";
    exit;
}
$sql_factura    = mysqli_query($conexion, "select * from facturas_compras where id_factura='" . $id_factura . "'");
$rw_factura     = mysqli_fetch_array($sql_factura);
$numero_factura = $rw_factura['numero_factura'];
$id_proveedor   = $rw_factura['id_proveedor'];
$id_vendedor    = $rw_factura['id_vendedor'];
$fecha_factura  = $rw_factura['fecha_factura'];
$condiciones    = $rw_factura['condiciones'];
$simbolo_moneda = get_row('perfil', 'moneda', 'id_perfil', 1);


// get the HTML
/*ob_start();
include dirname(__FILE__) . '/res/ver_compra_html.php';
$content = ob_get_clean();

// convert to PDF
require_once dirname(__FILE__) . '/../html2pdf.class.php';
try
{
    $html2pdf = new HTML2PDF('P', 'A4', 'es', true, 'UTF-8', 3);
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    ob_end_clean();
    $html2pdf->Output('usuarios.pdf');
} catch (HTML2PDF_exception $e) {
    echo $e;
    exit;
}
*/
 
 
//jcv trae el otro archivo el de la factura
ob_start(); //buffer para que acepte recoger lo que hay en el archivo html en este caso: factura_html porque en realidad tenemos un archivo php ahi se captura ese archivos
  
require dirname(__FILE__) . '/res/ver_orden_de_compra_html.php';  
//require dirname(__FILE__) . '/pdf_orden_de_compra.php';  
$html  = ob_get_clean(); // JCV EN TESTA VARIABLE A TRAVÉS DE ESTE METODO SE GUARDA EL CONTENIDO DEL ARHIVO PARA PODER SACARLOS
   
try
{
$html2pdf = new HTML2PDF('P', 'USLETTER', 'es', true, 'UTF-8', array(3,7,7,7));//jcv izq, superior, derecha, inferior
$html2pdf->pdf->SetTitle('Orden de compra');
$html2pdf->pdf->SetAuthor('Juan Carlos Vázquez Amaya');
 $html2pdf->pdf->SetSubject('Para imprimir o exportar las órdenes de compra');
$html2pdf->writeHTML($html);
$html2pdf->Output('Orden_de_compra.pdf');
} catch (HTML2PDF_exception $e) {
    echo $e;
    exit;
}
