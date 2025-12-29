<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;
use App\Models\Marca;
use function App\Core\flash;
use function App\Core\redirect;

class MarcaController
{
    private Marca $marcas;

    public function __construct()
    {
        $this->marcas = new Marca();
    }

    public function create(): void
    {
        View::render('main/add-brand', [
            'mensaje' => flash('mensaje'),
            'tipo_mensaje' => flash('tipo_mensaje'),
        ]);
    }

    public function store(): void
    {
        $nombre = $_POST['nombre'] ?? '';
        $idUsuario = $_SESSION['usuario_id'] ?? 1;

        $imagen = $this->procesarLogo();

        if ($nombre && $imagen) {
            if ($this->marcas->crear($nombre, $imagen, $idUsuario)) {
                flash('mensaje', 'Marca creada correctamente.');
                flash('tipo_mensaje', 'success');
            } else {
                flash('mensaje', 'Error al guardar.');
                flash('tipo_mensaje', 'danger');
            }
        } else {
            flash('mensaje', 'Faltan datos obligatorios.');
            flash('tipo_mensaje', 'warning');
        }

        redirect('brands/create');
    }

    private function procesarLogo(): string
    {
        if (!isset($_FILES['logo']) || $_FILES['logo']['error'] !== 0) {
            return '';
        }

        $directorio = "assets/images/brands/";
        $destino = __DIR__ . "/../{$directorio}";
        if (!is_dir($destino)) {
            mkdir($destino, 0777, true);
        }

        $extension = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
        $nombreArchivo = uniqid() . "_brand." . $extension;

        if (move_uploaded_file($_FILES['logo']['tmp_name'], $destino . $nombreArchivo)) {
            return $directorio . $nombreArchivo;
        }

        return '';
    }
}
