<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar</title>
        <link href="dwes.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="encabezado">
            <h1>Tarea: Edición de un producto</h1>
        </div>
        <div id="contenido">
	<h2>Producto:</h2>
        <form action="actualizar.php" method="post">
            <?php
            try{
               $conex=new PDO('mysql:host=localhost;dbname=dwes','dwes','abc123.'); 
               $result = $conex->query("select * from producto where cod = '$_POST[codigo]'");
               $error = $result->errorInfo();
               echo $error[2];               
               $obj = $result->fetch(PDO::FETCH_OBJ);
               ?>
            Nombre corto:<input type="text" name="nombreCorto" value="<?php if(empty($_POST['nombreCorto'])) echo $obj->nombre_corto; ?>"><br>
            Nombre: <textarea name="nombre" rows="2" cols="50"><?php echo $obj->nombre; ?></textarea> <br>
            Descripción: <textarea name="descripcion" rows="10" cols="50"><?php echo $obj->descripcion; ?></textarea> <br>
            PVP: <input type="text" name="precio" value="<?php if(empty($_POST['precio'])) echo $obj->PVP; ?>"><br>   
            
            <button type="submit" name="actualizar" value="<?php echo $obj->cod ?>">Actualizar</button>
            
            <input type="submit" name="cancelar" value="Cancelar">
                <?php 
                
                
            } catch (Exception $ex) {
                echo $ex->getTraceAsString();
                echo 'Error: '.$ex->getMessage();
            }
            
            ?>
            
        </form>
        
        <?php
        
        ?>
        
        
        </div>
        <div id="pie">
         </div>
    <body>    
</html>

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

