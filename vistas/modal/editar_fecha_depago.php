<?php   
if (isset($conexion)) {  
    ?>
     

<div id="editarfecha" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content"> 
            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title"><i class='fa fa-edit'></i> Editar Fecha de Abono</h4> 
            </div> 


<div class="modal-body"> 
 
<form class="form-horizontal"  method="post" name="editar_fecha" id="editar_fecha"> 
 
    <div id="resultados_ajax2"></div>
     
    <div class="row"> 
       <div class="col-md-5">
           <div class="form-group">
               <label for="mod_fecha_depago" class="control-label">Fecha:</label>

                   <i class="fa fa-calendar"></i> 

                   <input type="date"  class="form-control" id="mod_fecha_depago" name="mod_fecha_depago" value="<?php echo date('d/m/Y'); ?>" required>
               <!--<input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $fecha_entregado; ?>" required  tabindex="4">-->
               <input id="mod_id" name="mod_id" type='hidden'> 
           </div>
       </div>
        <div class="col-md-1">
       </div>

       <div class="col-md-6">
           <div class="form-group"> 
               <label for="mod_estado" class="control-label">Estado:</label>
               <select class="form-control" id="mod_estado" name="mod_estado" required>
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
              <label for="mod_abono" class="control-label">Abono:</label>
              <input type="text" class="form-control" id="mod_abono" name="mod_abono" autocomplete="off"  title="Ingresa sólo números con 0 ó 2 decimales jcv" required autofocus maxlength="10">
            </div>
          </div>
            
            <div class="col-md-9">
            <div class="form-group">
              <label for="mod_concepto" class="control-label">Observaciones:</label> 
              <input type="text" class="form-control UpperCase" id="mod_concepto" name="mod_concepto" autocomplete="off" required style="text-transform:uppercase;"
                                        onkeyup="javascript:this.value=this.value.toUpperCase();"> 
            </div>
          </div>
            
              
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="mod_espacio" class="control-label"></label> 
                </div>
            </div>
          
        </div>
              
            <div class="row">
              
            </div>  
              
 
              
         
          <div class="modal-footer">
          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary waves-effect waves-light" id="actualizar_datos">Actualizar</button>
          </div>
       
 
      
  </form>
 </div>  <!--jcv este-->
        </div>

    </div>
</div>


  <?php
}
?>
 
 

