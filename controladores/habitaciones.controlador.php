<?php

class ControladorHabitaciones
{


	/*=============================================
	MOSTRAR CATEGORIAS-HABITACIONES CON INNER JOIN
	=============================================*/

	static public function ctrMostrarHabitaciones($valor)
	{
		$tabla1 = "habitaciones";
		$respuesta = ModeloHabitaciones::mdlMostrarHabitaciones($tabla1, $valor);
		return $respuesta;
	}

	/*=============================================
	Mostrar Habitación Singular
	=============================================*/

	// static public function ctrMostrarHabitacion($valor){

	// 	$tabla = "habitaciones";

	// 	$respuesta = ModeloHabitaciones::mdlMostrarHabitacion($tabla, $valor);

	// 	return $respuesta;

	// }

	/*=============================================
	Mostrar Habitaciónes totales
	=============================================*/

	// static public function ctrMostrarHabitacionesTotal(){
	// 	$tabla1 = "categorias";
	// 	$tabla2 = "habitaciones";
	// 	$respuesta = ModeloHabitaciones::mdlMostrarHabitacionestotal($tabla1,$tabla2);
	// 	return $respuesta;
	// }

}
