<?php
$host = "localhost";
$dbname = "agencia_viajes";
$username = "root";
$password = "";

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e) {

        die("Error en la conexión: " . $e->getMessage());
    }
?>