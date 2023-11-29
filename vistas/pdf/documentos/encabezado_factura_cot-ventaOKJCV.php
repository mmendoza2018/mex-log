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

            <td style="width: 25%; color: #444444;">
                <!--JCV ORIG<img style="width: 100%;" src="./<?php echo $logo_url; ?>" alt="Logo"><br>-->
                <!--<img style="width: 100%;" src="../../../img/1500308929_LOGO.png" alt="Logo"><br>-->
                <!--<img style="width: 100%; " src="./img/Logo_Advance_Medical.jpg" alt="Logo">-->
 
            </td>
            <td style="width: 45%; color: #34495e;font-size:12px;text-align:center">
                <span style="color: #34495e;font-size:16px;font-weight:bold"><?php echo $bussines_name; ?></span>
                <!--<br><?php/* echo $address . ', ' . $city . ', ' . $state; */?><br>-->
                <br>Teléfono: <?php echo $phone; ?><br>
                Email: <?php echo $email; ?>
                <div class="col-lg-12">
                    <div class="row">

                        <div class="panel panel-primary">
                            <div style="text-align:center" class="panel-heading text-center" >
                                ORDEN DE COMPRA
                            </div>


                        </div>
                    </div>
                </div>
            </td>
            
            <td style="width: 30%;text-align:right; color:#ff0000"">
            FACTURA Nº <?php echo $numero_factura; ?>
            </td>

        </tr>
    </table>
    <?php }?>