<?php
require_once 'Modelo/Conexion.php';
require_once 'Modelo/Juego.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of JuegoControlador
 *
 * @author nurie
 */
class JuegoControlador {
   public static function recuperarTodos() {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM juegos");
            if ($result->rowCount()) {
                //creo un producto
                $j = new Juego();
                while ($row = $result->fetchObject()) {                   
                    $j->nuevoJuego($row->Codigo, $row->Nombre_juego, $row->Nombre_consola, $row->Anno, $row->Precio, $row->Alguilado, $row->Imagen, $row->descripcion);

                    
                    $juegos[] = clone($j);
                    $j = new Juego($row->Codigo, $row->Nombre_juego, $row->Nombre_consola, $row->Anno, $row->Precio, $row->Alguilado, $row->Imagen, $row->descripcion);
                }
                //$registro=$result->fetchObject();
                // como es un objeto de la misma clase se puede hacer así
                //return new self($registro->codigo, $registro->nombre, $registro->precio);
                return $juegos;
            } else
                return false;
        } catch (PDOException $ex) {
           
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($conex);
    }
    
    public static function recuperarNoAlquilados() {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM juegos where Alguilado = 'NO'");
            if ($result->rowCount()) {
                //creo un producto
                $j = new Juego();
                while ($row = $result->fetchObject()) {                   
                    $j->nuevoJuego($row->Codigo, $row->Nombre_juego, $row->Nombre_consola, $row->Anno, $row->Precio, $row->Alguilado, $row->Imagen, $row->descripcion);

                    
                    $juegos[] = clone($j);
                    $j = new Juego($row->Codigo, $row->Nombre_juego, $row->Nombre_consola, $row->Anno, $row->Precio, $row->Alguilado, $row->Imagen, $row->descripcion);
                }
                //$registro=$result->fetchObject();
                // como es un objeto de la misma clase se puede hacer así
                //return new self($registro->codigo, $registro->nombre, $registro->precio);
                return $juegos;
            } else
                return false;
        } catch (PDOException $ex) {
           
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($conex);
    }
    
    public static function insertar(Juego $j) {
        try {
            $conex = new Conexion();
            $conex->exec("INSERT INTO juegos  VALUES ('$j->codigo','$j->nombre_juego','$j->nombre_consola', '$j->anno', '$j->precio', '$j->alquilado', '$j->imagen', '$j->descripcion')");
            // si queremos que devuelva algo return;
            
            
        } catch (PDOException $ex) {            
            die('error con la base de datos');
            //mata el programa
        }
        unset($conex);
    }
    
    public static function buscarJuego($codigo) {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM juegos WHERE Codigo='$codigo'");
            if ($result->rowCount()) {
                $registro = $result->fetchObject();
                $j = new Juego($registro->Codigo, $registro->Nombre_juego, $registro->Nombre_consola, $registro->Anno, $registro->Precio, $registro->Alguilado, $registro->Imagen, $registro->descripcion);
                
                return $j;
            } else
                return false;
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($conex);
    }
    
    public static function borrarJuego($codigo) {
        try {
            $conex = new Conexion();
            $result = $conex->query("DELETE FROM juegos WHERE Codigo='$codigo'");            
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($conex);
    }
    
    public static function editarJuego(Juego $j) {
        try {
            $conex = new Conexion();
            $conex->query("UPDATE juegos SET Anno = '$j->anno', Precio = '$j->precio', descripcion = '$j->descripcion', Imagen = '$j->imagen' WHERE Codigo='$j->codigo'");
            
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($conex);
    }
    
    public static function editarAlguilado($cod, $alquilado){
        try {
            $conex = new Conexion();
            $conex->query("UPDATE juegos SET Alguilado='$alquilado' WHERE Codigo ='$cod'");
           
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos');
            //mata el programa
        }
        unset($conex);
    }
    
    
    
}
