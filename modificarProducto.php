<?php
require_once 'clases/ControladorSesion.php';

$repoP = new ControladorSesion;

if (isset($_GET['id']))
{
    $id = $_GET['id'];
    $p = $repoP->traerProducto($id);
}

if (isset($_POST['nombre']) && isset($_POST['precio']) && isset($_POST['cantidad'])){
    $p = $repoP->editarProducto($_POST['nombre'], $_POST['precio'], $_POST['cantidad'],$_POST['id']);
    return header('Location:lista.php');
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
            <h1><?php echo $p->getNombre()?></h1>
            
        </div>
        <dev class="text-center">
            <form action="modificarProducto.php" method="post">
                <input name="id" type = "hidden" value="<?php echo $p->getId()?>">
                <input name="nombre" class="form-control form-control-lg" value="<?php echo $p->getNombre()?>"><br>
                <input name="precio" type="number" class="form-control form-control-lg" value="<?php echo $p->getNombre()?>"><br>
                <input name="cantidad" type="number" class="form-control form-control-lg" value="<?php echo $p->getNombre()?>"><br>
                <input type="submit" value="modificar" class="btn btn-primary">
            </form>
            <br>    
            <p><a href="lista.php">volver a lista</a></p>
            <p><a href="home.php">volver a perfil</a></p>
        </div> 
    </body>
</html>