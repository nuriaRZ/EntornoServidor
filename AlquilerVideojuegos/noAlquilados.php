<?php
session_start();
require_once '../AlquilerVideojuegos/Controlador/JuegoControlador.php';
require_once '../AlquilerVideojuegos/Controlador/ClienteControlador.php';
require_once '../AlquilerVideojuegos/Controlador/AlquilerControlador.php';
?>
<html>
    <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Administrador</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <style>
            #enlaces{
                display: inline-flex;
                              
            }
            .link{
                 margin-right: 5px;
                margin-left: 5px; 
            }
        </style>   
    </head>
    <body>
        <div class="container">
            <h1>Juegos Comares</h1>
            <?php
            echo "Bienvenido ".$_SESSION['cliente'];
            ?>
            <form action="logoff.php" method="post">
                <input type="submit" class="btn btn-outline-danger" name="cerrarSesion" value="Cerrar sesion">
            </form>
            <?php
            if($_SESSION['tipo']=='admin'){
            ?>
            <div id="enlaces">
                <div class="link"><a href="vistaAdministrador.php">Lista de Juegos</a></div>
                <div class="link"><a href="alquilados.php"> Juegos Alquilados</a></div>
                <div class="link"><a href="noAlquilados.php"> Juegos no Alquilados</a></div>
                <div class="link"><a href="misAlquilados.php">Mis alquilados</a></div>    
                <div class="link"><a href="anadirJuego.php">Añadir juego</a></div>
                <div class="link"><a href="administrar.php">Administrar juego</a></div>
            </div>
            <?php
           } if($_SESSION['tipo']=='cliente'){
                 ?>
            <div id="enlaces">
                <div class="link"><a href="vistaCliente.php">Lista de Juegos</a></div>
                <div class="link"><a href="alquilados.php"> Juegos Alquilados</a></div>
                <div class="link"><a href="noAlquilados.php"> Juegos no Alquilados</a></div>
                <div class="link"><a href="misAlquilados.php">Mis alquilados</a></div> 
            </div>
            
            <?php
             }
           
            $juegos = JuegoControlador::recuperarNoAlquilados();
            if($juegos == null){
                ?>
            <div class="alert alert-warning">
                         No existe ningún juego sin alquilar en este momento
                    </div>
            <?php 
            }else{
            ?>
            
    <table class="table">
            <thead>
                <tr class="table-info">
                    <th>Carátula</th>
                    <th>Nombre juego</th>
                    <th>Nombre consola</th>
                    <th>Año</th>
                    <th>Precio</th>
                    
                </tr>
            </thead>
            <tbody>
                
                <?php  
                  
                    foreach($juegos as $valor){
                        echo "<tr class=''>";
                       echo "<td><img src=".$valor->imagen." width='60px' height='60px'></td>" ;
                       echo "<td>".$valor->nombre_juego."</td>";
                       echo "<td>".$valor->nombre_consola."</td>";
                       echo "<td>".$valor->anno."</td>";
                       echo "<td>".$valor->precio."</td>";                       
                    echo "</tr>"    ;
                    }                   
                    
                ?>
            </tbody>
        </table>  
            <?php
            }
         ?>
 
        </div>
    </body>
</html>
