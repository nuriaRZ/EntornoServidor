<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table border="1px">
<?php
 $num = 1;
for ($i=0; $i<5; $i++){    //filas
    echo "<tr>";
    for($j=0; $j<7; $j++){    //col   
        echo "<td>".$num."</td>";    
        $num++;
    } 
     echo "</tr>";
     
}

?>
        </table>        
    </body>
</html>    
    



