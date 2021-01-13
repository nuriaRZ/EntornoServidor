<?php
require_once 'model/Conexion.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Producto
 *
 * @author nurie
 */
class Producto {
    private $cod;    
    private $nombre_corto;
    private $descripcion;
    private $pvp;    
    
    public function __construct($cod="", $nombre_corto="", $pvp="") {
        $this->cod=$cod;
        
        $this->nombre_corto= $nombre_corto;
        $this->pvp=$pvp;
        
    }
    
    public function nuevoProducto($cod, $nombre_corto, $pvp) {
        $this->cod=$cod;
     
        $this->nombre_corto= $nombre_corto;
        $this->pvp=$pvp;
    
    }
    
   public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        $this->$name = $value;
    }
    

        public function __toString() {
        return "Cod: ".$this->codigo." nombre ".$this->nombre_corto." Precio: ".$this->pvp." Descripcion: ".$this->descripcion;
    }    
    
    
}
