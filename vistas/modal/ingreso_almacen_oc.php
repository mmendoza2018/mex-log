<?php 
if (isset($conexion)) {  
    ?>
	<div id="editarCliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;"> 
		<div class="modal-dialog"> 
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title"><i class='fa fa-edit'></i> Ingresar al almacén el producto:</h4>
                                        <br>
                                        
                                        <input type="text" class="form-control UpperCase" id="mod_produ" name="mod_produ" readonly="true" style="border: none">
				</div>
				<div class="modal-body">
					<form class="form-horizontal" method="post" id="editar_cliente" name="editar_cliente"> 
						<div id="resultados_ajax2"></div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group"> 
									<label for="mod_nombre" class="control-label">Observaciones:</label>
									<input type="text" class="form-control UpperCase" id="mod_nombre" name="mod_nombre" maxlength="150" autocomplete="off" required>
                                                                        <input id="mod_id" name="mod_id" type='hidden'>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="mod_fiscal" class="control-label"> Marca:</label>
									<input type="text" class="form-control" id="mod_fiscal" name="mod_fiscal" maxlength="25" autocomplete="off">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="telefono" class="control-label">Modelo:</label>
									<input type="text" class="form-control" id="mod_telefono" name="mod_telefono" maxlength="25" autocomplete="off" >
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6"> 
								<div class="form-group">
									<label for="mod_direccion" class="control-label">No. de serie:</label> 
									
                                                                        <input type="text" class="form-control" id="mod_direccion" name="mod_direccion" maxlength="25" autocomplete="off" >
								</div>
							</div>
                                                    
                                                        <div class="col-md-6">
								<div class="form-group">
									<label for="mod_estado" class="control-label">Estado de compra:</label>
									<select class="form-control" id="mod_estado" name="mod_estado" required>
										<option value="" selected>-- Selecciona opción --</option>
										<option value="EN ESPERA DE AUTORIZACIÓN" >EN ESPERA DE AUTORIZACIÓN</option>
										<option value="COMPRADO">COMPRADO</option>
                                                                                <option value="EN TRÁNSITO">EN TRÁNSITO</option>
                                                                                <option value="INGRESADO">INGRESADO</option>
                                                                                <option value="ENTREGADO">ENTREGADO</option>
									</select>
								</div>
							</div>
                                                    
						</div>
                                                <!--
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label for="encargado" class="control-label">Email:</label>
									<input type="mod_email" class="form-control" id="mod_email" name="mod_email" autocomplete="off">
								</div>
							</div>
							
						</div>
                                                -->
					
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary waves-effect waves-light" id="actualizar_datos">Ingresar</button>
					</div>
				</form> 
                                    </div>
			</div>
		</div>
	</div><!-- /.modal -->
	<?php
}
?>

        <script> 
             
//JCV PARAGRABAR OBSERVACIONES, MARCA, NO DE SERIE, MODELO EN EL PRODUCTO A INGRESAR AL ALMACEN 
        $("#editar_cliente").submit(function(event) {
    //alert('editar JCV');
    $('#editarCliente').attr("disabled", true);
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "./vistas/ajax/ingreso_almacen_oc.php",  
        data: parametros,
        beforeSend: function(objeto) {
            $("#resultados_ajax2").html('<img src="./img/ajax-loaderOKJCV.gif"> Cargando JCV...');  
        },
        success: function(datos) {
            $("#resultados_ajax2").html(datos);
            $('#actualizar_datos').attr("disabled", false);
            load(1);
            //desaparecer la alerta
            window.setTimeout(function() {
                $(".alert").fadeTo(200, 0).slideUp(200, function() {
                    $(this).remove();
                });
            }, 2000);
        }
    });
    event.preventDefault();
})

</script>