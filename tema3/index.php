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
    </head>
    <body>
        <?php
        $conex = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
        if(!$conex->connect_errno){
            $conex->autocommit(false);
          $error1 = $conex->query("update stock set unidades=1 where tienda=1 and producto='3DSNG'");
          $error2 = $conex->query("insert into stock values('3DSNG',3,1)");
          if ($error1 && $error2){
              $conex->commit();
          }else{
              echo 'No se ha podido actualizar la BBDD';
              $conex->rollback();
          }
        }
       
        
        
        
        ?>
    </body>
</html>
