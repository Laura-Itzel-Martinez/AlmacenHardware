$(document).ready(function(){

	$('#cargaTablaCategorias').load('vistas/categorias/tablaCategoria.php');
	$('#btnGuardarCategoria').click(function(){

		if ($('#nombreCategoria').val() == "") {
			swal("Debes agregar un nombre de categoria!");
			return false;
		}

		agregarNuevaCategoria();
	});
	


});
function agregarNuevaCategoria() {
	$.ajax({
		type:"POST",
		url: "procesos/categorias/agregarCategoria.php",
		data:$('#frmAgregarCategoria').serialize(),
		success:function(respuesta) {
			respuesta = respuesta.trim();
			if (respuesta == 1) {
				$('#frmAgregarCategoria')[0].reset();
				$('#cargaTablaCategorias').load('vistas/categorias/tablaCategoria.php');
				swal(":D","Se agrego con exito!","success");
			} else {
				swal(":(","No se pudo agregar!","error");
			}
		}
	});
	return false;
}
function eliminarCategoria(idCategoria) {
	swal({
		title: "¿Esta seguro de eliminar esta categoria?",
		text: "Una vez eliminado no podra ser recuperado!",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	})
	.then((willDelete) => {
		if (willDelete) {
			$.ajax({
				type: "POST",
				data: "idCategoria=" + idCategoria,
				url: "procesos/categorias/eliminarCategoria.php",
				success:function(respuesta) {
					respuesta = respuesta.trim();
					if (respuesta == 1) {
						$('#cargaTablaCategorias').load('vistas/categorias/tablaCategoria.php');
						swal(":D","Se elimino con exito!","success");
					} else {
						swal(":(","No se pudo eliminar!","error");
					}
				}
			});
		} 
	});
}
