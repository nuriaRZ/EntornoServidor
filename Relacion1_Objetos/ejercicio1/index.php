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
         include_once 'Animal.php'; 
        include_once 'Mamifero.php';
        include_once 'Ave.php';
        include_once 'Gato.php';
        include_once 'Perro.php';
        include_once 'Canario.php';
        include_once 'Pinguino.php';
        include_once 'Lagarto.php';
        
        $perro = new Perro("goofy", 3, "marron", "galgo");
        $gato = new Gato("Otis", 4, "negro", "esfinge");
        $lagarto = new Lagarto("rambo", 12, "lagartija");
        $pinguino = new Pinguino("Pingu", 4, 5, "pequeño");
        $canario = new Canario("Piolin", 2, 0, "amarillo");
        echo $perro."<br>";
        echo $perro->ladrar()."<br>";
        echo $gato."<br>";
        echo $gato->maullar()."<br>";
        echo $lagarto."<br>";
         echo $lagarto->trepar()."<br>";
        echo $pinguino."<br>";
        echo $pinguino->nadar()."<br>";
        echo $canario."<br>";
        echo $canario->cantar();
        
        
        
       
        
        ?>
    </body>
</html>
