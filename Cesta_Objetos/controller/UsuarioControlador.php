<?php
require_once 'model/Conexion.php';
require_once 'model/Usuario.php';
class UsuarioControlador {
    public static function buscarUsuario($usuario, $password, &$errores){
     try{
        $conex = new Conexion();        
        $result = $conex->prepare("SELECT * FROM usuario WHERE usuario=? and password=?");
        $password= md5($password);
        $result->execute([$usuario, $password]);
         if ($result->rowCount()){
             $row = $result->fetchObject();
             $u = new Usuario($row->usuario, $row->password);
             return $u;
         }
         unset($result);
         
    } catch (PDOException $ex) {
        $errores[]=$ex->getMessage();
    }   
    unset($conex);
    }

    
}
