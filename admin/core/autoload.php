<?php
declare(strict_types=1);

spl_autoload_register(function (string $class): void {
    $prefix = 'App\\';
    $baseDir = __DIR__ . '/../';

    if (strncmp($prefix, $class, strlen($prefix)) !== 0) {
        return;
    }

    $relative = substr($class, strlen($prefix));
    $relativePath = str_replace('\\', DIRECTORY_SEPARATOR, $relative);

    $parts = explode(DIRECTORY_SEPARATOR, $relativePath);
    if (!empty($parts)) {
        $parts[0] = strtolower($parts[0]);
    }
    $relativePath = implode(DIRECTORY_SEPARATOR, $parts);

    $file = $baseDir . $relativePath . '.php';

    if (file_exists($file)) {
        require $file;
    }
});
