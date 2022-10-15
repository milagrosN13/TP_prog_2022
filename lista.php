<?php
/*require_once 'clases/Usuario.php';
session_start();
if (isset($_SESSION['producto'])) {
    $usuario = unserialize($_SESSION['producto']);
    //$lista = $producto->getNombre();
} else {
    header('Location: index.php');
}*/
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>lista</title>
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <body class="container">
        <div class="jumbotron text-center">
            <h1>Lista</h1>
        </div>
        <div class="text-center">
            <p><a href="home.php">volver a perfil</a></p>
        </div> 
    </body>
</html>