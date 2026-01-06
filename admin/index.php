<?php
declare(strict_types=1);

session_start();

require __DIR__ . '/core/autoload.php';
require __DIR__ . '/core/helpers.php';

use App\Core\AuthMiddleware;
use App\Core\Router;
use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use App\Controllers\AutoController;
use App\Controllers\MarcaController;

$router = new Router();
$authMiddleware = [[AuthMiddleware::class, 'handle']];

// Auth
$router->get('login', [AuthController::class, 'showLogin']);
$router->post('login', [AuthController::class, 'login']);
// $router->get('register', [AuthController::class, 'showRegister']);
// $router->post('register', [AuthController::class, 'register']);
$router->get('logout', [AuthController::class, 'logout'], $authMiddleware);

// Dashboard
$router->get('', [DashboardController::class, 'index'], $authMiddleware);
$router->get('dashboard', [DashboardController::class, 'index'], $authMiddleware);

// Autos
$router->get('autos', [AutoController::class, 'index'], $authMiddleware);
$router->get('autos/create', [AutoController::class, 'create'], $authMiddleware);
$router->post('autos', [AutoController::class, 'store'], $authMiddleware);
$router->get('autos/{id}/edit', [AutoController::class, 'edit'], $authMiddleware);
$router->post('autos/{id}/update', [AutoController::class, 'update'], $authMiddleware);
$router->post('autos/{id}/delete', [AutoController::class, 'destroy'], $authMiddleware);

// Marcas
$router->get('brands', [MarcaController::class, 'index'], $authMiddleware);
$router->get('brands/create', [MarcaController::class, 'create'], $authMiddleware);
$router->post('brands', [MarcaController::class, 'store'], $authMiddleware);
$router->get('brands/{id}/edit', [MarcaController::class, 'edit'], $authMiddleware);
$router->post('brands/{id}/update', [MarcaController::class, 'update'], $authMiddleware);
$router->post('brands/{id}/delete', [MarcaController::class, 'destroy'], $authMiddleware);

$route = $_GET['route'] ?? 'dashboard';
$router->dispatch($route, $_SERVER['REQUEST_METHOD'] ?? 'GET');
