<form action="" method="post">
    Nombre: <input type="text" name="nombre" value=""><br>
    Apellidos: <input type="text" name="apellidos" value=""><br>
    <select multiple="" name="idiomas[]">
        <option value="1">Castellano</option>
        <option value="2">Francés</option>
        <option value="4">Ingés</option>
        <option value="8">Alemán</option>        
        <option value="16">Chino</option>
        <option value="32">Búlgaro</option>
    </select><br>
    <input type="submit" name="enviar" value="Enviar">
    <input type="submit" name="recuperar" value="Recuperar Datos">
        
</form>

<?php
if(isset($_POST['enviar'])){
    $idio=0;
    $dwes = new mysqli('localhost', 'dwes', 'abc123.', 'prueba');
    foreach ($_POST['idiomas'] as $value){
        $idio+=$value;
    }
    $dwes->query("insert into usuario (Nombre, Apellidos, Idiomas) values ('$_POST[nombre]', '$_POST[apellidos]',$idio)");
    echo $dwes->error;
}

if(isset($_POST['recuperar'])){
    $dwes = new mysqli('localhost', 'dwes', 'abc123.', 'prueba');
    $result=$dwes->query("select * from usuario");
    
    while ($obj=$result->fetch_object()){
        $idio=explode(",",$obj->Idiomas);
        echo "Nombre: ".$obj->Nombre."<br>";
        echo "Apellidos: ".$obj->Apellidos."<br>";
        echo "Idiomas: <br>";
        foreach ($idio as $value){
            echo '<br>'.$value.'<br>';
        }
    }
}
?>
