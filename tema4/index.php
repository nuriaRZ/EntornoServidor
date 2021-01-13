<?php
        setcookie("nombre", "Nuria");
        if(isset($_COOKIE['nombre'])){
            echo 'Nombre cookie: '.$_COOKIE['nombre'];
        }
       
        ?>
        <a href="ejemp_cookie2.php">Ir</a>
   