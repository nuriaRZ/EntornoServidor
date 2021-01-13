<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vehiculo
 *
 * @author nurie
 */
class Vehiculo {
      private static $kmTotal = 0;
      private static $vehiculosCreados = 0;
      protected $marca;
      protected $modelo;
      protected $km;
      
      function __construct($marca, $modelo) {
          $this->marca=$marca;
          $this->modelo=$modelo;
          $this->km=0;
      }
      
      public static function getVehiculosCreados() {
        return self::$vehiculosCreados;
    }
    
    public function __destruct() {
        self::$vehiculosCreados--;
    }
      
      function __get($name) {
        return $this->$name;
    }
    function __set($name, $value) {
        $this->$name=$value;
    }
    
    function andar($km){
        $this->km += $km;
        Vehiculo::$kmTotal += $km;
        return "El vehiculo ".$this->marca." recorre ".$this->km;
    }
    
    static function getKmTotal() {
        return self::$kmTotal;
    }

    static function setKmTotal($kmTotal): void {
        self::$kmTotal = $kmTotal;
    }

    

    function __toString() {
        return "Marca: ".$this->marca." Modelo: ".$this->modelo. " Km: ".$this->km;
    }
}
