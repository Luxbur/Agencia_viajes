<?php
require "../models/Promocion.php";

$promocionModels = new Promocion($pdo);

function obtenerPromocion() {
    global $promocionModels;
    echo json_encode($promocionModels->obtenerTodos());
}

function agregarPromocion($nombre_promocion, $descripcion_promocion, $descuento_porcentaje, $fecha_inicio, $fecha_fin, $id_destino) {
    global $promocionModels;
    if ($promocionModels->agregar($nombre_promocion, $descripcion_promocion, $descuento_porcentaje, $fecha_inicio, $fecha_fin, $id_destino)) {
        echo json_encode(["message" => "Promocion agregada"]);
    } else {
        echo json_encode(["error" => "Error al agregar promocion"]);
    }
}

function eliminarPromocion($id) {
    global $promocionModels;
    if ($promocionModels->eliminar($id)) {
        echo json_encode(["message" => "Promocion eliminada"]);
    } else {
        echo json_encode(["error" => "Error al eliminar promocion"]);
    }
}

?>