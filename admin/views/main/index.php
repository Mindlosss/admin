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
                                                <th>Marca</th>
                                                <th>Modelo</th>
                                                <th>Año</th>
                                                <th>Color</th>
                                                <th>Precio</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Toyota</td>
                                                <td>Corolla</td>
                                                <td>2023</td>
                                                <td>Blanco</td>
                                                <td>$25,000</td>
                                            </tr>
                                            <tr>
                                                <td>Honda</td>
                                                <td>Civic</td>
                                                <td>2023</td>
                                                <td>Negro</td>
                                                <td>$27,500</td>
                                            </tr>
                                            <tr>
                                                <td>Ford</td>
                                                <td>Mustang</td>
                                                <td>2022</td>
                                                <td>Rojo</td>
                                                <td>$35,000</td>
                                            </tr>
                                            <tr>
                                                <td>BMW</td>
                                                <td>X5</td>
                                                <td>2023</td>
                                                <td>Plata</td>
                                                <td>$65,000</td>
                                            </tr>
                                            <tr>
                                                <td>Mercedes-Benz</td>
                                                <td>C-Class</td>
                                                <td>2022</td>
                                                <td>Azul</td>
                                                <td>$55,000</td>
                                            </tr>
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