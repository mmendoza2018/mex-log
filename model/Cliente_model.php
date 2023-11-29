<?php

	require_once('Conexion.php');

	class ClienteModel extends Conexion
	{
		public function Listar_Clientes()
		{
			$dbconec = Conexion::Conectar();

			try
			{
                                /*
				$query = "CALL sp_view_Cliente();";
                                */
                                $query = "SELECT * FROM cliente;";
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

		public function Listar_Clientes_Activos()
		{
			$dbconec = Conexion::Conectar();

			try
			{
				//$query = "CALL sp_view_cliente_activo();";
                                $query = "SELECT * FROM cliente where estado=1;";
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

		public function Listar_Clientes_Inactivos()
		{
			$dbconec = Conexion::Conectar();

			try
			{
				//$query = "CALL sp_view_cliente_inactivo();";
                                $query = "SELECT * FROM cliente where estado=0;";
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


		public function Insertar_Cliente($nombre_cliente, $telefono_cliente, $rfc, $direccion,
		$numero_telefono, $email, $direccion_entrega1, $direccion_entrega2, $encargado, $celular_encargado, $fecha_nacimiento)
		{
			$dbconec = Conexion::Conectar();
			try
			{
				//$query = "CALL sp_insert_cliente(:nombre_cliente, :telefono_cliente, :rfc,
				//:direccion, :numero_telefono, :email, :giro, :limite_credito)";
                                
                                /*$query = "INSERT INTO librodiario(fecha, nombre_cuentaderegistro, ingreso,
				egreso, saldo, observaciones, nombre_cuentaacumulativa, nombre_cuentadebanco, id_deregistroR, id_debancosL, naturalezaL, id_acumulativa) values(:fecha, :nombre_cuentaderegistro, :ingreso,
				:egreso, :saldo, :observaciones, :nombre_cuentaacumulativa, :nombre_cuentadebanco, :id_deregistroR, :id_debancosL, :naturalezaL, :id_acumulativa)";
				*/
                                
                                $query = "INSERT INTO cliente(nombre_cliente, telefono_cliente, rfc, direccion_cliente, numero_telefono, email, direccion_entrega1, direccion_entrega2, encargado, celular_encargado, fecha_nacimiento) values(:nombre_cliente, :telefono_cliente, :rfc,
				:direccion, :numero_telefono, :email, :direccion_entrega1, :direccion_entrega2, :encargado, :celular_encargado, :fecha_nacimiento)";
				$stmt = $dbconec->prepare($query);
				$stmt->bindParam(":nombre_cliente",$nombre_cliente);
				$stmt->bindParam(":telefono_cliente",$telefono_cliente);
				$stmt->bindParam(":rfc",$rfc);
				$stmt->bindParam(":direccion",$direccion);
				$stmt->bindParam(":numero_telefono",$numero_telefono);
				$stmt->bindParam(":email",$email);
				$stmt->bindParam(":direccion_entrega1",$direccion_entrega1);
                                $stmt->bindParam(":direccion_entrega2",$direccion_entrega2);
                                $stmt->bindParam(":encargado",$encargado);
                                $stmt->bindParam(":celular_encargado",$celular_encargado);
                                $stmt->bindParam(":fecha_nacimiento",$fecha_nacimiento);
				//$stmt->bindParam(":limite_credito",$limite_credito);

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

                               
                
		public function Editar_Cliente($idcliente, $nombre_cliente, $telefono_cliente, $rfc, $direccion,
		$numero_telefono, $email, $direccion_entrega1, $direccion_entrega2, $encargado, $celular_encargado, $fecha_nacimiento, $estado)
		{
			$dbconec = Conexion::Conectar();
			try
			{/*
				$query = "CALL sp_update_cliente(:idcliente, :nombre_cliente, :telefono_cliente, :rfc,
				:direccion, :numero_telefono, :email, :giro, :limite_credito, :estado);";
                           */   
                                $query="UPDATE cliente SET  nombre_cliente = '$nombre_cliente', telefono_cliente = '$telefono_cliente',
rfc = '$rfc', direccion_cliente = '$direccion', numero_telefono = '$numero_telefono', email = '$email', direccion_entrega1 = '$direccion_entrega1', direccion_entrega2 = '$direccion_entrega2', encargado = '$encargado', celular_encargado = '$celular_encargado', fecha_nacimiento = '$fecha_nacimiento', estado = '$estado' where idcliente ='$idcliente';";  
                             
                                $stmt = $dbconec->prepare($query);
				$stmt->bindParam(":idcliente",$idcliente);
				$stmt->bindParam(":nombre_cliente",$nombre_cliente);
				$stmt->bindParam(":telefono_cliente",$telefono_cliente);
				$stmt->bindParam(":rfc",$rfc);
				$stmt->bindParam(":direccion_cliente",$direccion);
				$stmt->bindParam(":numero_telefono",$numero_telefono);
				$stmt->bindParam(":email",$email);
				$stmt->bindParam(":direccion_entrega1",$direccion_entrega1);
                                $stmt->bindParam(":direccion_entrega2",$direccion_entrega2);
                                $stmt->bindParam(":encargado",$encargado);
                                $stmt->bindParam(":celular_encargado",$celular_encargado);
                                $stmt->bindParam(":fecha_nacimiento",$fecha_nacimiento);
				//$stmt->bindParam(":limite_credito",$limite_credito);
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

	}


 ?>
