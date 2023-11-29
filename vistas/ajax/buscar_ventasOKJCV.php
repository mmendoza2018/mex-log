<style type="text/css">  
.thead-inverse th{color:#fff;background-color:#292b2c}
.thead-default th{color:#464a4c;background-color:#eceeef;font-weight:bold}

.badge-purple{
    padding: 2px;
}
  </style>
 
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
permisos($modulo, $cadena_permisos);
//Finaliza Control de Permisos
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != null) ? $_REQUEST['action'] : '';
if ($action == 'ajax') {
    // escaping, additionally removing everything that could be (html/javascript-) code
    $q      = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['q'], ENT_QUOTES)));
    $sTable = "facturas_ventas, clientes, users";
    $sWhere = "";
    $sWhere .= " WHERE facturas_ventas.id_cliente=clientes.id_cliente and facturas_ventas.id_vendedor=users.id_users";
    if ($_GET['q'] != "") {
        $sWhere .= " and  (clientes.nombre_cliente like '%$q%' or facturas_ventas.numero_factura like '%$q%')";

    }

    $sWhere .= " order by facturas_ventas.id_factura desc";
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
    $reload      = '../reportes/facturasOKJCV.php';
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
                <th># Venta</th>  
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Asesor</th> 
                <th class='text-center'>Total venta</th>
                <th>Estado</th>
                <th class='text-center'>Origen</th>
                <th class='text-center'>Tipo de venta</th>
                <th class='text-center'>Acciones</th> 

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
            $tipo_arrendamiento   = $row['tipo_arrendamiento'];
            $origen   = $row['origen'];
            if ($estado_factura == 1) {
                $text_estado = "Pagada";
                $label_class = 'badge-success';} else {
                $text_estado = "Pendiente";
                $label_class = 'badge-danger';}
            if ($tipo_arrendamiento == 1) {
                $text_tipo = "Arrendamiento";
                } else {
                $text_tipo = "Sin arrendamiento";
                }
            $total_venta    = $row['monto_factura'];
            $simbolo_moneda = get_row('perfil', 'moneda', 'id_perfil', 1); 
            ?>
                        <tr>
                         <td><label class='badge badge-purple'><?php echo $numero_factura; ?></label></td>
                         <td><?php echo $fecha; ?></td>
                         <td><?php echo $nombre_cliente; ?></td>
                         <td><?php echo $nombre_vendedor; ?></td>
                         <td class='text-left'><b><?php echo $simbolo_moneda . '' . number_format($total_venta, 2); ?></b></td>
                         <td><span class="badge <?php echo $label_class; ?>"><?php echo $text_estado; ?></span></td>
                         <td><label class='badge badge-purple'><?php echo $origen; ?></label></td>
                         <td><label class='text-center'><?php echo $text_tipo; ?></label></td>
                         <td class="text-center">
                          <div class="btn-group dropdown">
                              <button type="button" class="btn btn-warning btn-sm dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false" style="background-color: #039cfd; border-color:#039cfd " > <i class='fa fa-cog'></i> <i class="caret"></i> </button>
                            <div class="dropdown-menu dropdown-menu-right" style=" font-size: 1.2em">
                               <?php if ($permisos_editar == 1) {?>
                                <!--<li><a class="dropdown-item" href="./vistas/html/editar_ventaOKJCV.php?id_factura=<?php echo $id_factura; ?>"><i class='fa fa-edit'></i> Editar</a></li>-->
                                <li><a class="dropdown-item" href="./?View=EditarVenta&id_factura=<?php echo $id_factura; ?>"><i class='fa fa-edit'></i> Editar</a></li>
                               <li><a class="dropdown-item" href="#" onclick="print_ticket('<?php echo $id_factura; ?>')"><i class='fa fa-print'></i> Imprimir Ticket</a></li>
                               <li><a class="dropdown-item" href="#" onclick="imprimir_factura('<?php echo $id_factura; ?>');"><i class='fa fa-print'></i> Imprimir Factura PDF</a></li>
                               <?php } 
            if ($permisos_eliminar == 1) {?>
            <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $row['id_factura']; ?>"><i class='fa fa-trash'></i> Anular Factura</a></li>
                               <!--<a class="dropdown-item" href="#" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $row['id_factura']; ?>"><i class='fa fa-trash'></i> Eliminar</a>-->
                               <?php }?>
                                <!-- JCV LA BUENA EL SIGNO & ES PARA PODER METER DOS VARIABLE EN LA URL: LA DEL VIEW EditarCompra Y LA DEL NUMERO DE FACTURA $id_factura:
                               <li><a class="dropdown-item" href="./?View=EditarCompras&id_factura=<?php echo $id_factura; ?> "><i class='fa fa-edit'></i> Editar</a></li>-->
                               
                                  
                               
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
      <strong>Aviso!</strong> No hay Registro de Facturas
  </div>
  <?php
}
// fin else
}
?>