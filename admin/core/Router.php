<?php
declare(strict_types=1);

namespace App\Core;

/**
 * Router sencillo que trabaja con rutas "autos/{id}/edit se pueden usar middlewares"
 */
class Router
{
    /** @var array<string, array<int, array{path:string, handler:callable|string|array, middleware:array}>> */
    private array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public function get(string $path, callable|string|array $handler, array $middleware = []): void
    {
        $this->addRoute('GET', $path, $handler, $middleware);
    }

    public function post(string $path, callable|string|array $handler, array $middleware = []): void
    {
        $this->addRoute('POST', $path, $handler, $middleware);
    }

    private function addRoute(string $method, string $path, callable|string|array $handler, array $middleware = []): void
    {
        $this->routes[$method][] = [
            'path' => trim($path, '/'),
            'handler' => $handler,
            'middleware' => $middleware,
        ];
    }

    public function dispatch(string $route, string $method = 'GET'): void
    {
        $route = trim($route, '/');
        $method = strtoupper($method);
        $params = [];

        $match = $this->match($method, $route, $params);

        if ($match === null) {
            http_response_code(404);
            echo "Ruta no encontrada";
            return;
        }

        [$handler, $middleware] = $match;

        foreach ($middleware as $mw) {
            if (is_callable($mw)) {
                $mw($params);
            } elseif (is_array($mw) && isset($mw[0], $mw[1])) {
                [$class, $methodName] = $mw;
                $instance = new $class();
                $instance->{$methodName}($params);
            }
        }

        if (is_callable($handler)) {
            $handler(...array_values($params));
            return;
        }

        if (is_array($handler) && isset($handler[0], $handler[1])) {
            [$class, $methodName] = $handler;
            $instance = new $class();
            $instance->{$methodName}(...array_values($params));
            return;
        }
    }

    /**
     * @return array{0: callable|string|array, 1: array}|null
     */
    private function match(string $method, string $route, array &$params): ?array
    {
        if (!isset($this->routes[$method])) {
            return null;
        }

        foreach ($this->routes[$method] as $definition) {
            $pattern = '#^' . preg_replace('#\{([^}/]+)\}#', '(?P<$1>[^/]+)', $definition['path']) . '$#';
            if (preg_match($pattern, $route, $matches)) {
                $params = [];
                foreach ($matches as $key => $value) {
                    if (!is_int($key)) {
                        $params[$key] = $value;
                    }
                }
                return [$definition['handler'], $definition['middleware']];
            }
        }

        return null;
    }
}
