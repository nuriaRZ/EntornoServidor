<?php
session_name();
session_start();
if(!isset($_SESSION['usuario'])) header('Location: login.php');
else {        
    try{
    $conex = new PDO('mysql:host=localhost;dbname=dwes', 'dwes', 'abc123.');
    $result = $conex->query("select * from producto");
    $error = $result->errorInfo();
    echo $error[2];
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
                
                if(isset($_POST['anadir'])){
                    if(isset($_SESSION['cesta'][$_POST['codProd']])){
                       $cantidad = $_SESSION['cesta'][$_POST['codProd']]['cantidad'];
                       $cantidad++;
                    }else{
                        $cantidad = 1;
                    }
                    $datos=array('codProd'=>$_POST['codProd'], 'nombre'=>$_POST['nombre'], 'precio'=>$_POST['precio'], 'cantidad'=>$cantidad);
                    $_SESSION['cesta'][$_POST['codProd']]=$datos;
                    foreach ($_SESSION['cesta'] as $key =>$value){
                        echo $key.' X '.$value['cantidad'].'<br>';
                    }
                    if(isset($_POST['vaciar'])){
                        unset($_SESSION['cesta']);
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
                        
                        while ($obj = $result->fetch(PDO::FETCH_OBJ)) {
                            
                            echo"<form action='' method='post'>";
                            echo"<input type='submit' name='anadir' value='añadir'>";
                            echo"<input type='hidden' name='codProd' value=".$obj->cod.">";
                            echo"<input type='hidden' name='descripcion' value=".$obj->descripcion.">";
                            echo" <input type='text' name='nombre' value=".$obj->nombre_corto." readonly>";
                            echo" <input type='text' name='precio' value=".$obj->PVP." readonly>";                            
                            echo "</form>";
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
} catch (Exception $e){
    echo $ex->getTraceAsString();
                echo 'Error: '.$ex->getMessage();
}
}

?>
