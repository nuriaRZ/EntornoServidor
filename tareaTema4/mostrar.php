

<?php
session_start();
if(isset($_POST['borrar'])){
    session_unset();
    session_destroy();   
    
    header('Location: mostrar.php');
}
if(isset($_SESSION['preferencias'])){
        echo '<label class="etiqueta">Idioma:</label> <label class="texto">'.$_SESSION['preferencias']['idioma'].'</label><br>';
echo '<label class="etiqueta">Perfil Público:</label> <label class="texto">'. $_SESSION['preferencias']['perfil'].'</label><br>';
echo '<label class="etiqueta">Zona horaria:</label> <label class="texto">'.$_SESSION['preferencias']['zonaHoraria'].'</label><br>';

}
if(!isset($_SESSION['preferencias'])){
    echo '<span class="mensaje">Información de la sesión eliminada</span><br>';
    echo '<label class="etiqueta">Idioma:</label> <br>';
echo '<label class="etiqueta">Perfil Público:</label> <br>';
echo '<label class="etiqueta">Zona horaria:</label> <br>';
}
?>
<html>
    <head>
        <link href="tarea.css" rel="stylesheet" type="text/css">
    </head>
    <body>    
<form action="" method="post">
    <input type="submit" name="borrar" value="Borrar preferencias"><br>
    <a href="preferencias.php">Establecer preferencias</a>
</form>
    </body>
</html>
