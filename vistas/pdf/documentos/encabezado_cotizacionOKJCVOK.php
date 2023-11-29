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

            <!--<td style="width: 25%; color: #444444;">-->
            <!--    <img style="width: 100%;" src="./<?php echo $logo_url; ?>" alt="Logo"><br>  -->
                
            <td style="width: 20%; color: #444444; margin-top: 10 px; margin-left: 20px;">
                <!--JCV ORIG<img style="width: 100%;" src="./<?php echo $logo_url; ?>" alt="Logo"><br>-->
                <!--<img style="width: 100%;" src="../../../img/1500308929_LOGO.png" alt="Logo"><br>-->
                <img style="width: 100%; " src="./img/Logo_Advance_Medical.jpg" alt="Logo">

            </td>
            
            </td>
            <td style="width: 65%; color: #34495e;font-size:12px;text-align:center">
                <span style="color: #008BC7;font-size:20px;font-weight:bold"><?php echo $bussines_name; ?></span>
                <br><?php echo $address . ', ' . $city . ', ' . $state; ?><br>
                Teléfono: <?php echo $phone; ?><br>
                Email: <?php echo $email; ?>

            </td>
            <td style="width: 15%;text-align:right; color:#ff0000; margin-right: 15px; font-size: 12px">
            <br>Cotización Nº <br><?php echo $numero_factura; ?>
            </td>

        </tr>
    </table>
    <?php }?>