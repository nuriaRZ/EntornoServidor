<?php
require_once 'Animal.php';
require_once 'Mamifero.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Gato
 *
 * @author nurie
 */
class Gato extends Mamifero{
   private $raza;
    function __construct($nombre, $edad, $colorPelo, $raza) {
        parent::__construct($nombre, $edad, $colorPelo);
        $this->raza=$raza;
    }
    
    function maullar(){
        return "miau";
    }
    function arañar(){
        return "araño";
    }
    function __set($name, $value) {
        parent::__set($name, $value);
    }
    function __get($name) {
        parent::__get($name);
    }
    function __toString() {
      return  parent::__toString()." soy un ".$this->raza;
    }
}
