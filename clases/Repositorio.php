<?php
require_once '.env.php';

class Repositorio
{
    private static $conexion = null;
    public function __construct()
    {
        if (is_null(self::$conexion)) {
            $credenciales = credenciales();
            self::$conexion = new mysqli(
                $credenciales['host'], 
                $credenciales['user'], 
                $credenciales['password'], 
                $credenciales['dbname'], 
                $credenciales['port'], 
                $credenciales['socket']
            );
            if (self::$conexion->connect_error) {
                $error = 'Error de conexión: ' . self::$conexion->connect_error;
                self::$conexion = null;
                die($error);
            }
            self::$conexion->set_charset('utf8');
        }
    }
}
