<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <!--=====================================
  LOGO
  ======================================-->
  <a href="inicio" class="brand-link">
  
    <img src="vistas/img/plantilla/logo.png" class="brand-image-xl">

    <span class="brand-text font-weight-light">Nutrifeel</span>

  </a>

  <!--=====================================
  MENÚ
  ======================================-->

  <div class="sidebar">

    <nav class="mt-2">
      
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <!-- botón Ver sitio -->

        <li class="nav-item">
          
          <a href="<?php echo $ruta; ?>" class="nav-link active" target="_blank">
            
            <i class="nav-icon fas fa-globe"></i>
            
            <p>Ir a Nutrifeel blog</p>

          </a>

        </li>

        <?php if ($admin["perfil"] == "Administrador"): ?>

        <!-- Botón página inicio -->

        <li class="nav-item">

          <a href="inicio" class="nav-link">

            <i class="nav-icon fas fa-home"></i>

            <p>Inicio</p>

          </a>

        </li>

        <!-- Botón página administradores -->

       
          
          <li class="nav-item">

            <a href="administradores" class="nav-link">

              <i class="nav-icon fas fa-users-cog"></i>

              <p>Administradores</p>

            </a>

          </li>

        <?php endif ?>

        <!-- Botón página banner -->

        <li class="nav-item">
          <a href="banner" class="nav-link">
            <i class="nav-icon far fa-images"></i>
            <p>
              Portada
            </p>
          </a>
        </li>

        <!-- Botón página planes -->

        <!-- <li class="nav-item">
          
          <a href="planes" class="nav-link">
            
            <i class="nav-icon fas fa-shopping-bag"></i>
            
            <p>Planes</p>
          
          </a>

        </li> -->

        <!-- Botón página categorías -->
        <?php if ($admin["perfil"] == "Administrador"): ?>

          <li class="nav-item">
          
            <a href="categorias" class="nav-link">
            
              <i class="nav-icon fas fa-list-ul"></i>
            
              <p>Categorías</p>
          
            </a>

          </li>

        <?php endif ?>
        
        <!-- Botón página habitaciones -->

        <li class="nav-item">

          <a href="habitaciones" class="nav-link">

            <i class="nav-icon fas fa-list-ul"></i>
            
            <p>Publicaciones</p>

          </a>

        </li>

        <!-- Botón página reservas -->


        <!-- <li class="nav-item">

          <a href="reservas" class="nav-link">

            <i class="nav-icon far fa-calendar-alt"></i>

            <p>Reservas</p>

          </a>

        </li> -->


        <!-- Botón página testimonios -->

        <!-- <li class="nav-item">

          <a href="testimonios" class="nav-link">

            <i class="nav-icon fas fa-user-check"></i>

            <p>Testimonios</p>

          </a>

        </li> -->

        <!-- Botón página usuarios -->

        <?php if ($admin["perfil"] == "Administrador"): ?>         

         <!-- <li class="nav-item">
          
          <a href="usuarios" class="nav-link">
            
            <i class="nav-icon fas fa-users"></i>
            
            <p> Usuarios</p>

          </a>

        </li> -->

      <?php endif ?>

        <!-- Botón página recorrido -->

         <!-- <li class="nav-item">

          <a href="recorrido" class="nav-link">

            <i class="nav-icon fas fa-bus"></i>

            <p>Recorrido</p>

          </a>

        </li> -->

        <!-- Botón página restaurante -->

        <!-- <li class="nav-item">
          
          <a href="restaurante" class="nav-link">
            
            <i class="nav-icon fas fa-utensils"></i>
            
            <p>Restaurante</p>

          </a>

        </li> -->

      </ul>

    </nav>
  
  </div>

</aside>