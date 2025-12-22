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

    // action para eliminar auto
    if ($_POST['accion'] === 'eliminar_auto') {
        $id_auto = $_POST['id_auto'];
        
        $autoModel = new Auto();
        if ($autoModel->eliminar($id_auto)) {
            $_SESSION['mensaje'] = "Coche eliminado correctamente.";
            $_SESSION['tipo_mensaje'] = "success";
        } else {
            $_SESSION['mensaje'] = "Error al eliminar el coche.";
            $_SESSION['tipo_mensaje'] = "danger";
        }

        header("Location: ../index.php"); 
        exit();
    }

    // action para editar auto
    if ($_POST['accion'] === 'editar_auto') {
        $id_auto = $_POST['id_auto'];
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

        $autoModel = new Auto();
        $actualizado = $autoModel->actualizar($id_auto, $datos);

        // Eliminar imágenes marcadas
        if (!empty($_POST['eliminar_imagen']) && is_array($_POST['eliminar_imagen'])) {
            $idsEliminar = array_map('intval', $_POST['eliminar_imagen']);
            $autoModel->eliminarImagenesPorIds($idsEliminar);
        }

        // Subir nuevas imágenes
        $rutasImagenes = [];
        if (isset($_FILES['nuevas_imagenes'])) {
            $directorio = "../assets/images/cars/";
            if (!file_exists($directorio)) mkdir($directorio, 0777, true);

            $total_files = count($_FILES['nuevas_imagenes']['name']);

            for ($i = 0; $i < $total_files; $i++) {
                if ($_FILES['nuevas_imagenes']['error'][$i] === 0) {
                    $extension = pathinfo($_FILES['nuevas_imagenes']['name'][$i], PATHINFO_EXTENSION);
                    $nombre_archivo = uniqid() . "_car_" . $i . "." . $extension;
                    
                    if (move_uploaded_file($_FILES['nuevas_imagenes']['tmp_name'][$i], $directorio . $nombre_archivo)) {
                        $rutasImagenes[] = "assets/images/cars/" . $nombre_archivo;
                    }
                }
            }
        }

        $nuevasIds = [];
        if (!empty($rutasImagenes)) {
            $nuevasIds = $autoModel->agregarImagenes($id_auto, $rutasImagenes, $id_usuario);
        }

        // Establecer imagen principal si se envía
        if (isset($_POST['imagen_principal']) && $_POST['imagen_principal']) {
            $autoModel->establecerImagenPrincipal($id_auto, (int) $_POST['imagen_principal']);
        } elseif (!empty($nuevasIds)) {
            // Si no se envió principal pero se subieron nuevas, usar la primera nueva
            $autoModel->establecerImagenPrincipal($id_auto, (int) $nuevasIds[0]);
        } else {
            // Garantizar que exista una principal tras eliminaciones
            $autoModel->asegurarImagenPrincipal($id_auto);
        }

        if ($actualizado) {
            $_SESSION['mensaje'] = "Coche actualizado correctamente.";
            $_SESSION['tipo_mensaje'] = "success";
        } else {
            $_SESSION['mensaje'] = "No se pudieron guardar los cambios.";
            $_SESSION['tipo_mensaje'] = "warning";
        }

        header("Location: ../index.php");
        exit();
    }
}
?>
