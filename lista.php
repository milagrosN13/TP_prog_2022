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
            <p><a href="agregarProducto.php">agregar</a></p>
            <p><a href="home.php">volver a perfil</a></p>
            <p><table>
                <tr>
                    <td>Nombre</td>
                    <td>Precio</td>
                    <td>Cantidad</td>
                </tr>
                <?php
                foreach ($Lproductos as $p) {
                    echo
                    '<tr>    
                        <td>'.$p->getNombre().'</td>
                        <td>'.$p->getPrecio().'</td>
                        <td>'.$p->getCantidad().'</td>';
                    echo '
                        <td><a href="modificarProducto.php?id='.$p->getId().'">modificar</a></td>
                        <td><a href="eliminarProducto.php?id='.$p->getId().'">eliminar</a></td>
                    </tr>';
                };
                ?>
            </table><p>
            <?php
            $total = 0;
            $cantidad = 0;
                foreach ($Lproductos as $p) {
                    //mostrar sumade precios y cantidades 
                    $total += $p->getPrecio();
                    $cantidad += $p->getCantidad();
                };
                echo '<p>El precio total es: '.$total.' y los productos a comprar '.$cantidad.'</p>';
                ?>
        </div> 
    </body>
</html>