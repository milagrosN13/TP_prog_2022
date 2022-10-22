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
            $query->bind_result($id, $nombre, $precio, $cantidad, $idUsuario);
            $lista_de_productos = [];
            while ($query->fetch() ) {
                $lista_de_productos[] = new Producto($nombre, $precio, $cantidad, $idUsuario, $id);
                
            }
            return $lista_de_productos;
        }
    }

    public function update ($nombre, $precio, $cantidad, $id){
        $q = 'UPDATE productos SET nombre= ? , precio = ?, cantidad = ? WHERE id= ?';
        $query = self::$conexion->prepare($q);
        $query->bind_param(
            "siii",
            $nombre,
            $precio,
            $cantidad,
            $id
        );
        if ($query->execute()){

        } 
    }

    public function delete ($idProducto){
        $q = "DELETE FROM producto WHERE id = ?";

        $query = self::$conexion->prepare($q);

        $query->bind_param("i",$idProducto);
    }
}
