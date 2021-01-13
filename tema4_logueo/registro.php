
<h1>FORMULARIO DE REGISTRO</h1>
<form action="" method="post">
    <label>Nombre: </label>
    <input type="text" name="nombre" value=""><br>
    <label>Apellidos: </label>
    <input type="text" name="apellidos" value=""><br>
    <label>Dirección: </label>
    <input type="text" name="direccion" value=""><br>
    <label>Localidad: </label>
    <input type="text" name="localidad" value=""><br>
    <label>Usuario: </label>
    <input type="email" name="usuario" value=""><br>
    <label>Pass: </label>
    <input type="password" name="pass" value=""><br>
    <label>Color letra: </label>
    <select name="color_letra">
        <option value="blue">azul</option>
        <option value="red">rojo</option>
        <option value="green">verde</option>
        <option value="yellow">amarillo</option>
    </select>
    <label>Color fondo: </label>
    <select name="color_fondo">
        <option value="blue">azul</option>
        <option value="red">rojo</option>
        <option value="white">blanco</option>
        <option value="yellow">amarillo</option>
    </select>
    <label>tipo letra: </label>
    <select name="tipo_letra">
        <option value="Times New Roman">Times New Roman</option>
        <option value="Verdana">Verdana</option>
        <option value="Arial">Arial</option>
        <option value="Comic Sans">Comic Sans</option>
    </select>
    <label>Tamaño letra: </label>
    <select name="tam_letra">
        <option value="12">12</option>
        <option value="16">16</option>
        <option value="20">20</option>
        <option value="30">30</option>
    </select><br>
    <input type="submit" name="aceptar" value="Aceptar">
</form>
<a href="index.php">Volver</a>

    <?php
    try{
        $conex = new PDO('mysql:host=localhost;dbname=tema4_logueo','dwes','abc123.');
        if(isset($_POST['aceptar'])){
            if(preg_match('/^[a-z]{1,50}/i', $_POST['nombre'])&&preg_match('/^[a-z]{1,50}/i', $_POST['apellidos'])&&preg_match('/^[a-z\s]/i', $_POST['direccion'])&&preg_match('/^[a-z]{1,50}/i', $_POST['localidad'])&&preg_match('/^[a-z\S]{2,50}/i', $_POST['pass'])){
                $conex->query("insert into perfil_usuario (nombre, apellidos, direccion, localidad, user, pass, color_letra, color_fondo, tipo_letra, tam_letra) values ('$_POST[nombre]', '$_POST[apellidos]','$_POST[direccion]', '$_POST[localidad]', '$_POST[usuario]', '".md5($_POST["pass"])."', '$_POST[color_letra]', '$_POST[color_fondo]', '$_POST[tipo_letra]', '$_POST[tam_letra]')");
                session_start();
                $_SESSION['usuario']=$_POST['usuario'];
                header('Location: inicio.php');
            }else{
                if(!preg_match('/^[a-z]{1,50}$/i', $_POST['nombre']))                echo 'nombre incorrecto';
            if(!preg_match('/^[a-z]{1,50}$/i', $_POST['apellidos']))echo 'apellidos incorrecto';
            if(!preg_match('/^[a-z\s]/i', $_POST['direccion']))echo 'direccion incorrecto';
            if(!preg_match('/^[a-z]{1,50}$/i', $_POST['localidad']))echo 'localidad incorrecto';
            if(!preg_match('/^[a-z\S]{2,50}/i', $_POST['pass']))echo 'contraseña incorrecto';
            }
            
        } else {
            
            
        }
    } catch (PDOException $ex) {
        echo 'Error: '.$ex->getMessage();
    }
?>

