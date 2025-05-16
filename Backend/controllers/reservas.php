<?php
require "../models/Reservas-php";

$reservasModels = new Reservas($pdo);

function obtenerReservas() {
    global $reservasModels;
    echo json_encode($reservasModels->obtenerTodos());
}

function agregarReservas($id_usuario, $id_viaje, $fecha_reserva, $precio_final) {
    global $reservasModels;
    if ($reservasModels->agregar($id_usuario, $id_viaje, $fecha_reserva, $precio_final)) {
        echo json_encode(["message" => "Reserva agregada"]);
    } else {
        echo json_encode(["error" => "Error al agregar reserva"]);
    }
}

function eliminarReservas($id) {
    global $reservasModels;
    if ($reservasModels->eliminar($id)) {
        echo json_encode(["message" => "Reserva eliminada"]);
    } else {
        echo json_encode(["error" => "Error al eliminar reserva"]);
    }
}

?>