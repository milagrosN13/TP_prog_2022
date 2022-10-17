<?php

require_once 'RepositorioUsuario.php';
require_once 'RepositorioProducto.php';
require_once 'Usuario.php';

class ControladorSesion
{
    protected $usuario = null;

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
        $usuario = $_SESSION['usuario'];
        $id=$usuario->getId();
        $Mmail = $repo->modificar($email, $id);
        
        if ($Mmail===true){

            $usuario->setEmail($email);
            return true."operacion realizada exitosamente" ;
        }else{
            return false."operacion no realizada";
        };
    }

    public function createProducto($nombre, $precio, $cantidad)
    {
        $repoP = new RepositorioProducto();
        $producto = new Producto($nombre, $precio, $cantidad);
        $id = $repoP->create();
        
        if ( $id === false) {
            return [false, "Error al crear producto"];
        } else {
            $producto->setId($id);
            session_start();
            $_SESSION['producto'] = serialize($producto);
            return [true, "producto creado correctamente"];
        }
    }
}
