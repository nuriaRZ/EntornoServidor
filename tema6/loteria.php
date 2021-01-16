<h3>Loteria de Navidad</h3>
<html>
    <form action="" method="post">
        <input type="text" name="num">
        <input type="submit" name="consultarNav" value="Consultar">
    </form>
</html>
<h3>Loteria del Niño</h3>
<html>
    <form action="" method="post">
        <input type="text" name="num">
        <input type="submit" name="consultarNi" value="Consultar">
    </form>
</html>
<?php
if(isset($_POST['consultarNav'])){
   $datos = file_get_contents("https://api.elpais.com/ws/LoteriaNavidadPremiados?n=".$_POST['num']);
   $datos1 = str_replace("busqueda=", "", $datos);
$result= json_decode($datos1);

echo 'Sorteo de Navidad<br>';
echo "Numero ".$result->numero."<br>";
echo "Premio ".$result->premio;
}

if(isset($_POST['consultarNi'])){
    $datos = file_get_contents("https://api.elpais.com/ws/LoteriaNavidadPremiados?n=".$_POST['num']);
   $datos1 = str_replace("busqueda=", "", $datos);
$result= json_decode($datos1);

echo 'Sorteo del Niño<br>';
echo "Numero ".$result->numero."<br>";
echo "Premio ".$result->premio."<br>";
}
 
?>


