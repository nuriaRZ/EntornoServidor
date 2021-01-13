<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table border="5px">
<?php
 $num = rand(0, 100);
for ($i=0; $i<10; $i++){    
    echo "<tr>";
    for($j=0; $j<10; $j++){       
        if($num%2==0){
            $num = $num + 1;
            echo "<td>".$num."</td>";            
        }else{
            echo "<td>".$num."</td>";
        }
        $num++;
    } 
     echo '</tr>';
     
}

?>
        </table>        
    </body>
</html>    
    



