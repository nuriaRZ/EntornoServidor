<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            .bajoDch{
                float:right;
                position:absolute;
                margin-bottom:0px;
                margin-right:0px;
                bottom:0px; 
                right:0px;
            }
            .altoDch2 {
                color: #f00; float:right; 
                position:absolute; 
                margin-right:0px; 
                margin-top:0px; 
                top:0px; 
                right:0px;
            }
            .altoDch1 {
                color: #00f; 
                float:right; 
                position:absolute; 
                margin-right:0px; 
                margin-top:0px; 
                top:0px; 
                right:0px;
            }
        </style>
    </head>
    <body>
        
        
        
       
        <?php
        
        if(isset($_POST['enviar'])){            
          $array = array(); 
            //print_r($_POST['cadena_array']);
            if(!empty($_POST['cadena_array'])){
                $array = json_decode($_POST['cadena_array'],true); 
              // var_dump($array);
            }
            if(!empty($_POST['nombre']) && !empty($_POST['telefono'])){
                if(in_array($_POST['nombre'], $array)){
                    ?>
                    <h1 class='altoDch1'>Registro modificado</h1>
                    <?php
                }else{
                    ?>
                     <h1 class='altoDch1'>Registro añadido</h1>
                    <?php
                    }   
                    $array[$_POST['nombre']] = $_POST['telefono'];
                    
                    
            }
            if(!empty($_POST['nombre']) && empty($_POST['telefono'])){
                if(array_key_exists($_POST['nombre'], $array)){
                    unset($array[$_POST['nombre']]);  
                    ?>
                    <h1 class='altoDch2'>Registro eliminado</h1>
                    <?php
                }else{
                    ?>
                    <h1 class='altoDch2'>No existe ese registro</h1>
                    <?php
                }
                
            }
            print_r($array);
            echo '<table id="agenda" border="1px">';
                echo '<tr>';
                    echo '<td>Nombre</td>';
                     echo ' <td>Telefono</td>';
                 echo '</tr>';
            foreach ($array as $nombre => $telefono){
                echo '<tr>';
                        echo "<td>".$nombre."</td>";
                        echo "<td>".$telefono."</td>";
                 echo '</tr>';                               
                    }
            echo '</table>';        
        }
        
       
        ?>
        <form name="form1" class="bajoDch"  action="" method="post">
            Nombre:<input  type="text" name="nombre" value=""><br>
            Telefono:<input type="text" name="telefono" value="">
            <input type="hidden" name="cadena_array" value='<?php 
            if(isset($array))
            echo json_encode($array);?>'>      
            <br><input  type="submit" name="enviar" value="Enviar">
            
        </form>
        
       
    </body>
</html>
