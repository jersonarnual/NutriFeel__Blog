<?php
$valor = $_GET['id'];
$habitacion = ControladorHabitaciones::ctrMostrarHabitaciones($valor);
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
					<a href="<?php echo $ruta; ?>" class="float-left lead text-white pt-1 px-3">
						<h5><i class="fas fa-chevron-left"></i> Regresar</h5>
					</a>
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
								<?php
								$array = explode(",", trim($habitacion["galeria"], "[]"));
								$img = trim(reset($array), "\"");
								$img = str_replace("\\", "/", $img);
								?>
								<img src="<?php echo $ruta . "admin/" . $img; ?>" class="img-fluid">
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
					<h1 class="colorTitulos float-left">
						<?php echo $habitacion["estilo"]; ?>
					</h1>
					<div class="clearfix mb-4"></div>
					<div class="d-habitacion">
						<p>
							<?php echo $habitacion["descripcion_h"]; ?>
						</p>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>