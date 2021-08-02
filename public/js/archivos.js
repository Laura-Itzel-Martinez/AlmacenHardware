$(document).ready(function(){

	$('#cargaTablaArchivo').load('vistas/archivos/tablaArchivo.php');
	$('#btnGuardarArchivo').click(function(){

		if ($('#nombreCategoria').val() == "") {
			swal("Debes agregar un nombre de categoria!");
			return false;
		}

		agregarNuevoArchivo();
	});


});
function agregarNuevoArchivo () {
	var formData=new FormData (document.getElementById('frmAgregarArchivo'));
	$.ajax({
		type:"POST",
		url: "procesos/archivos/agregarArchivo.php",
		datatype:"html",
		data:formData,
		cache:false,
		contentType:false,
		processData:false,
		//data:$('#frmAgregarArchivo').serialize(),
		success:function(respuesta) {
			console.log(respuesta);
			respuesta = respuesta.trim();
			
			if (respuesta == 1) {
				$('#frmAgregarArchivo')[0].reset();
				$('#cargaTablaArchivo').load('vistas/archivos/tablaArchivo.php');
				swal(":D","Se agrego con exito!","success");
			} else {
				swal(":(","No se pudo agregar!","error");
			}
		}
	});
	return false;
}
function eliminarArchivo(idArchivo) {
	swal({
		title: "¿Esta seguro de eliminar este archivos ?",
		text: "Una vez eliminado no podra ser recuperado!",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	})
	.then((willDelete) => {
		if (willDelete) {
			$.ajax({
				type: "POST",
				data: "idArchivo=" + idArchivo,
				url: "procesos/archivos/eliminarArchivo.php",
				success:function(respuesta) {
					respuesta = respuesta.trim();
					if (respuesta == 1) {
						$('#cargaTablaArchivo').load('vistas/archivos/tablaArchivo.php');
						swal(":D","Se elimino con exito!","success");
					} else {
						swal(":(","No se pudo eliminar!","error");
					}
				}
			});
		} 
	});
}
