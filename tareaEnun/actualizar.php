<html>
    <head>
       <meta charset="UTF-8">
        <title>actualizar</title>
        <link href="dwes.css" rel="stylesheet" type="text/css"> 
    </head>
    <body>
        <form action="" method="post">
       <?php
       if(isset($_POST['actualizar'])){
           try{
           $conex = new PDO('mysql:host=localhost;dbname=dwes','dwes','abc123.');
           $result = $conex->prepare("UPDATE producto set nombre = ?, nombre_corto = ?, descripcion = ?, PVP = ? where cod = '$_POST[actualizar]'");
           $nombre = $_POST['nombre'];
           $nombreCorto = $_POST['nombreCorto'];
           $descripcion = $_POST['descripcion'];
           $precio = $_POST['precio'];
           $result->bindParam(1, $nombre);
           $result->bindParam(2, $nombreCorto);
           $result->bindParam(3, $descripcion);
           $result->bindParam(4, $precio);
           $result->errorInfo();
           $result->execute();
        
           ?>
        </form>
        <form action="index.php" method="post">
            Se han actualizado los datos<br>
            <input type="submit" name="continuar" value="Continuar">
        </form>
        <?php
           } catch (PDOException $ex){
               echo $ex->getTraceAsString();
               echo 'Error: '.$ex->getMessage();
           }
       }
       if(isset($_POST['cancelar'])){
                     header('Location: index.php');
                }
       ?>
        
    </body>
</html>    
<?php



