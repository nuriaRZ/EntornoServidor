<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bicicleta
 *
 * @author nurie
 */
class Bicicleta extends Vehiculo {
    protected $tipo;
    protected $color;
    
    function __construct($marca, $modelo, $tipo, $color) {
        parent::__construct($marca, $modelo);
        $this->tipo = $tipo;
        $this->color=$color;
    }
    
     function __get($name) {
        return $this->$name;
    }
    function __set($name, $value) {
        $this->$name=$value;
    }
    
    function caballito(){
        return "Haciendo caballito";
    }
    
    function __toString() {
        return parent::__toString(). " Tipo: ".$this->tipo. " Color: ". $this->color."<br>";
    }
    
}
