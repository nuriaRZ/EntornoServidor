<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if (!empty($_POST['modulos']) && !empty($_POST['nombre'])) {        
        $modulos = $_POST['modulos'];
        print "Nombre: ".$_POST['nombre']."<br />";
        foreach ($modulos as $modulo) {
        print "Modulo: ".$modulo."<br />";
        }
        ?>
        <a href="index.php" >volver </a><br>
        <button type="submit" formaction="index.php">volver con datos </button>       
        <?php

        } else {
        ?>
        
        <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
         Nombre del alumno:
        <input type="text" name="nombre" value="<?php 
        if(!empty($_POST['nombre'])){
            echo $_POST['nombre'];
        }
       ?>" />
        <?php
            if (isset($_POST['enviar']) && empty($_POST['nombre']))
                echo "<span style='color:red'> Introduce un nombre!!</span>";
        ?><br />
        <p>Módulos que cursa:
        <?php
            if (isset($_POST['enviar']) && empty($_POST['modulos']))
                 echo "<span style='color:red'> Escoge un modulo !!</span>";
        ?>
        </p>
        <input type="checkbox" name="modulos[]" value="DWES"
        <?php
         if(isset($_POST['modulos']) && in_array("DWES",$_POST['modulos']))
            echo 'checked="checked"';
        ?>
        />
        Desarrollo web en entorno servidor
        <br />
        <input type="checkbox" name="modulos[]" value="DWEC"
        <?php
            if(isset($_POST['modulos']) && in_array("DWEC",$_POST['modulos']))
                echo 'checked="checked"';
        ?>
        />
        Desarrollo web en entorno cliente<br />
        <br />
        <input type="submit" value="Enviar" name="enviar"/>
        </form>
        
        <?php                
        }
        ?>
        
  

        
       
    </body>
</html>
