<?php
require_once 'Animal.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ave
 *
 * @author nurie
 */
class Ave extends Animal{          
    protected $huevos;
            
    function __construct($nombre, $edad, $huevos) {
        parent::__construct($nombre, $edad);        
        $this->huevos=$huevos;
    }
    
    function ponerHuevos($huevos){
        return "He puesto ".$huevos." huevos";
    }


    function volar() {
        return "Vuelo";
    }
    
   function __get($name) {
       parent::__get($name);
   }
   
   function __set($name, $value) {
       parent::__set($name, $value);
   }
   
   function __toString() {
     return  parent::__toString();
   }
   
        
    



}
