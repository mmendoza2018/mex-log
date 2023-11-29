<?php
/*-------------------------
 
---------------------------*/
include 'is_loggedOKJCV.php'; //Archivo verifica que el usario que intenta acceder a la URL esta logueado
/* Connect To Database*/
require_once "../dbOKJCV.php"; //Contiene las variables de configuracion para conectar a la base de datos
require_once "../php_conexionOKJCV.php"; //Contiene funcion que conecta a la base de datos
//Archivo de funciones PHP
require_once "../funcionesOKJCV.php";
//Inicia Control de Permisos
include "../permisosOKJCV.php";

//$user_id = $_SESSION['id_users'];/JCV MAY42023 PARA POSVAX
$user_id = $_SESSION['user_id'];
get_cadena($user_id);
$modulo = "Ventas";
permisos($modulo, $cadena_permisos); //JCV MAY42023 FUNCIONA NORMAL EN PRUEBA
//Finaliza Control de Permisos

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != null) ? $_REQUEST['action'] : '';
if ($action == 'ajax') {
    // escaping, additionally removing everything that could be (html/javascript-) code
    $q      = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['q'], ENT_QUOTES)));
    $sTable = "facturas_cot, clientes, users";
    $sWhere = "";
    $sWhere .= " WHERE facturas_cot.id_cliente=clientes.id_cliente and facturas_cot.id_vendedor=users.id_users";
    if ($_GET['q'] != "") {
        $sWhere .= " and  (clientes.nombre_cliente like '%$q%' or facturas_cot.numero_factura like '%$q%')";

    }
 
    $sWhere .= " order by facturas_cot.id_factura desc";
    include 'paginationOKJCV.php'; //include pagination file
    //pagination variables
    $page      = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $per_page  = 10; //how much records you want to show
    $adjacents = 4; //gap between pages after number of adjacents
    $offset    = ($page - 1) * $per_page;
    //Count the total number of row in your table*/
    $count_query = mysqli_query($conexion, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
    $row         = mysqli_fetch_array($count_query);
    $numrows     = $row['numrows'];
    $total_pages = ceil($numrows / $per_page);
    $reload      = '../reportes/facturas.php';
    //main query to fetch the data
    $sql   = "SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
    $query = mysqli_query($conexion, $sql);
    //loop through fetched data
    if ($numrows > 0) {
        echo mysqli_error($conexion);
        ?>
        <div class="table-responsive">
          <table class="table table-sm table-striped">
             <tr  class="info">
                <th># Cotización</th>  
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Usuario</th>
                <th>Pago</th>
                <th class='text-center'>Total</th>
                <th class='text-center'>Estatus</th>
                <th></th>

            </tr>
            <?php
while ($row = mysqli_fetch_array($query)) {
            $id_factura       = $row['id_factura'];
            $numero_factura   = $row['numero_factura'];
            $fecha            = date("d/m/Y", strtotime($row['fecha_factura']));
            $nombre_cliente   = $row['nombre_cliente'];
            $telefono_cliente = $row['telefono_cliente'];
            $email_cliente    = $row['email_cliente'];
            $nombre_vendedor  = $row['nombre_users'] . " " . $row['apellido_users'];
            $estado_factura   = $row['estado_factura'];
            $estado_cotizacion = $row['estado_cotizacion'];
            $condiciones = $row['condiciones']; //jcv CRÉDITO 4, CONTADO 1
            if ($condiciones == 1) {
                $text_estado = "CONTADO";
                } else {
                $text_estado = "CREDITO";
                }
                 
            
            if ($estado_cotizacion == 1) { 
                $text_estado_cotizacion = "VENTA";
                $label_class_cotizacion = 'badge-success';} else {
                $text_estado_cotizacion = "ABIERTA";
                $label_class_cotizacion = 'badge-danger';}    
                
            $total_venta    = $row['monto_factura'];
            $simbolo_moneda = get_row('perfil', 'moneda', 'id_perfil', 1);
            ?>
                        <tr>
                         <!--<td><span class='badge badge-success'><?php echo $numero_factura; ?></span></td>--> 
                         <!--JCV SI FUNCIONA BIEN<td><label class='badge badge-purple'><?php echo $numero_factura; ?></label></td> -->
                         <td><label class="badge badge-purple" ><?php echo $numero_factura; ?></label></td> 
                         <td><?php echo $fecha; ?></td>
                         <td><?php echo $nombre_cliente; ?></td>
                         <td><?php echo $nombre_vendedor; ?></td>
                         <td><span ><?php echo $text_estado; ?></span></td>
                         <td class='text-left'><b><?php echo $simbolo_moneda . '' . number_format($total_venta, 2); ?></b></td>
                         
                         <td class="text-center"><span class="badge <?php echo $label_class_cotizacion; ?>"><?php echo $text_estado_cotizacion; ?></span></td>
                         
                         <td class="text-center">
                          <div class="btn-group dropdown">
                            <button type="button" class="btn btn-warning btn-sm dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false" style="background-color: #039cfd; border-color:#039cfd "> <i class='fa fa-cog'></i> <i class="caret"></i> </button>
                            <div class="dropdown-menu dropdown-menu-right" style=" font-size: 1.2em">  
                               <?php if ($permisos_editar == 1) {?> 
                               
                                <?php if ($estado_cotizacion == 1) {?>  
                                     <li class="disabled dropdown-item"><a href="#"><i class='fa fa-edit'></i> Editar</a></li>
                                <?php } else {?>
                                    <!--<li><a class="dropdown-item" href="./vistas/html/editar_cotizacionOKJCV.php?id_factura=<?php echo $id_factura; ?>"><i class='fa fa-edit'></i> Editar</a></li>-->
                                    <li><a class="dropdown-item" href="./?View=EditarCotizacion&id_factura=<?php echo $id_factura; ?> "><i class='fa fa-edit'></i> Editar</a></li>
                                <?php } ?>
                               
                              
                               <li><a class="dropdown-item" href="#" onclick="imprimir_cotizacion('<?php echo $numero_factura; ?>');"><i class='fa fa-print'></i> Imprimir</a></li>
                               
                              
                                      
                                   <!--jcv ES EJEMPLO OK <li><a class="dropdown-item" href="./pdfsjcv/ejemplo.php"><i class='fa fa-edit'></i> Pdf ejemplo</a></li> -->
                                   
                                    <li><a class="dropdown-item" href="#" onclick="pdf_cotizacion('<?php echo $numero_factura; ?>');"><i class='fa fa-print'></i> Imprimir PDF</a></li> 
                                     
                                     
                               
                               <!-- JCV LA BUENA EL SIGNO & ES PARA PODER METER DOS VARIABLE EN LA URL: LA DEL VIEW EditarCompra Y LA DEL NUMERO DE FACTURA $id_factura:
                               <li><a class="dropdown-item" href="./?View=EditarCompras&id_factura=<?php echo $id_factura; ?> "><i class='fa fa-edit'></i> Editar</a></li>
                               <li><a class="dropdown-item" href="#" onclick="printOrder('<?php echo $row['id_factura']; ?>')"><i class='fa fa-print'></i> Imprimir</a></li>-->
                               
                               <?php }
            if ($permisos_eliminar == 1) {?>
                               <!--<a class="dropdown-item" href="#" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $row['id_factura']; ?>"><i class='fa fa-trash'></i> Eliminar</a>-->
                               <?php }?>


                           </div>
                       </div>

                   </td>

               </tr>
               <?php
}
        ?>
           <tr>
              <td colspan=7><span class="pull-right"><?php
echo paginate($reload, $page, $total_pages, $adjacents);
        ?></span></td>
            </tr>
        </table>
    </div>
    <?php
}
//Este else Fue agregado de Prueba de prodria Quitar
    else {
        ?>
    <div class="alert alert-warning alert-dismissible" role="alert" align="center">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Aviso!</strong> No hay Registro de Cotizaciones
  </div>
  <?php
}
// fin else
}
?>