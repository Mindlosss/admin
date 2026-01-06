<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Resumen general" name="description" />
    <meta content="Coderthemes" name="author" />

    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="assets/css/vendor.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <script src="assets/js/config.js"></script>
</head>

<body>
    <div class="wrapper">
        <?php require_once 'views/layouts/sidebar.php'; ?>
        <?php require_once 'views/layouts/topbar.php'; ?>

        <div class="page-content">
            <div class="page-title-head d-flex align-items-center gap-2">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-bold mb-0">Dashboard</h4>
                    <p class="text-muted mb-0">Resumen general del inventario.</p>
                </div>
            </div>

            <div class="page-container">
                <?php if(!empty($mensaje)): ?>
                    <div class="alert alert-<?= $tipo_mensaje ?? 'info' ?> alert-dismissible fade show" role="alert">
                        <strong>Notificación:</strong> <?= $mensaje ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="card shadow-sm border-0">
                            <div class="card-body d-flex align-items-center">
                                <div class="avatar-md bg-primary-subtle text-primary rounded me-3 d-flex align-items-center justify-content-center">
                                    <i class="ri-car-fill fs-22"></i>
                                </div>
                                <div>
                                    <p class="text-uppercase text-muted fs-12 mb-1">Coches</p>
                                    <h4 class="mb-0"><?= $totales['autos'] ?? 0 ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm border-0">
                            <div class="card-body d-flex align-items-center">
                                <div class="avatar-md bg-success-subtle text-success rounded me-3 d-flex align-items-center justify-content-center">
                                    <i class="ri-price-tag-3-fill fs-22"></i>
                                </div>
                                <div>
                                    <p class="text-uppercase text-muted fs-12 mb-1">Marcas</p>
                                    <h4 class="mb-0"><?= $totales['marcas'] ?? 0 ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm border-0">
                            <div class="card-body d-flex align-items-center">
                                <div class="avatar-md bg-warning-subtle text-warning rounded me-3 d-flex align-items-center justify-content-center">
                                    <i class="ri-money-dollar-circle-fill fs-22"></i>
                                </div>
                                <div>
                                    <p class="text-uppercase text-muted fs-12 mb-1">Valor Inventario</p>
                                    <h4 class="mb-0">$<?= number_format((float) ($totales['valor'] ?? 0), 2) ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <div>
                                    <h5 class="card-title mb-0">Autos recientes</h5>
                                    <small class="text-muted">Los últimos ingresados al inventario</small>
                                </div>
                                <a class="btn btn-outline-primary btn-sm" href="index.php?route=autos">
                                    Ver todos
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>Imagen</th>
                                                <th>Marca / Modelo</th>
                                                <th>Año</th>
                                                <th>Color</th>
                                                <th>Precio</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($autosRecientes)): ?>
                                                <?php foreach ($autosRecientes as $auto): ?>
                                                    <?php $imagenUrl = !empty($auto['imagen']) ? $auto['imagen'] : 'assets/images/small/small-2.jpg'; ?>
                                                    <tr>
                                                        <td><img src="<?= $imagenUrl ?>" class="avatar-sm rounded-3 object-fit-cover" alt="auto"></td>
                                                        <td>
                                                            <div class="fw-semibold"><?= htmlspecialchars($auto['marca'] ?? '') ?></div>
                                                            <div class="text-muted"><?= htmlspecialchars($auto['modelo'] ?? '') ?></div>
                                                        </td>
                                                        <td><?= $auto['year'] ?? '' ?></td>
                                                        <td>
                                                            <span class="badge bg-light text-dark border" style="border-color: <?= $auto['color'] ?? '#ccc' ?> !important;">
                                                                <?= $auto['color'] ?? 'N/D' ?>
                                                            </span>
                                                        </td>
                                                        <td class="fw-semibold">$<?= number_format((float) ($auto['precio'] ?? 0), 2) ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                <td colspan="5" class="text-center py-4 text-muted">Aún no hay autos registrados.</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
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
</body>

</html>
