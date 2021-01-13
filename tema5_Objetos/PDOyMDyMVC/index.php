<?php
require_once '../PDOyMDyMVC/Controlador/ControladorProducto.php';

//$p = new Producto(5, "vaqueros", 70);
//controladorPruducto::insertar($p);
//echo controladorPruducto::buscarProducto(1);
$productos = controladorProducto::recuperarTodos();
foreach ($productos as $valor){
    echo "Código: ".$valor->codigo." nombre ".$valor->nombre. " precio: ".$valor->precio."<br>";
}