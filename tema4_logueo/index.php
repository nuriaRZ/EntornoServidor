<?php
$incorrecto = false;
session_start();
if(!isset($_SESSION['intentos'])) $_SESSION['intentos']=3;
if($_SESSION['intentos']==0)    header('Location: intentos.php');
if(isset($_POST['entrar'])){
    try{
         $conex = new PDO('mysql:host=localhost;dbname=tema4_logueo','dwes','abc123.');
         $result = $conex->query("select * from perfil_usuario where user='$_POST[usuario]' and pass='".md5($_POST["pass"])."'");
         
        if($result->rowCount()){
             
             $_SESSION['intentos'] = 3;
             $_SESSION['usuario']=$_POST['usuario'];
             $_SESSION['pass']=$_POST['pass'];
             header('Location: inicio.php');
    }else{
             $incorrecto = true;
             $_SESSION['intentos']--;
             echo $_SESSION['intentos'];
             if($_SESSION['intentos']==0)
             header('Location: intentos.php');
         }
    } catch (PDOException $ex) {
        echo 'Error: '.$ex->getMessage();
    }
   
}if(!isset($_POST['entrar'])|| $incorrecto==true){
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="tarea.css" rel="stylesheet" type="text/css">
        <title></title>
    </head>
    <body>
        <h1>FORMULARIO DE REGISTRO</h1>
        <form action="" method="post">
            <label class="texto">Usuario: </label>
            <input type="text" name="usuario" value=""><br>
            <label class="texto">Pass: </label>
            <input type="password" name="pass" value=""><br>
            <input type="submit" name="entrar" value="Entrar"><br>            
        </form> 
        <form action="registro.php" method="post">
            <input type="submit" name="registrar" value="Registrar"><br>
        </form>
    </body>
</html>
<?php
}