<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Animal
 *
 * @author nurie
 */
class Animal {
    protected $nombre;
    protected $edad;
    
    function __construct($nombre, $edad) {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }
    
    function comer() {
        return "Como";
    }
    
    function dormir() {
        return "Duermo";
    }
    
    function __get($name) {
        return $this->$name;
    }
    function __set($name, $value) {
        $this->$name=$value;
    }
    
    function __toString() {
        return "Me llamo ".$this->nombre." y tengo ".$this->edad." años.";
    }
    
    
    


    
    
}
