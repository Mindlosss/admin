<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Editar marca</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Edición de marcas" name="description" />
    <meta content="Coderthemes" name="author" />

    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="assets/css/vendor.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <script src="assets/js/config.js"></script>
</head>

<body>
    <?php
    $mensaje = $mensaje ?? '';
    $tipo_mensaje = $tipo_mensaje ?? 'info';
    $marca = $marca ?? [];
    ?>
    <div class="wrapper">
        <?php require_once 'views/layouts/sidebar.php'; ?>
        <?php require_once 'views/layouts/topbar.php'; ?>

        <div class="page-content">
            <div class="page-title-head d-flex align-items-center gap-2">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-bold mb-0">Editar Marca</h4>
                    <p class="text-muted mb-0">Actualiza nombre o logo. Si no adjuntas uno nuevo se conservará el actual.</p>
                </div>
            </div>

            <div class="page-container">
                <?php if($mensaje): ?>
                    <div class="alert alert-<?= $tipo_mensaje ?> alert-dismissible fade show" role="alert">
                        <?= $mensaje ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Información de la Marca</h5>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="index.php?route=brands/<?= $marca['id_marca'] ?>/update" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="nombre" class="form-label">Nombre de la Marca <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($marca['nombre'] ?? '') ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label d-block">Logo de la Marca (opcional)</label>
                                                <div class="border border-2 border-dashed rounded-3 p-2 text-center" id="dropZoneLogo">
                                                    <i class="ri-image-add-line fs-40 text-muted d-block mb-2"></i>
                                                    <h5 class="mb-2">Arrastra la imagen aquí o haz clic</h5>
                                                    <p class="text-muted mb-3">Formatos permitidos: JPG, PNG</p>
                                                    <input type="file" id="logo" name="logo" accept=".jpg,.jpeg,.png" class="d-none" />
                                                    <button type="button" class="btn btn-sm btn-primary" onclick="document.getElementById('logo').click()">
                                                        <i class="ri-upload-cloud-2-line me-1"></i>Seleccionar Logo
                                                    </button>
                                                </div>
                                                <div id="logoPreviewContainer" class="mt-3"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex gap-2">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="ri-save-2-line me-1"></i>Guardar cambios
                                                </button>
                                                <a class="btn btn-secondary" href="index.php?route=brands">
                                                    <i class="ri-arrow-go-back-line me-1"></i>Volver
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php require_once 'views/layouts/footer.php'; ?>
        </div>
    </div>

    <?php require_once 'views/layouts/theme.php'; ?>
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.js"></script>

    <style>
        #dropZoneLogo {
            cursor: pointer;
            background-color: var(--bs-gray-100);
            transition: all 0.3s ease;
        }

        [data-bs-theme="dark"] #dropZoneLogo {
            background-color: var(--bs-gray-800);
        }

        #dropZoneLogo:hover,
        #dropZoneLogo.dragover {
            background-color: rgba(60, 134, 216, 0.1);
            border-color: #3c86d8 !important;
        }

        .logo-preview-container {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .logo-preview-wrapper {
            position: relative;
            border: 1px solid var(--bs-border-color);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            background: var(--bs-body-bg);
            max-width: 260px;
        }

        .logo-preview-wrapper:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.18);
        }

        [data-bs-theme="dark"] .logo-preview-wrapper:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
        }

        .logo-preview-wrapper img {
            width: 100%;
            height: auto;
            max-height: 250px;
            object-fit: contain;
            padding: 1rem;
            display: block;
        }

        .logo-preview-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .logo-preview-wrapper:hover .logo-preview-overlay {
            opacity: 1;
        }

        .logo-overlay-btn {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 13px;
            transition: all 0.3s ease;
            color: white;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .btn-change-logo {
            background-color: #3c86d8;
        }

        .btn-change-logo:hover {
            background-color: #2e6ab1;
        }

        .btn-delete-logo {
            background-color: #e31e24;
        }

        .btn-delete-logo:hover {
            background-color: #c91a1f;
        }

        .empty-state-logo {
            text-align: center;
            padding: 2rem;
            color: var(--bs-text-muted);
        }

        .empty-state-logo i {
            font-size: 2rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }
    </style>

    <script>
        const dropZoneLogo = document.getElementById('dropZoneLogo');
        const logoInput = document.getElementById('logo');
        const logoPreviewContainer = document.getElementById('logoPreviewContainer');
        const existingLogoUrl = "<?= $marca['imagen'] ?? '' ?>";
        let uploadedLogo = null;

        if (existingLogoUrl) {
            uploadedLogo = { src: existingLogoUrl, name: 'Logo actual', file: null, existing: true };
        }
        renderLogo();

        dropZoneLogo.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZoneLogo.classList.add('dragover');
        });

        dropZoneLogo.addEventListener('dragleave', () => {
            dropZoneLogo.classList.remove('dragover');
        });

        dropZoneLogo.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZoneLogo.classList.remove('dragover');
            handleLogoFile(e.dataTransfer.files);
        });

        logoInput.addEventListener('change', (e) => {
            if(e.target.files.length > 0) {
                handleLogoFile(e.target.files);
            }
        });

        function handleLogoFile(files) {
            const allowedFormats = ['image/jpeg', 'image/png'];

            if (files.length === 0) return;

            const file = files[0];
            if (allowedFormats.includes(file.type)) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    uploadedLogo = {
                        src: e.target.result,
                        name: file.name,
                        file: file
                    };
                    renderLogo();
                    updateLogoInput();
                };
                reader.readAsDataURL(file);
            } else {
                alert(`Formato no permitido: ${file.name}. Usa JPG o PNG`);
                logoInput.value = '';
                uploadedLogo = existingLogoUrl ? { src: existingLogoUrl, name: 'Logo actual', file: null, existing: true } : null;
                renderLogo();
            }
        }

        function updateLogoInput() {
            const dataTransfer = new DataTransfer();
            
            if (uploadedLogo && uploadedLogo.file) {
                dataTransfer.items.add(uploadedLogo.file);
                logoInput.files = dataTransfer.files;
            } else {
                logoInput.value = '';
            }
        }

        function renderLogo() {
            logoPreviewContainer.innerHTML = '';

            if (!uploadedLogo) {
                logoPreviewContainer.innerHTML = '<div class="empty-state-logo"><i class="ri-image-line"></i><p>No hay logo cargado</p></div>';
                return;
            }

            const container = document.createElement('div');
            container.className = 'logo-preview-container';

            const wrapper = document.createElement('div');
            wrapper.className = 'logo-preview-wrapper';

            const img = document.createElement('img');
            img.src = uploadedLogo.src;
            img.alt = uploadedLogo.name;

            const overlay = document.createElement('div');
            overlay.className = 'logo-preview-overlay';

            const changeBtn = document.createElement('button');
            changeBtn.type = 'button';
            changeBtn.className = 'logo-overlay-btn btn-change-logo';
            changeBtn.innerHTML = '<i class="ri-image-edit-line"></i>Cambiar';
            changeBtn.onclick = () => {
                logoInput.click();
            };

            const deleteBtn = document.createElement('button');
            deleteBtn.type = 'button';
            deleteBtn.className = 'logo-overlay-btn btn-delete-logo';
            deleteBtn.innerHTML = '<i class="ri-delete-bin-line"></i>Eliminar';
            deleteBtn.onclick = () => {
                uploadedLogo = null;
                updateLogoInput();
                renderLogo();
            };

            overlay.appendChild(changeBtn);
            overlay.appendChild(deleteBtn);

            wrapper.appendChild(img);
            wrapper.appendChild(overlay);
            container.appendChild(wrapper);

            logoPreviewContainer.appendChild(container);
        }
    </script>
</body>

</html>
