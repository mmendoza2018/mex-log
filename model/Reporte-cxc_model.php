<?php
/*JCV OBTENIDO DEL ARCHIVO cuentasdebancos_model.php*/
	require_once('Conexion.php');
        

	class ReportecxcModel extends Conexion 
	{
            
                public function Insertar_datos_flujo()
		{
			$dbconec = Conexion::Conectar();
			try
			{
                            $anio = date('Y');
                            $id_acumulativaGlobal=8;
                            
                            //JCV YA ESTÁ CON EL CICLO PARA TODAS LAS CUENTAS PARA TODOS LOS MESES
                            

			//try
			//{
				//JCV FALTA PONER EL MENSAJE DE SI ESTÁ VACÍA LA TABLA DE CUENTAS ACUMULATIVAS
                                $queryAcumulativa = "SELECT * FROM cuentas_acumulativa where estado=1 order by nivel ;";
                                $stmtAcumulativa = $dbconec->prepare($queryAcumulativa);
				$stmtAcumulativa->execute();
				$count = $stmtAcumulativa->rowCount();

				if($count > 0)
				{
					$filasAcumulativa= $stmtAcumulativa->fetchAll();
				}else{
                                    $dbconec = null;
                                }
                                    
                                
                                $queryBorrar= "Select * from flujo_de_efectivo";
                                $stmtBorrar = $dbconec->prepare($queryBorrar);
                                $stmtBorrar->execute();
                                if($count > 0)
				{
					$queryBorrar="DELETE from flujo_de_efectivo";
                                        $stmtBorrar = $dbconec->prepare($queryBorrar);
                                        $stmtBorrar->execute();
				}else{
                                    
                                }
                                
                                
                                
                                $cuantosinserto=0;

                                if (is_array($filasAcumulativa) || is_object($filasAcumulativa))
                                {
                                    foreach ($filasAcumulativa as $row => $column)
                                    {
                                        $saldoEnero='0.00';
                                        $saldoFebrero='0.00';
                                        $saldoMarzo='0.00';
                                        $saldoAbril='0.00';
                                        $saldoMayo='0.00';
                                        $saldoJunio='0.00';
                                        $saldoJulio='0.00';
                                        $saldoAgosto='0.00';
                                        $saldoSeptiembre='0.00';
                                        $saldoOctubre='0.00';
                                        $saldoNoviembre='0.00';
                                        $saldoDiciembre='0.00';
                                        $id_acumulativaGlobal=$column['id_acumulativa'];
                                        $nombre_atributoGlobal=$column['nombre_atributo'];
                                       // JCV OK$cuenta_acumulativa='PRUEBOTA';
                                        $nivelGlobal=$column['nivel'];
                                        $cuenta_acumulativaGlobal=$column['nombre'];
                                        
                               //     }
                               // } 
                                
                                

				////$dbconec = null;
			
                                
                            //} catch (Exception $e) {

				//echo '<span class="label label-danger label-block">ERROR AL CARGAR LOS DATOS, PRESIONE F5</span>';
			//}
		
                            
                            
                            
                            
                            
                            //ENERO
                            $queryEnero ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.nombre_cuentaacumulativa = Cuentas_acumulativa.nombre
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='JAN' AND librodiario.id_acumulativa= $id_acumulativaGlobal
GROUP BY Librodiario.nombre_cuentaacumulativa, Cuentas_acumulativa.nivel
ORDER BY Cuentas_acumulativa.nivel";  
                            $stmtEnero = $dbconec->prepare($queryEnero);
                            $stmtEnero->execute();
                            $filasEnero = $stmtEnero;
                            if (is_array($filasEnero) || is_object($filasEnero))
                            {
                                foreach ($filasEnero as $row => $column)
                                {
                                    $id_acumulativa=$column['id_a'];
                                   // JCV OK$cuenta_acumulativa='PRUEBOTA';
                                    $nivel=$column['nivel'];
                                    $cuenta_acumulativa=$column['nombre'];
                                    $saldoEnero =$column['SALDITO'];
                                }
                            } 
                            
                            
                            //FEBRERO
                            $queryFebrero ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.nombre_cuentaacumulativa = Cuentas_acumulativa.nombre
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='FEB' AND librodiario.id_acumulativa= $id_acumulativaGlobal
GROUP BY Librodiario.nombre_cuentaacumulativa, Cuentas_acumulativa.nivel
ORDER BY Cuentas_acumulativa.nivel";  
                            $stmtFebrero = $dbconec->prepare($queryFebrero);
                            $stmtFebrero->execute();
                            $filasFebrero = $stmtFebrero;
                            if (is_array($filasFebrero) || is_object($filasFebrero))
                            {
                                foreach ($filasFebrero as $row => $column)
                                {
                                    $id_acumulativa=$column['id_a'];
                                   // JCV OK$cuenta_acumulativa='PRUEBOTA';
                                    $nivel=$column['nivel'];
                                    $cuenta_acumulativa=$column['nombre'];
                                    $saldoFebrero =$column['SALDITO'];
                                }
                            } 
                            
                                                        
                            //MARZO
                            $queryMarzo ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.nombre_cuentaacumulativa = Cuentas_acumulativa.nombre
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='MAR' AND librodiario.id_acumulativa= $id_acumulativaGlobal
GROUP BY Librodiario.nombre_cuentaacumulativa, Cuentas_acumulativa.nivel
ORDER BY Cuentas_acumulativa.nivel";  
                            $stmtMarzo = $dbconec->prepare($queryMarzo);
                            $stmtMarzo->execute();
                            $filasMarzo = $stmtMarzo;
                            if (is_array($filasMarzo) || is_object($filasMarzo))
                            {
                                foreach ($filasMarzo as $row => $column)
                                {
                                    $id_acumulativa=$column['id_a'];
                                   // JCV OK$cuenta_acumulativa='PRUEBOTA';
                                    $nivel=$column['nivel'];
                                    $cuenta_acumulativa=$column['nombre'];
                                    $saldoMarzo =$column['SALDITO'];
                                }
                            } 
                            
                            
                            
                            //ABRIL
                            $queryAbril ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.nombre_cuentaacumulativa = Cuentas_acumulativa.nombre
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='APR' AND librodiario.id_acumulativa= $id_acumulativaGlobal
GROUP BY Librodiario.nombre_cuentaacumulativa, Cuentas_acumulativa.nivel
ORDER BY Cuentas_acumulativa.nivel";  
                            $stmtAbril = $dbconec->prepare($queryAbril);
                            $stmtAbril->execute();
                            $filasAbril = $stmtAbril;
                            if (is_array($filasAbril) || is_object($filasAbril))
                            {
                                foreach ($filasAbril as $row => $column)
                                {
                                    $id_acumulativa=$column['id_a'];
                                   // JCV OK$cuenta_acumulativa='PRUEBOTA';
                                    $nivel=$column['nivel'];
                                    $cuenta_acumulativa=$column['nombre'];
                                    $saldoAbril =$column['SALDITO'];
                                }
                            } 
                            
                            
                            //MAYO
                            $queryMayo ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.nombre_cuentaacumulativa = Cuentas_acumulativa.nombre
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='MAY' AND librodiario.id_acumulativa= $id_acumulativaGlobal
GROUP BY Librodiario.nombre_cuentaacumulativa, Cuentas_acumulativa.nivel
ORDER BY Cuentas_acumulativa.nivel";  
                            $stmtMayo = $dbconec->prepare($queryMayo);
                            $stmtMayo->execute();
                            $filasMayo = $stmtMayo;
                            if (is_array($filasMayo) || is_object($filasMayo))
                            {
                                foreach ($filasMayo as $row => $column)
                                {
                                    $id_acumulativa=$column['id_a'];
                                   // JCV OK$cuenta_acumulativa='PRUEBOTA';
                                    $nivel=$column['nivel'];
                                    $cuenta_acumulativa=$column['nombre'];
                                    $saldoMayo =$column['SALDITO'];
                                }
                            } 
                            
                            
                            
                            //JUNIO
                            $queryJunio ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.nombre_cuentaacumulativa = Cuentas_acumulativa.nombre
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='JUN' AND librodiario.id_acumulativa= $id_acumulativaGlobal
GROUP BY Librodiario.nombre_cuentaacumulativa, Cuentas_acumulativa.nivel
ORDER BY Cuentas_acumulativa.nivel";  
                            $stmtJunio = $dbconec->prepare($queryJunio);
                            $stmtJunio->execute();
                            $filasJunio = $stmtJunio;
                            if (is_array($filasJunio) || is_object($filasJunio))
                            {
                                foreach ($filasJunio as $row => $column)
                                {
                                    $id_acumulativa=$column['id_a'];
                                   // JCV OK$cuenta_acumulativa='PRUEBOTA';
                                    $nivel=$column['nivel'];
                                    $cuenta_acumulativa=$column['nombre'];
                                    $saldoJunio =$column['SALDITO'];
                                }
                            } 
                            
                            
                            //JULIO
                            $queryJulio ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.nombre_cuentaacumulativa = Cuentas_acumulativa.nombre
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='JUL' AND librodiario.id_acumulativa= $id_acumulativaGlobal
GROUP BY Librodiario.nombre_cuentaacumulativa, Cuentas_acumulativa.nivel
ORDER BY Cuentas_acumulativa.nivel";  
                            $stmtJulio = $dbconec->prepare($queryJulio);
                            $stmtJulio->execute();
                            $filasJulio = $stmtJulio;
                            if (is_array($filasJulio) || is_object($filasJulio))
                            {
                                foreach ($filasJulio as $row => $column)
                                {
                                    $id_acumulativa=$column['id_a'];
                                   // JCV OK$cuenta_acumulativa='PRUEBOTA';
                                    $nivel=$column['nivel'];
                                    $cuenta_acumulativa=$column['nombre'];
                                    $saldoJulio =$column['SALDITO'];
                                }
                            } 
                            
                            
                            //AGOSTO
                            $queryAgosto ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.nombre_cuentaacumulativa = Cuentas_acumulativa.nombre
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='AUG' AND librodiario.id_acumulativa= $id_acumulativaGlobal
GROUP BY Librodiario.nombre_cuentaacumulativa, Cuentas_acumulativa.nivel
ORDER BY Cuentas_acumulativa.nivel";  
                            $stmtAgosto = $dbconec->prepare($queryAgosto);
                            $stmtAgosto->execute();
                            $filasAgosto = $stmtAgosto;
                            if (is_array($filasAgosto) || is_object($filasAgosto))
                            {
                                foreach ($filasAgosto as $row => $column)
                                {
                                    $id_acumulativa=$column['id_a'];
                                   // JCV OK$cuenta_acumulativa='PRUEBOTA';
                                    $nivel=$column['nivel'];
                                    $cuenta_acumulativa=$column['nombre'];
                                    $saldoAgosto =$column['SALDITO'];
                                }
                            } 
                            
                            
                            //SEPTIEMBRE
                            $querySeptiembre ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.nombre_cuentaacumulativa = Cuentas_acumulativa.nombre
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='SEP' AND librodiario.id_acumulativa= $id_acumulativaGlobal
GROUP BY Librodiario.nombre_cuentaacumulativa, Cuentas_acumulativa.nivel
ORDER BY Cuentas_acumulativa.nivel";  
                            $stmtSeptiembre = $dbconec->prepare($querySeptiembre);
                            $stmtSeptiembre->execute();
                            $filasSeptiembre = $stmtSeptiembre;
                            if (is_array($filasSeptiembre) || is_object($filasSeptiembre))
                            {
                                foreach ($filasSeptiembre as $row => $column)
                                {
                                    $id_acumulativa=$column['id_a'];
                                   // JCV OK$cuenta_acumulativa='PRUEBOTA';
                                    $nivel=$column['nivel'];
                                    $cuenta_acumulativa=$column['nombre'];
                                    $saldoSeptiembre =$column['SALDITO'];
                                }
                            } 
                            
                            
                            //OCTUBRE
                            $queryOctubre ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.nombre_cuentaacumulativa = Cuentas_acumulativa.nombre
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='OCT' AND librodiario.id_acumulativa= $id_acumulativaGlobal
GROUP BY Librodiario.nombre_cuentaacumulativa, Cuentas_acumulativa.nivel
ORDER BY Cuentas_acumulativa.nivel";  
                            $stmtOctubre = $dbconec->prepare($queryOctubre);
                            $stmtOctubre->execute();
                            $filasOctubre = $stmtOctubre;
                            if (is_array($filasOctubre) || is_object($filasOctubre))
                            {
                                foreach ($filasOctubre as $row => $column)
                                {
                                    $id_acumulativa=$column['id_a'];
                                   // JCV OK$cuenta_acumulativa='PRUEBOTA';
                                    $nivel=$column['nivel'];
                                    $cuenta_acumulativa=$column['nombre'];
                                    $saldoOctubre =$column['SALDITO'];
                                }
                            } 
                            
                           
                            //NOVIEMBRE
                            $queryNoviembre ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.nombre_cuentaacumulativa = Cuentas_acumulativa.nombre
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='NOV' AND librodiario.id_acumulativa= $id_acumulativaGlobal
GROUP BY Librodiario.nombre_cuentaacumulativa, Cuentas_acumulativa.nivel
ORDER BY Cuentas_acumulativa.nivel";  
                            $stmtNoviembre = $dbconec->prepare($queryNoviembre);
                            $stmtNoviembre->execute();
                            $filasNoviembre = $stmtNoviembre;
                            if (is_array($filasNoviembre) || is_object($filasNoviembre))
                            {
                                foreach ($filasNoviembre as $row => $column)
                                {
                                    $id_acumulativa=$column['id_a'];
                                   // JCV OK$cuenta_acumulativa='PRUEBOTA';
                                    $nivel=$column['nivel'];
                                    $cuenta_acumulativa=$column['nombre'];
                                    $saldoNoviembre =$column['SALDITO'];
                                }
                            } 
                            
                            
                            //DICIEMBRE
                            $queryDiciembre ="SELECT librodiario.id_acumulativa as id_a, Librodiario.nombre_cuentaacumulativa as nombre, Cuentas_acumulativa.nivel as nivel, sum(Librodiario.ingreso-Librodiario.egreso) as SALDITO
FROM Librodiario INNER JOIN Cuentas_acumulativa ON Librodiario.nombre_cuentaacumulativa = Cuentas_acumulativa.nombre
WHERE YEAR(fecha) = YEAR(CURDATE()) AND Librodiario.estado = 1 AND UCASE(DATE_FORMAT(fecha,'%b'))='DEC' AND librodiario.id_acumulativa= $id_acumulativaGlobal
GROUP BY Librodiario.nombre_cuentaacumulativa, Cuentas_acumulativa.nivel
ORDER BY Cuentas_acumulativa.nivel";  
                            $stmtDiciembre = $dbconec->prepare($queryDiciembre);
                            $stmtDiciembre->execute();
                            $filasDiciembre = $stmtDiciembre;
                            if (is_array($filasDiciembre) || is_object($filasDiciembre))
                            {
                                foreach ($filasDiciembre as $row => $column)
                                {
                                    $id_acumulativa=$column['id_a'];
                                   // JCV OK$cuenta_acumulativa='PRUEBOTA';
                                    $nivel=$column['nivel'];
                                    $cuenta_acumulativa=$column['nombre'];
                                    $saldoDiciembre =$column['SALDITO'];
                                }
                            } 
                            
                            
                            //$id_acumulativa=99;
                            //$cuenta_acumulativa='PRUEBITA';
                                
                                //JCV PARA BORRAR LA TABLA
                                
                                
                                //JCV PARA INSERTAR TODOS LOS DATOS EN LA TABLA flujo_de_efectivo:
                                $query = "INSERT INTO flujo_de_efectivo(id_acumulativa, nombre_atributo, cuenta_acumulativa, nivel, enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre) values(:id_acumulativa, :nombre_atributo, :cuenta_acumulativa, :nivel, :enero, :febrero, :marzo, :abril, :mayo, :junio, :julio, :agosto, :septiembre, :octubre, :noviembre, :diciembre)";
				
                                /*: son los campos $ son los parametros de la funcion que vienen del formulario*/                                
                                $stmt = $dbconec->prepare($query);
				//$stmt->bindParam(":id_acumulativa",$id_acumulativa);
                                //$stmt->bindParam(":cuenta_acumulativa",$cuenta_acumulativa);
                                //$stmt->bindParam(":nivel",$nivel);
                                $stmt->bindParam(":id_acumulativa",$id_acumulativaGlobal);
                                $stmt->bindParam(":nombre_atributo",$nombre_atributoGlobal);
                                $stmt->bindParam(":cuenta_acumulativa",$cuenta_acumulativaGlobal);
                                $stmt->bindParam(":nivel",$nivelGlobal);
                                $stmt->bindParam(":enero",$saldoEnero);
                                $stmt->bindParam(":febrero",$saldoFebrero);
                                $stmt->bindParam(":marzo",$saldoMarzo);
                                $stmt->bindParam(":abril",$saldoAbril);
                                $stmt->bindParam(":mayo",$saldoMayo);
                                $stmt->bindParam(":junio",$saldoJunio);
                                $stmt->bindParam(":julio",$saldoJulio);
                                $stmt->bindParam(":agosto",$saldoAgosto);
                                $stmt->bindParam(":septiembre",$saldoSeptiembre);
                                $stmt->bindParam(":octubre",$saldoOctubre);
                                $stmt->bindParam(":noviembre",$saldoNoviembre);
                                $stmt->bindParam(":diciembre",$saldoDiciembre);
				
                               
				if($stmt->execute())
				{   
                                        
					$count = $stmt->rowCount();
					if($count == 0){
						//$data = "Duplicado";
 	   					//echo json_encode($data);
					} else {
                                                $cuantosinserto=$cuantosinserto+1;
						//$data = "Validado";
 	   					//echo json_encode($data);
					}
				} else {

					$data = "Error";
 	   		 	 	echo json_encode($data);
				}
				//$dbconec = null;
                                
                                
                                
                        } //JCV DEL FOR EACH PARA TODAS LAS CUENTAS
                        
                        /*JCV PARA PROBAR SI FUNCIONA if($cuantosinserto>0){
                            $data = "Validado";
                            echo json_encode($data);
                        }*/
                        
                        $dbconec = null;
                        
                    } // JCV DEL IF
                                
                                
                                
			} catch (Exception $e) {
				$data = "Error";
				echo json_encode($data);

			}

		}
                
                
                
                
                public function Listar_Conceptos_Reporte_cxc()
		{
			$dbconec = Conexion::Conectar();

			try
			{
				$query = "SELECT * FROM reportes_cxc_conceptos  ;";
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
