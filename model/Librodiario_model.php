<?php

	require_once('Conexion.php');

	class LibrodiarioModel extends Conexion
	{
		public function Listar_Librodiario()
		{
			$dbconec = Conexion::Conectar();

			try
			{
				/*JCV ORIG $query = "CALL sp_view_Cliente();";  */
				/*$query = "SELECT * FROM cuentasbancos;";*/
                                /*$query = "SELECT * FROM cuentasprueba;";*/
                                $query = "SELECT * FROM librodiario;";
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

                
                public function Listar_LibrodiarioBancos($id_debancosL,$fecha1,$fecha2,$estado,$vacio) 
		{
			$dbconec = Conexion::Conectar();
// no es de aqui, BORRAR	SELECT * FROM view_ventas WHERE fecha_venta BETWEEN p_date AND p_date2
			try
			{
				/*JCV ORIG $query = "CALL sp_view_Cliente();";  */
				/*$query = "SELECT * FROM cuentasbancos;";*/
                                /*$query = "SELECT * FROM cuentasprueba;";*/
                                
                            //$date1 = date("Y-m-d", strtotime($fecha1));
                            //$date2 = date("Y-m-d", strtotime($fecha2));
                            
                            
                                if($id_debancosL==0){ //JCV ESTE IF ES POR SI ES PARA TODAS LAS CUENTAS
                                    //JCV SI FUNCIONA ORIGINAL $query = "SELECT * FROM librodiario;";
                                    
                                    if($vacio==0){
                                        $query = "SELECT * FROM librodiario where fecha BETWEEN '$fecha1' AND '$fecha2' AND estado = $estado; ";
                                    }else{
                                        // jcv ok $query = "SELECT * FROM librodiario WHERE estado = $estado;";
                                        $query = "SELECT * FROM librodiario WHERE estado = $estado;";
                                    }
                                } else{
                                    // JCV SI FUNCIONA ORIGINAL:  
                                   // $query = "SELECT * FROM librodiario where id_debancosL=$id_debancosL;";
                                    
                                    //CON date1 y date2
                                    // OK CON FECHAS UN POCO LENTA LA CONSULTA $query = "SELECT * FROM librodiario where fecha BETWEEN '$date1' AND '$date2' AND id_debancosL = $id_debancosL AND estado = $estado; ";
                                    
                                    //jcv con fecha1 y fecha 2
                                    $query = "SELECT * FROM librodiario where fecha BETWEEN '$fecha1' AND '$fecha2' AND id_debancosL = $id_debancosL AND estado = $estado; ";
                                    
                                    
                                    
                                }
                                
                                $stmt = $dbconec->prepare($query);
                                //$stmt->bindParam(":id_debancosL",$id_debancosL);  //no hay parametros, ES CONSULTA DIRECTA
                                //$stmt->bindParam(":estado",$estado);
                                //$stmt->bindParam(":fecha1",$fecha1);
                                //$stmt->bindParam(":fecha2",$fecha2);
                                
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
                
                
                
		public function Listar_Librodiario_Activos()
		{
			$dbconec = Conexion::Conectar();

			try
			{
				/*JCV ORIGIN OK $query = "CALL sp_view_cliente_activo();";*/
                                /*$query = "SELECT * FROM cuentasprueba WHERE estado =1;";*/
                                $query = "SELECT * FROM librodiario WHERE estado =1;";
                                
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

		public function Listar_Librodiario_Inactivos()
		{
			$dbconec = Conexion::Conectar();

			try
			{
				/* JCV ORIGINAL $query = "CALL sp_view_cliente_inactivo();";*/
                                $query = "SELECT * FROM librodiario WHERE estado =0;";
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

		public function Ver_Limite_Credito($idcliente){

			$dbconec = Conexion::Conectar();
			try {

				$query = "CALL sp_view_limite_credito(:idcliente)";
				$stmt = $dbconec->prepare($query);
				$stmt->bindParam(":idcliente",$idcliente);
				$stmt->execute();
				$Data = array();

				while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
						$Data[] = $row;
				}

				// header('Content-type: application/json');
				 echo json_encode($Data);

			} catch (Exception $e) {

				echo "Error al cargar el listado";
			}

		}


		public function Insertar_Librodiario($fecha, $nombre_cuentaderegistro, $ingreso, 
		$egreso, $saldo, $observaciones, $nombre_cuentaacumulativa, $nombre_cuentadebanco, $id_deregistroR, $id_debancosL, $naturalezaL, $id_acumulativa)
		{
			$dbconec = Conexion::Conectar();
			try
			{
				/*$query = "CALL sp_insert_cliente(:nombre_cliente, :numero_nit, :numero_nrc,
				:direccion, :numero_telefono, :email, :giro, :limite_credito)";*/
                                
                                /*$query = "INSERT INTO cuentasbancos(nombre_cliente, numero_nit, numero_nrc,
				direccion_cliente, numero_telefono, email, giro, limite_credito) values(:nombre_cliente, :numero_nit, :numero_nrc,
				:direccion_cliente, :numero_telefono, :email, :giro, :limite_credito)";*/
                                
                                
                                /*JCV OK $query = "INSERT INTO cuentasprueba(fecha, concepto, ingreso,
				direccion, egreso, saldo, observaciones, cuenta) values(:fecha, :concepto, :ingreso,
				:direccion_cliente, :egreso, :saldo, :observaciones, :cuenta)";*/
                                
                                $query = "INSERT INTO librodiario(fecha, nombre_cuentaderegistro, ingreso,
				egreso, saldo, observaciones, nombre_cuentaacumulativa, nombre_cuentadebanco, id_deregistroR, id_debancosL, naturalezaL, id_acumulativa) values(:fecha, :nombre_cuentaderegistro, :ingreso,
				:egreso, :saldo, :observaciones, :nombre_cuentaacumulativa, :nombre_cuentadebanco, :id_deregistroR, :id_debancosL, :naturalezaL, :id_acumulativa)";
				
                                /*: son los campos $ son los parametros de la funcion que vienen del formulario*/                                
                                $stmt = $dbconec->prepare($query);
				$stmt->bindParam(":fecha",$fecha);
				$stmt->bindParam(":nombre_cuentaderegistro",$nombre_cuentaderegistro);
				$stmt->bindParam(":ingreso",$ingreso);
				/*$stmt->bindParam(":direccion_cliente",$direccion);*/
				$stmt->bindParam(":egreso",$egreso);
				$stmt->bindParam(":saldo",$saldo);
				$stmt->bindParam(":observaciones",$observaciones);
				$stmt->bindParam(":nombre_cuentaacumulativa",$nombre_cuentaacumulativa);
                                $stmt->bindParam(":nombre_cuentadebanco",$nombre_cuentadebanco);
                                $stmt->bindParam(":id_deregistroR",$id_deregistroR);
                                $stmt->bindParam(":id_debancosL",$id_debancosL);
                                $stmt->bindParam(":naturalezaL",$naturalezaL);
                                 $stmt->bindParam(":id_acumulativa",$id_acumulativa);

				if($stmt->execute())
				{
					$count = $stmt->rowCount();
					if($count == 0){
						$data = "Duplicado";
 	   					echo json_encode($data);
					} else {
						$data = "Validado";
 	   					echo json_encode($data);
					}
				} else {

					$data = "Error";
 	   		 	 	echo json_encode($data);
				}
				$dbconec = null;
			} catch (Exception $e) {
				$data = "Error";
				echo json_encode($data);

			}

		}

                
                
                /*JCV PARA BORRAR*/
                
                public function Borrar_Librodiario($id_librodiario)
		{
			$dbconec = Conexion::Conectar();
			$response = array();
			try
			{
				/* $query = "CALL sp_delete_cotizacion(:idcliente)";*/
                                
                                /*$query = "DELETE from cuentasbancos where idcliente = '$idcliente';";*/
                                
                                /*jcv ok$query = "DELETE from cuentasprueba where idcliente = '$idcliente';";*/
                                $query = "DELETE from librodiario where id_librodiario = '$id_librodiario';";
				$stmt = $dbconec->prepare($query);
				$stmt->bindParam(":id_librodiario",$id_librodiario);

				if($stmt->execute())
				{
					$response['status']  = 'success';
					$response['message'] = 'Movimiento Eliminado Correctamente!';
				} else {

					$response['status']  = 'error';
					$response['message'] = 'No pudimos eliminar la cuenta!';
				}
				echo json_encode($response);
				$dbconec = null;
			} catch (Exception $e) {
				$response['status']  = 'error';
				$response['message'] = 'Error de Ejecucion';
				echo json_encode($response);

			}

		}
                
                
                
		public function Editar_Librodiario($id_librodiario, $fecha, $nombre_cuentaderegistro, $ingreso, 
		$egreso, $saldo, $observaciones, $nombre_cuentaacumulativa, $nombre_cuentadebanco, $id_deregistroR, $id_debancosL, $naturalezaL, $id_acumulativa, $estado)
		{
                    /*$dbconec->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );*/
			$dbconec = Conexion::Conectar();
			try
			{
				/*$query = "CALL sp_update_cliente(:idcliente, :nombre_cliente, :numero_nit, :numero_nrc,
				:direccion, :numero_telefono, :email, :giro, :limite_credito, :estado);";*/
                            
                            /*$query="UPDATE cuentasbancos SET  nombre_cliente = '$nombre_cliente', numero_nit = '$numero_nit', numero_nrc = '$numero_nrc',
direccion_cliente = '$direccion', numero_telefono = '$numero_telefono', email = '$email', giro = '$giro', limite_credito = '$limite_credito',
estado = '$estado' where idcliente='$idcliente';";  */
                            
                            /* jcv ok$query="UPDATE cuentasprueba SET  fecha = '$fecha', concepto = '$concepto', ingreso = '$ingreso',
direccion = '$direccion', egreso = '$egreso', saldo = '$saldo', observaciones = '$observaciones', cuenta = '$cuenta',
estado = '$estado' where idcliente='$idcliente';";  */
                            
                            $query="UPDATE librodiario SET  fecha = '$fecha', nombre_cuentaderegistro = '$nombre_cuentaderegistro', ingreso = '$ingreso',
egreso = '$egreso', saldo = '$saldo', observaciones = '$observaciones', nombre_cuentaacumulativa = '$nombre_cuentaacumulativa', nombre_cuentadebanco = '$nombre_cuentadebanco', id_deregistroR = '$id_deregistroR', id_debancosL = '$id_debancosL', naturalezaL = '$naturalezaL', id_acumulativa = '$id_acumulativa', estado = '$estado' where id_librodiario='$id_librodiario';";  
                            

                               /* $query = "update cuentasbancos (set :idcliente=$idcliente, :nombre_cliente=$nombre_cliente, :numero_nit=$numero_nit, :numero_nrc=$numero_nrc,
				:direccion_cliente=$direccion, :numero_telefono=$numero_telefono, :email=$email, :giro=$giro, :limite_credito=$limite_credito, :estado=$estado);";
                                 */                                                             
				$stmt = $dbconec->prepare($query);
				$stmt->bindParam(":id_librodiario",$id_librodiario);
				$stmt->bindParam(":fecha",$fecha);
				$stmt->bindParam(":nombre_cuentaderegistro",$nombre_cuentaderegistro);
				$stmt->bindParam(":ingreso",$ingreso);
				$stmt->bindParam(":egreso",$egreso);
				$stmt->bindParam(":saldo",$saldo);
				$stmt->bindParam(":observaciones",$observaciones);
				$stmt->bindParam(":nombre_cuentaacumulativa",$nombre_cuentaacumulativa);
                                $stmt->bindParam(":nombre_cuentadebanco",$nombre_cuentadebanco);
                                $stmt->bindParam(":id_deregistroR",$id_deregistroR);
				$stmt->bindParam(":id_debancosL",$id_debancosL);
                                $stmt->bindParam(":naturalezaL",$naturalezaL);
                                $stmt->bindParam(":id_acumulativa",$id_acumulativa);
                                $stmt->bindParam(":estado",$estado);


				if($stmt->execute())
				{

				  $data = "Validado";
   				  echo json_encode($data);

				} else {

					$data = "Error";
 	   		 	 	echo json_encode($data);
				}
				$dbconec = null;
			} catch (Exception $e) {
				$data = "Error";
				echo json_encode($data);

			}

		}
                
                
                
                //JCV EJEMPLO PARA LLENAR COMBOBOX
                public function Listar_Deregistro()
		{
			$dbconec = Conexion::Conectar();

			try
			{
				/*$query = "CALL sp_view_categoria_activa();"; JCV ORIG*/
                                $query = "SELECT id_deregistro, codigo_deregistro, nombre, nivel, nombre_acumulativa, naturaleza, estado FROM cuentas_deregistro WHERE estado=1;";
                                
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
                
                
                
                
                public function Listar_Debancos()
		{
			$dbconec = Conexion::Conectar();

			try
			{
				/*$query = "CALL sp_view_categoria_activa();"; JCV ORIG*/
                                $query = "SELECT id_debancos, codigo_debancos, nombre, saldo, estado FROM cuentas_debancos WHERE estado=1;";
                                
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
