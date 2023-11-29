<?php 
 
require '../../../pdfsjcv/vendor/autoload.php'; //JCV PARA JALAR LAS LIBRERIAS PARA PDF
use Spipu\Html2Pdf\Html2Pdf;   //JCV PARA JALAR LAS LIBRERIAS PARA PDF


include '../../ajax/is_loggedOKJCV.php'; //Archivo verifica que el usario que intenta acceder a la URL esta logueado
$numero_factura = $_SESSION['numero_factura'];
/* Connect To Database*/
require_once "../../dbOKJCV.php";
require_once "../../php_conexionOKJCV.php";
#require_once "../libraries/inventory.php"; //Contiene funcion que controla stock en el inventario
//Inicia Control de Permisos
include "../../permisosOKJCV.php";
//Archivo de funciones PHP
require_once "../../funcionesOKJCV.php";
//Ontengo variables pasadas por GET
$simbolo_moneda = get_row('perfil', 'moneda', 'id_perfil', 1);
$id_abono       = intval($_REQUEST['id_abono']);
$tables         = "creditos_abonos";
$campos         = "*";
$sWhere         = "id_abono='" . $id_abono . "'";
$sWhere .= " order by id_abono";
$query = mysqli_query($conexion, "SELECT $campos FROM  $tables where $sWhere ");


// get the HTML ESTO NO FUNCIONA, LA ARREGLÉ Y YA QUEDÓ
/*
ob_start();
include dirname(__FILE__) . '/res/rep_abono_html.php';
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
 

// jcv trae el otro archivo el de la factura
ob_start(); //buffer para que acepte recoger lo que hay en el archivo html en este caso: factura_html porque en realidad tenemos un archivo php ahi se captura ese archivos
//JCV ORIGINAL: require 'factura_html.php'; 
require dirname(__FILE__) . '/res/rep_abono_html.php';  
$html  = ob_get_clean(); // JCV EN TESTA VARIABLE A TRAVÉS DE ESTE METODO SE GUARDA EL CONTENIDO DEL ARHIVO PARA PODER SACARLOS

try
{
$html2pdf = new HTML2PDF('P', 'letter', 'es', true, 'UTF-8', array(10,10,10,0));

 
$html2pdf->writeHTML($html);
$html2pdf->Output('abono.pdf');
} catch (HTML2PDF_exception $e) {
    echo $e;
    exit;
}
