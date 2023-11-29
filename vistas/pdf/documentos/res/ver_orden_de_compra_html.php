<style type="text/css"> 
 
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
.midnight-blue{
    background:#2c3e50;
    padding: 4px 4px 4px;
    color:white;
    font-weight:bold;
    font-size:12px;
}
.silver{
    background:white;
    padding: 3px 4px 3px;
}
.clouds{
    background:#ecf0f1;
    padding: 3px 4px 3px;
}
.border-top{
    border-top: solid 1px #bdc3c7;

}
.border-left{
    border-left: solid 1px #bdc3c7;
}
.border-right{
    border-right: solid 1px #bdc3c7;
}
.border-bottom{
    border-bottom: solid 1px #bdc3c7;
}
.table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}

 .orden-compra {
            font-family: Arial, Helvetica, sans-serif;
             
            padding:0em;
            color:#fff;
            background:#4972B2;
            max-width: fit-content;
            
        }
        /* estilos de impresión */
        @media print {
            .encabezado-1 {
                line-height: 1;
                print-color-adjust:exact;
                -webkit-print-color-adjust:exact;
               
            }
        }
        .encabezado-2 {
            line-height: 0.7;
                print-color-adjust:exact;
                -webkit-print-color-adjust:exact;
            }

    


</style>

<?php     
if ($conexion) { 
    /*Datos de la empresa*/
    $sql           = mysqli_query($conexion, "SELECT * FROM perfil");
    $rw            = mysqli_fetch_array($sql);
    $moneda        = $rw["moneda"];
    $bussines_name = $rw["nombre_empresa"];
    $address       = $rw["direccion"];
    $city          = $rw["ciudad"];
    $state         = $rw["estado"];
    $postal_code   = $rw["codigo_postal"];
    $phone         = $rw["telefono"];
    $email         = $rw["email"];
    $logo_url      = $rw["logo_url"];
}
/*Fin datos empresa*/



$campos     = "proveedores.id_proveedor, proveedores.nombre_proveedor, proveedores.direccion_proveedor, proveedores.telefono_proveedor, proveedores.email_proveedor, facturas_compras.id_vendedor, facturas_compras.fecha_factura, facturas_compras.condiciones, facturas_compras.estado_factura, facturas_compras.numero_factura";

    $sql_factura = mysqli_query($conexion, "select $campos from facturas_compras, proveedores where facturas_compras.id_proveedor=proveedores.id_proveedor and facturas_compras.id_factura='" . $id_factura . "'");
    $count       = mysqli_num_rows($sql_factura);
    if ($count == 1) {
        $rw_factura                 = mysqli_fetch_array($sql_factura);
        $id_proveedor               = $rw_factura['id_proveedor'];
        $nombre_proveedor           = $rw_factura['nombre_proveedor'];
        $direccion_proveedor        = $rw_factura['direccion_proveedor'];
        $telefono_proveedor         = $rw_factura['telefono_proveedor'];
        $email_proveedor            = $rw_factura['email_proveedor'];
        $id_vendedor_db             = $rw_factura['id_vendedor'];
        $fecha_factura              = date("d/m/Y", strtotime($rw_factura['fecha_factura']));
        $condiciones                = $rw_factura['condiciones'];
        $estado_factura             = $rw_factura['estado_factura'];
        $numero_factura             = $rw_factura['numero_factura'];
        $_SESSION['id_factura']     = $id_factura;
        $_SESSION['numero_factura'] = $numero_factura;
    } else {
        //header("location: compra.php");
        exit;
    }





    ?>
 
 

<page pageset='new' backtop='0mm' backbottom='10mm' backleft='5mm' backright='2mm'> 
    <!--<page pageset='new' backtop='0mm' backbottom='15mm' backleft='5mm' backright='5mm' footer='page'> -->
    
    <table cellspacing="0" style="width: 99%;"  border="0"> <!--jcv para encabezado de orden de compra-->  
        <tr>
 
            <td style="width: 23%; color: #444444; border-bottom:  2px solid #4972B2; ">
                
                <img style="width: 100%; margin-left: 15px; " src="../../../img/Logo_Advance_Medical.jpg" alt="Advance Medical del Ing. Rafael Martínez Godínez">

            </td>
            
            <td style="width: 77%; color: #34495e;font-size:13px;text-align:center; border-bottom:  2px solid #4972B2;  ">
                <h4 style="color: #34495e;font-size:28px;font-weight:bold;  margin-left: -75px; "><?php echo $bussines_name; ?></h4>
                <h4 style="color: #34495e;font-size:22px;font-weight:bold; margin-top: -10px; margin-left: -75px;  ">Orden de Compra</h4>
                <!--<br><?php/* echo $address . ', ' . $city . ', ' . $state; */?><br>-->
                <h4 style="color: #34495e;font-size:12px;font-weight:bold; margin-top: -8px; margin-left: -75px; ">Teléfonos: <?php echo $phone; ?></h4>
                
            </td>
             
        </tr> 
    </table>
    
    <br>
    
    
    <table  cellspacing="0" style="width: 106%; text-align: left;border: 1px solid #4972B2; border-radius: 3px;padding: 10px;">
        <tr>
            <td style="width:17%; font-size:11px; " >PROVEEDOR</td>
            
            <td style="width:33%; font-size:10px; text-align: center;  border-bottom:  0.25px solid #000000; margin-left: -50px " ><?php echo $nombre_proveedor; ?></td>
            <td style="width:18%; font-size:11px; text-align: center;" >FECHA</td>
            <td style="width:22%; font-size:10px; text-align: center; border-bottom:  0.25px solid #000000;" ><?php echo $fecha_factura; ?></td>
          
        </tr>
        <br>
        <tr>
            <td style="width:20%; font-size:11px; " ></td>
            <td style="width:33%; font-size:11px; text-align: center;" ></td>
            <td style="width:18%; font-size:11px; text-align: center;" ></td>
            <td style="width:22%; font-size:11px; text-align: center;" >.</td>
        </tr>
        
        <tr>
            <td style="width:17%; font-size:11px; " >DE DONDE DEPOSITA:</td>
            <td style="width:33%; font-size:11px; text-align: center; border-bottom:  0.25px solid #000000;"  ></td>
            <td style="width:18%; font-size:11px; text-align: center;" >ORDEN DE COMPRA:</td>
            <td style="width:22%; font-size:10px; text-align: center; border-bottom:  0.25px solid #000000;" ><?php echo $numero_factura; ?></td>
        </tr>
        
        <tr>
            <td style="width:20%; font-size:11px; " ></td>
            <td style="width:30%; font-size:11px; text-align: center;" ></td>
            <td style="width:20%; font-size:11px; text-align: center;" ></td>
            <td style="width:20%; font-size:11px; text-align: center;" >.</td>
        </tr>
 
    </table>
    
    
    <br>
   
 
    <table cellspacing="0" style="width: 99%; text-align: center; font-size: 12px; margin-top: 12px; height: 20px; border:  3px solid #4972B2; border-radius: 3px; "> 
        <tr>
            <th class="orden-compra encabezado-1" style="width: 8%;text-align:center; vertical-align: middle; padding: 6px  " ></th>
            <th class="orden-compra encabezado-1" style="width: 42%; vertical-align: middle; padding: 6px "  >Descripción</th>
            <th class="orden-compra encabezado-1" style="width: 15%;text-align:center; vertical-align: middle;" >Marca</th>
            <th class="orden-compra encabezado-1" style="width: 8%;text-align:center; vertical-align: middle; " >Cantidad</th>
            <th class="orden-compra encabezado-1" style="width: 15%;text-align: right; vertical-align: middle;" >Precio unitario</th>
            <th class="orden-compra encabezado-1" style="width: 14%;text-align: right; vertical-align: middle; padding-right: 10px  " >Importe</th>

        </tr>
</table>
 
    
    
    <table cellspacing="0" style="width: 100%; text-align: left; -moz-border-radius: 13px;-webkit-border-radius: 12px;padding: 10px; margin-top: -8px;">
       
        <?php
$nums          = 1;
$sumador_total = 0;
$sql           = mysqli_query($conexion, "select * from productos, detalle_fact_compra, facturas_compras where productos.id_producto=detalle_fact_compra.id_producto and detalle_fact_compra.numero_factura=facturas_compras.numero_factura and facturas_compras.id_factura='" . $id_factura . "'");

while ($row = mysqli_fetch_array($sql)) {
    $id_producto     = $row["id_producto"];
    $codigo_producto = $row['codigo_producto'];
    $cantidad        = $row['cantidad'];
    $nombre_producto = $row['nombre_producto'];
    
    $marca = $row['marca'];
    $modelo = $row['modelo'];
 $observaciones = $row['observaciones'];
    $precio_costo   = $row['precio_costo'];
    $precio_costo_f = number_format($precio_costo, 2); //Formateo variables
    $precio_costo_r = str_replace(",", "", $precio_costo_f); //Reemplazo las comas
    $precio_total   = $precio_costo_r * $cantidad;
    $precio_total_f = number_format($precio_total, 2); //Precio total formateado
    $precio_total_r = str_replace(",", "", $precio_total_f); //Reemplazo las comas
    $sumador_total += $precio_total_r; //Sumador
    if ($nums % 2 == 0) {//JCV PARA PONER DIFERENTES FONDOS DE COLOR, TIPO CEBRA, PERO NO LO USO PARA LA ORDEN DE COMPRA
        $clase = "clouds";
    } else {
        $clase = "silver";
    }
    ?>  
       
        <tr>
            <td  style="width: 8%; height: 0.5px;  text-align: center; font-size: 1px"> </td> 
            <td style="width: 42%; height: 0.5px;  text-align: center; font-size: 1px"> </td> 
            <td  style="width: 15%; height: 0.5px;  text-align: center; font-size: 1px"> </td> 
            <td style="width: 8%; height: 0.5px;  text-align: center; font-size: 1px"> </td> 
            <td style="width: 14%; height: 0.5px;  text-align: center; font-size: 1px"> </td> 
            <td style="width: 15%; height: 0.5px;  text-align: center; font-size: 1px"> </td> 
        </tr>
        <tr>
            <td  style="width: 8%; height: 13px;  text-align: center; font-size: 8px"><?php echo $modelo; ?></td>  
            <td  style="width: 42%; height: 13x; text-align: left; font-size: 9px"><?php echo $observaciones; ?></td>
            <td style="width: 15%; height: 13px;  text-align: center; font-size: 8px"><?php echo $marca; ?></td>
            <td style="width: 8%; height: 13px; text-align: center; font-size: 10px"><?php echo $cantidad; ?></td>
            <td  style="width: 14%; height: 13px;  text-align: right; font-size: 10px"><?php echo $simbolo_moneda . '' . $precio_costo_f; ?></td>
            <td  style="width: 15%; height: 13px;  text-align: right; font-size: 10px"><?php echo $simbolo_moneda . '' . $precio_total_f; ?></td>
    
        </tr>
        
        <tr ><!--JCV CON EL COLSPAN LE INDICO QUE EL RENGLON OCUPE LAS SEIS COLUMNAS-->
            <!--<td  style="width: 0%; height: 18px; text-align: center;  border-bottom:  0.5px solid #4972B2; font-size: 9px;  "> </td>-->
            <td colspan="6" style="width: 100%; height: 18px; text-align: left;  border-bottom:  0.5px solid #4972B2;font-size: 10px; "><?php echo $nombre_producto; ?></td>
            <!--<td style="width: 15%; height: 18px; text-align: center;  border-bottom:  0.5px solid #4972B2; font-size: 9px; ">&nbsp</td>
            <td style="width: 8%; height: 18px; text-align: center;  border-bottom:  0.5px solid #4972B2; font-size: 9px">&nbsp</td>
            <td style="width: 14%; height: 18px; text-align: right;  border-bottom:  0.5px solid #4972B2;font-size: 9px">&nbsp</td>
            <td style="width: 15%; height: 18px; text-align: right;  border-bottom:  0.5px solid #4972B2;font-size: 9px">&nbsp</td>
    -->
        </tr>
 
        
        
    <?php

    $nums++;
}
$impuesto      = get_row('perfil', 'impuesto', 'id_perfil', 1);
$subtotal      = number_format($sumador_total, 2, '.', '');
$total_iva     = ($subtotal * $impuesto) / 100;
$total_iva     = number_format($total_iva, 2, '.', '');
$total_factura = $subtotal;
//$total_factura_f     = number_format($total_factura, 2, '.', '');
?>
               
        
</table>

<br>
 <br>



 <page_footer ><!--JCV PARA EL PIE DE PAGINA-->
        
     <table style="width: 97%;margin-left: 15px; text-align: left; padding: 0px; margin-top: -10px; border-top: 3px solid #4972B2; border-bottom: 2px solid #4972B2; padding-top: 17px; padding-bottom: 13px; padding-left: 10px;">
    <tr> 
        <td style="width: 71%;">
            <table cellspacing="0" style="width: 100%; text-align: center;border: 1px solid #4972B2;padding: 0px; font-size: 11px; font-weight: bold; border-radius: 3px;">
                <tr>

                    <td class="orden-compra encabezado-2" style="width:100%; padding: 3px;">COMENTARIOS O INSTRUCCIONES ESPECIALES</td>
                </tr>
                <tr>
                     <td colspan="" style=" text-align: right;width: 100%; height: 11px;"> </td>
                </tr>
                <tr>
                     <td colspan="" style=" text-align: right;width: 100%; height: 11px;"> </td>
                </tr>
                <tr>
                     <td colspan="" style=" text-align: right; width: 100%; height: 11px;"> </td>
                </tr>
                <tr>
                     <td colspan="" style=" text-align: right; width: 100%; height: 11px;"> </td>
                </tr>
                <tr>
                     <td colspan="" style=" text-align: right; width: 100%; height: 11px;"> </td>
                </tr>
            </table>
        </td> 


        <td style="width: 29%;">

            <table cellspacing="0" style="width: 100%; padding: 6px; font-size: 13px; font-weight: bold ">
               <tr>
                    <td colspan="5" style="width: 55%; text-align: right; height: 23px;">SUBTOTAL </td>
                    <td style="width: 45%; text-align: right; height: 19px;"><?php echo $simbolo_moneda; ?>  <?php echo number_format($subtotal, 2); ?></td>
                </tr>
                <tr>
                    <td colspan="5" style="width: 40%; text-align: right; height: 23px;">IVA (<?php echo $impuesto; ?>)%   </td>
                    <td style="widtd:60%; text-align: right;height: 19px;"><?php echo $simbolo_moneda; ?> <?php echo number_format(0, 2); ?></td>
                </tr><tr>
                    <td colspan="5" style="width: 40%; text-align: right;height: 23px;">TOTAL  </td>
                    <td style="widtd: 60%; text-align: right;height: 19px;"><?php echo $simbolo_moneda; ?> <?php echo number_format($total_factura, 2); ?></td>
                </tr>
            </table>
        </td> 

    </tr>  
    
</table>
<br>
 <br>
     
     
     
        <table  id="footer" style="width: 96%; text-align: left; ;padding: 20px; margin-top: 5px; margin-left: 10px; ">
            <tr>
        <td style="width: 46%;">
            <table cellspacing="0" style="width: 100%; text-align: center;padding: 20px; font-size: 10px; ">
                <tr>
                    <td  style=" border-top: 0.5px solid #000000 ; color: #000000; " > ENCARGADA DE COMPRA </td>
                </tr>
            </table>
        </td>   
        <br><br><br>

        <td style="width: 34%;">
            <table cellspacing="0" style="width: 100%; text-align: center;padding: 20px; font-size: 10px; ">
                <tr>
                    <td colspan="3" ></td>
                </tr>
            </table>

        </td>  

        <td style="width: 30%;">
            <table cellspacing="0" style="width: 100%; text-align: center;padding: 20px; font-size: 10px; ">
                <tr>
                    <td style="border-top: 0.5px solid #000000 ; color: #000000; " > DIRECCIÓN GENERAL </td>
                </tr>
            </table>
        </td>   
    
    </tr>
        </table>
    </page_footer>
 
 
</page>

