

<?php

$valor = $_GET["pagina"];
$habitaciones = ControladorHabitaciones::ctrMostrarHabitaciones($valor);

if (count($habitaciones) == 0) {

	echo '<script>

	window.location = "' . $ruta . '";

	</script>';

	return;
}
// echo '<pre class="bg-white">'; print_r($habitaciones); echo '</pre>';

/*=============================================
ESCENARIO 2 Y 3 DE RESERVAS
=============================================*/
$arrayHabitaciones = array();
foreach ($habitaciones as $key => $value) {
	array_push($arrayHabitaciones, $value["id_h"]);
}
$nuevoArrayHab = implode(",", $arrayHabitaciones);
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
					<a href="<?php echo $ruta;  ?>" class="float-left lead text-white pt-1 px-3">
						<h5><i class="fas fa-chevron-left"></i> Regresar</h5>
					</a>
					<h2 class="float-right text-white px-3 categoria text-uppercase"><?php echo $habitaciones[0]["tipo"]; ?></h2>
					<div class="clearfix"></div>
				</div>

				<!--=====================================
				MULTIMEDIA HABITACIONES
				======================================-->
				<!-- SLIDE  -->
				<section class="jd-slider mb-3 my-lg-3 slideHabitaciones">
					<div class="slide-inner">
						<ul class="slide-area">
							<?php
							$galeria = json_decode($habitaciones[0]["galeria"], true);
							?>
							<?php foreach ($galeria as $key => $value) : ?>
								<li>
									<img src="<?php echo $servidor . $value; ?>" class="img-fluid">
								</li>
							<?php endforeach ?>
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
					<h1 class="colorTitulos float-left"><?php echo $habitaciones[0]["estilo"] . " " . $habitaciones[0]["tipo"] ?> </h1>
					<div class="clearfix mb-4"></div>
					<div class="d-habitacion">
						<?php echo $habitaciones[0]["descripcion_h"]; ?>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>