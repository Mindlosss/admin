<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Marcas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Listado de marcas" name="description" />
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
                    <h4 class="fs-18 fw-bold mb-0">Marcas</h4>
                    <p class="text-muted mb-0">Administra logos y nombres de marcas.</p>
                </div>
            </div>

            <div class="page-container">
                <div class="row">
                    <div class="col-12">
                        <?php if(!empty($mensaje)): ?>
                            <div class="alert alert-<?= $tipo_mensaje ?? 'info' ?> alert-dismissible fade show" role="alert">
                                <strong>Notificación:</strong> <?= $mensaje ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <div class="card">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="card-title mb-0">Marcas registradas</h5>
                                <a class="btn btn-primary btn-sm" href="index.php?route=brands/create">
                                    <i class="ri-add-line me-1"></i>Agregar marca
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>Logo</th>
                                                <th>Nombre</th>
                                                <th>Autos</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($marcas)): ?>
                                                <?php foreach ($marcas as $marca): ?>
                                                    <?php $logo = !empty($marca['imagen']) ? $marca['imagen'] : 'assets/images/small/small-7.jpg'; ?>
                                                    <tr>
                                                        <td>
                                                            <img src="<?= $logo ?>" alt="<?= htmlspecialchars($marca['nombre'] ?? '') ?>" class="avatar-sm brand-list-image rounded-3 object-fit-cover bg-light">
                                                        </td>
                                                        <td class="fw-semibold"><?= htmlspecialchars($marca['nombre'] ?? '') ?></td>
                                                        <td>
                                                            <span class="badge bg-secondary-subtle text-secondary"><?= $marca['total_autos'] ?? 0 ?> autos</span>
                                                        </td>
                                                        <td>
                                                            <a href="index.php?route=brands/<?= $marca['id_marca'] ?>/edit" class="text-reset fs-16 px-1" title="Editar">
                                                                <i class="ri-edit-2-line"></i>
                                                            </a>
                                                            <form action="index.php?route=brands/<?= $marca['id_marca'] ?>/delete" method="POST" style="display:inline-block;">
                                                                <button type="submit" class="text-reset fs-16 px-1 text-danger border-0 bg-transparent" 
                                                                    onclick="return confirm('¿Eliminar la marca <?= htmlspecialchars($marca['nombre'] ?? '') ?>?');" 
                                                                    title="Eliminar">
                                                                    <i class="ri-delete-bin-2-line"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="4" class="text-center py-4">
                                                        <div class="d-flex flex-column align-items-center">
                                                            <i class="ri-stack-line fs-30 text-muted mb-2"></i>
                                                            <p class="text-muted mb-0">Aún no hay marcas registradas.</p>
                                                        </div>
                                                    </td>
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
