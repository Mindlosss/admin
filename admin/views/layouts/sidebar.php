<?php
$vista_actual = isset($_GET['route']) ? trim((string) $_GET['route']) : 'dashboard';
$esAutos = strpos($vista_actual, 'autos') === 0;
$esMarcas = strpos($vista_actual, 'brands') === 0;
$nombreUsuario = $_SESSION['usuario_nombre'] ?? 'Administrador';
?>

<aside class="hidden min-h-screen lg:flex lg:w-64 lg:flex-col lg:border-r lg:border-slate-900/10 lg:bg-slate-950 lg:text-slate-100">
    <div class="flex h-16 items-center gap-3 px-6">
        <img src="assets/images/logo.png" alt="Autos C&C" class="h-7 w-auto">
        <div class="text-sm font-semibold uppercase tracking-[0.2em] text-slate-200">Autos C&amp;C</div>
    </div>

    <div class="flex-1 px-4 pb-6">
        <p class="text-xs font-semibold uppercase tracking-widest text-slate-400">Navegacion</p>
        <nav class="mt-4 space-y-1">
            <?php
            $nav = [
                ['label' => 'Dashboard', 'route' => 'dashboard', 'active' => $vista_actual === 'dashboard' || $vista_actual === ''],
                ['label' => 'Autos', 'route' => 'autos', 'active' => $esAutos],
                ['label' => 'Marcas', 'route' => 'brands', 'active' => $esMarcas],
            ];
            ?>
            <?php foreach ($nav as $item): ?>
                <?php
                $linkClass = $item['active']
                    ? 'bg-white/10 text-white shadow-inner shadow-white/5'
                    : 'text-slate-300 hover:bg-white/5 hover:text-white';
                ?>
                <a href="index.php?route=<?= $item['route'] ?>" class="flex items-center justify-between rounded-xl px-3 py-2 text-sm font-medium transition <?= $linkClass ?>">
                    <span><?= $item['label'] ?></span>
                    <?php if ($item['active']): ?>
                        <span class="text-[11px] font-semibold uppercase tracking-widest text-amber-200">Activo</span>
                    <?php endif; ?>
                </a>
            <?php endforeach; ?>
        </nav>

        
    </div>
</aside>
