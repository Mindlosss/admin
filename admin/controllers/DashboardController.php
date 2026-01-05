<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;
use App\Models\Auto;
use App\Models\Marca;
use function App\Core\flash;

class DashboardController
{
    private Auto $autos;
    private Marca $marcas;

    public function __construct()
    {
        $this->autos = new Auto();
        $this->marcas = new Marca();
    }

    public function index(): void
    {
        $totales = [
            'autos' => $this->autos->contarAutos(),
            'marcas' => $this->marcas->contarMarcas(),
            'valor' => $this->autos->valorInventario(),
        ];

        $autosRecientes = $this->autos->obtenerRecientes(5);

        View::render('main/dashboard', [
            'totales' => $totales,
            'autosRecientes' => $autosRecientes,
            'mensaje' => flash('mensaje'),
            'tipo_mensaje' => flash('tipo_mensaje'),
        ]);
    }
}
