<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;
use App\Models\Usuario;
use function App\Core\flash;
use function App\Core\redirect;

class AuthController
{
    private Usuario $usuarios;

    public function __construct()
    {
        $this->usuarios = new Usuario();
    }

    public function showLogin(): void
    {
        View::render('auth/login', [
            'mensaje' => flash('mensaje'),
            'error' => flash('error'),
        ]);
    }

    /*
    public function showRegister(): void
    {
        View::render('auth/register', [
            'error' => flash('error'),
        ]);
    }

    public function register(): void
    {
        $nombre = $_POST['nombre'] ?? '';
        $correo = $_POST['correo'] ?? '';
        $password = $_POST['password'] ?? '';

        $resultado = $this->usuarios->registrar($nombre, $correo, $password);

        if (($resultado['status'] ?? '') === 'success' || ($resultado['status'] ?? '') === 'ok') {
            flash('mensaje', "Usuario registrado correctamente. Ahora inicia sesión.");
            redirect('login');
        }

        flash('error', $resultado['message'] ?? "Error al registrar.");
        redirect('register');
    }
    */

    public function login(): void
    {
        $correo = $_POST['correo'] ?? '';
        $password = $_POST['password'] ?? '';

        $resultado = $this->usuarios->login($correo, $password);

        if (($resultado['status'] ?? '') === 'success') {
            $_SESSION['usuario_id'] = $resultado['data']['id_usuario'];
            $_SESSION['usuario_nombre'] = $resultado['data']['nombre'];
            redirect('dashboard');
        }

        flash('error', "Correo o contraseña incorrectos.");
        redirect('login');
    }

    public function logout(): void
    {
        session_destroy();
        redirect('login');
    }
}
