<?php

require_once('Conexion.php');

class EnvioProveedor extends Conexion
{
  public function Insertar_Cliente(
    $numero_guia,
    $fecha_envio,
    $fecha_entrega,
    $direccion,
    $telefono,
    $medidas,
    $precio,
    $seguro
  ) {
    $dbconec = Conexion::Conectar();
    try {

      $query = "INSERT INTO log_registros (
                                            numero_guia,	
                                            fecha_envio,		
                                            fecha_entrega,		
                                            direccion,		
                                            telefono,	
                                            medidas,		
                                            precio,		
                                            seguro
                                            ) 
                                            values
                                            (                                   
                                            :numero_guia,	
                                            :fecha_envio,		
                                            :fecha_entrega,		
                                            :direccion,		
                                            :telefono,	
                                            :medidas,		
                                            :precio,		
                                            :seguro
                                          )";

      /*: son los campos $ son los parametros de la funcion que vienen del formulario*/
      $stmt = $dbconec->prepare($query);

      $stmt->bindParam(":numero_guia", $numero_guia);
      $stmt->bindParam(":fecha_envio", $fecha_envio);
      $stmt->bindParam(":fecha_entrega", $fecha_entrega);
      $stmt->bindParam(":direccion", $direccion);
      $stmt->bindParam(":telefono", $telefono);
      $stmt->bindParam(":medidas", $medidas);
      $stmt->bindParam(":precio", $precio);
      $stmt->bindParam(":seguro", $seguro);

      if ($stmt->execute()) {
        $count = $stmt->rowCount();
        if ($count == 0) {
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

  public function Editar($idOrdenCompra)
  {
    $dbconec = Conexion::Conectar();

    try {
      $query = "SELECT * FROM detalle_fact_compra df INNER JOIN productos p ON df.id_producto = p.id_producto";
      $query .= " WHERE id_factura = $idOrdenCompra";

      $stmt = $dbconec->prepare($query);
      $stmt->execute();
      $stmt->rowCount();

      return $stmt->fetchAll();

      $dbconec = null;
    } catch (Exception $e) {
      return false;
    }
  }
}
