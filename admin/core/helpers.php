<?php
declare(strict_types=1);

namespace App\Core;

function route_path(string $route): string
{
    return 'index.php?route=' . ltrim($route, '/');
}

function redirect(string $route): void
{
    header('Location: ' . route_path($route));
    exit();
}

function flash(string $key, ?string $value = null): ?string
{
    if ($value === null) {
        if (!isset($_SESSION[$key])) {
            return null;
        }
        $val = $_SESSION[$key];
        unset($_SESSION[$key]);
        return $val;
    }

    $_SESSION[$key] = $value;
    return null;
}
