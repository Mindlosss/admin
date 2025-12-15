<?php

require_once 'config/db.php';

try {
    $db = new Con();
    
    echo "<h3>Conexión exitosa</h3>";
    
    $db->cerrar();

} catch (Exception $e) {
    echo "<h3>Error de conexión</h3>";
    echo "Error: " . $e->getMessage();
}
?>