<?php
require_once ('configuracion/variables_globales.php');
if ((isset($_GET['validado']))){
    if($_GET['validado'] == 'guardado'){
        echo '<p style="background-color: #2dad29; color:white; font-size: 1.5em">Usuario guardado correctamente</p>';
    }
    else if($_GET['validado'] == 'incorrecto'){
        echo '<p style="background-color: #f92b1d; color:white; font-size: 1.5em">Usuario ó contraseña incorrectos</p>';
    }
}
?>
<form action="vista/index2.php" method="post">
    <label>Nombre:
        <br>
        <input type="text" name="nick" maxlength="<?= No_MAX_CARACTERES ?>">
    </label>
    <br>
    <label>Contras:
        <br>
        <input type="password" name="contrasena" maxlength="<?= No_MAX_CARACTERES ?>">
    </label>
    <br>
    <input type="submit" value="Entrar">
</form>
<br><br><br>
<a href="vista/registro.php">Registrate!</a>