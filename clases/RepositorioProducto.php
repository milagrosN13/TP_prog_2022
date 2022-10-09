<?php
require_once 'Repositorio.php';
require_once 'Producto.php';

class RepositorioUsuario extends Repositorio
{
    private static $conexion = null;

    public function __construct()
    {
        parent::__construct();
    }
}