 <?php          
/*JCV OBTENIDO DEL ARCHIVO reload-cuentasdebancos.php*/ 
	function __autoload($className){
		//$model = "../../model/". $className ."_model.php";
		//$controller = "../../controller/". $className ."_controller.php";
                
                $model = "../../model/Estado_de_resultados1s_model.php";
		$controller = "../../controller/Estado_de_resultados1s_controller.php";   
                 
                  
		require_once($model);  
		require_once($controller);
	}
  
	$objCuentasdebancos =  new Estado_de_resultados1s();  

 ?> 
     
   
 <div id="reload-div"> 
        <table class="table datatable-basic table-xxs table-hover">
            <thead>
                <tr>
                    <th style="visibility:collapse; display:none;">id edoresultados</th>
                    <!--<th style="text-align:center">A</th>-->
                    <th style="text-align: center">C o n c e p t o</th>
                    <th style="text-align: center">Ene</th>
                    <th style="text-align: center"> </th>
                    <th style="text-align: center">Feb</th>
                    <th style="text-align: center"> </th>
                    <th style="text-align: center">Mar</th>
                    <th style="text-align: center"> </th>
                    <th style="text-align: center">1er. T.</th>
                    <th style="text-align: center"> </th>
                    <th style="text-align: center">Abr</th>
                    <th style="text-align: center"> </th>
                    <th style="text-align: center">May</th>
                    <th style="text-align: center"> </th>
                    <th style="text-align: center">Jun</th>
                    <th style="text-align: center"> </th>
                    <th style="text-align: center">2do. T.</th>
                    <th style="text-align: center"> </th>
                    <th style="text-align: center">Total</th>

                </tr>
            </thead>

            <tbody>
      
            <?php 
                $filas2 = $objCuentasdebancos->Insertar_datos_edo_resultados1s();    
               
                $filas=$objCuentasdebancos->Listar_edo_resultados1s();  
                if (is_array($filas) || is_object($filas))
                {
                foreach ($filas as $row => $column) 
                {
   
                                    
            ?>  
                <!--<tr>   -->
                   
                    <?php //JCV PARA PONER EN NEGRITAS DIFERENTES CUENTAS, CON BASE AL REPORTE ESTADO DE RESULTADOS PRIMER SEMESTRE, PONEMOS EN NEGRITAS TODO EL RENGLON
                /*if($column['nivel']==1 or $column['nivel']==3 or $column['nivel']==7 or $column['nivel']==10 or $column['nivel']==14 or $column['nivel']==15 or $column['nivel']==16 or $column['nivel']==17 or $column['nivel']==19 or $column['nivel']==20 or $column['nivel']==21){*/
                if($column['nivel']==1 or $column['nivel']==3 or $column['nivel']==15 or  $column['nivel']==19 or $column['nivel']==21){    
                ?>        
                    <tr style="font-weight: bold">
                
                <?php }elseif($column['nivel']==7 or $column['nivel']==10 or $column['nivel']==14 or $column['nivel']==17 or $column['nivel']==20 ) {
                    ?>
                        <tr style="font-weight: bold; background-color: white; border-top:2px solid #1F323F;">
                <?php }else {
                    ?>
                     <tr style="font-weight: normal; background-color: #00FFFF">
                <?php
                }
                ?>  
                     
                    <td style="background-color: white; width: 25%;"><?php print($column['cuenta']); ?></td>
                    
                    <?php
                    if($column['enero']<0){?>
                        <?php
                            if($column['nivel']==20 ){?>
                                <td style=" text-align: center; width: 15%; color: #ee3900"><?php print(number_format($column['enero'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: center; width: 15%; color: #ee3900"><?php print(number_format($column['enero'],0)); ?></td>
                            <?php
                            }
                            ?>
                        <?php 
                    }else {
                        ?>
                        
                        <?php
                            if($column['nivel']==20 ){?>     
                                <td style=" text-align: center; width: 15%"><?php print(number_format($column['enero'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: center; width: 15%"><?php print(number_format($column['enero'],0)); ?></td>
                            <?php
                            }
                            ?>
                                
                       
                        
                    <?php
                    }
                    ?>
                    
                                <!-- JCV COLUMNA DEN BLANCO-->
                  <td style=" text-align: right; width: .1%; color: #ee3900;background-color: white  "> </td>
                                
                                
                    <?php
                    if($column['febrero']<0){?>
                        <?php
                            if($column['nivel']==20 ){?>
                                <td style=" text-align: center; width: 15%; color: #ee3900"><?php print(number_format($column['febrero'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: center; width: 15%; color: #ee3900"><?php print(number_format($column['febrero'],0)); ?></td>
                            <?php
                            }
                            ?>
                        <?php 
                    }else {
                        ?>
                        
                        <?php
                            if($column['nivel']==20 ){?>     
                                <td style=" text-align: center; width: 15%"><?php print(number_format($column['febrero'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: center; width: 15%"><?php print(number_format($column['febrero'],0)); ?></td>
                            <?php
                            }
                            ?>
                                
                                  
                        
                    <?php
                    }
                    ?>
                    
                      
                    <!-- JCV COLUMNA DEN BLANCO-->
                  <td style=" text-align: right; width: .1%; color: #ee3900;background-color: white  "> </td>   
                      
                      
                      
                    <?php
                    if($column['marzo']<0){?>
                        <?php
                           if($column['nivel']==20 ){?>   
                                <td style=" text-align: center; width: 15%; color: #ee3900"><?php print(number_format($column['marzo'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: center; width: 15%; color: #ee3900"><?php print(number_format($column['marzo'],0)); ?></td>
                            <?php
                            }
                            ?>
                        <?php 
                    }else {
                        ?>
                        
                        <?php
                            if($column['nivel']==20 ){?>      
                                <td style=" text-align: center; width: 15%"><?php print(number_format($column['marzo'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: center; width: 15%"><?php print(number_format($column['marzo'],0)); ?></td>
                            <?php
                            }
                            ?>
                    <?php
                    }
                    ?> 
                    
                      
                                <!-- JCV COLUMNA DEN BLANCO-->
                  <td style=" text-align: right; width: .1%; color: #ee3900;background-color: white  "> </td>
                    
                                 
                    <?php
                    if($column['t_1']<0){?>
                         <?php
                            if($column['nivel']==20 ){?>   
                                <td style=" text-align: center; width: 15%; color: #ee3900"><?php print(number_format($column['t_1'],2)); ?></td>
                                
                            <?php
                            }elseif($column['nivel']==21) {
                            ?>
                                <td style=" text-align: center; width: 15%; background-color: white; color:#ee3900 "><?php print(number_format($column['t_1'],0)); ?></td>

                            
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: center; width: 15%; background-color: #31859B;  color:#ee3900 "><?php print(number_format($column['t_1'],0)); ?></td>
                            <?php
                            }
                            ?>
                        <?php 
                    }else {
                        ?>
                        
                        <?php
                            if($column['nivel']==20 ){?>      
                                <td style=" text-align: center; width: 15%"><?php print(number_format($column['t_1'],2)); ?></td>
                            
                            <?php
                            }elseif($column['nivel']==21) {
                            ?>
                                <td style=" text-align: center; width: 15%; background-color: white; "><?php print(number_format($column['t_1'],0)); ?></td>

                            
                                
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: center; width: 15%; background-color: #31859B;  color:white"><?php print(number_format($column['t_1'],0)); ?></td>
                            <?php
                            }
                            ?>
                    <?php
                    }
                    ?>
                        
                    
                    <!-- JCV COLUMNA DEN BLANCO-->
                  <td style=" text-align: right; width: .1%; color: #ee3900;background-color: white  "> </td>
                    
                    <?php
                    if($column['abril']<0){?>
                        <?php
                            if($column['nivel']==20 ){?>   
                                <td style=" text-align: center; width: 15%; color: #ee3900"><?php print(number_format($column['abril'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: center; width: 15%; color: #ee3900"><?php print(number_format($column['abril'],0)); ?></td>
                            <?php
                            }
                            ?>
                        <?php 
                    }else {
                        ?>
                        
                        <?php
                            if($column['nivel']==20 ){?>     
                                <td style=" text-align: center; width: 15%"><?php print(number_format($column['abril'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: center; width: 15%"><?php print(number_format($column['abril'],0)); ?></td>
                            <?php
                            }
                            ?>
                        
                    <?php
                    }
                    ?>
                    
                                
                    <!-- JCV COLUMNA DEN BLANCO-->
                  <td style=" text-align: right; width: .1%; color: #ee3900;background-color: white  "> </td>
                    
                        
                    <?php
                    if($column['mayo']<0){?>
                        <?php
                           if($column['nivel']==20 ){?>   
                                <td style=" text-align: center; width: 15%; color: #ee3900"><?php print(number_format($column['mayo'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: center; width: 15%; color: #ee3900"><?php print(number_format($column['mayo'],0)); ?></td>
                            <?php
                            }
                            ?>
                        <?php 
                    }else {
                        ?>
                        
                        <?php
                            if($column['nivel']==20 ){?>       
                                <td style=" text-align: center; width: 15%"><?php print(number_format($column['mayo'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: center; width: 15%"><?php print(number_format($column['mayo'],0)); ?></td>
                            <?php
                            }
                            ?>
                    <?php
                    }
                    ?>
                    
                                
                    <!-- JCV COLUMNA DEN BLANCO-->
                  <td style=" text-align: right; width: .1%; color: #ee3900;background-color: white  "> </td>
                    
                    
                    <?php
                    if($column['junio']<0){?>
                        <?php
                            if($column['nivel']==20 ){?>   
                                <td style=" text-align: center; width: 15%; color: #ee3900"><?php print(number_format($column['junio'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: center; width: 15%; color: #ee3900"><?php print(number_format($column['junio'],0)); ?></td>
                            <?php
                            }
                            ?>
                        <?php 
                    }else {
                        ?>
                        
                        <?php
                            if($column['nivel']==20 ){?>     
                                <td style=" text-align: center; width: 15%"><?php print(number_format($column['junio'],2)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: center; width: 15%"><?php print(number_format($column['junio'],0)); ?></td>
                            <?php
                            }
                            ?>
                    <?php
                    }
                    ?>    
                        
                    
                    <!-- JCV COLUMNA DEN BLANCO-->
                  <td style=" text-align: right; width: .1%; color: #ee3900;background-color: white  "> </td>
                    
                        
                        
                     <?php
                    if($column['t_2']<0){?>
                        <?php
                            if($column['nivel']==20 ){?>   
                                <td style=" text-align: center; width: 15%; color: #ee3900"><?php print(number_format($column['t_2'],2)); ?></td>
                                
                            <?php
                            }elseif($column['nivel']==21) {
                            ?>
                                <td style=" text-align: center; width: 15%; background-color: white;color:#ee3900 "><?php print(number_format($column['t_2'],0)); ?></td>

                            
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: center; width: 15%; background-color: #31859B;  color:#ee3900"><?php print(number_format($column['t_2'],0)); ?></td>
                            <?php
                            }
                            ?>
                        <?php 
                    }else {
                        ?>
                        
                        <?php
                            if($column['nivel']==20 ){?>      
                                <td style=" text-align: center; width: 15%"><?php print(number_format($column['t_2'],2)); ?></td>
                            
                            <?php
                            }elseif($column['nivel']==21) {
                            ?>
                                <td style=" text-align: center; width: 15%; background-color: white; "><?php print(number_format($column['t_2'],0)); ?></td>

                            
                                
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: center; width: 15%; background-color: #31859B;  color:white"><?php print(number_format($column['t_2'],0)); ?></td>
                            <?php
                            }
                            ?>
                    <?php
                    }
                    ?>
                    
                    
                      <!-- JCV COLUMNA DEN BLANCO-->
                  <td style=" text-align: right; width: .1%; color: #ee3900;background-color: white  "> </td>
                         
                         
                     <?php
                    if($column['total']<0){?>
                         <?php
                            if($column['nivel']==20 ){?>   
                                <td style=" text-align: center; width: 15%; color: #ee3900"><?php print(number_format($column['total'],2)); ?></td>
                                
                            <?php
                            }elseif($column['nivel']==21) {
                            ?>
                                <td style=" text-align: center; width: 15%; background-color: white;color:#ee3900 "><?php print(number_format($column['total'],0)); ?></td>

                            
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: center; width: 15%; background-color: #31859B;  color:#ee3900"><?php print(number_format($column['total'],0)); ?></td>
                            <?php
                            }
                            ?>
                        <?php 
                    }else {
                        ?>
                         
                        <?php
                            if($column['nivel']==20 ){?>      
                                <td style=" text-align: center; width: 15%"><?php print(number_format($column['total'],2)); ?></td>
                            
                            <?php
                            }elseif($column['nivel']==21) {
                            ?>
                                <td style=" text-align: center; width: 15%; background-color: white; "><?php print(number_format($column['total'],0)); ?></td>

                            
                                 
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: center; width: 15%; background-color: #31859B;  color:white"><?php print(number_format($column['total'],0)); ?></td>
                            <?php
                            }
                            ?>
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

<script type="text/javascript" src="web/custom-js/estado_de_resultados1s.js"></script>      
  