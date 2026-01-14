<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Config\App;
use App\Core\View;
use App\Models\Auto;
use App\Models\Marca;
use function App\Core\flash;
use function App\Core\redirect;

class AutoController
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
        $stmt = $this->autos->obtenerTodos();
        $autos = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        // Normaliza el string de imA­genes concatenadas a un arreglo ordenado
        $autos = array_map(static function ($auto) {
            $imagenes = [];
            if (!empty($auto['imagenes'])) {
                $imagenes = array_values(array_filter(explode(',', (string) $auto['imagenes'])));
            }
            $auto['imagenes'] = $imagenes;
            return $auto;
        }, $autos);

        View::render('main/autos-index', [
            'autos' => $autos,
            'mensaje' => flash('mensaje'),
            'tipo_mensaje' => flash('tipo_mensaje'),
        ]);
    }

    public function create(): void
    {
        $stmt = $this->marcas->obtenerTodas();
        $marcas = $stmt ? $stmt->fetchAll(\PDO::FETCH_ASSOC) : [];

        View::render('main/add-car', [
            'marcas' => $marcas,
            'mensaje' => flash('mensaje'),
            'tipo_mensaje' => flash('tipo_mensaje'),
        ]);
    }

    public function store(): void
    {
        $idUsuario = $_SESSION['usuario_id'] ?? 1;

        $datos = [
            'id_marca' => $_POST['id_marca'] ?? null,
            'modelo' => $_POST['modelo'] ?? '',
            'tipo' => $_POST['tipo'] ?? '',
            'year' => $_POST['year'] ?? '',
            'color' => $_POST['color'] ?? '',
            'transmision' => $_POST['transmision'] ?? '',
            'combustible' => $_POST['combustible'] ?? '',
            'kilometraje' => $_POST['kilometraje'] ?? '',
            'precio' => $_POST['precio'] ?? '',
            'descripcion' => $_POST['descripcion'] ?? '',
            'ocultar_kilometraje' => isset($_POST['ocultar_kilometraje']) ? 1 : 0,
            'consignacion' => isset($_POST['consignacion']) ? 1 : 0,
        ];

        $rutasImagenes = $this->procesarImagenes('imagenes');

        if (empty($rutasImagenes)) {
            flash('mensaje', 'Debes subir al menos una imagen.');
            flash('tipo_mensaje', 'warning');
            redirect('autos/create');
        }

        if ($this->autos->crear($datos, $rutasImagenes, $idUsuario)) {
            flash('mensaje', 'Coche agregado al inventario.');
            flash('tipo_mensaje', 'success');
        } else {
            flash('mensaje', 'Error en base de datos.');
            flash('tipo_mensaje', 'danger');
        }

        redirect('autos/create');
    }

    public function edit(string $id): void
    {
        $auto = $this->autos->obtenerPorId((int) $id);
        if (!$auto) {
            flash('mensaje', 'Coche no encontrado.');
            flash('tipo_mensaje', 'warning');
            redirect('autos');
        }
        $imagenes = $this->autos->obtenerImagenesPorAuto((int) $id);
        $marcasStmt = $this->marcas->obtenerTodas();
        $marcas = $marcasStmt ? $marcasStmt->fetchAll(\PDO::FETCH_ASSOC) : [];

        View::render('main/edit-car', [
            'auto' => $auto,
            'imagenes' => $imagenes,
            'marcas' => $marcas,
            'mensaje' => flash('mensaje'),
            'tipo_mensaje' => flash('tipo_mensaje'),
        ]);
    }

    public function update(string $id): void
    {
        $idUsuario = $_SESSION['usuario_id'] ?? 1;
        $datos = [
            'id_marca' => $_POST['id_marca'] ?? null,
            'modelo' => $_POST['modelo'] ?? '',
            'tipo' => $_POST['tipo'] ?? '',
            'year' => $_POST['year'] ?? '',
            'color' => $_POST['color'] ?? '',
            'transmision' => $_POST['transmision'] ?? '',
            'combustible' => $_POST['combustible'] ?? '',
            'kilometraje' => $_POST['kilometraje'] ?? '',
            'precio' => $_POST['precio'] ?? '',
            'descripcion' => $_POST['descripcion'] ?? '',
            'ocultar_kilometraje' => isset($_POST['ocultar_kilometraje']) ? 1 : 0,
            'consignacion' => isset($_POST['consignacion']) ? 1 : 0,
        ];

        $actualizado = $this->autos->actualizar((int) $id, $datos);

        if (!empty($_POST['eliminar_imagen']) && is_array($_POST['eliminar_imagen'])) {
            $idsEliminar = array_map('intval', $_POST['eliminar_imagen']);
            $this->autos->eliminarImagenesPorIds($idsEliminar);
        }

        $rutasImagenes = $this->procesarImagenes('nuevas_imagenes');
        $nuevasIds = [];
        if (!empty($rutasImagenes)) {
            $nuevasIds = $this->autos->agregarImagenes((int) $id, $rutasImagenes, $idUsuario);
        }

        if (isset($_POST['imagen_principal']) && $_POST['imagen_principal']) {
            $this->autos->establecerImagenPrincipal((int) $id, (int) $_POST['imagen_principal']);
        } elseif (!empty($nuevasIds)) {
            $this->autos->establecerImagenPrincipal((int) $id, (int) $nuevasIds[0]);
        } else {
            $this->autos->asegurarImagenPrincipal((int) $id);
        }

        if ($actualizado) {
            flash('mensaje', 'Coche actualizado correctamente.');
            flash('tipo_mensaje', 'success');
        } else {
            flash('mensaje', 'No se pudieron guardar los cambios.');
            flash('tipo_mensaje', 'warning');
        }

        redirect('autos');
    }

    public function destroy(string $id): void
    {
        if ($this->autos->eliminar((int) $id)) {
            flash('mensaje', 'Coche eliminado correctamente.');
            flash('tipo_mensaje', 'success');
        } else {
            flash('mensaje', 'Error al eliminar el coche.');
            flash('tipo_mensaje', 'danger');
        }

        redirect('autos');
    }

    /**
     * Procesa imágenes y devuelve las rutas relativas guardadas.
     *
     * @param string $inputName
     * @return array<int, string>
     */
    private function procesarImagenes(string $inputName): array
    {
        $rutas = [];
        if (!isset($_FILES[$inputName])) {
            return $rutas;
        }

        $directorio = "assets/images/cars/";
        $baseUrl = App::imageBaseUrl();
        $destino = __DIR__ . "/../{$directorio}";
        if (!is_dir($destino)) {
            mkdir($destino, 0777, true);
        }

        $totalFiles = count($_FILES[$inputName]['name']);
        for ($i = 0; $i < $totalFiles; $i++) {
            if ($_FILES[$inputName]['error'][$i] === 0) {
                $extension = pathinfo($_FILES[$inputName]['name'][$i], PATHINFO_EXTENSION);
                $nombreArchivo = uniqid() . "_car_" . $i . "." . $extension;

                if (move_uploaded_file($_FILES[$inputName]['tmp_name'][$i], $destino . $nombreArchivo)) {
                    $rutas[] = $baseUrl . $directorio . $nombreArchivo;
                }
            }
        }

        return $rutas;
    }
}
