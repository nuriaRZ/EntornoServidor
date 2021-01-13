<?php

require_once 'Producto.php';

//$p = new Producto();
//$p->nuevoProducto(3, "jersey", 19.90);
//echo $p;
//$p->insertar();
$productos= Producto::recuperarTodos();
foreach ($productos as $valor){
    echo 'Codigo: '.$valor->codigo."<br>";
    echo 'Nombre: '.$valor->nombre."<br>";
    echo 'Precio: '.$valor->precio."<br><hr>";
}

