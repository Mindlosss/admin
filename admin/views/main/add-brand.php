<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Agregar marca</title>
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
                    <h4 class="fs-18 fw-bold mb-0">Agregar Marca</h4>
                </div>

                <!-- <div class="text-end">
                    <ol class="breadcrumb m-0 py-0 fs-13">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Abstack</a></li>
                        
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                        
                        <li class="breadcrumb-item active">Agregar Marca</li>
                    </ol>
                </div> -->
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
                                <h5 class="card-title">Información de la Marca</h5>
                            </div>
                            <div class="card-body">

                                <form method="POST" action="index.php?route=brands" enctype="multipart/form-data">
                                    
                                    <!-- Nombre de la Marca -->
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="nombre" class="form-label">Nombre de la Marca <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej: Toyota, Honda, Ford" required>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Logo de la Marca -->
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label d-block">Logo de la Marca <span class="text-danger">*</span></label>
                                                <div class="border border-2 border-dashed rounded-3 p-2 text-center" id="dropZoneLogo">
                                                    <i class="ri-image-add-line fs-40 text-muted d-block mb-2"></i>
                                                    <h5 class="mb-2">Arrastra la imagen aquí</h5>
                                                    <p class="text-muted mb-3">o haz clic para seleccionar un archivo</p>
                                                    <input type="file" id="logo" name="logo" accept=".jpg,.jpeg,.png" class="d-none" required />
                                                    <button type="button" class="btn btn-sm btn-primary" onclick="document.getElementById('logo').click()">
                                                        <i class="ri-upload-cloud-2-line me-1"></i>Seleccionar Logo
                                                    </button>
                                                    <p class="text-muted fs-13 mt-3 mb-0">Formatos permitidos: JPG, PNG</p>
                                                </div>
                                                <!-- Vista previa del logo -->
                                                <div id="logoPreviewContainer" class="mt-3"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Botones -->
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex gap-2">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="ri-add-line me-1"></i>Agregar Marca
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
            </div> <!-- container -->


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
            justify-content: center;
            margin-top: 1.5rem;
        }

        .logo-preview-wrapper {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            background-color: var(--bs-gray-100);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            max-width: 250px;
        }

        [data-bs-theme="dark"] .logo-preview-wrapper {
            background-color: var(--bs-gray-800);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        }

        .logo-preview-wrapper:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
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
    // Carga del logo
    const dropZoneLogo = document.getElementById('dropZoneLogo');
    const logoInput = document.getElementById('logo');
    const logoPreviewContainer = document.getElementById('logoPreviewContainer');
    let uploadedLogo = null;

    // Drag and drop events
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
                updateLogoInput(); // sincronizar input
            };
            reader.readAsDataURL(file);
        } else {
            alert(`Formato no permitido: ${file.name}. Usa JPG o PNG`);
            logoInput.value = ''; // Limpiar si es inválido
            uploadedLogo = null;
            renderLogo();
        }
    }

    // funcion nueva: sincronizar js con el input del formulario
    function updateLogoInput() {
        const dataTransfer = new DataTransfer();
        
        if (uploadedLogo) {
            dataTransfer.items.add(uploadedLogo.file);
            logoInput.files = dataTransfer.files;
        } else {
            logoInput.value = ''; // Vaciar si no hay logo
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
            updateLogoInput(); // sincronizar input al borrar
            renderLogo();
        };

        overlay.appendChild(changeBtn);
        overlay.appendChild(deleteBtn);

        wrapper.appendChild(img);
        wrapper.appendChild(overlay);
        container.appendChild(wrapper);

        logoPreviewContainer.appendChild(container);
    }

    // Reset form
    document.querySelector('form').addEventListener('reset', function() {
        uploadedLogo = null;
        logoInput.value = '';
        renderLogo();
    });
</script>

</body>

</html>
