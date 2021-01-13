<html>
    <head></head>
    <body>
        <form action="ejem1-2.php" method='POST'>
            Nº matricula: <input type='text' name="matricula"><br>
            Curso: <input type='text' name="curso"><br>
            Precio: <input type='text' name="precio"><br>
            <input type='hidden' name='nombre' value="<?php echo $_POST['nombre']; ?>">
            <input type='hidden' name='apellidos' value="<?php echo $_POST['apellidos']; ?>">
            <input type="submit" value="Enviar" name="enviar"/>
        </form>
    </body>
</html>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

