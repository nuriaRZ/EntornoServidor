<?php
require_once 'Animal.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Canario
 *
 * @author nurie
 */
class Canario extends Ave {
    protected $color;
            
    function __construct($nombre, $edad, $huevos, $color) {
        parent::__construct($nombre, $edad, $huevos);
        $this->color=$color;
    }


    function cantar(){
        return "canto";
    }


    function __get($name) {
        parent::__get($name);
    }
    
    function __set($name, $value) {
        parent::__set($name, $value);
    }
    
    function __toString() {
       return parent::__toString()." soy de color ".$this->color;
    }
}
