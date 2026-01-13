<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Editar auto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Vendor css -->
    <link href="assets/css/vendor.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <!-- Theme Config Js -->
    <script src="assets/js/config.js"></script>
</head>

<body>
    <?php
    $auto = $auto ?? [];
    $imagenes = $imagenes ?? [];
    $marcas = $marcas ?? [];
    $mensaje = $mensaje ?? '';
    $tipo_mensaje = $tipo_mensaje ?? 'info';
    ?>
    <div class="wrapper">

        <?php require_once 'views/layouts/sidebar.php'; ?>
        <?php require_once 'views/layouts/topbar.php'; ?>

        <div class="page-content">

            <div class="page-title-head d-flex align-items-center gap-2">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-bold mb-0">Editar auto</h4>
                </div>
            </div>

            <div class="page-container">

                <?php if($mensaje): ?>
                    <div class="alert alert-<?= $tipo_mensaje ?> alert-dismissible fade show" role="alert">
                        <?= $mensaje ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Datos del vehículo</h5>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="index.php?route=autos/<?= $auto['id_auto'] ?>/update" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="id_marca" class="form-label">Marca <span class="text-danger">*</span></label>
                                                <select class="form-select" id="id_marca" name="id_marca" required>
                                                    <option disabled value="">Selecciona una marca</option>
                                                    <?php foreach ($marcas as $row): ?>
                                                        <option value="<?= $row['id_marca'] ?>" <?= $row['id_marca'] == $auto['id_marca'] ? 'selected' : '' ?>>
                                                            <?= $row['nombre'] ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="modelo" class="form-label">Submarca <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="modelo" name="modelo" value="<?= htmlspecialchars($auto['modelo'] ?? '') ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="tipo" class="form-label">Tipo de vehículo</label>
                                                <select class="form-select" id="tipo" name="tipo">
                                                    <?php
                                                    $tipos = ["", "Sedán", "SUV", "Hatchback", "Coupe", "Convertible", "Camioneta", "Minivan"];
                                                    foreach ($tipos as $tipo) {
                                                        $label = $tipo === "" ? "Selecciona un tipo" : $tipo;
                                                        $selected = ($tipo === ($auto['tipo'] ?? '')) ? 'selected' : '';
                                                        echo '<option value="' . $tipo . '" ' . $selected . '>' . $label . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="year" class="form-label">Modelo <span class="text-danger">*</span></label>
                                                <?php
                                                $currentYear = (int) date('Y');
                                                $minYear = 1990;
                                                $selectedYear = (string) ($auto['year'] ?? '');
                                                ?>
                                                <select class="form-select" id="year" name="year" required>
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
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label d-block">Color</label>
                                                <input type="hidden" id="color" name="color" value="<?= htmlspecialchars($auto['color'] ?? '') ?>">
                                                <div class="d-flex gap-2 flex-wrap">
                                                    <?php 
                                                    $colores = ["#FFFFFF" => "Blanco", "#000000" => "Negro", "#808080" => "Gris", "#E31E24" => "Rojo", "#0066CC" => "Azul", "#C0C0C0" => "Plata", "#8B4513" => "Marrón", "#228B22" => "Verde", "#FF8C00" => "Naranja"];
                                                    foreach ($colores as $hex => $nombre): 
                                                        $checked = (strtolower($auto['color'] ?? '') === strtolower($hex)) ? 'checked' : '';
                                                    ?>
                                                        <label class="color-option" title="<?= $nombre ?>">
                                                            <input type="radio" name="color_option" value="<?= $hex ?>" class="color-radio" <?= $checked ?>>
                                                            <span class="color-circle" style="background-color: <?= $hex ?>;<?= $hex === '#FFFFFF' ? ' border: 2px solid #333;' : '' ?>"></span>
                                                        </label>
                                                    <?php endforeach; ?>

                                                    <label class="color-option" title="Personalizado">
                                                        <input type="radio" name="color_option" value="Personalizado" class="color-radio">
                                                        <span class="color-circle custom-color-circle">
                                                            <input type="color" id="custom-color-input" value="<?= htmlspecialchars($auto['color'] ?? '#ffffff') ?>" style="opacity: 0; position: absolute; width: 100%; height: 100%; cursor: pointer; border-radius: 50%;">
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="transmision" class="form-label">Transmisión</label>
                                                <select class="form-select" id="transmision" name="transmision">
                                                    <?php
                                                    $transmisiones = ["", "Automática", "Manual", "CVT", "Híbrida"];
                                                    foreach ($transmisiones as $t) {
                                                        $label = $t === "" ? "Selecciona una transmisión" : $t;
                                                        $selected = ($t === ($auto['transmision'] ?? '')) ? 'selected' : '';
                                                        echo '<option value="' . $t . '" ' . $selected . '>' . $label . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="combustible" class="form-label">Combustible</label>
                                                <select class="form-select" id="combustible" name="combustible">
                                                    <?php
                                                    $combustibles = ["", "Gasolina", "Diésel", "Híbrido", "Eléctrico", "GLP"];
                                                    foreach ($combustibles as $c) {
                                                        $label = $c === "" ? "Selecciona un combustible" : $c;
                                                        $selected = ($c === ($auto['combustible'] ?? '')) ? 'selected' : '';
                                                        echo '<option value="' . $c . '" ' . $selected . '>' . $label . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="kilometraje" class="form-label">Kilometraje</label>
                                                <input type="number" class="form-control" id="kilometraje" name="kilometraje" min="0" value="<?= htmlspecialchars($auto['kilometraje'] ?? '') ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="precio" class="form-label">Precio <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text">$</span>
                                                    <input type="number" class="form-control" id="precio" name="precio" min="0" step="0.01" value="<?= htmlspecialchars($auto['precio'] ?? '') ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="descripcion" class="form-label">Descripcion</label>
                                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Describe el vehiculo"><?= htmlspecialchars($auto['descripcion'] ?? '') ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3 form-check">
                                                <input type="checkbox" class="form-check-input" id="ocultar_kilometraje" name="ocultar_kilometraje" value="1" <?= !empty($auto['ocultar_kilometraje']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="ocultar_kilometraje">Ocultar kilometraje</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3 form-check">
                                                <input type="checkbox" class="form-check-input" id="consignacion" name="consignacion" value="1" <?= !empty($auto['consignacion']) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="consignacion">Consignacion</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label fw-semibold">Imágenes actuales</label>
                                            <?php if (!empty($imagenes)): ?>
                                                <div class="image-preview-row">
                                                    <?php foreach ($imagenes as $img): ?>
                                                        <div class="image-preview-wrapper <?= $img['thumbnail'] ? 'primary' : '' ?>">
                                                            <img src="<?= htmlspecialchars($img['imagen']) ?>" alt="Imagen del vehículo">
                                                            <?php if ($img['thumbnail']): ?>
                                                                <div class="image-badge-primary">
                                                                    <i class="ri-star-fill"></i>Principal
                                                                </div>
                                                            <?php endif; ?>
                                                            <div class="p-2 d-flex flex-column gap-1">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="imagen_principal" id="img_principal_<?= $img['id_imagen'] ?>" value="<?= $img['id_imagen'] ?>" <?= $img['thumbnail'] ? 'checked' : '' ?>>
                                                                    <label class="form-check-label" for="img_principal_<?= $img['id_imagen'] ?>">Usar como principal</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="eliminar_imagen[]" id="eliminar_img_<?= $img['id_imagen'] ?>" value="<?= $img['id_imagen'] ?>">
                                                                    <label class="form-check-label text-danger" for="eliminar_img_<?= $img['id_imagen'] ?>">Eliminar esta imagen</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php else: ?>
                                                <div class="alert alert-warning mb-3">Este auto no tiene imágenes cargadas.</div>
                                            <?php endif; ?>
                                            <p class="text-muted small mt-2 mb-0">Si no seleccionas una principal y agregas nuevas fotos, se usará la primera nueva como principal.</p>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label d-block">Agregar nuevas imágenes</label>
                                                <div class="border border-2 border-dashed rounded-3 p-1 text-center" id="dropZone">
                                                    <i class="ri-image-add-line fs-32 text-muted d-block mb-1"></i>
                                                    <h6 class="mb-1">Arrastra imágenes aquí</h6>
                                                    <p class="text-muted mb-2 small">o haz clic para seleccionar archivos</p>
                                                    
                                                    <input type="file" id="nuevas_imagenes" name="nuevas_imagenes[]" multiple accept=".jpg,.jpeg,.png" class="d-none" />
                                                    
                                                    <button type="button" class="btn btn-sm btn-primary" onclick="document.getElementById('nuevas_imagenes').click()">
                                                        <i class="ri-upload-cloud-2-line me-1"></i>Seleccionar imágenes
                                                    </button>
                                                    <p class="text-muted fs-13 mt-2 mb-0">Formatos permitidos: JPG, PNG</p>
                                                </div>
                                                <div id="imagePreviewContainer" class="mt-2"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex gap-2">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="ri-save-3-line me-1"></i>Guardar cambios
                                        </button>
                                        <a href="index.php?route=dashboard" class="btn btn-light">
                                            <i class="ri-arrow-go-back-line me-1"></i>Volver al listado
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <?php require_once 'views/layouts/footer.php'; ?>
            </div>
        </div>

    </div>

    <?php require_once 'views/layouts/theme.php'; ?>
    
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.js"></script>

    <style>
        .color-option { cursor: pointer; display: flex; align-items: center; justify-content: center; position: relative; }
        .color-option input[type="radio"] { display: none; }
        .color-circle { width: 35px; height: 35px; border-radius: 50%; border: 3px solid transparent; transition: all 0.3s ease; display: flex; align-items: center; justify-content: center; }
        .color-option input[type="radio"]:checked + .color-circle,
        .color-option input[type="radio"]:checked + .custom-color-circle { border-color: #3c86d8; box-shadow: 0 0 0 2px #fff, 0 0 0 4px #3c86d8; transform: scale(1.1); }
        .color-option:hover .color-circle, .color-option:hover .custom-color-circle { transform: scale(1.05); box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15); }
        .custom-color-circle { background: linear-gradient(45deg, #ff0000, #ff8000, #ffff00, #80ff00, #00ff00, #00ff80, #00ffff, #0080ff, #0000ff, #8000ff, #ff00ff, #ff0080); position: relative; overflow: hidden; }
        #dropZone { cursor: pointer; background-color: var(--bs-gray-100); transition: all 0.3s ease; }
        [data-bs-theme="dark"] #dropZone { background-color: var(--bs-gray-800); }
        #dropZone:hover, #dropZone.dragover { background-color: rgba(60, 134, 216, 0.1); border-color: #3c86d8 !important; }
        .image-preview-row { display: grid; grid-template-columns: repeat(auto-fill, minmax(170px, 1fr)); gap: 1rem; margin-top: 1rem; }
        .image-preview-wrapper { position: relative; border-radius: 8px; overflow: hidden; background-color: var(--bs-gray-100); box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); transition: all 0.3s ease; }
        [data-bs-theme="dark"] .image-preview-wrapper { background-color: var(--bs-gray-800); box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3); }
        .image-preview-wrapper img { width: 100%; height: 150px; object-fit: cover; display: block; }
        .image-preview-meta { display: flex; justify-content: space-between; gap: 8px; padding: 6px 8px; background-color: rgba(0, 0, 0, 0.03); font-size: 12px; color: var(--bs-gray-700); }
        [data-bs-theme="dark"] .image-preview-meta { background-color: rgba(255, 255, 255, 0.06); color: var(--bs-gray-300); }
        .image-preview-name { overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
        .image-preview-size { flex-shrink: 0; opacity: 0.8; }
        .image-preview-wrapper.primary img { border: 3px solid #3c86d8; }
        .image-badge-primary { position: absolute; top: 8px; right: 8px; background-color: #3c86d8; color: white; padding: 4px 8px; border-radius: 4px; font-size: 11px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); display: flex; align-items: center; gap: 4px; }
        [data-bs-theme="dark"] .image-badge-primary { box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5); }
    </style>

    <script>
        const customColorInput = document.getElementById('custom-color-input');
        const customCircle = document.querySelector('.custom-color-circle');
        const hiddenColorInput = document.getElementById('color');
        const colorRadios = document.querySelectorAll('.color-radio');
        const initialColor = hiddenColorInput.value;

        // Marca el color correcto al cargar
        let matched = false;
        colorRadios.forEach(radio => {
            if (radio.value.toLowerCase() === initialColor.toLowerCase()) {
                radio.checked = true;
                matched = true;
            }
        });
        if (!matched && initialColor) {
            document.querySelector('input[name="color_option"][value="Personalizado"]').checked = true;
            customCircle.style.background = initialColor;
            customColorInput.value = initialColor;
        }

        colorRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.value === 'Personalizado') {
                    hiddenColorInput.value = customColorInput.value;
                    customCircle.style.background = customColorInput.value;
                } else {
                    hiddenColorInput.value = this.value;
                    customCircle.style.background = '';
                }
            });
        });

        customColorInput.addEventListener('input', function() {
            hiddenColorInput.value = this.value;
            document.querySelector('input[name="color_option"][value="Personalizado"]').checked = true;
            customCircle.style.background = this.value;
        });

        const dropZone = document.getElementById('dropZone');
        const imageInput = document.getElementById('nuevas_imagenes');
        const imagePreviewContainer = document.getElementById('imagePreviewContainer');
        let uploadedImages = [];

        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.classList.add('dragover');
        });

        dropZone.addEventListener('dragleave', () => {
            dropZone.classList.remove('dragover');
        });

        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('dragover');
            handleFiles(e.dataTransfer.files);
        });

        imageInput.addEventListener('change', (e) => {
            if (e.target.files.length > 0) {
                handleFiles(e.target.files);
            }
        });

        function handleFiles(files) {
            const allowedFormats = ['image/jpeg', 'image/png', 'image/webp'];

            Array.from(files).forEach((file) => {
                if (allowedFormats.includes(file.type)) {
                    const exists = uploadedImages.some(img => img.file.name === file.name && img.file.size === file.size);
                    if (!exists) {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            uploadedImages.push({ src: e.target.result, name: file.name, file });
                            renderImages();
                            updateInputFiles();
                        };
                        reader.readAsDataURL(file);
                    }
                } else {
                    alert(`Formato no permitido: ${file.name}. Usa JPG o PNG.`);
                }
            });
        }

        function updateInputFiles() {
            const dataTransfer = new DataTransfer();
            uploadedImages.forEach(imageObj => dataTransfer.items.add(imageObj.file));
            imageInput.files = dataTransfer.files;
        }

        function formatFileSize(bytes) {
            if (!bytes) {
                return '0 KB';
            }
            const units = ['B', 'KB', 'MB', 'GB'];
            let size = bytes;
            let unitIndex = 0;
            while (size >= 1024 && unitIndex < units.length - 1) {
                size /= 1024;
                unitIndex++;
            }
            return `${size.toFixed(unitIndex === 0 ? 0 : 1)} ${units[unitIndex]}`;
        }

        function renderImages() {
            imagePreviewContainer.innerHTML = '';

            if (uploadedImages.length === 0) {
                imagePreviewContainer.innerHTML = `
                    <div class="text-center text-muted py-3">
                        <i class="ri-gallery-line fs-20 d-block mb-1"></i>
                        <p class="mb-0">Aún no agregas nuevas imágenes</p>
                    </div>`;
                return;
            }

            const previewRow = document.createElement('div');
            previewRow.className = 'image-preview-row';

            uploadedImages.forEach((image, index) => {
                const wrapper = document.createElement('div');
                wrapper.className = 'image-preview-wrapper';

                const img = document.createElement('img');
                img.src = image.src;
                img.alt = image.name;

                const actions = document.createElement('div');
                actions.className = 'p-2 d-flex justify-content-end';

                const deleteBtn = document.createElement('button');
                deleteBtn.type = 'button';
                deleteBtn.className = 'btn btn-sm btn-outline-danger';
                deleteBtn.innerHTML = '<i class="ri-delete-bin-line"></i>';
                deleteBtn.onclick = () => { deleteImage(index); };

                actions.appendChild(deleteBtn);
                wrapper.appendChild(img);
                wrapper.appendChild(actions);
                const meta = document.createElement('div');
                meta.className = 'image-preview-meta';
                meta.innerHTML = `<span class="image-preview-name" title="${image.name}">${image.name}</span><span class="image-preview-size">${formatFileSize(image.file.size)}</span>`;
                wrapper.appendChild(meta);
                previewRow.appendChild(wrapper);
            });

            imagePreviewContainer.appendChild(previewRow);
        }

        function deleteImage(index) {
            uploadedImages.splice(index, 1);
            renderImages();
            updateInputFiles();
        }
    </script>
</body>

</html>

