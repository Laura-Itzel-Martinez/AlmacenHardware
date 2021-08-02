<?php include "header.php"; ?>

<?php
    session_start();
    $operacion = "";
    if (isset($_SESSION['operacion'])) {
        $operacion = $_SESSION['operacion'];
        unset($_SESSION['operacion']);
    }
?>

<div class="container">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <h1 class="font-weight-light">Almacen de Hardware</h1>
            <p class="lead">
                <div class="row">
                    <div class="col">
                        <form action="servidor/agregarHardware.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-12">

                                    <label for="nombre">Nombre:</label>
                                    <input type="text" required class="form-control" name="nombre">

                                    <label for="modelo">Modelo</label>
                                    <input type="text" required class="form-control" name="modelo">

                                    <label for="numeroSerie">Numero de serie</label>
                                    <input type="text" required class="form-control" name="numeroSerie">

                                    <label for="capacidad">Capacidad</label>
                                    <input type="text" required class="form-control" name="capacidad">

                                    <label for="descripcion"> Descripcion</label>
                                    <textarea name="descripcion" 
                                    cols="30" 
                                    rows="5" 
                                    class="form-control" 
                                    required></textarea>

                                    <label>Imagen de hardware</label>
                                    <input type="file" name="miImagen" class="form-control" required>

                                    <br>
                                    <button class="btn btn-info">Agregar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                    <div id ="cargaTablaArchivo"></div>   
                    </div>
                </div>
            </p>
        </div>
    </div>
</div>

<?php include "footer.php" ?>


<script>
    $('#cargaTablaArchivo').load('tablaHardware.php');
    let operacion = "<?php echo $operacion; ?>";


    if (operacion == "insert") {
        Swal.fire(":D", "Agregado con exito!", "success");
    } else if(operacion == "error") {
        Swal.fire(":(", "Error al agregar!", "error");
    } else if (operacion == "delete") {
        Swal.fire(":D", "Eliminado con exito!", "info");
    } else if (operacion == "error2") {
        Swal.fire(":(", "Error al eliminar!", "error");
    }

</script>