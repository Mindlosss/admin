<?php
$mensaje = $mensaje ?? null;
$error = $error ?? null;
$alertStyles = [
    'success' => 'border-emerald-200 bg-emerald-50 text-emerald-900',
    'danger' => 'border-rose-200 bg-rose-50 text-rose-900',
    'warning' => 'border-amber-200 bg-amber-50 text-amber-900',
    'info' => 'border-sky-200 bg-sky-50 text-sky-900',
];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Login Autos C&C</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Acceso al panel de administracion de Autos C&C">
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
    <div class="relative min-h-screen overflow-hidden">
        <div class="pointer-events-none absolute inset-0">
            <div class="absolute -top-24 right-10 h-72 w-72 rounded-full bg-amber-200/40 blur-3xl"></div>
            <div class="absolute bottom-10 left-10 h-72 w-72 rounded-full bg-sky-200/40 blur-3xl"></div>
        </div>

        <main class="relative z-10 flex min-h-screen items-center justify-center px-4 py-12">
            <div class="w-full max-w-md">
                <div class="fade-up rounded-3xl border border-slate-200/80 bg-white/80 p-8 shadow-xl backdrop-blur">
                    <div class="flex items-center gap-3">
                        <img src="assets/images/logo.png" alt="Autos C&C" class="h-8 w-auto">
                        <div class="text-xs font-semibold uppercase tracking-[0.35em] text-slate-500">Panel</div>
                    </div>

                    <h1 class="mt-6 text-2xl font-semibold tracking-tight">Inicia sesion</h1>
                    <p class="mt-2 text-sm text-slate-600">Accede con tu correo y contrasena para administrar el inventario.</p>

                    <form action="index.php?route=login" method="POST" class="mt-6 space-y-4">
                        <?php if ($mensaje): ?>
                            <div class="rounded-xl border px-4 py-3 text-sm <?= $alertStyles['success'] ?>">
                                <?= htmlspecialchars((string) $mensaje) ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($error): ?>
                            <div class="rounded-xl border px-4 py-3 text-sm <?= $alertStyles['danger'] ?>">
                                <?= htmlspecialchars((string) $error) ?>
                            </div>
                        <?php endif; ?>

                        <div>
                            <label for="email" class="text-xs font-semibold uppercase tracking-widest text-slate-500">Correo</label>
                            <input type="email" id="email" name="correo" class="mt-2 w-full rounded-xl border border-slate-200 bg-white/70 px-4 py-3 text-sm shadow-sm outline-none transition focus:border-sky-400 focus:ring-4 focus:ring-sky-100" placeholder="correo@dominio.com" required>
                        </div>

                        <div>
                            <label for="password" class="text-xs font-semibold uppercase tracking-widest text-slate-500">Contrasena</label>
                            <input type="password" id="password" name="password" class="mt-2 w-full rounded-xl border border-slate-200 bg-white/70 px-4 py-3 text-sm shadow-sm outline-none transition focus:border-sky-400 focus:ring-4 focus:ring-sky-100" placeholder="••••••••" required>
                        </div>

                        <div class="flex items-center justify-between text-sm text-slate-600">
                            <label class="flex items-center gap-2">
                                <input type="checkbox" class="h-4 w-4 rounded border-slate-300 text-sky-500 focus:ring-sky-400">
                                Recuerdame
                            </label>
                        </div>

                        <button type="submit" class="w-full rounded-xl bg-slate-900 px-4 py-3 text-sm font-semibold uppercase tracking-widest text-white transition hover:bg-slate-800">
                            Entrar
                        </button>
                    </form>
                </div>

                <p class="mt-6 text-center text-xs text-slate-500">
                    &copy; <?= date('Y') ?> AC Codigo y Chips
                </p>
            </div>
        </main>
    </div>
</body>

</html>
