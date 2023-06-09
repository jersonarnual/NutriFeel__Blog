<div class="content-wrapper" style="min-height: 717px;">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Publicaciones</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Publicaciones</li>

          </ol>

        </div>

      </div>

    </div><!-- /.container-fluid -->

  </section>

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">

      <div class="row">

        <!--=====================================
        Listado de habitaciones
        ======================================-->

        <div class="col-12 col-xl-5">

          <div class="card card-primary card-outline">

            <!-- header-card -->

            <div class="card-header pl-2 pl-sm-3">

              <a href="habitaciones" class="btn btn-primary btn-sm">Crear post</a>

              <div class="card-tools">

                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
                  <i class="fas fa-minus"></i></button>

              </div>

            </div>

            <!-- body-card -->

            <div class="card-body">

              <table class="table table-bordered table-striped dt-responsive tablaHabitaciones" width="100%">

                <thead>

                  <tr>

                    <th style="width:10px">#</th>
                    <th>Post</th>
                    <th style="width:10px">Acciones</th>

                  </tr>

                </thead>

                <tbody>

                </tbody>

              </table>

            </div>

          </div>

        </div>

        <!--=====================================
        Editor de habitaciones
        ======================================-->


        <?php

        if (isset($_GET["id_h"])) {

          $habitacion = ControladorHabitaciones::ctrMostrarhabitaciones($_GET["id_h"]);

        } else {

          $habitacion = null;

        }


        ?>

        <div class="col-12 col-xl-7">

          <div class="card card-primary card-outline">

            <!-- header-card -->

            <div class="card-header">



              <div class="preload"></div>

              <div class="card-tools">

                <button type="button" class="btn btn-info btn-sm guardarHabitacion">

                  <i class="fas fa-save"></i>

                </button>

                <?php

                if ($habitacion != null) {

                  $galeria = json_decode($habitacion["galeria"], true);

                  echo '<button type="button" class="btn btn-danger btn-sm eliminarHabitacion" idEliminar="' . $habitacion["id_h"] . '" galeriaHabitacion="' . implode(",", $galeria) . '" >
                  
                          <i class="fas fa-trash"></i> 

                        </button>';

                }
                // else{
                //   $galeria =array();
                // }
                
                ?>
              </div>

            </div>

            <!-- card-body -->

            <div class="card-body">

              <input type="hidden" class="idHabitacion"
                value="<?php echo isset($habitacion["id_h"]) ? $habitacion["id_h"] : '' ?>">

              <!-- Categoría y nombre de la habitación -->
              <div class="card rounded-lg card-secondary card-outline">
                <!-- <div class="d-flex flex-column flex-md-row justify-content-start mb-3"> -->
                <div class="card-header pl-2 pl-sm-3">

                  <h5>Escribe el titulo del post:</h5>

                </div>
                <div class="card-body vistaVideo">
                  <div class="form-inline">
                    <?php

                    if ($habitacion != null) {

                      echo '<input type="text" class="form-control seleccionarEstilo" value="' . $habitacion["estilo"] . '" style="width: 100%;">';

                    } else {

                      echo '<input type="text" class="form-control seleccionarEstilo" style="width: 100%;">';

                    }

                    ?>

                  </div>
                </div>

                <!-- </div> -->
              </div>

              <!-- Galería -->

              <div class="card rounded-lg card-secondary card-outline">

                <div class="card-header pl-2 pl-sm-3">

                  <h5>Galería:</h5>

                </div>

                <div class="card-body">

                  <ul class="row p-0 vistaGaleria">


                    <?php

                    if ($habitacion != null) {

                      $galeria = json_decode($habitacion["galeria"], true);

                      foreach ($galeria as $key => $value) {

                        echo '<li class="col-12 col-md-6 col-lg-3 card px-3 rounded-0 shadow-none">
                      
                                <img class="card-img-top" src="' . $value . '">

                                <div class="card-img-overlay p-0 pr-3">
                                  
                                   <button class="btn btn-danger btn-sm float-right shadow-sm quitarFotoAntigua" temporal="' . $value . '">
                                     
                                     <i class="fas fa-times"></i>

                                   </button>

                                </div>

                              </li>';

                      }

                    } else {
                      $galeria = array();
                    }

                    ?>

                  </ul>

                </div>

                <input type="hidden" class="inputNuevaGaleria">

                <input type="hidden" class="inputAntiguaGaleria"
                  value="<?php echo $galeria ? implode(",", $galeria) : ''; ?>">

                <div class="card-footer">

                  <input type="file" multiple id="galeria" class="d-none">

                  <label for="galeria" class="text-dark text-center py-5 border rounded bg-white w-100 subirGaleria">

                    Haz clic aquí o arrastra las imágenes <br>
                    <span class="help-block small">Dimensiones: 940px * 480px | Peso Max. 2MB | Formato: JPG o
                      PNG</span>

                  </label>

                </div>

              </div>

              <!-- Vídeo y 360°-->

              <div class="row">

                <div class="col-12 col-xl-12">

                  <div class="card rounded-lg card-secondary card-outline">

                    <div class="card-header pl-2 pl-sm-3">

                      <h5>Vídeo ¡opcional!</h5>

                    </div>

                    <div class="card-body vistaVideo">

                      <?php if ($habitacion != null): ?>

                        <iframe width="100%" height="320"
                          src="https://www.youtube.com/embed/<?php echo $habitacion["video"]; ?>" frameborder="0"
                          allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                          allowfullscreen></iframe>

                      <?php endif ?>


                    </div>

                    <div class="card-footer">

                      <div class="input-group">

                        <div class="input-group-prepend">
                          <span class="p-2 bg-secondary rounded-left small">youtube.com/embed/</span>
                        </div>

                        <?php if ($habitacion != null): ?>

                          <input type="text" class="form-control agregarVideo" placeholder="Agregue el código del vídeo"
                            value="<?php echo $habitacion["video"]; ?>">

                        <?php else: ?>

                          <input type="text" class="form-control agregarVideo" placeholder="Agregue el código del vídeo">

                        <?php endif ?>

                      </div>

                    </div>

                  </div>

                </div>

              </div>

              <!-- descripción -->

              <div class="card rounded-lg card-secondary card-outline">

                <div class="card-header pl-2 pl-sm-3">

                  <h5>Noticia o artículo:</h5>

                </div>

                <div class="card-body">

                  <textarea id="descripcionHabitacion" style="width: 100%">

                    <?php

                    if ($habitacion != null) {

                      echo $habitacion["descripcion_h"];

                    }

                    ?>

                  </textarea>

                </div>

              </div>

            </div>

            <!-- footer-card -->

            <div class="card-footer">

              <div class="preload"></div>

              <div class="card-tools float-right">

                <button type="button" class="btn btn-info btn-sm guardarHabitacion">

                  <i class="fas fa-save"></i>

                </button>

                <?php

                if ($habitacion != null) {

                  $galeria = json_decode($habitacion["galeria"], true);

                  echo '<button type="button" class="btn btn-danger btn-sm eliminarHabitacion" idEliminar="' . $habitacion["id_h"] . '" galeriaHabitacion="' . implode(",", $galeria) . '">
                  
                          <i class="fas fa-trash"></i> 

                        </button>';

                }

                ?>



              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </section>
  <!-- /.content -->

</div>