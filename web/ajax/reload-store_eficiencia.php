 <?php         
/*JCV OBTENIDO DEL ARCHIVO reload-cuentasdebancos.php*/ 
	function __autoload($className){
		//$model = "../../model/". $className ."_model.php";
		//$controller = "../../controller/". $className ."_controller.php";
                
                $model = "../../model/Reporte-store_eficiencia_model.php"; 
		$controller = "../../controller/Reporte-store_eficiencia_controller.php";   
                 
                  
		require_once($model); 
		require_once($controller);
	}
  
	$objCuentasdebancos =  new Reporteeficiencia(); 

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
                $filas2 = $objCuentasdebancos->Insertar_datos_eficiencia();      
               
                $filas=$objCuentasdebancos->Listar_eficiencia();  
                if (is_array($filas) || is_object($filas))
                {
                foreach ($filas as $row => $column)
                {
   
                                     
            ?> 
                <tr> 
                   
                    
                     
                    <td><?php print($column['cuenta']); ?></td>
                    
                    <?php
                    if($column['enero']<0){?>
                        <?php
                            if($column['nivel']>=601 and $column['nivel']<=606){?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['enero'],0)); ?>%</td>
                            <?php  
                            }elseif(($column['nivel']>=607 and $column['nivel']<=608) or ($column['nivel']>=611 and $column['nivel']<=615) or ($column['nivel']==621)) {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['enero'],0)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['enero'],2)); ?></td>
                            <?php
                            }
                            ?>
                                
                        <?php 
                    }else { 
                        ?>
                        
                        <?php
                            if($column['nivel']>=601 and $column['nivel']<=606){?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['enero'],0)); ?>%</td>
                            <?php
                           }elseif(($column['nivel']>=607 and $column['nivel']<=608) or ($column['nivel']>=611 and $column['nivel']<=615) or ($column['nivel']==621)) {
                            ?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['enero'],0)); ?></td>
                            <?php    
                            }else {
                            ?>
                             <td style=" text-align: right; width: 15%"><?php print(number_format($column['enero'],2)); ?></td>
                            <?php
                            }
                            ?>   
                       
                        
                    <?php
                    }
                    ?>
                    
                    <?php
                    if($column['febrero']<0){?>
                        <?php
                            if($column['nivel']>=601 and $column['nivel']<=606){?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['febrero'],0)); ?>%</td>
                            <?php
                            }elseif(($column['nivel']>=607 and $column['nivel']<=608) or ($column['nivel']>=611 and $column['nivel']<=615) or ($column['nivel']==621)) {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['febrero'],0)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['febrero'],2)); ?></td>
                            <?php
                            }
                            ?>
                                
                        <?php 
                    }else { 
                        ?>
                        
                        <?php
                            if($column['nivel']>=601 and $column['nivel']<=606){?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['febrero'],0)); ?>%</td>
                            <?php
                            }elseif(($column['nivel']>=607 and $column['nivel']<=608) or ($column['nivel']>=611 and $column['nivel']<=615) or ($column['nivel']==621)) {
                            ?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['febrero'],0)); ?></td>
                            <?php    
                            }else {
                            ?>
                             <td style=" text-align: right; width: 15%"><?php print(number_format($column['febrero'],2)); ?></td>
                            <?php
                            }
                            ?>   
                       
                        
                    <?php
                    }
                    ?>
                    
                     <?php
                    if($column['marzo']<0){?>
                        <?php
                            if($column['nivel']>=601 and $column['nivel']<=606){?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['marzo'],0)); ?>%</td>
                            <?php
                            }elseif(($column['nivel']>=607 and $column['nivel']<=608) or ($column['nivel']>=611 and $column['nivel']<=615) or ($column['nivel']==621)) {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['marzo'],0)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['marzo'],2)); ?></td>
                            <?php
                            }
                            ?>
                                
                        <?php 
                    }else { 
                        ?>
                        
                        <?php
                            if($column['nivel']>=601 and $column['nivel']<=606){?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['marzo'],0)); ?>%</td>
                            <?php
                            }elseif(($column['nivel']>=607 and $column['nivel']<=608) or ($column['nivel']>=611 and $column['nivel']<=615) or ($column['nivel']==621)) {
                            ?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['marzo'],0)); ?></td>
                            <?php    
                            }else {
                            ?>
                             <td style=" text-align: right; width: 15%"><?php print(number_format($column['marzo'],2)); ?></td>
                            <?php
                            }
                            ?>   
                       
                        
                    <?php
                    }
                    ?>
                    
                        
                        
                    <?php
                    if($column['abril']<0){?>
                        <?php
                            if($column['nivel']>=601 and $column['nivel']<=606){?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['abril'],0)); ?>%</td>
                            <?php
                            }elseif(($column['nivel']>=607 and $column['nivel']<=608) or ($column['nivel']>=611 and $column['nivel']<=615) or ($column['nivel']==621)) {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['abril'],0)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['abril'],2)); ?></td>
                            <?php
                            }
                            ?>
                                
                        <?php 
                    }else { 
                        ?>
                        
                        <?php
                            if($column['nivel']>=601 and $column['nivel']<=606){?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['abril'],0)); ?>%</td>
                            <?php
                            }elseif(($column['nivel']>=607 and $column['nivel']<=608) or ($column['nivel']>=611 and $column['nivel']<=615) or ($column['nivel']==621)) {
                            ?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['abril'],0)); ?></td>
                            <?php    
                            }else {
                            ?>
                             <td style=" text-align: right; width: 15%"><?php print(number_format($column['abril'],2)); ?></td>
                            <?php
                            }
                            ?>   
                       
                        
                    <?php
                    }
                    ?>
                    
                        
                    <?php
                    if($column['mayo']<0){?>
                        <?php
                            if($column['nivel']>=601 and $column['nivel']<=606){?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['mayo'],0)); ?>%</td>
                            <?php
                            }elseif(($column['nivel']>=607 and $column['nivel']<=608) or ($column['nivel']>=611 and $column['nivel']<=615) or ($column['nivel']==621)) {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['mayo'],0)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['mayo'],2)); ?></td>
                            <?php
                            }
                            ?>
                                
                        <?php 
                    }else { 
                        ?>
                        
                        <?php
                            if($column['nivel']>=601 and $column['nivel']<=606){?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['mayo'],0)); ?>%</td>
                            <?php
                            }elseif(($column['nivel']>=607 and $column['nivel']<=608) or ($column['nivel']>=611 and $column['nivel']<=615) or ($column['nivel']==621)) {
                            ?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['mayo'],0)); ?></td>
                            <?php    
                            }else {
                            ?>
                             <td style=" text-align: right; width: 15%"><?php print(number_format($column['mayo'],2)); ?></td>
                            <?php
                            }
                            ?>   
                       
                        
                    <?php
                    }
                    ?>
                    
                    
                    <?php
                    if($column['junio']<0){?>
                        <?php
                            if($column['nivel']>=601 and $column['nivel']<=606){?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['junio'],0)); ?>%</td>
                            <?php
                            }elseif(($column['nivel']>=607 and $column['nivel']<=608) or ($column['nivel']>=611 and $column['nivel']<=615) or ($column['nivel']==621)) {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['junio'],0)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['junio'],2)); ?></td>
                            <?php
                            }
                            ?>
                                
                        <?php 
                    }else { 
                        ?>
                        
                        <?php
                            if($column['nivel']>=601 and $column['nivel']<=606){?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['junio'],0)); ?>%</td>
                            <?php
                            }elseif(($column['nivel']>=607 and $column['nivel']<=608) or ($column['nivel']>=611 and $column['nivel']<=615) or ($column['nivel']==621)) {
                            ?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['junio'],0)); ?></td>
                            <?php    
                            }else {
                            ?>
                             <td style=" text-align: right; width: 15%"><?php print(number_format($column['junio'],2)); ?></td>
                            <?php
                            }
                            ?>   
                       
                        
                    <?php
                    }
                    ?>  
                        
                    
                    <?php
                    if($column['julio']<0){?>
                        <?php
                            if($column['nivel']>=601 and $column['nivel']<=606){?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['julio'],0)); ?>%</td>
                            <?php
                            }elseif(($column['nivel']>=607 and $column['nivel']<=608) or ($column['nivel']>=611 and $column['nivel']<=615) or ($column['nivel']==621)) {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['julio'],0)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['julio'],2)); ?></td>
                            <?php
                            }
                            ?>
                                
                        <?php 
                    }else { 
                        ?>
                        
                        <?php
                            if($column['nivel']>=601 and $column['nivel']<=606){?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['julio'],0)); ?>%</td>
                            <?php
                            }elseif(($column['nivel']>=607 and $column['nivel']<=608) or ($column['nivel']>=611 and $column['nivel']<=615) or ($column['nivel']==621)) {
                            ?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['julio'],0)); ?></td>
                            <?php    
                            }else {
                            ?>
                             <td style=" text-align: right; width: 15%"><?php print(number_format($column['julio'],2)); ?></td>
                            <?php
                            }
                            ?>   
                       
                        
                    <?php
                    }
                    ?>  
                        
                        
                      <?php
                    if($column['agosto']<0){?>
                        <?php
                            if($column['nivel']>=601 and $column['nivel']<=606){?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['agosto'],0)); ?>%</td>
                            <?php
                            }elseif(($column['nivel']>=607 and $column['nivel']<=608) or ($column['nivel']>=611 and $column['nivel']<=615) or ($column['nivel']==621)) {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['agosto'],0)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['agosto'],2)); ?></td>
                            <?php
                            }
                            ?>
                                
                        <?php 
                    }else { 
                        ?>
                        
                        <?php
                            if($column['nivel']>=601 and $column['nivel']<=606){?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['agosto'],0)); ?>%</td>
                            <?php
                            }elseif(($column['nivel']>=607 and $column['nivel']<=608) or ($column['nivel']>=611 and $column['nivel']<=615) or ($column['nivel']==621)) {
                            ?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['agosto'],0)); ?></td>
                            <?php    
                            }else {
                            ?>
                             <td style=" text-align: right; width: 15%"><?php print(number_format($column['agosto'],2)); ?></td>
                            <?php
                            }
                            ?>   
                       
                        
                    <?php
                    }
                    ?> 
                    
                    
                        <?php
                    if($column['septiembre']<0){?>
                        <?php
                            if($column['nivel']>=601 and $column['nivel']<=606){?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['septiembre'],0)); ?>%</td>
                            <?php
                            }elseif(($column['nivel']>=607 and $column['nivel']<=608) or ($column['nivel']>=611 and $column['nivel']<=615) or ($column['nivel']==621)) {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['septiembre'],0)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['septiembre'],2)); ?></td>
                            <?php
                            }
                            ?>
                                
                        <?php 
                    }else { 
                        ?>
                        
                        <?php
                            if($column['nivel']>=601 and $column['nivel']<=606){?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['septiembre'],0)); ?>%</td>
                            <?php
                            }elseif(($column['nivel']>=607 and $column['nivel']<=608) or ($column['nivel']>=611 and $column['nivel']<=615) or ($column['nivel']==621)) {
                            ?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['septiembre'],0)); ?></td>
                            <?php    
                            }else {
                            ?>
                             <td style=" text-align: right; width: 15%"><?php print(number_format($column['septiembre'],2)); ?></td>
                            <?php
                            }
                            ?>   
                       
                        
                    <?php
                    }
                    ?> 
                    
                        
                      <?php
                    if($column['octubre']<0){?>
                        <?php
                            if($column['nivel']>=601 and $column['nivel']<=606){?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['octubre'],0)); ?>%</td>
                            <?php
                            }elseif(($column['nivel']>=607 and $column['nivel']<=608) or ($column['nivel']>=611 and $column['nivel']<=615) or ($column['nivel']==621)) {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['octubre'],0)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['octubre'],2)); ?></td>
                            <?php
                            }
                            ?>
                                
                        <?php 
                    }else { 
                        ?>
                        
                        <?php
                            if($column['nivel']>=601 and $column['nivel']<=606){?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['octubre'],0)); ?>%</td>
                            <?php
                            }elseif(($column['nivel']>=607 and $column['nivel']<=608) or ($column['nivel']>=611 and $column['nivel']<=615) or ($column['nivel']==621)) {
                            ?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['octubre'],0)); ?></td>
                            <?php    
                            }else {
                            ?>
                             <td style=" text-align: right; width: 15%"><?php print(number_format($column['octubre'],2)); ?></td>
                            <?php
                            }
                            ?>   
                       
                        
                    <?php
                    }
                    ?> 
                    
                    
                        <?php
                    if($column['noviembre']<0){?>
                        <?php
                            if($column['nivel']>=601 and $column['nivel']<=606){?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['noviembre'],0)); ?>%</td>
                            <?php
                           }elseif(($column['nivel']>=607 and $column['nivel']<=608) or ($column['nivel']>=611 and $column['nivel']<=615) or ($column['nivel']==621)) {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['noviembre'],0)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['noviembre'],2)); ?></td>
                            <?php
                            }
                            ?>
                                
                        <?php 
                    }else { 
                        ?>
                        
                        <?php
                            if($column['nivel']>=601 and $column['nivel']<=606){?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['noviembre'],0)); ?>%</td>
                            <?php
                            }elseif(($column['nivel']>=607 and $column['nivel']<=608) or ($column['nivel']>=611 and $column['nivel']<=615) or ($column['nivel']==621)) {
                            ?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['noviembre'],0)); ?></td>
                            <?php    
                            }else {
                            ?>
                             <td style=" text-align: right; width: 15%"><?php print(number_format($column['noviembre'],2)); ?></td>
                            <?php
                            }
                            ?>   
                       
                        
                    <?php
                    }
                    ?> 
                        
                    
                    <?php
                    if($column['diciembre']<0){?>
                        <?php
                            if($column['nivel']>=601 and $column['nivel']<=606){?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['diciembre'],0)); ?>%</td>
                            <?php
                            }elseif(($column['nivel']>=607 and $column['nivel']<=608) or ($column['nivel']>=611 and $column['nivel']<=615) or ($column['nivel']==621)) {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['diciembre'],0)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['diciembre'],2)); ?></td>
                            <?php
                            }
                            ?>
                                
                        <?php 
                    }else { 
                        ?>
                        
                        <?php
                            if($column['nivel']>=601 and $column['nivel']<=606){?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['diciembre'],0)); ?>%</td>
                            <?php
                            }elseif(($column['nivel']>=607 and $column['nivel']<=608) or ($column['nivel']>=611 and $column['nivel']<=615) or ($column['nivel']==621)) {
                            ?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['diciembre'],0)); ?></td>
                            <?php    
                            }else {
                            ?>
                             <td style=" text-align: right; width: 15%"><?php print(number_format($column['diciembre'],2)); ?></td>
                            <?php
                            }
                            ?>   
                       
                        
                    <?php
                    }
                    ?> 
                        
                    
                    <?php
                    if($column['acumulado']<0){?>
                        <?php
                            if($column['nivel']>=601 and $column['nivel']<=606){?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['acumulado'],0)); ?>%</td>
                            <?php
                            }elseif(($column['nivel']>=607 and $column['nivel']<=608) or ($column['nivel']>=611 and $column['nivel']<=615) or ($column['nivel']==621)) {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['acumulado'],0)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['acumulado'],2)); ?></td>
                            <?php
                            }
                            ?>
                                
                        <?php 
                    }else { 
                        ?>
                        
                        <?php
                            if($column['nivel']>=601 and $column['nivel']<=606){?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['acumulado'],0)); ?>%</td>
                            <?php
                            }elseif(($column['nivel']>=607 and $column['nivel']<=608) or ($column['nivel']>=611 and $column['nivel']<=615) or ($column['nivel']==621)) {
                            ?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['acumulado'],0)); ?></td>
                            <?php    
                            }else {
                            ?>
                             <td style=" text-align: right; width: 15%"><?php print(number_format($column['acumulado'],2)); ?></td>
                            <?php
                            }
                            ?>   
                       
                        
                    <?php
                    }
                    ?> 
                        
                    
                             
                    <?php
                    if($column['promedio']<0){?>
                        <?php
                            if($column['nivel']>=601 and $column['nivel']<=608){?>
                                
                            <?php
                            }elseif(($column['nivel']>=611 and $column['nivel']<=615) or ($column['nivel']==621)) {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['promedio'],0)); ?></td>
                            <?php
                            }else {
                            ?>
                                <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['promedio'],2)); ?></td>
                            <?php
                            }
                            ?>
                                
                        <?php 
                    }else { 
                        ?>
                        
                        <?php
                           if($column['nivel']>=601 and $column['nivel']<=608){?>
                                
                            <?php
                             }elseif(($column['nivel']>=611 and $column['nivel']<=615) or ($column['nivel']==621)) {
                            ?>
                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['promedio'],0)); ?></td>
                            <?php    
                            }else {
                            ?>
                             <td style=" text-align: right; width: 15%"><?php print(number_format($column['promedio'],2)); ?></td>
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

<script type="text/javascript" src="web/custom-js/reporte-store-eficiencia.js"></script>      
  