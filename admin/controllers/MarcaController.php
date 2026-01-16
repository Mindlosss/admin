<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Config\App;
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

    public function index(): void
    {
        $marcas = $this->marcas->obtenerListado();

        View::render('main/brands-index', [
            'marcas' => $marcas,
            'mensaje' => flash('mensaje'),
            'tipo_mensaje' => flash('tipo_mensaje'),
        ]);
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
        $nombre = trim($_POST['nombre'] ?? '');
        $idUsuario = $_SESSION['usuario_id'] ?? 1;

        $imagen = $this->procesarLogo(true);

        if ($nombre && $imagen) {
            if ($this->marcas->crear($nombre, $imagen, $idUsuario)) {
                flash('mensaje', 'Marca creada correctamente.');
                flash('tipo_mensaje', 'success');
                redirect('brands');
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

    public function edit(string $id): void
    {
        $marca = $this->marcas->obtenerPorId((int) $id);

        if (!$marca) {
            flash('mensaje', 'Marca no encontrada.');
            flash('tipo_mensaje', 'warning');
            redirect('brands');
        }

        View::render('main/edit-brand', [
            'marca' => $marca,
            'mensaje' => flash('mensaje'),
            'tipo_mensaje' => flash('tipo_mensaje'),
        ]);
    }

    public function update(string $id): void
    {
        $marca = $this->marcas->obtenerPorId((int) $id);
        if (!$marca) {
            flash('mensaje', 'Marca no encontrada.');
            flash('tipo_mensaje', 'warning');
            redirect('brands');
        }

        $nombre = trim($_POST['nombre'] ?? '');
        $nuevoLogo = $this->procesarLogo(false);

        if ($nuevoLogo === '') {
            flash('mensaje', 'El logo no es valido. Usa JPG o PNG.');
            flash('tipo_mensaje', 'warning');
            redirect("brands/{$id}/edit");
        }

        if (!$nombre) {
            flash('mensaje', 'El nombre es obligatorio.');
            flash('tipo_mensaje', 'warning');
            redirect("brands/{$id}/edit");
        }

        $imagenParaGuardar = $nuevoLogo !== null ? $nuevoLogo : null;
        $actualizado = $this->marcas->actualizar((int) $id, $nombre, $imagenParaGuardar);

        if ($actualizado) {
            if ($nuevoLogo !== null && !empty($marca['imagen'])) {
                $this->eliminarArchivo($marca['imagen']);
            }

            flash('mensaje', 'Marca actualizada correctamente.');
            flash('tipo_mensaje', 'success');
        } else {
            flash('mensaje', 'No se pudieron guardar los cambios.');
            flash('tipo_mensaje', 'danger');
        }

        redirect('brands');
    }

    public function destroy(string $id): void
    {
        $idMarca = (int) $id;

        if ($this->marcas->tieneAutosAsociados($idMarca)) {
            flash('mensaje', 'No puedes eliminar la marca porque tiene coches asociados.');
            flash('tipo_mensaje', 'warning');
            redirect('brands');
        }

        if ($this->marcas->eliminar($idMarca)) {
            flash('mensaje', 'Marca eliminada correctamente.');
            flash('tipo_mensaje', 'success');
        } else {
            flash('mensaje', 'No se pudo eliminar la marca.');
            flash('tipo_mensaje', 'danger');
        }

        redirect('brands');
    }

    private function procesarLogo(bool $esObligatorio = true): ?string
    {
        // sin archivo
        if (!isset($_FILES['logo']) || $_FILES['logo']['error'] === 4) {
            return $esObligatorio ? '' : null;
        }

        if ($_FILES['logo']['error'] !== 0) {
            return $esObligatorio ? '' : null;
        }

        $directorio = 'assets/images/brands/';
        $baseUrl = App::imageBaseUrl();
        $destino = __DIR__ . "/../{$directorio}";
        if (!is_dir($destino)) {
            mkdir($destino, 0777, true);
        }

        $extension = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
        $extension = strtolower($extension);
        $permitidas = ['jpg', 'jpeg', 'png'];

        if (!in_array($extension, $permitidas, true)) {
            return $esObligatorio ? '' : null;
        }

        $nombreArchivo = uniqid() . '_brand.' . $extension;

        if (move_uploaded_file($_FILES['logo']['tmp_name'], $destino . $nombreArchivo)) {
            return $baseUrl . $directorio . $nombreArchivo;
        }

        return $esObligatorio ? '' : null;
    }

    private function eliminarArchivo(string $rutaRelativa): void
    {
        if (!$rutaRelativa) {
            return;
        }

        $relativa = App::imageRelativePath($rutaRelativa);
        if ($relativa === null) {
            return;
        }
        $ruta = __DIR__ . '/../' . $relativa;
        if (file_exists($ruta)) {
            @unlink($ruta);
        }
    }
}
