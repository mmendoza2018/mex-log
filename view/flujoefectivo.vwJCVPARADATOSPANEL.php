<?php

/*JCV ESTE ARCHIVO flujoefectivo.vwJCVPARADATOSPANEL.PHP ES DE PRUEBA PARA VER EL Datos_Paneles() que funcione aqui*/

                
                
                $model = "model/Flujoefectivo_model.php";
		$controller = "controller/Flujoefectivo_controller.php";
                

		require_once($model);
		require_once($controller);
	


	$objCuentasdebancos =  new Cuentasdebancos();
        
        
        

	

        

?>

			<!-- Basic initialization -->
			<div class="panel panel-flat">
				<div class="breadcrumb-line">
					<ul class="breadcrumb">
						<li><a href="?View=Inicio"><i class="icon-home2 position-left"></i> Inicio</a></li>
						<li><a href="javascript:;">Flujo de efectivo</a></li>
						<li class="active">Análisis del flujo</li>
					</ul>
				</div>
					<div class="panel-heading">
						<h5 class="panel-title">Flujo de efectivo / Análisis del flujo</h5>

						<div class="heading-elements">
							<button type="button" class="btn btn-primary heading-btn"
							onclick="newCuentasdebancos()">
							<i class="icon-database-add"></i> Agregar Nueva</button>

							<div class="btn-group">
                                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                                <i class="icon-printer2 position-left"></i> Imprimir Reporte
                                                                <span class="caret"></span></button>
                                                                <ul class="dropdown-menu dropdown-menu-right">
									<li><a id="print_activos" href="javascript:void(0)"
									><i class="icon-file-pdf"></i> Cuentas de bancos Activos</a></li>
									<li class="divider"></li>
									<li><a id="print_inactivos" href="javascript:void(0)">
									<i class="icon-file-pdf"></i> Cuentas de bancos Inactivos</a></li>
								</ul>
							</div>


						</div>
                                                
                                                <!--JCV PRUEBA PARA OPRIMIR BOTON Y SACAR EN PANTALLA FLUJO EFECTIVO-->
                                                
                                                <div class="row">
								 <div class="col-sm-6 col-md-5">
								 	<form role="form" autocomplete="off" class="form-validate-jquery" id="frmSearch">
										<div class="form-group">
											<div class="row">
												<div class="col-sm-5">
													<div class="input-group">
													<span class="input-group-addon"><i class="icon-calendar3"></i></span>
													<input type="text" id="txtF1" name="txtF1" placeholder=""
													 class="form-control input-sm" style="text-transform:uppercase;"
							                		onkeyup="javascript:this.value=this.value.toUpperCase();">
							                		</div>
												</div>
												<div class="col-sm-5">
													<div class="input-group">
													<span class="input-group-addon"><i class="icon-calendar3"></i></span>
													<input type="text" id="txtF2" name="txtF2" placeholder=""
													 class="form-control input-sm" style="text-transform:uppercase;"
							                		onkeyup="javascript:this.value=this.value.toUpperCase();">
							                		</div>
												</div>
												<div class="col-sm-2">
													<button style="margin-top: 0px;" id="btnGuardar"
													type="submit" class="btn btn-primary btn-sm">
													<i class="icon-search4"></i> Consultar</button>
												</div>
											</div>
										</div>
									  </form>
							   	  </div>
							  </div>
                                                
                                                
                                                
                                                
					</div>
					<div class="panel-body">
					</div>
					<div id="reload-div">
					<table class="table datatable-basic table-xxs table-hover">
						<thead>
							<tr>
                                                            <th>Nombre de la cuenta</th>
                                                            <th>Enero</th>
                                                            <th>Febrero</th>
                                                            <th>Marzo</th>
                                                            <th>Abril</th>
                                                            <th>Mayo</th>
                                                            <th>Junio</th>
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
                                                                $filas = $objCuentasdebancos->Datos_Paneles();
								//$filas = $objCuentasdebancos->Listar_Cuentasdebancos();
							 
                                                                
                                                                if (is_array($filas) || is_object($filas))
                                                                {
                                                                        foreach ($filas as $row => $column)
                                                                        {
                                                                                $compras_mes = $column["compras_mes"];
                                                                                $ventas_dia = $column["ventas_dia"];
                                                                                $inversion_stock = $column["inversion_stock"];
                                                                                $proveedores = $column["proveedores"];
                                                                                $marcas = $column["marcas"];
                                                                                $presentaciones = $column["presentaciones"];
                                                                                $productos = $column["productos"];
                                                                                $dinero_caja  = $column["dinero_caja"];
                                                                                $perecederos  = $column["perecederos"];
                                                                                $a_vencer  = $column["a_vencer"];
                                                                                $clientes  = $column["clientes"];
                                                                                $creditos  = $column["creditos"];


                                                                        }
                                                                }
                                                                
                                                                
                                                                
                                                                if (is_array($filas) || is_object($filas))
								{
								foreach ($filas as $row => $column)
								{
								?>
								 	<tr>
                                                                            <td><?php print($compras_mes); ?></td>
                                                                            <td><br><br> <?php print($ventas_dia); ?></td>
                                                                
                                                                <td style=" text-align: right; width: 15%"><?php print(number_format($inversion_stock,2)); ?></td>
					                	<td><?php print($proveedores); ?></td>
                                                                <td><?php print($marcas); ?></td>
                                                                <td><?php print($presentaciones); ?></td>
                                                                <td><?php print($productos); ?></td>
                                                                <td><?php print($perecederos); ?></td>
                                                                <td><?php print($a_vencer); ?></td>
                                                                <td><?php print($clientes); ?></td>
                                                                <td><?php print($creditos); ?></td>
                                                                
					                	
                                                                
					                </tr>
								<?php
								}
							}
							?>

						</tbody>
					</table>
					</div>
				</div>

			<!-- Iconified modal  JCV PARA AGREGAR MAS debancos CRUD DE debancos -->
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
                                                                            
                                                                                <label>Codigo </label>
                                                                                <input type="text" id="txtCodigo" name="txtCodigo" placeholder="AUTOGENERADO"
                                                                                 class="form-control" style="text-transform:uppercase;"
                                                                                 onkeyup="javascript:this.value=this.value.toUpperCase();" readonly="" disabled="disabled">
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
                                                                    <div class="row">

                                                                        <div class="col-sm-6">
                                                                                <label>Nombre <span class="text-danger">*</span></label>
                                                                                <input type="text" id="txtNombre" name="txtNombre" placeholder="OPERATIVO"
                                                                                 class="form-control" style="text-transform:uppercase;"
                                                                                onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                                        </div>

                                                                        <div class="col-sm-6">
                                                                            <label>Saldo Inicial <span class="text-danger">*</span></label>
                                                                                <input type="text" id="txtSaldo" name="txtSaldo" placeholder="OPERATIVO"
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
<script type="text/javascript" src="web/custom-js/flujoefectivo.js"></script>
