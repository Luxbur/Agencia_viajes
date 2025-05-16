<?php
require "../config/database.php";

class Reservas {
    private $pdo;

    public function __constract($pdo) {
        $this->pdo = $pdo;
    }

    public function obtenerTodos() {
        $stmt = $this->pdo->prepare("SELECT * FROM reservas");

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function agregar($id_usuario, $id_viaje, $fecha_reserva, $precio_final) {
        $stmt = $this->pdo->prepare("INSERT INTO reservas (id_usuario, id_viaje, fecha_reserva, precio_final) VALUES (:id_usuario, :id_viaje, :fecha_reserva, :precio_final)");
        return $stmt->execute(["id_usuario" => $id_usuario, "id_viaje" => $id_viaje, "fecha_reserva" => $fecha_reserva, "precio_final" => $precio_final]);
    }

    public function eliminar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM reservas WHERE id_reserva = :id");
        return $stmt->execute(["id" => $id]);
    }
}