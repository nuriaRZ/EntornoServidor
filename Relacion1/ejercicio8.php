<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
<?php 
$num=1;
 $suma = 0;
$cont = 0;
 
 
 while($cont!=100){
        if($num%2==0){
         $suma+=$num;
          
          echo $num. " + ";
          $cont++;  
        }
        $num++;      
 }
 echo "<br>Suma: ".$suma;
 echo "<br>Contador: ".$cont;

?>
        
    </body>
</html>    
    



