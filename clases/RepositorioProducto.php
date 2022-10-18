<?php
require_once 'Repositorio.php';
require_once 'Producto.php';

class RepositorioProducto extends Repositorio
{

    public function create ($nombre,$precio,$cantidad,$idUsuario) {

        $q = "INSERT INTO productos (nombre,precio,cantidad,id_usuario)";
        $q.= "VALUES (?, ?, ?, ?)";

        $query = self::$conexion->prepare($q);

        $query->bind_param(
            "siis",
            $nombre,
            $precio,
            $cantidad,
            $idUsuario
        );
        if ($query->execute()) {
           // Se guardó bien, retornamos el id del producto
            new Producto ($nombre, $precio, $cantidad, $usuario, $id = (self::$conexion->insert_id));
            return true;
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