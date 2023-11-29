<?php 
if (isset($conexion)) {  
    ?> 
  <form class="form-horizontal"  method="post" name="add_fecha" id="add_fecha"> 
    <!-- Modal -->
    <div id="add-stock" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content--> 
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4 class="modal-title"> <i class="fa fa-edit"></i> Agregar fechas de promesa de pagos88 </h4>
          </div>
          <div class="modal-body">
              
               
              <div class="row">     
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="fecha_abono" class="control-label">Fecha:</label>
                            <i class="fa fa-calendar"></i> 
                            <input type="date"  class="form-control" id="fecha_abono" name="fecha_abono" value="<?php echo date('d/m/Y'); ?>" required>
                    </div>
                </div>
                  
                <div class="col-md-1">
                </div>  
                
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="abono" class="control-label">Abono:</label>
                      <input type="text" class="form-control" id="abono" name="abono" autocomplete="off"  title="Ingresa sólo números con 0 ó 2 decimales jcv" required autofocus maxlength="10">
                    </div>
                </div>
                  
                  
               </div>  
              
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                  </div>
              </div>
            </div>  
              
            
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="concepto" class="control-label">Observaciones:</label> 
                  <input type="text" class="form-control UpperCase" id="concepto" name="concepto" autocomplete="off" required style="text-transform:uppercase;"
                                            onkeyup="javascript:this.value=this.value.toUpperCase();"> 
                </div>
              </div>
            </div>

          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary waves-effect waves-light" id="guardar_datos">Guardar</button>
          </div>
        </div>

      </div>
    </div>
  </form>
  <?php
}
?>
 
 

