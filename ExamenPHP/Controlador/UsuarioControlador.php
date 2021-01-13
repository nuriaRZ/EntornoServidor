<?php
require_once 'Modelo/Conexion.php';
require_once 'Modelo/Usuario.php';

class UsuarioControlador {
    public static function buscarCliente($dni, $clave, &$errores){
     try{
        $conex = new Conexion();        
        $result = $conex->prepare("SELECT * FROM usuarios WHERE DNI=? and clave=?");
        $clave= md5($clave);
        $result->execute([$dni, $clave]);
         if ($result->rowCount()){
             $row = $result->fetchObject();
             $u = new Usuario($row->Nombre, $row->Direccion, $row->Telefono, $row->DNI, $row->clave, $row->intentos, $row->bloqueo);
             return $u;
         }
         unset($result);
         
    } catch (PDOException $ex) {
        $errores[]=$ex->getMessage();
    }   
    unset($conex);
    }
    
    public static function buscarUsuarioCuenta($dni){
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM usuarios WHERE DNI='$dni'");
            if ($result->rowCount()) {
                $row = $result->fetchObject();
                $u = new Usuario($row->Nombre, $row->Direccion, $row->Telefono, $row->DNI, $row->clave, $row->intentos, $row->bloqueo);
                
                return $u;
            } else
                return false;
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($conex);
    }
    
    public static function modificarIntentos($dni, $intentos) {
        try {
            $conex = new Conexion();
            $conex->exec("UPDATE usuarios SET intentos = '$intentos' WHERE DNI='$dni'");
            
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($conex);
    }
}

