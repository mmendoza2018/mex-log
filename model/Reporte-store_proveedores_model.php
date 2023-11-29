<?php     
/*JCV OBTENIDO DEL ARCHIVO cuentasdebancos_model.php*/
	require_once('Conexion.php');  
          
    
	class ReporteproveedoresModel extends Conexion  
	{
                 
                public function Insertar_datos_proveedores()  
		{
                $dbconec = Conexion::Conectar();
                try
                {
                    $anio = date('Y');
                    //$anio = "2022";
                    $id_acumulativaGlobal=8;
                        
                    
                    //JCV PARA CHECAR QUE  SE CALCULE PRIMERO EL FLUJO DE EFECTIVO, DE OTRA FORMA NOESTARÍAN COMPLETOS LOS CALCULOS
                    $queryChecaNivel = "SELECT * FROM flujo_de_efectivo where nivel>=76 ;";
                     $stmtChecaNivel = $dbconec->prepare($queryChecaNivel);
                     $stmtChecaNivel->execute();
                     $cuenta = $stmtChecaNivel->rowCount();
                    
                    if($cuenta<=0){
                         echo '<span class="label label-danger label-block">Primero tiene que calcular el Flujo de Efectivo.  Se encuentra dentro del menú principal en la ópción Flujo de efectivo y Análisis de flujo en el tab 1</span>';
                        exit();
                    }
                      
                    
                           
                    /////////////////////////////////OJO////////////////////////////////
                    //JCV SALDO INICIAL DE PROVEEDORES (ES LA 74 DE LA TABLA flujo_de_efectivo PERO SE METE MANUAL EN AQUI EN ESTA TABLA)
                    //JCV TAMBIÉN LA 75 Y 77
                    
                       //////////jcv PARA PROVEEDORES:) 
                    
                     //JCV PAGOS A PROVEEDORES(LA 76*-1 LA TABLA flujo_de_efectivo)
                     
                    
                    
                    
                    $queryTotalEnePaPrPro="update reporte_store_proveedores set enero = (select enero from flujo_de_efectivo where nivel = 76)*-1 where nivel = 403;";
                    $stmtTotEnePaPrPro = $dbconec->prepare($queryTotalEnePaPrPro);
                    $stmtTotEnePaPrPro->execute();
                     
                    $queryTotalFebPaPrPro="update reporte_store_proveedores set febrero = (select febrero from flujo_de_efectivo where nivel = 76)*-1 where nivel = 403;";
                    $stmtTotFebPaPrPro = $dbconec->prepare($queryTotalFebPaPrPro);
                    $stmtTotFebPaPrPro->execute();
                     
                    $queryTotalMarPaPrPro="update reporte_store_proveedores set marzo = (select marzo from flujo_de_efectivo where nivel = 76)*-1 where nivel = 403;";
                    $stmtTotMarPaPrPro = $dbconec->prepare($queryTotalMarPaPrPro);
                    $stmtTotMarPaPrPro->execute();
                    
                    //ABRIL
                    $queryTotalMarPaPrPro="update reporte_store_proveedores set abril = (select abril from flujo_de_efectivo where nivel = 76)*-1 where nivel = 403;";
                    $stmtTotMarPaPrPro = $dbconec->prepare($queryTotalMarPaPrPro);
                    $stmtTotMarPaPrPro->execute();
                    
                    $queryTotalMarPaPrPro="update reporte_store_proveedores set mayo = (select mayo from flujo_de_efectivo where nivel = 76)*-1 where nivel = 403;";
                    $stmtTotMarPaPrPro = $dbconec->prepare($queryTotalMarPaPrPro);
                    $stmtTotMarPaPrPro->execute();
                    
                    $queryTotalMarPaPrPro="update reporte_store_proveedores set junio = (select junio from flujo_de_efectivo where nivel = 76)*-1 where nivel = 403;";
                    $stmtTotMarPaPrPro = $dbconec->prepare($queryTotalMarPaPrPro);
                    $stmtTotMarPaPrPro->execute();
                    
                    //JULIO
                    $queryTotalMarPaPrPro="update reporte_store_proveedores set julio = (select julio from flujo_de_efectivo where nivel = 76)*-1 where nivel = 403;";
                    $stmtTotMarPaPrPro = $dbconec->prepare($queryTotalMarPaPrPro);
                    $stmtTotMarPaPrPro->execute();
                    
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                        
                    
                    
                    //JCV COMPRAS NETAS(LA 402-404 DE ESTA MISMA LA TABLA reporte_store_proveedores)
                     
                    $queryTotalEneCoNePro="update reporte_store_proveedores set enero = (select enero from reporte_store_proveedores where nivel = 402)-(select enero from reporte_store_proveedores where nivel = 404) where nivel = 405;";
                    $stmtTotEneCoNePro = $dbconec->prepare($queryTotalEneCoNePro);
                    $stmtTotEneCoNePro->execute();
                    
                    $queryTotalFebCoNePro="update reporte_store_proveedores set febrero = (select febrero from reporte_store_proveedores where nivel = 402)-(select febrero from reporte_store_proveedores where nivel = 404) where nivel = 405;";
                    $stmtTotFebCoNePro = $dbconec->prepare($queryTotalFebCoNePro);
                    $stmtTotFebCoNePro->execute();
                    
                    $queryTotalMarCoNePro="update reporte_store_proveedores set marzo = (select marzo from reporte_store_proveedores where nivel = 402)-(select marzo from reporte_store_proveedores where nivel = 404) where nivel = 405;";
                    $stmtTotMarCoNePro = $dbconec->prepare($queryTotalMarCoNePro);
                    $stmtTotMarCoNePro->execute();
                    
                    //ABRIL
                    $queryTotalMarCoNePro="update reporte_store_proveedores set abril = (select abril from reporte_store_proveedores where nivel = 402)-(select abril from reporte_store_proveedores where nivel = 404) where nivel = 405;";
                    $stmtTotMarCoNePro = $dbconec->prepare($queryTotalMarCoNePro);
                    $stmtTotMarCoNePro->execute();
                    
                    $queryTotalMarCoNePro="update reporte_store_proveedores set mayo = (select mayo from reporte_store_proveedores where nivel = 402)-(select mayo from reporte_store_proveedores where nivel = 404) where nivel = 405;";
                    $stmtTotMarCoNePro = $dbconec->prepare($queryTotalMarCoNePro);
                    $stmtTotMarCoNePro->execute();
                    
                    $queryTotalMarCoNePro="update reporte_store_proveedores set junio = (select junio from reporte_store_proveedores where nivel = 402)-(select junio from reporte_store_proveedores where nivel = 404) where nivel = 405;";
                    $stmtTotMarCoNePro = $dbconec->prepare($queryTotalMarCoNePro);
                    $stmtTotMarCoNePro->execute();
                    
                    //JULIO
                    $queryTotalMarCoNePro="update reporte_store_proveedores set julio = (select julio from reporte_store_proveedores where nivel = 402)-(select julio from reporte_store_proveedores where nivel = 404) where nivel = 405;";
                    $stmtTotMarCoNePro = $dbconec->prepare($queryTotalMarCoNePro);
                    $stmtTotMarCoNePro->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                                            
                                                                              
                    
                    //JCV SALDO FINAL enero(LA SUMA DE LA 401:403 - 404 DE ESTA MISMA LA TABLA reporte_store_proveedores)
                     
                    $queryTotalEneSaFiPro="update reporte_store_proveedores set enero = (select sum(enero) from reporte_store_proveedores where nivel >= 401 and nivel <=403)-(select enero from reporte_store_proveedores where nivel = 404) where nivel = 406;";
                    $stmtTotEneSaFiPro = $dbconec->prepare($queryTotalEneSaFiPro);
                    $stmtTotEneSaFiPro->execute();
                    
                    
                    //JCV SALDO INICIAL FEBRERO  ES EL SALDO FINAL DE ENERO(LA 406 DE ESTA MISMA LA TABLA reporte_store_proveedores)
                     
                    $queryTotalFebSaInPro="update reporte_store_proveedores set febrero = (select enero from reporte_store_proveedores where nivel = 406) where nivel = 401;";
                    $stmtTotFebSaInPro = $dbconec->prepare($queryTotalFebSaInPro);
                    $stmtTotFebSaInPro->execute();
                     
                    
                    //JCV SALDO FINAL FEBRERO(LA SUMA DE LA 401:403 DE ESTA MISMA LA TABLA reporte_store_proveedores)
                     
                    $queryTotalFebSaFiPro="update reporte_store_proveedores set febrero = (select sum(febrero) from reporte_store_proveedores where nivel >= 401 and nivel <=403)-(select febrero from reporte_store_proveedores where nivel = 404) where nivel = 406;";
                    $stmtTotFebSaFiPro = $dbconec->prepare($queryTotalFebSaFiPro);
                    $stmtTotFebSaFiPro->execute();
                    
                    
                     //JCV SALDO INICIAL MARZO  ES EL SALDO FINAL DE FEBRERO(LA 406 DE ESTA MISMA LA TABLA reporte_store_proveedores)
                    $queryTotalMarSaInPro="update reporte_store_proveedores set marzo = (select febrero from reporte_store_proveedores where nivel = 406) where nivel = 401;";
                    $stmtTotMarSaInPro = $dbconec->prepare($queryTotalMarSaInPro);
                    $stmtTotMarSaInPro->execute();
                    
                    
                    //JCV SALDO FINAL MARZO(LA SUMA DE LA 401:403 DE ESTA MISMA LA TABLA reporte_store_proveedores)
                    $queryTotalMarSaFiPro="update reporte_store_proveedores set marzo = (select sum(marzo) from reporte_store_proveedores where nivel >= 401 and nivel <=403)-(select marzo from reporte_store_proveedores where nivel = 404) where nivel = 406;";
                    $stmtTotMarSaFiPro = $dbconec->prepare($queryTotalMarSaFiPro);
                    $stmtTotMarSaFiPro->execute();
                    
                    //ABRIL
                     //JCV SALDO INICIAL ABRIL  ES EL SALDO FINAL DE MARZO(LA 406 DE ESTA MISMA LA TABLA reporte_store_proveedores)
                    $queryTotalMarSaInPro="update reporte_store_proveedores set abril = (select marzo from reporte_store_proveedores where nivel = 406) where nivel = 401;";
                    $stmtTotMarSaInPro = $dbconec->prepare($queryTotalMarSaInPro);
                    $stmtTotMarSaInPro->execute();
                    
                    
                    //JCV SALDO FINAL ABRIL(LA SUMA DE LA 401:403 DE ESTA MISMA LA TABLA reporte_store_proveedores)
                    $queryTotalMarSaFiPro="update reporte_store_proveedores set abril = (select sum(abril) from reporte_store_proveedores where nivel >= 401 and nivel <=403)-(select abril from reporte_store_proveedores where nivel = 404) where nivel = 406;";
                    $stmtTotMarSaFiPro = $dbconec->prepare($queryTotalMarSaFiPro);
                    $stmtTotMarSaFiPro->execute();
                    
                     //JCV SALDO INICIAL MAYO  ES EL SALDO FINAL DE ABRIL (LA 406 DE ESTA MISMA LA TABLA reporte_store_proveedores)
                    $queryTotalMarSaInPro="update reporte_store_proveedores set mayo = (select abril from reporte_store_proveedores where nivel = 406) where nivel = 401;";
                    $stmtTotMarSaInPro = $dbconec->prepare($queryTotalMarSaInPro);
                    $stmtTotMarSaInPro->execute();
                    
                    
                    //JCV SALDO FINAL MAYO(LA SUMA DE LA 401:403 DE ESTA MISMA LA TABLA reporte_store_proveedores)
                    $queryTotalMarSaFiPro="update reporte_store_proveedores set mayo = (select sum(mayo) from reporte_store_proveedores where nivel >= 401 and nivel <=403)-(select mayo from reporte_store_proveedores where nivel = 404) where nivel = 406;";
                    $stmtTotMarSaFiPro = $dbconec->prepare($queryTotalMarSaFiPro);
                    $stmtTotMarSaFiPro->execute();
                    
                     //JCV SALDO INICIAL JUNIO  ES EL SALDO FINAL DE MAYO(LA 406 DE ESTA MISMA LA TABLA reporte_store_proveedores)
                    $queryTotalMarSaInPro="update reporte_store_proveedores set junio = (select mayo from reporte_store_proveedores where nivel = 406) where nivel = 401;";
                    $stmtTotMarSaInPro = $dbconec->prepare($queryTotalMarSaInPro);
                    $stmtTotMarSaInPro->execute();
                    
                    
                    //JCV SALDO FINAL JUNIO(LA SUMA DE LA 401:403 DE ESTA MISMA LA TABLA reporte_store_proveedores)
                    $queryTotalMarSaFiPro="update reporte_store_proveedores set junio = (select sum(junio) from reporte_store_proveedores where nivel >= 401 and nivel <=403)-(select junio from reporte_store_proveedores where nivel = 404) where nivel = 406;";
                    $stmtTotMarSaFiPro = $dbconec->prepare($queryTotalMarSaFiPro);
                    $stmtTotMarSaFiPro->execute();
                    
                    //JULIO
                     //JCV SALDO INICIAL JULIO  ES EL SALDO FINAL DE JUNIO(LA 406 DE ESTA MISMA LA TABLA reporte_store_proveedores)
                    $queryTotalMarSaInPro="update reporte_store_proveedores set julio = (select junio from reporte_store_proveedores where nivel = 406) where nivel = 401;";
                    $stmtTotMarSaInPro = $dbconec->prepare($queryTotalMarSaInPro);
                    $stmtTotMarSaInPro->execute();
                    
                    
                    //JCV SALDO FINAL JULIO(LA SUMA DE LA 401:403 DE ESTA MISMA LA TABLA reporte_store_proveedores)
                    $queryTotalMarSaFiPro="update reporte_store_proveedores set julio = (select sum(julio) from reporte_store_proveedores where nivel >= 401 and nivel <=403)-(select julio from reporte_store_proveedores where nivel = 404) where nivel = 406;";
                    $stmtTotMarSaFiPro = $dbconec->prepare($queryTotalMarSaFiPro);
                    $stmtTotMarSaFiPro->execute();
                    
                    
                    //AGOSTO
              
                     //JCV SALDO INICIAL AGOSTO  ES EL SALDO FINAL DE JULIO(LA 406 DE ESTA MISMA LA TABLA reporte_store_proveedores)
                    $queryTotalMarSaInPro="update reporte_store_proveedores set agosto = (select julio from reporte_store_proveedores where nivel = 406) where nivel = 401;";
                    $stmtTotMarSaInPro = $dbconec->prepare($queryTotalMarSaInPro);
                    $stmtTotMarSaInPro->execute();
                    
                    
                    //JCV SALDO FINAL AGOSTO(LA SUMA DE LA 401:403 DE ESTA MISMA LA TABLA reporte_store_proveedores)
                    $queryTotalMarSaFiPro="update reporte_store_proveedores set agosto = (select sum(agosto) from reporte_store_proveedores where nivel >= 401 and nivel <=403)-(select agosto from reporte_store_proveedores where nivel = 404) where nivel = 406;";
                    $stmtTotMarSaFiPro = $dbconec->prepare($queryTotalMarSaFiPro);
                    $stmtTotMarSaFiPro->execute();
                    
                     //JCV SALDO INICIAL SEPTIEMBRE  ES EL SALDO FINAL DE AGOSTO(LA 406 DE ESTA MISMA LA TABLA reporte_store_proveedores)
                    $queryTotalMarSaInPro="update reporte_store_proveedores set septiembre = (select agosto from reporte_store_proveedores where nivel = 406) where nivel = 401;";
                    $stmtTotMarSaInPro = $dbconec->prepare($queryTotalMarSaInPro);
                    $stmtTotMarSaInPro->execute();
                    
                    
                    //JCV SALDO FINAL SEPTIEMBRE(LA SUMA DE LA 401:403 DE ESTA MISMA LA TABLA reporte_store_proveedores)
                    $queryTotalMarSaFiPro="update reporte_store_proveedores set septiembre = (select sum(septiembre) from reporte_store_proveedores where nivel >= 401 and nivel <=403)-(select septiembre from reporte_store_proveedores where nivel = 404) where nivel = 406;";
                    $stmtTotMarSaFiPro = $dbconec->prepare($queryTotalMarSaFiPro);
                    $stmtTotMarSaFiPro->execute();
                    
                    
                     //JCV SALDO INICIAL OCTUBRE  ES EL SALDO FINAL DE SEPTIEMBRE(LA 406 DE ESTA MISMA LA TABLA reporte_store_proveedores)
                    $queryTotalMarSaInPro="update reporte_store_proveedores set octubre = (select septiembre from reporte_store_proveedores where nivel = 406) where nivel = 401;";
                    $stmtTotMarSaInPro = $dbconec->prepare($queryTotalMarSaInPro);
                    $stmtTotMarSaInPro->execute();
                    
                    
                    //JCV SALDO FINAL OCTUBRE(LA SUMA DE LA 401:403 DE ESTA MISMA LA TABLA reporte_store_proveedores)
                    $queryTotalMarSaFiPro="update reporte_store_proveedores set octubre = (select sum(octubre) from reporte_store_proveedores where nivel >= 401 and nivel <=403)-(select octubre from reporte_store_proveedores where nivel = 404) where nivel = 406;";
                    $stmtTotMarSaFiPro = $dbconec->prepare($queryTotalMarSaFiPro);
                    $stmtTotMarSaFiPro->execute();
                    
                    
                     //JCV SALDO INICIAL NOVIEMBRE  ES EL SALDO FINAL DE OCTUBRE(LA 406 DE ESTA MISMA LA TABLA reporte_store_proveedores)
                    $queryTotalMarSaInPro="update reporte_store_proveedores set noviembre = (select octubre from reporte_store_proveedores where nivel = 406) where nivel = 401;";
                    $stmtTotMarSaInPro = $dbconec->prepare($queryTotalMarSaInPro);
                    $stmtTotMarSaInPro->execute();
                    
                    
                    //JCV SALDO FINAL NOVIEMBRE(LA SUMA DE LA 401:403 DE ESTA MISMA LA TABLA reporte_store_proveedores)
                    $queryTotalMarSaFiPro="update reporte_store_proveedores set noviembre = (select sum(noviembre) from reporte_store_proveedores where nivel >= 401 and nivel <=403)-(select noviembre from reporte_store_proveedores where nivel = 404) where nivel = 406;";
                    $stmtTotMarSaFiPro = $dbconec->prepare($queryTotalMarSaFiPro);
                    $stmtTotMarSaFiPro->execute();
                    
                    
                     //JCV SALDO INICIAL DICIEMBRE  ES EL SALDO FINAL DE NOVIEMBRE(LA 406 DE ESTA MISMA LA TABLA reporte_store_proveedores)
                    $queryTotalMarSaInPro="update reporte_store_proveedores set diciembre = (select noviembre from reporte_store_proveedores where nivel = 406) where nivel = 401;";
                    $stmtTotMarSaInPro = $dbconec->prepare($queryTotalMarSaInPro);
                    $stmtTotMarSaInPro->execute();
                    
                    
                    //JCV SALDO FINAL DICIEMBRE(LA SUMA DE LA 401:403 DE ESTA MISMA LA TABLA reporte_store_proveedores)
                    $queryTotalMarSaFiPro="update reporte_store_proveedores set diciembre = (select sum(diciembre) from reporte_store_proveedores where nivel >= 401 and nivel <=403)-(select diciembre from reporte_store_proveedores where nivel = 404) where nivel = 406;";
                    $stmtTotMarSaFiPro = $dbconec->prepare($queryTotalMarSaFiPro);
                    $stmtTotMarSaFiPro->execute();
                    
    


                    //JCV CAMBIO(LA 406-401 DE ESTA MISMA LA TABLA reporte_store_proveedores)
                     
                    $queryTotalEneCoNePro="update reporte_store_proveedores set enero = (select enero from reporte_store_proveedores where nivel = 406)-(select enero from reporte_store_proveedores where nivel = 401) where nivel = 407;";
                    $stmtTotEneCoNePro = $dbconec->prepare($queryTotalEneCoNePro);
                    $stmtTotEneCoNePro->execute();
                    
                    $queryTotalFebCoNePro="update reporte_store_proveedores set febrero = (select febrero from reporte_store_proveedores where nivel = 406)-(select febrero from reporte_store_proveedores where nivel = 401) where nivel = 407;";
                    $stmtTotFebCoNePro = $dbconec->prepare($queryTotalFebCoNePro);
                    $stmtTotFebCoNePro->execute();
                    
                    $queryTotalMarCoNePro="update reporte_store_proveedores set marzo = (select marzo from reporte_store_proveedores where nivel = 406)-(select marzo from reporte_store_proveedores where nivel = 401) where nivel = 407;";
                    $stmtTotMarCoNePro = $dbconec->prepare($queryTotalMarCoNePro);
                    $stmtTotMarCoNePro->execute();
                    
                    //ABRIL
                    $queryTotalMarCoNePro="update reporte_store_proveedores set abril = (select abril from reporte_store_proveedores where nivel = 406)-(select abril from reporte_store_proveedores where nivel = 401) where nivel = 407;";
                    $stmtTotMarCoNePro = $dbconec->prepare($queryTotalMarCoNePro);
                    $stmtTotMarCoNePro->execute();
                    
                    $queryTotalMarCoNePro="update reporte_store_proveedores set mayo = (select mayo from reporte_store_proveedores where nivel = 406)-(select mayo from reporte_store_proveedores where nivel = 401) where nivel = 407;";
                    $stmtTotMarCoNePro = $dbconec->prepare($queryTotalMarCoNePro);
                    $stmtTotMarCoNePro->execute();
                    
                    $queryTotalMarCoNePro="update reporte_store_proveedores set junio = (select junio from reporte_store_proveedores where nivel = 406)-(select junio from reporte_store_proveedores where nivel = 401) where nivel = 407;";
                    $stmtTotMarCoNePro = $dbconec->prepare($queryTotalMarCoNePro);
                    $stmtTotMarCoNePro->execute();
                    
                    //JULIO
                    $queryTotalMarCoNePro="update reporte_store_proveedores set julio = (select julio from reporte_store_proveedores where nivel = 406)-(select julio from reporte_store_proveedores where nivel = 401) where nivel = 407;";
                    $stmtTotMarCoNePro = $dbconec->prepare($queryTotalMarCoNePro);
                    $stmtTotMarCoNePro->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...    
                    
                    
                    //JCV DÍAS DE PAGO PROVEEDORES(LA (406/(403*-1))*30 DE ESTA MISMA LA TABLA reporte_store_proveedores)
                     
                    $queryTotalEneDiPaPro="update reporte_store_proveedores set enero = ((select enero from reporte_store_proveedores where nivel = 406)/((select enero from reporte_store_proveedores where nivel = 403)*-1))*30 where nivel = 408;";
                    $stmtTotEneDiPaPro = $dbconec->prepare($queryTotalEneDiPaPro);
                    $stmtTotEneDiPaPro->execute();
                    
                    $queryTotalFebDiPaPro="update reporte_store_proveedores set febrero = ((select febrero from reporte_store_proveedores where nivel = 406)/((select febrero from reporte_store_proveedores where nivel = 403)*-1))*30 where nivel = 408;";
                    $stmtTotFebDiPaPro = $dbconec->prepare($queryTotalFebDiPaPro);
                    $stmtTotFebDiPaPro->execute();
                    
                    $queryTotalMarDiPaPro="update reporte_store_proveedores set marzo = ((select marzo from reporte_store_proveedores where nivel = 406)/((select marzo from reporte_store_proveedores where nivel = 403)*-1))*30 where nivel = 408;";
                    $stmtTotMarDiPaPro = $dbconec->prepare($queryTotalMarDiPaPro);
                    $stmtTotMarDiPaPro->execute();
                    
                    //ABRIL
                     $queryTotalMarDiPaPro="update reporte_store_proveedores set abril = ((select abril from reporte_store_proveedores where nivel = 406)/((select abril from reporte_store_proveedores where nivel = 403)*-1))*30 where nivel = 408;";
                    $stmtTotMarDiPaPro = $dbconec->prepare($queryTotalMarDiPaPro);
                    $stmtTotMarDiPaPro->execute();
                    
                     $queryTotalMarDiPaPro="update reporte_store_proveedores set mayo = ((select mayo from reporte_store_proveedores where nivel = 406)/((select mayo from reporte_store_proveedores where nivel = 403)*-1))*30 where nivel = 408;";
                    $stmtTotMarDiPaPro = $dbconec->prepare($queryTotalMarDiPaPro);
                    $stmtTotMarDiPaPro->execute();
                    
                     $queryTotalMarDiPaPro="update reporte_store_proveedores set junio = ((select junio from reporte_store_proveedores where nivel = 406)/((select junio from reporte_store_proveedores where nivel = 403)*-1))*30 where nivel = 408;";
                    $stmtTotMarDiPaPro = $dbconec->prepare($queryTotalMarDiPaPro);
                    $stmtTotMarDiPaPro->execute();
                    
                    //JULIO
                     $queryTotalMarDiPaPro="update reporte_store_proveedores set julio = ((select julio from reporte_store_proveedores where nivel = 406)/((select julio from reporte_store_proveedores where nivel = 403)*-1))*30 where nivel = 408;";
                    $stmtTotMarDiPaPro = $dbconec->prepare($queryTotalMarDiPaPro);
                    $stmtTotMarDiPaPro->execute();
                    
//JCV FALTA DE AGOSTO A DICIEMBRE...                     
                    
                    
                    
                     ///////////////////////////ACUMULADO////////////////////
                    
                     //JCV PARA ACUMULADO DE TODAS 
                    $queryTotalAcuGral="update reporte_store_proveedores set acumulado = enero + febrero + marzo + abril + mayo + junio + julio + agosto + septiembre + octubre + noviembre + diciembre ;";
                    $stmtTotAcuGral = $dbconec->prepare($queryTotalAcuGral);
                    $stmtTotAcuGral->execute();
                    
                       //JCV PARA ACUMULADO SALDO INICIAL: 101(LA MISMA) DE ENERO
                    $queryTotalAcuGral="update reporte_store_proveedores set acumulado = enero where nivel = 401;";
                    $stmtTotAcuGral = $dbconec->prepare($queryTotalAcuGral);
                    $stmtTotAcuGral->execute();
                    
                    
                    //JCV SALDO FINAL ACUMULADO(LA SUMA DE LA 401:403 DE ESTA MISMA LA TABLA reporte_store_proveedores)
                    $queryTotalMarSaFiPro="update reporte_store_proveedores set acumulado = (select sum(acumulado) from reporte_store_proveedores where nivel >= 401 and nivel <=403)-(select acumulado from reporte_store_proveedores where nivel = 404) where nivel = 406;";
                    $stmtTotMarSaFiPro = $dbconec->prepare($queryTotalMarSaFiPro);
                    $stmtTotMarSaFiPro->execute();
                    
                    
                    //JCV DÍAS DE INVENTARIO (LA (406/(403*-1))*30 DE ESTA MISMA reporte_store_proveedores)
                     
                    $queryTotalMarSaFiPro="update reporte_store_proveedores set acumulado = ((select acumulado from reporte_store_proveedores where nivel = 406)/((select acumulado from reporte_store_proveedores where nivel = 403)*-1))*30 where nivel = 408;";
                    $stmtTotMarSaFiPro = $dbconec->prepare($queryTotalMarSaFiPro);
                    $stmtTotMarSaFiPro->execute();
                      
                       
                     
                $dbconec = null;

          
                } catch (Exception $e) {
                        $data = "Error";
                        echo json_encode($data);

                }

        }
                
                 
                
                
                public function Listar_proveedores()    
		{
                            $dbconec = Conexion::Conectar();
 
                    try 
                    {  
                            $query = "SELECT * FROM reporte_store_proveedores where nivel >= 401 and nivel <=408 order by nivel ;";
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
