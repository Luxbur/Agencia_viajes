<?php
require "../models/Destino.php";

$destinoModels = new Destino($pdo);

function obtenerDestino() {
    global $destinoModels;
    echo json_encode($destinoModels->obtenerTodos());
}

function agregarDestino($nombre_destino, $descripcion_destino, $pais_destino,$ciudad_destino, $atracciones_principales) {
    
}