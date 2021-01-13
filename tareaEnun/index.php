
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listado</title>
        <link href="dwes.css" rel="stylesheet" type="text/css">
    </head>
<body>

<div id="encabezado">
	<h1>Ejercicio: </h1>	
                <?php
                $conex = new PDO('mysql:host=localhost;dbname=dwes','dwes','abc123.'); 
                $result = $conex->query("SELECT * FROM familia");
                   try{
                    ?>   
                     <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                        Familia: <select name="familias" value="">  
                   <?php  
                   
                        while ($obj = $result->fetch(PDO::FETCH_OBJ)) {
                            echo '<option value="' . $obj->cod . '"';
                            if (!empty($_POST['familias']) && $obj->cod == $_POST['familias']) {
                                echo 'selected';
                            }
                            echo '>' . $obj->nombre . '</option>';
                        }
                   } catch (Exception $ex) {
                       echo 'Error: '.$ex;
                   } 
                ?>
            </select>
            <input type="submit" name="mostrar" value="Mostrar"> 
	</form>
</div>

<div id="contenido">
	<h2>Contenido</h2>
        <?php
        if(isset($_POST['mostrar'])){
             ?>
        
        <?php
                
                $result = $conex->query("Select cod, nombre_corto, PVP from producto where familia = '$_POST[familias]'");
                echo '<table border=1px>';
                echo '<thead>';
                echo '<th>Producto</th>';
                echo '<th>PVP</th>';
                echo '</thead>';
                while ($obj = $result->fetch(PDO::FETCH_OBJ)) {
                    
                  echo '<form action="editar.php" method="post">';
                     echo '<tr>';
                    echo '<td>Producto: '.$obj->nombre_corto.'</td>';
                    echo '<td> PVP: '.$obj->PVP.'€.</td>';
                    echo "<td><input type='submit' name='editar' value='Editar'></td>";
                    echo '</tr>';
                    echo "<input type='hidden' name='familia' value='$_POST[familias]'>";
                    echo "<input type='hidden' name='codigo' value=$obj->cod>";
                   echo '</form>';
                }
                
                echo '</table>';
                
                
                
        }
        ?>
        
        <?php
        
        ?>
</div>

<div id="pie">
</div>
</body>


</html>
