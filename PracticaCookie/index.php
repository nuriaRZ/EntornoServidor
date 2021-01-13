<?php
if(isset($_POST['acceder'])){
    setcookie('usuario', $_POST['usuario'], time()+3600);
    setcookie('pass', $_POST['pass'], time()+3600);
    setcookie('visita', date('d-m-y'), time()+3600);
    setcookie('hora', date('h:i'), time()+3600);
    if(isset($_POST['recordar']))
    setcookie('recordar', "checked", time()+3600);
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
          try{
            $conex = new PDO('mysql:host=localhost;dbname=usuarios','dwes','abc123.');


        if(isset($_POST['acceder']) && !empty($_POST['usuario'])&& !empty($_POST['pass'])){
            $result = $conex->query("select * from usuario");
            $obj = $result->fetch(PDO::FETCH_OBJ);
            
            if($_POST['usuario'] == $obj->usuario && md5($_POST['pass'])===$obj->password){
                echo 'usuario correcto';
                header('Location: acceso.php');  
            } else {
                header('Location: index.php');
            }
        }else{
            
            ?>
            <form action="" method="post">
                Usuario: <input type="text" name="usuario" value="<?php if(isset($_POST['salir'])&& isset($_COOKIE['recordar'])){
      echo $_COOKIE['usuario'];}
                
            
?>"><br>
            Contraseña: <input type="password" name="pass" value="<?php if(isset($_POST['salir'])&& isset($_COOKIE['recordar'])){
                  echo $_COOKIE['pass'];
                 
            }
           
            
?>"><br>
            Recordarme: <input type="checkbox" id="recordar" name="recordar" value="<?php if (isset($_COOKIE['recordar'])) echo $_COOKIE['recordar'];?>"><br>
            <input type="submit" name="acceder" value="Acceder">
        </form> 
           <?php      
            }
           
        
        } catch (Exception $ex) {
            echo 'Error: '.$ex->getMessage();
        }
        ?>        
    </body>
</html>
