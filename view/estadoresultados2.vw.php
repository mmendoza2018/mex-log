<?php



                
                
                $model = "model/Estadoresultados2_model.php";
		$controller = "controller/Estadoresultados2_controller.php";
                

		require_once($model);
		require_once($controller);
	


	$objCuentasdebancos =  new Cuentasdebancos();
        
        
        

	

        

?>

			<!-- Basic initialization -->
			<div class="panel panel-flat">
				<div class="breadcrumb-line">
					<ul class="breadcrumb">
						<li><a href="?View=Inicio"><i class="icon-home2 position-left"></i> Inicio</a></li>
						<li><a href="javascript:;">Estado de resultados</a></li>
						<li class="active">Segundo semestre</li>
					</ul>
				</div>
					<div class="panel-heading">
						<h5 class="panel-title">Estado de resultados / Segundo semestre</h5>

						<div class="heading-elements">
							<!--<button type="button" class="btn btn-primary heading-btn"
							onclick="newCuentasdebancos()">
							<i class="icon-database-add"></i> Agregar Nueva</button>
                                                            -->
							<div class="btn-group">
                                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                                <i class="icon-printer2 position-left"></i> Imprimir Reporte
                                                                <span class="caret"></span></button>
                                                                <ul class="dropdown-menu dropdown-menu-right">
									<li><a id="print_activos" href="javascript:void(0)"
									><i class="icon-file-pdf"></i> </a></li>
									<li class="divider"></li>
									<li><a id="print_inactivos" href="javascript:void(0)">
									<i class="icon-file-pdf"></i> </a></li>
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
													<button type="button" id="cargar_datos"  
                                                                                                        class="btn bg-danger-400 heading-btn" id="btnPrint" value="vigentes">
                                                                                                        <i class="icon-spinner"></i> Cargar datos</button>
												</div>
                                                                                            
                                                                                            
                                                                                            
                                                                                            
											</div>
										</div>
									  </form>
							   	  </div>
							  </div>
                                                
                                                <hr>
                                                
                                                
					</div>
                            
                            <span class="label label-default label-primary" style="font-size: 1.2em; width: 100% ">Estado de Resultados 2do Semestre </span>
                            
					<div class="panel-body">
					</div>
					<div id="reload-div">
					<table class="table datatable-basic table-xxs table-hover">
						<thead>
							<tr>
                                                            <th style="visibility:collapse; display:none;">id edoresultados</th>
                                                            <!--<th style="text-align:center">A</th>-->
                                                            <th>Concepto</th>
                                                            <th>Julio</th>
                                                            <th>Agosto</th>
                                                            <th>Septiembre</th>
                                                            <th>3er. Trimestre</th>
                                                            <th>Octubre</th>
                                                            <th>Noviembre</th>
                                                            <th>Diciembre</th>
                                                            <th>4o. Trimestre</th>
                                                            <th>Total</th>
                                                            
							</tr>
						</thead>

						<tbody>

						  <?php
								$filas = $objCuentasdebancos->Listar_Conceptos_estado_de_resultados();
								if (is_array($filas) || is_object($filas))
								{
								foreach ($filas as $row => $column)
								{
								?>
                                                                <tr>
                                                                
                                                                    <td ><?php print($column['concepto']); ?></td>
                                                                
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
<script type="text/javascript" src="web/custom-js/estadoresultados2.js"></script>
