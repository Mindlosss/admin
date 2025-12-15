<?php

session_start();

// default view
$vista = isset($_GET['view']) ? $_GET['view'] : 'dashboard';

// seguridad
if (!isset($_SESSION['usuario_id'])) {
    // sino esta logueado solo puede ir al login o registro
    if ($vista !== 'register') {
        $vista = 'login';
    }
} else {
    // si ya esta logueado vamos a dashboard
    if ($vista === 'login' || $vista === 'register') {
        header("Location: index.php?view=dashboard");
        exit();
    }
}

// switch para cargar las vistas
switch ($vista) {
    case 'login':
        require_once 'views/auth/login.php';
        break;
        
    case 'register':
        require_once 'views/auth/register.php';
        break;
        
    case 'dashboard':
        require_once 'views/main/index.php';
        break;
        
    case 'add-car':
        require_once 'views/main/add-car.php';
        break;
        
    case 'add-brand':
        require_once 'views/main/add-brand.php';
        break;

    case 'logout':
        // Acción de salir
        session_destroy();
        header("Location: index.php?view=login");
        exit();
        break;
        
    default:
        // si escribe cualquier cosa en la url ir a login
        header("Location: index.php?view=login");
        exit();
        break;
}
?>