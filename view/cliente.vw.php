<?php

	$objCliente =  new Cliente();

?> 

			<!-- Basic initialization -->
			<div class="panel panel-flat">
				<div class="breadcrumb-line">
					<ul class="breadcrumb">
						<li><a href="?View=Inicio"><i class="icon-home2 position-left"></i> Inicio</a></li>
						<li><a href="javascript:;">Ventas</a></li>
						<li class="active">Clientes</li>
					</ul>
				</div>
					<div class="panel-heading">
						<h5 class="panel-title">Clientes</h5>

						<div class="heading-elements">
							<button type="button" class="btn btn-primary heading-btn"
							onclick="newCliente()">
							<i class="icon-database-add"></i> Agregar Nuevo/a</button>

							<div class="btn-group">
		                    	<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
		                    	<i class="icon-printer2 position-left"></i> Imprimir Reporte
		                    	<span class="caret"></span></button>
		                    	<ul class="dropdown-menu dropdown-menu-right">
									<li><a id="print_activos" href="javascript:void(0)"
									><i class="icon-file-pdf"></i> Clientes Activos</a></li>
									<li class="divider"></li>
									<li><a id="print_inactivos" href="javascript:void(0)">
									<i class="icon-file-pdf"></i> Clientes Inactivos</a></li>
								</ul>
							</div>


						</div>
					</div>
					<div class="panel-body">
					</div>
					<div id="reload-div">
					<table class="table datatable-basic table-xxs table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Cliente</th>
								<th>Whats app</th>
								<th>Telefono</th>
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
					                	<td><?php print($column['codigo_cliente']); ?></td>
					                	<td><?php print($column['nombre_cliente']); ?></td>
					                	<td><?php print($column['telefono_cliente']); ?></td>
					                	<td><?php print($column['numero_telefono']); ?></td>
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
								                     '<?php print($column["nombre_cliente"]); ?>',
								                     '<?php print($column["telefono_cliente"]); ?>',
                                                                                    '<?php print($column["rfc"]); ?>',
								                     '<?php print($column["direccion_cliente"]); ?>',
								                     '<?php print($column["numero_telefono"]); ?>',
								                     '<?php print($column["email"]); ?>',
                                                                                    '<?php print($column["direccion_entrega1"]); ?>',
                                                                                    '<?php print($column["direccion_entrega2"]); ?>',
                                                                                    '<?php print($column["encargado"]); ?>',
                                                                                    '<?php print($column["celular_encargado"]); ?>',
                                                                                    '<?php print($column["fecha_nacimiento"]); ?>',
                                                                                    
                                                                                    
								                     '<?php print($column["estado"]); ?>')">
												   <i class="icon-pencil6">
											       </i> Editar</a></li>
													<li><a
													href="javascript:;" data-toggle="modal" data-target="#modal_iconified"
													onclick="openCliente('ver',
																		'<?php print($column["idcliente"]); ?>',
																		'<?php print($column["codigo_cliente"]); ?>',
																		'<?php print($column["nombre_cliente"]); ?>',
																		'<?php print($column["telefono_cliente"]); ?>',
																		'<?php print($column["rfc"]); ?>',
																		'<?php print($column["direccion_cliente"]); ?>',
																		'<?php print($column["numero_telefono"]); ?>',
																		'<?php print($column["email"]); ?>',
																		'<?php print($column["direccion_entrega1"]); ?>',
                                                                                                                                                '<?php print($column["direccion_entrega2"]); ?>',
                                                                                                                                                '<?php print($column["encargado"]); ?>',
                                                                                                                                                '<?php print($column["celular_encargado"]); ?>',
                                                                                                                                                '<?php print($column["fecha_nacimiento"]); ?>',
																		
																		'<?php print($column["estado"]); ?>')">
													<i class=" icon-eye8">
													</i> Ver</a></li>
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
					</div>
				</div>

			<!-- Iconified modal -->
				<div id="modal_iconified" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h5 class="modal-title"><i class="icon-pencil7"></i> &nbsp; <span class="title-form"></span></h5>
							</div>

					        <form role="form" autocomplete="off" class="form-validate-jquery" id="frmModal">
								<div class="modal-body" id="modal-container">

								<div class="alert alert-info alert-styled-left text-blue-800 content-group">
						                <span class="text-semibold">Estimado usuario</span>
						                Los campos remarcados con <span class="text-danger"> * </span> son necesarios.
						                <button type="button" class="close" data-dismiss="alert">×</button>
						                <input type="hidden" id="txtID" name="txtID" class="form-control" value="">
                          	<input type="hidden" id="txtProceso" name="txtProceso" class="form-control" value="">
						           </div>


						           <div class="form-group">
										<div class="row">
											<div class="col-sm-6">
												<label>Codigo</label>
												<input type="text" id="txtCodigo" name="txtCodigo" placeholder="AUTOGENERADO"
												 class="form-control" style="text-transform:uppercase;"
                                        		onkeyup="javascript:this.value=this.value.toUpperCase();" >
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<label>Nombre Cliente / Empresa <span class="text-danger">*</span></label>
												<input type="text" id="txtNombre" name="txtNombre" placeholder="EJ. JUAN CARLOS VAZQUEZ/ DATA TRAVEL"
												 class="form-control" style="text-transform:uppercase;"
                                        		onkeyup="javascript:this.value=this.value.toUpperCase();">
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">

											<div class="col-sm-6">
												<label>Whats app</label>
												<input type="text" id="txtNIT" name="txtNIT" placeholder="EJ. 55 5678 2698"
												 class="form-control" style="text-transform:uppercase;"
                                        		onkeyup="javascript:this.value=this.value.toUpperCase();">
											</div>

											<div class="col-sm-6">
												<label>RFC</label>
												<input type="text" id="txtNRC" name="txtNRC" placeholder="EJ. VAX981026MY6"
												 class="form-control" style="text-transform:uppercase;"
																						onkeyup="javascript:this.value=this.value.toUpperCase();">
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-6">
												<label>Telefono</label>
												<input type="text" id="txtTelefono" name="txtTelefono" placeholder="EJ. 55 2359 2046"
												 class="form-control" style="text-transform:uppercase;"
                                        		onkeyup="javascript:this.value=this.value.toUpperCase();">
											</div>

											<div class="col-sm-6">
												<label>Email</label>
												<input type="email" id="txtEmail" name="txtEmail" placeholder="EJ. sistemas@advancemedical.com"
												 class="form-control">
											</div>
										</div>
									</div>

									

									<div class="form-group">
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <label>Direccion fiscal</label>
                                                                                     <textarea rows="2" class="form-control"
                                                                                        placeholder="EJ. AV. PLATANALES 145 COL. SANTA MARÍA LA RIVERA"
                                                                                        id="txtDireccion" name="txtDireccion"
                                                                                        value="" style="text-transform:uppercase;"
                                                                                        onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                                    </textarea>
                                                                                </div>
                                                                            </div>
									</div>
                                                                    
                                                                        <div class="form-group">
                                                                            <div class="row">

                                                                                <div class="col-sm-12">
                                                                                        <label>Direccion de entrega</label>
                                                                                        <input type="text" id="txtGiro" name="txtGiro" placeholder="EJ. AV. DE LOS INSURGENTES 150 COLONIA ROMA"
                                                                                         class="form-control" style="text-transform:uppercase;"
                                                                                        onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                                </div>
                                                                                <!--
                                                                                <div class="col-sm-6">
                                                                                        <label>Limite Crediticio <span class="text-danger">*</span></label>
                                                                                        <input type="text" id="txtLimitC" name="txtLimitC" placeholder="EJ. 25000.00"
                                                                                        class="touchspin-prefix" value="0" style="text-transform:uppercase;"
                                                                                        onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                                </div>
                                                                                -->
                                                                            </div>
                                                                        </div>
                                                                    
                                                                        
                                                                        <div class="form-group">
                                                                            <div class="row">

                                                                                <div class="col-sm-12">
                                                                                        <label>Direccion adicional</label>
                                                                                        <input type="text" id="txtDireAdic" name="txtDireAdic" placeholder="EJ. AV. DE LOS INSURGENTES 150 COLONIA ROMA"
                                                                                         class="form-control" style="text-transform:uppercase;"
                                                                                        onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                                </div>
                                                                               
                                                                            </div>
                                                                        </div>
                                                                    
                                                                        <div class="form-group">
                                                                            <div class="row">

                                                                                <div class="col-sm-12">
                                                                                        <label>Nombre encargado</label>
                                                                                        <input type="text" id="txtEncargado" name="txtEncargado" placeholder="EJ. FEDERICO GARCIA"
                                                                                         class="form-control" style="text-transform:uppercase;"
                                                                                        onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                                </div>
                                                                               
                                                                            </div>
                                                                        </div>
                         
                                                                    
                                                                        <div class="form-group">
                                                                            <div class="row">

                                                                                <div class="col-sm-6">
                                                                                        <label>Tel encargado</label>
                                                                                        <input type="text" id="txtTelencargado" name="txtTelencargado" placeholder="EJ. 55 5658 1111"
                                                                                         class="form-control" style="text-transform:uppercase;"
                                                                                        onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                                </div>
                                                                                
                                                                                <div class="col-sm-6">
                                                                                        <label>Fecha nacimiento</label>
                                                                                        <input type="text" id="txtFechanac" name="txtFechanac" placeholder="EJ. 10-26-88"
                                                                                         class="form-control" style="text-transform:uppercase;"
                                                                                        onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                                
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    

									<div class="form-group">
										<div class="row">
											<div class="col-sm-8">
												<div class="checkbox checkbox-switchery switchery-sm">
													<label>
													<input type="checkbox" id="chkEstado" name="chkEstado"
													 class="switchery" checked="checked" >
													 <span id="lblchk">VIGENTE</span>
												   </label>
												</div>
											</div>
										</div>
									</div>


								</div>

								<div class="modal-footer">
									<button id="btnGuardar" type="submit" class="btn btn-primary">Guardar</button>
									<button id="btnEditar" type="submit" class="btn btn-warning">Editar</button>
									<button  type="reset" class="btn btn-default" id="reset"
									class="btn btn-link" data-dismiss="modal">Cerrar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- /iconified modal -->
				<?php include('./includes/footer.inc.php'); ?>
			</div>
			<!-- /content area -->
		</div>
		<!-- /main content -->
	</div>
	<!-- /page content -->
</div>
<!-- /page container -->
</body>
</html>
<script type="text/javascript" src="web/custom-js/cliente.js"></script>