<?php
require_once '../AlquilerVideojuegos/Controlador/JuegoControlador.php';
require_once '../AlquilerVideojuegos/Controlador/ClienteControlador.php';

if(isset($_POST['login'])&& isset($_POST['dni'])&& isset($_POST['pass'])){
    $c = ClienteControlador::buscarCliente($_POST['dni'], $_POST['pass'], $errores);
    
    if(empty($errores) && $c != null){
        session_start();      
        $_SESSION['cliente']=$c->nombre;
        $_SESSION['dni']=$c->dni;
        $_SESSION['tipo']=$c->tipo;
        if($c->tipo == 'admin'){             
            header('Location: vistaAdministrador.php');
        }else{             
            header('Location: vistaCliente.php');
        }
    }
}elseif (!isset($_POST['login'])) {    

?>
<html>
    <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Index</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <style>
            .formLogin{
                margin: 10px;
                
            }
            input{
                margin: 2px;
            }
            
        </style>
    </head>
    <body>         
        <div class="container">            
            <h1>Juego Comares</h1>    
            <div class="formLogin">
                <form action="" method="post">
                    <input type="text" name="dni" placeholder="DNI">
                    <input type="password" name="pass" placeholder="contraseña">
                    <input type="submit" class="btn btn-outline-primary" name="login" value="Login">
                </form>
            </div>  
            
            
    <table class="table">
            <thead>
                <tr class="table-info">
                    <th>Carátula</th>
                    <th>Nombre juego</th>
                    <th>Nombre consola</th>
                    <th>Año</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                
                <?php  
                      
                      
                       $juegos = JuegoControlador::recuperarTodos();
                    foreach ($juegos as $valor){ 
                        echo "<tr class=''>";
                       echo "<td><img src=".$valor->imagen." width='50px' height='50px'></td>" ;
                       echo "<td>".$valor->nombre_juego."</td>";
                       echo "<td>".$valor->nombre_consola."</td>";
                       echo "<td>".$valor->anno."</td>";
                       echo "<td>".$valor->precio."</td>";
                    echo "</tr>"    ;
                    }                   
                    
                ?>
            </tbody>
        </table>            
        </div>
    </body>
</html>
<?php
}
?>