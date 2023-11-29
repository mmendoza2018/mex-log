<?php

	$objCliente =  new CuentasdebancosJCV();

?>

			<!-- Basic initialization -->
			<div class="panel panel-flat">
				<div class="breadcrumb-line">
					<ul class="breadcrumb">
						<li><a href="?View=Inicio"><i class="icon-home2 position-left"></i> Inicio</a></li>
						<li><a href="javascript:;">Banos</a></li>
						<li class="active">Cuentas de bancos JCV PRUEBA</li>
					</ul>
				</div>
					<div class="panel-heading">
						<h5 class="panel-title">Cuentas de bancos JCV PRUEBA</h5>

						<div class="heading-elements">
							<button type="button" class="btn btn-primary heading-btn"
							onclick="newCliente()">
							<i class="icon-database-add"></i> Agregar Nueva</button>

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
								<th>Fecha</th>
								<th>Concepto</th>
								<th>Ingreso</th>
                                                                
                                                                <th>Egreso</th>
                                                                <th>Saldo</th>
                                                                <th>Observaciones</th>
								<th>Tipo de gasto</th>
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
					                	<td><?php print($column['id_cuentas_de_bancos']); ?></td>
					                	<td><?php print($column['fecha']); ?></td>
					                	<td><?php print($column['concepto']); ?></td>
					                	<td><?php print($column['ingreso']); ?></td>
                                                             
                                                                <td><?php print($column['egreso']); ?></td>
                                                                <td><?php print($column['saldo']); ?></td>
                                                                <td><?php print($column['observaciones']); ?></td>
                                                                <td><?php print($column['tipo_de_gasto']); ?></td>
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
								                     '<?php print($column["id_cuentas_de_bancos"]); ?>',
								                     '<?php print($column["codigo_cliente"]); ?>',
								                     '<?php print($column["fecha"]); ?>',
								                     '<?php print($column["concepto"]); ?>',
                                                                                    '<?php print($column["ingreso"]); ?>',
								                     
								                     '<?php print($column["egreso"]); ?>',
								                     '<?php print($column["saldo"]); ?>',
                                                                                    '<?php print($column["observaciones"]); ?>',
                                                                                    '<?php print($column["tipo_de_gasto"]); ?>',
								                     '<?php print($column["estado"]); ?>')">
												   <i class="icon-pencil6">
											       </i> Editar</a></li>
													<li><a
													href="javascript:;" data-toggle="modal" data-target="#modal_iconified"
													onclick="openCliente('ver',
																		'<?php print($column["id_cuentas_de_bancos"]); ?>',
																		'<?php print($column["codigo_cliente"]); ?>',
																		'<?php print($column["fecha"]); ?>',
																		'<?php print($column["concepto"]); ?>',
																		'<?php print($column["ingreso"]); ?>',
																		
																		'<?php print($column["egreso"]); ?>',
																		'<?php print($column["saldo"]); ?>',
																		'<?php print($column["observaciones"]); ?>',
																		'<?php print($column["tipo_de_gasto"]); ?>',
																		'<?php print($column["estado"]); ?>')">
													<i class=" icon-eye8">
													</i> Ver</a></li>
                                                                                                        
                                                                                                        
                                                                                                        
                                                                                                        <li><a id="delete_clientes"
                                                                                                        data-id="<?php print($column['id_cuentas_de_bancos']); ?>"
                                                                                                        href="javascript:void(0)">
                                                                                                        <i class=" icon-trash">
                                                                                                        </i> Borrar</a></li>

                                                                                                        
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

			<!-- Iconified modal  JCV PARA AGREGAR MAS CUENTAS -->
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
                                                                    <span class="text-semibold">Estimable usuario</span>
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
                                                                                 onkeyup="javascript:this.value=this.value.toUpperCase();" readonly="" disabled="disabled">
                                                                        </div>
                                                                    
                                                                    
                                                                    
                                                                    
                                                                                        
                                                                        <div class="col-sm-6">
                                                                            <label>Fecha de la operación <span class="text-danger">*</span></label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                                                                                <input type="text" id="txtF1" name="txtF1" placeholder=" AAAA/MM/DD"
                                                                                 class="form-control input-sm" style="text-transform:uppercase;"
                                                                                 onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                            </div>
                                                                        
                                                                        <!--<div class="col-sm-6">
                                                                            <label> *</label>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                                                                                <input type="text" id="txtF2" name="txtF2" placeholder=""
                                                                                 class="form-control input-sm" style="text-transform:uppercase;"
                                                                                onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                         </div>   
                                                                        </div>--> 
                                                                                        
                                                                         </div>
                                                                    </div>
                                                                    
                                                                </div>
<!--jcv para fecha no es necesaria mejor con dtpicker
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                                <label>Fecha de la operación <span class="text-danger">*</span></label>
                                                                                <input type="text" id="txtFecha" name="txtFecha" placeholder="26/10/2022"
                                                                                 class="form-control" style="text-transform:uppercase;"
                                                                                onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            
-->                                                            
                                                                
                                                                           
                                                                                <div class="form-group">
                                                                                    
                                                                                </div>
                                                                             
                                                               
                                                            
                                                            

                                                                <div class="form-group">
                                                                    <div class="row">

                                                                        <div class="col-sm-6">
                                                                                <label>Concepto</label>
                                                                                <input type="text" id="txtConcepto" name="txtConcepto" placeholder="COMPRA DE EQUIPO DE CÓMPUTO"
                                                                                 class="form-control" style="text-transform:uppercase;"
                                                                                onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                        </div>

                                                                        <div class="col-sm-6">
                                                                                <label>Ingreso</label>
                                                                                <input type="text" id="txtIngreso" name="txtIngreso" placeholder="EJ. 10350"
                                                                                 class="form-control" style="text-transform:uppercase;"
                                                                                                                                                                onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                                <label>Egreso</label>
                                                                                <input type="text" id="txtEgreso" name="txtEgreso" placeholder="EJ. 15000"
                                                                                 class="form-control" style="text-transform:uppercase;"
                                                                                onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                        </div>

                                                                        <div class="col-sm-6">
                                                                                <label>Saldo</label>
                                                                                <input type="text" id="txtSaldo" name="txtSaldo" placeholder="EJ. 25000"
                                                                                 class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="row">

                                                                        <div class="col-sm-6">
                                                                                <label>Observaciones</label>
                                                                                <input type="text" id="txtObservaciones" name="txtObservaciones" placeholder="EJ. CASRGO AUTOMÁTICO"
                                                                                 class="form-control" style="text-transform:uppercase;"
                                                                                 onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                        </div>

                                                                        <div class="col-sm-6">
                                                                                <label>Cuenta </label>
                                                                                <input type="text" id="txtTipo_de_gasto" name="txtTipo_de_gasto" placeholder="EJ GASTO ADMINISTRATIVO"
                                                                                class="form-control" style="text-transform:uppercase;"
                                                                                onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                            <div class="form-group">
                                                                    <!--
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <label>Direccion</label>
                                                                             <textarea rows="2" class="form-control"
                                                                            placeholder="EJ. AV. PLATANALES 145 COL. NUEVA SANTA MARÍA"
                                                                            id="txtDireccion" name="txtDireccion"
                                                                            value="" style="text-transform:uppercase;"
                                                                            onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                           </textarea>
                                                                        </div>
                                                                    </div>
                                                                    -->
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
<script type="text/javascript" src="web/custom-js/cuentasdebancosJCV.js"></script>
