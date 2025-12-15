<?php
require_once __DIR__ . '/../config/db.php';

class Usuario {
    private $db;

    public function __construct() {
        $this->db = new Con();
    }

    // Registrar nuevo usuario
    public function registrar($nombre, $correo, $password) {
        // Verificamos si el correo ya está en bd
        $check = $this->db->ejecutar("SELECT id_usuario FROM usuarios WHERE correo = '$correo'");
        $data = json_decode($check, true);
        
        if (!empty($data) && !isset($data['status'])) {
            return ["status" => "error", "message" => "El correo ya está registrado."];
        }

        // Hash
        $hash = password_hash($password, PASSWORD_BCRYPT);

        // Insertar
        $sql = "INSERT INTO usuarios (nombre, correo, contra) VALUES ('$nombre', '$correo', '$hash')";
        $result = $this->db->ejecutar($sql);
        
        return json_decode($result, true);
    }

    // Validar Login
    public function login($correo, $password) {
        $sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
        $result = $this->db->ejecutar($sql);
        $usuario = json_decode($result, true);

        // Si encontramos al usuario
        if (!empty($usuario) && !isset($usuario['status'])) {
            $userDatos = $usuario[0]; // Tomamos el primer resultado
            
            // Verificamos hash
            if (password_verify($password, $userDatos['contra'])) {
                // retornamos los datos del usuario
                unset($userDatos['contra']);
                return ["status" => "success", "data" => $userDatos];
            }
        }

        return ["status" => "error", "message" => "Credenciales incorrectas."];
    }
}
?>