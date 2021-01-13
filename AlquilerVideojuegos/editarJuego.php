<?php
session_start();
require_once '../AlquilerVideojuegos/Controlador/JuegoControlador.php';
require_once '../AlquilerVideojuegos/Controlador/ClienteControlador.php';

if(isset($_POST['guardar'])){
    
    if($_FILES['foto']['size']>0){
            
        if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
            $juego = new Juego();
            $fich_unic = time() . "-" . $_FILES['foto']['name'];
            $ruta = "imagenes/" . $fich_unic;        
            move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);
            
        $j= new Juego($_POST['codigo'], $_POST['juego'], $_POST['consola'], $_POST['anno'], $_POST['precio'],'NO',$ruta, $_POST['descripcion']);
        JuegoControlador::editarJuego($j);
        
        }else{
            echo 'ERROR AL CARGAR LA IMAGEN';
        }
    }else{
        
        $j = new Juego($_POST['codigo'], $_POST['juego'], $_POST['consola'], $_POST['anno'], $_POST['precio'], 'NO', $_POST['foto'], $_POST['descripcion']);
        JuegoControlador::editarJuego($j);
    }
   header('Location: administrar.php'); 
}
if(isset($_POST['borrarJuego'])){
    JuegoControlador::borrarJuego($_POST['borrarJuego']);
    header('Location: administrar.php');
}
?>
<html>
    <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Editar</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
           
    </head>
    <body>  
          <?php
        $j = JuegoControlador::buscarJuego($_POST['editar']);
        ?>
        <div class="container row">
           <div class="col-md-8">
            <a href="administrar.php">Volver</a><br>
            <h1>Editar Juego</h1> 
           
            <form action="" method="post" enctype="multipart/form-data">              
                <div class="form-group">
                    <label>Nombre: </label>
                    <input type="text" name="juego" value="<?php echo $j->nombre_juego ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Consola: </label>
                    <input type="text" name="consola" value="<?php echo $j->nombre_consola ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Año: </label>
                    <input type="number" name="anno" value="<?php echo $j->anno ?>">
                </div>
                <div class="form-group">
                    <label>Precio: </label>
                    <input type="number" name="precio" value="<?php echo $j->precio ?>">
                </div>
                <div class="form-group">
                    <label>Descripcion: </label>
                    <textarea name="descripcion" rows="10" cols="50"><?php echo $j->descripcion ?></textarea>
                </div>
                <div class="form-group">
                    <label>Imagen: </label>
                    <input type="file" name="foto" value="<?php echo $j->imagen ?>"><br>
                </div>
                <input type="hidden" name="codigo" value="<?php echo $j->codigo ?>">
                <input type="hidden" name="foto" value="<?php echo $j->imagen ?>">
                <input type="submit" class="btn btn-outline-primary" name="guardar" value="Guardar">
            </form>
            
            <form action="" method="post">
                <button type="submit" class="btn btn-outline-danger" name="borrarJuego" value="<?php echo $j->codigo ?>">Borrar</button>
            </form>
                
            </div>    
            <div class="col-md-4">
                <img src="<?php echo $j->imagen ?> ">
            </div>
            
            
        </div>
    </body>
</html>

