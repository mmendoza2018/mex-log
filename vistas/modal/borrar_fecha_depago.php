<?php   
if (isset($conexion)) {  
    ?>
    
 
<div id="borrarfecha" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content"> 
            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title"><i class='fa fa-edit'></i> Borrar la siguiente fecha de abono?</h4> 
            </div> 

 
<div class="modal-body"> 
 
<form class="form-horizontal"  method="post" name="borrar_fecha" id="borrar_fecha"> 
 
    <div id="resultados_ajax22"></div>
     
    <div class="row"> 
       <div class="col-md-5"> 
           <div class="form-group">
               <label for="mod_fecha_depago_borrar" class="control-label">Fecha:</label>

                   <i class="fa fa-calendar"></i> 

                   <input type="date"  class="form-control" id="mod_fecha_depago_borrar" name="mod_fecha_depago_borrar" value="<?php echo date('d/m/Y'); ?>" required readonly="true">
               <!--<input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $fecha_entregado; ?>" required  tabindex="4">-->
               <input id="mod_id_borrar" name="mod_id_borrar" type='hidden'> 
           </div>
       </div>
        <div class="col-md-1">
       </div>

       <div class="col-md-6">
           <div class="form-group"> 
               <label for="mod_estado_borrar" class="control-label">Estado:</label>
               <select class="form-control" id="mod_estado_borrar" name="mod_estado_borrar" required readonly="true">
                   <option value="">-- Selecciona --</option>
                   <option value="1" selected>PAGADO</option>
                   <option value="0" >PENDIENTE</option>  
               </select>
           </div>
         </div> 
    </div>
               
          
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <label for="mod_abono_borrar" class="control-label">Abono:</label>
              <input type="text" class="form-control" id="mod_abono_borrar" name="mod_abono_borrar" autocomplete="off"  title="Ingresa sólo números con 0 ó 2 decimales jcv" required autofocus maxlength="10" readonly="true">
            </div>
          </div>
            
            <div class="col-md-9">
            <div class="form-group">
              <label for="mod_concepto_borrar" class="control-label">Observaciones:</label> 
              <input type="text" class="form-control UpperCase" id="mod_concepto_borrar" name="mod_concepto_borrar" autocomplete="off" required style="text-transform:uppercase;"
                                        onkeyup="javascript:this.value=this.value.toUpperCase();" readonly="true"> 
            </div>
          </div>
            
              
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="mod_espacio_borrar" class="control-label"></label> 
                </div>
            </div>
          
        </div>
              
            <div class="row">
              
            </div>  
              
 
              
         
          <div class="modal-footer">
          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-danger waves-effect waves-light" id="actualizar_datos2">Borrar</button>
          </div>
       
 
      
  </form>
 </div>  <!--jcv este-->
        </div>

    </div>
</div>


  <?php
}
?>
 
 

