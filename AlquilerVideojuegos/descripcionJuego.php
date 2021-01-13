<?php
session_start(); 
require_once '../AlquilerVideojuegos/Controlador/JuegoControlador.php';
require_once '../AlquilerVideojuegos/Controlador/ClienteControlador.php';
require_once '../AlquilerVideojuegos/Controlador/AlquilerControlador.php';

if(isset($_POST['alquilar'])){
    $fecha_alquiler = date("Y-n-d");
    $a= new Alquiler(null, $_POST['alquilar'], $_SESSION['dni'], $fecha_alquiler);
    AlquilerControlador::nuevoAlquiler($a);
    JuegoControlador::editarAlguilado($_POST['alquilar'], 'SI');
}

?>
<html>
    <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Descripcion</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <style>
            .negrita{
                font-weight: bold;
            }
        </style>   
    </head>
    <body>  
          <?php
        $j = JuegoControlador::buscarJuego($_GET['codigo']);
        ?>
        <div class="container row">
           <div class="col-md-8">
               <?php
               if($_SESSION['tipo']=='admin'){
                echo "<a href='vistaAdministrador.php'>Volver</a><br>";
               }else{
                   echo "<a href='vistaCliente.php'>Volver</a><br>";
               }
                ?>       
            <h1><?php echo $j->nombre_juego ?></h1>  
            <p><span class="negrita">Consola: </span><?php echo $j->nombre_consola ?></p>
            <p><span class="negrita">Año: </span><?php echo $j->anno ?></p>
            <p><span class="negrita">Precio: </span><?php echo $j->precio ?></p>
            <p><span class="negrita">Descripción: </span><?php echo $j->descripcion ?></p>
            <form action="" method="post">
                <button type="submit" name="alquilar" value="<?php echo $j->codigo?>"
                <?php if($j->alquilado == "SI") echo 'disabled';?>>Alquilar</button> 
            </form>
            </div>    
            <div class="col-md-4">
                <img src="<?php echo $j->imagen ?>">
            </div>
            
        </div>
    </body>
</html>