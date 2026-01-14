<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Coches</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Inventario de autos" name="description" />
    <meta content="Coderthemes" name="author" />

    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="assets/css/vendor.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <link href="assets/css/autos-responsive.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <script src="assets/js/config.js"></script>
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">

        <?php require_once 'views/layouts/sidebar.php'; ?>
        <?php require_once 'views/layouts/topbar.php'; ?>

        <div class="page-content">

            <div class="page-title-head d-flex align-items-center gap-2">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-bold mb-0">Autos</h4>
                    <p class="text-muted mb-0">Gestiona tu inventario de vehículos.</p>
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
                                <h5 class="card-title mb-0">Lista de autos</h5>
                                <a class="btn btn-primary btn-sm" href="index.php?route=autos/create">
                                    <i class="ri-add-line me-1"></i>Agregar auto
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0 autos-table">
                                        <thead>
                                            <tr>
                                                <th>Imagen</th> 
                                                <th>Marca</th>
                                                <th>Submarca</th>
                                                <th>Modelo</th>
                                                <th>Color</th>
                                                <th>Precio</th>
                                                <th>Acciones</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($autos)): ?>
                                                <?php foreach ($autos as $row): ?>
                                                    <?php
                                                        $imagenes = $row['imagenes'] ?? [];
                                                        $imagenPrincipal = $imagenes[0] ?? 'assets/images/small/small-2.jpg';
                                                    ?>
                                                    <tr>
                                                        <td data-label="Imagen" class="car-gallery-cell">
                                                            <?php if (!empty($imagenes)): ?>
                                                                <div class="car-gallery">
                                                                    <?php foreach ($imagenes as $img): ?>
                                                                        <img src="<?= $img ?>" alt="auto" class="avatar-sm car-list-image rounded-3 object-fit-cover">
                                                                    <?php endforeach; ?>
                                                                </div>
                                                            <?php else: ?>
                                                                <img src="<?= $imagenPrincipal ?>" alt="auto" class="avatar-sm car-list-image rounded-3 object-fit-cover">
                                                            <?php endif; ?>
                                                        </td>
                                                        <td data-label="Marca" class="fw-semibold"><?= htmlspecialchars($row['marca'] ?? '') ?></td>
                                                        <td data-label="Submarca"><?= htmlspecialchars($row['modelo'] ?? '') ?></td>
                                                        <td data-label="Modelo"><?= $row['year'] ?? '' ?></td>
                                                        
                                                        <td data-label="Color">
                                                            <div class="d-flex align-items-center gap-2">
                                                                <span class="rounded-circle border" 
                                                                    style="width: 20px; height: 20px; background-color: <?= $row['color'] ?? '#ccc' ?>;"
                                                                    title="<?= $row['color'] ?? '' ?>">
                                                                </span>
                                                                <span class="font-monospace fs-13"><?= $row['color'] ?? '' ?></span>
                                                            </div>
                                                        </td>
                                                        <td data-label="Precio">$<?= number_format((float) ($row['precio'] ?? 0), 2) ?></td>
                                                        
                                                        <td data-label="Acciones">
                                                            <a href="index.php?route=autos/<?= $row['id_auto'] ?>/edit" class="text-reset fs-16 px-1" title="Editar"> 
                                                                <i class="ri-edit-2-line"></i>
                                                            </a>

                                                            <form action="index.php?route=autos/<?= $row['id_auto'] ?>/delete" method="POST" style="display:inline-block;">
                                                                <button type="submit" class="text-reset fs-16 px-1 text-danger border-0 bg-transparent" 
                                                                        onclick="return confirm('¿Estás seguro de eliminar el <?= htmlspecialchars($row['modelo'] ?? '') ?>? No se puede deshacer.')" 
                                                                        title="Eliminar"> 
                                                                    <i class="ri-delete-bin-2-line"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="7" class="text-center py-4">
                                                        <div class="d-flex flex-column align-items-center">
                                                            <i class="ri-car-line fs-30 text-muted mb-2"></i>
                                                            <p class="text-muted mb-0">No hay autos registrados aún.</p>
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
