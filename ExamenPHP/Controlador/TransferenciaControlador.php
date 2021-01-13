<?php
require_once 'Modelo/Conexion.php';
require_once 'Modelo/Transferencia.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TransferenciaControlador
 *
 * @author nurie
 */
class TransferenciaControlador {
     public static function nuevaTransferencia(Transferencia $t) {
        try {
            $conex = new Conexion();
            $conex->exec("INSERT INTO transferencias  VALUES ('$t->iban_origen','$t->iban_destino','$t->fecha', '$t->cantidad')");
            // si queremos que devuelva algo return;
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos');
            //mata el programa
        }
        unset($conex);
    }
    
    
    
    public static function recuperarTransferenciasUsuario($dni, $iban){
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM transferencias, usuarios, cuentas WHERE  dni_cuenta=DNI AND DNI='$dni' and (iban_origen='$iban' OR iban_destino='$iban') AND (iban_origen=iban OR iban_destino=iban)");
           if($result->rowCount()){
               $t = new Transferencia();
               
               while ($row=$result->fetchObject()){
                   $t->nuevaTransferencia($row->iban_origen, $row->iban_destino, $row->fecha, $row->cantidad);
                   $transferencias[] = clone($t);
                   $t = new Transferencia($row->iban_origen, $row->iban_destino, $row->fecha, $row->cantidad); 
               }
               return $transferencias;               
           }
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos');
            //mata el programa
        }
        unset($conex);
    }
    
   
}
