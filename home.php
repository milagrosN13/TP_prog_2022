<?php
require_once 'clases/Usuario.php';
session_start();
if (isset($_SESSION['usuario'])) {
    $usuario = unserialize($_SESSION['usuario']);
    $nomApe = $usuario->getNombreApellido();
    $email = $usuario->getEmail();
} else {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Sistema bancario</title>
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <body class="container">
      <div class="jumbotron text-center">
      <h1>Sistema bancario</h1>
      </div>    
      <div class="text-center">
        <h3>Hola <?php echo $nomApe;?> </h3>
        <!--no se cambia el mail del la clase usuario al modificarlo con la funcion modificar mail-->
        <p>su mail es: <?php echo $email;?><p>
        <h3><a href="lista.php">lista</a></h3>
        <a href="modificar_email.php">modificar email</a>
        <p><a href="logout.php">Cerrar sesión</a></p>
      </div> 
    </body>
</html>

