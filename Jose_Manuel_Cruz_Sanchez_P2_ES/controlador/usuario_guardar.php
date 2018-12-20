<?php
require_once ('../modelo/funciones_base_datos.php');

if (isset($_POST['nick'])){
    //insertar_nuevo_usuario(base64_encode($_POST['nick']), base64_encode($_POST['contrasena1']), base64_encode($_POST['nombre']), base64_encode($_POST['apellidos']), base64_encode($_POST['telefono']));
    insertar_nuevo_usuario(openCypher('encrypt', strip_tags(trim($_POST['nick']))), password_hash($_POST['contrasena1'], PASSWORD_DEFAULT), openCypher('encrypt', strip_tags(trim($_POST['nombre']))), openCypher('encrypt', strip_tags(trim($_POST['apellidos']))), openCypher('encrypt', strip_tags(trim($_POST['telefono']))));
    //var_dump(openCypher('encrypt', 'hola'));
    header('location: ../index.php?validado=guardado');
}