<form action="../controlador/usuario_guardar.php" method="post">
    <label>Nick:
        <br>
        <input type="text" name="nick" required  maxlength="<?= No_MAX_CARACTERES ?>">
    </label>
    <br>
    <label>Contraseña:
        <br>
        <input type="password" name="contrasena1" id="contrasena1" required maxlength="<?= No_MAX_CARACTERES ?>" onkeyup="contrasena_igual_contrasena()">
    </label>
    <br>
    <label>Repite contraseña:
        <br>
        <input type="password" name="contrasena2" id="contrasena2"  required maxlength="<?= No_MAX_CARACTERES ?>" onkeyup="contrasena_igual_contrasena()">
    </label>
    <br>
    <label>Nombre:
        <br>
        <input type="text" name="nombre" required maxlength="<?= No_MAX_CARACTERES ?>">
    </label>
    <br>
    <label>Apellidos:
        <br>
        <input type="text" name="apellidos" required maxlength="<?= No_MAX_CARACTERES ?>">
    </label>
    <br>
    <label>Telefono:
        <br>
        <input type="text" name="telefono" required maxlength="<?= No_MAX_CARACTERES ?>">
    </label>
    <br>
    <input type="submit" value="Entrar" required>
</form>

<script>
    /*Pinta de verde los fondos cuando las contraseñas son iguales*/
    /*Cambiar el id en las dos primeras lineas de la funcion*/
    function contrasena_igual_contrasena() {
        var campo_contrasena_1 = document.getElementById('contrasena1');
        var campo_contrasena_2 = document.getElementById('contrasena2');
        if(campo_contrasena_2.value !== ''){
            if(campo_contrasena_2.value === campo_contrasena_1.value){
                campo_contrasena_1.style.backgroundColor = '#95db4e';
                campo_contrasena_2.style.backgroundColor = '#95db4e';
            }else{
                campo_contrasena_1.style.backgroundColor = 'white';
                campo_contrasena_2.style.backgroundColor = 'white';
            }
        }
    }
</script>