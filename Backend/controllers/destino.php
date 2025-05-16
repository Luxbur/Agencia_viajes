<?php
require "../models/Destino.php";

$destinoModels = new Destino($pdo);

function obtenerDestino() {
    global $destinoModels;
    echo json_encode($destinoModels->obtenerTodos());
}

function agregarDestino($nombre_destino, $descripcion_destino, $pais_destino,$ciudad_destino, $atracciones_principales) {
    global $destinoModels;
    if ($destinoModels->agregar($nombre_destino, $descripcion_destino, $pais_destino,$ciudad_destino, $atracciones_principales)) {
        echo json_encode(["message" => "Destino agregado"]);
    } else {
        echo json_encode(["error" => "Error al agregar destino"]);
    }
    
}

function eliminarDestino($id) {
    global $destinoModels;
    if ($destinoModels->eliminar($id)) {
        echo json_encode(["message" => "Destino eliminado"]);
    } else {
        echo json_encode(["error" => "Error al eliminar destino"]);
    }
}
?>