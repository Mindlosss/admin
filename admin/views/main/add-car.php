<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Agregar coche</title>
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
                    <h4 class="fs-18 fw-bold mb-0">Agregar coche</h4>
                </div>

                <!-- <div class="text-end">
                    <ol class="breadcrumb m-0 py-0 fs-13">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Abstack</a></li>
                        
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                        
                        <li class="breadcrumb-item active">Agregar coche</li>
                    </ol>
                </div> -->
            </div>
            

            

            <div class="page-container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Información del Vehículo</h5>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="">
                                    <!-- Marca y Modelo -->
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="id_marca" class="form-label">Marca <span class="text-danger">*</span></label>
                                                <select class="form-select" id="id_marca" name="id_marca" required>
                                                    <option selected disabled value="">Selecciona una marca</option>
                                                    <option value="1">Toyota</option>
                                                    <option value="2">Honda</option>
                                                    <option value="3">Ford</option>
                                                    <option value="4">BMW</option>
                                                    <option value="5">Mercedes-Benz</option>
                                                    <option value="6">Audi</option>
                                                    <option value="7">Volkswagen</option>
                                                    <option value="8">Chevrolet</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="modelo" class="form-label">Modelo <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Ej: Corolla, Civic, Mustang" required>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tipo y Año -->
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="tipo" class="form-label">Tipo de Vehículo</label>
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
                                                <label for="year" class="form-label">Año <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="year" name="year" min="1990" max="2099" placeholder="2023" required>
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
                                                        <input type="radio" name="color_option" value="Blanco" class="color-radio">
                                                        <span class="color-circle" style="background-color: #FFFFFF; border: 2px solid #333;"></span>
                                                    </label>
                                                    
                                                    <!-- Negro -->
                                                    <label class="color-option" title="Negro">
                                                        <input type="radio" name="color_option" value="Negro" class="color-radio">
                                                        <span class="color-circle" style="background-color: #000000;"></span>
                                                    </label>
                                                    
                                                    <!-- Gris -->
                                                    <label class="color-option" title="Gris">
                                                        <input type="radio" name="color_option" value="Gris" class="color-radio">
                                                        <span class="color-circle" style="background-color: #808080;"></span>
                                                    </label>
                                                    
                                                    <!-- Rojo -->
                                                    <label class="color-option" title="Rojo">
                                                        <input type="radio" name="color_option" value="Rojo" class="color-radio">
                                                        <span class="color-circle" style="background-color: #E31E24;"></span>
                                                    </label>
                                                    
                                                    <!-- Azul -->
                                                    <label class="color-option" title="Azul">
                                                        <input type="radio" name="color_option" value="Azul" class="color-radio">
                                                        <span class="color-circle" style="background-color: #0066CC;"></span>
                                                    </label>
                                                    
                                                    <!-- Plata -->
                                                    <label class="color-option" title="Plata">
                                                        <input type="radio" name="color_option" value="Plata" class="color-radio">
                                                        <span class="color-circle" style="background-color: #C0C0C0; border: 1px solid #999;"></span>
                                                    </label>
                                                    
                                                    <!-- Marrón -->
                                                    <label class="color-option" title="Marrón">
                                                        <input type="radio" name="color_option" value="Marrón" class="color-radio">
                                                        <span class="color-circle" style="background-color: #8B4513;"></span>
                                                    </label>
                                                    
                                                    <!-- Verde -->
                                                    <label class="color-option" title="Verde">
                                                        <input type="radio" name="color_option" value="Verde" class="color-radio">
                                                        <span class="color-circle" style="background-color: #228B22;"></span>
                                                    </label>
                                                    
                                                    <!-- Naranja -->
                                                    <label class="color-option" title="Naranja">
                                                        <input type="radio" name="color_option" value="Naranja" class="color-radio">
                                                        <span class="color-circle" style="background-color: #FF8C00;"></span>
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
                                                    <option value="Híbrida">Híbrida</option>
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
                                                <div class="border border-2 border-dashed rounded-3 p-4 text-center" id="dropZone">
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
    <div class="offcanvas offcanvas-end" tabindex="-1" id="theme-settings-offcanvas">
        <div class="d-flex align-items-center gap-2 px-3 py-3 offcanvas-header border-bottom border-dashed">
            <h5 class="flex-grow-1 mb-0">Theme Settings</h5>

            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body p-0 h-100" data-simplebar>
            <div class="p-3 border-bottom border-dashed">
                <h5 class="mb-3 fs-16 fw-bold">Color Scheme</h5>

                <div class="row">
                    <div class="col-4">
                        <div class="form-check card-radio">
                            <input class="form-check-input" type="radio" name="data-bs-theme" id="layout-color-light"
                                value="light">
                            <label class="form-check-label p-3 w-100 d-flex justify-content-center align-items-center"
                                for="layout-color-light">
                                <iconify-icon icon="solar:sun-bold-duotone" class="fs-32 text-muted"></iconify-icon>
                            </label>
                        </div>
                        <h5 class="fs-14 text-center text-muted mt-2">Light</h5>
                    </div>

                    <div class="col-4">
                        <div class="form-check card-radio">
                            <input class="form-check-input" type="radio" name="data-bs-theme" id="layout-color-dark"
                                value="dark">
                            <label class="form-check-label p-3 w-100 d-flex justify-content-center align-items-center"
                                for="layout-color-dark">
                                <iconify-icon icon="solar:cloud-sun-2-bold-duotone" class="fs-32 text-muted"></iconify-icon>
                            </label>
                        </div>
                        <h5 class="fs-14 text-center text-muted mt-2">Dark</h5>
                    </div>
                </div>
            </div>

            <div class="p-3 border-bottom border-dashed">
                <h5 class="mb-3 fs-16 fw-bold">Topbar Color</h5>

                <div class="row">
                    <div class="col-3 darkMode">
                        <div class="form-check card-radio">
                            <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-light"
                                value="light">
                            <label class="form-check-label p-0 avatar-lg w-100 bg-light" for="topbar-color-light">
                                <span class="d-flex align-items-center justify-content-center h-100">
                                    <span class="p-2 d-inline-flex shadow rounded-circle bg-white"></span>
                                </span>
                            </label>
                        </div>
                        <h5 class="fs-14 text-center text-muted mt-2">Light</h5>
                    </div>

                    <div class="col-3">
                        <div class="form-check card-radio">
                            <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-dark"
                                value="dark">
                            <label class="form-check-label p-0 avatar-lg w-100 bg-light" for="topbar-color-dark">
                                <span class="d-flex align-items-center justify-content-center h-100">
                                    <span class="p-2 d-inline-flex shadow rounded-circle"
                                        style="background-color: #313a46;"></span>
                                </span>
                            </label>
                        </div>
                        <h5 class="fs-14 text-center text-muted mt-2">Dark</h5>
                    </div>

                    <div class="col-3">
                        <div class="form-check card-radio">
                            <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-brand"
                                value="brand">
                            <label class="form-check-label p-0 avatar-lg w-100 bg-light" for="topbar-color-brand">
                                <span class="d-flex align-items-center justify-content-center h-100">
                                    <span class="p-2 d-inline-flex shadow rounded-circle bg-primary"></span>
                                </span>
                            </label>
                        </div>
                        <h5 class="fs-14 text-center text-muted mt-2">Brand</h5>
                    </div>

                    <div class="col-3">
                        <div class="form-check card-radio">
                            <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-gradient"
                                value="gradient">
                            <label class="form-check-label p-0 avatar-lg w-100 bg-light" for="topbar-color-gradient">
                                <span class="d-flex align-items-center justify-content-center h-100">
                                    <span class="p-2 d-inline-flex shadow rounded-circle"
                                        style="background: linear-gradient(to top,#5d6dc3,#3c86d8);"></span>
                                </span>
                            </label>
                        </div>
                        <h5 class="fs-14 text-center text-muted mt-2">Gradient</h5>
                    </div>
                </div>
            </div>

            <div class="p-3 border-bottom border-dashed">
                <h5 class="mb-3 fs-16 fw-bold">Menu Color</h5>

                <div class="row">
                    <div class="col-3 darkMode">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-menu-color" id="sidenav-color-light"
                                value="light">
                            <label class="form-check-label p-0 avatar-lg w-100 bg-light" for="sidenav-color-light">
                                <span class="d-flex align-items-center justify-content-center h-100">
                                    <span class="p-2 d-inline-flex shadow rounded-circle bg-white"></span>
                                </span>
                            </label>
                        </div>
                        <h5 class="fs-14 text-center text-muted mt-2">Light</h5>
                    </div>

                    <div class="col-3">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-menu-color" id="sidenav-color-dark"
                                value="dark">
                            <label class="form-check-label p-0 avatar-lg w-100 bg-light" for="sidenav-color-dark">
                                <span class="d-flex align-items-center justify-content-center h-100">
                                    <span class="p-2 d-inline-flex shadow rounded-circle"
                                        style="background-color: #313a46;"></span>
                                </span>
                            </label>
                        </div>
                        <h5 class="fs-14 text-center text-muted mt-2">Dark</h5>
                    </div>
                    <div class="col-3">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-menu-color" id="sidenav-color-brand"
                                value="brand">
                            <label class="form-check-label p-0 avatar-lg w-100 bg-light" for="sidenav-color-brand">
                                <span class="d-flex align-items-center justify-content-center h-100">
                                    <span class="p-2 d-inline-flex shadow rounded-circle bg-primary"></span>
                                </span>
                            </label>
                        </div>
                        <h5 class="fs-14 text-center text-muted mt-2">Brand</h5>
                    </div>
                    <div class="col-3">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-menu-color" id="sidenav-color-gradient"
                                value="gradient">
                            <label class="form-check-label p-0 avatar-lg w-100 bg-light" for="sidenav-color-gradient">
                                <span class="d-flex align-items-center justify-content-center h-100">
                                    <span class="p-2 d-inline-flex shadow rounded-circle"
                                        style="background: linear-gradient(to top,#5d6dc3,#3c86d8);"></span>
                                </span>
                            </label>
                        </div>
                        <h5 class="fs-14 text-center text-muted mt-2">Gradient</h5>
                    </div>
                </div>
            </div>

            <div class="p-3 .border-bottom .border-dashed">
                <h5 class="mb-3 fs-16 fw-bold">Sidebar Size</h5>

                <div class="row">
                    <div class="col-4">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-sidenav-size" id="sidenav-size-default"
                                value="default">
                            <label class="form-check-label p-0 avatar-xl w-100" for="sidenav-size-default">
                                <span class="d-flex h-100">
                                    <span class="flex-shrink-0">
                                        <span class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
                                            <span class="d-block p-1 bg-dark-subtle rounded mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                        </span>
                                    </span>
                                    <span class="flex-grow-1">
                                        <span class="d-flex h-100 flex-column">
                                            <span class="bg-light d-block p-1"></span>
                                        </span>
                                    </span>
                                </span>
                            </label>
                        </div>
                        <h5 class="fs-14 text-center text-muted mt-2">Default</h5>
                    </div>

                    <div class="col-4">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-sidenav-size" id="sidenav-size-compact"
                                value="compact">
                            <label class="form-check-label p-0 avatar-xl w-100" for="sidenav-size-compact">
                                <span class="d-flex h-100">
                                    <span class="flex-shrink-0">
                                        <span class="bg-light d-flex h-100 border-end  flex-column p-1">
                                            <span class="d-block p-1 bg-dark-subtle rounded mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                        </span>
                                    </span>
                                    <span class="flex-grow-1">
                                        <span class="d-flex h-100 flex-column">
                                            <span class="bg-light d-block p-1"></span>
                                        </span>
                                    </span>
                                </span>
                            </label>
                        </div>
                        <h5 class="fs-14 text-center text-muted mt-2">Compact</h5>
                    </div>

                    <div class="col-4">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-sidenav-size" id="sidenav-size-small"
                                value="condensed">
                            <label class="form-check-label p-0 avatar-xl w-100" for="sidenav-size-small">
                                <span class="d-flex h-100">
                                    <span class="flex-shrink-0">
                                        <span class="bg-light d-flex h-100 border-end flex-column" style="padding: 2px;">
                                            <span class="d-block p-1 bg-dark-subtle rounded mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                        </span>
                                    </span>
                                    <span class="flex-grow-1">
                                        <span class="d-flex h-100 flex-column">
                                            <span class="bg-light d-block p-1"></span>
                                        </span>
                                    </span>
                                </span>
                            </label>
                        </div>
                        <h5 class="fs-14 text-center text-muted mt-2">Condensed</h5>
                    </div>

                    <div class="col-4">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-sidenav-size"
                                id="sidenav-size-small-hover" value="sm-hover">
                            <label class="form-check-label p-0 avatar-xl w-100" for="sidenav-size-small-hover">
                                <span class="d-flex h-100">
                                    <span class="flex-shrink-0">
                                        <span class="bg-light d-flex h-100 border-end flex-column" style="padding: 2px;">
                                            <span class="d-block p-1 bg-dark-subtle rounded mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                        </span>
                                    </span>
                                    <span class="flex-grow-1">
                                        <span class="d-flex h-100 flex-column">
                                            <span class="bg-light d-block p-1"></span>
                                        </span>
                                    </span>
                                </span>
                            </label>
                        </div>
                        <h5 class="fs-14 text-center text-muted mt-2">Hover View</h5>
                    </div>

                    <div class="col-4">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-sidenav-size"
                                id="sidenav-size-small-hover-active" value="sm-hover-active">
                            <label class="form-check-label p-0 avatar-xl w-100" for="sidenav-size-small-hover-active">
                                <span class="d-flex h-100">
                                    <span class="flex-shrink-0">
                                        <span class="bg-light d-flex h-100 border-end flex-column" style="padding: 2px;">
                                            <span class="d-block p-1 bg-dark-subtle rounded mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                        </span>
                                    </span>
                                    <span class="flex-grow-1">
                                        <span class="d-flex h-100 flex-column">
                                            <span class="bg-light d-block p-1"></span>
                                        </span>
                                    </span>
                                </span>
                            </label>
                        </div>
                        <h5 class="fs-14 text-center text-muted mt-2">Hover Active</h5>
                    </div>

                    <div class="col-4">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-sidenav-size" id="sidenav-size-full"
                                value="full">
                            <label class="form-check-label p-0 avatar-xl w-100" for="sidenav-size-full">
                                <span class="d-flex h-100">
                                    <span class="flex-shrink-0">
                                        <span class="d-flex h-100 flex-column">
                                            <span class="d-block p-1 bg-dark-subtle mb-1"></span>
                                        </span>
                                    </span>
                                    <span class="flex-grow-1">
                                        <span class="d-flex h-100 flex-column">
                                            <span class="bg-light d-block p-1"></span>
                                        </span>
                                    </span>
                                </span>
                            </label>
                        </div>
                        <h5 class="fs-14 text-center text-muted mt-2">Full Layout</h5>
                    </div>

                    <div class="col-4">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-sidenav-size"
                                id="sidenav-size-fullscreen" value="fullscreen">
                            <label class="form-check-label p-0 avatar-xl w-100" for="sidenav-size-fullscreen">
                                <span class="d-flex h-100">
                                    <span class="flex-grow-1">
                                        <span class="d-flex h-100 flex-column">
                                            <span class="bg-light d-block p-1"></span>
                                        </span>
                                    </span>
                                </span>
                            </label>
                        </div>
                        <h5 class="fs-14 text-center text-muted mt-2">Hidden</h5>
                    </div>
                </div>
            </div>

            <div class="p-3 border-bottom border-dashed d-none">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="fs-16 fw-bold mb-0">Container Width</h5>

                    <div class="btn-group radio" role="group">
                        <input type="radio" class="btn-check" name="data-container-position" id="container-width-fixed"
                            value="fixed">
                        <label class="btn btn-sm btn-soft-primary w-sm" for="container-width-fixed">Full</label>

                        <input type="radio" class="btn-check" name="data-container-position" id="container-width-scrollable"
                            value="scrollable">
                        <label class="btn btn-sm btn-soft-primary w-sm ms-0" for="container-width-scrollable">Boxed</label>
                    </div>
                </div>
            </div>

            <div class="p-3 border-bottom border-dashed d-none">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="fs-16 fw-bold mb-0">Layout Position</h5>

                    <div class="btn-group radio" role="group">
                        <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-fixed"
                            value="fixed">
                        <label class="btn btn-sm btn-soft-primary w-sm" for="layout-position-fixed">Fixed</label>

                        <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-scrollable"
                            value="scrollable">
                        <label class="btn btn-sm btn-soft-primary w-sm ms-0"
                            for="layout-position-scrollable">Scrollable</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex align-items-center gap-2 px-3 py-2 offcanvas-header border-top border-dashed">
            <button type="button" class="btn w-50 btn-soft-danger" id="reset-layout">Reset</button>
            <a href="https://1.envato.market/coderthemes" target="_blank" class="btn w-50 btn-soft-info">Buy Now</a>
        </div>

    </div>

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

        .color-option input[type="radio"]:checked + .color-circle {
            border-color: #3c86d8;
            box-shadow: 0 0 0 2px #fff, 0 0 0 4px #3c86d8;
            transform: scale(1.1);
        }

        .color-option:hover .color-circle {
            transform: scale(1.05);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }

        /* Image Upload Styles */
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
        // Colores
        document.querySelectorAll('.color-radio').forEach(radio => {
            radio.addEventListener('change', function() {
                document.getElementById('color').value = this.value;
            });
        });

        // carga de imagenes
        const dropZone = document.getElementById('dropZone');
        const imageInput = document.getElementById('imagenes');
        const imagePreviewContainer = document.getElementById('imagePreviewContainer');
        let uploadedImages = [];
        let primaryImageIndex = -1;

        // Drag and drop
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
            handleFiles(e.target.files);
        });

        function handleFiles(files) {
            const allowedFormats = ['image/jpeg', 'image/png'];

            Array.from(files).forEach((file) => {
                if (allowedFormats.includes(file.type)) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        uploadedImages.push({
                            src: e.target.result,
                            name: file.name,
                            file: file
                        });
                        if (primaryImageIndex === -1) {
                            primaryImageIndex = 0;
                        }
                        renderImages();
                    };
                    reader.readAsDataURL(file);
                } else {
                    alert(`Formato no permitido: ${file.name}. Usa JPG, PNG o WEBP`);
                }
            });
        }

        function renderImages() {
            imagePreviewContainer.innerHTML = '';

            if (uploadedImages.length === 0) {
                imagePreviewContainer.innerHTML = '<div class="empty-state"><i class="ri-gallery-line"></i><p>No hay imágenes cargadas</p></div>';
                return;
            }

            const previewRow = document.createElement('div');
            previewRow.className = 'image-preview-row';

            uploadedImages.forEach((image, index) => {
                const wrapper = document.createElement('div');
                wrapper.className = `image-preview-wrapper ${index === primaryImageIndex ? 'primary' : ''}`;

                const img = document.createElement('img');
                img.src = image.src;
                img.alt = image.name;

                if (index === primaryImageIndex) {
                    const badge = document.createElement('div');
                    badge.className = 'image-badge-primary';
                    badge.innerHTML = '<i class="ri-star-fill"></i>Principal';
                    wrapper.appendChild(badge);
                }

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
                previewRow.appendChild(wrapper);
            });

            imagePreviewContainer.appendChild(previewRow);
        }

        function setPrimaryImage(index) {
            primaryImageIndex = index;
            renderImages();
        }

        function deleteImage(index) {
            uploadedImages.splice(index, 1);
            if (primaryImageIndex === index) {
                primaryImageIndex = uploadedImages.length > 0 ? 0 : -1;
            } else if (primaryImageIndex > index) {
                primaryImageIndex--;
            }
            renderImages();
        }

        // Reset form
        document.querySelector('form').addEventListener('reset', function() {
            document.getElementById('color').value = '';
            document.querySelectorAll('.color-radio').forEach(radio => {
                radio.checked = false;
            });
            uploadedImages = [];
            primaryImageIndex = -1;
            imageInput.value = '';
            renderImages();
        });
    </script>

</body>

</html>