<?php
require_once 'Animal.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mamifero
 *
 * @author nurie
 */
class Mamifero extends Animal {
    protected $colorPelo;    
    
    
    function __construct($nombre, $edad, $colorPelo) {
        parent::__construct($nombre, $edad);
        $this->colorPelo=0;
    }
    
    function correr(){
        return "estoy corriendo";
    }
    function amamantar() {
        return "Dar de comer a la cria";
    }
    function __get($name) {
        return $this->$name;
    }
    function __set($name, $value) {
        $this->$name=$value;
    }

    public function __toString() {
       return parent::__toString();
    }

    public function andar(): string {
        return parent::andar();
    }

    public function comer(): string {
        return parent::comer();
    }

    public function dormir(): string {
        return parent::dormir();
    }


}
