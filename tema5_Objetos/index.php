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
        session_start();
        require_once 'persona.php';
        $p= new Persona("Nuria","Reyes", 22);
        $p2= new Persona();
        echo Persona::personas()."<br>";
        unset($p2);
        echo Persona::personas();
        echo $p."<br>";
        $p3 = clone($p);
        echo $p3."<br>";
        modifica($p3);        
        echo $p."<br>";
        echo $p3."<br>";
        $_SESSION['person']=$p;
        echo '<br>';
        $e = new Empleado("Maria", "Sachez", 36, 1500);
        echo $e->sal;
        echo '<br>';
        echo '<br>';
        function modifica($p){
            $p->nombre="Rosario";
        }
//        echo $p->nombre." ".$p->edad;        
//        $p->edad=50;
//        echo "<br>".$p->edad."<br>";
//        echo $p;
//        $p->muestra();
//        echo "<br>";
//        $p->muestra("pepe");
//        echo $p;
//        $p->muestra("juan", "serrano");
//        echo "<br>";
//        echo $p;
        
        ?>
        <a href="sesion1.php">sesion1</a>
    </body>
</html>
