  
   

<?php
/*JCV OBTENIDO DEL ARCHIVO reload-cuentasdebancos.php*/ 
	function __autoload($className){
		//$model = "../../model/". $className ."_model.php";
		//$controller = "../../controller/". $className ."_controller.php";
                
                $model = "../../model/Flujoefectivo_model.php";
		$controller = "../../controller/Flujoefectivo_controller.php";
                

		require_once($model);
		require_once($controller);
	}
 
	$objCuentasdebancos =  new Cuentasdebancos();

 ?>
   

 <div id="reload-divA">
    <table class="table datatable-basic table-xxs table-hover">
	 <thead  style="position: sticky; top: 0; background-color: #E0F7FA">
		 <tr>
                    <th style="visibility:collapse; display:none;">id acumulativa</th>
                       <!-- <th style="text-align:center">At_A</th>-->
                        <th>Nombre de la cuenta</th>
                        <th style="text-align: right">Enero</th>
                        <th style="text-align: right" >Febrero</th>
                        <th style="text-align: right" >Marzo</th>
                        <th style="text-align: right" >1 Trim.</th>
                        <th style="text-align: right" >Abril</th>
                        <th style="text-align: right" >Mayo</th>
                        <th style="text-align: right" >Junio</th>
                        <th>Julio</th>
                        <th>Agosto</th>
                        <th>Sept</th> 
                        <th>Oct</th>   
                        <!--<th style="visibility:collapse; display:none;">Id-R</th> -->
                        <th>Nov</th>
                        <th>Dic</th>
		 </tr>
	 </thead> 

	 <tbody>

            <?php
                $filas2 = $objCuentasdebancos->Insertar_datos_flujo_A();
               // exit(); 

                $filas=$objCuentasdebancos->Listar_Flujo_de_efectivo_A();
                if (is_array($filas) || is_object($filas))
                {
                foreach ($filas as $row => $column)
                {

                              
            ?> 
                <tr> 
                   
                    <!--<td style=" text-align:center"><?php print(substr($column['nombre_atributo'],0,1)); ?></td> -->
                    
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
                    
                    <!--JCV PARA PRIMER TRIMESTRE-->
                    <?php
                    if($column['t_1']<0){?>
                        
                        <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['t_1'],2)); ?></td>
                        <?php
                    }else {
                        ?>
                        <td style=" text-align: right; width: 15%"><?php print(number_format($column['t_1'],2)); ?></td>
                        
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
