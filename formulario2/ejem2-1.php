<?php

echo "Nombre: ".$_POST['nombre']."<br>";
echo "Apellidos: ".$_POST['apellidos']."<br";
echo "Direccion: ".$_POST['direccion']."<br>";
echo "Tarjeta: ".$_POST['tarjeta']."<br>";

?>

<form name="input" action="ejem2.php" method="post">
    <input type="hidden" name="nombre" value="<?php echo $_POST['nombre']; ?> "/>
    <input type="hidden" name="apellidos" value="<?php echo $_POST['apellidos']; ?>"/>
    <input type="submit" value="Confirmar" name="confirmar"/>
    <input type="submit" value="Cancelar" name="cancelar"/>
</form>







