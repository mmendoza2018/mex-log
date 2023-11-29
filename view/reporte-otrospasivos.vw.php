<?php
  
                $model = "model/Reporte-otrospasivos_model.php";
		$controller = "controller/Reporte-otrospasivos_controller.php";
                

		require_once($model);
		require_once($controller);
	
	//$objReporteMercadotecnia =  new Cuentasdebancos();
        $objReporteOtrospasivos =  new Reporteotrospasivos();
        
        

?>

			<!-- Basic initialization -->
			<div class="panel panel-flat">
				<div class="breadcrumb-line">
					<ul class="breadcrumb">
						<li><a href="?View=Inicio"><i class="icon-home2 position-left"></i> Inicio</a></li>
						<li><a href="javascript:;">Reporte financiero</a></li>
						<li class="active">Otros pasivos</li>
					</ul>
				</div>
                                <div class="panel-heading">
                                    <h5 class="panel-title">Reporte financiero / Otros pasivos</h5> 

                                    <div class="heading-elements">
                                            <!--<button type="button" class="btn btn-primary heading-btn"
                                            onclick="newCuentasdebancos()">
                                            <i class="icon-database-add"></i> Agregar Nueva</button>
                                                -->

                                        <div class="btn-group">
                                            <div class="row"  >
                                                <div class="col-sm-6 col-md-5">
                                                    <form role="form" autocomplete="off" class="form-validate-jquery" id="frmSearch">

                                                        <div class="form-group" >
                                                            <div class="row">
                                                                <div class="col-sm-2"></div>
                                                                <!--
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

                                                                -->
                                                                <div class="col-sm-2">
                                                                        <button type="button" id="cargar_datos"  
                                                                        class="btn bg-danger-400 heading-btn" id="btnPrint" value="vigentes">
                                                                        <i class="icon-spinner"></i> Cargar datos</button>
                                                                </div>




                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div> <!--ROW -->

                                        </div>    



                                                <div class="btn-group" >
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




                                    <!--JCV PRUEBA PARA OPRIMIR BOTON Y SACAR EN PANTALLA FLUJO EFECTIVO-->




                                    </div>   <!-- jcv heading-elements-->  
                                    <hr>


                                </div>
                            
                            <span class="label label-default label-primary" style="font-size: 1.2em; width: 100% ">Store Manager / Otros pasivos </span>
                            
					<div class="panel-body">
					</div>
					<div id="reload-div">
					<table class="table datatable-basic table-xxs table-hover">
						<thead>
							<tr>
                                                            <th style="visibility:collapse; display:none;">id edoresultados</th>
                                                            <!--<th style="text-align:center">A</th>-->
                                                            <th>Concepto</th>
                                                            <th>Enero</th>
                                                            <th>Febrero</th>
                                                            <th>Marzo</th>
                                                            <th>Abril</th>
                                                            <th>Mayo</th>
                                                            <th>Junio</th>
                                                            <th>Julio</th>
                                                            <th>Agosto</th>
                                                            <th>Septiembre</th>
                                                            <th>Octubre</th>
                                                            <th>Noviembre</th>
                                                            <th>Diciembre</th>
                                                            <th>Acumulado</th>
                                                            <th>Promedio</th>
                                                            
							</tr>
						</thead>

						<tbody>

						  <?php 
								$filas = $objReporteOtrospasivos->Listar_Conceptos_Reporte_otrospasivos();
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
				
                        <!-- JCV AQUI IBA EL CRUD, NO SE NECESITA AQUI -->
                        
                        
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
<script type="text/javascript" src="web/custom-js/reporte-otrospasivos.js"></script>
