<?php
session_start();
$ruta = ControladorRuta::ctrRuta();
$servidor = ControladorRuta::ctrServidor();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Nutrifeel</title>
	<base href="vistas/">
	<link rel="icon" href="img/logo.png">
	<!--=====================================
	VÍNCULOS CSS
	======================================-->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<!-- Fuente Open Sans y Ubuntu -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300|Ubuntu" rel="stylesheet">
	<!-- bootstrap datepicker -->
	<link rel="stylesheet" href="css/plugins/bootstrap-datepicker.standalone.min.css">
	<!-- datetimepicker -->
	<link rel="stylesheet" href="css/plugins/jquery.datetimepicker.css">
	<!-- jdSlider -->
	<link rel="stylesheet" href="css/plugins/jquery.jdSlider.css">
	<!-- Pano -->
	<link rel="stylesheet" href="css/plugins/jquery.pano.css">
	<!-- fullCalendar -->
	<link rel="stylesheet" href="css/plugins/fullcalendar.min.css">
	<!-- Hoja de estilo personalizada -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/habitaciones.css">
	<link rel="stylesheet" href="css/reservas.css">
	<link rel="stylesheet" href="css/perfil.css">

	<!--=====================================
	VÍNCULOS JAVASCRIPT
	======================================-->
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<!-- bootstrap datepicker -->
	<!-- https://bootstrap-datepicker.readthedocs.io/en/latest/ -->
	<script src="js/plugins/bootstrap-datepicker.min.js"></script>
	<!-- datetimepicker -->
	<!-- https://xdsoft.net/jqplugins/datetimepicker/ -->
	<script src="js/plugins/jquery.datetimepicker.full.min.js"></script>
	<!-- https://easings.net/es# -->
	<script src="js/plugins/jquery.easing.js"></script>
	<!-- https://markgoodyear.com/labs/scrollup/ -->
	<script src="js/plugins/scrollUP.js"></script>
	<!-- jdSlider -->
	<!-- https://www.jqueryscript.net/slider/Carousel-Slideshow-jdSlider.html -->
	<script src="js/plugins/jquery.jdSlider-latest.js"></script>
	<!-- Pano -->
	<!-- https://www.jqueryscript.net/other/360-Degree-Panoramic-Image-Viewer-with-jQuery-Pano.html -->
	<script src="js/plugins/jquery.pano.js"></script>
	<!-- fullCalendar -->
	<!-- https://momentjs.com/ -->
	<script src="js/plugins/moment.js"></script>
	<!-- https://fullcalendar.io/docs/background-events-demo -->
	<script src="js/plugins/fullcalendar.min.js"></script>
	<!-- JQUERY NUMBER -->
	<!-- https://plugins.jquery.com/df-number-format/ -->
	<script src="js/plugins/jquerynumber.js"></script>
	<!-- SWEET ALERT 2 -->
	<!-- https://sweetalert2.github.io/ -->
	<script src="js/plugins/sweetalert2.all.js"></script>
</head>
<body>
	<?php
	include "paginas/modulos/header.php";
	/*=============================================
		PÁGINAS
	=============================================*/

	if (isset($_GET["pagina"])) {
		$valor=null;
		$rutasHabitaciones = ControladorHabitaciones::ctrMostrarHabitaciones($valor);
		$validarRuta = "";
		foreach ($rutasHabitaciones as $key => $value) {
			if ($_GET["pagina"] == $value["id_h"]) {
				$validarRuta = "habitaciones";
			}
		}

		/*=============================================
		LISTA BLANCA DE PÁGINAS INTERNAS
		=============================================*/

		if ($_GET["pagina"] == "info-habitaciones") {
			include "paginas/modulos/" . $_GET["pagina"] . ".php";
		} else if ($validarRuta != "") {
			include "paginas/habitaciones.php";
		}
	} else {
		include "paginas/inicio.php";
	}

	/*=============================================
		PÁGINAS
	=============================================*/
	include "paginas/modulos/footer.php";
	?>

	<input type="hidden" value="<?php echo $ruta; ?>" id="urlPrincipal">
	<input type="hidden" value="<?php echo $servidor; ?>" id="urlServidor">
	<script src="js/plantilla.js"></script>
	<script src="js/menu.js"></script>
	<script src="js/habitaciones.js"></script>
	<script>
		console.log("<?php echo $ruta; ?>");
		console.log("<?php echo $servidor; ?>");
		window.fbAsyncInit = function() {
			FB.init({
				appId: '2180677115313399',
				xfbml: true,
				version: 'v3.3'
			});
			FB.AppEvents.logPageView();
		};

		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) {
				return;
			}
			js = d.createElement(s);
			js.id = id;
			js.src = "https://connect.facebook.net/en_US/sdk.js";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>

</body>

</html>