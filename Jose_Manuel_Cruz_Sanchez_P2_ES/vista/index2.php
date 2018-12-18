<?php
require_once ('../modelo/funciones_base_datos.php');


if (isset($_POST['nick']) && isset($_POST['contrasena'])){
    $fila = obtener_un_usuario(base64_encode($_POST['nick']))->fetch_row();/******  ENCRIPTAR   ********/
    if ($fila[0] != null){
        if ((base64_decode($fila[1]) == $_POST['contrasena'])){/******  ENCRIPTAR   ********/
        ?>
            <form>
                <label>Nick:
                    <br>
                    <input type="text" value="<?= base64_decode($fila[0]) ?>">
                </label>
                <br>
                <label>Contraseña:
                    <br>
                    <input type="text" value="<?= base64_decode($fila[1]) ?>">
                </label>
                <br>
                <label>Nombre:
                    <br>
                    <input type="text" value="<?= base64_decode($fila[2]) ?>">
                </label>
                <br>
                <label>Apellidos:
                    <br>
                    <input type="text" value="<?= base64_decode($fila[3]) ?>">
                </label>
                <br>
                <label>Telefono:
                    <br>
                    <input type="text" value="<?= base64_decode($fila[4]) ?>">
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