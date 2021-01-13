<?php
require_once '../ExamenPHP/Controlador/CuentaControlador.php';
require_once '../ExamenPHP/Controlador/TransferenciaControlador.php';

session_start();


?>
<html>
    <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Inicio</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <style>
            
        </style>   
    </head>
    <body>
        <div class="container">
            
            <?php
            echo '<h1>Hola '.$_SESSION['nombre'];           
            ?>
            <form action="logoff.php" method="post">
                <input type="submit" class="btn btn-outline-danger" name="cerrarSesion" value="Cerrar sesion">
            </form>
            <h3>Mis Cuentas</h3>
            <table class="table">
            <thead>
                <tr class="">
                    <th>Cuentas</th>
                    <th>Saldo</th>
                    <th>Historial</th>
                    <th>Transferencia</th>
                </tr>
            </thead>
            <tbody>
                
                <?php  
                      
                      
                       $cuentas = CuentaControlador::recuperarTodasUsuario($_SESSION['dni']);
                    foreach ($cuentas as $valor){ 
                        $_SESSION['iban']=$valor->iban;
                        echo "<tr class=''>";                       
                       echo "<td>".$valor->iban."</td>";
                       echo "<td>".$valor->saldo."</td>";                       
                       echo "<td>";
                       ?>
                            <form action="" method="post">
                                <button type="submit" class="btn btn-primary" name="historial" value="<?php echo $valor->iban ?>">Historial</button> 
                            </form>
                       <?php
                       echo "</td>";
                        echo "<td>";
                       ?>
            <form action="transferencias.php" method="post">
                               <button type="submit" class="btn btn-success" name="transferencia" value="">Transferencia</button> 
                               
                            </form>
                       <?php
                       echo "</td>";
                    echo "</tr>"    ;
                    
                    }
                    
                    if(isset($_POST['historial'])){ 
                        
                        echo '<h3>Historial</h3>';
                        
                        ?>
            <table class="table">
            <thead>
                <tr class="">
                    <th>Origen</th>
                    <th>Destino</th>
                    <th>Fecha</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>   
                
            <?php
            $t = TransferenciaControlador::recuperarTransferenciasUsuario($_SESSION['dni'], $_POST['historial']);
            foreach ($t as $valor){ 
                
                        echo "<tr class=''>";                       
                       echo "<td>".$valor->iban_origen."</td>";
                       echo "<td>".$valor->iban_destino."</td>";   
                       echo "<td>".$valor->fecha."</td>";
                       echo "<td>".$valor->cantidad."</td>";
                       echo "<td>";
                       
                    echo "</tr>"    ;
                    
                    }
                    }    
                ?>
            </tbody>
        </table>            
        </div>
    </body>
</html>


