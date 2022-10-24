<?php
require_once 'clases/ControladorSesion.php';

$repoP = new ControladorSesion;

    $id = $_GET['id'];

    if ($_GET['id']){
        $repoP->eliminarProducto($id);
        return header('Location:lista.php');
    }
?>