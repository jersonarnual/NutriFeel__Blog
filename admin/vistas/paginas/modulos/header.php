<?php 

// $notificaciones = ControladorInicio::ctrMostrarNotificaciones();

// $totalNotificaciones = 0;
// $totalReservas = 0;
// $totalTestimonios = 0;

// foreach ($notificaciones as $key => $value) {

//    $totalNotificaciones += $value["cantidad"];

//     if($value["tipo"] == "reservas"){
      
//       $totalReservas = $value["cantidad"];

//     }else{

//       $totalTestimonios = $value["cantidad"];
    
//     }
// }

?>

<nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">

  <!--=====================================
  Botón que colapsa el menú lateral
  ======================================--> 

  <ul class="navbar-nav">

    <li class="nav-item">
      
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    
    </li>

    <li class="nav-item d-none d-sm-inline-block">

      <a class="nav-link">Hola <?php echo $admin["nombre"]; ?></a>

    </li>

  </ul>

     <!--=====================================
    Botón salir del sistema
    ======================================--> 

  <ul class="navbar-nav ml-auto">

    <li class="nav-item">

      <a class="nav-link" href="salir">

        <i class="fas fa-sign-out-alt"></i>

      </a>   

    </li>

  </ul>

</nav>