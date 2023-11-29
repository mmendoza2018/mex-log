<?php

	function __autoload($className){
		$model = "../../model/". $className ."_model.php";
		$controller = "../../controller/". $className ."_controller.php";

		require_once($model);
		require_once($controller);
	}

	$objCuentasatributos =  new Cuentasatributos();

 ?>
 <table class="table datatable-basic table-xxs table-hover">
	 <thead>
		 <tr>
			<th>No</th>
                        <th>Nombre</th>
                        <th>Estado</th>
			 <th class="text-center">Opciones</th>
		 </tr>
	 </thead>

	 <tbody>

		 <?php
			 $filas = $objCuentasatributos->Listar_Cuentasatributos();
			 if (is_array($filas) || is_object($filas))
			 {
			 foreach ($filas as $row => $column)
			 {
			 ?>
				 <tr>
                                                                <td><?php print($column['id_atributo']); ?></td>
					                	<td><?php print($column['nombre']); ?></td>
					                	
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
								 onclick="openCuentasatributo('editar',
														'<?php print($column["id_atributo"]); ?>',
														'<?php print($column["codigo_atributo"]); ?>',
                                                                                                                '<?php print($column["nombre"]); ?>',
														'<?php print($column["estado"]); ?>')">
									<i class="icon-pencil6">
										</i> Editar</a></li>
								 <li><a
								 href="javascript:;" data-toggle="modal" data-target="#modal_iconified"
								 onclick="openCuentasatributo('ver',
													 '<?php print($column["id_atributo"]); ?>',
                                                                                                         '<?php print($column["codigo_atributo"]); ?>',
													 '<?php print($column["nombre"]); ?>',
													 '<?php print($column["estado"]); ?>')">
								 <i class=" icon-eye8">
								 </i> Ver</a></li>
                                                                 
                                                                 
                                                                 <li><a id="delete_cuentasatributos"
                                                                    data-id="<?php print($column['id_atributo']); ?>"
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

<script type="text/javascript" src="web/custom-js/cuentasatributos.js"></script>
