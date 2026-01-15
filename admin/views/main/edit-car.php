<?php
$auto = $auto ?? [];
$imagenes = $imagenes ?? [];
$marcas = $marcas ?? [];
$mensaje = $mensaje ?? '';
$tipo_mensaje = $tipo_mensaje ?? 'info';
$alertStyles = [
    'success' => 'border-emerald-200 bg-emerald-50 text-emerald-900',
    'danger' => 'border-rose-200 bg-rose-50 text-rose-900',
    'warning' => 'border-amber-200 bg-amber-50 text-amber-900',
    'info' => 'border-sky-200 bg-sky-50 text-sky-900',
];
$alertClass = $alertStyles[$tipo_mensaje] ?? $alertStyles['info'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Editar auto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Edicion de autos">
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .fade-up {
            animation: fadeUp 0.6s ease both;
        }
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(16px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="min-h-screen bg-slate-50 text-slate-900" style="font-family: 'Space Grotesk', sans-serif;">
    <div class="min-h-screen bg-[radial-gradient(1200px_circle_at_top,_rgba(56,189,248,0.12),_transparent)]">
        <div class="lg:flex">
            <?php require_once 'views/layouts/sidebar.php'; ?>
            <div class="flex-1">
                <?php require_once 'views/layouts/topbar.php'; ?>

                <main class="mx-auto w-full max-w-6xl px-4 pb-12 pt-6 lg:px-8">
                    <div class="fade-up">
                        <h1 class="text-2xl font-semibold tracking-tight">Editar auto</h1>
                        <p class="mt-2 text-sm text-slate-600">Actualiza la informacion del vehiculo.</p>
                    </div>

                    <?php if (!empty($mensaje)): ?>
                        <div class="mt-6 rounded-xl border px-4 py-3 text-sm <?= $alertClass ?>">
                            <?= htmlspecialchars((string) $mensaje) ?>
                        </div>
                    <?php endif; ?>

                    <div class="mt-6 rounded-2xl border border-slate-200/80 bg-white/80 p-6 shadow-sm">
                        <form method="POST" action="index.php?route=autos/<?= $auto['id_auto'] ?>/update" enctype="multipart/form-data" class="space-y-8">
                            <div class="grid gap-4 md:grid-cols-2">
                                <div>
                                    <label for="id_marca" class="text-xs font-semibold uppercase tracking-widest text-slate-500">Marca</label>
                                    <select id="id_marca" name="id_marca" class="mt-2 w-full rounded-xl border border-slate-200 bg-white/70 px-4 py-3 text-sm shadow-sm outline-none transition focus:border-sky-400 focus:ring-4 focus:ring-sky-100" required>
                                        <option value="" disabled>Selecciona una marca</option>
                                        <?php foreach ($marcas as $row): ?>
                                            <option value="<?= $row['id_marca'] ?>" <?= $row['id_marca'] == ($auto['id_marca'] ?? '') ? 'selected' : '' ?>><?= $row['nombre'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div>
                                    <label for="modelo" class="text-xs font-semibold uppercase tracking-widest text-slate-500">Submarca</label>
                                    <input type="text" id="modelo" name="modelo" class="mt-2 w-full rounded-xl border border-slate-200 bg-white/70 px-4 py-3 text-sm shadow-sm outline-none transition focus:border-sky-400 focus:ring-4 focus:ring-sky-100" value="<?= htmlspecialchars($auto['modelo'] ?? '') ?>" required>
                                </div>
                            </div>

                            <div class="grid gap-4 md:grid-cols-2">
                                <div>
                                                                        <label for="tipo" class="text-xs font-semibold uppercase tracking-widest text-slate-500">Tipo de vehículo</label>
                                    <select id="tipo" name="tipo" class="mt-2 w-full rounded-xl border border-slate-200 bg-white/70 px-4 py-3 text-sm shadow-sm outline-none transition focus:border-sky-400 focus:ring-4 focus:ring-sky-100">
                                        <?php
                                        $tipoActual = $auto['tipo'] ?? '';
                                        $tipos = ['Sedán', 'SUV', 'Hatchback', 'Coupé', 'Convertible', 'Camioneta', 'Minivan'];
                                        ?>
                                        <option value="" <?= $tipoActual === '' ? 'selected' : '' ?>>Selecciona un tipo</option>
                                        <?php if ($tipoActual !== '' && !in_array($tipoActual, $tipos, true)): ?>
                                            <option value="<?= htmlspecialchars($tipoActual) ?>" selected><?= htmlspecialchars($tipoActual) ?></option>
                                        <?php endif; ?>
                                        <?php foreach ($tipos as $tipo): ?>
                                            <option value="<?= $tipo ?>" <?= $tipoActual === $tipo ? 'selected' : '' ?>><?= $tipo ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div>
                                    <label for="year" class="text-xs font-semibold uppercase tracking-widest text-slate-500">Modelo</label>
                                    <?php
                                    $currentYear = (int) date('Y');
                                    $minYear = 1990;
                                    $selectedYear = (string) ($auto['year'] ?? '');
                                    ?>
                                    <select id="year" name="year" class="mt-2 w-full rounded-xl border border-slate-200 bg-white/70 px-4 py-3 text-sm shadow-sm outline-none transition focus:border-sky-400 focus:ring-4 focus:ring-sky-100" required>
                                        <option value="" disabled <?= $selectedYear === '' ? 'selected' : '' ?>>Selecciona</option>
                                        <?php if ($selectedYear !== '' && ((int) $selectedYear > $currentYear || (int) $selectedYear < $minYear)): ?>
                                            <option value="<?= htmlspecialchars($selectedYear) ?>" selected><?= htmlspecialchars($selectedYear) ?></option>
                                        <?php endif; ?>
                                        <?php for ($year = $currentYear; $year >= $minYear; $year--): ?>
                                            <option value="<?= $year ?>" <?= $selectedYear === (string) $year ? 'selected' : '' ?>><?= $year ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="grid gap-4 md:grid-cols-2">
                                <div>
                                                                        <label for="combustible" class="text-xs font-semibold uppercase tracking-widest text-slate-500">Combustible</label>
                                    <?php
                                    $combustibleActual = $auto['combustible'] ?? '';
                                    $combustibles = ['Gasolina', 'Diésel', 'Híbrido', 'Eléctrico', 'GLP'];
                                    ?>
                                    <select id="combustible" name="combustible" class="mt-2 w-full rounded-xl border border-slate-200 bg-white/70 px-4 py-3 text-sm shadow-sm outline-none transition focus:border-sky-400 focus:ring-4 focus:ring-sky-100">
                                        <option value="" <?= $combustibleActual === '' ? 'selected' : '' ?>>Selecciona un combustible</option>
                                        <?php if ($combustibleActual !== '' && !in_array($combustibleActual, $combustibles, true)): ?>
                                            <option value="<?= htmlspecialchars($combustibleActual) ?>" selected><?= htmlspecialchars($combustibleActual) ?></option>
                                        <?php endif; ?>
                                        <?php foreach ($combustibles as $combustible): ?>
                                            <option value="<?= $combustible ?>" <?= $combustibleActual === $combustible ? 'selected' : '' ?>><?= $combustible ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div>
                                    <label for="Transmisión" class="text-xs font-semibold uppercase tracking-widest text-slate-500">Transmisión</label>
                                    <?php
                                    $TransmisiónActual = $auto['Transmisión'] ?? '';
                                    $Transmisiónes = ['Automática', 'Manual', 'CVT'];
                                    ?>
                                    <select id="Transmisión" name="Transmisión" class="mt-2 w-full rounded-xl border border-slate-200 bg-white/70 px-4 py-3 text-sm shadow-sm outline-none transition focus:border-sky-400 focus:ring-4 focus:ring-sky-100">
                                        <option value="" <?= $TransmisiónActual === '' ? 'selected' : '' ?>>Selecciona una Transmisión</option>
                                        <?php if ($TransmisiónActual !== '' && !in_array($TransmisiónActual, $Transmisiónes, true)): ?>
                                            <option value="<?= htmlspecialchars($TransmisiónActual) ?>" selected><?= htmlspecialchars($TransmisiónActual) ?></option>
                                        <?php endif; ?>
                                        <?php foreach ($Transmisiónes as $Transmisión): ?>
                                            <option value="<?= $Transmisión ?>" <?= $TransmisiónActual === $Transmisión ? 'selected' : '' ?>><?= $Transmisión ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="grid gap-4 md:grid-cols-2">
                                <div>
                                    <label for="kilometraje" class="text-xs font-semibold uppercase tracking-widest text-slate-500">Kilometraje</label>
                                    <input type="number" id="kilometraje" name="kilometraje" min="0" class="mt-2 w-full rounded-xl border border-slate-200 bg-white/70 px-4 py-3 text-sm shadow-sm outline-none transition focus:border-sky-400 focus:ring-4 focus:ring-sky-100" value="<?= htmlspecialchars($auto['kilometraje'] ?? '') ?>" placeholder="Ej: 50000">
                                </div>
                                <div>
                                    <label for="precio" class="text-xs font-semibold uppercase tracking-widest text-slate-500">Precio</label>
                                    <div class="mt-2 flex rounded-xl border border-slate-200 bg-white/70 shadow-sm focus-within:border-sky-400 focus-within:ring-4 focus-within:ring-sky-100">
                                        <span class="flex items-center px-3 text-sm text-slate-500">$</span>
                                        <input type="number" id="precio" name="precio" min="0" step="0.01" class="w-full rounded-xl bg-transparent px-3 py-3 text-sm outline-none" value="<?= htmlspecialchars($auto['precio'] ?? '') ?>" placeholder="0.00" required>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label for="descripcion" class="text-xs font-semibold uppercase tracking-widest text-slate-500">Descripcion</label>
                                <textarea id="descripcion" name="descripcion" rows="4" class="mt-2 w-full rounded-xl border border-slate-200 bg-white/70 px-4 py-3 text-sm shadow-sm outline-none transition focus:border-sky-400 focus:ring-4 focus:ring-sky-100"><?= htmlspecialchars($auto['descripcion'] ?? '') ?></textarea>
                            </div>

                            <div class="grid gap-4 md:grid-cols-2">
                                <label class="flex items-center gap-2 text-sm text-slate-600">
                                    <input type="checkbox" id="ocultar_kilometraje" name="ocultar_kilometraje" value="1" class="h-4 w-4 rounded border-slate-300 text-sky-500 focus:ring-sky-400" <?= !empty($auto['ocultar_kilometraje']) ? 'checked' : '' ?>>
                                    Ocultar kilometraje
                                </label>
                                <label class="flex items-center gap-2 text-sm text-slate-600">
                                    <input type="checkbox" id="consignacion" name="consignacion" value="1" class="h-4 w-4 rounded border-slate-300 text-sky-500 focus:ring-sky-400" <?= !empty($auto['consignacion']) ? 'checked' : '' ?>>
                                    Consignacion
                                </label>
                            </div>

                            <div>
                                <label class="text-xs font-semibold uppercase tracking-widest text-slate-500">Color</label>
                                <input type="hidden" id="color" name="color" value="<?= htmlspecialchars($auto['color'] ?? '') ?>">
                                <div class="mt-3 flex flex-wrap gap-3">
                                    <?php
                                    $colores = [
                                        ['label' => 'Blanco', 'value' => '#FFFFFF'],
                                        ['label' => 'Gris', 'value' => '#808080'],
                                        ['label' => 'Negro', 'value' => '#000000'],
                                        ['label' => 'Rojo', 'value' => '#E31E24'],
                                        ['label' => 'Azul', 'value' => '#0066CC'],
                                    ];
                                    ?>
                                    <?php foreach ($colores as $color): ?>
                                        <label class="relative">
                                            <input type="radio" name="color_option" value="<?= $color['value'] ?>" class="peer sr-only color-radio">
                                            <span class="flex h-10 w-10 items-center justify-center rounded-full border border-slate-200 bg-white shadow-sm transition peer-checked:ring-2 peer-checked:ring-sky-400" style="background-color: <?= $color['value'] ?>;" title="<?= $color['label'] ?>"></span>
                                        </label>
                                    <?php endforeach; ?>
                                    <label class="relative">
                                        <input type="radio" name="color_option" value="custom" class="peer sr-only color-radio">
                                        <span id="custom-color-chip" class="flex h-10 w-10 items-center justify-center rounded-full border border-slate-200 bg-[conic-gradient(at_top,_#ff0000,_#ff8000,_#ffff00,_#80ff00,_#00ff00,_#00ff80,_#00ffff,_#0080ff,_#0000ff,_#8000ff,_#ff00ff,_#ff0080,_#ff0000)] shadow-sm transition peer-checked:ring-2 peer-checked:ring-sky-400">
                                            <input type="color" id="custom-color-input" value="#ffffff" class="absolute inset-0 h-full w-full cursor-pointer opacity-0">
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <div>
                                <h2 class="text-sm font-semibold uppercase tracking-widest text-slate-500">Imagenes actuales</h2>
                                <?php if (!empty($imagenes)): ?>
                                    <div class="mt-4 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                                        <?php foreach ($imagenes as $img): ?>
                                            <div class="rounded-2xl border border-slate-200 bg-white p-3 shadow-sm">
                                                <img src="<?= $img['imagen'] ?>" alt="auto" class="h-40 w-full rounded-xl object-cover">
                                                <div class="mt-3 flex items-center justify-between text-xs text-slate-600">
                                                    <label class="flex items-center gap-2">
                                                        <input type="radio" name="imagen_principal" value="<?= $img['id_imagen'] ?>" class="h-4 w-4 border-slate-300 text-sky-500 focus:ring-sky-400" <?= !empty($img['thumbnail']) ? 'checked' : '' ?>>
                                                        Principal
                                                    </label>
                                                    <label class="flex items-center gap-2 text-rose-600">
                                                        <input type="checkbox" name="eliminar_imagen[]" value="<?= $img['id_imagen'] ?>" class="h-4 w-4 border-rose-300 text-rose-500 focus:ring-rose-400">
                                                        Eliminar
                                                    </label>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php else: ?>
                                    <div class="mt-4 rounded-2xl border border-dashed border-slate-200 bg-white/70 p-6 text-center text-sm text-slate-500">No hay imagenes registradas.</div>
                                <?php endif; ?>
                            </div>

                            <div>
                                <label class="text-xs font-semibold uppercase tracking-widest text-slate-500">Agregar nuevas imagenes</label>
                                <div id="dropZone" class="mt-3 flex flex-col items-center justify-center gap-2 rounded-2xl border-2 border-dashed border-slate-300 bg-white/70 px-6 py-8 text-center transition">
                                    <p class="text-sm font-semibold text-slate-700">Arrastra las imagenes aqui</p>
                                    <p class="text-xs text-slate-500">o selecciona archivos JPG o PNG</p>
                                    <input type="file" id="nuevas_imagenes" name="nuevas_imagenes[]" multiple accept=".jpg,.jpeg,.png" class="hidden">
                                    <button type="button" class="mt-2 rounded-full border border-slate-200 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-slate-700 transition hover:border-slate-300 hover:bg-slate-50" onclick="document.getElementById('nuevas_imagenes').click()">
                                        Seleccionar imagenes
                                    </button>
                                </div>
                                <div id="imagePreviewContainer" class="mt-4"></div>
                            </div>

                            <div class="flex flex-wrap gap-3">
                                <button type="submit" class="rounded-full bg-slate-900 px-5 py-2 text-xs font-semibold uppercase tracking-widest text-white transition hover:bg-slate-800">
                                    Guardar cambios
                                </button>
                                <a href="index.php?route=autos" class="rounded-full border border-slate-200 px-5 py-2 text-xs font-semibold uppercase tracking-widest text-slate-700 transition hover:border-slate-300 hover:bg-slate-50">
                                    Volver
                                </a>
                            </div>
                        </form>
                    </div>

                    <?php require_once 'views/layouts/footer.php'; ?>
                </main>
            </div>
        </div>
    </div>

    <script>
        const customColorInput = document.getElementById('custom-color-input');
        const customColorChip = document.getElementById('custom-color-chip');
        const hiddenColorInput = document.getElementById('color');
        const colorRadios = document.querySelectorAll('.color-radio');
        const initialColor = "<?= htmlspecialchars($auto['color'] ?? '', ENT_QUOTES) ?>";

        function syncColorSelection(colorValue) {
            if (!colorValue) return;
            const normalized = colorValue.toLowerCase();
            const match = Array.from(colorRadios).find((radio) => radio.value.toLowerCase() === normalized);
            if (match) {
                match.checked = true;
                hiddenColorInput.value = match.value;
                customColorChip.style.background = '';
                return;
            }
            const customRadio = document.querySelector('input[name="color_option"][value="custom"]');
            if (customRadio) {
                customRadio.checked = true;
                hiddenColorInput.value = colorValue;
                customColorInput.value = colorValue;
                customColorChip.style.background = colorValue;
            }
        }

        syncColorSelection(initialColor);

        colorRadios.forEach((radio) => {
            radio.addEventListener('change', () => {
                if (radio.value === 'custom') {
                    hiddenColorInput.value = customColorInput.value;
                    customColorChip.style.background = customColorInput.value;
                } else {
                    hiddenColorInput.value = radio.value;
                    customColorChip.style.background = '';
                }
            });
        });

        customColorInput.addEventListener('input', () => {
            hiddenColorInput.value = customColorInput.value;
            document.querySelector('input[name="color_option"][value="custom"]').checked = true;
            customColorChip.style.background = customColorInput.value;
        });

        const dropZone = document.getElementById('dropZone');
        const imageInput = document.getElementById('nuevas_imagenes');
        const imagePreviewContainer = document.getElementById('imagePreviewContainer');
        let uploadedImages = [];
        let primaryImageIndex = -1;

        function setDropZoneState(active) {
            if (active) {
                dropZone.classList.add('border-sky-400', 'bg-sky-50', 'ring-2', 'ring-sky-200');
            } else {
                dropZone.classList.remove('border-sky-400', 'bg-sky-50', 'ring-2', 'ring-sky-200');
            }
        }

        dropZone.addEventListener('dragover', (event) => {
            event.preventDefault();
            setDropZoneState(true);
        });

        dropZone.addEventListener('dragleave', () => {
            setDropZoneState(false);
        });

        dropZone.addEventListener('drop', (event) => {
            event.preventDefault();
            setDropZoneState(false);
            handleFiles(event.dataTransfer.files);
        });

        imageInput.addEventListener('change', (event) => {
            if (event.target.files.length > 0) {
                handleFiles(event.target.files);
            }
        });

        function handleFiles(files) {
            const allowedFormats = ['image/jpeg', 'image/png'];
            Array.from(files).forEach((file) => {
                if (!allowedFormats.includes(file.type)) {
                    alert(`Formato no permitido: ${file.name}. Usa JPG o PNG.`);
                    return;
                }
                const exists = uploadedImages.some((img) => img.file.name === file.name && img.file.size === file.size);
                if (exists) return;

                const reader = new FileReader();
                reader.onload = (event) => {
                    uploadedImages.push({
                        src: event.target.result,
                        name: file.name,
                        file: file
                    });
                    if (primaryImageIndex === -1) {
                        primaryImageIndex = 0;
                    }
                    renderImages();
                    updateInputFiles();
                };
                reader.readAsDataURL(file);
            });
        }

        function updateInputFiles() {
            const dataTransfer = new DataTransfer();
            if (uploadedImages.length > 0 && primaryImageIndex >= 0) {
                dataTransfer.items.add(uploadedImages[primaryImageIndex].file);
            }
            uploadedImages.forEach((imageObj, index) => {
                if (index !== primaryImageIndex) {
                    dataTransfer.items.add(imageObj.file);
                }
            });
            imageInput.files = dataTransfer.files;
        }

        function renderImages() {
            imagePreviewContainer.innerHTML = '';

            if (uploadedImages.length === 0) {
                imagePreviewContainer.innerHTML = '<div class="rounded-2xl border border-dashed border-slate-200 bg-white/70 p-6 text-center text-sm text-slate-500">No hay imagenes nuevas cargadas.</div>';
                return;
            }

            const previewRow = document.createElement('div');
            previewRow.className = 'grid gap-4 sm:grid-cols-2 lg:grid-cols-3';

            uploadedImages.forEach((image, index) => {
                const wrapper = document.createElement('div');
                wrapper.className = 'group relative overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm';
                if (index === primaryImageIndex) {
                    wrapper.classList.add('ring-2', 'ring-sky-400');
                }

                const img = document.createElement('img');
                img.src = image.src;
                img.alt = image.name;
                img.className = 'h-40 w-full object-cover';

                if (index === primaryImageIndex) {
                    const badge = document.createElement('div');
                    badge.className = 'absolute right-3 top-3 rounded-full bg-slate-900 px-2 py-1 text-[10px] font-semibold uppercase tracking-widest text-white';
                    badge.textContent = 'Principal';
                    wrapper.appendChild(badge);
                }

                const overlay = document.createElement('div');
                overlay.className = 'absolute inset-0 flex items-center justify-center gap-2 bg-slate-900/60 opacity-0 transition group-hover:opacity-100';

                const primaryBtn = document.createElement('button');
                primaryBtn.type = 'button';
                primaryBtn.className = 'rounded-full bg-white/90 px-3 py-1 text-xs font-semibold uppercase tracking-widest text-slate-800 shadow';
                primaryBtn.textContent = 'Principal';
                primaryBtn.onclick = () => setPrimaryImage(index);

                const deleteBtn = document.createElement('button');
                deleteBtn.type = 'button';
                deleteBtn.className = 'rounded-full bg-rose-500/90 px-3 py-1 text-xs font-semibold uppercase tracking-widest text-white shadow';
                deleteBtn.textContent = 'Eliminar';
                deleteBtn.onclick = () => deleteImage(index);

                overlay.appendChild(primaryBtn);
                overlay.appendChild(deleteBtn);

                const meta = document.createElement('div');
                meta.className = 'flex items-center justify-between gap-2 border-t border-slate-100 px-4 py-2 text-xs text-slate-600';
                meta.innerHTML = `<span class="truncate" title="${image.name}">${image.name}</span><span>${formatFileSize(image.file.size)}</span>`;

                wrapper.appendChild(img);
                wrapper.appendChild(overlay);
                wrapper.appendChild(meta);
                previewRow.appendChild(wrapper);
            });

            imagePreviewContainer.appendChild(previewRow);
        }

        function setPrimaryImage(index) {
            primaryImageIndex = index;
            renderImages();
            updateInputFiles();
        }

        function deleteImage(index) {
            uploadedImages.splice(index, 1);
            if (primaryImageIndex === index) {
                primaryImageIndex = uploadedImages.length > 0 ? 0 : -1;
            } else if (primaryImageIndex > index) {
                primaryImageIndex--;
            }
            renderImages();
            updateInputFiles();
        }

        function formatFileSize(bytes) {
            if (!bytes) return '0 KB';
            const units = ['B', 'KB', 'MB', 'GB'];
            let size = bytes;
            let unitIndex = 0;
            while (size >= 1024 && unitIndex < units.length - 1) {
                size /= 1024;
                unitIndex++;
            }
            return `${size.toFixed(unitIndex === 0 ? 0 : 1)} ${units[unitIndex]}`;
        }

        document.querySelector('form').addEventListener('reset', () => {
            hiddenColorInput.value = initialColor;
            customColorInput.value = '#ffffff';
            customColorChip.style.background = '';
            colorRadios.forEach((radio) => {
                radio.checked = false;
            });
            syncColorSelection(initialColor);
            uploadedImages = [];
            primaryImageIndex = -1;
            imageInput.value = '';
            renderImages();
        });

        renderImages();
    </script>
</body>

</html>



