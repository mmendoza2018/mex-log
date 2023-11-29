<?php  
/*-------------------------
 
---------------------------*/
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
 
// // JCV ORIGINAL PERO LO CAMBIE  nombre _factura desde buscar_ventasOKJCV.php $id_factura = intval($_GET['id_factura']);
$id_factura = $_GET['id_factura'];
$sql_count  = mysqli_query($conexion, "select * from facturas_ventas where id_factura='" . $id_factura . "'");
$count      = mysqli_num_rows($sql_count);
if ($count == 0) {
    echo "<script>alert('Factura no encontrada')</script>";
    echo "<script>window.close();</script>";
    exit;
}
 $sql_factura    = mysqli_query($conexion, "select * from facturas_ventas where id_factura='" . $id_factura . "'");
$rw_factura     = mysqli_fetch_array($sql_factura);
$numero_factura = $rw_factura['numero_factura'];
$id_cliente     = $rw_factura['id_cliente'];
$id_vendedor    = $rw_factura['id_vendedor'];
$fecha_factura  = $rw_factura['fecha_factura'];
$condiciones    = $rw_factura['condiciones'];
$simbolo_moneda = get_row('perfil', 'moneda', 'id_perfil', 1);
 

/* JCV RIGINAL, NO FUNCIONA
// get the HTML
 * 
 */
/*
ob_start();
include dirname(__FILE__) . '/res/pdf_factura_html.php';
$content = ob_get_clean();
$ruta = include dirname(__FILE__) . '/res/pdf_factura_html.php';
// convert to PDF
$rutita=dirname(__FILE__) . '/../html2pdf.class.php';
require_once dirname(__FILE__) . '/../html2pdf.class.php';
//require_once  "./vistas/pdf/html2pdf.class.php";


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
  

// jcv trae el otro archivo el de la factura
ob_start(); //buffer para que acepte recoger lo que hay en el archivo html en este caso: factura_html porque en realidad tenemos un archivo php ahi se captura ese archivos
//JCV ORIGINAL: require 'factura_html.php'; 
require dirname(__FILE__) . '/res/pdf_factura_html.php';  
$html  = ob_get_clean(); // JCV EN TESTA VARIABLE A TRAVÉS DE ESTE METODO SE GUARDA EL CONTENIDO DEL ARHIVO PARA PODER SACARLOS

try
{
$html2pdf = new HTML2PDF('P', 'letter', 'es', true, 'UTF-8', array(10,10,10,2));


$html2pdf->writeHTML($html);
$html2pdf->Output('factura.pdf');
} catch (HTML2PDF_exception $e) {
    echo $e;
    exit;
}

