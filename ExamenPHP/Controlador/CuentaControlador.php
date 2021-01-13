<?php
require_once 'Modelo/Conexion.php';
require_once 'Modelo/Cuenta.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CuentaControlador
 *
 * @author nurie
 */
class CuentaControlador {
   public static function recuperarTodasUsuario($dni) {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM cuentas where dni_cuenta='$dni'");
            if ($result->rowCount()) {
                
                $c = new Cuenta();
                while ($row = $result->fetchObject()) {                   
                    $c->nuevaCuenta($row->iban, $row->saldo, $row->dni_cuenta);

                    
                    $cuentas[] = clone($c);
                    $c = new Cuenta($row->iban, $row->saldo, $row->dni_cuenta);
                }
                
                return $cuentas;
            } else
                return false;
        } catch (PDOException $ex) {
           
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($conex);
    }

    
     public static function recuperarUnaCuentaUsuario($dni, $iban){
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM cuentas WHERE dni_cuenta='$dni' and iban='$iban'");
            if ($result->rowCount()) {
                $row = $result->fetchObject();
                $c = new Cuenta($row->iban, $row->saldo, $row->dni_cuenta);
                
                return $c;
            } else
                return false;
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($conex);
    }
    
    public static function recuperarTodas() {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM cuentas, usuarios where dni_cuenta=DNI");
            if ($result->rowCount()) {
                
                $c = new Cuenta();
                while ($row = $result->fetchObject()) {                   
                    $c->nuevaCuenta($row->iban, $row->saldo, $row->dni_cuenta);

                    
                    $cuentas[] = clone($c);
                    $c = new Cuenta($row->iban, $row->saldo, $row->dni_cuenta);
                }
                
                return $cuentas;
            } else
                return false;
        } catch (PDOException $ex) {
           
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($conex);
    }
    
    public static function CambiarSaldoCuenta($iban, $saldo) {
        try {
            $conex = new Conexion();
            $conex->query("UPDATE cuentas SET saldo='$saldo' WHERE iban ='$iban'");
           
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos');
            //mata el programa
        }
        unset($conex);
    }
    
     public static function buscarCuenta($iban){
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM cuentas WHERE iban='$iban'");
            if ($result->rowCount()) {
                $row = $result->fetchObject();
                $c = new Cuenta($row->iban, $row->saldo, $row->dni_cuenta);
                
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
