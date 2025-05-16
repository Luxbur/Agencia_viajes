<?php
require "../config/database.php";

class Destino {
    private $pdo;

    public function __constract($pdo) {
        $this->pdo = $pdo;
    }

    public function obtenerTodos() {
        $stmt = $this->pdo->prepare("SELECT * FROM destino");

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function agregar($nombre_destino, $descripcion_destino, $pais_destino, $ciudad_destino, $atracciones_principales) {
        $stmt = $this->pdo->prepare("INSERT INTO destino (nombre_destino, descripcion_destino, pais_destino, ciudad_destino, atracciones_principales) VALUES (:nombre_destino, :descripcion_destino, :pais_destino, :ciudad_destino, :atracciones_principales)");
        return $stmt->execute(["nombre destino" => $nombre_destino, "descripcion_destino" => $descripcion_destino, "pais_destino" => $pais_destino, "ciudad_destino" => $ciudad_destino, "atracciones_principales" => $atracciones_principales]);
    }

    public function eliminar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM destino WHERE id_destino = :id");
        return $stmt->execute(["id" => $id]);
    }
}