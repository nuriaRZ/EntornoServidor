<?php
require_once '../ExamenPHP/Controlador/TransferenciaControlador.php';
require_once '../ExamenPHP/Controlador/CuentaControlador.php';
session_start();
if(isset($_POST['confirmar'])){
    $fecha = date("Y-n-d");
    $t = new Transferencia($_SESSION['iban'], $_POST['destino'], $fecha, $_POST['cant']);
    TransferenciaControlador::nuevaTransferencia($t);
    CuentaControlador::CambiarSaldoCuenta($_SESSION['iban'], $_POST['posterior']);
    
}else{
?>
<html>
    <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Validar</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
          
    </head>
    <body>
        <div class="container">
             <?php
            echo '<h1>Hola '.$_SESSION['nombre']; 
            $comision = $_POST['cantidad']*0.01;
            $posterior = $_POST['saldo']-$comision;
            ?>
             <style>
            <?php
            if($posterior<0){
                ?>
            .error{
                color: red;
            }
            <?php
            }
            
            ?>
        </style> 
            <h3>Tramitar Transferencia</h3>
            
            <form action="" method="post">
                <div class="form-group">
                    <label>Origen: </label><br>
                    <input type="text" name="origen" value="<?php echo $_SESSION['iban'] ?>" readonly>
                    
                </div>
                <div class="form-group">
                    <label>Destino: </label><br>
                    <input type="text" name="destino" value="<?php echo $_POST['cuentas'] ?>" readonly>
                    
                </div>
                <div class="form-group">
                    <label>Cantidad: </label><br>
                    <input type="text" name="cant" value="<?php echo $_POST['cantidad'] ?>" readonly>
                    
                </div>
                
                <div class="form-group">
                    <label>Comision: </label><br>
                    <input type="text" name="comision" value="<?php echo $comision ?>" readonly>
                    
                </div>
                <div class="form-group">
                    <label>Saldo Anterior: </label><br>
                    <input type="text" name="anterior" value="<?php echo $_POST['saldo'] ?>" readonly>
                    
                </div>
                <div class="form-group">
                    <label>Saldo Posterior: </label><br>
                    <input type="text" class="error" name="posterior" value="<?php echo $posterior ?>" readonly>
                    
                </div>
                <input type="submit" class="btn btn-outline-primary" name="confirmar" value="Confirmar" <?php if($posterior <0) echo 'disabled';?>>
            </form>
            
            <form action="logoff.php" method="post">
                <input type="submit" class="btn btn-outline-danger" name="cerrarSesion" value="Cerrar sesion">
            </form> 
            <form action="transferencias.php" method="post">
                <input type="submit" class="btn btn-outline-danger" name="volver" value="Volver">
            </form>
            
        </div>
    </body>
</html>
<?php
}

