<?php
declare(strict_types=1);

namespace App\Core;

class View
{
    public static function render(string $template, array $data = []): void
    {
        $path = __DIR__ . '/../views/' . $template . '.php';

        if (!file_exists($path)) {
            throw new \RuntimeException("Vista no encontrada: {$template}");
        }

        extract($data, EXTR_SKIP);
        require $path;
    }
}
