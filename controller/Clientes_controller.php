<?php

	class Cliente {

		public static function Listar_Clientes(){

			$filas = Clientes::ListarClientes();
			return $filas;

		}

	}


 ?>
