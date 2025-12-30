<?php
declare(strict_types=1);

namespace App\Config;

use PDO;
use PDOException;

class Database
{
    private ?PDO $conn = null;
    private string $host = 'localhost';
    private string $db = 'd4537_autos_gen';
    private string $user = 'root';
    private string $pass = '';
    private string $charset = 'utf8mb4';

    public function getConnection(): PDO
    {
        if ($this->conn instanceof PDO) {
            return $this->conn;
        }

        $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";

        try {
            $this->conn = new PDO($dsn, $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            die("Error DB: " . $e->getMessage());
        }
    }
}
