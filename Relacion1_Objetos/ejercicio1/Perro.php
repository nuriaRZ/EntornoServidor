<?php
require_once 'Animal.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Perro
 *
 * @author nurie
 */
class Perro extends Mamifero {
    protected $raza;
    
    public function __construct($nombre, $edad, $colorPelo, $raza) {
        parent::__construct($nombre, $edad, $colorPelo);
        $this->raza=$raza;
    }
    function ladrar(){
        return "guau";
    }
    function morder(){
        return "muerdo";
    }
    function __get($name) {
        parent::__get($name);
    }
    function __set($name, $value) {
        parent::__set($name, $value);
    }
    function __toString() {
       return parent::__toString()." soy un ".$this->raza;
    }
}
