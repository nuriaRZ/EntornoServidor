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
        <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            
        <?php
        $conex = new mysqli('localhost','dwes','abc123.','dwes');
        $result = $conex->query("select cod,nombre_corto from producto");
        if(!$conex->errno){
            if($result->num_rows){
                echo '<select name="productos">';
                while ($fila = $result->fetch_array()) {                    
                   echo '<option value="'.$fila[cod].'">'.$fila[nombre_corto].'</option>';  
        
                }
                echo '</select>';
            }
        }else{
            echo 'No se puede acceder a la base de datos';
        }    
        
        ?>
        <input type="submit" value="Mostrar Stock" name="enviar"/>
        </form>
        </div>
        
        <div id="contenido">
            
            <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">   
        <?php        
         if(!empty($_POST['productos'])){
            $result2 = $conex->query("select t2.nombre, t1.unidades from stock t1 join tienda t2 where t1.tienda=t2.cod and t1.producto='".$_POST['productos']."'");    
            if(!$conex->errno){  
                if($result2->num_rows){
                   while($fila = $result2->fetch_array()){
                       echo 'Tienda '.$fila['nombre'].': ';
                       ?>
                <input type="text" name="unidades" value="<?php echo $fila['unidades'] ?>"></input> unidades<br>
                <?php
                            
                   }
                }
             
        
         }  else{
             echo "No se puede acceder a la base de datos";
            
            }
           } 
            
        ?>
                <input type="submit" name="actualizar" value="Actualizar"/>
            </form>      
        </div> 
    </body>
    
</html>



