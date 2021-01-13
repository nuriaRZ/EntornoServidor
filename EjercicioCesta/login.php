<?php
try{
    $conex = new PDO('mysql:host=localhost;dbname=dwes','dwes','abc123.');
    if(isset($_POST['enviar'])){
    $result = $conex->query("SELECT * FROM usuario WHERE usuario='$_POST[usuario]' and password='".md5($_POST[contra])."'");
    
    $obj = $result->fetch(PDO::FETCH_OBJ);
    if($_POST['usuario'] == $obj->usuario && md5($_POST['contra'])===$obj->password){
         session_start();
             $_SESSION['usuario']=$_POST['usuario'];   
                header('Location: productos.php');  
            } else {               
                header('Location: login.php');
            }
            
        }else{
           

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

<?php

        }
        } catch (Exception $ex) {
            echo 'Error: '.$ex->getMessage();

}


?>
</body>
</html>



