<?php
session_start();
if(isset($_POST['establecer'])){
    echo '<span class="mensaje">Información guardada en la sesión</span>';
    $preferencias = array('idioma'=>$_POST['idiomas'], 'perfil'=>$_POST['perfil'], 'zonaHoraria'=>$_POST['zona']);
    $_SESSION['preferencias']=$preferencias;
    
    
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="tarea.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <form action="" method="post">
            <label class="etiqueta">Idioma:</label><select name="idiomas">
                <option value="Español" <?php if(isset($_SESSION['preferencias']['idioma'])&&$_SESSION['preferencias']['idioma']==$_POST['idiomas']) echo 'selected'; ?>
                        >Español</option> 
                <option value="Inglés" <?php if(isset($_SESSION['preferencias']['idioma'])&&$_SESSION['preferencias']['idioma']==$_POST['idiomas']) echo 'selected'; ?>>Inglés</option> 
            </select><br>
           <label class="etiqueta"> Perfil Público:</label><select name="perfil">
                <option value="Si" <?php if(!empty($_POST['perfil'])) echo 'selected'; ?>>Sí</option> 
                <option value="No" <?php if(!empty($_POST['perfil'])) echo 'selected'; ?>>No</option> 
            </select><br>
           <label class="etiqueta"> Zona Horaria:</label><select name="zona">
                <option value="GMT-2" <?php if(isset($_SESSION['preferencias']['zonaHoraria'])&&$_POST['zona']==$_SESSION['preferencias']['zonaHoraria']) echo 'selected'; ?>>GMT-2</option> 
                <option value="GMT-1" <?php if(isset($_SESSION['preferencias']['zonaHoraria'])&& $_POST['zona']==$_SESSION['preferencias']['zonaHoraria']) echo 'selected'; ?>>GMT-1</option> 
                <option value="GMT" <?php if(isset($_SESSION['preferencias']['zonaHoraria'])&&$_POST['zona']==$_SESSION['preferencias']['zonaHoraria']) echo 'selected'; ?>>GMT</option>
                <option value="GMT+2"<?php if(isset($_SESSION['preferencias']['zonaHoraria'])&&$_POST['zona']==$_SESSION['preferencias']['zonaHoraria']) echo 'selected'; ?>>GMT+2</option>
            </select><br>
            <input type="submit" name="establecer" value="Establecer preferencias">
            <br><a href="mostrar.php">Mostrar preferencias</a>
        </form>
    </body>
</html>
