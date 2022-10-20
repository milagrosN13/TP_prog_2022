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
            return new Producto($nombre, $precio, $cantidad, $idUsuario);
            
        } else {
           // No se guardó bien, retornamos false
            return false;
        }

    }

    public function read(){
        $q = "SELECT id, nombre, precio, cantidad, id_usuario FROM productos";
        $query = self::$conexion->prepare($q);
        if ($query->execute()) {
            return /*resultado de la consulta en formato de lista */;
        }
    }

    public function update (){
        
    }

    public function delete ($idProducto){
        $q = "DELETE FROM producto WHERE id = ?";

        $query = self::$conexion->prepare($q);

        $query->bind_param("i",$idProducto);
    }
}
