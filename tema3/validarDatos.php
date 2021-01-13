
<form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    Nombre: <input type="text" name="nombre" value=""/><br>
    DNI: <input type="text" name="dni" value=""/><br>
    Fecha nacimiento: <input type="text" name="fecha" value=""/><br>
    Edad: <input type="text" name="edad" value=""/><br>
    <input type="submit" name="aceptar" value="Aceptar" />
</form>


<?php

if(isset($_POST['aceptar'])&& !empty($_POST['nombre'])&& !empty($_POST['dni'])&& !empty($_POST['fecha'])&& !empty($_POST['edad'])){
   
    if(preg_match('/^[a-z]{1,30}$/i', $_POST['nombre'])){
        echo 'nombre correcto<br>';
    }
    else        echo 'nombre incorrecto<br>';
    if(preg_match('/^[0-9]{8}[A-Z]{1}$/i', $_POST['dni'])){
        echo 'DNI correcto<br>';
    }
    else        echo  'DNI incorrecto<br>';
    
        if(preg_match('/^[\d]{2}-[\d]{2}-[\d]{4}$/', $_POST['fecha'])){
        echo 'fecha correcta<br>';
    }
    else        echo  'fecha incorrecta<br>';
    
            if(preg_match('/^\d{1,2}$/', $_POST['edad'])&& $_POST['edad'] > 18){
        echo 'edad correcta<br>';
    }
    else        echo  'edad incorrecta<br>';
    echo 'formulario correcto';
}
else
    echo 'debes completar el formulario';


?>