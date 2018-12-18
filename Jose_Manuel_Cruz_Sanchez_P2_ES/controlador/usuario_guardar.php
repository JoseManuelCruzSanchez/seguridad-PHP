<?php
require_once ('../modelo/funciones_base_datos.php');

if (isset($_POST['nick'])){/******  ENCRIPTAR   ********/
    insertar_nuevo_usuario(base64_encode($_POST['nick']), base64_encode($_POST['contrasena1']), base64_encode($_POST['nombre']), base64_encode($_POST['apellidos']), base64_encode($_POST['telefono']));
    header('location: ../index.php?validado=guardado');
}