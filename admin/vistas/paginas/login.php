<body class="hold-transition login-page">

  <div class="login-box">


    <!-- /.login-logo -->

    <div class="card">
       <div class="login-logo">
          <a href="<?php echo $ruta?>"><img src="vistas/img/plantilla/logo.png" class="brand-image-xxl img-circle "></a>
        </div>

      <div class="card-body login-card-body">

        <p class="login-box-msg">Iniciar Sesión</p>

        <form method="post">

          <div class="input-group mb-3">

            <input type="text" class="form-control" placeholder="Nombre Usuario" name="ingresoUsuario">

            <div class="input-group-append">

              <div class="input-group-text">

                <span class="fas fa-envelope"></span>

              </div>

            </div>

          </div>

          <div class="input-group mb-3">

            <input type="password" class="form-control" placeholder="Password" name="ingresoPassword">

            <div class="input-group-append">

              <div class="input-group-text">

                <span class="fas fa-lock"></span>

              </div>

            </div>

          </div>        

          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button> 

          <?php

          $ingreso = new ControladorAdministradores();
          $ingreso -> ctrIngresoAdministradores(); 


          ?>   
   
        </form>

      </div>
      <!-- /.login-card-body -->
    </div>

  </div>
  <!-- /.login-box -->

</body>