 
  
 
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

 
<div id="reload-div">  
    <table class="table datatable-basic table-xxs table-hover">
	  <thead style="position: sticky; top: 0; background-color: #E0F7FA">
		 <tr>
                    <th style="visibility:collapse; display:none;">id acumulativa</th>
                        <th style="text-align:center">At</th>
                        <th>Nombre de la cuenta</th>
                        <th style="text-align: right">Enero</th>
                        <th style="text-align: right" >Febrero</th>
                        <th style="text-align: right" >Marzo</th>
                        <th style="text-align: right" >1 Trim.</th>
                        <th style="text-align: right" >Abril</th>
                        <th style="text-align: right" >Mayo</th>
                        <th style="text-align: right" >Junio</th>
                        <th style="text-align: right" >2 Trim.</th>
                        <th style="text-align: right" >1 Sem.</th>
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
                $filas2 = $objCuentasdebancos->Insertar_datos_flujo();
               // exit();

                $filas=$objCuentasdebancos->Listar_Flujo_de_efectivo();
                if (is_array($filas) || is_object($filas))
                {
                foreach ($filas as $row => $column)
                {
                    
                    
                    if($column['nivel']==68 ){
                       
                    ?> 
                        <tr>
                            <td></td>
                            
                             
                        </tr>
                         
                            <td style=" text-align:center; border-top:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:left; font-weight: bold; background-color: #D8D8D8; border-top:2px solid #1F323F; border-right:2px solid #1F323F; "><?php print("Cuentas x cobrar"); ?></td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            
                        
                    <?php
                    }elseif ($column['nivel']==74) {
                     ?>  
                        <tr>
                            <td></td>
                            
                            
                        </tr>
                         
                            <td style=" text-align:center; border-top:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:left; font-weight: bold; background-color: #D8D8D8; border-top:2px solid #1F323F; border-right:2px solid #1F323F; "><?php print("Proveedores"); ?></td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                           
                    <?php    
                    }elseif ($column['nivel']==80) {
                    ?>
                            <tr>
                            <td></td>
                            
                            
                        </tr>
                         
                            <td style=" text-align:center; border-top:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:left; font-weight: bold; background-color: #D8D8D8; border-top:2px solid #1F323F; border-right:2px solid #1F323F; "><?php print("Inventarios (stock)"); ?></td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                             
                         
                    <?php
                    }elseif ($column['nivel']==85) {
                    ?>
                        <tr>
                            <td></td>
                            
                            
                        </tr>
                         
                            <td style=" text-align:center; border-top:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:left; font-weight: bold; background-color: #D8D8D8; border-top:2px solid #1F323F; border-right:2px solid #1F323F; "><?php print("Inventarios servicio"); ?></td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            
                    <?php    
                    }elseif ($column['nivel']==90) {
                    ?>
                            <tr>
                            <td></td>
                            
                            
                        </tr>
                         
                            <td style=" text-align:center; border-top:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:left; font-weight: bold; background-color: #D8D8D8; border-top:2px solid #1F323F; border-right:2px solid #1F323F; "><?php print("Inventarios en transito"); ?></td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            <td style=" text-align:center; border-bottom:2px solid #1F323F;  "> </td> 
                            
                    <?php    
                    }else {
                    ?>
                    
                        
                    <?php    
                    }
                    ?> 
                
                            
               <?php //JCV PARA PONER EN NEGRITAS DIFERENTES CUENTAS, CON BASE AL REPORTE FLUJO DE EFECTIVO, PONEMOS EN NEGRITAS TODO EL RENGLON
                if($column['nivel']==0 or $column['nivel']==1 or $column['nivel']==4 or $column['nivel']==40 or $column['nivel']==54 or $column['nivel']==57 or $column['nivel']==64){
                ?>        
                    <tr style="font-weight: bold">
                        
                <?php }else {
                    ?>
                     <tr style="font-weight: normal">
                <?php
                }
                ?>
                            
                
                    <?php //JCV PARA PONERLE LA INICIAL DEL ATRIBUTO A CIERTAS CUENTAS
                        if($column['nivel']>=5 and $column['nivel']<=39){
                    ?>
                    <td style=" text-align:center"><?php print(substr($column['nombre_atributo'],0,1)); ?></td> 
                    <?php }else{ ?>
                        <td style=" text-align:center"> </td> 
                    <?php }?>
                        
               
                        
                    <td><?php print($column['cuenta_acumulativa']); ?></td>
                    
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
                        <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['febrero'],0)); ?></td>
                        <?php
                    }else {
                        ?>
                        <td style=" text-align: right; width: 15%"><?php print(number_format($column['febrero'],0)); ?></td>
                        
                    <?php
                    }
                    ?>
                    
                    <?php
                    if($column['marzo']<0){?>
                        
                        <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['marzo'],0)); ?></td>
                        <?php
                    }else {
                        ?>
                        <td style=" text-align: right; width: 15%"><?php print(number_format($column['marzo'],0)); ?></td>
                        
                    <?php
                    }
                    ?> 
                    
                    <!--JCV PARA PRIMER TRIMESTRE-->
                    <?php
                    if($column['t_1']<0){?>
                        
                        <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['t_1'],0)); ?></td>
                        <?php
                    }else {
                        ?>
                        <td style=" text-align: right; width: 15%"><?php print(number_format($column['t_1'],0)); ?></td>
                        
                    <?php
                    }
                    ?>
                        
                        
                        
                    <?php
                    if($column['abril']<0){?>
                        
                        <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['abril'],0)); ?></td>
                        <?php
                    }else {
                        ?>
                        <td style=" text-align: right; width: 15%"><?php print(number_format($column['abril'],0)); ?></td>
                        
                    <?php
                    }
                    ?>
                    
                        
                    <?php
                    if($column['mayo']<0){?>
                        <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['mayo'],0)); ?></td>
                        <?php
                    }else {
                        ?>
                        <td style=" text-align: right; width: 15%"><?php print(number_format($column['mayo'],0)); ?></td>
                        
                    <?php
                    }
                    ?>
                    
                    
                    <?php
                    if($column['junio']<0){?>
                        <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['junio'],0)); ?></td>
                        <?php
                    }else {
                        ?>
                        <td style=" text-align: right; width: 15%"><?php print(number_format($column['junio'],0)); ?></td>
                        
                    <?php
                    }
                    ?>    
                        
                        
                         <!--JCV PARA SEGUNDO TRIMESTRE-->
                    <?php
                    if($column['t_2']<0){?>
                        
                        <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['t_2'],0)); ?></td>
                        <?php
                    }else {
                        ?>
                        <td style=" text-align: right; width: 15%"><?php print(number_format($column['t_2'],0)); ?></td>
                        
                    <?php
                    }
                    ?>
                        
                        
                     <!--JCV PARA PRIMER SEMESTRE-->
                    <?php
                    if($column['s_1']<0){?>
                        
                        <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['s_1'],0)); ?></td>
                        <?php
                    }else {
                        ?>
                        <td style=" text-align: right; width: 15%"><?php print(number_format($column['s_1'],0)); ?></td>
                        
                    <?php
                    }
                    ?>    
                        
                        
                    
                    <?php
                    if($column['julio']<0){?>
                        <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['julio'],0)); ?></td>
                        <?php
                    }else {
                        ?>
                        <td style=" text-align: right; width: 15%"><?php print(number_format($column['julio'],0)); ?></td>
                        
                    <?php
                    }
                    ?>
                        
                        
                     <?php
                    if($column['agosto']<0){?>
                        <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['agosto'],0)); ?></td>
                        <?php
                    }else {
                        ?>
                         <td style=" text-align: right; width: 15%"><?php print(number_format($column['agosto'],0)); ?></td>
                        
                    <?php
                    }
                    ?>
                    
                    
                        <?php
                    if($column['septiembre']<0){?>
                        <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['septiembre'],0)); ?></td>
                        <?php
                    }else {
                        ?>
                        <td style=" text-align: right; width: 15%"><?php print(number_format($column['septiembre'],0)); ?></td>
                        
                    <?php
                    }
                    ?>
                   
                        
                     <?php
                    if($column['octubre']<0){?>
                        <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['octubre'],0)); ?></td>
                        <?php
                    }else {
                        ?>
                        <td style=" text-align: right; width: 15%"><?php print(number_format($column['octubre'],0)); ?></td>
                        
                    <?php
                    }
                    ?>
                    
                    
                         <?php
                    if($column['noviembre']<0){?>
                       <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['noviembre'],0)); ?></td>
                        <?php
                    }else {
                        ?>
                        <td style=" text-align: right; width: 15%"><?php print(number_format($column['noviembre'],0)); ?></td>
                        
                    <?php
                    } 
                    ?>
                         
                    
                    <?php
                    if($column['diciembre']<0){?>
                        <td style=" text-align: right; width: 15%; color: #ee3900"><?php print(number_format($column['diciembre'],0)); ?></td>
                        <?php
                    }else {
                        ?>
                        <td style=" text-align: right; width: 15%"><?php print(number_format($column['diciembre'],0)); ?></td>
                        
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
