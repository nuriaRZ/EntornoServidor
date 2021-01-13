<?php
session_start();
require_once '../AlquilerVideojuegos/Controlador/JuegoControlador.php';
require_once '../AlquilerVideojuegos/Controlador/ClienteControlador.php';

if(isset($_POST['anadir'])){
    $nombre = "$_POST[juego]";
    $acr = explode(" ", $nombre);
    $codigo="";
    foreach($acr as $value){
        $codigo .=$value[0];
    }
    
            
    if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
        $juego = new Juego();
        $fich_unic = time() . "-" . $_FILES['foto']['name'];
        $ruta = "imagenes/" . $fich_unic;        
        move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);
            
    $j = new Juego($codigo."-".$_POST['consola'], $_POST['juego'], $_POST['consola'], $_POST['anno'], $_POST['precio'],'NO',$ruta, $_POST['descripcion']);
    JuegoControlador::insertar($j);
    }else{
        echo 'ERROR AL CARGAR LA IMAGEN';
    }
}
?>
<html>
    <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Administrador</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
           
    </head>
    <body>
        <div class="container">
            <a href="vistaAdministrador.php">Volver</a><br>
            <h1>Añadir juego</h1>           
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nombre: </label>
                    <input type="text" name="juego" value="">
                </div>
                <div class="form-group">
                    <label>Consola: </label>
                    <input type="text" name="consola" value="">
                </div>
                <div class="form-group">
                    <label>Año: </label>
                    <input type="number" name="anno" value="">
                </div>
                <div class="form-group">
                    <label>Precio: </label>
                    <input type="number" name="precio" value="">
                </div>
                <div class="form-group">
                    <label>Descripcion: </label>
                    <textarea name="descripcion" rows="10" cols="50"></textarea>
                </div>
                <div class="form-group">
                    <label>Imagen: </label>
                    <input type="file" name="foto"><br>
                </div>
                <input type="submit" class="btn btn-outline-primary" name="anadir" value="Añadir">
            </form>
        </div>
    </body>
</html>