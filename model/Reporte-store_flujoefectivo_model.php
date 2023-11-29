<?php   
/*JCV OBTENIDO DEL ARCHIVO cuentasdebancos_model.php*/
	require_once('Conexion.php');
        
    
	class ReporteflujoefectivoModel extends Conexion  
	{
             
                public function Insertar_datos_flujo()
		{
                $dbconec = Conexion::Conectar();
                try
                {
                    $anio = date('Y');
                    //$anio = "2022";
                    $id_acumulativaGlobal=8;
                    
                    
                     $queryChecaNivel = "SELECT * FROM flujo_de_efectivo where nivel>=1 ;";
                     $stmtChecaNivel = $dbconec->prepare($queryChecaNivel);
                     $stmtChecaNivel->execute();
                     $cuenta = $stmtChecaNivel->rowCount();
                    
                    if($cuenta<=0){
                         echo '<span class="label label-danger label-block">Primero tiene que calcular el Flujo de Efectivo.  Se encuentra dentro del menú principal en la ópción Flujo de efectivo y Análisis de flujo en el tab 1</span>';
                        exit();
                    }
                    
                        
                        $queryBorrar= "Select * from reporte_store_flujoefectivo";
                        $stmtBorrar = $dbconec->prepare($queryBorrar);
                        $stmtBorrar->execute();
                        $count = $stmtBorrar->rowCount(); 
                        if($count > 0)
                        {
                    
                    //JCV EFECTIVO INICIAL (ES LA 0 DE LA TABLA flujo_de_efectivo)
               
                    $queryTotalEneEfIn="update reporte_store_flujoefectivo set enero = (select enero from flujo_de_efectivo where nivel = 0) where nivel = 101;";
                    $stmtTotEneEfIn = $dbconec->prepare($queryTotalEneEfIn);
                    $stmtTotEneEfIn->execute();
                    
                    
                    
                    
                    
                    
                    //JCV INGRESOS DE OPERACIÓN (ES LA 1 DE LA TABLA flujo_de_efectivo)
               
                    $queryTotalEneInOp="update reporte_store_flujoefectivo set enero = (select enero from flujo_de_efectivo where nivel = 1) where nivel = 102;";
                    $stmtTotEneInOp = $dbconec->prepare($queryTotalEneInOp);
                    $stmtTotEneInOp->execute();
                    
                    $queryTotalFebInOp="update reporte_store_flujoefectivo set febrero = (select febrero from flujo_de_efectivo where nivel = 1) where nivel = 102;";
                    $stmtTotFebInOp = $dbconec->prepare($queryTotalFebInOp);
                    $stmtTotFebInOp->execute();
                    
                    $queryTotalMarInOp="update reporte_store_flujoefectivo set marzo = (select marzo from flujo_de_efectivo where nivel = 1) where nivel = 102;";
                    $stmtTotMarInOp = $dbconec->prepare($queryTotalMarInOp);
                    $stmtTotMarInOp->execute();
                    
                    //ABRIL
                    $queryTotalMarInOp="update reporte_store_flujoefectivo set abril = (select abril from flujo_de_efectivo where nivel = 1) where nivel = 102;";
                    $stmtTotMarInOp = $dbconec->prepare($queryTotalMarInOp);
                    $stmtTotMarInOp->execute();
                    
                    $queryTotalMarInOp="update reporte_store_flujoefectivo set mayo = (select mayo from flujo_de_efectivo where nivel = 1) where nivel = 102;";
                    $stmtTotMarInOp = $dbconec->prepare($queryTotalMarInOp);
                    $stmtTotMarInOp->execute();
                    
                    $queryTotalMarInOp="update reporte_store_flujoefectivo set junio = (select junio from flujo_de_efectivo where nivel = 1) where nivel = 102;";
                    $stmtTotMarInOp = $dbconec->prepare($queryTotalMarInOp);
                    $stmtTotMarInOp->execute();
                    
                    //JULIO
                    $queryTotalMarInOp="update reporte_store_flujoefectivo set julio = (select julio from flujo_de_efectivo where nivel = 1) where nivel = 102;";
                    $stmtTotMarInOp = $dbconec->prepare($queryTotalMarInOp);
                    $stmtTotMarInOp->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...   
                    
                    
                    //JCV EGRESOS DE OPERACIÓN (ES LA 4 DE LA TABLA flujo_de_efectivo)
               
                    $queryTotalEneEgOp="update reporte_store_flujoefectivo set enero = (select enero from flujo_de_efectivo where nivel = 4) where nivel = 103;";
                    $stmtTotEneEgOp = $dbconec->prepare($queryTotalEneEgOp);
                    $stmtTotEneEgOp->execute();
                    
                    $queryTotalFebEgOp="update reporte_store_flujoefectivo set febrero = (select febrero from flujo_de_efectivo where nivel = 4) where nivel = 103;";
                    $stmtTotFebEgOp = $dbconec->prepare($queryTotalFebEgOp);
                    $stmtTotFebEgOp->execute();
                    
                    $queryTotalMarEgOp="update reporte_store_flujoefectivo set marzo = (select marzo from flujo_de_efectivo where nivel = 4) where nivel = 103;";
                    $stmtTotMarEgOp = $dbconec->prepare($queryTotalMarEgOp);
                    $stmtTotMarEgOp->execute();
                    
                    //ABRIL
                    $queryTotalMarEgOp="update reporte_store_flujoefectivo set abril = (select abril from flujo_de_efectivo where nivel = 4) where nivel = 103;";
                    $stmtTotMarEgOp = $dbconec->prepare($queryTotalMarEgOp);
                    $stmtTotMarEgOp->execute();
                    
                    $queryTotalMarEgOp="update reporte_store_flujoefectivo set mayo = (select mayo from flujo_de_efectivo where nivel = 4) where nivel = 103;";
                    $stmtTotMarEgOp = $dbconec->prepare($queryTotalMarEgOp);
                    $stmtTotMarEgOp->execute();
                    
                    $queryTotalMarEgOp="update reporte_store_flujoefectivo set junio = (select junio from flujo_de_efectivo where nivel = 4) where nivel = 103;";
                    $stmtTotMarEgOp = $dbconec->prepare($queryTotalMarEgOp);
                    $stmtTotMarEgOp->execute();
                    
                    //JULIO
                    $queryTotalMarEgOp="update reporte_store_flujoefectivo set julio = (select julio from flujo_de_efectivo where nivel = 4) where nivel = 103;";
                    $stmtTotMarEgOp = $dbconec->prepare($queryTotalMarEgOp);
                    $stmtTotMarEgOp->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                    
                    
                    
                    //JCV PAGO A PROVEEDORES (ES LA 203 DE LA TABLA flujo_de_efectivo)
               
                    $queryTotalEnePaPr="update reporte_store_flujoefectivo set enero = (select enero from flujo_de_efectivo where nivel = 203) where nivel = 104;";
                    $stmtTotEnePaPr = $dbconec->prepare($queryTotalEnePaPr);
                    $stmtTotEnePaPr->execute();
                    
                    $queryTotalFebPaPr="update reporte_store_flujoefectivo set febrero = (select febrero from flujo_de_efectivo where nivel = 203) where nivel = 104;";
                    $stmtTotFebPaPr = $dbconec->prepare($queryTotalFebPaPr);
                    $stmtTotFebPaPr->execute();
                    
                    $queryTotalMarPaPr="update reporte_store_flujoefectivo set marzo = (select marzo from flujo_de_efectivo where nivel = 203) where nivel = 104;";
                    $stmtTotMarPaPr = $dbconec->prepare($queryTotalMarPaPr);
                    $stmtTotMarPaPr->execute();
                    
                    //ABRIL
                    $queryTotalMarPaPr="update reporte_store_flujoefectivo set abril = (select abril from flujo_de_efectivo where nivel = 203) where nivel = 104;";
                    $stmtTotMarPaPr = $dbconec->prepare($queryTotalMarPaPr);
                    $stmtTotMarPaPr->execute();
                    
                    $queryTotalMarPaPr="update reporte_store_flujoefectivo set mayo = (select mayo from flujo_de_efectivo where nivel = 203) where nivel = 104;";
                    $stmtTotMarPaPr = $dbconec->prepare($queryTotalMarPaPr);
                    $stmtTotMarPaPr->execute();
                    
                    $queryTotalMarPaPr="update reporte_store_flujoefectivo set junio = (select junio from flujo_de_efectivo where nivel = 203) where nivel = 104;";
                    $stmtTotMarPaPr = $dbconec->prepare($queryTotalMarPaPr);
                    $stmtTotMarPaPr->execute();
                    
                    //JULIO
                    $queryTotalMarPaPr="update reporte_store_flujoefectivo set julio = (select julio from flujo_de_efectivo where nivel = 203) where nivel = 104;";
                    $stmtTotMarPaPr = $dbconec->prepare($queryTotalMarPaPr);
                    $stmtTotMarPaPr->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                                        
                     
                    
                    //JCV FLUJO DE EFECTIVO OPERATIVO (ES LA SUMA DE LA 102 A LA 104 DE LA TABLA reporte_store_flujoefectivo)
               
                    $queryTotalEneFlEfOp="update reporte_store_flujoefectivo set enero = (select sum(enero) from reporte_store_flujoefectivo where nivel >=102 and nivel <=104) where nivel = 105;";
                    $stmtTotEneFlEfOp = $dbconec->prepare($queryTotalEneFlEfOp);
                    $stmtTotEneFlEfOp->execute();
                    
                    $queryTotalFebFlEfOp="update reporte_store_flujoefectivo set febrero = (select sum(febrero) from reporte_store_flujoefectivo where nivel >=102 and nivel <=104) where nivel = 105;";
                    $stmtTotFebFlEfOp = $dbconec->prepare($queryTotalFebFlEfOp);
                    $stmtTotFebFlEfOp->execute();
                    
                    $queryTotalMarFlEfOp="update reporte_store_flujoefectivo set marzo = (select sum(marzo) from reporte_store_flujoefectivo where nivel >=102 and nivel <=104) where nivel = 105;";
                    $stmtTotMarFlEfOp = $dbconec->prepare($queryTotalMarFlEfOp);
                    $stmtTotMarFlEfOp->execute();
                    
                    //ABRIL
                    $queryTotalMarFlEfOp="update reporte_store_flujoefectivo set abril = (select sum(abril) from reporte_store_flujoefectivo where nivel >=102 and nivel <=104) where nivel = 105;";
                    $stmtTotMarFlEfOp = $dbconec->prepare($queryTotalMarFlEfOp);
                    $stmtTotMarFlEfOp->execute();
                    
                    $queryTotalMarFlEfOp="update reporte_store_flujoefectivo set mayo = (select sum(mayo) from reporte_store_flujoefectivo where nivel >=102 and nivel <=104) where nivel = 105;";
                    $stmtTotMarFlEfOp = $dbconec->prepare($queryTotalMarFlEfOp);
                    $stmtTotMarFlEfOp->execute();
                    
                    $queryTotalMarFlEfOp="update reporte_store_flujoefectivo set junio = (select sum(junio) from reporte_store_flujoefectivo where nivel >=102 and nivel <=104) where nivel = 105;";
                    $stmtTotMarFlEfOp = $dbconec->prepare($queryTotalMarFlEfOp);
                    $stmtTotMarFlEfOp->execute();
                    
                    //JULIO
                    $queryTotalMarFlEfOp="update reporte_store_flujoefectivo set julio = (select sum(julio) from reporte_store_flujoefectivo where nivel >=102 and nivel <=104) where nivel = 105;";
                    $stmtTotMarFlEfOp = $dbconec->prepare($queryTotalMarFlEfOp);
                    $stmtTotMarFlEfOp->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE... 
                    
                    
                    //////////////////////////////////////////////// NO SE DE DONDE SALE PREGUNTAR//////////////////
                    //JCV INGRESOS DE INVERSIÓN
                    
                    
                    
                    
                    //JCV EGRESOS DE INVERSIÓN (ES LA 213 DE LA TABLA flujo_de_efectivo)
               
                    $queryTotalEneEgIn="update reporte_store_flujoefectivo set enero = (select enero from flujo_de_efectivo where nivel = 213) where nivel = 107;";
                    $stmtTotEneEgIn = $dbconec->prepare($queryTotalEneEgIn);
                    $stmtTotEneEgIn->execute();
                    
                    $queryTotalFebEgIn="update reporte_store_flujoefectivo set febrero = (select febrero from flujo_de_efectivo where nivel = 213) where nivel = 107;";
                    $stmtTotFebEgIn = $dbconec->prepare($queryTotalFebEgIn);
                    $stmtTotFebEgIn->execute();
                    
                    $queryTotalMarEgIn="update reporte_store_flujoefectivo set marzo = (select marzo from flujo_de_efectivo where nivel = 213) where nivel = 107;";
                    $stmtTotMarEgIn = $dbconec->prepare($queryTotalMarEgIn);
                    $stmtTotMarEgIn->execute();
                    
                    //ABRIL
                     $queryTotalMarEgIn="update reporte_store_flujoefectivo set abril = (select abril from flujo_de_efectivo where nivel = 213) where nivel = 107;";
                    $stmtTotMarEgIn = $dbconec->prepare($queryTotalMarEgIn);
                    $stmtTotMarEgIn->execute();
                    
                     $queryTotalMarEgIn="update reporte_store_flujoefectivo set mayo = (select mayo from flujo_de_efectivo where nivel = 213) where nivel = 107;";
                    $stmtTotMarEgIn = $dbconec->prepare($queryTotalMarEgIn);
                    $stmtTotMarEgIn->execute();
                    
                     $queryTotalMarEgIn="update reporte_store_flujoefectivo set junio = (select junio from flujo_de_efectivo where nivel = 213) where nivel = 107;";
                    $stmtTotMarEgIn = $dbconec->prepare($queryTotalMarEgIn);
                    $stmtTotMarEgIn->execute();
                    
                    //JULIO
                     $queryTotalMarEgIn="update reporte_store_flujoefectivo set julio = (select julio from flujo_de_efectivo where nivel = 213) where nivel = 107;";
                    $stmtTotMarEgIn = $dbconec->prepare($queryTotalMarEgIn);
                    $stmtTotMarEgIn->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                     
                    
                    
                     //JCV FLUJO DE EFECTIVO INVERSIÓN (ES LA SUMA DE LA 106 A LA 107 DE LA TABLA reporte_store_flujoefectivo)
               
                    $queryTotalEneFlEfIn="update reporte_store_flujoefectivo set enero = (select sum(enero) from reporte_store_flujoefectivo where nivel >=106 and nivel <=107) where nivel = 108;";
                    $stmtTotEneFlEfIn = $dbconec->prepare($queryTotalEneFlEfIn);
                    $stmtTotEneFlEfIn->execute();
                    
                    $queryTotalFebFlEfIn="update reporte_store_flujoefectivo set febrero = (select sum(febrero) from reporte_store_flujoefectivo where nivel >=106 and nivel <=107) where nivel = 108;";
                    $stmtTotFebFlEfIn = $dbconec->prepare($queryTotalFebFlEfIn);
                    $stmtTotFebFlEfIn->execute();
                    
                    $queryTotalMarFlEfIn="update reporte_store_flujoefectivo set marzo = (select sum(marzo) from reporte_store_flujoefectivo where nivel >=106 and nivel <=107) where nivel = 108;";
                    $stmtTotMarFlEfIn = $dbconec->prepare($queryTotalMarFlEfIn);
                    $stmtTotMarFlEfIn->execute();
                    
                    //ABRIL
                    $queryTotalMarFlEfIn="update reporte_store_flujoefectivo set abril = (select sum(abril) from reporte_store_flujoefectivo where nivel >=106 and nivel <=107) where nivel = 108;";
                    $stmtTotMarFlEfIn = $dbconec->prepare($queryTotalMarFlEfIn);
                    $stmtTotMarFlEfIn->execute();
                    
                    $queryTotalMarFlEfIn="update reporte_store_flujoefectivo set mayo = (select sum(mayo) from reporte_store_flujoefectivo where nivel >=106 and nivel <=107) where nivel = 108;";
                    $stmtTotMarFlEfIn = $dbconec->prepare($queryTotalMarFlEfIn);
                    $stmtTotMarFlEfIn->execute();
                    
                    $queryTotalMarFlEfIn="update reporte_store_flujoefectivo set junio = (select sum(junio) from reporte_store_flujoefectivo where nivel >=106 and nivel <=107) where nivel = 108;";
                    $stmtTotMarFlEfIn = $dbconec->prepare($queryTotalMarFlEfIn);
                    $stmtTotMarFlEfIn->execute();
                    
                    //JULIO
                    $queryTotalMarFlEfIn="update reporte_store_flujoefectivo set julio = (select sum(julio) from reporte_store_flujoefectivo where nivel >=106 and nivel <=107) where nivel = 108;";
                    $stmtTotMarFlEfIn = $dbconec->prepare($queryTotalMarFlEfIn);
                    $stmtTotMarFlEfIn->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                    
                    
                    
                    //JCV INGRESOS FINANCIEROS (ES LA SUMADE 58 + 59 DE LA TABLA flujo_de_efectivo)
               
                    $queryTotalEneInFi="update reporte_store_flujoefectivo set enero = (select sum(enero) from flujo_de_efectivo where nivel >= 58 and nivel<=59) where nivel = 109;";
                    $stmtTotEneInFi = $dbconec->prepare($queryTotalEneInFi);
                    $stmtTotEneInFi->execute();
                    
                    $queryTotalFebInFi="update reporte_store_flujoefectivo set febrero = (select sum(febrero) from flujo_de_efectivo where nivel >= 58 and nivel<=59) where nivel = 109;";
                    $stmtTotFebInFi = $dbconec->prepare($queryTotalFebInFi);
                    $stmtTotFebInFi->execute();
                    
                    $queryTotalMarInFi="update reporte_store_flujoefectivo set marzo = (select sum(marzo) from flujo_de_efectivo where nivel >= 58 and nivel<=59) where nivel = 109;";
                    $stmtTotMarInFi = $dbconec->prepare($queryTotalMarInFi);
                    $stmtTotMarInFi->execute();
                    
                    //ABRIL
                    $queryTotalMarInFi="update reporte_store_flujoefectivo set abril = (select sum(abril) from flujo_de_efectivo where nivel >= 58 and nivel<=59) where nivel = 109;";
                    $stmtTotMarInFi = $dbconec->prepare($queryTotalMarInFi);
                    $stmtTotMarInFi->execute();
                    
                    $queryTotalMarInFi="update reporte_store_flujoefectivo set mayo = (select sum(mayo) from flujo_de_efectivo where nivel >= 58 and nivel<=59) where nivel = 109;";
                    $stmtTotMarInFi = $dbconec->prepare($queryTotalMarInFi);
                    $stmtTotMarInFi->execute();
                    
                    $queryTotalMarInFi="update reporte_store_flujoefectivo set junio = (select sum(junio) from flujo_de_efectivo where nivel >= 58 and nivel<=59) where nivel = 109;";
                    $stmtTotMarInFi = $dbconec->prepare($queryTotalMarInFi);
                    $stmtTotMarInFi->execute();
                    
                    //JULIO
                    $queryTotalMarInFi="update reporte_store_flujoefectivo set julio = (select sum(julio) from flujo_de_efectivo where nivel >= 58 and nivel<=59) where nivel = 109;";
                    $stmtTotMarInFi = $dbconec->prepare($queryTotalMarInFi);
                    $stmtTotMarInFi->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                     
                    
                    
                    //JCV EGRESOS FINANCIERO (ES LA 60+61 DE LA TABLA flujo_de_efectivo)
               
                    $queryTotalEneEgFi="update reporte_store_flujoefectivo set enero = (select enero from flujo_de_efectivo where nivel = 60)+(select enero from flujo_de_efectivo where nivel = 61) where nivel = 110;";
                    $stmtTotEneEgFi = $dbconec->prepare($queryTotalEneEgFi);
                    $stmtTotEneEgFi->execute();
                    
                    $queryTotalFebEgFi="update reporte_store_flujoefectivo set febrero = (select febrero from flujo_de_efectivo where nivel = 60)+(select febrero from flujo_de_efectivo where nivel = 61) where nivel = 110;";
                    $stmtTotFebEgFi = $dbconec->prepare($queryTotalFebEgFi);
                    $stmtTotFebEgFi->execute();
                    
                    $queryTotalMarEgFi="update reporte_store_flujoefectivo set marzo = (select marzo from flujo_de_efectivo where nivel = 60)+(select marzo from flujo_de_efectivo where nivel = 61) where nivel = 110;";
                    $stmtTotMarEgFi = $dbconec->prepare($queryTotalMarEgFi);
                    $stmtTotMarEgFi->execute();
                    
                    //ABRIL
                    $queryTotalMarEgFi="update reporte_store_flujoefectivo set abril = (select abril from flujo_de_efectivo where nivel = 60)+(select abril from flujo_de_efectivo where nivel = 61) where nivel = 110;";
                    $stmtTotMarEgFi = $dbconec->prepare($queryTotalMarEgFi);
                    $stmtTotMarEgFi->execute();
                    
                    $queryTotalMarEgFi="update reporte_store_flujoefectivo set mayo = (select mayo from flujo_de_efectivo where nivel = 60)+(select mayo from flujo_de_efectivo where nivel = 61)where nivel = 110;";
                    $stmtTotMarEgFi = $dbconec->prepare($queryTotalMarEgFi);
                    $stmtTotMarEgFi->execute();
                    
                    $queryTotalMarEgFi="update reporte_store_flujoefectivo set junio = (select junio from flujo_de_efectivo where nivel = 60)+(select junio from flujo_de_efectivo where nivel = 61) where nivel = 110;";
                    $stmtTotMarEgFi = $dbconec->prepare($queryTotalMarEgFi);
                    $stmtTotMarEgFi->execute();
                    
                    //JULIO
                    $queryTotalMarEgFi="update reporte_store_flujoefectivo set julio = (select julio from flujo_de_efectivo where nivel = 60)+(select julio from flujo_de_efectivo where nivel = 61) where nivel = 110;";
                    $stmtTotMarEgFi = $dbconec->prepare($queryTotalMarEgFi);
                    $stmtTotMarEgFi->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                     
                    
                    
                    //JCV FLUJO DE EFECTIVO FINANCIERO (ES LA SUMA DE LA 109 A LA 110 DE LA TABLA reporte_store_flujoefectivo)
               
                    $queryTotalEneFlEfFi="update reporte_store_flujoefectivo set enero = (select sum(enero) from reporte_store_flujoefectivo where nivel >=109 and nivel <=110) where nivel = 111;";
                    $stmtTotEneFlEfFi = $dbconec->prepare($queryTotalEneFlEfFi);
                    $stmtTotEneFlEfFi->execute();
                    
                    $queryTotalFebFlEfFi="update reporte_store_flujoefectivo set febrero = (select sum(febrero) from reporte_store_flujoefectivo where nivel >=109 and nivel <=110) where nivel = 111;";
                    $stmtTotFebFlEfFi = $dbconec->prepare($queryTotalFebFlEfFi);
                    $stmtTotFebFlEfFi->execute();
                    
                    $queryTotalMarFlEfFi="update reporte_store_flujoefectivo set marzo = (select sum(marzo) from reporte_store_flujoefectivo where nivel >=109 and nivel <=110) where nivel = 111;";
                    $stmtTotMarFlEfFi = $dbconec->prepare($queryTotalMarFlEfFi);
                    $stmtTotMarFlEfFi->execute();
                    
                    //ABRIL
                     $queryTotalMarFlEfFi="update reporte_store_flujoefectivo set abril = (select sum(abril) from reporte_store_flujoefectivo where nivel >=109 and nivel <=110) where nivel = 111;";
                    $stmtTotMarFlEfFi = $dbconec->prepare($queryTotalMarFlEfFi);
                    $stmtTotMarFlEfFi->execute();
                    
                     $queryTotalMarFlEfFi="update reporte_store_flujoefectivo set mayo = (select sum(mayo) from reporte_store_flujoefectivo where nivel >=109 and nivel <=110) where nivel = 111;";
                    $stmtTotMarFlEfFi = $dbconec->prepare($queryTotalMarFlEfFi);
                    $stmtTotMarFlEfFi->execute();
                    
                     $queryTotalMarFlEfFi="update reporte_store_flujoefectivo set junio = (select sum(junio) from reporte_store_flujoefectivo where nivel >=109 and nivel <=110) where nivel = 111;";
                    $stmtTotMarFlEfFi = $dbconec->prepare($queryTotalMarFlEfFi);
                    $stmtTotMarFlEfFi->execute();
                    
                    //JULIO
                     $queryTotalMarFlEfFi="update reporte_store_flujoefectivo set julio = (select sum(julio) from reporte_store_flujoefectivo where nivel >=109 and nivel <=110) where nivel = 111;";
                    $stmtTotMarFlEfFi = $dbconec->prepare($queryTotalMarFlEfFi);
                    $stmtTotMarFlEfFi->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                      
                    
                    
                    //JCV EFECTIVO FINAL (ES LA SUMA DE LA 101 + 105 + 108 + 111 DE LA TABLA reporte_store_flujoefectivo)
                
                    $queryTotalEneEfFi="update reporte_store_flujoefectivo set enero = (select enero from reporte_store_flujoefectivo where nivel =101)+(select enero from reporte_store_flujoefectivo where nivel =105)+(select enero from reporte_store_flujoefectivo where nivel =108)+(select enero from reporte_store_flujoefectivo where nivel =111) where nivel = 112;";
                    $stmtTotEneEfFi = $dbconec->prepare($queryTotalEneEfFi);
                    $stmtTotEneEfFi->execute();
                    
                    
                    //JCV SALDO INICIAL FEBRERO) ES EL FINAL DE ENERO
                    $queryTotalFebEfIn="update reporte_store_flujoefectivo set febrero = (select enero from reporte_store_flujoefectivo where nivel = 112) where nivel = 101;";
                    $stmtTotFebEfIn = $dbconec->prepare($queryTotalFebEfIn);
                    $stmtTotFebEfIn->execute();
                    
                     //JCV EFECTIVO FINAL (ES LA SUMA DE LA 101 + 105 + 108 + 111 DE LA TABLA reporte_store_flujoefectivo)
                    $queryTotalFebEfFi="update reporte_store_flujoefectivo set febrero = (select febrero from reporte_store_flujoefectivo where nivel =101)+(select febrero from reporte_store_flujoefectivo where nivel =105)+(select febrero from reporte_store_flujoefectivo where nivel =108)+(select febrero from reporte_store_flujoefectivo where nivel =111) where nivel = 112;";
                    $stmtTotFebEfFi = $dbconec->prepare($queryTotalFebEfFi);
                    $stmtTotFebEfFi->execute();
                    
                    
                    
                    //JCV SALDO INICIAL MARZO) ES EL FINAL DE FEBRERO
                    $queryTotalMarEfIn="update reporte_store_flujoefectivo set marzo = (select febrero from reporte_store_flujoefectivo where nivel = 112) where nivel = 101;";
                    $stmtTotMarEfIn = $dbconec->prepare($queryTotalMarEfIn);
                    $stmtTotMarEfIn->execute();
                    
                    //JCV EFECTIVO FINAL MARZO (ES LA SUMA DE LA 101 + 105 + 108 + 111 DE LA TABLA reporte_store_flujoefectivo)
                    $queryTotalMarEfFi="update reporte_store_flujoefectivo set marzo = (select marzo from reporte_store_flujoefectivo where nivel =101)+(select marzo from reporte_store_flujoefectivo where nivel =105)+(select marzo from reporte_store_flujoefectivo where nivel =108)+(select marzo from reporte_store_flujoefectivo where nivel =111) where nivel = 112;";
                    $stmtTotMarEfFi = $dbconec->prepare($queryTotalMarEfFi);
                    $stmtTotMarEfFi->execute();
                    
                    
                    
                    ////JCV SALDO INICIAL ABRIL) ES EL FINAL DE MARZO
                    $queryTotalMarEfIn="update reporte_store_flujoefectivo set abril = (select marzo from reporte_store_flujoefectivo where nivel = 112) where nivel = 101;";
                    $stmtTotMarEfIn = $dbconec->prepare($queryTotalMarEfIn);
                    $stmtTotMarEfIn->execute();

                     //JCV EFECTIVO FINAL (ES LA SUMA DE LA 101 + 105 + 108 + 111 DE LA TABLA reporte_store_flujoefectivo)
                    //ABRIL
                    $queryTotalMarEfFi="update reporte_store_flujoefectivo set abril = (select abril from reporte_store_flujoefectivo where nivel =101)+(select abril from reporte_store_flujoefectivo where nivel =105)+(select abril from reporte_store_flujoefectivo where nivel =108)+(select abril from reporte_store_flujoefectivo where nivel =111) where nivel = 112;";
                    $stmtTotMarEfFi = $dbconec->prepare($queryTotalMarEfFi);
                    $stmtTotMarEfFi->execute();
                    
                                        
                    //JCV SALDO INICIAL MAYO) ES EL FINAL DE abril
                    $queryTotalMarEfIn="update reporte_store_flujoefectivo set mayo = (select abril from reporte_store_flujoefectivo where nivel = 112) where nivel = 101;";
                    $stmtTotMarEfIn = $dbconec->prepare($queryTotalMarEfIn);
                    $stmtTotMarEfIn->execute();
                    
                     //JCV EFECTIVO FINAL (ES LA SUMA DE LA 101 + 105 + 108 + 111 DE LA TABLA reporte_store_flujoefectivo)
                    $queryTotalMarEfFi="update reporte_store_flujoefectivo set mayo = (select mayo from reporte_store_flujoefectivo where nivel =101)+(select mayo from reporte_store_flujoefectivo where nivel =105)+(select mayo from reporte_store_flujoefectivo where nivel =108)+(select mayo from reporte_store_flujoefectivo where nivel =111) where nivel = 112;";
                    $stmtTotMarEfFi = $dbconec->prepare($queryTotalMarEfFi);
                    $stmtTotMarEfFi->execute();
                    
                    
                    //JCV SALDO INICIAL JUNIO) ES EL FINAL DE MAYO
                    $queryTotalMarEfIn="update reporte_store_flujoefectivo set junio = (select mayo from reporte_store_flujoefectivo where nivel = 112) where nivel = 101;";
                    $stmtTotMarEfIn = $dbconec->prepare($queryTotalMarEfIn);
                    $stmtTotMarEfIn->execute();
                    
                      //JCV EFECTIVO FINAL JUNIO (ES LA SUMA DE LA 101 + 105 + 108 + 111 DE LA TABLA reporte_store_flujoefectivo)
                    $queryTotalMarEfFi="update reporte_store_flujoefectivo set junio = (select junio from reporte_store_flujoefectivo where nivel =101)+(select junio from reporte_store_flujoefectivo where nivel =105)+(select junio from reporte_store_flujoefectivo where nivel =108)+(select junio from reporte_store_flujoefectivo where nivel =111) where nivel = 112;";
                    $stmtTotMarEfFi = $dbconec->prepare($queryTotalMarEfFi);
                    $stmtTotMarEfFi->execute();
                    
                    
                     //JCV SALDO INICIAL JULIO) ES EL FINAL DE JUNIO
                    $queryTotalMarEfIn="update reporte_store_flujoefectivo set julio = (select junio from reporte_store_flujoefectivo where nivel = 112) where nivel = 101;";
                    $stmtTotMarEfIn = $dbconec->prepare($queryTotalMarEfIn);
                    $stmtTotMarEfIn->execute();
                    
                    //JCV EFECTIVO FINAL (ES LA SUMA DE LA 101 + 105 + 108 + 111 DE LA TABLA reporte_store_flujoefectivo)
                    //JULIO
                    $queryTotalMarEfFi="update reporte_store_flujoefectivo set julio = (select julio from reporte_store_flujoefectivo where nivel =101)+(select julio from reporte_store_flujoefectivo where nivel =105)+(select julio from reporte_store_flujoefectivo where nivel =108)+(select julio from reporte_store_flujoefectivo where nivel =111) where nivel = 112;";
                    $stmtTotMarEfFi = $dbconec->prepare($queryTotalMarEfFi);
                    $stmtTotMarEfFi->execute();
                    
                    
                                        
                     //JCV SALDO INICIAL AGOSTO) ES EL FINAL DE JULIO
                    $queryTotalMarEfIn="update reporte_store_flujoefectivo set agosto = (select julio from reporte_store_flujoefectivo where nivel = 112) where nivel = 101;";
                    $stmtTotMarEfIn = $dbconec->prepare($queryTotalMarEfIn);
                    $stmtTotMarEfIn->execute();
                    
                     //JCV EFECTIVO FINAL (ES LA SUMA DE LA 101 + 105 + 108 + 111 DE LA TABLA reporte_store_flujoefectivo)
                    $queryTotalMarEfFi="update reporte_store_flujoefectivo set agosto = (select agosto from reporte_store_flujoefectivo where nivel =101)+(select agosto from reporte_store_flujoefectivo where nivel =105)+(select agosto from reporte_store_flujoefectivo where nivel =108)+(select agosto from reporte_store_flujoefectivo where nivel =111) where nivel = 112;";
                    $stmtTotMarEfFi = $dbconec->prepare($queryTotalMarEfFi);
                    $stmtTotMarEfFi->execute();
                    
                    
                    
               //JCV SALDO INICIAL SEPTIEMBRE) ES EL FINAL DE AGOSTO
                    $queryTotalMarEfIn="update reporte_store_flujoefectivo set septiembre = (select agosto from reporte_store_flujoefectivo where nivel = 112) where nivel = 101;";
                    $stmtTotMarEfIn = $dbconec->prepare($queryTotalMarEfIn);
                    $stmtTotMarEfIn->execute();
                    
                    //JCV EFECTIVO FINAL (ES LA SUMA DE LA 101 + 105 + 108 + 111 DE LA TABLA reporte_store_flujoefectivo)
                    $queryTotalMarEfFi="update reporte_store_flujoefectivo set septiembre = (select septiembre from reporte_store_flujoefectivo where nivel =101)+(select septiembre from reporte_store_flujoefectivo where nivel =105)+(select septiembre from reporte_store_flujoefectivo where nivel =108)+(select septiembre from reporte_store_flujoefectivo where nivel =111) where nivel = 112;";
                    $stmtTotMarEfFi = $dbconec->prepare($queryTotalMarEfFi);
                    $stmtTotMarEfFi->execute();
                    
                    
                    
                    //JCV SALDO INICIAL OCTUBRE) ES EL FINAL DE SEPTIEMBRE
                    $queryTotalMarEfIn="update reporte_store_flujoefectivo set octubre = (select septiembre from reporte_store_flujoefectivo where nivel = 112) where nivel = 101;";
                    $stmtTotMarEfIn = $dbconec->prepare($queryTotalMarEfIn);
                    $stmtTotMarEfIn->execute();
                    
                    //JCV EFECTIVO FINAL (ES LA SUMA DE LA 101 + 105 + 108 + 111 DE LA TABLA reporte_store_flujoefectivo)
                    $queryTotalMarEfFi="update reporte_store_flujoefectivo set octubre = (select octubre from reporte_store_flujoefectivo where nivel =101)+(select octubre from reporte_store_flujoefectivo where nivel =105)+(select octubre from reporte_store_flujoefectivo where nivel =108)+(select octubre from reporte_store_flujoefectivo where nivel =111) where nivel = 112;";
                    $stmtTotMarEfFi = $dbconec->prepare($queryTotalMarEfFi);
                    $stmtTotMarEfFi->execute();
                    
                    
                    
                    //JCV SALDO INICIAL NOVIEMBRE) ES EL FINAL DE OCTUBRE
                    $queryTotalMarEfIn="update reporte_store_flujoefectivo set noviembre = (select octubre from reporte_store_flujoefectivo where nivel = 112) where nivel = 101;";
                    $stmtTotMarEfIn = $dbconec->prepare($queryTotalMarEfIn);
                    $stmtTotMarEfIn->execute();
                    
                     //JCV EFECTIVO FINAL NOVIEMBRE (ES LA SUMA DE LA 101 + 105 + 108 + 111 DE LA TABLA reporte_store_flujoefectivo)
                    $queryTotalMarEfFi="update reporte_store_flujoefectivo set noviembre = (select noviembre from reporte_store_flujoefectivo where nivel =101)+(select noviembre from reporte_store_flujoefectivo where nivel =105)+(select noviembre from reporte_store_flujoefectivo where nivel =108)+(select noviembre from reporte_store_flujoefectivo where nivel =111) where nivel = 112;";
                    $stmtTotMarEfFi = $dbconec->prepare($queryTotalMarEfFi);
                    $stmtTotMarEfFi->execute();
                    
                    
                    //JCV SALDO INICIAL DICEIMBRE) ES EL FINAL DE NOVIEMBRE
                    $queryTotalMarEfIn="update reporte_store_flujoefectivo set diciembre = (select noviembre from reporte_store_flujoefectivo where nivel = 112) where nivel = 101;";
                    $stmtTotMarEfIn = $dbconec->prepare($queryTotalMarEfIn);
                    $stmtTotMarEfIn->execute();
                    
                      //JCV EFECTIVO FINAL (ES LA SUMA DE LA 101 + 105 + 108 + 111 DE LA TABLA reporte_store_flujoefectivo)
                    //DICIEMBRE
                    $queryTotalMarEfFi="update reporte_store_flujoefectivo set diciembre = (select diciembre from reporte_store_flujoefectivo where nivel =101)+(select diciembre from reporte_store_flujoefectivo where nivel =105)+(select diciembre from reporte_store_flujoefectivo where nivel =108)+(select diciembre from reporte_store_flujoefectivo where nivel =111) where nivel = 112;";
                    $stmtTotMarEfFi = $dbconec->prepare($queryTotalMarEfFi);
                    $stmtTotMarEfFi->execute();
                    

                    
                    //JCV FLUJO LIBRE (ES LA DIFERENCIA DE LA 112 - 101 DE LA TABLA reporte_store_flujoefectivo)
               
                    $queryTotalEneFlLi="update reporte_store_flujoefectivo set enero = (select enero from reporte_store_flujoefectivo where nivel =112)-(select enero from reporte_store_flujoefectivo where nivel =101) where nivel = 113;";
                    $stmtTotEneFlLi = $dbconec->prepare($queryTotalEneFlLi);
                    $stmtTotEneFlLi->execute();
                    
                    $queryTotalFebFlLi="update reporte_store_flujoefectivo set febrero = (select febrero from reporte_store_flujoefectivo where nivel =112)-(select febrero from reporte_store_flujoefectivo where nivel =101) where nivel = 113;";
                    $stmtTotFebFlLi = $dbconec->prepare($queryTotalFebFlLi);
                    $stmtTotFebFlLi->execute();
                    
                    $queryTotalMarFlLi="update reporte_store_flujoefectivo set marzo = (select marzo from reporte_store_flujoefectivo where nivel =112)-(select marzo from reporte_store_flujoefectivo where nivel =101) where nivel = 113;";
                    $stmtTotMarFlLi = $dbconec->prepare($queryTotalMarFlLi);
                    $stmtTotMarFlLi->execute();
                    
                    //ABRIL
                    $queryTotalMarFlLi="update reporte_store_flujoefectivo set abril = (select abril from reporte_store_flujoefectivo where nivel =112)-(select abril from reporte_store_flujoefectivo where nivel =101) where nivel = 113;";
                    $stmtTotMarFlLi = $dbconec->prepare($queryTotalMarFlLi);
                    $stmtTotMarFlLi->execute();
                    
                    $queryTotalMarFlLi="update reporte_store_flujoefectivo set mayo = (select mayo from reporte_store_flujoefectivo where nivel =112)-(select mayo from reporte_store_flujoefectivo where nivel =101) where nivel = 113;";
                    $stmtTotMarFlLi = $dbconec->prepare($queryTotalMarFlLi);
                    $stmtTotMarFlLi->execute();
                    
                    $queryTotalMarFlLi="update reporte_store_flujoefectivo set junio = (select junio from reporte_store_flujoefectivo where nivel =112)-(select junio from reporte_store_flujoefectivo where nivel =101) where nivel = 113;";
                    $stmtTotMarFlLi = $dbconec->prepare($queryTotalMarFlLi);
                    $stmtTotMarFlLi->execute();
                    
                    //JULIO
                    $queryTotalMarFlLi="update reporte_store_flujoefectivo set julio = (select julio from reporte_store_flujoefectivo where nivel =112)-(select julio from reporte_store_flujoefectivo where nivel =101) where nivel = 113;";
                    $stmtTotMarFlLi = $dbconec->prepare($queryTotalMarFlLi);
                    $stmtTotMarFlLi->execute();
                    
                     
//JCV FALTA DE AGOSTO A DICIEMBRE...                    
                    
                    
                     
                    ///////////////////////////ACUMULADO////////////////////
                    
                     //JCV PARA ACUMULADO DE TODAS
                    $queryTotalAcuGral="update reporte_store_flujoefectivo set acumulado = enero + febrero + marzo + abril + mayo + junio + julio + agosto + septiembre + octubre + noviembre + diciembre ;";
                    $stmtTotAcuGral = $dbconec->prepare($queryTotalAcuGral);
                    $stmtTotAcuGral->execute();
                    
                    
                     //JCV PARA ACUMULADO EFECTIVO INICIAL: 101(LA MISMA) DE FEBRERO
                    $queryTotalAcuGral="update reporte_store_flujoefectivo set acumulado = (select febrero from reporte_store_flujoefectivo where nivel = 101) where nivel = 101;";
                    $stmtTotAcuGral = $dbconec->prepare($queryTotalAcuGral);
                    $stmtTotAcuGral->execute();
                    
                    
                     //JCV PARA ACUMULADO FLUJO EFECTIVO OPERATIVO: 102+103+104
                    $queryTotalAcuGral="update reporte_store_flujoefectivo set acumulado = (select acumulado from reporte_store_flujoefectivo where nivel = 102)+(select acumulado from reporte_store_flujoefectivo where nivel = 103)+(select acumulado from reporte_store_flujoefectivo where nivel = 104) where nivel = 105;";
                    $stmtTotAcuGral = $dbconec->prepare($queryTotalAcuGral);
                    $stmtTotAcuGral->execute();
                    
                    
                    //JCV PARA ACUMULADO FLUJO EFECTIVO FINANCIERO: 109+110
                    $queryTotalAcuGral="update reporte_store_flujoefectivo set acumulado = (select acumulado from reporte_store_flujoefectivo where nivel = 109)+(select acumulado from reporte_store_flujoefectivo where nivel = 110) where nivel = 111;";
                    $stmtTotAcuGral = $dbconec->prepare($queryTotalAcuGral);
                    $stmtTotAcuGral->execute();
                    
                    
                    //JCV PARA ACUMULADO EFECTIVO FINAL: EL DE DICIEMBRE
                    $queryTotalAcuGral="update reporte_store_flujoefectivo set acumulado = diciembre  where nivel = 112;";
                    $stmtTotAcuGral = $dbconec->prepare($queryTotalAcuGral);
                    $stmtTotAcuGral->execute();
                    
                    //JCV PARA ACUMULADO FLUJO LIBRE: 112-101
                    $queryTotalAcuGral="update reporte_store_flujoefectivo set acumulado = (select acumulado from reporte_store_flujoefectivo where nivel = 112)-(select acumulado from reporte_store_flujoefectivo where nivel = 101) where nivel = 113;";
                    $stmtTotAcuGral = $dbconec->prepare($queryTotalAcuGral);
                    $stmtTotAcuGral->execute();
                    
                    
                    
                    
                    ///////////////////////////PROMEDIOS/////////////////////
                    //JCV PARA PONER EL NUMERO DE MES, CON BASE AL MES ACTUAL
                    
                    $mes_actual = date('n');
                    
                    
                    //PARA SABER LOS VALORES DE LOS CAMPOS DE ENERO A DICIEMBRE 
                    //EMPEZAMOS CON DICIEMBRE SI DICIEMBRE NO ES CERO (O SEA TIENE VALORES) ES 12, SINO SE VA HACIA NOVIEMBRE Y ASI SUCESIVAMENTE
                   
                    try 
                    { 
                        $query = "SELECT * FROM reporte_store_flujoefectivo where nivel =102 ;";
                        $stmt = $dbconec->prepare($query);
                        $stmt->execute();
                        $count = $stmt->rowCount();
                        if($count > 0)
                        { 
                            $filas3 = $stmt->fetchAll();
                            if (is_array($filas3) || is_object($filas3))
                            {
                                foreach ($filas3 as $row => $column)
                                {
                                    $dic =$column['diciembre'];
                                    $nov =$column['noviembre'];
                                    $oct =$column['octubre'];
                                    $sep =$column['septiembre'];
                                    $ago =$column['agosto'];
                                    $jul =$column['julio'];
                                    $jun =$column['junio'];
                                    $may =$column['mayo'];
                                    $abr =$column['abril'];
                                    $mar =$column['marzo'];
                                    $feb =$column['febrero'];
                                    $ene =$column['enero'];

                                }    
                            }
                            
                            if($dic !=0){
                                $mes_actual=12;
                            }
                            elseif ($nov !=0) {
                                $mes_actual=11;
                            }
                            elseif ($oct !=0) {
                                $mes_actual=10;
                            }
                            elseif ($sep !=0) {
                                $mes_actual=9;
                            }
                            elseif ($ago !=0) {
                                $mes_actual=8;
                            }
                            elseif ($jul !=0) {
                                $mes_actual=7;
                            }
                            elseif ($jun !=0) {
                                $mes_actual=6;
                            }
                            elseif ($may !=0) {
                                $mes_actual=5;
                            }
                            elseif ($abr !=0) {
                                $mes_actual=4;
                            }
                            elseif ($mar !=0) {
                                $mes_actual=3;
                            }
                            elseif ($feb !=0) {
                                $mes_actual=2;
                            }
                            elseif ($ene !=0) {
                                $mes_actual=1;
                            }
                            else{
                                $mes_actual=12;
                            }
                            
                            
                        }
                    } catch (Exception $e) {
                            echo '<span class="label label-danger label-block">ERROR AL CARGAR LOS DATOS, NO HAY REGISTROS EN ESTADO DE RESULTADOS</span>';
                    }
                    
                    
                    //////////////PROMEDIOS////////////////
                    
                    //JCV PARA PROMEDIOS DE TODAS
                    $queryTotalPromGral="update reporte_store_flujoefectivo set promedio = acumulado / $mes_actual ;";
                    $stmtTotPromGral = $dbconec->prepare($queryTotalPromGral);
                    $stmtTotPromGral->execute(); 
                    
                    
                      //JCV PARA promedio FLUJO DE EFECTIVO FINANCIERO 109+110
                    $queryTotalProm="update reporte_store_flujoefectivo set promedio = (select promedio from reporte_store_flujoefectivo where nivel = 109)+(select promedio from reporte_store_flujoefectivo where nivel = 110) where nivel = 111;";
                    $stmtTotProm = $dbconec->prepare($queryTotalProm);
                    $stmtTotProm->execute();
                    
                    
                    //JCV PARA promedio EFECTIVO INICIAL
                    $queryTotalProm="update reporte_store_flujoefectivo set promedio = 0 where nivel = 101;";
                    $stmtTotProm = $dbconec->prepare($queryTotalProm);
                    $stmtTotProm->execute();
                    
                     //JCV PARA promedio EFECTIVO FINAL
                    $queryTotalProm="update reporte_store_flujoefectivo set promedio = 0 where nivel = 112;";
                    $stmtTotProm = $dbconec->prepare($queryTotalProm);
                    $stmtTotProm->execute();
                    
                     
                     
                $dbconec = null;

            } else{
                
                //falta mensaje de que no hay registros 
            }// JCV DEL IF

 

                } catch (Exception $e) {
                        $data = "Error";
                        echo json_encode($data);

                }

        }
                
                 
                
                
                public function Listar_flujoefectivo()  
		{
                            $dbconec = Conexion::Conectar();

                    try 
                    {  
                            $query = "SELECT * FROM reporte_store_flujoefectivo order by nivel ;";
                            $stmt = $dbconec->prepare($query);
                            $stmt->execute();
                            $count = $stmt->rowCount();

                            if($count > 0)
                            {
                                    return $stmt->fetchAll();
                            }


                            $dbconec = null;
                    } catch (Exception $e) {

                            echo '<span class="label label-danger label-block">ERROR AL CARGAR LOS DATOS, PRESIONE F5</span>';
                    }
		}
                
                
            
                
                
                
                
                
                
                		
                
                
                
		

	}


 ?>
