<?php

require_once 'RepositorioUsuario.php';
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
        $id = $Usuario->getId();
        if ($RepositorioUsuario->modificar($email, $id)===true){
            $Usuario->setEmail($email);
            return "operacion realizada exitosamente" ;
        }else{
            return "operacion no realizada";
        };
    }
}
