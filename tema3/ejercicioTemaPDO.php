<html>
    <head>
        <style>
            h1 {
                margin-bottom:0;
            }
            #encabezado {
                background-color:#ddf0a4;
            }
            #contenido {
                background-color:#EEEEEE;
                height:600px;
            }
            #pie {
                background-color:#ddf0a4;
                color:#ff0000;
                height:30px;
            }
        </style>
    </head>
    <body>
        
        <?php
        
        
        ?>
        <div id="encabezado">
        <h1>Ejercicio: Conjuntos de resultados en MySQL </h1>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            
        <?php
        try{
        $conex = new PDO('mysql:host=localhost;dbname=dwes','dwes','abc123.');  
        $result = $conex->query("SELECT cod,nombre_corto from producto");
        $error=$conex->errorInfo();
        echo $error[2];
        echo '<select name="productos">';
        while ($registro = $result->fetch()) {
          echo '<option value="'.$registro['cod'].'">'.$registro['nombre_corto'].'</option>';  
        }
        echo '</select>';
            
        }catch(PDOException $ex){
            echo 'Error: '.$ex->getMessage();
        }    
        
        ?>
        <input type="submit" value="Mostrar Stock" name="enviar"/>
        </form>
        </div>
        
        <div id="contenido">
            
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">   
        <?php        
         if(!empty($_POST['productos'])){
            $result = $conex->query("select t2.nombre, t2.cod ,t1.unidades from stock t1 join tienda t2 where t1.tienda=t2.cod and t1.producto='".$_POST['productos']."'");    
            
                
                   while($registro = $result->fetch()){
                       echo 'Tienda '.$registro['nombre'].': ';
                       echo "<input type='hidden' name='productos' value='$_POST[productos]'>";
                       echo "<input type='hidden' name='codigo[]' value=".$registro['cod'].">";
                       ?>
                <input type="text" name="unidades" value="<?php echo $registro['unidades'] ?>"></input> unidades<br>
                <?php     
                   }
         }
        ?>
                <input type="submit" name="actualizar" value="Actualizar"/>
            </form>      
        </div> 
    </body>
    
</html>

<?php
if(isset($_POST['actualizar'])){
    echo'entro';
    for($i=0; $i<count($_POST['unidades']); $i++){    
        $result = $conex->prepare("UPDATE stock set unidades = ? where tienda = ? and producto = ? ");
        $producto = $_POST['productos'];
        $unidades = $_POST['unidades'][$i];
        $tienda = $_POST["codigo"][$i];
        $result->bindParam(1, $unidades);
        $result->bindParam(2, $tienda);
        $result->bindParam(3, $producto);
        $result->errorInfo();
        $result->execute();
        echo 'Actualizado';
    }    
    
}
?>


