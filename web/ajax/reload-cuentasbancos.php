<?php

	function __autoload($className){
		$model = "../../model/". $className ."_model.php";
		$controller = "../../controller/". $className ."_controller.php";

		require_once($model);
		require_once($controller);
	}

	$objCliente =  new Cuentasbancos();

 ?>
 <table class="table datatable-basic table-xxs table-hover">
	 <thead>
		 <tr>
			<th>No</th>
                        <th>Fecha</th>
                        <th>Concepto</th>
                        <th>Ingreso</th>
                        <th>Dirección</th>
                        <th>Egreso</th>
                        <th>Saldo</th>
                        <th>Cuenta</th>
                        <th>Estado</th>
			 <th class="text-center">Opciones</th>
		 </tr>
	 </thead>

	 <tbody>

		 <?php
			 $filas = $objCliente->Listar_Clientes();
			 if (is_array($filas) || is_object($filas))
			 {
			 foreach ($filas as $row => $column)
			 {
			 ?>
				 <tr>
                                                                <td><?php print($column['idcliente']); ?></td>
					                	<td><?php print($column['fecha']); ?></td>
					                	<td><?php print($column['concepto']); ?></td>
					                	<td><?php print($column['ingreso']); ?></td>
                                                                <td><?php print($column['direccion']); ?></td>
                                                                <td><?php print($column['egreso']); ?></td>
                                                                <td><?php print($column['saldo']); ?></td>
                                                                <td><?php print($column['cuenta']); ?></td>
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
								 onclick="openCliente('editar',
														'<?php print($column["idcliente"]); ?>',
														'<?php print($column["codigo_cliente"]); ?>',
														'<?php print($column["fecha"]); ?>',
														'<?php print($column["concepto"]); ?>',
														'<?php print($column["ingreso"]); ?>',
														'<?php print($column["direccion"]); ?>',
														'<?php print($column["egreso"]); ?>',
														'<?php print($column["saldo"]); ?>',
														'<?php print($column["observaciones"]); ?>',
														'<?php print($column["cuenta"]); ?>',
														'<?php print($column["estado"]); ?>')">
									<i class="icon-pencil6">
										</i> Editar</a></li>
								 <li><a
								 href="javascript:;" data-toggle="modal" data-target="#modal_iconified"
								 onclick="openCliente('ver',
													 '<?php print($column["idcliente"]); ?>',
													 '<?php print($column["codigo_cliente"]); ?>',
													 '<?php print($column["fecha"]); ?>',
													 '<?php print($column["concepto"]); ?>',
													 '<?php print($column["ingreso"]); ?>',
													 '<?php print($column["direccion"]); ?>',
													 '<?php print($column["egreso"]); ?>',
													 '<?php print($column["saldo"]); ?>',
													 '<?php print($column["observaciones"]); ?>',
													 '<?php print($column["cuenta"]); ?>',
													 '<?php print($column["estado"]); ?>')">
								 <i class=" icon-eye8">
								 </i> Ver</a></li>
                                                                 
                                                                 
                                                                 <li><a id="delete_clientes"
                                                                    data-id="<?php print($column['idcliente']); ?>"
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

<script type="text/javascript" src="web/custom-js/cuentasbancos.js"></script>
