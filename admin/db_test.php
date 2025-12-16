<?php

require_once 'config/db.php';

try {
    $database = new Database();
    $conn = $database->getConnection();

    if ($conn) {
        echo "<h3>Conexión exitosa</h3>";
    }

} catch (Exception $e) {
    echo "<h3>Error de conexión</h3>";
    echo "Error: " . $e->getMessage();
}
?>