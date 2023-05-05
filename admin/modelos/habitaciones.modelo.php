<?php

require_once "conexion.php";

class ModeloHabitaciones{

	/*=============================================
	MOSTRAR CATEGORIAS-HABITACIONES CON INNER JOIN
	=============================================*/

	static public function mdlMostrarHabitaciones($tabla1, $valor){

		if($valor != null){

			$stmt = Conexion::conectar()->prepare("SELECT $tabla1.* FROM $tabla1  WHERE $tabla1.id_h = :id_h");
			
			$stmt -> bindParam(":id_h", $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT $tabla1.* FROM $tabla1 ORDER BY $tabla1.id_h DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	Nueva habitación
	=============================================*/

	static public function mdlNuevaHabitacion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(estilo, galeria, video, descripcion_h) VALUES (:estilo, :galeria, :video, :descripcion_h)");

		$stmt->bindParam(":estilo", $datos["estilo"], PDO::PARAM_STR);
		$stmt->bindParam(":galeria", $datos["galeria"], PDO::PARAM_STR);
		$stmt->bindParam(":video", $datos["video"], PDO::PARAM_STR);		
		$stmt->bindParam(":descripcion_h", $datos["descripcion_h"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	Editar habitación
	=============================================*/

	static public function mdlEditarHabitacion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estilo = :estilo, galeria = :galeria, video = :video, descripcion_h = :descripcion_h WHERE id_h = :id_h");

		$stmt->bindParam(":id_h", $datos["id_h"], PDO::PARAM_STR);
		$stmt->bindParam(":estilo", $datos["estilo"], PDO::PARAM_STR);
		$stmt->bindParam(":galeria", $datos["galeria"], PDO::PARAM_STR);
		$stmt->bindParam(":video", $datos["video"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion_h", $datos["descripcion_h"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	Eliminar habitacion
	=============================================*/

	static public function mdlEliminarHabitacion($tabla, $id){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_h = :id_h");

		$stmt -> bindParam(":id_h", $id, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());

		}

		$stmt -> close();

		$stmt = null;

	}

}