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
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Resumen general del inventario">
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
    <div class="min-h-screen bg-[radial-gradient(1200px_circle_at_top,_rgba(14,165,233,0.14),_transparent)]">
        <div class="lg:flex">
            <?php require_once 'views/layouts/sidebar.php'; ?>
            <div class="flex-1">
                <?php require_once 'views/layouts/topbar.php'; ?>

                <main class="mx-auto w-full max-w-6xl px-4 pb-12 pt-6 lg:px-8">
                    <div class="fade-up">
                        <h1 class="text-2xl font-semibold tracking-tight">Dashboard</h1>
                        <p class="mt-2 text-sm text-slate-600">Resumen general del inventario.</p>
                    </div>

                    <?php if (!empty($mensaje)): ?>
                        <div class="mt-6 rounded-xl border px-4 py-3 text-sm <?= $alertClass ?>">
                            <?= htmlspecialchars((string) $mensaje) ?>
                        </div>
                    <?php endif; ?>

                    <div class="mt-6 grid gap-4 md:grid-cols-3">
                        <div class="fade-up rounded-2xl border border-slate-200/80 bg-white/80 p-5 shadow-sm" style="animation-delay: 60ms;">
                            <p class="text-xs font-semibold uppercase tracking-widest text-slate-500">Coches</p>
                            <div class="mt-3 text-3xl font-semibold"><?= $totales['autos'] ?? 0 ?></div>
                            <p class="mt-1 text-xs text-slate-500">Autos registrados</p>
                        </div>
                        <div class="fade-up rounded-2xl border border-slate-200/80 bg-white/80 p-5 shadow-sm" style="animation-delay: 120ms;">
                            <p class="text-xs font-semibold uppercase tracking-widest text-slate-500">Marcas</p>
                            <div class="mt-3 text-3xl font-semibold"><?= $totales['marcas'] ?? 0 ?></div>
                            <p class="mt-1 text-xs text-slate-500">Marcas activas</p>
                        </div>
                        <div class="fade-up rounded-2xl border border-slate-200/80 bg-white/80 p-5 shadow-sm" style="animation-delay: 180ms;">
                            <p class="text-xs font-semibold uppercase tracking-widest text-slate-500">Valor inventario</p>
                            <div class="mt-3 text-3xl font-semibold">$<?= number_format((float) ($totales['valor'] ?? 0), 2) ?></div>
                            <p class="mt-1 text-xs text-slate-500">Estimado total</p>
                        </div>
                    </div>

                    <div class="mt-10">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-lg font-semibold">Autos recientes</h2>
                                <p class="mt-1 text-sm text-slate-600">Ultimos autos ingresados al inventario.</p>
                            </div>
                            <a href="index.php?route=autos" class="rounded-full border border-slate-200 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-slate-700 transition hover:border-slate-300 hover:bg-slate-50">
                                Ver todos
                            </a>
                        </div>

                        <div class="mt-4 overflow-x-auto rounded-2xl border border-slate-200/80 bg-white/80 shadow-sm">
                            <table class="min-w-full divide-y divide-slate-200 text-left text-sm">
                                <thead class="bg-slate-50/70 text-xs font-semibold uppercase tracking-widest text-slate-500">
                                    <tr>
                                        <th class="px-4 py-3">Imagen</th>
                                        <th class="px-4 py-3">Marca / Submarca</th>
                                        <th class="px-4 py-3">Modelo</th>
                                        <th class="px-4 py-3">Color</th>
                                        <th class="px-4 py-3 text-right">Precio</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100">
                                    <?php if (!empty($autosRecientes)): ?>
                                        <?php foreach ($autosRecientes as $auto): ?>
                                            <?php $imagenUrl = !empty($auto['imagen']) ? $auto['imagen'] : 'assets/images/small/small-2.jpg'; ?>
                                            <tr class="hover:bg-slate-50/60">
                                                <td class="px-4 py-3">
                                                    <img src="<?= $imagenUrl ?>" class="h-12 w-16 rounded-lg object-cover" alt="auto">
                                                </td>
                                                <td class="px-4 py-3">
                                                    <div class="font-semibold"><?= htmlspecialchars($auto['marca'] ?? '') ?></div>
                                                    <div class="text-xs text-slate-500"><?= htmlspecialchars($auto['modelo'] ?? '') ?></div>
                                                </td>
                                                <td class="px-4 py-3 text-slate-700"><?= $auto['year'] ?? '' ?></td>
                                                <td class="px-4 py-3">
                                                    <div class="flex items-center gap-2">
                                                        <span class="h-3 w-3 rounded-full border border-slate-300" style="background-color: <?= $auto['color'] ?? '#ccc' ?>"></span>
                                                        <span class="text-xs text-slate-600"><?= $auto['color'] ?? '' ?></span>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 text-right font-semibold">$<?= number_format((float) ($auto['precio'] ?? 0), 2) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="px-4 py-8 text-center text-sm text-slate-500">No hay autos registrados.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <?php require_once 'views/layouts/footer.php'; ?>
                </main>
            </div>
        </div>
    </div>
</body>

</html>
