<?php
  session_start();

    $idAlmacen = $_POST['idEliminar'];
    
    $nombre = $_POST['nombre'];
    $modelo=$_POST['modelo'];
    $numeroSerie=$_POST['numeroSerie'];
    $capacidad=$_POST['capacidad'];
    $descripcion=$_POST['descripcion'];

    include "conexion.php";
    $conexion=conexion();

    $sql = "UPDATE t_almacen SET nombre = '$nombre',
                                modelo,='$modelo',
                                numero_serie= '$numeroSerie' ,
                                capacidad = '$capacidad' ,
                                descripcion = '$descripcion'
                                WHERE id_almacen ='$idAlmacen'";

$respuesta = mysqli_query($conexion, $sql);

if ($respuesta) {
    header("location:../index.php");
} else {
   
    echo "No se pudo actualizar :(";
}

?>

    