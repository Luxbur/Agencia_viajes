<?php
require "../models/Viaje.php";

function obtenerViaje() {
    global $viajeModels;
    echo json_encode($viajeModels->obtenerTodos());
}

function agregarViaje($id_destino, $fecha_inicio, $fecha_fin, $precio_viaje, $descripcion_viaje, $incluye_viaje) {
    global $viajeModels;
    if ($viajeModels->agregar($id_destino, $fecha_inicio, $fecha_fin, $precio_viaje, $descripcion_viaje, $incluye_viaje)) {
        echo json_encode(["message" => "Viaje agregado"]);
    } else {
        echo json_encode(["error" => "Error al agregar viaje"]);
    }
}

function eliminarViaje($id) {
    global $viajeModels;
    if ($viajeModels->eliminar($id)) {
        echo json_encode(["message" => "Viaje eliminado"]);
    } else {
        echo json_encode(["error" => "Error al eliminar viaje"]);
    }
}