<?php
require_once '../Cesta_Objetos/controller/UsuarioControlador.php';
require_once '../Cesta_Objetos/model/Conexion.php';

if(isset($_POST['enviar'])&& isset($_POST['usuario'])&& isset($_POST['contra'])){     
    $usuario = UsuarioControlador::buscarUsuario($_POST['usuario'], $_POST['contra'], $errores);
    
    if(empty($errores)&& $usuario !=null){
        session_start();
        $_SESSION['usuario'] = $usuario->usuario;
        header('location: productos.php');
    }
    
}if(!isset($_POST['enviar'])){

?>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Ejemplo Tema 4: TIENDA</title>
        <link href="tienda.css" rel="stylesheet" type="text/css">
    </head>
<body>
<div id='login'>
    <form action='login.php' method='post'>
     <fieldset >
        <legend>Login</legend>
        <div><span class='error'>	</span></div>
    <div class='campo'>
        <label for='usuario' >Usuario:</label><br/>
        <input type='text' name='usuario' id='usuario' maxlength="50" /><br/>
    </div>
    <div class='campo'>
        <label for='password' >Contraseña:</label><br/>
        <input type='password' name='contra' id='password' maxlength="50" /><br/>
    </div>
    <div class='campo'>
        <input type='submit' name='enviar' value='Enviar' />
    </div>
      </fieldset>
    </form>
</div>


</body>
</html>

<?php

}     




?>

