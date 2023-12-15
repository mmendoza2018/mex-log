<?php

require_once('Conexion.php');

class VentaOrdenModel extends Conexion
{

  public static function ListarVentasOrden($idVenta = false)
  {
    $dbconec = Conexion::Conectar();

    try {

      $query = "SELECT * FROM facturas_ventas fv ";
      $query .= "LEFT JOIN clientes c ON fv.id_cliente = c.id_cliente ";
      $query .= "LEFT JOIN users u ON fv.id_vendedor=u.id_users ";
      
      if ($idVenta) {
        $query .= "WHERE id_factura = $idVenta";
      }

      $stmt = $dbconec->prepare($query);
      $stmt->execute();
      $count = $stmt->rowCount();

      if ($count > 0) {
        return $stmt->fetchAll();
      }

      $dbconec = null;
    } catch (Exception $e) {
      return false;
    }
  }

}
