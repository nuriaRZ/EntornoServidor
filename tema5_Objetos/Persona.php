<?php

class Persona {
    protected $nombre;
    protected $apell;
    protected  $edad;   
    private static $numpersona=0;
    
    function __construct($nombre="", $apell="", $edad=20) {
        $this->nombre = $nombre;
        $this->apell = $apell;
        $this->edad = $edad;
        self::$numpersona++;
    }
    
    public static function personas() {
        return self::$numpersona;
    }
    
    public function __destruct() {
        self::$numpersona--;
    }
    
    public function __clone() {
        $this->edad=0;
    }
    
    
            
    function __get($name) {
        return $this->$name;
    }
    function __set($name, $value) {
        $this->$name=$value;
    }
    function __toString() {
        return "Soy ".$this->nombre." ".$this->apell." y tengo ".$this->edad." años.";
    }
    function __call($name, $arguments) {
        if($name=="muestra"){
            if(count($arguments)==1){
                $this->nombre=$arguments[0];                
            }
            if(count($arguments)==2){
                $this->nombre=$arguments[0];
                $this->apell=$arguments[1];
            }
        }    
    }


}
