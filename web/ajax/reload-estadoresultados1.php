<?php
/*JCV OBTENIDO DEL ARCHIVO reload-cuentasdebancos.php*/ 
	function __autoload($className){
		//$model = "../../model/". $className ."_model.php";
		//$controller = "../../controller/". $className ."_controller.php";
                
                $model = "../../model/Estadoresultados1_model.php";
		$controller = "../../controller/Estadoresultados1_controller.php";
                

		require_once($model);
		require_once($controller);
	}

	$objCuentasdebancos =  new Cuentasdebancos();

 ?>
 
    
 <div id="reload-div">
 <table class="table datatable-basic table-xxs table-hover">
	 <thead>
		 <tr>
                    <th style="visibility:collapse; display:none;">id acumulativa</th>
                        <th style="visibility:collapse; display:none;">id edoresultados</th>
                        <!--<th style="text-align:center">A</th>-->
                        <th>Concepto</th>
                        <th>Enero</th>
                        <th>Febrero</th>
                        <th>Marzo</th>
                        <th>1er. Trimestre</th>
                        <th>Abril</th>
                        <th>Mayo</th>
                        <th>Junio</th>
                        <th>2do. Trimestre</th>
                        <th>Total</th>
		 </tr>
	 </thead>

	 <tbody>

            <?php
                $filas2 = $objCuentasdebancos->Insertar_datos_flujo();
               // exit();

                $filas=$objCuentasdebancos->Listar_Flujo_de_efectivo();
                if (is_array($filas) || is_object($filas))
                {
                foreach ($filas as $row => $column)
                {

                             
            ?>
                <tr>
                    <td style=" text-align:center"><?php print(substr($column['nombre_atributo'],0,1)); ?></td> 
                    <td><?php print($column['cuenta_acumulativa']); ?></td>
                    
                    <?php
                    if($column['enero']<0){?>
                        <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['enero'],2)); ?></td>
                        <?php
                    }else {
                        ?>
                        <td style=" text-align: right; width: 15%"><?php print(number_format($column['enero'],2)); ?></td>
                        
                    <?php
                    }
                    ?>
                    
                    <?php
                    if($column['febrero']<0){?>
                        <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['febrero'],2)); ?></td>
                        <?php
                    }else {
                        ?>
                        <td style=" text-align: right; width: 15%"><?php print(number_format($column['febrero'],2)); ?></td>
                        
                    <?php
                    }
                    ?>
                    
                    <?php
                    if($column['marzo']<0){?>
                        
                        <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['marzo'],2)); ?></td>
                        <?php
                    }else {
                        ?>
                        <td style=" text-align: right; width: 15%"><?php print(number_format($column['marzo'],2)); ?></td>
                        
                    <?php
                    }
                    ?>
                    
                    
                    <?php
                    if($column['abril']<0){?>
                        
                        <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['abril'],2)); ?></td>
                        <?php
                    }else {
                        ?>
                        <td style=" text-align: right; width: 15%"><?php print(number_format($column['abril'],2)); ?></td>
                        
                    <?php
                    }
                    ?>
                    
                        
                    <?php
                    if($column['mayo']<0){?>
                        <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['mayo'],2)); ?></td>
                        <?php
                    }else {
                        ?>
                        <td style=" text-align: right; width: 15%"><?php print(number_format($column['mayo'],2)); ?></td>
                        
                    <?php
                    }
                    ?>
                    
                    
                    <?php
                    if($column['junio']<0){?>
                        <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['junio'],2)); ?></td>
                        <?php
                    }else {
                        ?>
                        <td style=" text-align: right; width: 15%"><?php print(number_format($column['junio'],2)); ?></td>
                        
                    <?php
                    }
                    ?>    
                        
                    
                    <?php
                    if($column['julio']<0){?>
                        <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['julio'],2)); ?></td>
                        <?php
                    }else {
                        ?>
                        <td style=" text-align: right; width: 15%"><?php print(number_format($column['julio'],2)); ?></td>
                        
                    <?php
                    }
                    ?>
                        
                        
                     <?php
                    if($column['agosto']<0){?>
                        <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['agosto'],2)); ?></td>
                        <?php
                    }else {
                        ?>
                         <td style=" text-align: right; width: 15%"><?php print(number_format($column['agosto'],2)); ?></td>
                        
                    <?php
                    }
                    ?>
                    
                    
                        <?php
                    if($column['septiembre']<0){?>
                        <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['septiembre'],2)); ?></td>
                        <?php
                    }else {
                        ?>
                        <td style=" text-align: right; width: 15%"><?php print(number_format($column['septiembre'],2)); ?></td>
                        
                    <?php
                    }
                    ?>
                   
                        
                     <?php
                    if($column['octubre']<0){?>
                        <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['octubre'],2)); ?></td>
                        <?php
                    }else {
                        ?>
                        <td style=" text-align: right; width: 15%"><?php print(number_format($column['octubre'],2)); ?></td>
                        
                    <?php
                    }
                    ?>
                    
                    
                         <?php
                    if($column['noviembre']<0){?>
                       <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['noviembre'],2)); ?></td>
                        <?php
                    }else {
                        ?>
                        <td style=" text-align: right; width: 15%"><?php print(number_format($column['noviembre'],2)); ?></td>
                        
                    <?php
                    }
                    ?>
                        
                    
                    <?php
                    if($column['diciembre']<0){?>
                        <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['diciembre'],2)); ?></td>
                        <?php
                    }else {
                        ?>
                        <td style=" text-align: right; width: 15%"><?php print(number_format($column['diciembre'],2)); ?></td>
                        
                    <?php
                    }
                    ?>
                        
                    

                                                                
                    
                </tr>
			 <?php
			 }
		 }
		 ?>

	 </tbody>
 </table>
</div>
<script type="text/javascript" src="web/custom-js/flujoefectivo.js"></script>
