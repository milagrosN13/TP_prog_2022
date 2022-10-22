<?php
require_once 'clases/ControladorSesion.php';

$repoP = new ControladorSesion;

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];

if (isset($nombre) && isset($precio) && isset($cantidad) && isset($id)){
    return $repoP->editarProducto($_POST['nombre'], $_POST['precio'], $_POST['cantidad'], $_POST['id']);
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>modificar producto</title>
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <body class="container">
        <div class="jumbotron text-center">
            <h1><?php echo $nombre;?></h1>
            
        </div>
        <dev class="text-center">
            <form action="modificarProducto.php" method="post">
                <input name="nombre" class="form-control form-control-lg" placeholder="<?php echo $nombre ?>"><br>
                <input name="precio" type="number" class="form-control form-control-lg" placeholder="<?php echo $precio ?>"><br>
                <input name="cantidad" type="number" class="form-control form-control-lg" placeholder="<?php echo $cantidad ?>"><br>
                <input type="submit" value="modificar" class="btn btn-primary">
            </form>
            <br>    
            <p><a href="lista.php">volver a lista</a></p>
            <p><a href="home.php">volver a perfil</a></p>
        </div> 
    </body>
</html>