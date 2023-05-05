<?php

require_once "conexion.php";

Class ModeloHabitaciones{

	/*=============================================
	Mostrar todas las habitaciones
	=============================================*/


	static public function mdlMostrarHabitaciones($tabla1){


		$stmt = Conexion::conectar()->prepare("SELECT $tabla1.* FROM $tabla1  ORDER BY $tabla1.Id_h DESC");
			
		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	Mostrar Habitacion Singular
	=============================================*/

	static public function mdlMostrarHabitacion($tabla, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_h = :id_h");

		$stmt -> bindParam(":id_h", $valor, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;
	
	}

	/*=============================================
	Mostrar todas las habitaciones
	=============================================*/

	static public function mdlMostrarHabitacionestotal($tabla1, $tabla2){

		$stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.* FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id = $tabla2.tipo_h  ORDER BY $tabla2.Id_h DESC" );
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}


}