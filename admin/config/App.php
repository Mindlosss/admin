<?php
declare(strict_types=1);

namespace App\Config;

class App
{
    private const IMAGE_BASE_URL = 'https://adminauto.codigoychips.com/';

    public static function imageBaseUrl(): string
    {
        $env = $_ENV['APP_IMAGE_BASE_URL'] ?? $_ENV['APP_URL'] ?? '';
        $base = $env !== '' ? $env : self::IMAGE_BASE_URL;
        return rtrim($base, '/') . '/';
    }

    public static function imageRelativePath(string $value): ?string
    {
        $value = trim($value);
        if ($value === '') {
            return null;
        }

        $base = self::imageBaseUrl();
        if (strpos($value, $base) === 0) {
            $relative = substr($value, strlen($base));
            return ltrim($relative, '/');
        }

        if (preg_match('#^https?://#i', $value)) {
            $parsed = parse_url($value);
            if (!isset($parsed['path'])) {
                return null;
            }
            return ltrim($parsed['path'], '/');
        }

        return ltrim($value, '/');
    }
}
