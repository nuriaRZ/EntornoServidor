



<?php
if(isset($_POST['siguiente'])){ 
?>
<p>PEDIDO</p><br>
<form name="input" action="ejem2-1.php" method="post">
         Direccion:
        <input type="text" name="direccion"/>
        Nº Tarjeta:
        <input type="text" name="tarjeta"/>
        <input type="hidden" name="nombre" value="<?php echo $_POST['nombre']; ?> "/>
        <input type="hidden" name="apellidos" value="<?php echo $_POST['apellidos']; ?>"/>
        <input type="submit" value="Enviar" name="enviar"/>
</form>
<?php
} else{
    ?>
    <p>DATOS</p><br>
<form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
         Nombre:
         <input type="text" name="nombre" value="<?php
         if(isset($_POST['cancelar'])){
             echo $_POST['nombre'];
         }?>"/>
        Apellidos:
        <input type="text" name="apellidos" value="<?php
         if(isset($_POST['cancelar'])){
             echo $_POST['apellidos'];
         }?>"/>
        <input type="submit" value="Siguiente" name="siguiente"/>
</form>
    <?php
}
?>



