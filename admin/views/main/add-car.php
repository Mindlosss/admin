<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Agregar auto</title>
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
    $mensaje = $mensaje ?? '';
    $tipo_mensaje = $tipo_mensaje ?? 'info';
    $marcas = $marcas ?? [];
    ?>
    <!-- Begin page -->
    <div class="wrapper">

        <!-- sidebar -->
        <?php require_once 'views/layouts/sidebar.php'; ?>

        <!-- topbar -->
        <?php require_once 'views/layouts/topbar.php'; ?>

        <!-- Search Modal -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content bg-transparent">
                    <form>
                        <div class="card mb-1">
                            <div class="px-3 py-2 d-flex flex-row align-items-center" id="top-search">
                                <i class="ri-search-line fs-22"></i>
                                <input type="search" class="form-control border-0" id="search-modal-input"
                                    placeholder="Search for actions, people,">
                                <button type="submit" class="btn p-0" data-bs-dismiss="modal" aria-label="Close">[esc]</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

                        

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="page-content">

            
            <div class="page-title-head d-flex align-items-center gap-2">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-bold mb-0">Agregar auto</h4>
                </div>

                <!-- <div class="text-end">
                    <ol class="breadcrumb m-0 py-0 fs-13">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Abstack</a></li>
                        
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                        
                        <li class="breadcrumb-item active">Agregar auto</li>
                    </ol>
                </div> -->
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
                                <form method="POST" action="index.php?route=autos" enctype="multipart/form-data">
                                    
                                    <!-- Marca y Submarca -->
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="id_marca" class="form-label">Marca <span class="text-danger">*</span></label>
                                                <select class="form-select" id="id_marca" name="id_marca" required>
                                                    <option selected disabled value="">Selecciona una marca</option>
                                                    
                                                    <?php foreach ($marcas as $row): ?>
                                                        <option value="<?= $row['id_marca'] ?>"><?= $row['nombre'] ?></option>
                                                    <?php endforeach; ?>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="modelo" class="form-label">Submarca <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Ej: Corolla, Civic, Mustang" required>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tipo y Modelo -->
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="tipo" class="form-label">Tipo de vehículo</label>
                                                <select class="form-select" id="tipo" name="tipo">
                                                    <option selected value="">Selecciona un tipo</option>
                                                    <option value="Sedán">Sedán</option>
                                                    <option value="SUV">SUV</option>
                                                    <option value="Hatchback">Hatchback</option>
                                                    <option value="Coupé">Coupé</option>
                                                    <option value="Convertible">Convertible</option>
                                                    <option value="Camioneta">Camioneta</option>
                                                    <option value="Minivan">Minivan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="year" class="form-label">Modelo <span class="text-danger">*</span></label>
                                                <?php $currentYear = (int) date('Y'); ?>
                                                <select class="form-select" id="year" name="year" required>
                                                    <option value="" disabled selected>Selecciona</option>
                                                    <?php for ($year = $currentYear; $year >= 1990; $year--): ?>
                                                        <option value="<?= $year ?>"><?= $year ?></option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Color y Transmisión -->
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label d-block">Color</label>
                                                <div class="d-flex gap-2 flex-wrap">
                                                    <input type="hidden" id="color" name="color" value="">
                                                    
                                                    <!-- Blanco -->
                                                    <label class="color-option" title="Blanco">
                                                        <input type="radio" name="color_option" value="#FFFFFF" class="color-radio">
                                                        <span class="color-circle" style="background-color: #FFFFFF; border: 2px solid #333;"></span>
                                                    </label>
                                                    
                                                    <!-- Negro -->
                                                    <label class="color-option" title="Negro">
                                                        <input type="radio" name="color_option" value="#000000" class="color-radio">
                                                        <span class="color-circle" style="background-color: #000000;"></span>
                                                    </label>
                                                    
                                                    <!-- Gris -->
                                                    <label class="color-option" title="Gris">
                                                        <input type="radio" name="color_option" value="#808080" class="color-radio">
                                                        <span class="color-circle" style="background-color: #808080;"></span>
                                                    </label>
                                                    
                                                    <!-- Rojo -->
                                                    <label class="color-option" title="Rojo">
                                                        <input type="radio" name="color_option" value="#E31E24" class="color-radio">
                                                        <span class="color-circle" style="background-color: #E31E24;"></span>
                                                    </label>
                                                    
                                                    <!-- Azul -->
                                                    <label class="color-option" title="Azul">
                                                        <input type="radio" name="color_option" value="#0066CC" class="color-radio">
                                                        <span class="color-circle" style="background-color: #0066CC;"></span>
                                                    </label>
                                                    
                                                    <!-- Plata -->
                                                    <label class="color-option" title="Plata">
                                                        <input type="radio" name="color_option" value="#C0C0C0" class="color-radio">
                                                        <span class="color-circle" style="background-color: #C0C0C0; border: 1px solid #999;"></span>
                                                    </label>
                                                    
                                                    <!-- Marrón -->
                                                    <label class="color-option" title="Marrón">
                                                        <input type="radio" name="color_option" value="#8B4513" class="color-radio">
                                                        <span class="color-circle" style="background-color: #8B4513;"></span>
                                                    </label>
                                                    
                                                    <!-- Verde -->
                                                    <label class="color-option" title="Verde">
                                                        <input type="radio" name="color_option" value="#228B22" class="color-radio">
                                                        <span class="color-circle" style="background-color: #228B22;"></span>
                                                    </label>
                                                    
                                                    <!-- Naranja -->
                                                    <label class="color-option" title="Naranja">
                                                        <input type="radio" name="color_option" value="#FF8C00" class="color-radio">
                                                        <span class="color-circle" style="background-color: #FF8C00;"></span>
                                                    </label>
                                                    
                                                    <!-- Personalizado -->
                                                    <label class="color-option" title="Personalizado">
                                                        <input type="radio" name="color_option" value="Personalizado" class="color-radio">
                                                        <span class="color-circle custom-color-circle">
                                                            <input type="color" id="custom-color-input" value="#ffffff" style="opacity: 0; position: absolute; width: 100%; height: 100%; cursor: pointer; border-radius: 50%;">
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="transmision" class="form-label">Transmisión</label>
                                                <select class="form-select" id="transmision" name="transmision">
                                                    <option selected value="">Selecciona una transmisión</option>
                                                    <option value="Automática">Automática</option>
                                                    <option value="Manual">Manual</option>
                                                    <option value="CVT">CVT</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Combustible y Kilometraje -->
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="combustible" class="form-label">Combustible</label>
                                                <select class="form-select" id="combustible" name="combustible">
                                                    <option selected value="">Selecciona un combustible</option>
                                                    <option value="Gasolina">Gasolina</option>
                                                    <option value="Diésel">Diésel</option>
                                                    <option value="Híbrido">Híbrido</option>
                                                    <option value="Eléctrico">Eléctrico</option>
                                                    <option value="GLP">GLP</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="kilometraje" class="form-label">Kilometraje</label>
                                                <input type="number" class="form-control" id="kilometraje" name="kilometraje" min="0" placeholder="Ej: 50000">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Precio -->
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="precio" class="form-label">Precio <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text">$</span>
                                                    <input type="number" class="form-control" id="precio" name="precio" min="0" step="0.01" placeholder="0.00" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Imágenes del Vehículo -->
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label d-block">Imágenes del Vehículo <span class="text-danger">*</span></label>
                                                <div class="border border-2 border-dashed rounded-3 p-2 text-center" id="dropZone">
                                                    <i class="ri-image-add-line fs-40 text-muted d-block mb-2"></i>
                                                    <h5 class="mb-2">Arrastra imágenes aquí</h5>
                                                    <p class="text-muted mb-3">o haz clic para seleccionar archivos</p>
                                                    
                                                    <input type="file" id="imagenes" name="imagenes[]" multiple accept=".jpg,.jpeg,.png" class="d-none" required />
                                                    
                                                    <button type="button" class="btn btn-sm btn-primary" onclick="document.getElementById('imagenes').click()">
                                                        <i class="ri-upload-cloud-2-line me-1"></i>Seleccionar Imágenes
                                                    </button>
                                                    <p class="text-muted fs-13 mt-3 mb-0">Formatos permitidos: JPG, PNG</p>
                                                </div>
                                                <!-- Vista previa de imágenes -->
                                                <div id="imagePreviewContainer" class="mt-3"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Botones -->
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex gap-2">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="ri-add-line me-1"></i>Agregar Coche
                                                </button>
                                                <button type="reset" class="btn btn-secondary">
                                                    <i class="ri-refresh-line me-1"></i>Limpiar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            <!-- Footer -->
            <?php require_once 'views/layouts/footer.php'; ?>


        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Theme Settings -->
    <?php require_once 'views/layouts/theme.php'; ?>
    
    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>


    <style>
        .color-option {
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .color-option input[type="radio"] {
            display: none;
        }

        .color-circle {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            border: 3px solid transparent;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .color-option input[type="radio"]:checked + .color-circle,
        .color-option input[type="radio"]:checked + .custom-color-circle {
            border-color: #3c86d8;
            box-shadow: 0 0 0 2px #fff, 0 0 0 4px #3c86d8;
            transform: scale(1.1);
        }

        .color-option:hover .color-circle,
        .color-option:hover .custom-color-circle {
            transform: scale(1.05);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }

        .custom-color-circle {
            background: linear-gradient(45deg, #ff0000, #ff8000, #ffff00, #80ff00, #00ff00, #00ff80, #00ffff, #0080ff, #0000ff, #8000ff, #ff00ff, #ff0080);
            /* background: conic-gradient(red, yellow, lime, aqua, blue, magenta, red); */
            position: relative;
            overflow: hidden;
        }
        #dropZone {
            cursor: pointer;
            background-color: var(--bs-gray-100);
            transition: all 0.3s ease;
        }

        [data-bs-theme="dark"] #dropZone {
            background-color: var(--bs-gray-800);
        }

        #dropZone:hover,
        #dropZone.dragover {
            background-color: rgba(60, 134, 216, 0.1);
            border-color: #3c86d8 !important;
        }

        .image-preview-row {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .image-preview-wrapper {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            background-color: var(--bs-gray-100);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        [data-bs-theme="dark"] .image-preview-wrapper {
            background-color: var(--bs-gray-800);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        }

        .image-preview-wrapper:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        [data-bs-theme="dark"] .image-preview-wrapper:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
        }

        .image-preview-wrapper img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            display: block;
        }

        .image-preview-meta {
            display: flex;
            justify-content: space-between;
            gap: 8px;
            padding: 6px 8px;
            background-color: rgba(0, 0, 0, 0.03);
            font-size: 12px;
            color: var(--bs-gray-700);
        }

        [data-bs-theme="dark"] .image-preview-meta {
            background-color: rgba(255, 255, 255, 0.06);
            color: var(--bs-gray-300);
        }

        .image-preview-name {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .image-preview-size {
            flex-shrink: 0;
            opacity: 0.8;
        }

        .image-preview-wrapper.primary img {
            border: 3px solid #3c86d8;
        }

        .image-preview-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .image-preview-wrapper:hover .image-preview-overlay {
            opacity: 1;
        }

        .image-overlay-btn {
            padding: 6px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
            transition: all 0.3s ease;
            color: white;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .btn-set-primary {
            background-color: #3c86d8;
        }

        .btn-set-primary:hover {
            background-color: #2e6ab1;
        }

        .btn-delete {
            background-color: #e31e24;
        }

        .btn-delete:hover {
            background-color: #c91a1f;
        }

        .image-badge-primary {
            position: absolute;
            top: 8px;
            right: 8px;
            background-color: #3c86d8;
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 11px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            gap: 4px;
        }

        [data-bs-theme="dark"] .image-badge-primary {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
        }

        .empty-state {
            text-align: center;
            padding: 2rem;
            color: var(--bs-text-muted);
        }

        .empty-state i {
            font-size: 2rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }
    </style>

    <script>

        const customColorInput = document.getElementById('custom-color-input');
        const customCircle = document.querySelector('.custom-color-circle');
        const hiddenColorInput = document.getElementById('color');
        const colorRadios = document.querySelectorAll('.color-radio');

        // logica de los circulos
        colorRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.value === 'Personalizado') {
                    // Si selecciona  manualmente, asignamos el valor actual del input color
                    hiddenColorInput.value = customColorInput.value;
                    // Pintamos el circulo con el color que tenga el input
                    customCircle.style.background = customColorInput.value;
                } else {
                    // Si es un color predefinido
                    hiddenColorInput.value = this.value;
                    // reiniciamos el circulo arcoiris
                    customCircle.style.background = ''; 
                }
            });
        });

        //color picker
        customColorInput.addEventListener('input', function() {
            // Actualizamos el input oculto que se envia al servidor
            hiddenColorInput.value = this.value;
                
            //Forzamos la selección del radio button "Personalizado"
            document.querySelector('input[name="color_option"][value="Personalizado"]').checked = true;

            // cambiamos el background del circulo con el color que seleccionamos
            customCircle.style.background = this.value;
        });


        // Logica para las imagenes, drag and drop y preview

        const dropZone = document.getElementById('dropZone');
        const imageInput = document.getElementById('imagenes');
        const imagePreviewContainer = document.getElementById('imagePreviewContainer');
        
        // Variables de estado
        let uploadedImages = [];
        let primaryImageIndex = -1;

        // Eventos Drag and drop visuales
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

        // seleccion manual usando el boton
        imageInput.addEventListener('change', (e) => {
            // Nota: Al seleccionar manual, input.files ya tiene los archivos,
            // pero necesitamos procesarlos para añadirlos a nuestro array y permitir añadir más después.
            if (e.target.files.length > 0) {
                handleFiles(e.target.files);
            }
        });

        // Procesar archivos seleccionados
        function handleFiles(files) {
            const allowedFormats = ['image/jpeg', 'image/png', 'image/webp'];

            Array.from(files).forEach((file) => {
                if (allowedFormats.includes(file.type)) {
                    
                    // Evitar duplicados por nombre y tamaño
                    const exists = uploadedImages.some(img => img.file.name === file.name && img.file.size === file.size);
                    
                    if (!exists) {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            uploadedImages.push({
                                src: e.target.result,
                                name: file.name,
                                file: file // Guardamos el objeto File original
                            });

                            // Si es la primera imagen y no hay principal, se asigna
                            if (primaryImageIndex === -1) {
                                primaryImageIndex = 0;
                            }
                            
                            renderImages();
                            updateInputFiles(); //  Actualizar el input real
                        };
                        reader.readAsDataURL(file);
                    }
                } else {
                    alert(`Formato no permitido: ${file.name}. Usa JPG o PNG.`);
                }
            });
        }

        // Sincronizar Array JS con Input HTML
        function updateInputFiles() {
            const dataTransfer = new DataTransfer();
            
            // Agregar primero la imagen principal para que el backend la tome como thumbnail
            if (uploadedImages.length > 0 && primaryImageIndex >= 0 && primaryImageIndex < uploadedImages.length) {
                dataTransfer.items.add(uploadedImages[primaryImageIndex].file);
            }

            uploadedImages.forEach((imageObj, index) => {
                if (index !== primaryImageIndex) {
                    dataTransfer.items.add(imageObj.file);
                }
            });

            // Asignar los archivos al input real
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

        // Renderizar la vista previa de las imágenes
        function renderImages() {
            imagePreviewContainer.innerHTML = '';

            if (uploadedImages.length === 0) {
                imagePreviewContainer.innerHTML = `
                    <div class="empty-state">
                        <i class="ri-gallery-line"></i>
                        <p>No hay imágenes cargadas</p>
                    </div>`;
                return;
            }

            const previewRow = document.createElement('div');
            previewRow.className = 'image-preview-row';

            uploadedImages.forEach((image, index) => {
                const wrapper = document.createElement('div');
                // Agregar la clase primary si es la principal
                wrapper.className = `image-preview-wrapper ${index === primaryImageIndex ? 'primary' : ''}`;

                const img = document.createElement('img');
                img.src = image.src;
                img.alt = image.name;

                // Badge visual de de princial
                if (index === primaryImageIndex) {
                    const badge = document.createElement('div');
                    badge.className = 'image-badge-primary';
                    badge.innerHTML = '<i class="ri-star-fill"></i>Principal';
                    wrapper.appendChild(badge);
                }

                // Overlay con botones
                const overlay = document.createElement('div');
                overlay.className = 'image-preview-overlay';

                const primaryBtn = document.createElement('button');
                primaryBtn.type = 'button';
                primaryBtn.className = 'image-overlay-btn btn-set-primary';
                primaryBtn.innerHTML = '<i class="ri-star-line"></i>Principal';
                primaryBtn.onclick = () => setPrimaryImage(index);

                const deleteBtn = document.createElement('button');
                deleteBtn.type = 'button';
                deleteBtn.className = 'image-overlay-btn btn-delete';
                deleteBtn.innerHTML = '<i class="ri-delete-bin-line"></i>Eliminar';
                deleteBtn.onclick = () => deleteImage(index);

                overlay.appendChild(primaryBtn);
                overlay.appendChild(deleteBtn);

                wrapper.appendChild(img);
                wrapper.appendChild(overlay);
                const meta = document.createElement('div');
                meta.className = 'image-preview-meta';
                meta.innerHTML = `<span class="image-preview-name" title="${image.name}">${image.name}</span><span class="image-preview-size">${formatFileSize(image.file.size)}</span>`;
                wrapper.appendChild(meta);
                previewRow.appendChild(wrapper);
            });

            imagePreviewContainer.appendChild(previewRow);
        }

        // Establecer imagen principal
        function setPrimaryImage(index) {
            primaryImageIndex = index;
            renderImages();
            updateInputFiles();
        }

        // Eliminar imagen
        function deleteImage(index) {
            uploadedImages.splice(index, 1);
            
            // re asignar índice de principal si se borró la imagen marcada como principal
            if (primaryImageIndex === index) {
                primaryImageIndex = uploadedImages.length > 0 ? 0 : -1;
            } else if (primaryImageIndex > index) {
                primaryImageIndex--;
            }
            
            renderImages();
            updateInputFiles(); // Actualizar el input real al borrar
        }


        // RESETEO DEL FORMULARIO

        document.querySelector('form').addEventListener('reset', function() {
            //limpiar campos de color
            hiddenColorInput.value = '';
            customColorInput.value = '#ffffff'; //picker default
                
            // picker default
            customCircle.style.background = ''; 
            
            //Desmarcar radios
            colorRadios.forEach(radio => {
                radio.checked = false;
            });

            // clear images
            uploadedImages = [];
            primaryImageIndex = -1;
            imageInput.value = ''; // Limpiar input file del DOM
            renderImages();
        });
        
    </script>

</body>

</html>
