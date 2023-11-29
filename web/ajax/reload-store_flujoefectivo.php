 <?php     
/*JCV OBTENIDO DEL ARCHIVO reload-cuentasdebancos.php*/ 
	function __autoload($className){
		//$model = "../../model/". $className ."_model.php";
		//$controller = "../../controller/". $className ."_controller.php";
                
                $model = "../../model/Reporte-store_flujoefectivo_model.php";
		$controller = "../../controller/Reporte-store_flujoefectivo_controller.php"; 
                 
                 
		require_once($model); 
		require_once($controller);
	}
  
	$objCuentasdebancos =  new Reporteflujoefectivo();

 ?> 
  
   
 <div id="reload-div">
        <table class="table datatable-basic table-xxs table-hover">
                 <thead style="position: sticky; top: 0; background-color: #E0F7FA">
                        <tr>
                            <th style="visibility:collapse; display:none;">id edoresultados</th>
                            <!--<th style="text-align:center">A</th>-->
                            <th>Concepto</th>
                            <th>Enero</th>
                            <th>Febrero</th>
                            <th>Marzo</th>
                            <th>Abril</th>
                            <th>Mayo</th>
                            <th>Junio</th>
                            <th>Julio</th>
                            <th>Agosto</th>
                            <th>Septiembre</th>
                            <th>Octubre</th>
                            <th>Noviembre</th>
                            <th>Diciembre</th>
                            <th>Acumulado</th>
                            <th>Promedio</th>

                        </tr> 
                </thead>

                <tbody>
      
            <?php
                $filas2 = $objCuentasdebancos->Insertar_datos_flujo(); 
               
                $filas=$objCuentasdebancos->Listar_flujoefectivo(); 
                if (is_array($filas) || is_object($filas))
                {
                foreach ($filas as $row => $column)
                {
  
                                 
            ?>  
                <!--<tr> -->
                   
                 <?php //JCV PARA PONER EN NEGRITAS DIFERENTES CUENTAS, CON BASE AL REPORTE STORE MANAGER, PONEMOS EN NEGRITAS TODO EL RENGLON
                if($column['nivel']==105 or $column['nivel']==108 or $column['nivel']==109 or $column['nivel']==111 or $column['nivel']==113){
                ?>        
                    <tr style="font-weight: bold">
                        
                <?php }else {
                    ?>
                     <tr style="font-weight: normal">
                <?php
                }
                ?>     
                    
                     
                    <td><?php print($column['cuenta']); ?></td>
                    
                    <?php
                    if($column['enero']<0){?>
                        <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['enero'],0)); ?></td>
                            
                        <?php
                    }else { 
                        ?>
                        <td style=" text-align: right; width: 15%"><?php print(number_format($column['enero'],0)); ?></td>
                              
                    <?php
                    }
                    ?>
                    
                    <?php
                    if($column['febrero']<0){?>
                        <?php
                            if($column['nivel']==54 || $column['nivel']==60 || $column['nivel']==64){?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['febrero'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['febrero'],0)); ?></td>
                            <?php
                            }
                            ?>
                        <?php 
                    }else {
                        ?>
                        
                        <?php
                            if($column['nivel']==54 || $column['nivel']==60 || $column['nivel']==64){?>      
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['febrero'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['febrero'],0)); ?></td>
                            <?php
                            }
                            ?>
                                
                       
                        
                    <?php
                    }
                    ?>
                    
                    <?php
                    if($column['marzo']<0){?>
                        <?php
                            if($column['nivel']==54 || $column['nivel']==60 || $column['nivel']==64){?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['marzo'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['marzo'],0)); ?></td>
                            <?php
                            }
                            ?>
                        <?php 
                    }else {
                        ?>
                        
                        <?php
                            if($column['nivel']==54 || $column['nivel']==60 || $column['nivel']==64){?>      
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['marzo'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['marzo'],0)); ?></td>
                            <?php
                            }
                            ?>
                    <?php
                    }
                    ?> 
                    
                        
                        
                    <?php
                    if($column['abril']<0){?>
                        <?php
                            if($column['nivel']==54 || $column['nivel']==60 || $column['nivel']==64){?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['abril'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['abril'],0)); ?></td>
                            <?php
                            }
                            ?>
                        <?php 
                    }else {
                        ?>
                        
                        <?php
                            if($column['nivel']==54 || $column['nivel']==60 || $column['nivel']==64){?>      
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['abril'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['abril'],0)); ?></td>
                            <?php
                            }
                            ?>
                        
                    <?php
                    }
                    ?>
                    
                        
                    <?php
                    if($column['mayo']<0){?>
                        <?php
                            if($column['nivel']==54 || $column['nivel']==60 || $column['nivel']==64){?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['mayo'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['mayo'],0)); ?></td>
                            <?php
                            }
                            ?>
                        <?php 
                    }else {
                        ?>
                        
                        <?php
                            if($column['nivel']==54 || $column['nivel']==60 || $column['nivel']==64){?>      
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['mayo'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['mayo'],0)); ?></td>
                            <?php
                            }
                            ?>
                    <?php
                    }
                    ?>
                    
                    
                    <?php
                    if($column['junio']<0){?>
                        <?php
                            if($column['nivel']==54 || $column['nivel']==60 || $column['nivel']==64){?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['junio'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['junio'],0)); ?></td>
                            <?php
                            }
                            ?>
                        <?php 
                    }else {
                        ?>
                        
                        <?php
                            if($column['nivel']==54 || $column['nivel']==60 || $column['nivel']==64){?>      
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['junio'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['junio'],0)); ?></td>
                            <?php
                            }
                            ?>
                    <?php
                    }
                    ?>    
                        
                    
                    <?php
                    if($column['julio']<0){?>
                         <?php
                            if($column['nivel']==54 || $column['nivel']==60 || $column['nivel']==64){?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['julio'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['julio'],0)); ?></td>
                            <?php
                            }
                            ?>
                        <?php 
                    }else {
                        ?>
                        
                        <?php
                            if($column['nivel']==54 || $column['nivel']==60 || $column['nivel']==64){?>      
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['julio'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['julio'],0)); ?></td>
                            <?php
                            }
                            ?>
                    <?php
                    }
                    ?>
                        
                        
                     <?php
                    if($column['agosto']<0){?>
                        <?php
                            if($column['nivel']==54 || $column['nivel']==60 || $column['nivel']==64){?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['agosto'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['agosto'],0)); ?></td>
                            <?php
                            }
                            ?>
                        <?php 
                    }else {
                        ?>
                        
                        <?php
                            if($column['nivel']==54 || $column['nivel']==60 || $column['nivel']==64){?>      
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['agosto'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['agosto'],0)); ?></td>
                            <?php
                            }
                            
                    }
                    ?>
                    
                    
                        <?php
                    if($column['septiembre']<0){?>
                        <?php
                            if($column['nivel']==54 || $column['nivel']==60 || $column['nivel']==64){?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['septiembre'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['septiembre'],0)); ?></td>
                            <?php
                            }
                            ?>
                        <?php 
                    }else {
                        ?>
                        
                        <?php
                            if($column['nivel']==54 || $column['nivel']==60 || $column['nivel']==64){?>      
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['septiembre'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['septiembre'],0)); ?></td>
                            <?php
                            }
                    }
                    ?>
                    
                        
                     <?php
                    if($column['octubre']<0){?>
                         <?php
                            if($column['nivel']==54 || $column['nivel']==60 || $column['nivel']==64){?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['octubre'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['octubre'],0)); ?></td>
                            <?php
                            }
                            ?>
                        <?php 
                    }else {
                        ?>
                        
                        <?php
                            if($column['nivel']==54 || $column['nivel']==60 || $column['nivel']==64){?>      
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['octubre'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['octubre'],0)); ?></td>
                            <?php
                            }
                    }
                    ?>
                    
                    
                         <?php
                    if($column['noviembre']<0){?>
                       <?php
                            if($column['nivel']==54 || $column['nivel']==60 || $column['nivel']==64){?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['noviembre'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['noviembre'],0)); ?></td>
                            <?php
                            }
                            ?>
                        <?php 
                    }else {
                        ?>
                        
                        <?php
                            if($column['nivel']==54 || $column['nivel']==60 || $column['nivel']==64){?>      
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['noviembre'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['noviembre'],0)); ?></td>
                            <?php
                            }
                    }
                    ?>
                        
                    
                    <?php
                    if($column['diciembre']<0){?>
                        <?php
                            if($column['nivel']==54 || $column['nivel']==60 || $column['nivel']==64){?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['diciembre'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['diciembre'],0)); ?></td>
                            <?php
                            }
                            ?>
                        <?php 
                    }else {
                        ?>
                        
                        <?php
                            if($column['nivel']==54 || $column['nivel']==60 || $column['nivel']==64){?>      
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['diciembre'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['diciembre'],0)); ?></td>
                            <?php
                            }
                    }
                    ?>
                        
                    
                    <?php
                    if($column['acumulado']<0){?>
                        <?php
                            if($column['nivel']==54 || $column['nivel']==60 || $column['nivel']==64){?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['acumulado'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['acumulado'],0)); ?></td>
                            <?php
                            }
                            ?>
                        <?php 
                    }else {
                        ?>
                        
                        <?php
                            if($column['nivel']==54 || $column['nivel']==60 || $column['nivel']==64){?>      
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['acumulado'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['acumulado'],0)); ?></td>
                            <?php
                            }
                    }
                    ?>
                        
                         
                        
                     <?php
                    if($column['promedio']<0){?>
                         <?php
                            if($column['nivel']==54 || $column['nivel']==60 || $column['nivel']==64){?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['promedio'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['promedio'],0)); ?></td>
                            <?php
                            }
                            ?>
                        <?php 
                    }else {
                         ?>
                         
                        <?php
                            if($column['nivel']==54 || $column['nivel']==60 || $column['nivel']==64){?>      
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['promedio'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['promedio'],0)); ?></td>
                            <?php
                            }
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

<script type="text/javascript" src="web/custom-js/reporte-store-flujoefectivo.js"></script> 
 