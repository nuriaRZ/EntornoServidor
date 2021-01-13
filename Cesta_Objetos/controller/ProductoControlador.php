<?php
require_once '../Cesta_Objetos/model/Conexion.php';
require_once '../Cesta_Objetos/model/Producto.php';

class ProductoControlador {

    public static function insertar(Producto $p) {
        try {
            $conex = new Conexion();
            $conex->exec("INSERT INTO producto (cod,nombre_corto,descripcion,pvp) VALUES ('$p->codigo','$p->nombre_corto','$p->descripcion', '$p->pvp')");
            // si queremos que devuelva algo return;
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos');
            //mata el programa
        }
        unset($conex);
    }

    // los métodos estáticos son para no tener que crear el objeto producto cada vez, lo uso sin crear el objeto
    public static function buscarProducto($cod) {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM producto WHERE cod='$cod'");
            if ($result->rowCount()) {
                $row = $result->fetchObject();
                $p = new Producto($row->cod, $row->nombre_corto, $row->PVP, $row->descripcion);
                
                return $p;
            } else
                return false;
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($conex);
    }

    public static function recuperarTodos() {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM producto");
            if ($result->rowCount()) {
                //creo un producto
                $p = new Producto();
                while ($row = $result->fetchObject()) {
                    // le asigono esos valores y los meto en el array
                    $p->nuevoProducto($row->cod, $row->nombre_corto, $row->PVP, $row->descripcion);

                    // otra forma de crearlo, así hace 3 objetos en distintas direcciones de memoria, no haec falta crear el new Producto() fuera
                    //$p= new self($row->codigo, $row->nombre, $row->precio);
                    // con los objetos se asigna la misma dirección de memoria si sólo ponemos $productos[]=$p;
                    // por eso usamos clone();
                    $productos[] = clone($p);
                    $p = new Producto($row->cod, $row->nombre_corto, $row->PVP, $row->descripcion);
                }
                //$registro=$result->fetchObject();
                // como es un objeto de la misma clase se puede hacer así
                //return new self($registro->codigo, $registro->nombre, $registro->precio);
                return $productos;
            } else
                return false;
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($conex);
    }
}

