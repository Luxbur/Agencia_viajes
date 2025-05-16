<?php
require "../config/database.php";

class Promocion {
    private $pdo;

    public function __constract($pdo) {
        $this->pdo = $pdo;
    }

    public function obtenerTodos() {
        $stmt = $this->pdo->prepare("SELECT * FROM promocion");

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function agregar($nombre_promocion, $descripcion_promocion, $descuento_porcentaje, $fecha_inicio, $fecha_fin, $id_destino) {
        $stmt = $this->pdo->prepare("INSERT INTO promocion (nombre_promocion, descripcion_promocion, descuento_porcentaje, fecha_inicio, fecha_fin, id_destino) VALUES (:nombre_promocion, :descripcion_promocion, :descuento_porcentaje, :fecha_inicio, :fecha_fin, :id_destino)");
        return $stmt->execute(["nombre_promocion" => $nombre_promocion, "descripcion_promocion" => $descripcion_promocion, "descuento_porcentaje" => $descuento_porcentaje, "fecha_inicio" => $fecha_inicio, "fecha_fin" => $fecha_fin, "id_destino" => $id_destino]);
    }

    public function eliminar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM promocion WHERE id_promocion = :id");
        return $stmt->execute(["id" => $id]);
    }
}