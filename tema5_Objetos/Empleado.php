<?php

require_once 'Persona.php';

/**
 * Description of Empleado
 *
 * @author nurie
 */
class Empleado extends Persona {
   protected $salario;
   
   public function __construct($nombre = "", $apell = "", $edad = 20, $sal = 0) {
       parent::__construct($nombre, $apell, $edad);
       $this->salario=$sal;
   }
   
   public function __toString() {
      return parent::__toString().$this->salario;
   }
}
