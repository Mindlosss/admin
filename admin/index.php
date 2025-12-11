<?php

session_start();

$vista = isset($_GET['view']) ? $_GET['view'] : 'dashboard';

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
}

?>