<?php

require_once 'RepositorioUsuario.php';
require_once 'RepositorioProducto.php';
require_once 'Usuario.php';

class ControladorSesion
{
    protected $usuario = null;
    protected $producto = null;
    
        /* TABLA USUARIO */

    public function login($nombre_usuario, $clave)
    {
        $repo = new RepositorioUsuario();
        $usuario = $repo->login($nombre_usuario, $clave);

        if ($usuario === false) {
            //Falló el login
            return [ false, "Error de credenciales" ];
        } else {
            //Login correcto, ingresar al sistema
            session_start();
            $_SESSION['usuario'] = serialize($usuario);
            return [ true, "Usuario correctamente autenticado"];
        }
    }

    public function create($nombre_usuario, $nombre, $apellido, $email, $clave)
    {
        $repo = new RepositorioUsuario();
        $usuario = new Usuario($nombre_usuario, $nombre, $apellido, $email);
        $id = $repo->save($usuario, $clave);
        if ( $id === false) {
            return [false, "Error al crear el usuario"];
        } else {
            $usuario->setId($id);
            session_start();
            $_SESSION['usuario'] = serialize($usuario);
            return [true, "Usuario creado correctamente"];
        }
    }

    public function modificarMail($email){
        $repo = new RepositorioUsuario();
        
        session_start();
        $usuario = unserialize($_SESSION['usuario']);
        $id=$usuario->getId();
        $Mmail = $repo->modificar($email, $id);
        
        if ($Mmail===true){
            $usuario->setEmail($email);
            $_SESSION['usuario']= serialize($usuario);
            return true;
        }else{
            return false;
        };
    }

            /* TABLA PRODUCTO*/

    public function createProducto($nombre, $precio, $cantidad){
        $repoP = new RepositorioProducto;

        session_start();
        $usuario = unserialize($_SESSION['usuario']);
        $idUsuario=$usuario->getId();

        $producto = $repoP->create($nombre,$precio,$cantidad,$idUsuario);
        
        session_start();
        $_SESSION['producto'][2] = serialize($producto);
    }

    public function listarProductos(){
        $repoP = new RepositorioProducto;
        return $respuesta = $repoP->read();
    }

    public function editarProducto($nombre, $precio, $cantidad, $id){
        $repoP = new RepositorioProducto();

        $respuesta = $repoP->update ($nombre, $precio, $cantidad, $id);
        if ($respuesta === true){
            session_start();
            $producto= unserialize($_SESSION['producto']);
            $producto->setNombre($nombre);
            $producto->setPrecio($precio);
            $producto->setCantidad($cantidad);
            $_SESSION['producto'] = serialize($producto);
            return true;
        };

    }

    public function eliminarProducto(){
        $repoP = new RepositorioProducto();


    }

}
