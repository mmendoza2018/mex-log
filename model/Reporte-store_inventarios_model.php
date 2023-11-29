<?php    
/*JCV OBTENIDO DEL ARCHIVO cuentasdebancos_model.php*/
	require_once('Conexion.php');  
         
    
	class ReporteinventariosModel extends Conexion  
	{
               
                public function Insertar_datos_inventarios()  
		{
                $dbconec = Conexion::Conectar();
                try
                {
                    $anio = date('Y');
                    //$anio = "2022";
                    $id_acumulativaGlobal=8;
                      
                    
                    //JCV PARA CHECAR QUE  SE CALCULE PRIMERO EL FLIJO DE EFECTIVO, DE OTRA FORMA NOESTARÍAN COMPLETOS LOS CALCULOS
                    $queryChecaNivel = "SELECT * FROM flujo_de_efectivo where nivel>=80 ;";
                     $stmtChecaNivel = $dbconec->prepare($queryChecaNivel);
                     $stmtChecaNivel->execute();
                     $cuenta = $stmtChecaNivel->rowCount();
                    
                    if($cuenta<=0){
                         echo '<span class="label label-danger label-block">Primero tiene que calcular el Flujo de Efectivo.  Se encuentra dentro del menú principal en la ópción Flujo de efectivo y Análisis de flujo en el tab 1</span>';
                        exit();
                    }
                         
                      
                    
                    
                    
                    /////////////////////////////////OJO////////////////////////////////
                    //JCV SALDO INICIAL DE INVENTARIS STOCK (ES LA 80 DE LA TABLA flujo_de_efectivo PERO SE METE MANUAL EN AQUI EN ESTA TABLA)
                    //JCV TAMBIÉN LA 81 Y 82
                    
                       //////////jcv PARA INVENTARIO STOCK:)
                     
                    //JCV SALDO FINAL DE INVENTARIS STOCK(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 83)
                     
                    $queryTotalEneSaFinInv="update reporte_store_inventarios set enero = (select enero from flujo_de_efectivo where nivel = 83) where nivel = 83;";
                    $stmtTotEneSaFiInv = $dbconec->prepare($queryTotalEneSaFinInv);
                    $stmtTotEneSaFiInv->execute();
                    
                    //JCV SALDO inicial DE FEBRERO ES EL SALDO FINAL DE ENERO DE INVENTARIS STOCK(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 83)
                     
                    $queryTotalEneSaInInv="update reporte_store_inventarios set febrero = (select enero from reporte_store_inventarios where nivel = 83) where nivel = 80;";
                    $stmtTotEneSaInInv = $dbconec->prepare($queryTotalEneSaInInv);
                    $stmtTotEneSaInInv->execute();
                    
                    //JCV SALDO FINAL DE FEBRERO INVENTARIS STOCK(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 83, PERO LO SAQUÚE DE ESTA TABLA:reporte_store_inventarios LA 80+81-82)
                     
                    $queryTotalFebSaFinInv="update reporte_store_inventarios set febrero = (select febrero from reporte_store_inventarios where nivel = 80)+(select febrero from reporte_store_inventarios where nivel = 81)-(select febrero from reporte_store_inventarios where nivel = 82) where nivel = 83;";
                    $stmtTotFebSaFiInv = $dbconec->prepare($queryTotalFebSaFinInv);
                    $stmtTotFebSaFiInv->execute();
                    
                     //JCV SALDO inicial DE MARZO ES EL SALDO FINAL DE FEBRERO DE INVENTARIS STOCK(LA 80 DE MARZO ES LA 83 DE FEBRERO, reporte_store_inventarios)
                     
                    $queryTotalMarSaInInv="update reporte_store_inventarios set marzo = (select febrero from reporte_store_inventarios where nivel = 83) where nivel = 80;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV SALDO FINAL DE MARZO INVENTARIS STOCK(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 83, PERO LO SAQUÚE DE ESTA TABLA:reporte_store_inventarios LA 80+81-82)
                     
                    $queryTotalMarSaFinInv="update reporte_store_inventarios set marzo = (select marzo from reporte_store_inventarios where nivel = 80)+(select marzo from reporte_store_inventarios where nivel = 81)-(select marzo from reporte_store_inventarios where nivel = 82) where nivel = 83;";
                    $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFinInv);
                    $stmtTotMarSaFiInv->execute();
                    
                    
                    //ABRIL
                     //JCV SALDO inicial DE ABRIL ES EL SALDO FINAL DE MARZO DE INVENTARIO STOCK(LA 80 DE MARZO ES LA 83 DE FEBRERO, reporte_store_inventarios)
                     
                    $queryTotalMarSaInInv="update reporte_store_inventarios set abril = (select marzo from reporte_store_inventarios where nivel = 83) where nivel = 80;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV SALDO FINAL DE ABRIL INVENTARIS STOCK(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 83, PERO LO SAQUÚE DE ESTA TABLA:reporte_store_inventarios LA 80+81-82)
                     
                    $queryTotalMarSaFinInv="update reporte_store_inventarios set abril = (select abril from reporte_store_inventarios where nivel = 80)+(select abril from reporte_store_inventarios where nivel = 81)-(select abril from reporte_store_inventarios where nivel = 82) where nivel = 83;";
                    $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFinInv);
                    $stmtTotMarSaFiInv->execute();
                    
                    
                     //JCV SALDO inicial DE MAYO ES EL SALDO FINAL DE ABRIL DE INVENTARIS STOCK(LA 80 DE MARZO ES LA 83 DE FEBRERO, reporte_store_inventarios)
                    $queryTotalMarSaInInv="update reporte_store_inventarios set mayo = (select abril from reporte_store_inventarios where nivel = 83) where nivel = 80;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV SALDO FINAL DE MAYO INVENTARIS STOCK(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 83, PERO LO SAQUÚE DE ESTA TABLA:reporte_store_inventarios LA 80+81-82)
                    $queryTotalMarSaFinInv="update reporte_store_inventarios set mayo = (select mayo from reporte_store_inventarios where nivel = 80)+(select mayo from reporte_store_inventarios where nivel = 81)-(select mayo from reporte_store_inventarios where nivel = 82) where nivel = 83;";
                    $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFinInv);
                    $stmtTotMarSaFiInv->execute();
                    
                    
                     //JCV SALDO inicial DE JUNIO ES EL SALDO FINAL DE MAYO DE INVENTARIS STOCK(LA 80 DE MARZO ES LA 83 DE FEBRERO, reporte_store_inventarios)
                     
                    $queryTotalMarSaInInv="update reporte_store_inventarios set junio = (select mayo from reporte_store_inventarios where nivel = 83) where nivel = 80;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV SALDO FINAL DE JUNIO INVENTARIS STOCK(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 83, PERO LO SAQUÚE DE ESTA TABLA:reporte_store_inventarios LA 80+81-82)
                     
                    $queryTotalMarSaFinInv="update reporte_store_inventarios set junio = (select junio from reporte_store_inventarios where nivel = 80)+(select junio from reporte_store_inventarios where nivel = 81)-(select junio from reporte_store_inventarios where nivel = 82) where nivel = 83;";
                    $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFinInv);
                    $stmtTotMarSaFiInv->execute();
                    
                    
                    //JULIO
                     //JCV SALDO inicial DE JULIO ES EL SALDO FINAL DE JUNIO DE INVENTARIS STOCK(LA 80 DE MARZO ES LA 83 DE FEBRERO, reporte_store_inventarios)
                     
                    $queryTotalMarSaInInv="update reporte_store_inventarios set julio = (select junio from reporte_store_inventarios where nivel = 83) where nivel = 80;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV SALDO FINAL DE JULIO INVENTARIS STOCK(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 83, PERO LO SAQUÚE DE ESTA TABLA:reporte_store_inventarios LA 80+81-82)
                     
                    $queryTotalMarSaFinInv="update reporte_store_inventarios set julio = (select julio from reporte_store_inventarios where nivel = 80)+(select julio from reporte_store_inventarios where nivel = 81)-(select julio from reporte_store_inventarios where nivel = 82) where nivel = 83;";
                    $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFinInv);
                    $stmtTotMarSaFiInv->execute();
                    
                    
                    //AGOSTO
                     //JCV SALDO inicial DE AGOSTO ES EL SALDO FINAL DE JULIO DE INVENTARIS STOCK(LA 80 DE MARZO ES LA 83 DE FEBRERO, reporte_store_inventarios)
                     
                    $queryTotalMarSaInInv="update reporte_store_inventarios set agosto = (select julio from reporte_store_inventarios where nivel = 83) where nivel = 80;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV SALDO FINAL DE AGOSTO INVENTARIS STOCK(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 83, PERO LO SAQUÚE DE ESTA TABLA:reporte_store_inventarios LA 80+81-82)
                     
                    $queryTotalMarSaFinInv="update reporte_store_inventarios set agosto = (select agosto from reporte_store_inventarios where nivel = 80)+(select agosto from reporte_store_inventarios where nivel = 81)-(select agosto from reporte_store_inventarios where nivel = 82) where nivel = 83;";
                    $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFinInv);
                    $stmtTotMarSaFiInv->execute();
                    
                    
                    //SEPTIEMBRE
                     //JCV SALDO inicial DE SEPTIEMBRE ES EL SALDO FINAL DE AGOSTO DE INVENTARIS STOCK(LA 80 DE MARZO ES LA 83 DE FEBRERO, reporte_store_inventarios)
                     
                    $queryTotalMarSaInInv="update reporte_store_inventarios set septiembre = (select agosto from reporte_store_inventarios where nivel = 83) where nivel = 80;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV SALDO FINAL DE SEPTIEMBRE INVENTARIS STOCK(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 83, PERO LO SAQUÚE DE ESTA TABLA:reporte_store_inventarios LA 80+81-82)
                     
                    $queryTotalMarSaFinInv="update reporte_store_inventarios set septiembre = (select septiembre from reporte_store_inventarios where nivel = 80)+(select septiembre from reporte_store_inventarios where nivel = 81)-(select septiembre from reporte_store_inventarios where nivel = 82) where nivel = 83;";
                    $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFinInv);
                    $stmtTotMarSaFiInv->execute();
                    
                    
                    //OCTUBRE
                     //JCV SALDO inicial DE OCTUBRE ES EL SALDO FINAL DE SEPTIEMBRE DE INVENTARIS STOCK(LA 80 DE MARZO ES LA 83 DE FEBRERO, reporte_store_inventarios)
                     
                    $queryTotalMarSaInInv="update reporte_store_inventarios set octubre = (select septiembre from reporte_store_inventarios where nivel = 83) where nivel = 80;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV SALDO FINAL DE OCTUBRE INVENTARIS STOCK(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 83, PERO LO SAQUÚE DE ESTA TABLA:reporte_store_inventarios LA 80+81-82)
                     
                    $queryTotalMarSaFinInv="update reporte_store_inventarios set octubre = (select octubre from reporte_store_inventarios where nivel = 80)+(select octubre from reporte_store_inventarios where nivel = 81)-(select octubre from reporte_store_inventarios where nivel = 82) where nivel = 83;";
                    $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFinInv);
                    $stmtTotMarSaFiInv->execute();
                    
                    
                    //NOVIEMBRE
                     //JCV SALDO inicial DE NOVIEMBRE ES EL SALDO FINAL DE OCTUBRE DE INVENTARIS STOCK(LA 80 DE MARZO ES LA 83 DE FEBRERO, reporte_store_inventarios)
                     
                    $queryTotalMarSaInInv="update reporte_store_inventarios set noviembre = (select octubre from reporte_store_inventarios where nivel = 83) where nivel = 80;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV SALDO FINAL DE NOVIEMBRE INVENTARIS STOCK(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 83, PERO LO SAQUÚE DE ESTA TABLA:reporte_store_inventarios LA 80+81-82)
                     
                    $queryTotalMarSaFinInv="update reporte_store_inventarios set noviembre = (select noviembre from reporte_store_inventarios where nivel = 80)+(select noviembre from reporte_store_inventarios where nivel = 81)-(select noviembre from reporte_store_inventarios where nivel = 82) where nivel = 83;";
                    $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFinInv);
                    $stmtTotMarSaFiInv->execute();
                    
                    //DICIEMBRE
                     //JCV SALDO inicial DE DICIEMBRE ES EL SALDO FINAL DE NOVIEMBRE DE INVENTARIS STOCK(LA 80 DE MARZO ES LA 83 DE FEBRERO, reporte_store_inventarios)
                     
                    $queryTotalMarSaInInv="update reporte_store_inventarios set diciembre = (select noviembre from reporte_store_inventarios where nivel = 83) where nivel = 80;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV SALDO FINAL DE DICIEMBRE INVENTARIS STOCK(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 83, PERO LO SAQUÚE DE ESTA TABLA:reporte_store_inventarios LA 80+81-82)
                     
                    $queryTotalMarSaFinInv="update reporte_store_inventarios set diciembre = (select diciembre from reporte_store_inventarios where nivel = 80)+(select diciembre from reporte_store_inventarios where nivel = 81)-(select diciembre from reporte_store_inventarios where nivel = 82) where nivel = 83;";
                    $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFinInv);
                    $stmtTotMarSaFiInv->execute();
                    
                     
                    
                    
                    //JCV dias de iventario DE INVENTARIS STOCK(la (83/82)*30 )
                     
                    $queryTotalEneDiInInv="update reporte_store_inventarios set enero = ((select enero from reporte_store_inventarios where nivel = 83)/(select enero from reporte_store_inventarios where nivel = 82))*30 where nivel = 84;";
                    $stmtTotEneDiInInv = $dbconec->prepare($queryTotalEneDiInInv);
                    $stmtTotEneDiInInv->execute();
                    
                    $queryTotalFebDiInInv="update reporte_store_inventarios set febrero = ((select febrero from reporte_store_inventarios where nivel = 83)/(select febrero from reporte_store_inventarios where nivel = 82))*30 where nivel = 84;";
                    $stmtTotFebDiInInv = $dbconec->prepare($queryTotalFebDiInInv);
                    $stmtTotFebDiInInv->execute();
                    
                    $queryTotalMarDiInInv="update reporte_store_inventarios set marzo = ((select marzo from reporte_store_inventarios where nivel = 83)/(select marzo from reporte_store_inventarios where nivel = 82))*30 where nivel = 84;";
                    $stmtTotMarDiInInv = $dbconec->prepare($queryTotalMarDiInInv);
                    $stmtTotMarDiInInv->execute();
                    
                    //ABRIL
                    $queryTotalMarDiInInv="update reporte_store_inventarios set abril = ((select abril from reporte_store_inventarios where nivel = 83)/(select abril from reporte_store_inventarios where nivel = 82))*30 where nivel = 84;";
                    $stmtTotMarDiInInv = $dbconec->prepare($queryTotalMarDiInInv);
                    $stmtTotMarDiInInv->execute();
                    
                    $queryTotalMarDiInInv="update reporte_store_inventarios set mayo = ((select mayo from reporte_store_inventarios where nivel = 83)/(select mayo from reporte_store_inventarios where nivel = 82))*30 where nivel = 84;";
                    $stmtTotMarDiInInv = $dbconec->prepare($queryTotalMarDiInInv);
                    $stmtTotMarDiInInv->execute();
                    
                    $queryTotalMarDiInInv="update reporte_store_inventarios set junio = ((select junio from reporte_store_inventarios where nivel = 83)/(select junio from reporte_store_inventarios where nivel = 82))*30 where nivel = 84;";
                    $stmtTotMarDiInInv = $dbconec->prepare($queryTotalMarDiInInv);
                    $stmtTotMarDiInInv->execute();
                    
                    //JULIO
                    $queryTotalMarDiInInv="update reporte_store_inventarios set julio = ((select julio from reporte_store_inventarios where nivel = 83)/(select julio from reporte_store_inventarios where nivel = 82))*30 where nivel = 84;";
                    $stmtTotMarDiInInv = $dbconec->prepare($queryTotalMarDiInInv);
                    $stmtTotMarDiInInv->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                        
                    
                    
                    
                    //////////jcv PARA INVENTARIO SERVICIO:)
                     
                    //JCV SALDO FINAL DE INVENTARIS SERVICIO(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 88)
                     
                    $queryTotalEneSaFinInv="update reporte_store_inventarios set enero = (select enero from flujo_de_efectivo where nivel = 88) where nivel = 88;";
                    $stmtTotEneSaFiInv = $dbconec->prepare($queryTotalEneSaFinInv);
                    $stmtTotEneSaFiInv->execute();
                    
                    //JCV SALDO inicial DE FEBRERO ES EL SALDO FINAL DE ENERO DE INVENTARIS SERVICIO(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 88)
                     
                    $queryTotalEneSaInInv="update reporte_store_inventarios set febrero = (select enero from reporte_store_inventarios where nivel = 88) where nivel = 85;";
                    $stmtTotEneSaInInv = $dbconec->prepare($queryTotalEneSaInInv);
                    $stmtTotEneSaInInv->execute();
                    
                    //JCV SALDO FINAL DE FEBRERO INVENTARIS SERVICIO(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 88, PERO LO SAQUÚE DE ESTA TABLA:reporte_store_inventarios LA 85+86-87)
                     
                    $queryTotalFebSaFinInv="update reporte_store_inventarios set febrero = (select febrero from reporte_store_inventarios where nivel = 85)+(select febrero from reporte_store_inventarios where nivel = 86)-(select febrero from reporte_store_inventarios where nivel = 87) where nivel = 88;";
                    $stmtTotFebSaFiInv = $dbconec->prepare($queryTotalFebSaFinInv);
                    $stmtTotFebSaFiInv->execute();
                    
                     //JCV SALDO inicial DE MARZO ES EL SALDO FINAL DE FEBRERO DE INVENTARIS SERVICIO(LA 80 DE MARZO ES LA 88 DE FEBRERO, reporte_store_inventarios)
                     
                    $queryTotalMarSaInInv="update reporte_store_inventarios set marzo = (select febrero from reporte_store_inventarios where nivel = 88) where nivel = 85;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV SALDO FINAL DE MARZO INVENTARIS SERVICIO(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 88, PERO LO SAQUÚE DE ESTA TABLA:reporte_store_inventarios LA 85+86-87)
                     
                    $queryTotalMarSaFinInv="update reporte_store_inventarios set marzo = (select marzo from reporte_store_inventarios where nivel = 85)+(select marzo from reporte_store_inventarios where nivel = 86)-(select marzo from reporte_store_inventarios where nivel = 87) where nivel = 88;";
                    $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFinInv);
                    $stmtTotMarSaFiInv->execute();
                    
                    
                    //ABRIL
                    //JCV SALDO inicial DE ABRIL ES EL SALDO FINAL DE MARZO DE INVENTARIS SERVICIO(LA 80 DE MARZO ES LA 88 DE FEBRERO, reporte_store_inventarios)
                     
                    $queryTotalMarSaInInv="update reporte_store_inventarios set abril = (select marzo from reporte_store_inventarios where nivel = 88) where nivel = 85;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV SALDO FINAL DE ABRIL INVENTARIS SERVICIO(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 88, PERO LO SAQUÚE DE ESTA TABLA:reporte_store_inventarios LA 85+86-87)
                     
                    $queryTotalMarSaFinInv="update reporte_store_inventarios set abril = (select abril from reporte_store_inventarios where nivel = 85)+(select abril from reporte_store_inventarios where nivel = 86)-(select abril from reporte_store_inventarios where nivel = 87) where nivel = 88;";
                    $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFinInv);
                    $stmtTotMarSaFiInv->execute();
                    
                    //JCV SALDO inicial DE MAYO ES EL SALDO FINAL DE ABRIL DE INVENTARIS SERVICIO(LA 80 DE MARZO ES LA 88 DE FEBRERO, reporte_store_inventarios)
                     
                    $queryTotalMarSaInInv="update reporte_store_inventarios set mayo = (select abril from reporte_store_inventarios where nivel = 88) where nivel = 85;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV SALDO FINAL DE MAYO INVENTARIS SERVICIO(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 88, PERO LO SAQUÚE DE ESTA TABLA:reporte_store_inventarios LA 85+86-87)
                     
                    $queryTotalMarSaFinInv="update reporte_store_inventarios set mayo = (select mayo from reporte_store_inventarios where nivel = 85)+(select mayo from reporte_store_inventarios where nivel = 86)-(select mayo from reporte_store_inventarios where nivel = 87) where nivel = 88;";
                    $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFinInv);
                    $stmtTotMarSaFiInv->execute();
                    
                    //JCV SALDO inicial DE JUNIO ES EL SALDO FINAL DE MAYO DE INVENTARIS SERVICIO(LA 80 DE MARZO ES LA 88 DE FEBRERO, reporte_store_inventarios)
                     
                    $queryTotalMarSaInInv="update reporte_store_inventarios set junio = (select mayo from reporte_store_inventarios where nivel = 88) where nivel = 85;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV SALDO FINAL DE JUNIO INVENTARIS SERVICIO(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 88, PERO LO SAQUÚE DE ESTA TABLA:reporte_store_inventarios LA 85+86-87)
                     
                    $queryTotalMarSaFinInv="update reporte_store_inventarios set junio = (select junio from reporte_store_inventarios where nivel = 85)+(select junio from reporte_store_inventarios where nivel = 86)-(select junio from reporte_store_inventarios where nivel = 87) where nivel = 88;";
                    $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFinInv);
                    $stmtTotMarSaFiInv->execute();
                    
                    //JCV SALDO inicial DE JULIO ES EL SALDO FINAL DE JUNIO DE INVENTARIS SERVICIO(LA 80 DE MARZO ES LA 88 DE FEBRERO, reporte_store_inventarios)
                     
                    $queryTotalMarSaInInv="update reporte_store_inventarios set julio = (select junio from reporte_store_inventarios where nivel = 88) where nivel = 85;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV SALDO FINAL DE JULIO INVENTARIS SERVICIO(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 88, PERO LO SAQUÚE DE ESTA TABLA:reporte_store_inventarios LA 85+86-87)
                     
                    $queryTotalMarSaFinInv="update reporte_store_inventarios set julio = (select julio from reporte_store_inventarios where nivel = 85)+(select julio from reporte_store_inventarios where nivel = 86)-(select julio from reporte_store_inventarios where nivel = 87) where nivel = 88;";
                    $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFinInv);
                    $stmtTotMarSaFiInv->execute();
                    
                    
                    //JCV SALDO inicial DE AGOSTO ES EL SALDO FINAL DE JULIO DE INVENTARIS SERVICIO(LA 80 DE MARZO ES LA 88 DE FEBRERO, reporte_store_inventarios)
                     
                    $queryTotalMarSaInInv="update reporte_store_inventarios set agosto = (select julio from reporte_store_inventarios where nivel = 88) where nivel = 85;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV SALDO FINAL DE AGOSTO INVENTARIS SERVICIO(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 88, PERO LO SAQUÚE DE ESTA TABLA:reporte_store_inventarios LA 85+86-87)
                     
                    $queryTotalMarSaFinInv="update reporte_store_inventarios set agosto = (select agosto from reporte_store_inventarios where nivel = 85)+(select agosto from reporte_store_inventarios where nivel = 86)-(select agosto from reporte_store_inventarios where nivel = 87) where nivel = 88;";
                    $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFinInv);
                    $stmtTotMarSaFiInv->execute();
                    
                    
                    //JCV SALDO inicial DE SEPTIEMBRE ES EL SALDO FINAL DE AGOSTO DE INVENTARIS SERVICIO(LA 80 DE MARZO ES LA 88 DE FEBRERO, reporte_store_inventarios)
                    $queryTotalMarSaInInv="update reporte_store_inventarios set septiembre = (select agosto from reporte_store_inventarios where nivel = 88) where nivel = 85;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV SALDO FINAL DE SEPTIEMBRE INVENTARIS SERVICIO(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 88, PERO LO SAQUÚE DE ESTA TABLA:reporte_store_inventarios LA 85+86-87)
                    $queryTotalMarSaFinInv="update reporte_store_inventarios set septiembre = (select septiembre from reporte_store_inventarios where nivel = 85)+(select septiembre from reporte_store_inventarios where nivel = 86)-(select septiembre from reporte_store_inventarios where nivel = 87) where nivel = 88;";
                    $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFinInv);
                    $stmtTotMarSaFiInv->execute();
                    
                    
                    //JCV SALDO inicial DE OCTUBRE ES EL SALDO FINAL DE SEPTIEMBRE DE INVENTARIS SERVICIO(LA 80 DE MARZO ES LA 88 DE FEBRERO, reporte_store_inventarios)
                    $queryTotalMarSaInInv="update reporte_store_inventarios set octubre = (select septiembre from reporte_store_inventarios where nivel = 88) where nivel = 85;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV SALDO FINAL DE OCTUBRE INVENTARIS SERVICIO(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 88, PERO LO SAQUÚE DE ESTA TABLA:reporte_store_inventarios LA 85+86-87)
                    $queryTotalMarSaFinInv="update reporte_store_inventarios set octubre = (select octubre from reporte_store_inventarios where nivel = 85)+(select octubre from reporte_store_inventarios where nivel = 86)-(select octubre from reporte_store_inventarios where nivel = 87) where nivel = 88;";
                    $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFinInv);
                    $stmtTotMarSaFiInv->execute();
                    
                    
                    //JCV SALDO inicial DE NOVIEMBRE ES EL SALDO FINAL DE OCTUBRE DE INVENTARIS SERVICIO(LA 80 DE MARZO ES LA 88 DE FEBRERO, reporte_store_inventarios)
                    $queryTotalMarSaInInv="update reporte_store_inventarios set noviembre = (select octubre from reporte_store_inventarios where nivel = 88) where nivel = 85;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV SALDO FINAL DE NOVIEMBRE INVENTARIS SERVICIO(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 88, PERO LO SAQUÚE DE ESTA TABLA:reporte_store_inventarios LA 85+86-87)
                    $queryTotalMarSaFinInv="update reporte_store_inventarios set noviembre = (select noviembre from reporte_store_inventarios where nivel = 85)+(select noviembre from reporte_store_inventarios where nivel = 86)-(select noviembre from reporte_store_inventarios where nivel = 87) where nivel = 88;";
                    $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFinInv);
                    $stmtTotMarSaFiInv->execute();
                    
                    
                    //JCV SALDO inicial DE DICIEMBRE ES EL SALDO FINAL DE NOVIEMBRE DE INVENTARIS SERVICIO(LA 80 DE MARZO ES LA 88 DE FEBRERO, reporte_store_inventarios)
                    $queryTotalMarSaInInv="update reporte_store_inventarios set diciembre = (select noviembre from reporte_store_inventarios where nivel = 88) where nivel = 85;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV SALDO FINAL DE DICIEMBRE INVENTARIS SERVICIO(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 88, PERO LO SAQUÚE DE ESTA TABLA:reporte_store_inventarios LA 85+86-87)
                    $queryTotalMarSaFinInv="update reporte_store_inventarios set diciembre = (select diciembre from reporte_store_inventarios where nivel = 85)+(select diciembre from reporte_store_inventarios where nivel = 86)-(select diciembre from reporte_store_inventarios where nivel = 87) where nivel = 88;";
                    $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFinInv);
                    $stmtTotMarSaFiInv->execute();
                    

                    
                    //JCV dias de iventario DE INVENTARIS SERVICIO(la (88/87)*30 )
                     
                    $queryTotalEneDiInInv="update reporte_store_inventarios set enero = ((select enero from reporte_store_inventarios where nivel = 88)/(select enero from reporte_store_inventarios where nivel = 87))*30 where nivel = 89;";
                    $stmtTotEneDiInInv = $dbconec->prepare($queryTotalEneDiInInv);
                    $stmtTotEneDiInInv->execute();
                    
                    $queryTotalFebDiInInv="update reporte_store_inventarios set febrero = ((select febrero from reporte_store_inventarios where nivel = 88)/(select febrero from reporte_store_inventarios where nivel = 87))*30 where nivel = 89;";
                    $stmtTotFebDiInInv = $dbconec->prepare($queryTotalFebDiInInv);
                    $stmtTotFebDiInInv->execute();
                    
                    $queryTotalMarDiInInv="update reporte_store_inventarios set marzo = ((select marzo from reporte_store_inventarios where nivel = 88)/(select marzo from reporte_store_inventarios where nivel = 87))*30 where nivel = 89;";
                    $stmtTotMarDiInInv = $dbconec->prepare($queryTotalMarDiInInv);
                    $stmtTotMarDiInInv->execute();
                    
                    //ABRIL
                    $queryTotalMarDiInInv="update reporte_store_inventarios set abril = ((select abril from reporte_store_inventarios where nivel = 88)/(select abril from reporte_store_inventarios where nivel = 87))*30 where nivel = 89;";
                    $stmtTotMarDiInInv = $dbconec->prepare($queryTotalMarDiInInv);
                    $stmtTotMarDiInInv->execute();
                    
                    $queryTotalMarDiInInv="update reporte_store_inventarios set mayo = ((select mayo from reporte_store_inventarios where nivel = 88)/(select mayo from reporte_store_inventarios where nivel = 87))*30 where nivel = 89;";
                    $stmtTotMarDiInInv = $dbconec->prepare($queryTotalMarDiInInv);
                    $stmtTotMarDiInInv->execute();
                    
                    $queryTotalMarDiInInv="update reporte_store_inventarios set junio = ((select junio from reporte_store_inventarios where nivel = 88)/(select junio from reporte_store_inventarios where nivel = 87))*30 where nivel = 89;";
                    $stmtTotMarDiInInv = $dbconec->prepare($queryTotalMarDiInInv);
                    $stmtTotMarDiInInv->execute();
                    
                    //JULIO
                    $queryTotalMarDiInInv="update reporte_store_inventarios set julio = ((select julio from reporte_store_inventarios where nivel = 88)/(select julio from reporte_store_inventarios where nivel = 87))*30 where nivel = 89;";
                    $stmtTotMarDiInInv = $dbconec->prepare($queryTotalMarDiInInv);
                    $stmtTotMarDiInInv->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                 
                    
                    
                    
                     //////////jcv PARA INVENTARIO EN TRÁSITO:)
                     
                    //JCV SALDO FINAL ENERO  DE INVENTARIO EN TRÁSITO(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 93)
                     
                    $queryTotalEneSaFinInv="update reporte_store_inventarios set enero = (select enero from flujo_de_efectivo where nivel = 93) where nivel = 93;";
                    $stmtTotEneSaFiInv = $dbconec->prepare($queryTotalEneSaFinInv);
                    $stmtTotEneSaFiInv->execute();
                    
                    //JCV SALDO inicial DE FEBRERO ES EL SALDO FINAL DE ENERO DE INVENTARIS EN TRÁSITO(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 93)
                     
                    $queryTotalEneSaInInv="update reporte_store_inventarios set febrero = (select enero from reporte_store_inventarios where nivel = 93) where nivel = 90;";
                    $stmtTotEneSaInInv = $dbconec->prepare($queryTotalEneSaInInv);
                    $stmtTotEneSaInInv->execute();
                    
                    //JCV SALDO FINAL DE FEBRERO INVENTARIO EN TRÁSITO(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 93, PERO LO SAQUÚE DE ESTA TABLA:reporte_store_inventarios LA 85+86-87)
                     
                    $queryTotalFebSaFinInv="update reporte_store_inventarios set febrero = (select febrero from reporte_store_inventarios where nivel = 90)+(select febrero from reporte_store_inventarios where nivel = 91)-(select febrero from reporte_store_inventarios where nivel = 92) where nivel = 93;";
                    $stmtTotFebSaFiInv = $dbconec->prepare($queryTotalFebSaFinInv);
                    $stmtTotFebSaFiInv->execute();
                    
                     //JCV SALDO inicial DE MARZO ES EL SALDO FINAL DE FEBRERO DE INVENTARIO EN TRÁSITO(LA 90 DE MARZO ES LA 93 DE FEBRERO, reporte_store_inventarios)
                    $queryTotalMarSaInInv="update reporte_store_inventarios set marzo = (select febrero from reporte_store_inventarios where nivel = 93) where nivel = 90;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV SALDO FINAL DE MARZO INVENTARIO EN TRÁSITO(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 93, PERO LO SAQUÚE DE ESTA TABLA:reporte_store_inventarios LA 90+91-92)
                    $queryTotalMarSaFinInv="update reporte_store_inventarios set marzo = (select marzo from reporte_store_inventarios where nivel = 90)+(select marzo from reporte_store_inventarios where nivel = 91)-(select marzo from reporte_store_inventarios where nivel = 92) where nivel = 93;";
                    $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFinInv);
                    $stmtTotMarSaFiInv->execute();
                    
                    
                    //ABRIL
                     //JCV SALDO inicial DE ABRIL ES EL SALDO FINAL DE MARZO DE INVENTARIO EN TRÁSITO(LA 90 DE MARZO ES LA 93 DE FEBRERO, reporte_store_inventarios)
                    $queryTotalMarSaInInv="update reporte_store_inventarios set abril = (select marzo from reporte_store_inventarios where nivel = 93) where nivel = 90;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV SALDO FINAL DE ABRIL INVENTARIO EN TRÁSITO(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 93, PERO LO SAQUÚE DE ESTA TABLA:reporte_store_inventarios LA 90+91-92)
                    $queryTotalMarSaFinInv="update reporte_store_inventarios set abril = (select abril from reporte_store_inventarios where nivel = 90)+(select abril from reporte_store_inventarios where nivel = 91)-(select abril from reporte_store_inventarios where nivel = 92) where nivel = 93;";
                    $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFinInv);
                    $stmtTotMarSaFiInv->execute();
                    
                     //JCV SALDO inicial DE MAYO ES EL SALDO FINAL DE ABRIL DE INVENTARIO EN TRÁSITO(LA 90 DE MARZO ES LA 93 DE FEBRERO, reporte_store_inventarios)
                    $queryTotalMarSaInInv="update reporte_store_inventarios set mayo = (select abril from reporte_store_inventarios where nivel = 93) where nivel = 90;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV SALDO FINAL DE MAYO INVENTARIO EN TRÁSITO(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 93, PERO LO SAQUÚE DE ESTA TABLA:reporte_store_inventarios LA 90+91-92)
                    $queryTotalMarSaFinInv="update reporte_store_inventarios set mayo = (select mayo from reporte_store_inventarios where nivel = 90)+(select mayo from reporte_store_inventarios where nivel = 91)-(select mayo from reporte_store_inventarios where nivel = 92) where nivel = 93;";
                    $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFinInv);
                    $stmtTotMarSaFiInv->execute();
                    
                     //JCV SALDO inicial DE JUNIO ES EL SALDO FINAL DE MAYO DE INVENTARIO EN TRÁSITO(LA 90 DE MAYO ES LA 93 DE ABRIL, reporte_store_inventarios)
                    $queryTotalMarSaInInv="update reporte_store_inventarios set junio = (select mayo from reporte_store_inventarios where nivel = 93) where nivel = 90;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV SALDO FINAL DE JUNIO INVENTARIO EN TRÁSITO(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 93, PERO LO SAQUÚE DE ESTA TABLA:reporte_store_inventarios LA 90+91-92)
                    $queryTotalMarSaFinInv="update reporte_store_inventarios set junio = (select junio from reporte_store_inventarios where nivel = 90)+(select junio from reporte_store_inventarios where nivel = 91)-(select junio from reporte_store_inventarios where nivel = 92) where nivel = 93;";
                    $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFinInv);
                    $stmtTotMarSaFiInv->execute();
                    
                    //JULIO
                     //JCV SALDO inicial DE JULIO ES EL SALDO FINAL DE JUNIO DE INVENTARIO EN TRÁSITO(LA 90 DE MARZO ES LA 93 DE FEBRERO, reporte_store_inventarios)
                    $queryTotalMarSaInInv="update reporte_store_inventarios set julio = (select junio from reporte_store_inventarios where nivel = 93) where nivel = 90;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV SALDO FINAL DE JULIO INVENTARIO EN TRÁSITO(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 93, PERO LO SAQUÚE DE ESTA TABLA:reporte_store_inventarios LA 90+91-92)
                    $queryTotalMarSaFinInv="update reporte_store_inventarios set julio = (select julio from reporte_store_inventarios where nivel = 90)+(select julio from reporte_store_inventarios where nivel = 91)-(select julio from reporte_store_inventarios where nivel = 92) where nivel = 93;";
                    $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFinInv);
                    $stmtTotMarSaFiInv->execute();
                    
                    
                    //AGOSTO
                     //JCV SALDO inicial DE AGOSTO ES EL SALDO FINAL DE JULIO DE INVENTARIO EN TRÁSITO(LA 90 DE MARZO ES LA 93 DE FEBRERO, reporte_store_inventarios)
                    $queryTotalMarSaInInv="update reporte_store_inventarios set agosto = (select julio from reporte_store_inventarios where nivel = 93) where nivel = 90;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV SALDO FINAL DE AGOSTO INVENTARIO EN TRÁSITO(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 93, PERO LO SAQUÚE DE ESTA TABLA:reporte_store_inventarios LA 90+91-92)
                    $queryTotalMarSaFinInv="update reporte_store_inventarios set agosto = (select agosto from reporte_store_inventarios where nivel = 90)+(select agosto from reporte_store_inventarios where nivel = 91)-(select agosto from reporte_store_inventarios where nivel = 92) where nivel = 93;";
                    $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFinInv);
                    $stmtTotMarSaFiInv->execute();
                    
                    //SEPTIEMBRE
                     //JCV SALDO inicial DE SEPTIEMBRE ES EL SALDO FINAL DE AGOSTO DE INVENTARIO EN TRÁSITO(LA 90 DE MARZO ES LA 93 DE FEBRERO, reporte_store_inventarios)
                    $queryTotalMarSaInInv="update reporte_store_inventarios set septiembre = (select agosto from reporte_store_inventarios where nivel = 93) where nivel = 90;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV SALDO FINAL DE SEPTIEMBRE INVENTARIO EN TRÁSITO(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 93, PERO LO SAQUÚE DE ESTA TABLA:reporte_store_inventarios LA 90+91-92)
                    $queryTotalMarSaFinInv="update reporte_store_inventarios set septiembre = (select septiembre from reporte_store_inventarios where nivel = 90)+(select septiembre from reporte_store_inventarios where nivel = 91)-(select septiembre from reporte_store_inventarios where nivel = 92) where nivel = 93;";
                    $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFinInv);
                    $stmtTotMarSaFiInv->execute();
                    
                    
                    //OCTUBRE
                     //JCV SALDO inicial DE OCTUBRE ES EL SALDO FINAL DE SEPTIEMBRE DE INVENTARIO EN TRÁSITO(LA 90 DE MARZO ES LA 93 DE FEBRERO, reporte_store_inventarios)
                    $queryTotalMarSaInInv="update reporte_store_inventarios set octubre = (select septiembre from reporte_store_inventarios where nivel = 93) where nivel = 90;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV SALDO FINAL DE OCTUBRE INVENTARIO EN TRÁSITO(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 93, PERO LO SAQUÚE DE ESTA TABLA:reporte_store_inventarios LA 90+91-92)
                    $queryTotalMarSaFinInv="update reporte_store_inventarios set octubre = (select octubre from reporte_store_inventarios where nivel = 90)+(select octubre from reporte_store_inventarios where nivel = 91)-(select octubre from reporte_store_inventarios where nivel = 92) where nivel = 93;";
                    $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFinInv);
                    $stmtTotMarSaFiInv->execute();
                    
                    
                    //NOVIEMBRE
                     //JCV SALDO inicial DE NOVIEMBRE ES EL SALDO FINAL DE OCTUBRE DE INVENTARIO EN TRÁSITO(LA 90 DE MARZO ES LA 93 DE FEBRERO, reporte_store_inventarios)
                    $queryTotalMarSaInInv="update reporte_store_inventarios set noviembre = (select octubre from reporte_store_inventarios where nivel = 93) where nivel = 90;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV SALDO FINAL DE NOVIEMBRE INVENTARIO EN TRÁSITO(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 93, PERO LO SAQUÚE DE ESTA TABLA:reporte_store_inventarios LA 90+91-92)
                    $queryTotalMarSaFinInv="update reporte_store_inventarios set noviembre = (select noviembre from reporte_store_inventarios where nivel = 90)+(select noviembre from reporte_store_inventarios where nivel = 91)-(select noviembre from reporte_store_inventarios where nivel = 92) where nivel = 93;";
                    $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFinInv);
                    $stmtTotMarSaFiInv->execute();
                    
                    
                     //DICIEMBRE
                     //JCV SALDO inicial DE DICIEMBRE ES EL SALDO FINAL DE NOVIEMBRE DE INVENTARIO EN TRÁSITO(LA 90 DE MARZO ES LA 93 DE FEBRERO, reporte_store_inventarios)
                    $queryTotalMarSaInInv="update reporte_store_inventarios set diciembre = (select noviembre from reporte_store_inventarios where nivel = 93) where nivel = 90;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV SALDO FINAL DE DICIEMBRE INVENTARIO EN TRÁSITO(YA ESTÁ CALCULADO EN LA TABLA flujo_de_efectivo ES LA 93, PERO LO SAQUÚE DE ESTA TABLA:reporte_store_inventarios LA 90+91-92)
                    $queryTotalMarSaFinInv="update reporte_store_inventarios set diciembre = (select diciembre from reporte_store_inventarios where nivel = 90)+(select noviembre from reporte_store_inventarios where nivel = 91)-(select noviembre from reporte_store_inventarios where nivel = 92) where nivel = 93;";
                    $stmtTotMarSaFiInv = $dbconec->prepare($queryTotalMarSaFinInv);
                    $stmtTotMarSaFiInv->execute();
                    
                    
                      
                    
                    
                    //JCV dias de iventario DE INVENTARIO EN TRÁSITO(la (93/92)*30 )
                     
                    $queryTotalEneDiInInv="update reporte_store_inventarios set enero = ((select enero from reporte_store_inventarios where nivel = 93)/(select enero from reporte_store_inventarios where nivel = 92))*30 where nivel = 94;";
                    $stmtTotEneDiInInv = $dbconec->prepare($queryTotalEneDiInInv);
                    $stmtTotEneDiInInv->execute();
                    
                    $queryTotalFebDiInInv="update reporte_store_inventarios set febrero = ((select febrero from reporte_store_inventarios where nivel = 93)/(select febrero from reporte_store_inventarios where nivel = 92))*30 where nivel = 94;";
                    $stmtTotFebDiInInv = $dbconec->prepare($queryTotalFebDiInInv);
                    $stmtTotFebDiInInv->execute();
                    
                    $queryTotalMarDiInInv="update reporte_store_inventarios set marzo = ((select marzo from reporte_store_inventarios where nivel = 93)/(select marzo from reporte_store_inventarios where nivel = 92))*30 where nivel = 94;";
                    $stmtTotMarDiInInv = $dbconec->prepare($queryTotalMarDiInInv);
                    $stmtTotMarDiInInv->execute();
                    
                    //abril
                    $queryTotalMarDiInInv="update reporte_store_inventarios set abril = ((select abril from reporte_store_inventarios where nivel = 93)/(select abril from reporte_store_inventarios where nivel = 92))*30 where nivel = 94;";
                    $stmtTotMarDiInInv = $dbconec->prepare($queryTotalMarDiInInv);
                    $stmtTotMarDiInInv->execute();
                    
                    $queryTotalMarDiInInv="update reporte_store_inventarios set mayo = ((select mayo from reporte_store_inventarios where nivel = 93)/(select mayo from reporte_store_inventarios where nivel = 92))*30 where nivel = 94;";
                    $stmtTotMarDiInInv = $dbconec->prepare($queryTotalMarDiInInv);
                    $stmtTotMarDiInInv->execute();
                    
                    $queryTotalMarDiInInv="update reporte_store_inventarios set junio = ((select junio from reporte_store_inventarios where nivel = 93)/(select junio from reporte_store_inventarios where nivel = 92))*30 where nivel = 94;";
                    $stmtTotMarDiInInv = $dbconec->prepare($queryTotalMarDiInInv);
                    $stmtTotMarDiInInv->execute();
                    
                    //JULIO
                    $queryTotalMarDiInInv="update reporte_store_inventarios set julio = ((select julio from reporte_store_inventarios where nivel = 93)/(select julio from reporte_store_inventarios where nivel = 92))*30 where nivel = 94;";
                    $stmtTotMarDiInInv = $dbconec->prepare($queryTotalMarDiInInv);
                    $stmtTotMarDiInInv->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...  
                    
                    
                    
                    //////////jcv PARA INVENTARIOS TOTALES:)
                     
                    //JCV INVENTARIO INICIAL ENERO  DE INVENTARIOS TOTALES(DE LA TABLA flujo_de_efectivo ES LA 214)
                     
                    $queryTotalEneSaInInv="update reporte_store_inventarios set enero = (select enero from flujo_de_efectivo where nivel = 214) where nivel = 301;";
                    $stmtTotEneSaInInv = $dbconec->prepare($queryTotalEneSaInInv);
                    $stmtTotEneSaInInv->execute();
                    
                    
                    //JCV COMPRAS DE INVENTARIOS TOTALES(DE LA TABLA flujo_de_efectivo ES LA 215)
                     $queryTotalEneComToInv="update reporte_store_inventarios set enero = (select enero from flujo_de_efectivo where nivel = 215) where nivel = 302;";
                    $stmtTotEneComToInv = $dbconec->prepare($queryTotalEneComToInv);
                    $stmtTotEneComToInv->execute();
                    
                    //JCV COMPRAS DE INVENTARIOS TOTALES(DE LA TABLA flujo_de_efectivo ES LA 215)
                     $queryTotalFebComToInv="update reporte_store_inventarios set febrero = (select febrero from flujo_de_efectivo where nivel = 215) where nivel = 302;";
                    $stmtTotFebComToInv = $dbconec->prepare($queryTotalFebComToInv);
                    $stmtTotFebComToInv->execute();
                    
                    //JCV COMPRAS DE INVENTARIOS TOTALES(DE LA TABLA flujo_de_efectivo ES LA 215)
                     $queryTotalMarComToInv="update reporte_store_inventarios set marzo = (select marzo from flujo_de_efectivo where nivel = 215) where nivel = 302;";
                    $stmtTotMarComToInv = $dbconec->prepare($queryTotalMarComToInv);
                    $stmtTotMarComToInv->execute();
                    
                    //ABRIL
                    //JCV COMPRAS DE INVENTARIOS TOTALES(DE LA TABLA flujo_de_efectivo ES LA 215)
                     $queryTotalMarComToInv="update reporte_store_inventarios set abril = (select abril from flujo_de_efectivo where nivel = 215) where nivel = 302;";
                    $stmtTotMarComToInv = $dbconec->prepare($queryTotalMarComToInv);
                    $stmtTotMarComToInv->execute();
                    
                    //JCV COMPRAS DE INVENTARIOS TOTALES(DE LA TABLA flujo_de_efectivo ES LA 215)
                     $queryTotalMarComToInv="update reporte_store_inventarios set mayo = (select mayo from flujo_de_efectivo where nivel = 215) where nivel = 302;";
                    $stmtTotMarComToInv = $dbconec->prepare($queryTotalMarComToInv);
                    $stmtTotMarComToInv->execute();
                    
                    //JCV COMPRAS DE INVENTARIOS TOTALES(DE LA TABLA flujo_de_efectivo ES LA 215)
                     $queryTotalMarComToInv="update reporte_store_inventarios set junio = (select junio from flujo_de_efectivo where nivel = 215) where nivel = 302;";
                    $stmtTotMarComToInv = $dbconec->prepare($queryTotalMarComToInv);
                    $stmtTotMarComToInv->execute();
                    
                    //JULIO
                    //JCV COMPRAS DE INVENTARIOS TOTALES(DE LA TABLA flujo_de_efectivo ES LA 215)
                     $queryTotalMarComToInv="update reporte_store_inventarios set julio = (select julio from flujo_de_efectivo where nivel = 215) where nivel = 302;";
                    $stmtTotMarComToInv = $dbconec->prepare($queryTotalMarComToInv);
                    $stmtTotMarComToInv->execute();

//JCV FALTA DE AGOSTO A DICIEMBRE...                     
                    
                    
                    
                    //JCV COSTO DE VENTAS DE INVENTARIOS TOTALES(DE LA TABLA flujo_de_efectivo ES LA 216 *-1)
                     $queryTotalEneCoVeToInv="update reporte_store_inventarios set enero = (select enero from flujo_de_efectivo where nivel = 216)*-1 where nivel = 303;";
                    $stmtTotEneCoVeToInv = $dbconec->prepare($queryTotalEneCoVeToInv);
                    $stmtTotEneCoVeToInv->execute();
                    
                    //JCV COSTO DE VENTAS DE INVENTARIOS TOTALES(DE LA TABLA flujo_de_efectivo ES LA 216 *-1)
                     $queryTotalFebCoVeToInv="update reporte_store_inventarios set febrero = (select febrero from flujo_de_efectivo where nivel = 216)*-1 where nivel = 303;";
                    $stmtTotFebCoVeToInv = $dbconec->prepare($queryTotalFebCoVeToInv);
                    $stmtTotFebCoVeToInv->execute();
                    
                    //JCV COSTO DE VENTAS DE INVENTARIOS TOTALES(DE LA TABLA flujo_de_efectivo ES LA 216 *-1)
                     $queryTotalMarCoVeToInv="update reporte_store_inventarios set marzo = (select marzo from flujo_de_efectivo where nivel = 216)*-1 where nivel = 303;";
                    $stmtTotMarCoVeToInv = $dbconec->prepare($queryTotalMarCoVeToInv);
                    $stmtTotMarCoVeToInv->execute();
                    
                    //ABRIL
                    //JCV COSTO DE VENTAS DE INVENTARIOS TOTALES(DE LA TABLA flujo_de_efectivo ES LA 216 *-1)
                     $queryTotalMarCoVeToInv="update reporte_store_inventarios set abril = (select abril from flujo_de_efectivo where nivel = 216)*-1 where nivel = 303;";
                    $stmtTotMarCoVeToInv = $dbconec->prepare($queryTotalMarCoVeToInv);
                    $stmtTotMarCoVeToInv->execute();
                    
                    //JCV COSTO DE VENTAS DE INVENTARIOS TOTALES(DE LA TABLA flujo_de_efectivo ES LA 216 *-1)
                     $queryTotalMarCoVeToInv="update reporte_store_inventarios set mayo = (select mayo from flujo_de_efectivo where nivel = 216)*-1 where nivel = 303;";
                    $stmtTotMarCoVeToInv = $dbconec->prepare($queryTotalMarCoVeToInv);
                    $stmtTotMarCoVeToInv->execute();
                    
                    //JCV COSTO DE VENTAS DE INVENTARIOS TOTALES(DE LA TABLA flujo_de_efectivo ES LA 216 *-1)
                     $queryTotalMarCoVeToInv="update reporte_store_inventarios set junio = (select junio from flujo_de_efectivo where nivel = 216)*-1 where nivel = 303;";
                    $stmtTotMarCoVeToInv = $dbconec->prepare($queryTotalMarCoVeToInv);
                    $stmtTotMarCoVeToInv->execute();
                    
                    //JULIO
                    //JCV COSTO DE VENTAS DE INVENTARIOS TOTALES(DE LA TABLA flujo_de_efectivo ES LA 216 *-1)
                     $queryTotalMarCoVeToInv="update reporte_store_inventarios set julio = (select julio from flujo_de_efectivo where nivel = 216)*-1 where nivel = 303;";
                    $stmtTotMarCoVeToInv = $dbconec->prepare($queryTotalMarCoVeToInv);
                    $stmtTotMarCoVeToInv->execute();
                    
                    
                    //JCV INVENTARIO FINAL ENERO DE INVENTARIOS TOTALES(DE ESTA TABLA reporte_store_inventarios ES LA 301+302+303)
                     $queryTotalEneInFiToInv="update reporte_store_inventarios set enero = (select sum(enero) from reporte_store_inventarios where nivel >= 301 and nivel <=303) where nivel = 304;";
                    $stmtTotEneInFiToInv = $dbconec->prepare($queryTotalEneInFiToInv);
                    $stmtTotEneInFiToInv->execute();
                    
                    
                    //JCV INVENTARIO INICIAL FEBRERO ES EL INVENTARIO FINAL DE ENERO (LA 304 DE ESTA MISMA reporte_store_inventarios)
                     
                    $queryTotalFebSaInInv="update reporte_store_inventarios set febrero = (select enero from reporte_store_inventarios where nivel = 304) where nivel = 301;";
                    $stmtTotFebSaInInv = $dbconec->prepare($queryTotalFebSaInInv);
                    $stmtTotFebSaInInv->execute();
                    
                    //JCV INVENTARIO FINAL FEBRERO DE INVENTARIOS TOTALES(DE ESTA TABLA reporte_store_inventarios ES LA 301+302+303)
                     $queryTotalFebInFiToInv="update reporte_store_inventarios set febrero = (select sum(febrero) from reporte_store_inventarios where nivel >= 301 and nivel <=303) where nivel = 304;";
                    $stmtTotFebInFiToInv = $dbconec->prepare($queryTotalFebInFiToInv);
                    $stmtTotFebInFiToInv->execute();
                    
                    
                     //JCV INVENTARIO INICIAL MARZO ES EL INVENTARIO FINAL DE FEBRERO (LA 304 DE ESTA MISMA reporte_store_inventarios)
                     
                    $queryTotalMarSaInInv="update reporte_store_inventarios set marzo = (select febrero from reporte_store_inventarios where nivel = 304) where nivel = 301;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV INVENTARIO FINAL MARZO DE INVENTARIOS TOTALES(DE ESTA TABLA reporte_store_inventarios ES LA 301+302+303)
                     $queryTotalMarInFiToInv="update reporte_store_inventarios set marzo = (select sum(marzo) from reporte_store_inventarios where nivel >= 301 and nivel <=303) where nivel = 304;";
                    $stmtTotMarInFiToInv = $dbconec->prepare($queryTotalMarInFiToInv);
                    $stmtTotMarInFiToInv->execute();
                    
                    
                    //ABRIL
                     //JCV INVENTARIO INICIAL ABRIL ES EL INVENTARIO FINAL DE MARZO (LA 304 DE ESTA MISMA reporte_store_inventarios)
                     
                    $queryTotalMarSaInInv="update reporte_store_inventarios set abril = (select marzo from reporte_store_inventarios where nivel = 304) where nivel = 301;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV INVENTARIO FINAL ABRIL DE INVENTARIOS TOTALES(DE ESTA TABLA reporte_store_inventarios ES LA 301+302+303)
                     $queryTotalMarInFiToInv="update reporte_store_inventarios set abril = (select sum(abril) from reporte_store_inventarios where nivel >= 301 and nivel <=303) where nivel = 304;";
                    $stmtTotMarInFiToInv = $dbconec->prepare($queryTotalMarInFiToInv);
                    $stmtTotMarInFiToInv->execute();
                    
                     //JCV INVENTARIO INICIAL MAYO ES EL INVENTARIO FINAL DE ABRIL (LA 304 DE ESTA MISMA reporte_store_inventarios)
                    $queryTotalMarSaInInv="update reporte_store_inventarios set mayo = (select abril from reporte_store_inventarios where nivel = 304) where nivel = 301;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV INVENTARIO FINAL MAYO DE INVENTARIOS TOTALES(DE ESTA TABLA reporte_store_inventarios ES LA 301+302+303)
                     $queryTotalMarInFiToInv="update reporte_store_inventarios set mayo = (select sum(mayo) from reporte_store_inventarios where nivel >= 301 and nivel <=303) where nivel = 304;";
                    $stmtTotMarInFiToInv = $dbconec->prepare($queryTotalMarInFiToInv);
                    $stmtTotMarInFiToInv->execute();
                    
                     //JCV INVENTARIO INICIAL JUNIO ES EL INVENTARIO FINAL DE MAYO (LA 304 DE ESTA MISMA reporte_store_inventarios)
                    $queryTotalMarSaInInv="update reporte_store_inventarios set junio = (select mayo from reporte_store_inventarios where nivel = 304) where nivel = 301;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV INVENTARIO FINAL JUNIO DE INVENTARIOS TOTALES(DE ESTA TABLA reporte_store_inventarios ES LA 301+302+303)
                     $queryTotalMarInFiToInv="update reporte_store_inventarios set junio = (select sum(junio) from reporte_store_inventarios where nivel >= 301 and nivel <=303) where nivel = 304;";
                    $stmtTotMarInFiToInv = $dbconec->prepare($queryTotalMarInFiToInv);
                    $stmtTotMarInFiToInv->execute();
                    
                    //JULIO
                     //JCV INVENTARIO INICIAL JULIO ES EL INVENTARIO FINAL DE JUNIO (LA 304 DE ESTA MISMA reporte_store_inventarios)
                    $queryTotalMarSaInInv="update reporte_store_inventarios set julio = (select junio from reporte_store_inventarios where nivel = 304) where nivel = 301;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV INVENTARIO FINAL MARZO DE INVENTARIOS TOTALES(DE ESTA TABLA reporte_store_inventarios ES LA 301+302+303)
                     $queryTotalMarInFiToInv="update reporte_store_inventarios set julio = (select sum(julio) from reporte_store_inventarios where nivel >= 301 and nivel <=303) where nivel = 304;";
                    $stmtTotMarInFiToInv = $dbconec->prepare($queryTotalMarInFiToInv);
                    $stmtTotMarInFiToInv->execute();
                    
                    
                    //AGOSTO
                     //JCV INVENTARIO INICIAL AGOSTO ES EL INVENTARIO FINAL DE JULIO (LA 304 DE ESTA MISMA reporte_store_inventarios)
                    $queryTotalMarSaInInv="update reporte_store_inventarios set agosto = (select julio from reporte_store_inventarios where nivel = 304) where nivel = 301;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV INVENTARIO FINAL AGOSTO DE INVENTARIOS TOTALES(DE ESTA TABLA reporte_store_inventarios ES LA 301+302+303)
                     $queryTotalMarInFiToInv="update reporte_store_inventarios set agosto = (select sum(agosto) from reporte_store_inventarios where nivel >= 301 and nivel <=303) where nivel = 304;";
                    $stmtTotMarInFiToInv = $dbconec->prepare($queryTotalMarInFiToInv);
                    $stmtTotMarInFiToInv->execute();
                    
                    
                    //SEPTIEMBRE
                     //JCV INVENTARIO INICIAL SEPTIEMBRE ES EL INVENTARIO FINAL DE AGOSTO (LA 304 DE ESTA MISMA reporte_store_inventarios)
                    $queryTotalMarSaInInv="update reporte_store_inventarios set septiembre = (select agosto from reporte_store_inventarios where nivel = 304) where nivel = 301;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV INVENTARIO FINAL SEPTIEMBRE DE INVENTARIOS TOTALES(DE ESTA TABLA reporte_store_inventarios ES LA 301+302+303)
                     $queryTotalMarInFiToInv="update reporte_store_inventarios set septiembre = (select sum(septiembre) from reporte_store_inventarios where nivel >= 301 and nivel <=303) where nivel = 304;";
                    $stmtTotMarInFiToInv = $dbconec->prepare($queryTotalMarInFiToInv);
                    $stmtTotMarInFiToInv->execute();
                    
                    
                    //OCTUBRE
                     //JCV INVENTARIO INICIAL OCTUBRE ES EL INVENTARIO FINAL DE SEPTIEMBRE (LA 304 DE ESTA MISMA reporte_store_inventarios)
                    $queryTotalMarSaInInv="update reporte_store_inventarios set octubre = (select septiembre from reporte_store_inventarios where nivel = 304) where nivel = 301;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV INVENTARIO FINAL OCTUBRE DE INVENTARIOS TOTALES(DE ESTA TABLA reporte_store_inventarios ES LA 301+302+303)
                     $queryTotalMarInFiToInv="update reporte_store_inventarios set octubre = (select sum(octubre) from reporte_store_inventarios where nivel >= 301 and nivel <=303) where nivel = 304;";
                    $stmtTotMarInFiToInv = $dbconec->prepare($queryTotalMarInFiToInv);
                    $stmtTotMarInFiToInv->execute();
                    
                    
                    //NOVIEMBRE
                     //JCV INVENTARIO INICIAL NOVIEMBRE ES EL INVENTARIO FINAL DE OCTUBRE (LA 304 DE ESTA MISMA reporte_store_inventarios)
                    $queryTotalMarSaInInv="update reporte_store_inventarios set noviembre = (select octubre from reporte_store_inventarios where nivel = 304) where nivel = 301;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV INVENTARIO FINAL NOVIEMBRE DE INVENTARIOS TOTALES(DE ESTA TABLA reporte_store_inventarios ES LA 301+302+303)
                     $queryTotalMarInFiToInv="update reporte_store_inventarios set noviembre = (select sum(noviembre) from reporte_store_inventarios where nivel >= 301 and nivel <=303) where nivel = 304;";
                    $stmtTotMarInFiToInv = $dbconec->prepare($queryTotalMarInFiToInv);
                    $stmtTotMarInFiToInv->execute();
                    
                    
                     //DICIEMBRE
                     //JCV INVENTARIO INICIAL DICIEMBRE ES EL INVENTARIO FINAL DE NOVIEMBRE (LA 304 DE ESTA MISMA reporte_store_inventarios)
                    $queryTotalMarSaInInv="update reporte_store_inventarios set diciembre = (select noviembre from reporte_store_inventarios where nivel = 304) where nivel = 301;";
                    $stmtTotMarSaInInv = $dbconec->prepare($queryTotalMarSaInInv);
                    $stmtTotMarSaInInv->execute();
                    
                    //JCV INVENTARIO FINAL DICIEMBRE DE INVENTARIOS TOTALES(DE ESTA TABLA reporte_store_inventarios ES LA 301+302+303)
                     $queryTotalMarInFiToInv="update reporte_store_inventarios set diciembre = (select sum(diciembre) from reporte_store_inventarios where nivel >= 301 and nivel <=303) where nivel = 304;";
                    $stmtTotMarInFiToInv = $dbconec->prepare($queryTotalMarInFiToInv);
                    $stmtTotMarInFiToInv->execute();
                    
                    
                  
                    
                    
                    //JCV CAMBIO DE INVENTARIO FINAL (LA 304-301 DE ESTA MISMA reporte_store_inventarios)
                     
                    $queryTotalEneCaInv="update reporte_store_inventarios set enero = (select enero from reporte_store_inventarios where nivel = 304)-(select enero from reporte_store_inventarios where nivel = 301) where nivel = 305;";
                    $stmtTotEneCaInv = $dbconec->prepare($queryTotalEneCaInv);
                    $stmtTotEneCaInv->execute();
                    
                    $queryTotalFebCaInv="update reporte_store_inventarios set febrero = (select febrero from reporte_store_inventarios where nivel = 304)-(select febrero from reporte_store_inventarios where nivel = 301) where nivel = 305;";
                    $stmtTotFebCaInv = $dbconec->prepare($queryTotalFebCaInv);
                    $stmtTotFebCaInv->execute();
                    
                    $queryTotalMarCaInv="update reporte_store_inventarios set marzo = (select marzo from reporte_store_inventarios where nivel = 304)-(select marzo from reporte_store_inventarios where nivel = 301) where nivel = 305;";
                    $stmtTotMarCaInv = $dbconec->prepare($queryTotalMarCaInv);
                    $stmtTotMarCaInv->execute();
                    
                    //ABRIL
                    $queryTotalMarCaInv="update reporte_store_inventarios set abril = (select abril from reporte_store_inventarios where nivel = 304)-(select abril from reporte_store_inventarios where nivel = 301) where nivel = 305;";
                    $stmtTotMarCaInv = $dbconec->prepare($queryTotalMarCaInv);
                    $stmtTotMarCaInv->execute();
                    
                    $queryTotalMarCaInv="update reporte_store_inventarios set mayo = (select mayo from reporte_store_inventarios where nivel = 304)-(select mayo from reporte_store_inventarios where nivel = 301) where nivel = 305;";
                    $stmtTotMarCaInv = $dbconec->prepare($queryTotalMarCaInv);
                    $stmtTotMarCaInv->execute();
                    
                    $queryTotalMarCaInv="update reporte_store_inventarios set junio = (select junio from reporte_store_inventarios where nivel = 304)-(select junio from reporte_store_inventarios where nivel = 301) where nivel = 305;";
                    $stmtTotMarCaInv = $dbconec->prepare($queryTotalMarCaInv);
                    $stmtTotMarCaInv->execute();
                    
                    //JULIO
                    $queryTotalMarCaInv="update reporte_store_inventarios set julio = (select julio from reporte_store_inventarios where nivel = 304)-(select julio from reporte_store_inventarios where nivel = 301) where nivel = 305;";
                    $stmtTotMarCaInv = $dbconec->prepare($queryTotalMarCaInv);
                    $stmtTotMarCaInv->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                                         
                    
                    
                     //JCV DÍAS DE INVENTARIO DE INVENTARIO FINAL (LA (304/(303*-1))*30 DE ESTA MISMA reporte_store_inventarios)
                     
                    $queryTotalEneDiInInv="update reporte_store_inventarios set enero = ((select enero from reporte_store_inventarios where nivel = 304)/((select enero from reporte_store_inventarios where nivel = 303)*-1))*30 where nivel = 306;";
                    $stmtTotEneDiInInv = $dbconec->prepare($queryTotalEneDiInInv);
                    $stmtTotEneDiInInv->execute();
                    
                    $queryTotalFebDiInInv="update reporte_store_inventarios set febrero = ((select febrero from reporte_store_inventarios where nivel = 304)/((select febrero from reporte_store_inventarios where nivel = 303)*-1))*30 where nivel = 306;";
                    $stmtTotFebDiInInv = $dbconec->prepare($queryTotalFebDiInInv);
                    $stmtTotFebDiInInv->execute();
                    
                    $queryTotalMarDiInInv="update reporte_store_inventarios set marzo = ((select marzo from reporte_store_inventarios where nivel = 304)/((select marzo from reporte_store_inventarios where nivel = 303)*-1))*30 where nivel = 306;";
                    $stmtTotMarDiInInv = $dbconec->prepare($queryTotalMarDiInInv);
                    $stmtTotMarDiInInv->execute();
                    
                    //ABRIL
                    $queryTotalMarDiInInv="update reporte_store_inventarios set abril = ((select abril from reporte_store_inventarios where nivel = 304)/((select abril from reporte_store_inventarios where nivel = 303)*-1))*30 where nivel = 306;";
                    $stmtTotMarDiInInv = $dbconec->prepare($queryTotalMarDiInInv);
                    $stmtTotMarDiInInv->execute();
                    
                    $queryTotalMarDiInInv="update reporte_store_inventarios set mayo = ((select mayo from reporte_store_inventarios where nivel = 304)/((select mayo from reporte_store_inventarios where nivel = 303)*-1))*30 where nivel = 306;";
                    $stmtTotMarDiInInv = $dbconec->prepare($queryTotalMarDiInInv);
                    $stmtTotMarDiInInv->execute();
                    
                    $queryTotalMarDiInInv="update reporte_store_inventarios set junio = ((select junio from reporte_store_inventarios where nivel = 304)/((select junio from reporte_store_inventarios where nivel = 303)*-1))*30 where nivel = 306;";
                    $stmtTotMarDiInInv = $dbconec->prepare($queryTotalMarDiInInv);
                    $stmtTotMarDiInInv->execute();
                    
                    //JULIO
                    $queryTotalMarDiInInv="update reporte_store_inventarios set julio = ((select julio from reporte_store_inventarios where nivel = 304)/((select julio from reporte_store_inventarios where nivel = 303)*-1))*30 where nivel = 306;";
                    $stmtTotMarDiInInv = $dbconec->prepare($queryTotalMarDiInInv);
                    $stmtTotMarDiInInv->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                                                             
                    
                     
                    
                     
                     //////////////////////////////ACUMULADO////////////////////
                    
                    ///////////////////////////ACUMULADO////////////////////
                    
                     //JCV PARA ACUMULADO DE TODAS 
                    $queryTotalAcuGral="update reporte_store_inventarios set acumulado = enero + febrero + marzo + abril + mayo + junio + julio + agosto + septiembre + octubre + noviembre + diciembre ;";
                    $stmtTotAcuGral = $dbconec->prepare($queryTotalAcuGral);
                    $stmtTotAcuGral->execute();
                    
                    
                     //JCV PARA ACUMULADO SALDO INICIAL: 101(LA MISMA) DE ENERO
                    $queryTotalAcuGral="update reporte_store_inventarios set acumulado = diciembre where nivel = 301;";
                    $stmtTotAcuGral = $dbconec->prepare($queryTotalAcuGral);
                    $stmtTotAcuGral->execute();
                    
                    
                    //JCV INVENTARIO FINAL (LA 301+302-301 DE ESTA MISMA reporte_store_inventarios)
                     
                    $queryTotalEneCaInv="update reporte_store_inventarios set acumulado = (select acumulado from reporte_store_inventarios where nivel = 301)+(select acumulado from reporte_store_inventarios where nivel = 302)+(select acumulado from reporte_store_inventarios where nivel = 303) where nivel = 304;";
                    $stmtTotEneCaInv = $dbconec->prepare($queryTotalEneCaInv);
                    $stmtTotEneCaInv->execute();
                    
                    
                    //JCV DÍAS DE INVENTARIO (LA (304/(303*-1))*360 DE ESTA MISMA reporte_store_inventarios)
                     
                    $queryTotalEneDiInInv="update reporte_store_inventarios set acumulado = ((select acumulado from reporte_store_inventarios where nivel = 304)/((select acumulado from reporte_store_inventarios where nivel = 303)*-1))*360 where nivel = 306;";
                    $stmtTotEneDiInInv = $dbconec->prepare($queryTotalEneDiInInv);
                    $stmtTotEneDiInInv->execute();
                    
                     
                     
                $dbconec = null;

          
                } catch (Exception $e) {
                        $data = "Error";
                        echo json_encode($data);

                }

        }
                
                 
                
                
                public function Listar_inventarios()    
		{
                            $dbconec = Conexion::Conectar();

                    try 
                    {  
                            $query = "SELECT * FROM reporte_store_inventarios where nivel >= 80 and nivel <=306 order by nivel ;";
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
