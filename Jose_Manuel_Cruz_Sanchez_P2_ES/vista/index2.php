<?php
require_once ('../modelo/funciones_base_datos.php');


if (isset($_POST['nick']) && isset($_POST['contrasena'])){
    $nick = filter_var(strip_tags(trim($_POST['nick'])), FILTER_SANITIZE_STRING);
    //$contrasena = password_ver($_POST['contrasena'], PASSWORD_DEFAULT);
    $fila = obtener_un_usuario(openCypher('encrypt', $nick))->fetch_row();/******  ENCRIPTAR   ********/

    if ($fila[0] != null){
        if (password_verify(strip_tags(trim($_POST['contrasena'])), $fila[1])){/******  ENCRIPTAR   ********/
        ?>
            <form>
                <label>Nick:
                    <br>
                    <input type="text" value="<?= openCypher('decrypt', $fila[0]) ?>">
                </label>
                <br>
                <!--<label>Contraseña:
                    <br>
                    <input type="text" value="<?= base64_decode($fila[1]) ?>">
                </label>
                <br>-->
                <label>Nombre:
                    <br>
                    <input type="text" value="<?= openCypher('decrypt', $fila[2]) ?>">
                </label>
                <br>
                <label>Apellidos:
                    <br>
                    <input type="text" value="<?= openCypher('decrypt', $fila[3]) ?>">
                </label>
                <br>
                <label>Telefono:
                    <br>
                    <input type="text" value="<?= openCypher('decrypt', $fila[4]) ?>">
                </label>
                <br>
            </form>
        <?php
        }
    }else{
        header('location: ../index.php?validado=incorrecto');
    }
}else{
    header('location: index.php');
}