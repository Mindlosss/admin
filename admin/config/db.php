<?php

class Con {
    private mysqli $conexion;

    private string $host = 'localhost';
    private string $user = 'root';
    private string $pass = '';    
    private string $db   = 'd4537_autos_gen';

    public function __construct() {
        
        $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->db);

        if ($this->conexion->connect_error) {
            
            throw new Exception(json_encode([
                "status" => "error",
                "message" => "Error de conexión: " . $this->conexion->connect_error,
            ]));
        }
        
    }

    public function ejecutar(string $query): string {
        $resultado = $this->conexion->query($query);

        if (!$resultado) {
            throw new Exception(json_encode([
                "status" => "error",
                "message" => $this->conexion->error,
            ]));
        }

        if ($resultado instanceof mysqli_result) {
            $datos = [];
            while ($fila = $resultado->fetch_assoc()) {
                $datos[] = $fila;
            }
            $resultado->free(); 
            return json_encode($datos);
        }

        return json_encode(["status" => "ok"]);
    }

    public function cerrar(): void {
        $this->conexion->close();
    }
    
}
?>