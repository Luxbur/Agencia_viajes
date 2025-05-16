<?php
require "../models/Usuario.php";

$usuarioModels = new Usuario($pdo);

function obtenerUsuario() {
    global $usuarioModels;
    echo json_encode($usuarioModels->obtenerTodos());
}

function agregarUsuario($nombre_usuario, $email_usuario, $password_usuario, $fecha_registro, $telefono_usuario, $direccion_usuario) {
    global $usuarioModels;
    if ($usuarioModels->agregar($nombre_usuario, $email_usuario, $password_usuario, $fecha_registro, $telefono_usuario, $direccion_usuario)) {
        echo json_encode(["message" => "Usuario agregado"]);
    } else {
        echo json_encode(["error" => "Error al agregar usuario"]);
    }
}

function eliminarUsuario($id) {
    global $usuarioModels;
    if ($usuarioModels->eliminar($id)) {
        echo json_encode(["message" => "Usuario eliminado"]);
    } else {
        echo json_encode(["error" => "Error al eliminar usuario"]);
    }
}