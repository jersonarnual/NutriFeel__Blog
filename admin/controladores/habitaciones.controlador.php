<?php

class ControladorHabitaciones{

	/*=============================================
	MOSTRAR CATEGORIAS-HABITACIONES CON INNER JOIN
	=============================================*/

	static public function ctrMostrarHabitaciones($valor){

		$tabla1 = "habitaciones";

		$respuesta = ModeloHabitaciones::mdlMostrarHabitaciones($tabla1, $valor);

		return $respuesta;

	}

	/*=============================================
	Nueva habitación
	=============================================*/

	static public function ctrNuevaHabitacion($datos){

		if( preg_match('/^[\/\=\\&\\$\\;\\_\\|\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $datos["descripcion"])){

		   	if($datos["galeria"] != ""){

			   	$ruta = array();
			   	$guardarRuta = array();

				$galeria = json_decode($datos["galeria"], true);

				for($i = 0; $i < count($galeria); $i++){

					list($ancho, $alto) = getimagesize($galeria[$i]);

					$nuevoAncho = 940;
					$nuevoAlto = 480;

					/*=============================================
					Creamos el directorio donde vamos a guardar la imagen
					=============================================*/

					// $directorio = "../vistas/img/noticias";	
					$directorio = "../vistas/img/noticias";
					$archivos = scandir($directorio);
					$cantidad_imagenes = 0;
					
					foreach ($archivos as $archivo) {
						$extension = pathinfo($archivo, PATHINFO_EXTENSION);
						if (in_array($extension, array("jpg", "jpeg", "png", "gif"))) {
							$cantidad_imagenes++;
						}
					}

					array_push($ruta, strtolower($directorio."/".$cantidad_imagenes + 1 .($i+1).".jpg"));

					$origen = imagecreatefromjpeg($galeria[$i]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $ruta[$i]);	

					array_push($guardarRuta, substr($ruta[$i], 3));

				}


			}else{

				echo'<script>

						swal({
								type:"error",
							  	title: "¡CORREGIR!",
							  	text: "¡La galería no puede estar vacía",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
						}).then(function(result){

								if(result.value){   
								    history.back();
								  } 
						});

				</script>';

				return;
			}

			$tabla = "habitaciones";

			$datos = array(	"estilo" => $datos["estilo"],
							"galeria" => json_encode($guardarRuta),
							"video" => $datos["video"],
							"descripcion_h" => $datos["descripcion"]);

			$respuesta = ModeloHabitaciones::mdlNuevaHabitacion($tabla, $datos);

			return $respuesta; 

		}else{

			echo '<script>

					swal({

						type:"error",
						title: "¡CORREGIR!",
						text: "¡No se permiten caracteres especiales en ninguno de los campos!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){

							history.back();

						}

					});	

				</script>';
		}


	}

	/*=============================================
	Editar habitación
	=============================================*/

	static public function ctrEditarHabitacion($datos){

		if(preg_match('/^[\/\=\\&\\$\\;\\_\\-\\|\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $datos["descripcion"])
		   ){
		   	
			//Validamos que la galería no venga vacía

		   	if($datos["galeriaAntigua"] == "" && $datos["galeria"] == ""){

				echo'<script>

						swal({
								type:"error",
							  	title: "¡CORREGIR!",
							  	text: "¡La galería no puede estar vacía",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
						}).then(function(result){

								if(result.value){   
								    history.back();
								  } 
						});

				</script>';

				return;
			}

			$traerHabitacion = ModeloHabitaciones::mdlMostrarHabitaciones("habitaciones", $datos["idHabitacion"]);

			if($datos["galeriaAntigua"] != ""){	

				$galeriaBD = json_decode($traerHabitacion["galeria"], true);

				$galeriaAntigua = explode("," , $datos["galeriaAntigua"]);

				$guardarRuta = $galeriaAntigua;
		
				$borrarFoto = array_diff($galeriaBD, $galeriaAntigua);

				foreach ($borrarFoto as $key => $valueFoto){
						
					unlink("../".$valueFoto);

				}

			}else{


				$galeriaBD = json_decode($traerHabitacion["galeria"], true);

				foreach ($galeriaBD as $key => $valueFoto){

					unlink("../".$valueFoto);

				}

				
			}
		   	
		   	// Cuando vienen fotos nuevas

		   	if($datos["galeria"] != ""){

			   	$ruta = array();
			   	$guardarRuta = array();
				

				$galeria = json_decode($datos["galeria"], true);
				$galeriaAntigua = explode("," , $datos["galeriaAntigua"]);

				for($i = 0; $i < count($galeria); $i++){

					list($ancho, $alto) = getimagesize($galeria[$i]);

					$nuevoAncho = 940;
					$nuevoAlto = 480;

					$aleatorio = mt_rand(100,999); 

					/*=============================================
					Creamos el directorio donde vamos a guardar la imagen
					=============================================*/

					// $directorio = "../vistas/img/noticias";	
					$directorio = "../vistas/img/noticias";
					$archivos = scandir($directorio);
					$cantidad_imagenes = 0;
					
					foreach ($archivos as $archivo) {
						$extension = pathinfo($archivo, PATHINFO_EXTENSION);
						if (in_array($extension, array("jpg", "jpeg", "png", "gif"))) {
							$cantidad_imagenes++;
						}
					}

					array_push($ruta, strtolower($directorio."/".$cantidad_imagenes + 1 .$aleatorio.".jpg"));

					$origen = imagecreatefromjpeg($galeria[$i]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $ruta[$i]);	

					array_push($guardarRuta, substr($ruta[$i], 3));

				}

				// Agregamos las fotos antiguas

				if($datos["galeriaAntigua"] != ""){

					foreach ($galeriaAntigua as $key => $value) {
						
						array_push($guardarRuta, $value);
					}

				}

			}

			$tabla = "habitaciones";

			$datos = array("id_h" => $datos["idHabitacion"],
						   "estilo" => $datos["estilo"],
						   "galeria" => json_encode($guardarRuta),
						   "video" => $datos["video"],
						   "descripcion_h" => $datos["descripcion"]);

			$respuesta = ModeloHabitaciones::mdlEditarHabitacion($tabla, $datos);

			return $respuesta; 

		}else{

			echo '<script>

					swal({

						type:"error",
						title: "¡CORREGIR!",
						text: "¡No se permiten caracteres especiales en ninguno de los campos!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){

							history.back();

						}

					});	

				</script>';
		}


	}

	/*=============================================
	Eliminar Habitación
	=============================================*/

	static public function ctrEliminarHabitacion($datos){
		
		// Eliminamos fotos de la galería

		$galeriaHabitacion = explode("," , $datos["galeriaHabitacion"]);

		foreach ($galeriaHabitacion as $key => $value) {
			
			unlink("../".$value);
		
		}

		// Eliminamos imagen 360°

		// unlink("../".$datos["recorridoHabitacion"]);	

		$tabla = "habitaciones";

		$respuesta = ModeloHabitaciones::mdlEliminarHabitacion($tabla, $datos["idEliminar"]);

		return $respuesta;

	}


}