<?php
require_once __DIR__ . '/../config/db.php';

class Auto {
    private $conn;
    private $table = "autos";
    private $table_img = "imagenes";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function crear($datos, $imagenes, $id_usuario) {
        try {
            // Iniciar transacción para asegurar que se guarde el auto y las fotos o nada
            $this->conn->beginTransaction();

            // Insertar el auto
            $query = "INSERT INTO " . $this->table . " 
                    (id_marca, modelo, tipo, year, color, kilometraje, precio, transmision, combustible, created_by) 
                    VALUES (:marca, :modelo, :tipo, :year, :color, :km, :precio, :transmision, :combustible, :user)";
            
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

    public function obtenerTodos() {
        // join para obtener marca y una imagen thumbnail
        $query = "SELECT a.id_auto, a.modelo, a.year, a.color, a.precio, m.nombre as marca, i.imagen 
                  FROM " . $this->table . " a
                  LEFT JOIN marcas m ON a.id_marca = m.id_marca
                  LEFT JOIN imagenes i ON a.id_auto = i.id_auto AND i.thumbnail = 1
                  ORDER BY a.created_at DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
?>