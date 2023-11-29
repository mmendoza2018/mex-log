<?php

	function __autoload($className){
		$model = "../../model/". $className ."_model.php";
		$controller = "../../controller/". $className ."_controller.php";

		require_once($model);
		require_once($controller);
	}

	$objCuentasdebancos =  new Cuentasdebancos();

 ?>
 <table class="table datatable-basic table-xxs table-hover">
	 <thead>
		 <tr>
			<th>No</th>
                        <th>Nombre</th>
                        <th class="text-center">Saldo Inicial</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Opciones</th>
		 </tr>
	 </thead>

	 <tbody>

		 <?php
			 $filas = $objCuentasdebancos->Listar_Cuentasdebancos();
			 if (is_array($filas) || is_object($filas))
			 {
			 foreach ($filas as $row => $column)
			 {
			 ?>
				 <tr>
                                                                <td><?php print($column['id_debancos']); ?></td>
					                	<td><?php print($column['nombre']); ?></td>
                                                                <td style=" text-align: right; width: 15%"><?php print(number_format($column['saldo'],2)); ?></td>
					                	
                                                                <td class="text-center" ><?php if($column['estado'] == '1')
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
								 onclick="openCuentasdebancos('editar',
														'<?php print($column["id_debancos"]); ?>',
														'<?php print($column["codigo_debancos"]); ?>',
                                                                                                                '<?php print($column["nombre"]); ?>',
                                                                                                                '<?php print($column["saldo"]); ?>',
														'<?php print($column["estado"]); ?>')">
									<i class="icon-pencil6">
										</i> Editar</a></li>
								 <li><a
								 href="javascript:;" data-toggle="modal" data-target="#modal_iconified"
								 onclick="openCuentasdebancos('ver',
													 '<?php print($column["id_debancos"]); ?>',
                                                                                                         '<?php print($column["codigo_debancos"]); ?>',
													 '<?php print($column["nombre"]); ?>',
                                                                                                         '<?php print($column["saldo"]); ?>',
													 '<?php print($column["estado"]); ?>')">
								 <i class=" icon-eye8">
								 </i> Ver</a></li>
                                                                 
                                                                 
                                                                 <li><a id="delete_cuentasdebancos"
                                                                    data-id="<?php print($column['id_debancos']); ?>"
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

<script type="text/javascript" src="web/custom-js/cuentasdebancos.js"></script>
