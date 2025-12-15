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
            header("Location: ../views/auth/login.php");
        } else {
            $_SESSION['error'] = $resultado['message'] ?? "Error al registrar.";
            header("Location: ../views/auth/register.php");
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
            // redireccionar al index
            header("Location: ../views/main/index.php"); 
        } else {
            $_SESSION['error'] = "Correo o contraseña incorrectos.";
            header("Location: ../views/auth/login.php");
        }
    }
}
?>