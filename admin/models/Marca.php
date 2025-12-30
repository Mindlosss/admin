<?php
declare(strict_types=1);

namespace App\Models;

use App\Config\Database;
use PDO;

class Marca {
    private PDO $conn;
    private $table_name = "marcas";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Para llenar el Select en Agregar Coche
    public function obtenerTodas() {
        $query = "SELECT id_marca, nombre FROM " . $this->table_name . " ORDER BY nombre ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Para guardar una nueva marca
    public function crear($nombre, $imagen, $id_usuario) {
        $query = "INSERT INTO " . $this->table_name . " (nombre, imagen, created_by) VALUES (:nombre, :imagen, :created_by)";
        $stmt = $this->conn->prepare($query);

        // Limpieza básica
        $nombre = htmlspecialchars(strip_tags($nombre));

        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":imagen", $imagen);
        $stmt->bindParam(":created_by", $id_usuario);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
