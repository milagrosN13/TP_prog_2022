<?php
class Producto
{
    protected $id;
    protected $nombre;
    protected $precio;
    protected $cantidad;
    protected $usuario;

    public function __construct($nombre, $precio, $cantidad, $usuario= null, $id = null)
    {
        $this->id = $id;
        $this->usuario = $usuario;
        
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->cantidad = $cantidad;
    }

    public function getId() {return $this->id;}
    public function getUsuario() {return $this->usuario;}
    public function setId($id) {$this->id = $id;}

    public function getNombre() {return $this->nombre;}
    public function setNombre($nombre) {$this->nombre = $nombre;}

    public function getPrecio() {return $this->precio;}
    public function setPrecio($precio) {$this->precio = $precio;}

    public function getCantidad() {return $this->precio;}
    public function setCantidad($cantidad) {$this->cantidad = $cantidad;}
}
