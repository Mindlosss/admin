<?php
require_once 'models/Auto.php';
//obtener datos
$autoModel = new Auto();
$stmtAutos = $autoModel->obtenerTodos();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <link href="assets/css/vendor.min.css" rel="stylesheet" type="text/css" />

    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

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
                                    placeholder="Buscar...">
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
                    <h4 class="fs-18 fw-bold mb-0">Dashboard</h4>
                </div>

                <!-- <div class="text-end">
                    <ol class="breadcrumb m-0 py-0 fs-13">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Abstack</a></li>
                        
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div> -->
            </div>
            
            <!-- container -->
            <div class="page-container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Lista de Coches</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>Imagen</th> <th>Marca</th>
                                                <th>Modelo</th>
                                                <th>Año</th>
                                                <th>Color</th>
                                                <th>Precio</th>
                                                <th>Acciones</th> </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            // Verificar si hay resultados
                                            if ($stmtAutos->rowCount() > 0) {
                                                while ($row = $stmtAutos->fetch(PDO::FETCH_ASSOC)) {
                                                    // Procesar imagen, usa una por defecto si no hay imagen
                                                    $imagenUrl = !empty($row['imagen']) ? $row['imagen'] : 'assets/images/small/small-2.jpg';
                                            ?>
                                                    <tr>
                                                        <td>
                                                            <img src="<?= $imagenUrl ?>" alt="coche" class="avatar-sm rounded-3 object-fit-cover">
                                                        </td>
                                                        <td class="fw-semibold"><?= htmlspecialchars($row['marca']) ?></td>
                                                        <td><?= htmlspecialchars($row['modelo']) ?></td>
                                                        <td><?= $row['year'] ?></td>
                                                        
                                                        <td>
                                                            <div class="d-flex align-items-center gap-2">
                                                                <span class="rounded-circle border" 
                                                                    style="width: 20px; height: 20px; background-color: <?= $row['color'] ?>;"
                                                                    title="<?= $row['color'] ?>">
                                                                </span>
                                                                <span class="font-monospace fs-13"><?= $row['color'] ?></span>
                                                            </div>
                                                        </td>
                                                        <td>$<?= number_format($row['precio'], 2) ?></td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="text-reset fs-16 px-1"> 
                                                                <i class="ri-edit-2-line"></i>
                                                            </a>
                                                            <a href="javascript:void(0);" class="text-reset fs-16 px-1 text-danger"> 
                                                                <i class="ri-delete-bin-2-line"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                            <?php 
                                                }
                                            } else {
                                            ?>
                                                <tr>
                                                    <td colspan="7" class="text-center py-4">
                                                        <div class="d-flex flex-column align-items-center">
                                                            <i class="ri-car-line fs-30 text-muted mb-2"></i>
                                                            <p class="text-muted mb-0">No hay coches registrados aún.</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <!-- container -->


            <!-- Footer -->
            <?php require_once 'views/layouts/footer.php'; ?>

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

        </div>
    <!-- END wrapper -->

    <!-- theme settings -->
    <?php require_once 'views/layouts/theme.php'; ?>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>

    <!-- Apex Chart js -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>

    <!-- Projects Analytics Dashboard App js -->
    <script src="assets/js/pages/dashboard.js"></script>

</body>

</html>