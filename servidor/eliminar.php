<?php
    session_start();
    $idAlmacen = $_POST['idEliminar'];
    
    include "conexion.php";
    $conexion = conexion();

    $sql = "DELETE FROM t_almacen WHERE id_almacen = '$idAlmacen'";
    $respuesta = mysqli_query($conexion, $sql);

    if ($respuesta) {
        $_SESSION['operacion'] = "delete";
    } else {
        $_SESSION['operacion'] = "error2";
    }
    header("location:../index.php");
