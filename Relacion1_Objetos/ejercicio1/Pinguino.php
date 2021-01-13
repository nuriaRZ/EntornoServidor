<?php
require_once 'Animal.php';
require_once 'Ave.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pinguino
 *
 * @author nurie
 */
class Pinguino extends Ave {
    protected $tamaño;
    
    public function __construct($nombre, $edad, $huevos,$tamaño) {
        parent::__construct($nombre, $edad, $huevos);
        $this->tamaño=$tamaño;
    }


    function nadar(){
        return "estoy nadando";
    }
    
    


    function __get($name) {
        parent::__get($name);
    }
    

    function __set($name, $value) {
        parent::__set($name, $value);
    }
    
    function __toString() {
      return  parent::__toString()." y soy ".$this->tamaño;
    }
        
    

   
}
