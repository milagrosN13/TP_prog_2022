<?php
require_once 'clases/ControladorSesion.php';

$repoP = new ControladorSesion;

$Lproductos = $repoP->listarProductos();

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
            <p><table>
                <?php
                foreach ($Lproductos as $p) {
                    echo
                    '<tr>
                        <td>'.$p['id'].'</td>
                        <td>'.$p['nombre'].'</td>
                        <td>'.$p['precio'].'</td>
                        <td>'.$p['cantidad'].'</td>
                    </tr>';
                };
                ?>
            </table><p>
        <p><a href="agregarProducto.php">agregar producto</a></p>
        <p><a href="home.php">volver a perfil</a></p>
        </div> 
    </body>
</html>