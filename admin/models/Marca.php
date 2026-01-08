<?php
declare(strict_types=1);

namespace App\Models;

use App\Config\App;
use App\Config\Database;
use PDO;

class Marca {
    private PDO $conn;
    private string $table_name = "marcas";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function contarMarcas(): int
    {
        $query = "SELECT COUNT(*) AS total FROM " . $this->table_name;
        $stmt = $this->conn->query($query);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int) ($row['total'] ?? 0);
    }

    // Para llenar el Select en Agregar Coche
    public function obtenerTodas() {
        $query = "SELECT id_marca, nombre FROM " . $this->table_name . " ORDER BY nombre ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    /**
     * Listado con logo y cantidad de autos asociados.
     *
     * @return array<int, array<string, mixed>>
     */
    public function obtenerListado(): array
    {
        $query = "SELECT m.id_marca, m.nombre, m.imagen, COUNT(a.id_auto) AS total_autos
                  FROM " . $this->table_name . " m
                  LEFT JOIN autos a ON a.id_marca = m.id_marca
                  GROUP BY m.id_marca, m.nombre, m.imagen
                  ORDER BY m.nombre ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId(int $id): ?array
    {
        $query = "SELECT id_marca, nombre, imagen FROM " . $this->table_name . " WHERE id_marca = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
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

    public function actualizar(int $id, string $nombre, ?string $imagen = null): bool
    {
        $nombre = htmlspecialchars(strip_tags($nombre));

        $campos = "nombre = :nombre";
        $params = [
            ':id' => $id,
            ':nombre' => $nombre,
        ];

        if ($imagen !== null) {
            $campos .= ", imagen = :imagen";
            $params[':imagen'] = $imagen;
        }

        $query = "UPDATE " . $this->table_name . " SET {$campos} WHERE id_marca = :id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($params);
    }

    public function tieneAutosAsociados(int $id_marca): bool
    {
        $query = "SELECT COUNT(*) AS total FROM autos WHERE id_marca = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id' => $id_marca]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return ((int) ($row['total'] ?? 0)) > 0;
    }

    public function eliminar(int $id): bool
    {
        $marca = $this->obtenerPorId($id);
        if (!$marca) {
            return false;
        }

        if ($this->tieneAutosAsociados($id)) {
            return false;
        }

        $this->conn->beginTransaction();

        $stmt = $this->conn->prepare("DELETE FROM " . $this->table_name . " WHERE id_marca = :id");
        $ok = $stmt->execute([':id' => $id]);

        if ($ok) {
            $this->conn->commit();
            $this->eliminarArchivoImagen($marca['imagen'] ?? '');
            return true;
        }

        $this->conn->rollBack();
        return false;
    }

    private function eliminarArchivoImagen(string $rutaRelativa): void
    {
        if (!$rutaRelativa) {
            return;
        }

        $relativa = App::imageRelativePath($rutaRelativa);
        if ($relativa === null) {
            return;
        }
        $ruta = __DIR__ . "/../" . $relativa;
        if (file_exists($ruta)) {
            @unlink($ruta);
        }
    }
}
?>
