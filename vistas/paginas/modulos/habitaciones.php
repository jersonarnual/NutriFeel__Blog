<?php
// $categorias = ControladorCategorias::ctrMostrarCategorias();
$habitaciones = ControladorHabitaciones::ctrMostrarHabitacionesTotal();
// echo('<pre>');
// var_dump($habitaciones);
// echo('</pre>');

?>
<div class="habitaciones container-fluid bg-light" id="habitaciones">

	<!--=====================================
HABITACIONES
======================================-->
	<section class="pt-120 pb-150 habitacion-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="blog-list-inner">

						<?php foreach ($habitaciones as $key => $value) : ?>
							<div class="single-blog-inner">
								<div class="post-image">
									<a href="<?php echo $ruta . $value["ruta"];  ?>">
										<img src="<?php echo $servidor . $value["img"]; ?>" alt="notice" width="100%">
									</a>
									<div class="post-date">
										<p><span>4</span>Abril</p>
									</div>
								</div>
								<div class="post-content">
									<div class="post-details">
										<div class="post-title">
											<h3><a href="<?php echo $ruta . $value["ruta"];  ?>"><?php echo $value["estilo"]; ?></a></h3>
										</div>
										<p><?php echo $value["descripcion_h"] = substr($value["descripcion_h"], 0, 400) . " ..."; ?></p>
										<a class='btn' href="<?php echo $ruta . $value["ruta"];  ?>">Leer Mas</a>
									</div>
								</div>
							</div>
						<?php endforeach ?>

					</div>
				</div>
			</div>
		</div>
	</section>

</div>

