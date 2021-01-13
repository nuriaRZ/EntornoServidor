<?php
session_name();
session_start();
if(!isset($_SESSION['usuario'])) header('Location: login.php');
else {
    unset($_SESSION['cesta']);

?>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Ejemplo Tema 4: TIENDA-Listado de productos</title>
        <link href="tienda.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <form action="productos.php" method="post">
            <span class="msg">Gracias por su compra</span><br>
    <input type="submit" name="seguir" value="Seguir comprando">
    </form>
    </body>
</html>
<?php
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

