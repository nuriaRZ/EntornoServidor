<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author nurie
 */
class Usuario {
    private $nombre;
    private $direccion;
    private $telefono;
    private $dni;
    private $clave;
    private $intentos;
    private $bloqueado;
    
    function __construct($nombre="", $direccion="", $telefono="", $dni="", $clave="", $intentos="", $bloqueado="") {
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->dni = $dni;
        $this->clave = $clave;
        $this->intentos = $intentos;
        $this->bloqueado = $bloqueado;
    }
    function nuevoUsuario($nombre, $direccion, $telefono, $dni, $clave, $intentos, $bloqueado){
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->dni = $dni;
        $this->clave = $clave;
        $this->intentos = $intentos;
        $this->bloqueado = $bloqueado;
    }
    
     public function __set($name, $value) {
        $this->name=$value;
    }
    
       public function __get($name) {
        return $this->$name;
    }
            
}
