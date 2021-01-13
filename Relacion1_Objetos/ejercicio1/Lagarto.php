<?php
require_once 'Animal.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Lagarto
 *
 * @author nurie
 */
class Lagarto extends Animal{
    protected $especie;
    
    function __construct($nombre, $edad, $especie) {
        parent::__construct($nombre, $edad);
        $this->especie=$especie;
    }
    function trepar(){
        return "trepo por los árboles";
    }
    function __get($name) {
        parent::__get($name);
    }
    function __set($name, $value) {
        parent::__set($name, $value);
    }
    function __toString() {
       return  parent::__toString()." y soy de la especie ".$this->especie;
    }
}
