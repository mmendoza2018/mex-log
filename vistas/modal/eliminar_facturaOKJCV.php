	<form id="eliminarDatos">
		<div class="modal fade" id="dataDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<input type="hidden" id="id_factura" name="id_factura">
					<h3 class="text-center text-muted">Estas segur@?</h3>
					<p class="lead text-muted text-center" style="display: block;margin:9px">Se eliminarán de forma permanente los registros de esta venta, incluyendo los registros de las órdenes de compra que tengan relación, y se actualizará el estado de la cotización que dio origen a la venta. Deseas continuar?</p>
					<div class="modal-footer">
						<button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-lg btn-danger">Aceptar</button>
					</div>
				</div>
			</div>
		</div>
	</form>
