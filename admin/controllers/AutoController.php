<?php
session_start();
require_once __DIR__ . '/../models/Auto.php';

if (isset($_POST['accion'])) {

    // ation para crear un auto
    if ($_POST['accion'] === 'crear_auto') {
        $id_usuario = $_SESSION['usuario_id'] ?? 1;

        $datos = [
            'id_marca' => $_POST['id_marca'],
            'modelo' => $_POST['modelo'],
            'tipo' => $_POST['tipo'],
            'year' => $_POST['year'],
            'color' => $_POST['color'],
            'transmision' => $_POST['transmision'],
            'combustible' => $_POST['combustible'],
            'kilometraje' => $_POST['kilometraje'],
            'precio' => $_POST['precio']
        ];

        // procesamiento de las imagenes
        $rutasImagenes = [];
        if (isset($_FILES['imagenes'])) {
            $directorio = "../assets/images/cars/";
            if (!file_exists($directorio)) mkdir($directorio, 0777, true);

            $total_files = count($_FILES['imagenes']['name']);

            for ($i = 0; $i < $total_files; $i++) {
                if ($_FILES['imagenes']['error'][$i] === 0) {
                    $extension = pathinfo($_FILES['imagenes']['name'][$i], PATHINFO_EXTENSION);
                    $nombre_archivo = uniqid() . "_car_" . $i . "." . $extension;
                    
                    if (move_uploaded_file($_FILES['imagenes']['tmp_name'][$i], $directorio . $nombre_archivo)) {
                        // Guardar ruta para la db
                        $rutasImagenes[] = "assets/images/cars/" . $nombre_archivo;
                    }
                }
            }
        }

        if (!empty($rutasImagenes)) {
            $autoModel = new Auto();
            if ($autoModel->crear($datos, $rutasImagenes, $id_usuario)) {
                $_SESSION['mensaje'] = "Coche agregado al inventario.";
                $_SESSION['tipo_mensaje'] = "success";
            } else {
                $_SESSION['mensaje'] = "Error en base de datos.";
                $_SESSION['tipo_mensaje'] = "danger";
            }
        } else {
            $_SESSION['mensaje'] = "Debes subir al menos una imagen.";
            $_SESSION['tipo_mensaje'] = "warning";
        }

        header("Location: ../index.php?view=add-car");
        exit();
    }
}
?>