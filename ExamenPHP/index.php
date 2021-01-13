<?php
require_once '../ExamenPHP/Controlador/UsuarioControlador.php';
session_start();

if( isset($_POST['usuario'])&&isset($_POST['pass'])){
    $u = UsuarioControlador::buscarCliente($_POST['usuario'], $_POST['pass'], $errores);
     $_SESSION['intentos']=$u->intentos;    
    if(empty($errores) && $u != null){              
        $_SESSION['nombre']=$u->nombre;
        $_SESSION['dni']=$u->dni;
            
        header('Location: inicio_cliente.php');
    
    }
}else{
    

?>
<html>
    <head>
        <meta charset="UTF-8">
        
        <title></title>
    </head>
    <body>
        <h1>LOGIN</h1>
        <form action="" method="post">            
            <input type="text" name="usuario" value="" placeholder="DNI"><br>            
            <input type="password" name="pass" value="" placeholder="Contraseña"><br>
            <input type="submit" name="entrar" value="Entrar"><br>            
        </form> 
        
    </body>
</html>
<?php
}
