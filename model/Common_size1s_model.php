<?php       
/*JCV OBTENIDO DEL ARCHIVO cuentasdebancos_model.php*/
	require_once('Conexion.php');  
        
       
     
     
	class Common_size1sModel extends Conexion  
	{
                    
                public function Insertar_datos_common_size1s()   
		{
                $dbconec = Conexion::Conectar();
                try
                {
                    $anio = date('Y');
                    //$anio = "2022";
                    $id_acumulativaGlobal=8;
                        
                                 
                    
                     //JCV VENTAS LINEA 1 COMMON_SIZE1: LA 2 / LA 1 DE ENERO DE LA TABLA reporte_mercadotecnia
                     
                    $queryTotalEneVeL1="update estadoresultados1 set enero = (select enero from reporte_mercadotecnia where nivel = 11) where nivel = 2;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    
                    
                    $queryTotalEneVeL1="update estadoresultados1 set febrero = (select febrero from reporte_mercadotecnia where nivel = 11) where nivel = 2;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    $queryTotalEneVeL1="update estadoresultados1 set marzo = (select marzo from reporte_mercadotecnia where nivel = 11) where nivel = 2;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    //JCV PRIMES TRIMESTRE (enero+febrero+marzo de esta tabla estadoresultados1)
                    
                    $queryTotalEneVeL1="update estadoresultados1 set t_1 = enero + febrero + marzo  where nivel = 2;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    //ABRIL
                    $queryTotalEneVeL1="update estadoresultados1 set abril = (select abril from reporte_mercadotecnia where nivel = 11) where nivel = 2;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    $queryTotalEneVeL1="update estadoresultados1 set mayo = (select mayo from reporte_mercadotecnia where nivel = 11) where nivel = 2;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    $queryTotalEneVeL1="update estadoresultados1 set junio = (select junio from reporte_mercadotecnia where nivel = 11) where nivel = 2;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    //JCV SEGUNDO TRIMESTRE (enero+febrero+marzo de esta tabla estadoresultados1)
                    
                    $queryTotalEneVeL1="update estadoresultados1 set t_2 = abril + mayo + junio  where nivel = 2;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    //total
                    $queryTotalEneVeL1="update estadoresultados1 set total = t_1 + t_2  where nivel = 2;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                                             
                    
                    
                    //JCV VENTAS ESTADO DE RESULTADOS: LA 2 DE ESTA TABLA estadoresultados1
                     
                    $queryTotalEneVe="update estadoresultados1 set enero = (select enero from estadoresultados1 where nivel = 2) where nivel = 1;";
                    $stmtTotEneVe = $dbconec->prepare($queryTotalEneVe);
                    $stmtTotEneVe->execute();
                    
                    $queryTotalEneVe="update estadoresultados1 set febrero = (select febrero from estadoresultados1 where nivel = 2) where nivel = 1;";
                    $stmtTotEneVe = $dbconec->prepare($queryTotalEneVe);
                    $stmtTotEneVe->execute();
                    
                    $queryTotalEneVe="update estadoresultados1 set marzo = (select marzo from estadoresultados1 where nivel = 2) where nivel = 1;";
                    $stmtTotEneVe = $dbconec->prepare($queryTotalEneVe);
                    $stmtTotEneVe->execute();
                    
                    //JCV PRIMES TRIMESTRE (enero+febrero+marzo de esta tabla estadoresultados1)
                    
                    $queryTotalEneVeL1="update estadoresultados1 set t_1 = enero + febrero + marzo  where nivel = 1;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                  
                    //ABRIL
                    $queryTotalEneVe="update estadoresultados1 set abril = (select abril from estadoresultados1 where nivel = 2) where nivel = 1;";
                    $stmtTotEneVe = $dbconec->prepare($queryTotalEneVe);
                    $stmtTotEneVe->execute();
                    
                    $queryTotalEneVe="update estadoresultados1 set mayo = (select mayo from estadoresultados1 where nivel = 2) where nivel = 1;";
                    $stmtTotEneVe = $dbconec->prepare($queryTotalEneVe);
                    $stmtTotEneVe->execute();
                    
                    $queryTotalEneVe="update estadoresultados1 set junio = (select junio from estadoresultados1 where nivel = 2) where nivel = 1;";
                    $stmtTotEneVe = $dbconec->prepare($queryTotalEneVe);
                    $stmtTotEneVe->execute();
                  
                     //JCV ASEGUNDO TRIMESTRE (abril + mayo + junio de esta tabla estadoresultados1)
                    
                    $queryTotalEneVeL1="update estadoresultados1 set t_2 = abril + mayo + junio  where nivel = 1;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    //TOTAL
                    $queryTotalEneVeL1="update estadoresultados1 set total = t_1 + t_2  where nivel = 1;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();


                    
                    //JCV COSTO LINEA 1 ESTADO DE RESULTADOS: LA 203 DE LA TABLA flujo_de_efectivo
                     
                    $queryTotalEneCoL1="update estadoresultados1 set enero = (select enero from flujo_de_efectivo where nivel = 203)*-1 where nivel = 4;";
                    $stmtTotEneCoL1 = $dbconec->prepare($queryTotalEneCoL1);
                    $stmtTotEneCoL1->execute();
                    
                     $queryTotalEneCoL1="update estadoresultados1 set febrero = (select febrero from flujo_de_efectivo where nivel = 203)*-1 where nivel = 4;";
                    $stmtTotEneCoL1 = $dbconec->prepare($queryTotalEneCoL1);
                    $stmtTotEneCoL1->execute();
                    
                     $queryTotalEneCoL1="update estadoresultados1 set marzo = (select marzo from flujo_de_efectivo where nivel = 203)*-1 where nivel = 4;";
                    $stmtTotEneCoL1 = $dbconec->prepare($queryTotalEneCoL1);
                    $stmtTotEneCoL1->execute();
                    
                     //JCV PRIMES TRIMESTRE (enero+febrero+marzo de esta tabla estadoresultados1)
                    
                    $queryTotalEneVeL1="update estadoresultados1 set t_1 = enero + febrero + marzo  where nivel = 4;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();

                    //abril
                     $queryTotalEneCoL1="update estadoresultados1 set abril = (select abril from flujo_de_efectivo where nivel = 203)*-1 where nivel = 4;";
                    $stmtTotEneCoL1 = $dbconec->prepare($queryTotalEneCoL1);
                    $stmtTotEneCoL1->execute();
                    
                     $queryTotalEneCoL1="update estadoresultados1 set mayo = (select mayo from flujo_de_efectivo where nivel = 203)*-1 where nivel = 4;";
                    $stmtTotEneCoL1 = $dbconec->prepare($queryTotalEneCoL1);
                    $stmtTotEneCoL1->execute();
                    
                     $queryTotalEneCoL1="update estadoresultados1 set junio = (select junio from flujo_de_efectivo where nivel = 203)*-1 where nivel = 4;";
                    $stmtTotEneCoL1 = $dbconec->prepare($queryTotalEneCoL1);
                    $stmtTotEneCoL1->execute();
                    
                     //JCV SEGUNDO TRIMESTRE (enero+febrero+marzo de esta tabla estadoresultados1)
                    
                    $queryTotalEneVeL1="update estadoresultados1 set t_2 = abril + mayo + junio  where nivel = 4;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    //TOTAL
                     //JCV PRIMES TRIMESTRE (enero+febrero+marzo de esta tabla estadoresultados1)
                    
                    $queryTotalEneVeL1="update estadoresultados1 set total = t_1 + t_2  where nivel = 4;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    
                    
                     //JCV COSTO DE OPERACIÓN, ESTADO DE RESULTADOS: LA 4+5+6 DE ESTA TABLA estadoresultados1
                     
                    $queryTotalEneCoOp="update estadoresultados1 set enero = (select enero from estadoresultados1 where nivel = 4)+(select enero from estadoresultados1 where nivel = 5)+(select enero from estadoresultados1 where nivel = 6) where nivel = 3;";
                    $stmtTotEneCoOp = $dbconec->prepare($queryTotalEneCoOp);
                    $stmtTotEneCoOp->execute();
                    
                    $queryTotalEneCoOp="update estadoresultados1 set febrero = (select febrero from estadoresultados1 where nivel = 4)+(select febrero from estadoresultados1 where nivel = 5)+(select febrero from estadoresultados1 where nivel = 6) where nivel = 3;";
                    $stmtTotEneCoOp = $dbconec->prepare($queryTotalEneCoOp);
                    $stmtTotEneCoOp->execute();
                    
                    $queryTotalEneCoOp="update estadoresultados1 set marzo = (select marzo from estadoresultados1 where nivel = 4)+(select marzo from estadoresultados1 where nivel = 5)+(select marzo from estadoresultados1 where nivel = 6) where nivel = 3;";
                    $stmtTotEneCoOp = $dbconec->prepare($queryTotalEneCoOp);
                    $stmtTotEneCoOp->execute();
                    
                    //JCV PRIMES TRIMESTRE (enero+febrero+marzo de esta tabla estadoresultados1)
                    
                    $queryTotalEneVeL1="update estadoresultados1 set t_1 = enero + febrero + marzo  where nivel = 3;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    //abril
                     $queryTotalEneCoOp="update estadoresultados1 set abril = (select abril from estadoresultados1 where nivel = 4)+(select abril from estadoresultados1 where nivel = 5)+(select abril from estadoresultados1 where nivel = 6) where nivel = 3;";
                    $stmtTotEneCoOp = $dbconec->prepare($queryTotalEneCoOp);
                    $stmtTotEneCoOp->execute();
                    
                     $queryTotalEneCoOp="update estadoresultados1 set mayo = (select mayo from estadoresultados1 where nivel = 4)+(select mayo from estadoresultados1 where nivel = 5)+(select mayo from estadoresultados1 where nivel = 6) where nivel = 3;";
                    $stmtTotEneCoOp = $dbconec->prepare($queryTotalEneCoOp);
                    $stmtTotEneCoOp->execute();
                    
                     $queryTotalEneCoOp="update estadoresultados1 set junio = (select junio from estadoresultados1 where nivel = 4)+(select junio from estadoresultados1 where nivel = 5)+(select junio from estadoresultados1 where nivel = 6) where nivel = 3;";
                    $stmtTotEneCoOp = $dbconec->prepare($queryTotalEneCoOp);
                    $stmtTotEneCoOp->execute();

                    //JCV segundo TRIMESTRE (enero+febrero+marzo de esta tabla estadoresultados1)
                    
                    $queryTotalEneVeL1="update estadoresultados1 set t_2 = abril + mayo + junio  where nivel = 3;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    //TOTAL
                    //JCV segundo TRIMESTRE (enero+febrero+marzo de esta tabla estadoresultados1)
                    
                    $queryTotalEneVeL1="update estadoresultados1 set total = t_1 + t_2  where nivel = 3;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    
                     //JCV UTILIDAD BRUTA, ESTADO DE RESULTADOS: LA 1-3 DE ESTA TABLA estadoresultados1
                     
                    $queryTotalEneUtBr="update estadoresultados1 set enero = (select enero from estadoresultados1 where nivel = 1)-(select enero from estadoresultados1 where nivel = 3) where nivel = 7;";
                    $stmtTotEneUtBr = $dbconec->prepare($queryTotalEneUtBr);
                    $stmtTotEneUtBr->execute();
                    
                     $queryTotalEneUtBr="update estadoresultados1 set febrero = (select febrero from estadoresultados1 where nivel = 1)-(select febrero from estadoresultados1 where nivel = 3) where nivel = 7;";
                    $stmtTotEneUtBr = $dbconec->prepare($queryTotalEneUtBr);
                    $stmtTotEneUtBr->execute();
                    
                     $queryTotalEneUtBr="update estadoresultados1 set marzo = (select marzo from estadoresultados1 where nivel = 1)-(select marzo from estadoresultados1 where nivel = 3) where nivel = 7;";
                    $stmtTotEneUtBr = $dbconec->prepare($queryTotalEneUtBr);
                    $stmtTotEneUtBr->execute();
                    
                    //JCV PRIMES TRIMESTRE (enero+febrero+marzo de esta tabla estadoresultados1)
                    
                    $queryTotalEneVeL1="update estadoresultados1 set t_1 = enero + febrero + marzo  where nivel = 7;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    //abril
                    $queryTotalEneUtBr="update estadoresultados1 set abril = (select abril from estadoresultados1 where nivel = 1)-(select abril from estadoresultados1 where nivel = 3) where nivel = 7;";
                    $stmtTotEneUtBr = $dbconec->prepare($queryTotalEneUtBr);
                    $stmtTotEneUtBr->execute();
                    
                    $queryTotalEneUtBr="update estadoresultados1 set mayo = (select mayo from estadoresultados1 where nivel = 1)-(select mayo from estadoresultados1 where nivel = 3) where nivel = 7;";
                    $stmtTotEneUtBr = $dbconec->prepare($queryTotalEneUtBr);
                    $stmtTotEneUtBr->execute();
                    
                    $queryTotalEneUtBr="update estadoresultados1 set junio = (select junio from estadoresultados1 where nivel = 1)-(select junio from estadoresultados1 where nivel = 3) where nivel = 7;";
                    $stmtTotEneUtBr = $dbconec->prepare($queryTotalEneUtBr);
                    $stmtTotEneUtBr->execute();
                    
                     //JCV SEGUNDO TRIMESTRE (enero+febrero+marzo de esta tabla estadoresultados1)
                    
                    $queryTotalEneVeL1="update estadoresultados1 set t_2 = abril + mayo + junio  where nivel = 7;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    //TOTAL
                    $queryTotalEneVeL1="update estadoresultados1 set total = t_1 + t_2  where nivel = 7;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();



                    //JCV TOTAL INGRESOS, ESTADO DE RESULTADOS: LA 7+8+9 DE ESTA TABLA estadoresultados1
                     
                    $queryTotalEneToIn="update estadoresultados1 set enero = (select enero from estadoresultados1 where nivel = 7)+(select enero from estadoresultados1 where nivel = 8)+(select enero from estadoresultados1 where nivel = 9) where nivel = 10;";
                    $stmtTotEneToIn = $dbconec->prepare($queryTotalEneToIn);
                    $stmtTotEneToIn->execute();
                    
                    $queryTotalEneToIn="update estadoresultados1 set febrero = (select febrero from estadoresultados1 where nivel = 7)+(select febrero from estadoresultados1 where nivel = 8)+(select febrero from estadoresultados1 where nivel = 9) where nivel = 10;";
                    $stmtTotEneToIn = $dbconec->prepare($queryTotalEneToIn);
                    $stmtTotEneToIn->execute();
                    
                    $queryTotalEneToIn="update estadoresultados1 set marzo = (select marzo from estadoresultados1 where nivel = 7)+(select marzo from estadoresultados1 where nivel = 8)+(select marzo from estadoresultados1 where nivel = 9) where nivel = 10;";
                    $stmtTotEneToIn = $dbconec->prepare($queryTotalEneToIn);
                    $stmtTotEneToIn->execute();
                    
                    //JCV PRIMES TRIMESTRE (enero+febrero+marzo de esta tabla estadoresultados1)
                    
                    $queryTotalEneVeL1="update estadoresultados1 set t_1 = enero + febrero + marzo  where nivel = 10;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    //ABRIL
                     $queryTotalEneToIn="update estadoresultados1 set abril = (select abril from estadoresultados1 where nivel = 7)+(select abril from estadoresultados1 where nivel = 8)+(select abril from estadoresultados1 where nivel = 9) where nivel = 10;";
                    $stmtTotEneToIn = $dbconec->prepare($queryTotalEneToIn);
                    $stmtTotEneToIn->execute();
                    
                     $queryTotalEneToIn="update estadoresultados1 set mayo = (select mayo from estadoresultados1 where nivel = 7)+(select mayo from estadoresultados1 where nivel = 8)+(select mayo from estadoresultados1 where nivel = 9) where nivel = 10;";
                    $stmtTotEneToIn = $dbconec->prepare($queryTotalEneToIn);
                    $stmtTotEneToIn->execute();
                    
                     $queryTotalEneToIn="update estadoresultados1 set junio = (select junio from estadoresultados1 where nivel = 7)+(select junio from estadoresultados1 where nivel = 8)+(select junio from estadoresultados1 where nivel = 9) where nivel = 10;";
                    $stmtTotEneToIn = $dbconec->prepare($queryTotalEneToIn);
                    $stmtTotEneToIn->execute();

                    //JCV segundo TRIMESTRE (enero+febrero+marzo de esta tabla estadoresultados1)
                    $queryTotalEneVeL1="update estadoresultados1 set t_2 = abril + mayo + junio  where nivel = 10;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    //TOTAL
                    $queryTotalEneVeL1="update estadoresultados1 set total = t_1 + t_2  where nivel = 10;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    
                    
                    //JCV GASTOS OPERATIVOS ESTADO DE RESULTADOS: LA 205 DE LA TABLA flujo_de_efectivo
                     
                    $queryTotalEneGaOp="update estadoresultados1 set enero = (select enero from flujo_de_efectivo where nivel = 205)*-1 where nivel = 11;";
                    $stmtTotEneGaOp = $dbconec->prepare($queryTotalEneGaOp);
                    $stmtTotEneGaOp->execute();
                    
                    $queryTotalEneGaOp="update estadoresultados1 set febrero = (select febrero from flujo_de_efectivo where nivel = 205)*-1 where nivel = 11;";
                    $stmtTotEneGaOp = $dbconec->prepare($queryTotalEneGaOp);
                    $stmtTotEneGaOp->execute();
                    
                    $queryTotalEneGaOp="update estadoresultados1 set marzo = (select marzo from flujo_de_efectivo where nivel = 205)*-1 where nivel = 11;";
                    $stmtTotEneGaOp = $dbconec->prepare($queryTotalEneGaOp);
                    $stmtTotEneGaOp->execute();
                    
                    //JCV PRIMES TRIMESTRE (enero+febrero+marzo de esta tabla estadoresultados1)
                    
                    $queryTotalEneVeL1="update estadoresultados1 set t_1 = enero + febrero + marzo  where nivel = 11;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    $queryTotalEneGaOp="update estadoresultados1 set abril = (select abril from flujo_de_efectivo where nivel = 205)*-1 where nivel = 11;";
                    $stmtTotEneGaOp = $dbconec->prepare($queryTotalEneGaOp);
                    $stmtTotEneGaOp->execute();
                    
                    $queryTotalEneGaOp="update estadoresultados1 set mayo = (select mayo from flujo_de_efectivo where nivel = 205)*-1 where nivel = 11;";
                    $stmtTotEneGaOp = $dbconec->prepare($queryTotalEneGaOp);
                    $stmtTotEneGaOp->execute();
                    
                    $queryTotalEneGaOp="update estadoresultados1 set junio = (select junio from flujo_de_efectivo where nivel = 205)*-1 where nivel = 11;";
                    $stmtTotEneGaOp = $dbconec->prepare($queryTotalEneGaOp);
                    $stmtTotEneGaOp->execute();
                    
                     //JCV segundo TRIMESTRE (enero+febrero+marzo de esta tabla estadoresultados1)
                    
                    $queryTotalEneVeL1="update estadoresultados1 set t_2 = abril + mayo + junio  where nivel = 11;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    //TOTAL
                    $queryTotalEneVeL1="update estadoresultados1 set total = t_1 + t_2  where nivel = 11;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();

                    
                    
                    //JCV GASTOS VENTAS ESTADO DE RESULTADOS: LA 206 DE LA TABLA flujo_de_efectivo
                     
                    $queryTotalEneGaVe="update estadoresultados1 set enero = (select enero from flujo_de_efectivo where nivel = 206)*-1 where nivel = 12;";
                    $stmtTotEneGaVe = $dbconec->prepare($queryTotalEneGaVe);
                    $stmtTotEneGaVe->execute();
                    
                     $queryTotalEneGaVe="update estadoresultados1 set febrero = (select febrero from flujo_de_efectivo where nivel = 206)*-1 where nivel = 12;";
                    $stmtTotEneGaVe = $dbconec->prepare($queryTotalEneGaVe);
                    $stmtTotEneGaVe->execute();
                    
                     $queryTotalEneGaVe="update estadoresultados1 set marzo = (select marzo from flujo_de_efectivo where nivel = 206)*-1 where nivel = 12;";
                    $stmtTotEneGaVe = $dbconec->prepare($queryTotalEneGaVe);
                    $stmtTotEneGaVe->execute();
                    
                    
                     //JCV PRIMES TRIMESTRE (enero+febrero+marzo de esta tabla estadoresultados1)
                    $queryTotalEneVeL1="update estadoresultados1 set t_1 = enero + febrero + marzo  where nivel = 12;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    //ABRIL
                     $queryTotalEneGaVe="update estadoresultados1 set abril = (select abril from flujo_de_efectivo where nivel = 206)*-1 where nivel = 12;";
                    $stmtTotEneGaVe = $dbconec->prepare($queryTotalEneGaVe);
                    $stmtTotEneGaVe->execute();
                    
                     $queryTotalEneGaVe="update estadoresultados1 set mayo = (select mayo from flujo_de_efectivo where nivel = 206)*-1 where nivel = 12;";
                    $stmtTotEneGaVe = $dbconec->prepare($queryTotalEneGaVe);
                    $stmtTotEneGaVe->execute();
                    
                    $queryTotalEneGaVe="update estadoresultados1 set junio = (select junio from flujo_de_efectivo where nivel = 206)*-1 where nivel = 12;";
                    $stmtTotEneGaVe = $dbconec->prepare($queryTotalEneGaVe);
                    $stmtTotEneGaVe->execute();

                    //JCV segundo TRIMESTRE (enero+febrero+marzo de esta tabla estadoresultados1)
                    $queryTotalEneVeL1="update estadoresultados1 set t_2 = abril + mayo + junio  where nivel = 12;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    //TOTAL
                    $queryTotalEneVeL1="update estadoresultados1 set total = t_1 + t_2  where nivel = 12;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    
                    //JCV GASTOS ADMINISTRATIVOS ESTADO DE RESULTADOS: LA 207 DE LA TABLA flujo_de_efectivo
                     
                    $queryTotalEneGaAd="update estadoresultados1 set enero = (select enero from flujo_de_efectivo where nivel = 207)*-1 where nivel = 13;";
                    $stmtTotEneGaAd = $dbconec->prepare($queryTotalEneGaAd);
                    $stmtTotEneGaAd->execute();
                    
                    $queryTotalEneGaAd="update estadoresultados1 set febrero = (select febrero from flujo_de_efectivo where nivel = 207)*-1 where nivel = 13;";
                    $stmtTotEneGaAd = $dbconec->prepare($queryTotalEneGaAd);
                    $stmtTotEneGaAd->execute();
                    
                    $queryTotalEneGaAd="update estadoresultados1 set marzo = (select marzo from flujo_de_efectivo where nivel = 207)*-1 where nivel = 13;";
                    $stmtTotEneGaAd = $dbconec->prepare($queryTotalEneGaAd);
                    $stmtTotEneGaAd->execute();
                    
                     //JCV PRIMES TRIMESTRE (enero+febrero+marzo de esta tabla estadoresultados1)
                    
                    $queryTotalEneVeL1="update estadoresultados1 set t_1 = enero + febrero + marzo  where nivel = 13;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    //ABRIL
                    $queryTotalEneGaAd="update estadoresultados1 set abril = (select abril from flujo_de_efectivo where nivel = 207)*-1 where nivel = 13;";
                    $stmtTotEneGaAd = $dbconec->prepare($queryTotalEneGaAd);
                    $stmtTotEneGaAd->execute();
                    
                    $queryTotalEneGaAd="update estadoresultados1 set mayo = (select mayo from flujo_de_efectivo where nivel = 207)*-1 where nivel = 13;";
                    $stmtTotEneGaAd = $dbconec->prepare($queryTotalEneGaAd);
                    $stmtTotEneGaAd->execute();
                    
                    $queryTotalEneGaAd="update estadoresultados1 set junio = (select junio from flujo_de_efectivo where nivel = 207)*-1 where nivel = 13;";
                    $stmtTotEneGaAd = $dbconec->prepare($queryTotalEneGaAd);
                    $stmtTotEneGaAd->execute();
                    
                    //JCV ASEGUNDO TRIMESTRE (enero+febrero+marzo de esta tabla estadoresultados1)
                    $queryTotalEneVeL1="update estadoresultados1 set t_2 = abril + mayo + junio  where nivel = 13;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    //TOTAL
                    $queryTotalEneVeL1="update estadoresultados1 set total = t_1 + t_2  where nivel = 13;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();

                    
                    
                    //JCV TOTAL GASTOS, ESTADO DE RESULTADOS: LA 11+12+13 DE ESTA TABLA estadoresultados1
                     
                    $queryTotalEneToGa="update estadoresultados1 set enero = (select enero from estadoresultados1 where nivel = 11)+(select enero from estadoresultados1 where nivel = 12)+(select enero from estadoresultados1 where nivel = 13) where nivel = 14;";
                    $stmtTotEneToGa = $dbconec->prepare($queryTotalEneToGa);
                    $stmtTotEneToGa->execute();
                    
                    $queryTotalEneToGa="update estadoresultados1 set febrero = (select febrero from estadoresultados1 where nivel = 11)+(select febrero from estadoresultados1 where nivel = 12)+(select febrero from estadoresultados1 where nivel = 13) where nivel = 14;";
                    $stmtTotEneToGa = $dbconec->prepare($queryTotalEneToGa);
                    $stmtTotEneToGa->execute();
                    
                    $queryTotalEneToGa="update estadoresultados1 set marzo = (select marzo from estadoresultados1 where nivel = 11)+(select marzo from estadoresultados1 where nivel = 12)+(select marzo from estadoresultados1 where nivel = 13) where nivel = 14;";
                    $stmtTotEneToGa = $dbconec->prepare($queryTotalEneToGa);
                    $stmtTotEneToGa->execute();
                    
                    //JCV PRIMES TRIMESTRE (enero+febrero+marzo de esta tabla estadoresultados1)
                    $queryTotalEneVeL1="update estadoresultados1 set t_1 = enero + febrero + marzo  where nivel = 14;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    //ABRIL
                    $queryTotalEneToGa="update estadoresultados1 set abril = (select abril from estadoresultados1 where nivel = 11)+(select abril from estadoresultados1 where nivel = 12)+(select abril from estadoresultados1 where nivel = 13) where nivel = 14;";
                    $stmtTotEneToGa = $dbconec->prepare($queryTotalEneToGa);
                    $stmtTotEneToGa->execute();
                    
                    $queryTotalEneToGa="update estadoresultados1 set mayo = (select mayo from estadoresultados1 where nivel = 11)+(select mayo from estadoresultados1 where nivel = 12)+(select mayo from estadoresultados1 where nivel = 13) where nivel = 14;";
                    $stmtTotEneToGa = $dbconec->prepare($queryTotalEneToGa);
                    $stmtTotEneToGa->execute();
                    
                    $queryTotalEneToGa="update estadoresultados1 set junio = (select junio from estadoresultados1 where nivel = 11)+(select junio from estadoresultados1 where nivel = 12)+(select junio from estadoresultados1 where nivel = 13) where nivel = 14;";
                    $stmtTotEneToGa = $dbconec->prepare($queryTotalEneToGa);
                    $stmtTotEneToGa->execute();

                    //JCV SEGUNDO TRIMESTRE (enero+febrero+marzo de esta tabla estadoresultados1)
                    $queryTotalEneVeL1="update estadoresultados1 set t_2 = abril + mayo + junio  where nivel = 14;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    //TOTAL
                    $queryTotalEneVeL1="update estadoresultados1 set total = t_1 + t_2  where nivel = 14;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    
                    
                    
                    //JCV EBITDA, ESTADO DE RESULTADOS: LA 10-14 DE ESTA TABLA estadoresultados1
                     
                    $queryTotalEneEBITDA="update estadoresultados1 set enero = (select enero from estadoresultados1 where nivel = 10)-(select enero from estadoresultados1 where nivel = 14) where nivel = 15;";
                    $stmtTotEneEBITDA = $dbconec->prepare($queryTotalEneEBITDA);
                    $stmtTotEneEBITDA->execute();
                    
                    $queryTotalEneEBITDA="update estadoresultados1 set febrero = (select febrero from estadoresultados1 where nivel = 10)-(select febrero from estadoresultados1 where nivel = 14) where nivel = 15;";
                    $stmtTotEneEBITDA = $dbconec->prepare($queryTotalEneEBITDA);
                    $stmtTotEneEBITDA->execute();
                    
                    $queryTotalEneEBITDA="update estadoresultados1 set marzo = (select marzo from estadoresultados1 where nivel = 10)-(select marzo from estadoresultados1 where nivel = 14) where nivel = 15;";
                    $stmtTotEneEBITDA = $dbconec->prepare($queryTotalEneEBITDA);
                    $stmtTotEneEBITDA->execute();
                    
                    //JCV PRIMES TRIMESTRE (enero+febrero+marzo de esta tabla estadoresultados1)
                    $queryTotalEneVeL1="update estadoresultados1 set t_1 = enero + febrero + marzo  where nivel = 15;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    //ABRIL
                    $queryTotalEneEBITDA="update estadoresultados1 set abril = (select abril from estadoresultados1 where nivel = 10)-(select abril from estadoresultados1 where nivel = 14) where nivel = 15;";
                    $stmtTotEneEBITDA = $dbconec->prepare($queryTotalEneEBITDA);
                    $stmtTotEneEBITDA->execute();
                    
                    $queryTotalEneEBITDA="update estadoresultados1 set mayo = (select mayo from estadoresultados1 where nivel = 10)-(select mayo from estadoresultados1 where nivel = 14) where nivel = 15;";
                    $stmtTotEneEBITDA = $dbconec->prepare($queryTotalEneEBITDA);
                    $stmtTotEneEBITDA->execute();
                    
                    $queryTotalEneEBITDA="update estadoresultados1 set junio = (select junio from estadoresultados1 where nivel = 10)-(select junio from estadoresultados1 where nivel = 14) where nivel = 15;";
                    $stmtTotEneEBITDA = $dbconec->prepare($queryTotalEneEBITDA);
                    $stmtTotEneEBITDA->execute();
                    
                    //JCV SEGUNDO TRIMESTRE (enero+febrero+marzo de esta tabla estadoresultados1)
                    $queryTotalEneVeL1="update estadoresultados1 set t_2 = abril + mayo + junio  where nivel = 15;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    //TOTAL
                    $queryTotalEneVeL1="update estadoresultados1 set total = t_1 + t_2  where nivel = 15;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                     
                    
                    
                    //JCV GASTOS FINANCIEROS ESTADO DE RESULTADOS: LA 60+61 DE LA TABLA flujo_de_efectivo
                     
                    /*$queryTotalEneGaFi="update estadoresultados1 set enero = ((select enero from flujo_de_efectivo where nivel = 60)+(select enero from flujo_de_efectivo where nivel = 61))*-1 where nivel = 16;";
                    $stmtTotEneGaFi = $dbconec->prepare($queryTotalEneGaFi);
                    $stmtTotEneGaFi->execute();
                    */
                    $queryTotalEneGaFi="update estadoresultados1 set enero = ((SELECT sum(enero) FROM flujo_de_efectivo WHERE nivel>=58 AND nivel<=61))*-1 where nivel = 16;";
                    $stmtTotEneGaFi = $dbconec->prepare($queryTotalEneGaFi);
                    $stmtTotEneGaFi->execute();
                    
                   
                    
                    $queryTotalEneGaFi="update estadoresultados1 set febrero = ((SELECT sum(febrero) FROM flujo_de_efectivo WHERE nivel>=58 AND nivel<=61))*-1 where nivel = 16;";
                    $stmtTotEneGaFi = $dbconec->prepare($queryTotalEneGaFi);
                    $stmtTotEneGaFi->execute();
                    
                     $queryTotalEneGaFi="update estadoresultados1 set marzo = ((SELECT sum(marzo) FROM flujo_de_efectivo WHERE nivel>=58 AND nivel<=61))*-1 where nivel = 16;";
                    $stmtTotEneGaFi = $dbconec->prepare($queryTotalEneGaFi);
                    $stmtTotEneGaFi->execute();
                    
                    //JCV PRIMES TRIMESTRE (enero+febrero+marzo de esta tabla estadoresultados1)
                    
                    $queryTotalEneVeL1="update estadoresultados1 set t_1 = enero + febrero + marzo  where nivel = 16;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    //ABRIL
                      $queryTotalEneGaFi="update estadoresultados1 set abril = ((SELECT sum(abril) FROM flujo_de_efectivo WHERE nivel>=58 AND nivel<=61))*-1 where nivel = 16;";
                    $stmtTotEneGaFi = $dbconec->prepare($queryTotalEneGaFi);
                    $stmtTotEneGaFi->execute();
                    
                      $queryTotalEneGaFi="update estadoresultados1 set mayo = ((SELECT sum(mayo) FROM flujo_de_efectivo WHERE nivel>=58 AND nivel<=61))*-1 where nivel = 16;";
                    $stmtTotEneGaFi = $dbconec->prepare($queryTotalEneGaFi);
                    $stmtTotEneGaFi->execute();
                    
                    /*  $queryTotalEneGaFi="update estadoresultados1 set junio = ((select junio from flujo_de_efectivo where nivel = 60)+(select junio from flujo_de_efectivo where nivel = 61))*-1 where nivel = 16;";
                    $stmtTotEneGaFi = $dbconec->prepare($queryTotalEneGaFi);
                    $stmtTotEneGaFi->execute();
                    */
                      $queryTotalEneGaFi="update estadoresultados1 set junio = ((SELECT sum(junio) FROM flujo_de_efectivo WHERE nivel>=58 AND nivel<=61))*-1 where nivel = 16;";
                    $stmtTotEneGaFi = $dbconec->prepare($queryTotalEneGaFi);
                    $stmtTotEneGaFi->execute();
                    
                    //JCV SEGUNDO TRIMESTRE (enero+febrero+marzo de esta tabla estadoresultados1)
                    $queryTotalEneVeL1="update estadoresultados1 set t_2 = abril + mayo + junio  where nivel = 16;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    //TOTAL
                    $queryTotalEneVeL1="update estadoresultados1 set total = t_1 + t_2  where nivel = 16;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    

                    
                    //JCV EBIT, ESTADO DE RESULTADOS: LA 15-16 DE ESTA TABLA estadoresultados1
                     
                    $queryTotalEneEBIT="update estadoresultados1 set enero = (select enero from estadoresultados1 where nivel = 15)-(select enero from estadoresultados1 where nivel = 16) where nivel = 17;";
                    $stmtTotEneEBIT = $dbconec->prepare($queryTotalEneEBIT);
                    $stmtTotEneEBIT->execute();
                    
                    $queryTotalEneEBIT="update estadoresultados1 set febrero = (select febrero from estadoresultados1 where nivel = 15)-(select febrero from estadoresultados1 where nivel = 16) where nivel = 17;";
                    $stmtTotEneEBIT = $dbconec->prepare($queryTotalEneEBIT);
                    $stmtTotEneEBIT->execute();
                    
                    $queryTotalEneEBIT="update estadoresultados1 set marzo = (select marzo from estadoresultados1 where nivel = 15)-(select marzo from estadoresultados1 where nivel = 16) where nivel = 17;";
                    $stmtTotEneEBIT = $dbconec->prepare($queryTotalEneEBIT);
                    $stmtTotEneEBIT->execute();
                    
                    //JCV PRIMES TRIMESTRE (enero+febrero+marzo de esta tabla estadoresultados1)
                    $queryTotalEneVeL1="update estadoresultados1 set t_1 = enero + febrero + marzo  where nivel = 17;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    //ABRIL
                    $queryTotalEneEBIT="update estadoresultados1 set abril = (select abril from estadoresultados1 where nivel = 15)-(select abril from estadoresultados1 where nivel = 16) where nivel = 17;";
                    $stmtTotEneEBIT = $dbconec->prepare($queryTotalEneEBIT);
                    $stmtTotEneEBIT->execute();
                    
                    $queryTotalEneEBIT="update estadoresultados1 set mayo = (select mayo from estadoresultados1 where nivel = 15)-(select mayo from estadoresultados1 where nivel = 16) where nivel = 17;";
                    $stmtTotEneEBIT = $dbconec->prepare($queryTotalEneEBIT);
                    $stmtTotEneEBIT->execute();
                    
                    $queryTotalEneEBIT="update estadoresultados1 set junio = (select junio from estadoresultados1 where nivel = 15)-(select junio from estadoresultados1 where nivel = 16) where nivel = 17;";
                    $stmtTotEneEBIT = $dbconec->prepare($queryTotalEneEBIT);
                    $stmtTotEneEBIT->execute();
                    
                    //JCV SEGUNDO TRIMESTRE (enero+febrero+marzo de esta tabla estadoresultados1)
                    $queryTotalEneVeL1="update estadoresultados1 set t_2 = abril + mayo + junio  where nivel = 17;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    //TOTAL
                    $queryTotalEneVeL1="update estadoresultados1 set total = t_1 + t_2  where nivel = 17;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    

                    
                     //JCV IMPUESTOS ESTADO DE RESULTADOS: LA 208 DE LA TABLA flujo_de_efectivo
                     
                    $queryTotalEneIm="update estadoresultados1 set enero = (select enero from flujo_de_efectivo where nivel = 208)*-1 where nivel = 18;";
                    $stmtTotEneIm = $dbconec->prepare($queryTotalEneIm);
                    $stmtTotEneIm->execute();
                    
                    $queryTotalEneIm="update estadoresultados1 set febrero = (select febrero from flujo_de_efectivo where nivel = 208)*-1 where nivel = 18;";
                    $stmtTotEneIm = $dbconec->prepare($queryTotalEneIm);
                    $stmtTotEneIm->execute();
                    
                    $queryTotalEneIm="update estadoresultados1 set marzo = (select marzo from flujo_de_efectivo where nivel = 208)*-1 where nivel = 18;";
                    $stmtTotEneIm = $dbconec->prepare($queryTotalEneIm);
                    $stmtTotEneIm->execute();
                    
                    //JCV PRIMES TRIMESTRE (enero+febrero+marzo de esta tabla estadoresultados1)
                    $queryTotalEneVeL1="update estadoresultados1 set t_1 = enero + febrero + marzo  where nivel = 18;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    //ABRIL
                    
                    $queryTotalEneIm="update estadoresultados1 set abril = (select abril from flujo_de_efectivo where nivel = 208)*-1 where nivel = 18;";
                    $stmtTotEneIm = $dbconec->prepare($queryTotalEneIm);
                    $stmtTotEneIm->execute();
                    
                    $queryTotalEneIm="update estadoresultados1 set mayo = (select mayo from flujo_de_efectivo where nivel = 208)*-1 where nivel = 18;";
                    $stmtTotEneIm = $dbconec->prepare($queryTotalEneIm);
                    $stmtTotEneIm->execute();
                    
                    $queryTotalEneIm="update estadoresultados1 set junio = (select junio from flujo_de_efectivo where nivel = 208)*-1 where nivel = 18;";
                    $stmtTotEneIm = $dbconec->prepare($queryTotalEneIm);
                    $stmtTotEneIm->execute();
                    
                    //JCV ASEGUNDO TRIMESTRE (enero+febrero+marzo de esta tabla estadoresultados1)
                    $queryTotalEneVeL1="update estadoresultados1 set t_2 = abril + mayo + junio  where nivel = 18;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    //TOTAL
                    $queryTotalEneVeL1="update estadoresultados1 set total = t_1 + t_2  where nivel = 18;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    
                                        
                    
                     //JCV UTILIDAD O PERDIDA, ESTADO DE RESULTADOS: LA 17-18 DE ESTA TABLA estadoresultados1
                     
                    $queryTotalEneEBIT="update estadoresultados1 set enero = (select enero from estadoresultados1 where nivel = 17)-(select enero from estadoresultados1 where nivel = 18) where nivel = 19;";
                    $stmtTotEneEBIT = $dbconec->prepare($queryTotalEneEBIT);
                    $stmtTotEneEBIT->execute();
                    
                    $queryTotalEneEBIT="update estadoresultados1 set febrero = (select febrero from estadoresultados1 where nivel = 17)-(select febrero from estadoresultados1 where nivel = 18) where nivel = 19;";
                    $stmtTotEneEBIT = $dbconec->prepare($queryTotalEneEBIT);
                    $stmtTotEneEBIT->execute();
                    
                    $queryTotalEneEBIT="update estadoresultados1 set marzo = (select marzo from estadoresultados1 where nivel = 17)-(select marzo from estadoresultados1 where nivel = 18) where nivel = 19;";
                    $stmtTotEneEBIT = $dbconec->prepare($queryTotalEneEBIT);
                    $stmtTotEneEBIT->execute();
                    
                    //JCV PRIMES TRIMESTRE (enero+febrero+marzo de esta tabla estadoresultados1)
                    $queryTotalEneVeL1="update estadoresultados1 set t_1 = enero + febrero + marzo  where nivel = 19;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    //ABRIL
                    $queryTotalEneEBIT="update estadoresultados1 set abril = (select abril from estadoresultados1 where nivel = 17)-(select abril from estadoresultados1 where nivel = 18) where nivel = 19;";
                    $stmtTotEneEBIT = $dbconec->prepare($queryTotalEneEBIT);
                    $stmtTotEneEBIT->execute();
                    
                    $queryTotalEneEBIT="update estadoresultados1 set mayo = (select mayo from estadoresultados1 where nivel = 17)-(select mayo from estadoresultados1 where nivel = 18) where nivel = 19;";
                    $stmtTotEneEBIT = $dbconec->prepare($queryTotalEneEBIT);
                    $stmtTotEneEBIT->execute();
                    
                    $queryTotalEneEBIT="update estadoresultados1 set junio = (select junio from estadoresultados1 where nivel = 17)-(select junio from estadoresultados1 where nivel = 18) where nivel = 19;";
                    $stmtTotEneEBIT = $dbconec->prepare($queryTotalEneEBIT);
                    $stmtTotEneEBIT->execute();
                    
                    //JCV SEGUNDO TRIMESTRE (enero+febrero+marzo de esta tabla estadoresultados1)
                    $queryTotalEneVeL1="update estadoresultados1 set t_2 = abril + mayo + junio  where nivel = 19;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    //TOTAL
                    $queryTotalEneVeL1="update estadoresultados1 set total = t_1 + t_2  where nivel = 19;";
                    $stmtTotEneVeL1 = $dbconec->prepare($queryTotalEneVeL1);
                    $stmtTotEneVeL1->execute();
                    
                    
                                                      
                    
                    //JCV EFICIENCIA, ESTADO DE RESULTADOS: LA 19/1 DE ESTA TABLA estadoresultados1
                     
                    $queryTotalEneEf="update estadoresultados1 set enero = ((select enero from estadoresultados1 where nivel = 19)/(select enero from estadoresultados1 where nivel = 1))*100 where nivel = 20;";
                    $stmtTotEneEf = $dbconec->prepare($queryTotalEneEf);
                    $stmtTotEneEf->execute();
                    
                    $queryTotalEneEf="update estadoresultados1 set febrero = ((select febrero from estadoresultados1 where nivel = 19)/(select febrero from estadoresultados1 where nivel = 1))*100 where nivel = 20;";
                    $stmtTotEneEf = $dbconec->prepare($queryTotalEneEf);
                    $stmtTotEneEf->execute();
                    
                    $queryTotalEneEf="update estadoresultados1 set marzo = ((select marzo from estadoresultados1 where nivel = 19)/(select marzo from estadoresultados1 where nivel = 1))*100 where nivel = 20;";
                    $stmtTotEneEf = $dbconec->prepare($queryTotalEneEf);
                    $stmtTotEneEf->execute();
                    
                    //JCV PRIMES TRIMESTRE LA 19/1 DE ESTA TABLA estadoresultados1
                    $queryTotalEneEf="update estadoresultados1 set t_1 = ((select t_1 from estadoresultados1 where nivel = 19)/(select t_1 from estadoresultados1 where nivel = 1))*100 where nivel = 20;";
                    $stmtTotEneEf = $dbconec->prepare($queryTotalEneEf);
                    $stmtTotEneEf->execute();
                    
                    //abril
                    $queryTotalEneEf="update estadoresultados1 set abril = ((select abril from estadoresultados1 where nivel = 19)/(select abril from estadoresultados1 where nivel = 1))*100 where nivel = 20;";
                    $stmtTotEneEf = $dbconec->prepare($queryTotalEneEf);
                    $stmtTotEneEf->execute();
                    
                    $queryTotalEneEf="update estadoresultados1 set mayo = ((select mayo from estadoresultados1 where nivel = 19)/(select mayo from estadoresultados1 where nivel = 1))*100 where nivel = 20;";
                    $stmtTotEneEf = $dbconec->prepare($queryTotalEneEf);
                    $stmtTotEneEf->execute();
                    
                    $queryTotalEneEf="update estadoresultados1 set junio = ((select junio from estadoresultados1 where nivel = 19)/(select junio from estadoresultados1 where nivel = 1))*100 where nivel = 20;";
                    $stmtTotEneEf = $dbconec->prepare($queryTotalEneEf);
                    $stmtTotEneEf->execute();
                    
                    //JCV SEGUNDO TRIMESTRE LA 19/1 DE ESTA TABLA estadoresultados1
                    $queryTotalEneEf="update estadoresultados1 set t_2 = ((select t_2 from estadoresultados1 where nivel = 19)/(select t_2 from estadoresultados1 where nivel = 1))*100 where nivel = 20;";
                    $stmtTotEneEf = $dbconec->prepare($queryTotalEneEf);
                    $stmtTotEneEf->execute();
                    
                    
                    //TOTAL
                    //JCV SEGUNDO TRIMESTRE LA 19/1 DE ESTA TABLA estadoresultados1
                    $queryTotalEneEf="update estadoresultados1 set total = ((select total from estadoresultados1 where nivel = 19)/(select total from estadoresultados1 where nivel = 1))*100 where nivel = 20;";
                    $stmtTotEneEf = $dbconec->prepare($queryTotalEneEf);
                    $stmtTotEneEf->execute();
                    
                    
                    
                    //JCV RAZON CAMBIO EFICIENCIA, ESTADO DE RESULTADOS: LA 20 del mes /20 mes anterior -1 DE ESTA TABLA estadoresultados1
                     
                    $queryTotalEneRaCaEf="update estadoresultados1 set febrero = ((select febrero from estadoresultados1 where nivel = 20)/(select enero from estadoresultados1 where nivel = 20)-1)*100 where nivel = 21;";
                    $stmtTotEneRaCaEf = $dbconec->prepare($queryTotalEneRaCaEf);
                    $stmtTotEneRaCaEf->execute();
                    
                     $queryTotalEneRaCaEf="update estadoresultados1 set marzo = ((select marzo from estadoresultados1 where nivel = 20)/(select febrero from estadoresultados1 where nivel = 20)-1)*100 where nivel = 21;";
                    $stmtTotEneRaCaEf = $dbconec->prepare($queryTotalEneRaCaEf);
                    $stmtTotEneRaCaEf->execute();
                    
                    //ABRIL
                     $queryTotalEneRaCaEf="update estadoresultados1 set abril = ((select abril from estadoresultados1 where nivel = 20)/(select marzo from estadoresultados1 where nivel = 20)-1)*100 where nivel = 21;";
                    $stmtTotEneRaCaEf = $dbconec->prepare($queryTotalEneRaCaEf);
                    $stmtTotEneRaCaEf->execute();
                    
                     $queryTotalEneRaCaEf="update estadoresultados1 set mayo = ((select mayo from estadoresultados1 where nivel = 20)/(select abril from estadoresultados1 where nivel = 20)-1)*100 where nivel = 21;";
                    $stmtTotEneRaCaEf = $dbconec->prepare($queryTotalEneRaCaEf);
                    $stmtTotEneRaCaEf->execute();
                    
                     $queryTotalEneRaCaEf="update estadoresultados1 set junio = ((select junio from estadoresultados1 where nivel = 20)/(select mayo from estadoresultados1 where nivel = 20)-1)*100 where nivel = 21;";
                    $stmtTotEneRaCaEf = $dbconec->prepare($queryTotalEneRaCaEf);
                    $stmtTotEneRaCaEf->execute();
                    
                    
                       
                    
                    //JCV PARA COMMON SIZE COPIAMOS TODO EL CONTENIDO DELA TABLA ESTADO DE RESULTADOS 1 A LA TABLA COMMON_SIZE1
                    //PARA QUE EN ÉSTA SE HAGAN LOS CALCULOS:
                    
                    $queryBorrarCommSize="delete from common_size1";
                    $stmtBorraCommSize = $dbconec->prepare($queryBorrarCommSize);
                    $stmtBorraCommSize->execute();
                   
                    
                    $queryTotalCommSize="INSERT INTO common_size1 (cuenta, nivel, enero, febrero, marzo, t_1, abril, mayo, junio, t_2, total) SELECT cuenta, nivel, enero, febrero, marzo, t_1, abril, mayo, junio, t_2, total FROM estadoresultados1";
                    $stmtTotCommSize = $dbconec->prepare($queryTotalCommSize);
                    $stmtTotCommSize->execute();
                    
                    
                    ////////////////////////////jcv
                    //PARA LLENAR EL COMMON SIZE
                     
                     
                     //JCV VENTAS LINEA 1P COMMON_SIZE1: LA 2 / LA 1 DE ENERO DE LA TABLA COMMON_SIZE1
                     
                    $queryComSizEne="update common_size1 set eneroP = ((select enero from common_size1 where nivel = 2)/(select enero from common_size1 where nivel = 1))*100 where nivel = 2;";
                    $stmtComSizEne = $dbconec->prepare($queryComSizEne);
                    $stmtComSizEne->execute();
                    
                    $queryComSizEne="update common_size1 set febreroP = ((select febrero from common_size1 where nivel = 2)/(select febrero from common_size1 where nivel = 1))*100 where nivel = 2;";
                    $stmtComSizEne = $dbconec->prepare($queryComSizEne);
                    $stmtComSizEne->execute();
                    
                    $queryComSizEne="update common_size1 set marzoP = ((select marzo from common_size1 where nivel = 2)/(select marzo from common_size1 where nivel = 1))*100 where nivel = 2;";
                    $stmtComSizEne = $dbconec->prepare($queryComSizEne);
                    $stmtComSizEne->execute();
                    
                    $queryComSizEne="update common_size1 set 1trimP = ((select t_1 from common_size1 where nivel = 2)/(select t_1 from common_size1 where nivel = 1))*100 where nivel = 2;";
                    $stmtComSizEne = $dbconec->prepare($queryComSizEne);
                    $stmtComSizEne->execute();
                    
                    $queryComSizEne="update common_size1 set abrilP = ((select abril from common_size1 where nivel = 2)/(select abril from common_size1 where nivel = 1))*100 where nivel = 2;";
                    $stmtComSizEne = $dbconec->prepare($queryComSizEne);
                    $stmtComSizEne->execute();
                    
                    $queryComSizEne="update common_size1 set mayoP = ((select mayo from common_size1 where nivel = 2)/(select mayo from common_size1 where nivel = 1))*100 where nivel = 2;";
                    $stmtComSizEne = $dbconec->prepare($queryComSizEne);
                    $stmtComSizEne->execute();
                    
                    $queryComSizEne="update common_size1 set junioP = ((select junio from common_size1 where nivel = 2)/(select junio from common_size1 where nivel = 1))*100 where nivel = 2;";
                    $stmtComSizEne = $dbconec->prepare($queryComSizEne);
                    $stmtComSizEne->execute();
                    
                    $queryComSizEne="update common_size1 set 1trimP = ((select t_2 from common_size1 where nivel = 2)/(select t_2 from common_size1 where nivel = 1))*100 where nivel = 2;";
                    $stmtComSizEne = $dbconec->prepare($queryComSizEne);
                    $stmtComSizEne->execute();
                    
                    $queryComSizEne="update common_size1 set totalP = ((select total from common_size1 where nivel = 2)/(select total from common_size1 where nivel = 1))*100 where nivel = 2;";
                    $stmtComSizEne = $dbconec->prepare($queryComSizEne);
                    $stmtComSizEne->execute();
                    
                    
                     //JCV VENTAS totalesP COMMON_SIZE1: igual A LA 2 DE ENERO DE LA TABLA COMMON_SIZE1
                    
                    $queryComSizVen="update common_size1 set eneroP = (select eneroP from common_size1 where nivel = 2), febreroP = (select febreroP from common_size1 where nivel = 2), marzoP = (select marzoP from common_size1 where nivel = 2), 1trimP = (select 1trimP from common_size1 where nivel = 2), abrilP = (select abrilP from common_size1 where nivel = 2), mayoP = (select mayoP from common_size1 where nivel = 2), junioP = (select junioP from common_size1 where nivel = 2), 2trimP = (select 2trimP from common_size1 where nivel = 2), totalP = (select totalP from common_size1 where nivel = 2) where nivel = 1;";
                    $stmtComSizVen = $dbconec->prepare($queryComSizVen);
                    $stmtComSizVen->execute();
                    
                 
                    //JCV PARA QUE RECORRA TODA LA TABLA Y GHAGA LOS CALCULOS YA QUE SON SIMILARES DE CADA CUENTA O CONCEPTO
                    
                 $queryjcv = "SELECT * FROM common_size1 where nivel >= 1 and nivel <=20 order by nivel ;";
                            $stmtjcv = $dbconec->prepare($queryjcv);
                            $stmtjcv->execute();
                            $count = $stmtjcv->rowCount();

                            if($count > 0)
                            {
                                    $filas= $stmtjcv->fetchAll();
                            }   
                    
                      
               
                
                if (is_array($filas) || is_object($filas))
                {
                foreach ($filas as $row => $column) 
                {
                    
                    if($column['nivel']==1) {
                        $ventasEne = $column['enero'];
                        $ventasFeb = $column['febrero'];
                        $ventasMar= $column['marzo'];
                        $ventasAbr = $column['abril'];
                        $ventast_1 = $column['t_1'];
                        $ventasMay = $column['mayo'];
                        $ventasJun = $column['junio'];
                        $ventast_2 = $column['t_2'];
                        $ventasTot = $column['total'];
                        
                    }    
                    
                    $queryComSizVen="update common_size1 set eneroP = enero / $ventasEne *100 ;";
                    $stmtComSizVen = $dbconec->prepare($queryComSizVen);
                    $stmtComSizVen->execute();
                    
                    $queryComSizVen="update common_size1 set febreroP = febrero / $ventasFeb *100 ;";
                    $stmtComSizVen = $dbconec->prepare($queryComSizVen);
                    $stmtComSizVen->execute();
                    
                    $queryComSizVen="update common_size1 set marzoP = marzo / $ventasMar *100 ;";
                    $stmtComSizVen = $dbconec->prepare($queryComSizVen);
                    $stmtComSizVen->execute();
                    
                    $queryComSizVen="update common_size1 set 1trimP = t_1 / $ventast_1 *100 ;";
                    $stmtComSizVen = $dbconec->prepare($queryComSizVen);
                    $stmtComSizVen->execute();
                    
                     $queryComSizVen="update common_size1 set abrilP = abril / $ventasAbr *100 ;";
                    $stmtComSizVen = $dbconec->prepare($queryComSizVen);
                    $stmtComSizVen->execute();
                    
                     $queryComSizVen="update common_size1 set mayoP = mayo / $ventasMay *100 ;";
                    $stmtComSizVen = $dbconec->prepare($queryComSizVen);
                    $stmtComSizVen->execute();
                    
                     $queryComSizVen="update common_size1 set junioP = junio / $ventasJun *100 ;";
                    $stmtComSizVen = $dbconec->prepare($queryComSizVen);
                    $stmtComSizVen->execute();
                    
                    $queryComSizVen="update common_size1 set 2trimP = t_2 / $ventast_2 *100 ;";
                    $stmtComSizVen = $dbconec->prepare($queryComSizVen);
                    $stmtComSizVen->execute();
                    
                    $queryComSizVen="update common_size1 set totalP = total / $ventasTot *100 ;";
                    $stmtComSizVen = $dbconec->prepare($queryComSizVen);
                    $stmtComSizVen->execute();
                    
                   //JCV PARA EFICIENCIA
                     if($column['nivel']==20) {
                        $queryComSizEfi="update common_size1 set eneroP = ((select eneroP from common_size1 where nivel = 19)/(select eneroP from common_size1 where nivel = 1))*100 where nivel = 20;";
                        $stmtComSizEfi = $dbconec->prepare($queryComSizEfi);
                        $stmtComSizEfi->execute();
                        
                        $queryComSizEfi="update common_size1 set febreroP = ((select febreroP from common_size1 where nivel = 19)/(select febreroP from common_size1 where nivel = 1))*100 where nivel = 20;";
                        $stmtComSizEfi = $dbconec->prepare($queryComSizEfi);
                        $stmtComSizEfi->execute();
                        
                        $queryComSizEfi="update common_size1 set marzoP = ((select marzoP from common_size1 where nivel = 19)/(select marzoP from common_size1 where nivel = 1))*100 where nivel = 20;";
                        $stmtComSizEfi = $dbconec->prepare($queryComSizEfi);
                        $stmtComSizEfi->execute();
                        
                        $queryComSizEfi="update common_size1 set abrilP = ((select abrilP from common_size1 where nivel = 19)/(select abrilP from common_size1 where nivel = 1))*100 where nivel = 20;";
                        $stmtComSizEfi = $dbconec->prepare($queryComSizEfi);
                        $stmtComSizEfi->execute();
                        
                        $queryComSizEfi="update common_size1 set 1trimP = ((select 1trimP from common_size1 where nivel = 19)/(select 1trimP from common_size1 where nivel = 1))*100 where nivel = 20;";
                        $stmtComSizEfi = $dbconec->prepare($queryComSizEfi);
                        $stmtComSizEfi->execute();
                        
                        $queryComSizEfi="update common_size1 set mayoP = ((select mayoP from common_size1 where nivel = 19)/(select mayoP from common_size1 where nivel = 1))*100 where nivel = 20;";
                        $stmtComSizEfi = $dbconec->prepare($queryComSizEfi);
                        $stmtComSizEfi->execute();
                        
                        $queryComSizEfi="update common_size1 set junioP = ((select junioP from common_size1 where nivel = 19)/(select junioP from common_size1 where nivel = 1))*100 where nivel = 20;";
                        $stmtComSizEfi = $dbconec->prepare($queryComSizEfi);
                        $stmtComSizEfi->execute();
                        
                         $queryComSizEfi="update common_size1 set 2trimP = ((select 2trimP from common_size1 where nivel = 19)/(select 2trimP from common_size1 where nivel = 1))*100 where nivel = 20;";
                        $stmtComSizEfi = $dbconec->prepare($queryComSizEfi);
                        $stmtComSizEfi->execute();
                        
                         $queryComSizEfi="update common_size1 set totalP = ((select totalP from common_size1 where nivel = 19)/(select totalP from common_size1 where nivel = 1))*100 where nivel = 20;";
                        $stmtComSizEfi = $dbconec->prepare($queryComSizEfi);
                        $stmtComSizEfi->execute();
                       
                        
                    }    
                    
                    
                    //////////////////////////////////////////////
                    //JCV PARA LOS R.C.
                    
                    
                    $queryComSizRC="update common_size1 set rcEF = (febrero / enero -1)*100 ;";
                    $stmtComSizRC = $dbconec->prepare($queryComSizRC);
                    $stmtComSizRC->execute();
                    
                    $queryComSizRC="update common_size1 set rcFM = (marzo / febrero -1)*100 ;";
                    $stmtComSizRC = $dbconec->prepare($queryComSizRC);
                    $stmtComSizRC->execute();
                    
                     $queryComSizRC="update common_size1 set rcMA = (abril / marzo -1)*100 ;";
                    $stmtComSizRC = $dbconec->prepare($queryComSizRC);
                    $stmtComSizRC->execute();
                    
                    $queryComSizRC="update common_size1 set rcAM = (mayo / abril -1)*100 ;";
                    $stmtComSizRC = $dbconec->prepare($queryComSizRC);
                    $stmtComSizRC->execute();
                    
                    $queryComSizRC="update common_size1 set rcMJ = (junio / mayo -1)*100 ;";
                    $stmtComSizRC = $dbconec->prepare($queryComSizRC);
                    $stmtComSizRC->execute();
                    
                    
                    
                }
                }
                    
                    
                    
                    
                    
                $dbconec = null;

          
                } catch (Exception $e) {
                        $data = "Error";
                        echo json_encode($data);

                }

        }
                
                  
                 
                 
                public function Listar_common_size1s()    
		{ 
                            $dbconec = Conexion::Conectar();
 
                    try 
                    {   
                            $query = "SELECT * FROM estadoresultados1 where nivel >= 1 and nivel <=21 order by nivel ;";
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
                
                
            
                public function Listar_common_size1sP()    
		{ 
                            $dbconec = Conexion::Conectar();
 
                    try 
                    {   
                            $query = "SELECT * FROM common_size1 where nivel >= 1 and nivel <=20 order by nivel ;";
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
