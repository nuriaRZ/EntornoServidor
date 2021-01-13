<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cliente
 *
 * @author nurie
 */
class Cliente {
    private $dni;
    private $nombre;
    private $apellidos;
    private $direccion;
    private $localidad;
    private $clave;
    private $tipo;
    
    public function __construct($dni="", $nombre="", $apellidos="", $direccion="", $localidad="", $clave="", $tipo=""){
        $this->dni=$dni;
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
        $this->direccion=$direccion;
        $this->localidad=$localidad;
        $this->clave=$clave;
        $this->tipo=$tipo;
    }
    
    public function nuevoCliente($dni, $nombre, $apellidos, $direccion, $localidad, $clave, $tipo) {
        $this->dni=$dni;
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
        $this->direccion=$direccion;
        $this->localidad=$localidad;
        $this->clave=$clave;
        $this->tipo=$tipo;
    }
    
    public function __set($name, $value) {
        $this->name=$value;
    }
    
       public function __get($name) {
        return $this->$name;
    }
}
