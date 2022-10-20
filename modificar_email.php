<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>modificar email</title>
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <body class="container">
        <div class="jumbotron text-center">
            <h1>Sistema bancario</h1>
        </div>    
        <div class="text-center">
            <form action="modificar_email.php" method="get">
            <input name="email" class="form-control form-control-lg" placeholder="Ingrese el nuevo email"><br>
            <input type="submit" value="Modificar" class="btn btn-primary">
            </form>
            <br>
            <button><a href="home.php">volver a perfil</a></button>
        </div>
    </body>
</html>

<?php 
require_once 'clases/ControladorSesion.php';

$cs = new ControladorSesion();

if (isset($_GET['email'])){
    return $cs->modificarMail($_GET['email'],);
}else {
    return $aleta = "no se pudo realizar";
}
?>
