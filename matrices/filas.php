
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if(isset($_POST['enviar']) && !empty($_POST['filas']) && !empty($_POST['columnas'])){
        require_once 'funciones.php';
        $matriz = crearMatriz($_POST['filas'], $_POST['columnas']);
        sumarFilas($matriz,$_POST['filas'], $_POST['columnas']);
        echo '<br><a href="index.php">Volver</a>';
        }else{
            ?>
          <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            Filas: <input type="number" name="filas">
            columnas: <input type="number" name="columnas">
            <br><input type="submit" value="Generar" name="enviar"/>
            <br><a href="index.php">Volver</a>
        </form> 
        <?php
        }
        ?>
        ?>
    </body>
</html>

