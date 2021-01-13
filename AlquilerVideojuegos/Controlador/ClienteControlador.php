<?php
require_once 'Modelo/Conexion.php';
require_once 'Modelo/Cliente.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClienteControlador
 *
 * @author nurie
 */
class ClienteControlador {
        public static function buscarCliente($dni, $clave, &$errores){
     try{
        $conex = new Conexion();        
        $result = $conex->prepare("SELECT * FROM cliente WHERE DNI=? and Clave=?");
        $clave= md5($clave);
        $result->execute([$dni, $clave]);
         if ($result->rowCount()){
             $row = $result->fetchObject();
             $c = new Cliente($row->DNI, $row->Nombre, $row->Apellidos, $row->Direccion, $row->Localidad, $row->Clave, $row->Tipo);
             return $c;
         }
         unset($result);
         
    } catch (PDOException $ex) {
        $errores[]=$ex->getMessage();
    }   
    unset($conex);
    }
    
    public static function buscarClienteAlquilado($dni){
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM cliente WHERE DNI='$dni'");
            if ($result->rowCount()) {
                $row = $result->fetchObject();
                $c = new Cliente($row->DNI, $row->Nombre, $row->Apellidos, $row->Direccion, $row->Localidad, $row->Clave, $row->Tipo);
                
                return $c;
            } else
                return false;
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($conex);
    }
 
    
    
}
