<?php
$valor = null;
$habitaciones = ControladorHabitaciones::ctrMostrarHabitaciones($valor);
?>
<div class="habitaciones container-fluid bg-light" id="habitaciones">

<!--=====================================
HABITACIONES
======================================-->
<div class="contenedor-noticias">
	
<?php
						foreach ($habitaciones as $key => $value): ?>
    <div class="noticia grande">
		<a href="<?php echo $ruta . "index.php?pagina=infnoticia&id=" . $value["id_h"]; ?>">
		<?php
										$array = explode(",", trim($value["galeria"], "[]"));
										$img = trim(reset($array), "\"");
										$img = str_replace("\\", "/", $img);
										?>
      <img src="<?php echo $ruta . "admin/" . $img; ?>" alt="notice" width="100%">

	  </a>
      <h2><a href="<?php echo $ruta . "index.php?pagina=infnoticia&id=" . $value["id_h"]; ?>>">
													<?php echo $value["estilo"]; ?>
												</a></h2>
      <p><?php echo $value["descripcion_h"] = substr($value["descripcion_h"], 0, 400) . " ..."; ?></p>
      <a class='btn' href="<?php echo $ruta . "index.php?pagina=infnoticia&id=" . $value["id_h"]; ?>">Leer Mas</a>
    </div>
	<?php endforeach ?>
    <!-- Resto de las noticias -->
  </div>

	<!-- <section class="pt-120 pb-150 habitacion-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="blog-list-inner">

						<?php
						foreach ($habitaciones as $key => $value): ?>
							<div class="single-blog-inner">
								<div class="post-image">
									<a href="<?php echo $ruta . "index.php?pagina=infnoticia&id=" . $value["id_h"]; ?>">
										<?php
										$array = explode(",", trim($value["galeria"], "[]"));
										$img = trim(reset($array), "\"");
										$img = str_replace("\\", "/", $img);
										?>
										<img src="<?php echo $ruta . "admin/" . $img; ?>" alt="notice" width="100%">
									</a>
									<div class="post-date">
										<p><span></span>Mayo</p>
									</div>
								</div>
								<div class="post-content">
									<div class="post-details">
										<div class="post-title">
											<h3><a href="<?php echo $ruta . "index.php?pagina=infnoticia&id=" . $value["id_h"]; ?>>">
													<?php echo $value["estilo"]; ?>
												</a>
											</h3>
										</div>
										<p>
											<?php echo $value["descripcion_h"] = substr($value["descripcion_h"], 0, 400) . " ..."; ?>
										</p>
										
										<a class='btn' href="<?php echo $ruta . "index.php?pagina=infnoticia&id=" . $value["id_h"]; ?>">Leer Mas</a>

									</div>
								</div>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</section> -->
</div>