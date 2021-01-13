<form name="input" action="arrayOculto3.php" method="post">
    <p>Sexo: <br>
            <input type="radio" id="hombre" name="sexo" value="hombre">
            <label for="male">Hombre</label><br>
            <input type="radio" id="mujer" name="sexo" value="mujer">
            <label for="male">Mujer</label><br>
        
        </p>
        
        <p>Estado Civil: <br>
            <input type="radio" id="soltero" name="estado" value="soltero">
            <label for="male">Soltero</label><br>
            <input type="radio" id="casado" name="estado" value="casado">
            <label for="male">Casado</label><br>
            <input type="radio" id="otro" name="estado" value="otro">
            <label for="male">otro</label><br>
        
        </p>
        <p>Edad:
        <select name="edad" id="edad">
            <option value="Entre 1 y 14 años">Entre 1 y 14 años</option>
            <option value="Entre 15 y 25 años">Entre 15 y 25 años</option>
            <option value="Entre 26 y 35 años">Entre 26 y 35 años</option>
            <option value="Mayor de 35 años">Mayor de 35 años</option>
          </select>
        </p>
        
        <input type="hidden" name="nombre" value="<?php echo $_POST['nombre']?>">
        <input type="hidden" name="apellidos" value="<?php echo $_POST['apellidos']?>">
        <input type="hidden" name="aficiones" value=<?php echo json_encode($_POST['aficiones']);?>>
        <input type="hidden" name="estudios" value=<?php echo json_encode($_POST['estudios']);?>>
        
        <input type="submit" value="Enviar" name="enviar"/>
        
</form>
 


        
