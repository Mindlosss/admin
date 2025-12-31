<?php
declare(strict_types=1);

session_start();

require 'core/autoload.php';
require 'core/helpers.php';

use App\Core\AuthMiddleware;
use App\Core\Router;
use App\Controllers\AuthController;
use App\Controllers\AutoController;
use App\Controllers\MarcaController;

$router = new Router();
$authMiddleware = [[AuthMiddleware::class, 'handle']];

// Auth
$router->get('login', [AuthController::class, 'showLogin']);
$router->post('login', [AuthController::class, 'login']);
$router->get('register', [AuthController::class, 'showRegister']);
$router->post('register', [AuthController::class, 'register']);
$router->get('logout', [AuthController::class, 'logout'], $authMiddleware);

// Autos
$router->get('', [AutoController::class, 'index'], $authMiddleware);
$router->get('dashboard', [AutoController::class, 'index'], $authMiddleware);
$router->get('autos/create', [AutoController::class, 'create'], $authMiddleware);
$router->post('autos', [AutoController::class, 'store'], $authMiddleware);
$router->get('autos/{id}/edit', [AutoController::class, 'edit'], $authMiddleware);
$router->post('autos/{id}/update', [AutoController::class, 'update'], $authMiddleware);
$router->post('autos/{id}/delete', [AutoController::class, 'destroy'], $authMiddleware);

// Marcas
$router->get('brands/create', [MarcaController::class, 'create'], $authMiddleware);
$router->post('brands', [MarcaController::class, 'store'], $authMiddleware);

$route = $_GET['route'] ?? 'dashboard';
$router->dispatch($route, $_SERVER['REQUEST_METHOD'] ?? 'GET');
