
<?php

$idAlmacen = $_POST['idEliminar'];

include "servidor/conexion.php";
$conexion = conexion();
$sql = "SELECT * FROM t_almacen WHERE id_almacen = '$idAlmacen'";
$respuesta = mysqli_query($conexion, $sql);
$datos = mysqli_fetch_array($respuesta);

?>


<?php
    session_start();
    $operacion = "";
    if (isset($_SESSION['operacion'])) {
        $operacion = $_SESSION['operacion'];
        unset($_SESSION['operacion']);
    }
?>
<?php include "header.php"; ?>
<div class="container">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <h1 class="font-weight-light">Actualizar Hardware</h1>
            <p class="lead">
                <div class="row">
                    <div class="col">
                        <form action="servidor/actualizarHardware.php" method="POST">
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="text" name="idEliminar" value="<?php echo $datos['id_almacen'] ?>" hidden>

                                    <label for="nombre">Nombre:</label>
                                    <input type="text" required class="form-control" name="nombre" value="<?php echo $datos['nombre'] ?>">

                                    <label for="modelo">Modelo</label>
                                    <input type="text" required class="form-control" name="modelo" value="<?php echo $datos['modelo'] ?>">

                                    <label for="numeroSerie">Numero de serie</label>
                                    <input type="text" required class="form-control" name="numeroSerie" value="<?php echo $datos['numero_serie'] ?>">

                                    <label for="capacidad">Capacidad</label>
                                    <input type="text" required class="form-control" name="capacidad" value="<?php echo $datos['capacidad'] ?>">

                                    <label for="descripcion"> Descripcion</label>
                                    <textarea name="descripcion" 
                                    cols="30" 
                                    rows="5" 
                                    class="form-control" 
                                    required><?php echo $datos['descripcion'] ?></textarea>

                                    <br>
                                    <button class="btn btn-warning">Actualizar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
                
            </p>
        </div>
    </div>
</div>

<?php include "footer.php" ?>


<script>
    let operacion = "<?php echo $operacion; ?>";

    if (operacion == "insert") {
        Swal.fire(":D", "Agregado con exito!", "success");
    } else if(operacion == "error") {
        Swal.fire(":(", "Error al agregar!", "error");
    } else if (operacion == "delete") {
        Swal.fire(":D", "Eliminado con exito!", "info");
    } else if (operacion == "error2") {
        Swal.fire(":(", "Error al eliminar!", "error");
    }else if(operacion== "udpate"){
        Swal.fire(":D", "Agregado con exito!", "success");
    }

</script>