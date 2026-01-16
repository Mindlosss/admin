<?php
$vista_actual = isset($_GET['route']) ? trim((string) $_GET['route']) : 'dashboard';
$nombreUsuario = $_SESSION['usuario_nombre'] ?? 'Administrador';
?>

<header class="sticky top-0 z-30 border-b border-slate-200/80 bg-white/80 backdrop-blur">
    <div class="mx-auto flex h-16 w-full max-w-6xl items-center justify-between px-4 lg:px-8">
        <div class="flex items-center gap-3 lg:hidden">
            <img src="assets/images/logo.png" alt="Autos C&C" class="h-7 w-auto">
            <div class="text-sm font-semibold uppercase tracking-[0.2em] text-slate-700">Autos C&amp;C</div>
        </div>

        <div class="hidden items-center gap-3 text-xs font-semibold uppercase tracking-widest text-slate-500 lg:flex">
            <!-- <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
            Panel activo -->
        </div>

        <div class="flex items-center gap-3">
            <div class="rounded-full bg-slate-900 px-3 py-1 text-xs font-semibold text-white">
                <?= htmlspecialchars($nombreUsuario) ?>
            </div>
            <a href="index.php?route=logout" class="rounded-full border border-slate-200 px-3 py-1 text-xs font-semibold uppercase tracking-widest text-slate-700 transition hover:border-slate-300 hover:bg-slate-50">
                Salir
            </a>
        </div>
    </div>

    <nav class="border-t border-slate-200/70 bg-white/70 lg:hidden">
        <div class="mx-auto grid w-full max-w-6xl grid-cols-3 gap-2 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-slate-600">
            <a href="index.php?route=dashboard" class="rounded-lg px-2 py-2 text-center <?= $vista_actual === 'dashboard' ? 'bg-slate-900 text-white' : 'hover:bg-slate-100' ?>">
                Dashboard
            </a>
            <a href="index.php?route=autos" class="rounded-lg px-2 py-2 text-center <?= strpos($vista_actual, 'autos') === 0 ? 'bg-slate-900 text-white' : 'hover:bg-slate-100' ?>">
                Autos
            </a>
            <a href="index.php?route=brands" class="rounded-lg px-2 py-2 text-center <?= strpos($vista_actual, 'brands') === 0 ? 'bg-slate-900 text-white' : 'hover:bg-slate-100' ?>">
                Marcas
            </a>
        </div>
    </nav>
</header>
