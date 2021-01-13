<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DadoPoker
 *
 * @author nurie
 */
class DadoPoker {
    private static $tiradas=0;
    private static $caras = array ("as", "K", "Q", "J", "7", "8");
    
    
    
     public static function getTiradas() {
      return self::$tiradas;
      
    }
    public static function setTiradas($tiradas) {
      self::$tiradas = $tiradas;
    }
    
    
    function tirar(){
        $tirada = rand(0,5);
        $cara = self::$caras[$tirada];
        self::$tiradas++;
        return $cara;
    }
    
    
}
