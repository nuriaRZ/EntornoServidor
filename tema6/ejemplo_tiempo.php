<?php


//echo $tiempo->main->temp;
//echo $tiempo->weather[0]->icon;
?>
<html>
    <form action="" method="post">
        <select name="ciudad">
    <option value="Lucena">Lucena</option>
   <option value="Malaga">Málaga</option> 
   <option value="Cordoba">Córdoba</option>
   <option value="Madrid">Madrid</option>     
</select>
        <input type="submit" name="consultar" value="Consultar"><br>
    </form>
</html>

<?php
if(isset($_POST['consultar'])){
    $datos = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$_POST["ciudad"].",es&APPID=e1ce5babbae492ae03afe944cf7617dd&units=metric");

$tiempo= json_decode($datos);
var_dump($tiempo);
}

?>






