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
                
                <tr>
                    <td>Nombre</td>
                    <td>Precio</td>
                    <td>Cantidad</td>
                </tr>
                <?php
                foreach ($Lproductos as $p) {
                    $ids = [];
                    $ids = $p->getId();
                    echo
                    '<tr>    
                        <td>'.$p->getNombre().'</td>
                        <td>'.$p->getPrecio().'</td>
                        <td>'.$p->getCantidad().'</td>
                    </tr>';
                };
                ?>
            </table><p>
            <p><a href="modificarProducto.php">modificar</a></p>
            <p><a href="eliminarProducto.php">eliminar</a></p>
            <p><a href="agregarProducto.php">agregar</a></p>
            <p><a href="home.php">volver a perfil</a></p>
        </div> 
    </body>
</html>