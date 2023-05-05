<?php

$valor = $_GET["pagina"];

// $habitaciones = ControladorHabitaciones::ctrMostrarHabitaciones($valor);

// if (count($habitaciones) == 0) {
// 	echo '<script>
// 	window.location = "' . $ruta . '";
// 	</script>';
// 	return;
// }
// echo '<pre class="bg-white">'; print_r($habitaciones); echo '</pre>';

/*=============================================
ESCENARIO 2 Y 3 DE RESERVAS
=============================================*/
// $arrayHabitaciones = array();
// foreach ($habitaciones as $key => $value) {
// 	array_push($arrayHabitaciones, $value["id_h"]);
// }
// $nuevoArrayHab = implode(",", $arrayHabitaciones);

?>
<!--=====================================
INFO HABITACIÓN
======================================-->
<div class="infoHabitacion container-fluid bg-white p-0 pb-5">
	<div class="container">
		<div class="row">
			<!--=====================================
			BLOQUE IZQ
			======================================-->
			<div class="col-12 col-lg-8 colIzqHabitaciones p-0">
				<!--=====================================
				CABECERA HABITACIONES
				======================================-->
				<div class="pt-4 cabeceraHabitacion">
					<a href="" class="float-left lead text-white pt-1 px-3">
						<h5><i class="fas fa-chevron-left"></i> Regresar</h5>
					</a>
					<h2 class="float-right text-white px-3 categoria text-uppercase">Hola</h2>
					<div class="clearfix"></div>
				</div>

				<!--=====================================
				MULTIMEDIA HABITACIONES
				======================================-->
				<!-- SLIDE  -->
				<section class="jd-slider mb-3 my-lg-3 slideHabitaciones">
					<div class="slide-inner">
						<ul class="slide-area">
							<li>
								<img src="../../img/habitacion01.png" class="img-fluid">
							</li>
						</ul>
					</div>
					<a class="prev d-none d-lg-block" href="#">
						<i class="fas fa-angle-left fa-2x"></i>
					</a>
					<a class="next d-none d-lg-block" href="#">
						<i class="fas fa-angle-right fa-2x"></i>
					</a>
					<div class="controller d-block d-lg-none">
						<div class="indicate-area"></div>
					</div>
				</section>

				<!--=====================================
				DESCRIPCIÓN HABITACIONES
				======================================-->

				<div class="descripcionHabitacion px-3">
					<h1 class="colorTitulos float-left">Habitacion Prueba </h1>
					<div class="clearfix mb-4"></div>
					<div class="d-habitacion">
					<?php
					echo $valor;
					?>
						<p>Para comprender el origen del café verde, primero se debe comprender que el café comercializado más conocido es de color marrón debido a que es sometido a un proceso de tueste que lo oscurece. En cambio, el café verde no es tratado de tal forma, por lo que conserva su color original.Además del color, cuenta con otras características que lo diferencian por completo del café más tradicional. Por ejemplo, <strong>el olor es más penetrante y su sabor levemente más amargo. </strong>Otro factor diferenciador es la alta presencia de ácido clorogénico respecto al café tostado.</p>
						<p><a href="https://www.eltiempo.com/vida/tendencias/creatina-para-el-deporte-funciona-745571">Creatina: ¿puede ayudar con nmi ejercicio físico?</a></p>
						<p><a href="https://www.eltiempo.com/salud/que-pasa-si-tiene-hepatomegalia-745558">¿Qué le pasa a su cuerpo si sufre de hepatomegalia?</a></p>
						<p><a href="https://www.eltiempo.com/vida/tendencias/como-elegir-y-usar-plantas-medicinales-de-manera-segura-745545">¿Sabe cómo usar plantas medicinales de manera segura?</a></p>
						<p>Ese compuesto presente en el café verde es muchas veces relacionado con una serie de beneficios. No obstante, la lista de riesgos también merece ser mencionada, pues <strong>no hay investigaciones importantes que acrediten la fiabilidad de este alimento en la salud.</strong>Se considera posiblemente seguro cuando se consume de manera apropiada. Según 'MedlinePlus' -servicio de información en línea provisto por la Biblioteca Nacional de Medicina de los Estados Unidos-, los extractos de café verde tomados en dosis de hasta 1.000 miligramos al día, hasta por 12 semanas, no representan ningún peligro para la salud.</p>
						<p><br data-cke-filler="true"></p>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>