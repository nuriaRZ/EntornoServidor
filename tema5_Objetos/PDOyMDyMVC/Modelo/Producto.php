<?php
require_once 'Conexion.php';
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
    private $codigo;
    private $nombre;
    private $precio;
    
    public function __construct($cod="", $nom="", $pre="") {
        $this->codigo=$cod;
        $this->nombre=$nom;
        $this->precio=$pre;
    }
    
    public function nuevoProducto($cod, $nom, $pre) {
        $this->codigo=$cod;
        $this->nombre=$nom;
        $this->precio=$pre;
    }
    
    public function __set($name, $value) {
        $this->name=$value;
    }
    
       public function __get($name) {
        return $this->$name;
    }
    public function __toString() {
        return "Cod: ".$this->codigo." nombre ".$this->nombre." Precio: ".$this->precio;
    }    
    public function insertar(){
        try{
            $conex = new Conexion();
            $conex->exec("insert into productos (codigo, nombre, precio) values ($this->codigo,'$this->nombre','$this->precio')");
            
        } catch (Exception $ex) {
            echo "<a href='indexProd.php'>Ir al inicio</a>";
            die("error con la BBDD");
        }
        unset($conex);
    }
    
    public static function buscarProducto($cod){
        try{
            $conex = new Conexion();
            $result=$conex->query("select * from productos where codigo = $cod");
            if($result->rowCount()){
                $registro = $result->fetchObject();
                $p = new self($registro->codigo, $registro->nombre, $registro->precio);
                return $p;
            }else return false;
        } catch (Exception $ex) {

        }
    }
    
    public static function recuperarTodos(){
        try{
            $conex=new Conexion();
           $result = $conex->query("select * from froductos");
           if($result->rowCount()){
               $p=new Producto();
               while ($row=$result->fetchObject()){
                  // $p->nuevoProducto($row->codigo, $row->nombre, $row->precio); clone obligado
                   $p=new self($row->codigo, $row->nombre, $row->precio); //clone o igual
                   $productos[]=clone($p);
               }
               return $productos;
           }else return false;
        } catch (PDOException $ex) {

        }
    }
    
}
