<?php
    session_start();
    include "conexion.php";

    $nombre = $_POST['nombre'];
    $modelo=$_POST['modelo'];
    $numeroSerie=$_POST['numeroSerie'];
    $capacidad=$_POST['capacidad'];
    $descripcion=$_POST['descripcion'];
  

    $nombreArchivo = $_FILES['miImagen']['name'];
    $extension = explode(".", $nombreArchivo);
    $extension = $extension[1];
    $rutaTemporal = $_FILES['miImagen']['tmp_name'];
    $rutaDeServidor = "../hardware/";

    $conexion=conexion();

    $sql = "INSERT INTO t_almacen (nombre
                                    ,modelo,
                                    numero_serie,
                                    capacidad,
                                    descripcion,
                                    nombreImagen,
                                    extension) 

                        VALUES ('$nombre', 
                        '$modelo', 
                        '$numeroSerie',
                        '$capacidad',
                        '$descripcion', 
                        '$nombreArchivo',
                        '$extension')";

$respuesta = mysqli_query($conexion, $sql);

if (move_uploaded_file($rutaTemporal, $rutaDeServidor. $nombreArchivo)) {
    
    if ($respuesta) {
        $_SESSION['operacion'] = "insert";
    } else {
        $_SESSION['operacion'] = "error";
    }
}
    header("location:../index.php")
    
?>

    