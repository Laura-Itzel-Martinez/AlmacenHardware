<?php
    include "servidor/conexion.php";
    $conexion = conexion();
    $sql = "SELECT * FROM t_almacen";

    $respuesta = mysqli_query($conexion, $sql);

?>
<div class="container">
<table  class="table table-bordered table-hover table-responsive" id="tabla">
    <thead>
        <th>Nombre</th>
        <th>Modelo</th>
        <th>Numero de serie</th>
        <th>Capacidad</th>
        <th>Descripcion</th>
        <th>Imagen de hardware</th>
        <th>Actualizar</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
        <?php 
            while($mostrar = mysqli_fetch_array($respuesta)) {     
                
        ?>

        <tr>
        <td><?php echo $mostrar['nombre'];?></td>
            <td><?php echo $mostrar['modelo'];?></td>
            <td><?php echo $mostrar['numero_serie'];?></td>
            <td><?php echo $mostrar['capacidad'];?></td>
            <td><?php echo $mostrar['descripcion'];?></td>

            <td>
                <?php
                    $ext = $mostrar['extension'];
                    $imagen = '';
                    
                    if ($ext == "jpg") {
                        $cadenaImagen = '<img src=' . 'hardware/' . $mostrar['nombreImagen'] . ' width="50px" height="50px">';
                        echo '<a href="mostrarImagen.php?nombre=' . $mostrar['nombreImagen'] . '" target="_blank"> ' . $cadenaImagen . ' </a>';

                    }
                    
                ?>
            </td>
            <td>
                <form action="actualizar.php" method="POST">
                    <input type="text" hidden name="idEliminar" value="<?php echo $mostrar['id_almacen']?>">
                    <button class="btn btn-warning">Editar</button>
                </form>
            </td>
            <td>
                <form action="servidor/eliminar.php" method="POST">
                    <input type="text" hidden value="<?php echo $mostrar['id_almacen']; ?>" name="idEliminar">
                    <button class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>


</div>
<script >
	$(document).ready(function(){
		$('#tabla').DataTable();
	});
</script>
