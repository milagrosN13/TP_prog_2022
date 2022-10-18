<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>agregar a lista</title>
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <body class="container">
        <div class="jumbotron text-center">
            <h1>agregar producto</h1>
            
        </div>
        <div class="text-center">
        <div class="text-center">
        <?php
            if (isset($_GET['mensaje'])) {
                echo '<div id="mensaje" class="alert alert-primary text-center">
                    <p>'.$_GET['mensaje'].'</p></div>';
            }
        ?>

        <form action="agregarProducto.php" method="post">
            <input name="nombre" class="form-control form-control-lg" placeholder="nombre producto"><br>
            <input name="precio" class="form-control form-control-lg" placeholder="precio"><br>
            <input name="cantidad" class="form-control form-control-lg" placeholder="cantidad"><br>
            <input type="submit" value="crear" class="btn btn-primary">
        </form>
        <br>    
        </div> 
            <p><a href="lista.php">volver a lista</a></p>
            <p><a href="home.php">volver a perfil</a></p>
        </div> 
    </body>
</html>
<?php
require_once 'clases/ControladorSesion.php';

$cs = new ControladorSesion();

if (isset($_POST['nombre']) && isset($_POST['precio']) && isset($_POST['cantidad'])){
    return $cs->createProducto($_POST ['nombre'], $_POST['precio'], $_POST['cantidad']);
}else {
    return false."no se escribio nada";
}
?>