<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
<?php
 $num = 1;
 $suma = 0;
 
 echo 'DO WHILE: ';
 
 do {
     $suma += $num;
     $num++;
     
 }while ($num <= 100);
 echo $suma;
 
 echo '<br>WHILE: ';
 
  while ($num <= 100){
     $suma += $num;
     $num++;     
 }
 echo $suma;
 
  echo '<br>FOR: ';
  $suma = 0;
  
   for($i=0; $i<=100; $i++){
      $suma += $i;
 }
 echo $suma;

?>
        
    </body>
</html>    
    



