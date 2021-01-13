<?php
require_once '../ExamenPHP/Controlador/TransferenciaControlador.php';
require_once '../ExamenPHP/Controlador/CuentaControlador.php';
require_once '../ExamenPHP/Controlador/UsuarioControlador.php';
session_start();

?>
<html>
    <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Transferencias</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
           
    </head>
    <body>
        <div class="container">
             <?php
            echo '<h1>Hola '.$_SESSION['nombre']; 
            $c = CuentaControlador::recuperarUnaCuentaUsuario($_SESSION['dni'], $_SESSION['iban']);
            $saldo = $c->saldo;
            ?>
            <form action="logoff.php" method="post">
                <input type="submit" class="btn btn-outline-danger" name="cerrarSesion" value="Cerrar sesion">
            </form>   
            <h3>Tramitar Transferencia</h3>
            
            <form action="validar_transferencia.php" method="post">
                <div class="form-group">
                    <label>Origen:<?php echo $_SESSION['iban']?> </label><br>
                    <label>Saldo:<?php echo $saldo ?></label>
                    
                </div>
                <div class="form-group">
                    <label>Cuentas: </label>
                    <select name="cuentas">
                        <?php
                        $cuentas = CuentaControlador::recuperarTodas();
                            foreach ($cuentas as $value){                                
                                $u = UsuarioControlador::buscarUsuarioCuenta($value->dni_cuenta);
                                if($value->iban != $_SESSION['iban'] ){
                                ?>
                        <option value="<?php echo $value->iban ?>"><?php echo $value->iban."---".$u->nombre ?></option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Cantidad: </label>
                    <input type="number" name="cantidad" value="">
                </div>
                <input type="hidden" name="saldo" value="<?php echo $saldo ?>">
                <input type="submit" class="btn btn-outline-primary" name="transferir" value="Transferir">
            </form>
            <form action="inicio_cliente.php" method="post">
                <input type="submit" class="btn btn-outline-danger" name="volver" value="Volver">
            </form>
            
            
        </div>
    </body>
</html>
