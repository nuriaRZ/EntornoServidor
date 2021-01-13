<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, 
choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        ?>
        <form name="input" action="arrayOculto2.php" method="post">
         Nombre:
        <input type="text" name="nombre" value="<?php 
        if(!empty($_POST['nombre'])){
            echo $_POST['nombre'];
        }
       ?>" />
        Apellidos:
        <input type="text" name="apellidos" value="<?php 
        if(!empty($_POST['apellidos'])){
            echo $_POST['apellidos'];
        }
       ?>" />
        
       
        <p>Aficciones:<br>
        <input type="checkbox" name="aficiones[]" value="cine" />
        Cine
        <input type="checkbox" name="aficiones[]" value="Lectura" />
        Lectura
        <input type="checkbox" name="aficiones[]" value="TV" />
        TV
        <input type="checkbox" name="aficiones[]" value="Deporte" />
        Deporte
        <input type="checkbox" name="aficiones[]" value="Musica" />
        Música
        <br />
        </p>
        <p>Estudios:
            <select multiple name="estudios[]" id="estudios">
                <option value="eso">ESO</option>
                <option value="bachillerato">Bachillerato</option>
                <option value="CFGM">CFGM</option>
                <option value="universidad">Universidad</option>
              </select>

        </p>
        
        <input type="submit" value="Enviar" name="enviar"/>
        </form>
        
        <?php                
              
        ?>
    </body>
</html>
