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
 
 do {
     echo '<tr>';
     $col = 0;
     do{
       echo "<td>".$num."</td>";    
        $num++;
        $col++;
     }while ($col <  7);
     echo '</tr>';
    $fila++;
 }while ($fila < 5);

?>
        </table>        
    </body>
</html>    
    



