<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author nurie
 */
class Usuario {
    private $usuario;
    private $password;
    
    function __construct($usuario, $password) {
        $this->usuario=$usuario;
        $this->password=$password;
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        $this->$name = $value;
    }
    
    public function __toString() {
      return "Usuario: ".$this->usuario." Pass: ".$this->password  ;
    }
}
