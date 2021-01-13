<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?php
$a=2002;
//no es: si no %4, si no %400
if($a%4!=0 && $a%400!=0){
    echo 'No es bisiesto';
} else {
   if($a%4==0 && $a%100==0 && $a%400==0){
       echo 'Es bisiesto';
   } 
}

?>
    </body>
</html>    
    



