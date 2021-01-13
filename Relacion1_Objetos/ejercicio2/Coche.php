<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Coche
 *
 * @author nurie
 */
class Coche extends Vehiculo {
    protected $color;
    protected $matricula;
    
    function __construct($marca, $modelo, $color, $matricula) {
        parent::__construct($marca, $modelo);
        $this->matricula = $matricula;
        $this->color = $color;
    }
    function __get($name) {
        return $this->$name;
    }
    function __set($name, $value) {
        $this->$name=$value;
    }
    public function quemarRueda() {
      return "El coche con matricula ".$this->matricula." quema rueda<br>";
    }    
    function __toString() {
        return parent::__toString()." Matricula: ".$this->matricula." Color: ". $this->color."<br>";
    }
    
}
