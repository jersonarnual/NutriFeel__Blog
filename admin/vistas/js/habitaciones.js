/*=============================================
360 GRADOS
=============================================*/

$(".360Antiguo").pano({
	img: $(".360Antiguo").attr("back")
});

/*=============================================
Plugin ckEditor
=============================================*/

ClassicEditor.create(document.querySelector('#descripcionHabitacion'), {

   toolbar: [ 'heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList', '|', 'undo', 'redo']

}).then(function (editor) {
  
    $(".ck-content").css({"height":"400px"})

}).catch(function (error) {

	// console.log("error", error);

})

/*=============================================
Tabla Habitaciones
=============================================*/

$(".tablaHabitaciones").DataTable({
  "ajax":"ajax/tablaHabitaciones.ajax.php",
  "deferRender": true,
  "retrieve": true,
  "processing": true,
  "language": {

     "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
      "sFirst":    "Primero",
      "sLast":     "Último",
      "sNext":     "Siguiente",
      "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }

   }

})


/*=============================================
ARRASTRAR VARIAS IMAGENES GALERÍA
=============================================*/

var archivosTemporales = [];

$(".subirGaleria").on("dragenter", function(e){

	e.preventDefault();
  	e.stopPropagation();

  	$(".subirGaleria").css({"background":"url(vistas/img/plantilla/pattern.jpg)"})

})

$(".subirGaleria").on("dragleave", function(e){

  e.preventDefault();
  e.stopPropagation();

  $(".subirGaleria").css({"background":""})

})

$(".subirGaleria").on("dragover", function(e){

  e.preventDefault();
  e.stopPropagation();

})

$("#galeria").change(function(){

	var archivos = this.files;

	multiplesArchivos(archivos);

})

$(".subirGaleria").on("drop", function(e){

  e.preventDefault();
  e.stopPropagation();

  $(".subirGaleria").css({"background":""})

  var archivos = e.originalEvent.dataTransfer.files;
  
  multiplesArchivos(archivos);

})

function multiplesArchivos(archivos){

	for(var i = 0; i < archivos.length; i++){

		var imagen = archivos[i];
		
		if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

			swal({
	          title: "Error al subir la imagen",
	          text: "¡La imagen debe estar en formato JPG o PNG!",
	          type: "error",
	          confirmButtonText: "¡Cerrar!"
	        });

	        return;

		}else if(imagen["size"] > 8000000){

			swal({
	          title: "Error al subir la imagen",
	          text: "¡La imagen no debe pesar más de 8MB!",
	          type: "error",
	          confirmButtonText: "¡Cerrar!"
	        });

	        return;

		}else{

			var datosImagen = new FileReader;
      		datosImagen.readAsDataURL(imagen);

      		$(datosImagen).on("load", function(event){

      			var rutaImagen = event.target.result;

      			$(".vistaGaleria").append(`

					<li class="col-12 col-md-6 col-lg-3 card px-3 rounded-0 shadow-none">
                      
	                    <img class="card-img-top" src="`+rutaImagen+`">

	                    <div class="card-img-overlay p-0 pr-3">
	                      
	                       <button class="btn btn-danger btn-sm float-right shadow-sm quitarFotoNueva" temporal>
	                         
	                         <i class="fas fa-times"></i>

	                       </button>

	                    </div>

	                </li>

      			`)


        		if(archivosTemporales.length != 0){

        			archivosTemporales = JSON.parse($(".inputNuevaGaleria").val());

        		}

        		archivosTemporales.push(rutaImagen);    

        		$(".inputNuevaGaleria").val(JSON.stringify(archivosTemporales)) 		

      		})

		}	

	}	

}

/*=============================================
QUITAR IMAGEN DE LA GALERÍA
=============================================*/

$(document).on("click", ".quitarFotoNueva", function(){

	var listaFotosNuevas = $(".quitarFotoNueva"); 
	
	var listaTemporales = JSON.parse($(".inputNuevaGaleria").val());

	for(var i = 0; i < listaFotosNuevas.length; i++){

		$(listaFotosNuevas[i]).attr("temporal", listaTemporales[i]);

		var quitarImagen = $(this).attr("temporal");

		if(quitarImagen == listaTemporales[i]){

			listaTemporales.splice(i, 1);

			$(".inputNuevaGaleria").val(JSON.stringify(listaTemporales));

			 $(this).parent().parent().remove();

		}

	}

})

/*=============================================
AGREGAR VIDEO
=============================================*/

$(".agregarVideo").change(function(){

	var codigoVideo = $(this).val();

	$(".vistaVideo").html(
    
    `<iframe width="100%" height="320" src="https://www.youtube.com/embed/`+codigoVideo+`" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`

  )


})

/*=============================================
QUITAR IMAGEN VIEJA GALERÍA
=============================================*/

$(document).on("click", ".quitarFotoAntigua", function(){

	var listaFotosAntiguas = $(".quitarFotoAntigua"); 

	var listaTemporales = $(".inputAntiguaGaleria").val().split(",");

	for(var i = 0; i < listaFotosAntiguas.length; i++){

		quitarImagen = $(this).attr("temporal");

		if(quitarImagen == listaTemporales[i]){

			listaTemporales.splice(i, 1);

			$(".inputAntiguaGaleria").val(listaTemporales.toString());

			$(this).parent().parent().remove();

		}

	}
})

/*=============================================
GUARDAR HABITACIÓN
=============================================*/

$(".guardarHabitacion").click(function(){

	var idHabitacion = $(".idHabitacion").val();
	var estilo = $(".seleccionarEstilo").val();
	var galeria = $(".inputNuevaGaleria").val();
	var galeriaAntigua = $(".inputAntiguaGaleria").val();
	var video = $(".agregarVideo").val();
	var descripcion = $(".ck-content").html();

	if(estilo == ""){

	    swal({
	        title: "Error al guardar",
	        text: "El campo 'Escribe el titulo del post' no puede ir vacío",
	        type: "error",
	        confirmButtonText: "¡Cerrar!"
	      });

	    return;


	}else if(descripcion == ""){

	    swal({
	        title: "Error al guardar",
	        text: "El campo de 'Descripción' no puede ir vacío",
	        type: "error",
	        confirmButtonText: "¡Cerrar!"
	      });

	    return;

  	}else{

    	var datos = new FormData();
		datos.append("idHabitacion", idHabitacion);
		datos.append("estilo", estilo);
		datos.append("galeria", galeria);
		datos.append("galeriaAntigua", galeriaAntigua);
		datos.append("video", video);
		datos.append("descripcion", descripcion);
		

    	 $.ajax({

		    url:"ajax/habitaciones.ajax.php",
		    method: "POST",
		    data: datos,
		    cache: false,
		    contentType: false,
		    processData: false,
		    xhr: function(){
	        
		    	var xhr = $.ajaxSettings.xhr();

		    	xhr.onprogress = function(evt){ 

		    		var porcentaje = Math.floor((evt.loaded/evt.total*100));

		    		$(".preload").before(`

		    			<div class="progress mt-3" style="height:2px">
		    			<div class="progress-bar" style="width: `+porcentaje+`%;"></div>
		    			</div>`
		    			)

		    	};

		    	return xhr;
		          
		    },
	      	success:function(respuesta){

      			if(respuesta == "ok"){

      				swal({
		                type:"success",
		                  title: "¡CORRECTO!",
		                  text: "¡La publicación se ha creado correctamente!",
		                  showConfirmButton: true,
		                confirmButtonText: "Cerrar"
		                
		              }).then(function(result){

		                  if(result.value){

		                    window.location = "habitaciones";

		                  }

		              });

      			}

      		}

      	})

        
    }


})

/*=============================================
Eliminar Habitacion
=============================================*/

$(document).on("click", ".eliminarHabitacion", function(){

  var idEliminar = $(this).attr("idEliminar");

  var galeriaHabitacion = $(this).attr("galeriaHabitacion");

  swal({
    title: '¿Está seguro de eliminar esta noticia?',
    text: "¡Si no lo está puede cancelar la acción!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, eliminar Noticia!'
  }).then(function(result){

    if(result.value){

        var datos = new FormData();
        datos.append("idEliminar", idEliminar);
        datos.append("galeriaHabitacion", galeriaHabitacion);

        $.ajax({

          url:"ajax/habitaciones.ajax.php",
          method: "POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          success:function(respuesta){

             if(respuesta == "ok"){
               swal({
                  type: "success",
                  title: "¡CORRECTO!",
                  text: "La Noticia ha sido borrada correctamente",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                 }).then(function(result){

                    if(result.value){

                      window.location = "habitaciones";

                    }
                })

             }

          }

        })
    }
  
  })

})



