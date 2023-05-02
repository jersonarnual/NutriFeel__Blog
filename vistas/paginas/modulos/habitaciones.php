<?php $categorias = ControladorCategorias::ctrMostrarCategorias();?>
<div class="habitaciones container-fluid bg-light" id="habitaciones">

	<!--=====================================
HABITACIONES
======================================-->
	<section class="pt-120 pb-150 habitacion-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="blog-list-inner">

						<?php foreach ($categorias as $key => $value) : ?>
							<div class="single-blog-inner">
								<div class="post-image">
									<a href="<?php echo $ruta . $value["ruta"];  ?>">
										<img src="<?php echo $servidor . $value["img"]; ?>" alt="notice"  width="100%">
									</a>
									<div class="post-date">
										<p><span>4</span>Abril</p>
									</div>
								</div>
								<div class="post-content">
									<div class="post-details">
										<div class="post-title">
											<h3><a href="<?php echo $ruta . $value["ruta"];  ?>"><?php echo $value["tipo"]; ?></a></h3>
										</div>
										<p>El cerebro es uno de los órganos más importantes de nuestro cuerpo y mantenerlo sano y
											joven es fundamental para tener una buena calidad de vida. La dieta es un factor clave
											para lograrlo, ya que los nutrientes que consumimos tienen un impacto directo en la salud
											cerebral. En este blog, te presentamos las mejores dietas para mantener tu cerebro joven.</p>
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