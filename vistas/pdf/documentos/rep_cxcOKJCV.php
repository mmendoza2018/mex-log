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
$daterange      = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['daterange'], ENT_QUOTES)));
$tables         = "creditos_abonos";
$campos         = "*";
$sWhere         = "numero_factura='" . $numero_factura . "'";
if (!empty($daterange)) {
    list($f_inicio, $f_final)                    = explode(" - ", $daterange); //Extrae la fecha inicial y la fecha final en formato espa?ol
    list($dia_inicio, $mes_inicio, $anio_inicio) = explode("/", $f_inicio); //Extrae fecha inicial
    $fecha_inicial                               = "$anio_inicio-$mes_inicio-$dia_inicio 00:00:00"; //Fecha inicial formato ingles
    list($dia_fin, $mes_fin, $anio_fin)          = explode("/", $f_final); //Extrae la fecha final
    $fecha_final                                 = "$anio_fin-$mes_fin-$dia_fin 23:59:59";

    $sWhere .= " and fecha_abono between '$fecha_inicial' and '$fecha_final' ";
}
$sWhere .= " order by id_abono";
$query = mysqli_query($conexion, "SELECT $campos FROM  $tables where $sWhere ");


 
// jcv trae el otro archivo el de la factura
ob_start(); //sirve para que el buffer para que acepte recoger lo que hay en el archivo html en este caso: factura_html porque en realidad tenemos un archivo php ahi se captura ese archivos
//JCV ORIGINAL: require 'factura_html.php'; 
require dirname(__FILE__) . '/res/rep_cxc_htmlJCV.php';  
$html  = ob_get_clean(); // JCV EN TESTA VARIABLE A TRAVÉS DE ESTE METODO SE GUARDA EL CONTENIDO DEL ARHIVO PARA PODER SACARLOS

try
{
$html2pdf = new HTML2PDF('P', 'letter', 'es', true, 'UTF-8', array(10,10,10,10));

 
$html2pdf->writeHTML($html);
$html2pdf->Output('abono.pdf');
} catch (HTML2PDF_exception $e) {
    echo $e;
    exit;
}


// get the HTML jcv no funciona
/*ob_start();
include dirname(__FILE__) . '/res/rep_cxc_htmlOKJCV.php';
$content = ob_get_clean();

// convert to PDF
require_once dirname(__FILE__) . '/../html2pdf.class.php';
//require_once '../html2pdf.class.php';
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