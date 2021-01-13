<h1>Reservar</h1>

<form action="" method="post">
    Fecha: <input type="date" name="fecha" value=""><br>
    Origen: <select name="origen" value="">
        <option value="Cordoba">Córdoba</option>
        <option value="Madrid">Madrid</option>
        <option value="Malaga">Málaga</option>        
    </select><br>
    Destino: <select name="destino" value="">
        <option value="Barcelona">Barcelona</option>
        <option value="Huelva">Huelva</option>
        <option value="Malaga">Málaga</option>
        <option value="Sevilla">Sevilla</option>
    </select><br>
    <input type="submit" name="consultar" value="Consultar"><br>   
</form>

<?php
if (isset($_POST['consultar'])) {
    $conex = new mysqli('localhost', 'dwes', 'abc123.', 'autobuses');
    $result = $conex->query("SELECT Plazas_libres FROM viajes WHERE Origen='$_POST[origen]' and Destino='$_POST[destino]' and Fecha='$_POST[fecha]'");
    echo $conex->error;
    if (!$conex->errno) {
        $obj = $result->fetch_object();
        ?> 
        <form action="" method="post">
            Plazas Disponibles: <input type="text" name="plazas" value="<?php
        if (!empty($obj->Plazas_libres)) {
            echo $obj->Plazas_libres;
        } elseif ($obj->Plazas_libres == 0) {
            echo '0 Plazas';
        }
        ?>"><br> 
            Número de asientos:<select name="asientos" value="" readonly>
                <?php
                for ($i = 1; $i <= $obj->Plazas_libres; $i++) {
                    echo "<option value='$i'";
                    echo ">" . $i . "</option>";
                }
                ?>
            </select><br>        
            <input type="hidden" name="hFecha" value="<?php echo $_POST['fecha']; ?>">
            <input type="hidden" name="hOrigen" value="<?php echo $_POST['origen']; ?>">
            <input type="hidden" name="hDestino" value="<?php echo $_POST['destino']; ?>">
            <?php
            if($obj->Plazas_libres != 0){
                ?>
            <input type="submit" name="reservar" value="Reservar">
            <?php
            } else echo 'No hay plazas disponibles';
            ?>
                 
        </form> 
        <?php
        if (!$result->num_rows) {
            echo '<h2>No hay viajes Disponibles</h2>';
        }        
        
    }
}

if (isset($_POST['reservar'])) {
    $conex = new mysqli('localhost', 'dwes', 'abc123.', 'autobuses');
    $result = $conex->stmt_init();
    $result->prepare("UPDATE viajes SET Plazas_libres=? where Fecha='$_POST[hFecha]' and Origen='$_POST[hOrigen]' and Destino='$_POST[hDestino]'");
    echo $result->error;    
    $resta = $_POST['plazas'] - $_POST['asientos'];
    echo $resta;
    $result->bind_param('i', $resta);
    $result->execute();
    $result->close();
    echo 'Reserva Completada';
    
}
?>
<br><a href="index.php">Volver</a>







