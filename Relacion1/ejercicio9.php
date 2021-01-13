<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
<?php 
$a= rand(0,100);
$b= rand(0,100);
$c= rand(0,100);
echo 'numeros: A: '.$a.'  B: '.$b.'  C: '.$c.'<br>';
    if($a > $b && $a > $c){
        if($b>$c){
            echo $a." > ".$b." > ".$c;
        } else {
            echo $a." > ".$c." > ".$b;
        }
    }else{
        if($b > $a && $b > $c){
            if($a>$c){
            echo $b." > ".$a." > ".$c;
            } else {
                echo $b." > ".$c." > ".$a;
            }
        } else {
           if($c > $a && $c > $b){
            if($a>$b){
                echo $c." > ".$a." > ".$b;
            } else {
                echo $c." > ".$b." > ".$a;
            } 
        }   
      }  
   }

 
 


?>
        
    </body>
</html>    
    



