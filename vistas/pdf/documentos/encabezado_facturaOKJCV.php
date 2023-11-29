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
 
/*Fin datos empresa*/
    ?>
    <table cellspacing="0" style="width: 100%;"  border="0">
        <tr>

            <td style="width: 30%; color: #444444; border-bottom:  3px solid #339CFF;  ">
                <!--JCV ORIG<img style="width: 100%;" src="./<?php echo $logo_url; ?>" alt="Logo"><br>-->
                <!--<img style="width: 100%;" src="../../../img/1500308929_LOGO.png" alt="Logo"><br>-->
                <img style="width: 60%; height: 60%; margin-left: 25px; " src="./img/Logo_Advance_Medical.jpg" alt="Advance Medical del Ing. Rafael Martínez Godínez">

            </td>
            <!-- JCV BOTON PARA IMPRIMIR, NO ES MUY CONVENIENTE AQUI
             <td style="width: 10%; color: #444444; border-bottom:  3px solid #339CFF ">
                 <div class="col-lg-2"><a href="#" style="color: #DC143C" onclick="javascript:window.print()"><i class="fa fa-print fa-3x" aria-hidden="true" style="color:#DC143C"></i>Imprimir </a> &nbsp;</div>
                

            </td>
            -->
            <td style="width: 70%; color: #34495e;font-size:13px;text-align:center; border-bottom:  3px solid #339CFF; ">
                <h4 style="color: #34495e;font-size:24px;font-weight:bold;  margin-left: -75px; "><?php echo $bussines_name; ?></h4>
                <h4 style="color: #34495e;font-size:20px;font-weight:bold; margin-left: -75px;  ">Orden de Compra</h4>
                <!--<br><?php/* echo $address . ', ' . $city . ', ' . $state; */?><br>-->
                <h4 style="color: #34495e;font-size:13px;font-weight:bold; margin-top: -8px; margin-left: -75px; ">Teléfono: <?php echo $phone; ?></h4>
                <!--<br>Teléfono: <?php/* echo $phone; */?><br>-->
                <!--<h4 style="color: #34495e;font-size:13px;font-weight:bold; margin-top: -12px; ">Email: <?php/* echo $email;*/ ?></h4>-->
                <!--Email: <?php/* echo $email; */?>-->
                
                
            </td>
            <!--JCV EL NUMERO DE FACTURA LO COLOQUE EN EL FORMATO DE ADVANCE EN NO DE ORDEN DE COMPRA
            <td style="width: 30%;text-align:right; color:#ff0000"">
            FACTURA Nº <?php/* echo $numero_factura;*/ ?>
            </td>
-->
        </tr>
    </table>

<table  cellspacing="0" style="width: 100%; text-align: left;border: 1px solid #339CFF;-moz-border-radius: 7px;-webkit-border-radius: 6px;padding: 10px;">
        <tr>
            <td style="width:20%; font-size:11px; " >PROVEEDOR</td>
            
            <td style="width:30%; font-size:10px; text-align: center;  border-bottom:  1px solid #000000; margin-left: -50px " ><?php echo $nombre_proveedor; ?></td>
            <td style="width:20%; font-size:11px; text-align: center;" >FECHA</td>
            <td style="width:20%; font-size:10px; text-align: center; border-bottom:  1px solid #000000;" ><?php echo $fecha_factura; ?></td>
          
        </tr>
        <br>
        <tr>
            <td style="width:20%; font-size:11px; " ></td>
            
            <td style="width:30%; font-size:11px; text-align: center;" ></td>
            <td style="width:20%; font-size:11px; text-align: center;" ></td>
            <td style="width:20%; font-size:11px; text-align: center;" >.</td>
        </tr>
        
        <tr>
            
                <td style="width:20%; font-size:11px; " >DE DONDE DEPOSITA:</td>
                
              <td style="width:30%; font-size:11px; text-align: center; border-bottom:  1px solid #000000;"  ></td>
            <td style="width:20%; font-size:11px; text-align: center;" >ORDEN DE COMPRA:</td>
            <td style="width:20%; font-size:10px; text-align: center; border-bottom:  1px solid #000000;" ><?php echo $numero_factura; ?></td>

            
        </tr>
 

    </table>

<br> 

<table cellspacing="0" style="width: 100%; text-align: center; padding: 0px; font-size: 12px; font-weight: bold; margin-top: 12px; "> 
        <tr>
            <th class="orden-compra encabezado-1" style="width: 8%;text-align:center; vertical-align: middle;  " ></th>
            <th class="orden-compra encabezado-1" style="width: 42%; vertical-align: middle; "  >Descripción</th>
            <th class="orden-compra encabezado-1" style="width: 15%;text-align:center; vertical-align: middle;" >Marca</th>
            <th class="orden-compra encabezado-1" style="width: 8%;text-align:center; vertical-align: middle; " >Cantidad</th>
            <th class="orden-compra encabezado-1" style="width: 14%;text-align: right; vertical-align: middle;" >Precio unitario</th>
            <th class="orden-compra encabezado-1" style="width: 15%;text-align: right; vertical-align: middle; padding-right: 10px  " >Importe</th>

        </tr>
</table>


    <?php }?>