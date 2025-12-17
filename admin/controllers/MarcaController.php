<?php
session_start();
require_once __DIR__ . '/../models/Marca.php';

if (isset($_POST['accion'])) {
    
    // action para crear una nueva marca
    if ($_POST['accion'] === 'crear_marca') {
        $nombre = $_POST['nombre'];
        $id_usuario = $_SESSION['usuario_id'] ?? 1;

        // Procesar Imagen
        $imagen = "";
        if (isset($_FILES['logo']) && $_FILES['logo']['error'] === 0) {
            $directorio = "../assets/images/brands/"; // Ruta relativa desde controllers
            if (!file_exists($directorio)) mkdir($directorio, 0777, true);

            $extension = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
            $nombre_archivo = uniqid() . "_brand." . $extension;
            
            if (move_uploaded_file($_FILES['logo']['tmp_name'], $directorio . $nombre_archivo)) {
                // Guardamos la ruta que se usará en la vista
                $imagen = "assets/images/brands/" . $nombre_archivo;
            }
        }

        if ($nombre && $imagen) {
            $marcaModel = new Marca();
            if ($marcaModel->crear($nombre, $imagen, $id_usuario)) {
                $_SESSION['mensaje'] = "Marca creada correctamente.";
                $_SESSION['tipo_mensaje'] = "success";
            } else {
                $_SESSION['mensaje'] = "Error al guardar.";
                $_SESSION['tipo_mensaje'] = "danger";
            }
        } else {
            $_SESSION['mensaje'] = "Faltan datos obligatorios.";
            $_SESSION['tipo_mensaje'] = "warning";
        }

        // Redirigir de vuelta a la vista
        header("Location: ../index.php?view=add-brand");
        exit();
    }
}
?>