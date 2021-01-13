<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table border="1px">
<?php
 $num = 1;
 $fila = 0;
 
 while ($fila <= 5 ){     
     echo '<tr>';
     $col = 0;
     
     while ($col < 7){
        echo "<td>".$num."</td>";    
        $num++;
        $col++;        
     }
      $fila++;
     echo '</tr>';    
}

?>
        </table>        
    </body>
</html>    
    



