<?php
declare(strict_types=1);

namespace App\Models;

use App\Config\App;
use App\Config\Database;
use Exception;
use PDO;

class Auto {
    private PDO $conn;
    private $table = "autos";
    private $table_img = "imagenes";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Conteos y estadisticas para dashboard
    public function contarAutos(): int
    {
        $query = "SELECT COUNT(*) AS total FROM " . $this->table;
        $stmt = $this->conn->query($query);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int) ($row['total'] ?? 0);
    }

    public function valorInventario(): float
    {
        $query = "SELECT SUM(precio) AS total FROM " . $this->table;
        $stmt = $this->conn->query($query);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return (float) ($row['total'] ?? 0);
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public function obtenerRecientes(int $limite = 5): array
    {
        $limite = max(1, $limite);
        $query = "SELECT a.id_auto, a.modelo, a.year, a.color, a.precio, m.nombre as marca, i.imagen 
                  FROM " . $this->table . " a
                  LEFT JOIN marcas m ON a.id_marca = m.id_marca
                  LEFT JOIN imagenes i ON a.id_auto = i.id_auto AND i.thumbnail = 1
                  ORDER BY a.created_at DESC
                  LIMIT {$limite}";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // crear un nuevo auto con imagenes
    public function crear($datos, $imagenes, $id_usuario) {
        try {
            // Iniciar transacción para asegurar que se guarde el auto y las fotos o nada
            $this->conn->beginTransaction();

            // Insertar el auto
            $query = "INSERT INTO " . $this->table . " 
                    (id_marca, modelo, tipo, year, color, kilometraje, precio, transmision, combustible, descripcion, ocultar_kilometraje, consignacion, created_by) 
                    VALUES (:marca, :modelo, :tipo, :year, :color, :km, :precio, :transmision, :combustible, :descripcion, :ocultar_kilometraje, :consignacion, :user)";
            
            $stmt = $this->conn->prepare($query);
            $stmt->execute([
                ':marca' => $datos['id_marca'],
                ':modelo' => $datos['modelo'],
                ':tipo' => $datos['tipo'],
                ':year' => $datos['year'],
                ':color' => $datos['color'],
                ':km' => $datos['kilometraje'],
                ':precio' => $datos['precio'],
                ':transmision' => $datos['transmision'],
                ':combustible' => $datos['combustible'],
                ':descripcion' => $datos['descripcion'],
                ':ocultar_kilometraje' => $datos['ocultar_kilometraje'],
                ':consignacion' => $datos['consignacion'],
                ':user' => $id_usuario
            ]);

            $id_auto = $this->conn->lastInsertId();

            // Insertar images
            $queryImg = "INSERT INTO " . $this->table_img . " (id_auto, imagen, thumbnail, created_by) VALUES (:id_auto, :imagen, :thumb, :user)";
            $stmtImg = $this->conn->prepare($queryImg);

            foreach($imagenes as $index => $rutaImagen) {
                //prmera imagen thumbnail
                $thumbnail = ($index === 0) ? 1 : 0;
                $stmtImg->execute([
                    ':id_auto' => $id_auto,
                    ':imagen' => $rutaImagen,
                    ':thumb' => $thumbnail,
                    ':user' => $id_usuario
                ]);
            }

            $this->conn->commit();
            return true;

        } catch (Exception $e) {
            $this->conn->rollBack();
            return false;
        }
    }

    // obtener todos los autos con marca y todas sus imA­genes (concat)
    public function obtenerTodos() {
        // join para obtener marca y todas las imA­genes (thumbnail primero)
        $query = "SELECT a.id_auto,
                         a.modelo,
                         a.year,
                         a.color,
                         a.precio,
                         m.nombre as marca,
                         GROUP_CONCAT(i.imagen ORDER BY i.thumbnail DESC, i.id_imagen ASC) AS imagenes
                  FROM " . $this->table . " a
                  LEFT JOIN marcas m ON a.id_marca = m.id_marca
                  LEFT JOIN imagenes i ON a.id_auto = i.id_auto
                  GROUP BY a.id_auto, a.modelo, a.year, a.color, a.precio, m.nombre
                  ORDER BY a.created_at DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // buscar un auto por id
    public function obtenerPorId($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id_auto = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Obtener imágenes asociadas a un auto
    public function obtenerImagenesPorAuto($id_auto) {
        $query = "SELECT id_imagen, imagen, thumbnail FROM " . $this->table_img . " WHERE id_auto = :id_auto ORDER BY id_imagen ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id_auto' => $id_auto]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Actualizar datos del auto
    public function actualizar($id, $datos) {
        $query = "UPDATE " . $this->table . " 
                  SET id_marca = :marca, modelo = :modelo, tipo = :tipo, 
                      year = :year, color = :color, kilometraje = :km, 
                      precio = :precio, transmision = :transmision, combustible = :combustible,
                      descripcion = :descripcion, ocultar_kilometraje = :ocultar_kilometraje, consignacion = :consignacion
                  WHERE id_auto = :id";
        
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':marca', $datos['id_marca']);
        $stmt->bindParam(':modelo', $datos['modelo']);
        $stmt->bindParam(':tipo', $datos['tipo']);
        $stmt->bindParam(':year', $datos['year']);
        $stmt->bindParam(':color', $datos['color']);
        $stmt->bindParam(':km', $datos['kilometraje']);
        $stmt->bindParam(':precio', $datos['precio']);
        $stmt->bindParam(':transmision', $datos['transmision']);
        $stmt->bindParam(':combustible', $datos['combustible']);
        $stmt->bindParam(':descripcion', $datos['descripcion']);
        $stmt->bindParam(':ocultar_kilometraje', $datos['ocultar_kilometraje']);
        $stmt->bindParam(':consignacion', $datos['consignacion']);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Agregar nuevas imágenes para un auto existente
    public function agregarImagenes($id_auto, $imagenes, $id_usuario) {
        $queryImg = "INSERT INTO " . $this->table_img . " (id_auto, imagen, thumbnail, created_by) VALUES (:id_auto, :imagen, :thumb, :user)";
        $stmtImg = $this->conn->prepare($queryImg);

        $insertedIds = [];
        foreach($imagenes as $index => $rutaImagen) {
            $thumb = 0; // se controla aparte la principal
            $stmtImg->execute([
                ':id_auto' => $id_auto,
                ':imagen' => $rutaImagen,
                ':thumb' => $thumb,
                ':user' => $id_usuario
            ]);
            $insertedIds[] = $this->conn->lastInsertId();
        }
        return $insertedIds;
    }

    // Marcar una imagen como principal
    public function establecerImagenPrincipal($id_auto, $id_imagen) {
        $queryReset = "UPDATE " . $this->table_img . " SET thumbnail = 0 WHERE id_auto = :id_auto";
        $stmtReset = $this->conn->prepare($queryReset);
        $stmtReset->execute([':id_auto' => $id_auto]);

        $querySet = "UPDATE " . $this->table_img . " SET thumbnail = 1 WHERE id_imagen = :id_imagen AND id_auto = :id_auto";
        $stmtSet = $this->conn->prepare($querySet);
        $stmtSet->execute([':id_imagen' => $id_imagen, ':id_auto' => $id_auto]);
    }

    // Asegura que haya al menos una imagen marcada como principal
    public function asegurarImagenPrincipal($id_auto) {
        $queryCheck = "SELECT id_imagen FROM " . $this->table_img . " WHERE id_auto = :id_auto AND thumbnail = 1 LIMIT 1";
        $stmtCheck = $this->conn->prepare($queryCheck);
        $stmtCheck->execute([':id_auto' => $id_auto]);
        $hayPrincipal = $stmtCheck->fetch(PDO::FETCH_ASSOC);

        if (!$hayPrincipal) {
            $queryFirst = "SELECT id_imagen FROM " . $this->table_img . " WHERE id_auto = :id_auto ORDER BY id_imagen ASC LIMIT 1";
            $stmtFirst = $this->conn->prepare($queryFirst);
            $stmtFirst->execute([':id_auto' => $id_auto]);
            $first = $stmtFirst->fetch(PDO::FETCH_ASSOC);
            if ($first) {
                $this->establecerImagenPrincipal($id_auto, $first['id_imagen']);
            }
        }
    }

    // Eliminar imágenes específicas
    public function eliminarImagenesPorIds($ids = []) {
        if (empty($ids)) return;

        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $query = "SELECT id_imagen, imagen FROM " . $this->table_img . " WHERE id_imagen IN ($placeholders)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute($ids);
        $imagenes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($imagenes as $img) {
            $relativa = App::imageRelativePath($img['imagen'] ?? '');
            if ($relativa === null) {
                continue;
            }
            $rutaArchivo = __DIR__ . "/../" . $relativa;
            if (file_exists($rutaArchivo)) {
                unlink($rutaArchivo);
            }
        }

        $queryDelete = "DELETE FROM " . $this->table_img . " WHERE id_imagen IN ($placeholders)";
        $stmtDel = $this->conn->prepare($queryDelete);
        $stmtDel->execute($ids);
    }

    // eliminar auto y sus imagenes asociadas
    public function eliminar($id) {
        try {
            $this->conn->beginTransaction();

            $queryImg = "SELECT imagen FROM " . $this->table_img . " WHERE id_auto = :id";
            $stmtImg = $this->conn->prepare($queryImg);
            $stmtImg->execute([':id' => $id]);
            
            while($img = $stmtImg->fetch(PDO::FETCH_ASSOC)){
                $relativa = App::imageRelativePath($img['imagen'] ?? '');
                if ($relativa === null) {
                    continue;
                }
                $rutaArchivo = __DIR__ . "/../" . $relativa;
                if(file_exists($rutaArchivo)){
                    unlink($rutaArchivo);
                }
            }

            $queryDelImg = "DELETE FROM " . $this->table_img . " WHERE id_auto = :id";
            $stmtDelImg = $this->conn->prepare($queryDelImg);
            $stmtDelImg->execute([':id' => $id]);

            $queryDelAuto = "DELETE FROM " . $this->table . " WHERE id_auto = :id";
            $stmtDelAuto = $this->conn->prepare($queryDelAuto);
            $stmtDelAuto->execute([':id' => $id]);

            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return false;
        }
    }
}
?>
