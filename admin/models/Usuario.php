<?php
require_once __DIR__ . '/../config/db.php';

class Usuario {
    private PDO $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Registrar nuevo usuario
    public function registrar($nombre, $correo, $password) {

        // Verificamos si el correo ya está en bd
        $sqlCheck = "SELECT id_usuario FROM usuarios WHERE correo = :correo";
        $stmt = $this->conn->prepare($sqlCheck);
        $stmt->execute([':correo' => $correo]);

        if ($stmt->rowCount() > 0) {
            return ["status" => "error", "message" => "El correo ya está registrado."];
        }

        // Hash
        $hash = password_hash($password, PASSWORD_BCRYPT);

        // Insertar
        $sql = "INSERT INTO usuarios (nombre, correo, contra) 
                VALUES (:nombre, :correo, :contra)";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':nombre' => $nombre,
            ':correo' => $correo,
            ':contra' => $hash
        ]);

        return ["status" => "success", "message" => "Usuario registrado correctamente."];
    }

    // Validar Login
    public function login($correo, $password) {

        $sql = "SELECT * FROM usuarios WHERE correo = :correo LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':correo' => $correo]);

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($password, $usuario['contra'])) {
            unset($usuario['contra']);
            return ["status" => "success", "data" => $usuario];
        }

        return ["status" => "error", "message" => "Credenciales incorrectas."];
    }
}
