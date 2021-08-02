<?php

    $foto = $_GET['nombre'];

    $ruta =  "hardware/" . $foto;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>imagen completa</title>
</head>
<body>
    <img src="<?php echo $ruta; ?>" alt="">
</body>
</html>