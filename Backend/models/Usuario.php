<?php
require "../config/database.php";

class Usuario {
    private $pdo;

    public function __constract($pdo) {
        $this->pdo = $pdo;
    }

    public function obtenerTodos() {
        $stmt = $this->pdo->prepare("SELECT * FROM usuario");

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function agregar($nombre_usuario, $email_usuario, $password_usuario, $fecha_registro, $telefono_usuario, $direccion_usuario) {
        $stmt = $this->pdo->prepare("INSERT INTO usuario (nombre_usuario, email_usuario, password_usuario, fecha_registro, telefono_usuario, direccion_usuario) VALUES (:nombre_usuario, :email_usuario, :password_usuario, :fecha_registro, :telefono_usuario, :direccion_usuario)");
        return $stmt->execute(["nombre_usuario" => $nombre_usuario, "email_usuario" => $email_usuario, "password_usuario" => $password_usuario, "fecha_registro" => $fecha_registro, "telefono_usuario" => $telefono_usuario, "direccion_usuario" => $direccion_usuario]);
        
    }

    public function eliminar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM usuario WHERE id_usuario = :id");
        return $stmt->execute(["id" => $id]);
    }
}