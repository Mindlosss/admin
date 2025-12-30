<?php
declare(strict_types=1);

namespace App\Core;

class AuthMiddleware
{
    public function handle(): void
    {
        if (!isset($_SESSION['usuario_id'])) {
            redirect('login');
        }
    }
}
