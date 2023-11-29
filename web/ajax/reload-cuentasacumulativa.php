<?php

	function __autoload($className){
		$model = "../../model/". $className ."_model.php";
		$controller = "../../controller/". $className ."_controller.php";

		require_once($model);
		require_once($controller);
	}

	$objCuentasacumulativa =  new Cuentasacumulativa();

 ?>
 <table class="table datatable-basic table-xxs table-hover">
	 <thead>
		 <tr>
			<th>No</th>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Nivel</th>
                       <!-- <th>id tipo de gasto</th> -->
                        <th>Tipo de gasto</th>
                        <!-- <th>id Atributo</th>-->
                        <th>Nombre atributo</th>
                        <th>Estado</th>
			 <th class="text-center">Opciones</th>
		 </tr>
	 </thead>

	 <tbody>

		 <?php
			 $filas = $objCuentasacumulativa->Listar_Cuentasacumulativa();
			 if (is_array($filas) || is_object($filas))
			 {
			 foreach ($filas as $row => $column)
			 {
			 ?>
				 <tr>
                                                                <td><?php print($column['id_acumulativa']); ?></td>
                                                                <td><?php print($column['codigo_acumulativa']); ?></td>
					                	<td><?php print($column['nombre']); ?></td>
                                                                <td><?php print($column['nivel']); ?></td>
                                                                <!--<td><?php /*print($column['id_tipodegasto']); */?></td>-->
                                                                <td><?php print($column['nombre_tipodegasto']); ?></td>
                                                                <!--<td><?php /*print($column['id_atributo']); */?></td>-->
                                                                <td><?php print($column['nombre_atributo']); ?></td>
					                	
									 <td><?php if($column['estado'] == '1')
										 echo '<span class="label label-success label-rounded"><span
										 class="text-bold">VIGENTE</span></span>';
										 else
										 echo '<span class="label label-default label-rounded">
									 <span
											 class="text-bold">DESCONTINUADO</span></span>'
									 ?></td>
									 <td class="text-center">
					 <ul class="icons-list">
						 <li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
								 <i class="icon-menu9"></i>
							 </a>

							 <ul class="dropdown-menu dropdown-menu-right">
								 <li><a
								 href="javascript:;" data-toggle="modal" data-target="#modal_iconified"
								 onclick="openCuentasacumulativa('editar',
														'<?php print($column["id_acumulativa"]); ?>',
														'<?php print($column["codigo_acumulativa"]); ?>',
                                                                                                                '<?php print($column["nombre"]); ?>',
                                                                                                                '<?php print($column["nivel"]); ?>',
                                                                                                                '<?php /*print($column["id_tipodegasto"]);*/ ?>',
                                                                                                                '<?php print($column["nombre_tipodegasto"]); ?>',
                                                                                                                '<?php /*print($column["id_atributo"]); */?>',
                                                                                                                '<?php print($column["nombre_atributo"]); ?>',
														'<?php print($column["estado"]); ?>')">
									<i class="icon-pencil6">
										</i> Editar</a></li>
								 <li><a
								 href="javascript:;" data-toggle="modal" data-target="#modal_iconified"
								 onclick="openCuentasacumulativa('ver',
													 '<?php print($column["id_acumulativa"]); ?>',
                                                                                                         '<?php print($column["codigo_acumulativa"]); ?>',
													 '<?php print($column["nombre"]); ?>',
                                                                                                         '<?php print($column["nivel"]); ?>',
                                                                                                         '<?php /* print($column["id_tipodegasto"]); */?>',
                                                                                                         '<?php print($column["nombre_tipodegasto"]); ?>',
                                                                                                         '<?php /*print($column["id_atributo"]); */?>',
                                                                                                         '<?php print($column["nombre_atributo"]); ?>',
													 '<?php print($column["estado"]); ?>')">
								 <i class=" icon-eye8">
								 </i> Ver</a></li>
                                                                 
                                                                 
                                                                 <li><a id="delete_cuentasacumulativa"
                                                                    data-id="<?php print($column['id_acumulativa']); ?>"
                                                                    href="javascript:void(0)">
                                                                    <i class=" icon-trash">
                                                                    </i> Borrar</a>
                                                                 </li>
                                                                 
                                                                 
                                                                 
							 </ul>
						 </li>
					 </ul>
				 </td>
								 </tr>
			 <?php
			 }
		 }
		 ?>

	 </tbody>
 </table>

<script type="text/javascript" src="web/custom-js/cuentasacumulativa.js"></script>
