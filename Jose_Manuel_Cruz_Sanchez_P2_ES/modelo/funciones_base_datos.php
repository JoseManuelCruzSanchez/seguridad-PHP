<?php
require_once('../configuracion/variables_globales.php');
function insertar_nuevo_usuario($nick, $contrasena, $nombre, $apellidos, $telefono){
    $conexion = new mysqli(DB_HOST, DB_USUARIO, DB_PASS, DB_NOMBRE_BASE_DATOS);

        mysqli_real_escape_string($conexion, $nick);
        mysqli_real_escape_string($conexion, $contrasena);
        mysqli_real_escape_string($conexion, $nombre);
        mysqli_real_escape_string($conexion, $apellidos);
        mysqli_real_escape_string($conexion, $telefono);

    mysqli_set_charset($conexion, 'utf8');
    if ($conexion->connect_error) {
        die("La conexión ha fallado " . $conexion->connect_error);
    }
    $sql = "INSERT INTO usuarios (nick, contrasena, nombre, apellidos, telefono) VALUES (?, ?, ?, ?, ?)";

    $sentencia = $conexion->prepare($sql);
    $sentencia->bind_param('sssss', $nick, $contrasena, $nombre, $apellidos, $telefono);
    $sentencia->execute();

    $sentencia->close();
    $conexion->close();
}

/*function insertar_nuevo_usuario($nick, $contrasena, $nombre, $apellidos, $telefono){
    $pdo = new PDO(PDO_HOST_NAMEDB, DB_USUARIO, DB_PASS);

    $sentencia = $pdo->prepare("INSERT INTO usuarios (nick, contrasena, nombre, apellidos, telefono) VALUES (:nick, :contrasena, :nombre, :apellidos, :telefono)");
    //$sentencia = $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $sentencia->bindParam(":nick", $nick, PDO::PARAM_STR);
    $sentencia->bindParam(":contrasena", $contrasena, PDO::PARAM_STR);
    $sentencia->bindParam(":nombre", $nombre, PDO::PARAM_STR);
    $sentencia->bindParam(":apellidos", $apellidos, PDO::PARAM_STR);
    $sentencia->bindParam(":telefono", $telefono, PDO::PARAM_STR);
    $sentencia->execute();
}*/

function obtener_un_usuario($nick){
    $conexion = new mysqli(DB_HOST, DB_USUARIO, DB_PASS, DB_NOMBRE_BASE_DATOS);
    mysqli_set_charset($conexion, 'utf8');
    if($conexion->connect_error){
        die("La conexion ha fallado" . $conexion->connect_error);
    }
    $sql = "select * from usuarios where nick like '$nick'";
    $sentencia = $conexion->prepare($sql);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $conexion->close();
    $sentencia->close();
    return $resultado;
}

