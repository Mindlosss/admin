<?php
session_start();
require_once __DIR__ . '/../models/Usuario.php';

$usuarioModel = new Usuario();

if (isset($_POST['accion'])) {
    
    // REGISTRO
    if ($_POST['accion'] === 'registrar') {
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $password = $_POST['password'];

        $resultado = $usuarioModel->registrar($nombre, $correo, $password);

        if (isset($resultado['status']) && $resultado['status'] === 'ok') {
            $_SESSION['mensaje'] = "Usuario registrado correctamente. Ahora inicia sesión.";
            // Redirigir al LOGIN
            header("Location: ../index.php?view=login");
        } else {
            $_SESSION['error'] = $resultado['message'] ?? "Error al registrar.";
            // Redirigir al REGISTRO
            header("Location: ../index.php?view=register");
        }
    }

    // LOGIN
    if ($_POST['accion'] === 'login') {
        $correo = $_POST['correo'];
        $password = $_POST['password'];

        $resultado = $usuarioModel->login($correo, $password);

        if ($resultado['status'] === 'success') {
            $_SESSION['usuario_id'] = $resultado['data']['id_usuario'];
            $_SESSION['usuario_nombre'] = $resultado['data']['nombre'];
            
            // Éxito: Redirigir al DASHBOARD
            header("Location: ../index.php?view=dashboard");
        } else {
            $_SESSION['error'] = "Correo o contraseña incorrectos.";
            // Error: Redirigir al LOGIN
            header("Location: ../index.php?view=login");
        }
    }
}
?>