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

echo 'A: '.$a. '<br> B:' .$b .'<br> C:' .$c.' <br>';

if($a>$b && $a>$c) echo $a;
if($b>$a && $b>$c) echo $b;
if($c>$a && $c>$b) echo $c;

?>
    </body>
</html>    
    



