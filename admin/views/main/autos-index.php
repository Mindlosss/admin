<?php
$mensaje = $mensaje ?? '';
$tipo_mensaje = $tipo_mensaje ?? 'info';
$alertStyles = [
    'success' => 'border-emerald-200 bg-emerald-50 text-emerald-900',
    'danger' => 'border-rose-200 bg-rose-50 text-rose-900',
    'warning' => 'border-amber-200 bg-amber-50 text-amber-900',
    'info' => 'border-sky-200 bg-sky-50 text-sky-900',
];
$alertClass = $alertStyles[$tipo_mensaje] ?? $alertStyles['info'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Autos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Inventario de autos">
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .fade-up {
            animation: fadeUp 0.6s ease both;
        }
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(16px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="min-h-screen bg-slate-50 text-slate-900" style="font-family: 'Space Grotesk', sans-serif;">
    <div class="min-h-screen bg-[radial-gradient(1200px_circle_at_top,_rgba(16,185,129,0.12),_transparent)]">
        <div class="lg:flex">
            <?php require_once 'views/layouts/sidebar.php'; ?>
            <div class="flex-1">
                <?php require_once 'views/layouts/topbar.php'; ?>

                <main class="mx-auto w-full max-w-6xl px-4 pb-12 pt-6 lg:px-8">
                    <div class="flex flex-wrap items-center justify-between gap-4 fade-up">
                        <div>
                            <h1 class="text-2xl font-semibold tracking-tight">Autos</h1>
                            <p class="mt-2 text-sm text-slate-600">Gestiona tu inventario de vehiculos.</p>
                        </div>
                        <a href="index.php?route=autos/create" class="rounded-full bg-slate-900 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition hover:bg-slate-800">
                            Agregar auto
                        </a>
                    </div>

                    <?php if (!empty($mensaje)): ?>
                        <div class="mt-6 rounded-xl border px-4 py-3 text-sm <?= $alertClass ?>">
                            <?= htmlspecialchars((string) $mensaje) ?>
                        </div>
                    <?php endif; ?>

                    <div class="mt-6 overflow-x-auto rounded-2xl border border-slate-200/80 bg-white/80 shadow-sm">
                        <table class="min-w-full divide-y divide-slate-200 text-left text-sm">
                            <thead class="bg-slate-50/70 text-xs font-semibold uppercase tracking-widest text-slate-500">
                                <tr>
                                    <th class="px-4 py-3">Imagen</th>
                                    <th class="px-4 py-3">Marca</th>
                                    <th class="px-4 py-3">Submarca</th>
                                    <th class="px-4 py-3">Modelo</th>
                                    <th class="px-4 py-3">Color</th>
                                    <th class="px-4 py-3 text-right">Precio</th>
                                    <th class="px-4 py-3 text-right">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                <?php if (!empty($autos)): ?>
                                    <?php foreach ($autos as $row): ?>
                                        <?php
                                        $imagenes = $row['imagenes'] ?? [];
                                        $imagenPrincipal = $imagenes[0] ?? 'assets/images/small/small-2.jpg';
                                        ?>
                                        <tr class="hover:bg-slate-50/60">
                                            <td class="px-4 py-3">
                                                <?php if (!empty($imagenes)): ?>
                                                    <div class="flex -space-x-2">
                                                        <?php foreach (array_slice($imagenes, 0, 3) as $img): ?>
                                                            <img src="<?= $img ?>" alt="auto" class="h-10 w-12 rounded-lg border-2 border-white object-cover shadow-sm">
                                                        <?php endforeach; ?>
                                                    </div>
                                                <?php else: ?>
                                                    <img src="<?= $imagenPrincipal ?>" alt="auto" class="h-10 w-12 rounded-lg object-cover">
                                                <?php endif; ?>
                                            </td>
                                            <td class="px-4 py-3 font-semibold"><?= htmlspecialchars($row['marca'] ?? '') ?></td>
                                            <td class="px-4 py-3 text-slate-600"><?= htmlspecialchars($row['modelo'] ?? '') ?></td>
                                            <td class="px-4 py-3 text-slate-600"><?= $row['year'] ?? '' ?></td>
                                            <td class="px-4 py-3">
                                                <div class="flex items-center gap-2">
                                                    <span class="h-3 w-3 rounded-full border border-slate-300" style="background-color: <?= $row['color'] ?? '#ccc' ?>"></span>
                                                    <span class="text-xs text-slate-600"><?= $row['color'] ?? '' ?></span>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 text-right font-semibold">$<?= number_format((float) ($row['precio'] ?? 0), 2) ?></td>
                                            <td class="px-4 py-3">
                                                <div class="flex items-center justify-end gap-2">
                                                    <a href="index.php?route=autos/<?= $row['id_auto'] ?>/edit" class="rounded-full border border-slate-200 px-3 py-1 text-xs font-semibold uppercase tracking-widest text-slate-700 transition hover:border-slate-300 hover:bg-slate-50">
                                                        Editar
                                                    </a>
                                                    <form action="index.php?route=autos/<?= $row['id_auto'] ?>/delete" method="POST">
                                                        <button type="submit" class="rounded-full border border-rose-200 px-3 py-1 text-xs font-semibold uppercase tracking-widest text-rose-700 transition hover:border-rose-300 hover:bg-rose-50" onclick="return confirm('Estas seguro de eliminar el <?= htmlspecialchars($row['modelo'] ?? '') ?>? No se puede deshacer.');">
                                                            Eliminar
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="px-4 py-10 text-center text-sm text-slate-500">No hay autos registrados.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <?php require_once 'views/layouts/footer.php'; ?>
                </main>
            </div>
        </div>
    </div>
</body>

</html>
