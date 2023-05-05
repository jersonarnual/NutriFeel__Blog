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
        
        <!-- Botón página habitaciones -->

        <li class="nav-item">

          <a href="habitaciones" class="nav-link">

            <i class="nav-icon fas fa-list-ul"></i>
            
            <p>Publicaciones</p>

          </a>

        </li>

      </ul>

    </nav>
  
  </div>

</aside>