<?php

    


if(isset($_COOKIE['usuario'])&& isset($_COOKIE['pass']) && isset($_COOKIE['visita'])&& isset($_COOKIE['hora'])){
     echo 'Hola, '.$_COOKIE['usuario'].', su última visita fue el '.$_COOKIE['visita'].' a las '.$_COOKIE['hora'].'<br>';
}else{
    
    echo 'Este es su primer acceso';
   
    
    
}
?>

<form action="index.php" method="post">
    <input type="submit" name="salir" value="salir">
</form>


