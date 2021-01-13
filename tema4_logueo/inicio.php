<?php
session_start();
try{
$conex = new PDO('mysql:host=localhost;dbname=tema4_logueo','dwes','abc123.');
$result = $conex->query("select * from perfil_usuario where user='$_SESSION[usuario]'");
while($obj = $result->fetch(PDO::FETCH_OBJ)){
             $_SESSION['nombre']=$obj->nombre;
             $_SESSION['apellidos']=$obj->apellidos;
             $_SESSION['direccion']=$obj->direccion;
             $_SESSION['localidad']=$obj->localidad;
             $_SESSION['color_letra']=$obj->color_letra;
             $_SESSION['color_fondo']=$obj->color_fondo;
             $_SESSION['tipo_letra']=$obj->tipo_letra;
             $_SESSION['tam_letra']=$obj->tam_letra;
            }
} catch (PDOException $ex) {
    echo 'Error: '.$ex->getMessage();
}

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
        <span>Hola <?php echo $_SESSION['nombre'] ?></span><br>
        <h1>Bienvenido a la web</h1>
        <form action="" method="post">
            <input type="submit" name="salir" value="Salir">
        </form>
        <form action="datos.php" method="post">
            <input type="submit" name="datos" value="Ver mis datos">
        </form>
    </body>
</html>


