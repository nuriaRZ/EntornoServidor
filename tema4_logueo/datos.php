<?php
 session_start();
 
if(isset($_POST['salir'])){
    setcookie('PHPSESSID', "", time()-3600, "/");
    session_unset();
    session_destroy();
    header('Location: index.php');
}

?>
<html>
    <head>
        <style>
            body{                
            background-color: <?php echo $_SESSION['color_fondo']; ?>;
            color: <?php echo $_SESSION['color_letra']; ?>;
            font-family: <?php echo $_SESSION['tipo_letra']; ?>;
            font-size: <?php echo $_SESSION['tam_letra']; ?>;
            }
        </style>
    </head>
    <body>
        <?php
        echo 'Hola '.$_SESSION['nombre'].'<br><br>';
        echo 'Sus datos<br><br>';
        echo 'Nombre '.$_SESSION['nombre'].'<br>';
        echo 'Apellidos '.$_SESSION['apellidos'].'<br>';
        echo 'Direccion '.$_SESSION['direccion'].'<br>';
        echo 'Localidad '.$_SESSION['localidad'].'<br><br>';
?>
        <form action="" method="post">
            <input type="submit" name="salir" value="Salir">
        </form>
        <form action="inicio.php" method="post">
            <input type="submit" name="volver" value="Volver">
        </form>
        
    </body>
</html>



