 <?php          
/*JCV OBTENIDO DEL ARCHIVO reload-cuentasdebancos.php*/ 
	function __autoload($className){
		//$model = "../../model/". $className ."_model.php";
		//$controller = "../../controller/". $className ."_controller.php";
                
                $model = "../../model/Common_size1s_model.php";
		$controller = "../../controller/Common_size1s_controller.php";   
                 
                  
		require_once($model);  
		require_once($controller);
	}
   
	$objCuentasdebancos =  new Common_size1s();  
   
 ?> 
     
   
 <div id="reload-div"> 
        <table class="table datatable-basic table-xxs table-hover">
            <thead>
                <tr>
                    <th style="visibility:collapse; display:none;">id edoresultados</th>
                    <!--<th style="text-align:center">A</th>-->
                    <th>C o n c e p t o</th>
                    <th style="text-align: center">Ene</th>
                    <th style="text-align: center">R.c.</th>
                    <th style="text-align: center">Feb</th>
                    <th style="text-align: center">R.c.</th>
                    <th style="text-align: center">Mar</th>
                    <th style="text-align: center"></th>
                    <th style="text-align: center;  background-color: #31859B;  color:white">1er. T.</th>
                    <th style="text-align: center">R.c.</th>
                    <th style="text-align: center">Abr</th>
                    <th style="text-align: center">R.c.</th>
                    <th style="text-align: center">May</th>
                    <th style="text-align: center">R.c.</th>
                    <th style="text-align: center">Jun</th>
                      <th></th>
                    <th style="text-align: center;  background-color: #31859B;  color:white">2do. T.</th>
                    <th></th>
                    <th style="text-align: center;  background-color: #31859B;  color:white">Total</th>

                </tr>
            </thead>

            <tbody> 
      
            <?php 
                $filas2 = $objCuentasdebancos->Insertar_datos_common_size1s();    
               
                $filas=$objCuentasdebancos->Listar_common_size1sP();  
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
                    
                    
                    <td style=" text-align: center; width: 15%"><?php print(number_format($column['eneroP'],2)."%"); ?></td>
                           
                    
                    
                       <!--jcv rc ene-feb        -->
                        <?php
                        if($column['nivel']==20 or $column['nivel']==18 ){?>
                            <td style=" text-align: center; width: 15%; background-color: #ffffff; color: #CD6A06"></td>
                        <?php
                        }else {
                        ?>
                            <td style=" text-align: center; width: 15%; background-color: #ffffff; color: #CD6A06"><?php print(number_format($column['rcEF'],2)."%"); ?></td>
                        <?php
                        }
                        ?>
                        
                                
                                
                                
                                
                                <!-- JCV COLUMNA DEN BLANCO
                  <td style=" text-align: right; width: .1%; color: #ee3900;background-color: white  "> </td>
                                -->
                                
                     <td style=" text-align: center; width: 15%"><?php print(number_format($column['febreroP'],2)."%"); ?></td>
                           
                    
                 <!--jcv rc feb-mar        --> 
                <?php
                    if($column['nivel']==20 or $column['nivel']==18 ){?>
                        <td style=" text-align: center; width: 15%; background-color: #ffffff; color: #CD6A06"></td>
                    <?php
                    }else {
                    ?>
                        <td style=" text-align: center; width: 15%; background-color: #ffffff; color: #CD6A06"><?php print(number_format($column['rcFM'],2)."%"); ?></td>
                    <?php
                    }
                    ?>
                                
                                
                    <!-- JCV COLUMNA DEN BLANCO
                  <td style=" text-align: right; width: .1%; color: #ee3900;background-color: white  "> </td>   
                    -->  
                      
                    <td style=" text-align: center; width: 15%"><?php print(number_format($column['marzoP'],2)."%"); ?></td>  
                               
                                
                                <!-- JCV COLUMNA DEN BLANCO-->
                  <td style=" text-align: right; width: .1%; color: #ee3900;background-color: white  "> </td>
                    
                                 
                    <?php
                    if($column['nivel']==20 ){?>      
                        <td style=" text-align: center; width: 15%"><?php print(number_format($column['1trimP'],2)."%"); ?></td>


                    <?php
                    }else {
                    ?>
                        <td style=" text-align: center; width: 15%; background-color: #31859B;  color:white"><?php print(number_format($column['1trimP'],2)."%"); ?></td>
                    <?php
                    }
                    ?>
                    
                        
                  
                                
                <!--jcv rc mar-abr        --> 
                <?php
                    if($column['nivel']==20 or $column['nivel']==18 ){?>
                        <td style=" text-align: center; width: 15%; background-color: #ffffff; color: #CD6A06"></td>
                    <?php
                    }else {
                    ?>
                        <td style=" text-align: center; width: 15%; background-color: #ffffff; color: #CD6A06"><?php print(number_format($column['rcMA'],2)."%"); ?></td>
                    <?php
                    }
                    ?>
                 
                                
                                
                    <!-- JCV COLUMNA DEN BLANCO
                  <td style=" text-align: right; width: .1%; color: #ee3900;background-color: white  "> </td>
                    -->
                    
                    <td style=" text-align: center; width: 15%"><?php print(number_format($column['abrilP'],2)."%"); ?></td>  
                  
                                 
                <!--jcv rc abr-may        --> 
                <?php
                    if($column['nivel']==20 or $column['nivel']==18 ){?>
                        <td style=" text-align: center; width: 15%; background-color: #ffffff; color: #CD6A06"></td>
                    <?php
                    }else {
                    ?>
                        <td style=" text-align: center; width: 15%; background-color: #ffffff; color: #CD6A06"><?php print(number_format($column['rcAM'],2)."%"); ?></td>
                    <?php
                    }
                    ?>                
                                
                                
                                
                    <!-- JCV COLUMNA DEN BLANCO
                  <td style=" text-align: right; width: .1%; color: #ee3900;background-color: white  "> </td>
                    -->
                    
                    <td style=" text-align: center; width: 15%"><?php print(number_format($column['mayoP'],2)."%"); ?></td>      
                    
                    
                 <!--jcv rc may-jun        --> 
                <?php
                    if($column['nivel']==20 or $column['nivel']==18 ){?>
                        <td style=" text-align: center; width: 15%; background-color: #ffffff; color: #CD6A06"></td>
                    <?php
                    }else {
                    ?>
                        <td style=" text-align: center; width: 15%; background-color: #ffffff; color: #CD6A06"><?php print(number_format($column['rcMJ'],2)."%"); ?></td>
                    <?php
                    }
                    ?>        
                                
                                
                    <!-- JCV COLUMNA DEN BLANCO
                  <td style=" text-align: right; width: .1%; color: #ee3900;background-color: white  "> </td>
                    -->
                    
                   <td style=" text-align: center; width: 15%"><?php print(number_format($column['junioP'],2)."%"); ?></td>      
                        
                    
                    <!-- JCV COLUMNA DEN BLANCO-->
                  <td style=" text-align: right; width: .1%; color: #ee3900;background-color: white  "> </td>
                    
                        
                        
                   <?php
                    if($column['nivel']==20 ){?>      
                        <td style=" text-align: center; width: 15%"><?php print(number_format($column['2trimP'],2)."%"); ?></td>


                    <?php
                    }else {
                    ?>
                        <td style=" text-align: center; width: 15%; background-color: #31859B;  color:white"><?php print(number_format($column['2trimP'],2)."%"); ?></td>
                    <?php
                    }
                    ?> 
                    
                    
                      <!-- JCV COLUMNA DEN BLANCO-->
                  <td style=" text-align: right; width: .1%; color: #ee3900;background-color: white  "> </td>
                         
                         
                    <?php
                    if($column['nivel']==20 ){?>      
                        <td style=" text-align: center; width: 15%"><?php print(number_format($column['totalP'],2)."%"); ?></td>


                    <?php
                    }else {
                    ?>
                        <td style=" text-align: center; width: 15%; background-color: #31859B;  color:white"><?php print(number_format($column['totalP'],2)."%"); ?></td>
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

<script type="text/javascript" src="web/custom-js/common_size1s.js"></script>      
  