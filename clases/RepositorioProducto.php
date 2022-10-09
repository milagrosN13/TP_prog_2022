<?php
require_once 'Repositorio.php';
require_once 'Producto.php';

class RepositorioUsuario extends Repositorio
{
    public function __construct()
    {
        parent::__construct();
    }

    public function create () {
        $q = "INSERT INTO productos (nombre,precio,cantidad,usuario)";
        $q.= "VALUES (?, ?, ?, ?)";

        $query = self::$conexion->prepare($q);

        $nombre = $producto->getNombre();
        $precio = $producto->getPrecio();
        $cantidad = $producto->getCantidad();
        $usuario = $producto->getUsuario();

        $query->bind_param(
            "siis",
            $nombre,
            $precio,
            $cantidad,
            $usuario
        );
        if ($query->execute()) {
           // Se guardó bien, retornamos el id del producto
            return self::$conexion->insert_id;
        } else {
           // No se guardó bien, retornamos false
            return false;
        }

    }

    public function read (){
        
    }

    public function update (){
        
    }

    public function delete (){
        
    }
}
/*$q = "INSERT INTO usuarios (usuario, clave, nombre, apellido, email) ";
        $q.= "VALUES (?, ?, ?, ?, ?)";
        $query = self::$conexion->prepare($q);
        $nombre_usuario = $usuario->getUsuario();
        $nombre = $usuario->getNombre();
        $apellido = $usuario->getApellido();
        $email = $usuario->getEmail();
        $clave_encriptada = password_hash($clave, PASSWORD_DEFAULT);
        $query->bind_param(
            "ssss",
            $nombre_usuario,
            $nombre,
            $apellido,
            $email,
            $clave_encriptada
        );
        if ($query->execute()) {
           // Se guardó bien, retornamos el id del usuario
            return self::$conexion->insert_id;
        } else {
           // No se guardó bien, retornamos false
            return false;
        }
        */