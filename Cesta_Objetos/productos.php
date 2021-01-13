<?php
require_once '../Cesta_Objetos/controller/ProductoControlador.php';
require_once '../Cesta_Objetos/model/Conexion.php';
session_name();
session_start();
if(!isset($_SESSION['usuario'])) header('Location: login.php');
else {        
  
    
?>


<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Ejemplo Tema 4: TIENDA-Listado de productos</title>
        <link href="tienda.css" rel="stylesheet" type="text/css">
    </head>
    <body class="pagproductos">
        <div id="contenedor">
            <div id="encabezado">
                <h1>Listado de productos</h1>
            </div>
            <div id="cesta">
                <h3><img src="cesta.jpg" alt="Cesta" width="24" height="21">Cesta</h3>
                <hr />
                <?php
                if (isset($_POST['anadir'])) {
                    //$_SESSION['cesta'][$_POST['enviar']] = controladorPruducto::buscarProducto($_POST["enviar"]);
                    $_SESSION['cesta'][] = ProductoControlador::buscarProducto($_POST["anadir"]);
                }

                if (isset($_POST['vaciar'])) {
                    unset($_SESSION['cesta']);
                }
                ?>

                <?php
                if (isset($_SESSION['cesta'])) {
                    foreach ($_SESSION['cesta'] as $value) {
                        echo $value->nombre_corto.'<br>';
                    }
                }
                
                if(!isset($_SESSION['cesta'])){
                     ?>
                  <form action="" method="POST">
                      <input type="submit" name="vaciar" value="Vaciar Cesta" disabled>
                </form> 
                            <?php
                }else{
                    ?>
                  <form action="" method="POST">
                      <input type="submit" name="vaciar" value="Vaciar Cesta">
                </form> 
                            <?php
                }
                ?>                
                
                <form action="cesta.php" method="POST">
                    <input type="submit" name="comprar" value="Comprar" >
                </form>
                
            </div>
            <div id="productos">
                <?php                
                       $productos = ProductoControlador::recuperarTodos();  
                        foreach ($productos as $valor) {
                            ?>
                            <form action='' method='post'>
                                <button type='submit' name='anadir' value="<?php echo $valor->cod;?>">Añadir</button>                            
                            <input type='text' name='nombre' value="<?php echo $valor->nombre_corto; ?>" readonly>
                            <input type='text' name='precio' value="<?php echo $valor->pvp; ?>" readonly>    
                            <input type="hidden" name="descripcion" value="<?php echo $valor->descripcion; ?>">
                            
                           </form>
                            <?php
                        }
                        
                        
                        ?>
            </div>
            <br class="divisor" />
            <div id="pie">
                <form action="logoff.php" method="POST">
                    <input type="submit" name="salir" value="Salir ">
                </form>
             
                <p class='error'>  </p>
                
            </div>
            
            
            
        </div>
    
    
    
    
    
    
</body>
</html>
<?php

}

?>
