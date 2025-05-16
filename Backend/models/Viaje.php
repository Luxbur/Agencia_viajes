<?php
require "../config/database.php";

class Viaje {
    private $pdo;

    public function __constract($pdo) {
        $this->pdo = $pdo;
    }

    public function obtenerTodos() {
        $stmt = $this->pdo->prepare("SELECT * FROM viaje");

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function agregar($id_destino, $fecha_inicio, $fecha_fin, $precio_viaje, $descripcion_viaje, $incluye_viaje) {
        $stmt = $this->pdo->prepare("INSERT INTO viaje (id_destino, fecha_inicio, fecha_fin, precio_viaje, descripcion_viaje, incluye_viaje) VALUES (:id_destino, :fecha_inicio, :fecha_fin, :precio_viaje, :descripcion_viaje, :incluye_viaje)");
        return $stmt->execute(["id_destino" => $id_destino, "fecha_inicio" => $fecha_inicio, "fecha_fin" => $fecha_fin, "precio_viaje" => $precio_viaje, "descripcion_viaje" => $descripcion_viaje, "incluye_viaje" => $incluye_viaje]);
    }

    public function eliminar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM viaje WHERE id_viaje = :id");
        return $stmt->execute(["id" => $id]);
    }
}