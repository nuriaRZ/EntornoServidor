<?php
if(isset($_POST['subir'])){
//  echo 'Nombre original: '.$_FILES['foto']['name'].'<br>';
//    echo 'Nombre temporal: '.$_FILES['foto']['tmp_name'].'<br>';
//    echo 'Tamaño: '.$_FILES['foto']['size'].'<br>';
//    echo 'Tipo: '.$_FILES['foto']['type'].'<br>';
//    echo 'Error: '.$_FILES['foto']['error'].'<br>';
    
    if(is_uploaded_file($_FILES['foto']['tmp_name'])){
        // para hacer el nombre único le vamos a concatenar el tiempo UNY
        $fich_unic=$_FILES['foto']['name']."-".time();
        $ruta="fotos/".$fich_unic;
        //para copiar el fichero en la carpeta usamos la funciçon move_uploaded_file
        move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);
        // para poner la imagen en la base de datos
        $conex=new mysqli("localhost", "dwes", "abc123.", "imagenes");
        $conex->query("INSERT INTO fotos (nombre, ruta) values('$fich_unic', '$ruta')");
        echo $conex->error;
        $conex->close();
    }else{
        echo 'ERROR al cargar la imagen';
    }
}


if(isset($_POST['mostrar'])){
    $conex=new mysqli("localhost", "dwes", "abc123.", "imagenes");
    $result=$conex->query("Select * from fotos");
    while ($fila=$result->fetch_object()){
        echo "<a href=mostrar.php?ruta=$fila->ruta><img src=$fila->ruta width=50 height=50></a>";
    }
    $conex->close();
}
?>
<form action="" method="post" enctype="multipart/form-data">
    Foto: <input type="file" name="foto"><br>
    <input type="submit" name="subir" value="Subir">
    <input type="submit" name="mostrar" value="Mostrar">
</form>

