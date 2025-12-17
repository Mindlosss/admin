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
}
?>