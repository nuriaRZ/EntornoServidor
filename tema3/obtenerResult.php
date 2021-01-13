<?php
        $conex = new mysqli('localhost','dwes','abc123.','dwes');
        
        $result = $conex-> query ("SELECT * FROM producto");
         if(!$conex->errno){
            if($result->num_rows){
                while ($fila = $result->fetch_object()) {
                    echo "Codigo: " .$fila->cod. "<br>";
                    echo "Nombre: " .$fila->nombre_corto."<br>" . "<br>";
                }
            }
            
         }  else{
             echo "No se puede acceder a la base de datos";
             exit();
            }
        ?>


