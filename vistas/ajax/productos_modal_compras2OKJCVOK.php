<?php 
/*-------------------------
     
---------------------------*/
 include 'is_loggedOKJCV.php'; //Archivo verifica que el usario que intenta acceder a la URL esta logueado 
/* Connect To Database*/
require_once "../dbOKJCV.php";
require_once "../php_conexionOKJCV.php";
require_once "../funcionesOKJCV.php";

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != null) ? $_REQUEST['action'] : '';
if ($action == 'ajax') {
    // escaping, additionally removing everything that could be (html/javascript-) code
    $q        = mysqli_real_escape_string($conexion, (strip_tags($_REQUEST['q'], ENT_QUOTES)));
    //JCV ORIGINAL OK $aColumns = array('codigo_producto', 'nombre_producto'); //Columnas de busqueda
    $aColumns = array('numero_factura'); //Columnas de busqueda
    
    //JCV ORIGINAL OK$sTable   = "productos";
    //jcv$sTable   = "detalle_fact_ventas";
    $sTable   = "detalle_fact_ventas, productos";
    $sWhere   = "";
    if ($_GET['q'] != "") {
        $sWhere = "WHERE (";
        for ($i = 0; $i < count($aColumns); $i++) {
            $sWhere .= $aColumns[$i] . " LIKE '%" . $q . "%' OR ";
        }
        $sWhere = substr_replace($sWhere, "", -3);
        //jcv ok original $sWhere .= ')';
        $sWhere .= ' and detalle_fact_ventas.id_producto = productos.id_producto)'; //jcv ESTÁ FUNCIONANDO A MEDIAS 
    }else{ //JCV ESTE ELSE ES PARA QUE LA PRIMERA VEZ QUE CARGUE LOS REGISTROS CARGUE LOS PRODUCTOS QUE ESTAN INVOLUCRADOS EN EL DETALLE DE LA VENTA
        // SINO LO PONGO APARECEN REGISTROS CICLICOS POR NO HABER UN FILTRO (WHERE)
        
        $sWhere = "WHERE detalle_fact_ventas.id_producto = productos.id_producto";
    }
    
    
    
    include 'paginationOKJCV.php'; //include pagination file
    //pagination variables
    $page      = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1; 
    $per_page  = 5; //how much records you want to show
    $adjacents = 4; //gap between pages after number of adjacents
    $offset    = ($page - 1) * $per_page;
    //Count the total number of row in your table*/
    $count_query = mysqli_query($conexion, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
    $row         = mysqli_fetch_array($count_query);
    $numrows     = $row['numrows'];
    $total_pages = ceil($numrows / $per_page);
    $reload      = '../venta/prueba.php'; 
    //consulta principal para obtener los datos
    //jcv ok $sql   = "SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
    
    $sql   = "SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
   //JCV REVISAR $sql   = "SELECT * FROM  detalle_fact_ventas, productos where detalle_fact_ventas.id_producto=productos.id_producto  LIMIT $offset,$per_page";
    $query = mysqli_query($conexion, $sql);
    //loop through fetched data
    if ($numrows > 0) {
/*JCV NO
        if (isset($_SESSION['oc'])) 
    {
        $oc = $_SESSION['oc']; 
    
    }else {
        $oc = session_id();
    }
        */ 
         
        ?>
<!-- JCV NO <input type="text" class="form-control txt_costo" value="<?php echo $oc; ?>" id="oc" name="oc"> -->
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-sm">
            <tr  class="info">
                <th>ID</th>
                
                <th>VENTA</th>
                <th class='text-center'>PRODUCTOS</th>
               <!-- <th class='text-center'>STOCK</th>-->
                <th class='text-center'>CANT</th>
                <th class='text-center'>COSTO</th>
                
                <th class='text-center' style="width: 30px;">AGREGAR</th>
            </tr>
            <?php
while ($row = mysqli_fetch_array($query)) {
            /*$id_producto     = $row['id_producto'];
            $codigo_producto = $row['codigo_producto'];
            $nombre_producto = $row['nombre_producto'];
            $stock_producto  = $row['stock_producto'];
            $costo_producto  = $row["costo_producto"];
            $costo_producto  = number_format($costo_producto, 2, '.', '');
            $image_path      = $row['image_path'];
            */
            $id_producto       = $row['id_producto'];
            $id_detalle        = $row['id_detalle'];
            $id_factura        = $row['id_factura'];
            $numero_factura    = $row['numero_factura'];
            
            $precio_venta     = $row['precio_venta'];
            //$importe_venta     = $row['importe_venta']; 
            
            $nombre_producto = $row['nombre_producto'];
            ?>
                <tr>
                    
                    <!--
                    <td><?php echo $codigo_producto; ?></td> 
                    <td><?php echo $nombre_producto; ?></td>
                    <td class="text-center"><?php echo stock($stock_producto); ?></td>
                    <td class='col-xs-1' width="15%">
                        <div class="pull-right">
                            <input type="text" class="form-control" style="text-align:center" id="cantidad_<?php echo $id_producto; ?>"  value="1" >
                        </div>
                    </td>
                    <td class='col-xs-2' width="15%"><div class="pull-right">
                        <input type="text" class="form-control" style="text-align:right" id="costo_producto_<?php echo $id_producto; ?>"  value="<?php echo $costo_producto; ?>" >
                    </div></td>
                    <td class='text-center'>
                        <a class='btn btn-success' href="#" title="Agregar a Factura" onclick="agregar('<?php echo $id_producto ?>')"><i class="fa fa-plus"></i>
                        </a>
                    </td>
                    -->
                    
                       
                    <td><?php echo $id_producto; ?></td>
                    <!--<td><?php echo $id_factura; ?></td> --> 
                    <td class='col-xs-1' width="10%" style="display:none"><div class="pull-right">
                            <input type="text" class="form-control" style="display: none; text-align:right" id="id_factura_<?php echo $id_producto; ?>"  value="<?php echo $id_factura; ?>" readonly="true"  >
                    </div></td>
                    
                    <!--JCV 1MAYO2023 PUSE EN SOLO COLUMNA EL NUMERO DE FACTURA PARA QUE SE MUESTRE PORQUE AL MOMENTO DE SER RESPONSIVO SE PERDIA EL TAMAÑO
                    DEL NUMERO, SOLO LO PONGO PARA MUESTRA, PERO TUVE QUE PONER EN DISPLAY:NONE LA COLUMNA QUE SI TOMA EL id=numero_factura_ PARA QUE DE AHI
                    TOME EL VALOR, LO MISMO CON LA COLUMN ID DE FACTURA--> 
                    <td><?php echo $numero_factura; ?></td>
                    
                      
                    
                    <td class='col-xs-3' style="display:none"><div class="pull-right"> 
                            <input type="text" class="form-control" style="display: none; text-align:right; border: none" id="numero_factura_<?php echo $id_producto; ?>"  value="<?php echo $numero_factura; ?>" readonly="true" >
                    </div></td>
                    
                       
                    <td><?php echo $nombre_producto; ?></td>
                    
                    <!--<td class="text-center"><?php echo stock($id_producto); ?></td>-->
                    <td class='col-xs-1' width="15%">
                        <div class="pull-right">
                            <input type="text" class="form-control" style="text-align:center" id="cantidad_<?php echo $id_producto; ?>"  value="1" >
                        </div>
                    </td>
                    <td class='col-xs-2' width="15%"><div class="pull-right">
                        <input type="text" class="form-control" style="text-align:right" id="costo_producto_<?php echo $id_producto; ?>"  value="<?php echo $precio_venta; ?>" >
                    </div></td>
                    
                                        
                    <td class='text-center'>
                        <a class='btn btn-success' href="#" title="Agregar a Orden" onclick="agregar('<?php echo $id_producto ?>')"><i class="fa fa-plus"></i>
                        </a>
                    </td>
                    
                    
                </tr>
                <?php
}
        ?>
            <tr>
                <td colspan=6><span class="pull-right">
                    <?php
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
          <strong>Aviso!</strong> No hay Registro de Producto
      </div>
      <?php
}
// fin else
}
?>