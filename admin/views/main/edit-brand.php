<?php
$mensaje = $mensaje ?? '';
$tipo_mensaje = $tipo_mensaje ?? 'info';
$marca = $marca ?? [];
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
    <title>Editar marca</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Edicion de marcas">
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
    <div class="min-h-screen bg-[radial-gradient(1200px_circle_at_top,_rgba(14,116,144,0.12),_transparent)]">
        <div class="lg:flex">
            <?php require_once 'views/layouts/sidebar.php'; ?>
            <div class="flex-1">
                <?php require_once 'views/layouts/topbar.php'; ?>

                <main class="mx-auto w-full max-w-6xl px-4 pb-12 pt-6 lg:px-8">
                    <div class="fade-up">
                        <h1 class="text-2xl font-semibold tracking-tight">Editar marca</h1>
                        <p class="mt-2 text-sm text-slate-600">Actualiza el nombre o el logo. Si no adjuntas uno nuevo se conserva el actual.</p>
                    </div>

                    <?php if (!empty($mensaje)): ?>
                        <div class="mt-6 rounded-xl border px-4 py-3 text-sm <?= $alertClass ?>">
                            <?= htmlspecialchars((string) $mensaje) ?>
                        </div>
                    <?php endif; ?>

                    <div class="mt-6 rounded-2xl border border-slate-200/80 bg-white/80 p-6 shadow-sm">
                        <form method="POST" action="index.php?route=brands/<?= $marca['id_marca'] ?>/update" enctype="multipart/form-data" class="space-y-6">
                            <div class="grid gap-4 md:grid-cols-2">
                                <div>
                                    <label for="nombre" class="text-xs font-semibold uppercase tracking-widest text-slate-500">Nombre de la marca</label>
                                    <input type="text" id="nombre" name="nombre" class="mt-2 w-full rounded-xl border border-slate-200 bg-white/70 px-4 py-3 text-sm shadow-sm outline-none transition focus:border-sky-400 focus:ring-4 focus:ring-sky-100" value="<?= htmlspecialchars($marca['nombre'] ?? '') ?>" required>
                                </div>
                            </div>

                            <div>
                                <label class="text-xs font-semibold uppercase tracking-widest text-slate-500">Logo de la marca (opcional)</label>
                                <div id="dropZoneLogo" class="mt-3 flex flex-col items-center justify-center gap-2 rounded-2xl border-2 border-dashed border-slate-300 bg-white/70 px-6 py-8 text-center transition">
                                    <p class="text-sm font-semibold text-slate-700">Arrastra la imagen aqui</p>
                                    <p class="text-xs text-slate-500">o selecciona un archivo JPG o PNG</p>
                                    <input type="file" id="logo" name="logo" accept=".jpg,.jpeg,.png" class="hidden">
                                    <button type="button" class="mt-2 rounded-full border border-slate-200 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-slate-700 transition hover:border-slate-300 hover:bg-slate-50" onclick="document.getElementById('logo').click()">
                                        Seleccionar logo
                                    </button>
                                </div>
                                <div id="logoPreviewContainer" class="mt-4"></div>
                            </div>

                            <div class="flex flex-wrap gap-3">
                                <button type="submit" class="rounded-full bg-slate-900 px-5 py-2 text-xs font-semibold uppercase tracking-widest text-white transition hover:bg-slate-800">
                                    Guardar cambios
                                </button>
                                <a class="rounded-full border border-slate-200 px-5 py-2 text-xs font-semibold uppercase tracking-widest text-slate-700 transition hover:border-slate-300 hover:bg-slate-50" href="index.php?route=brands">
                                    Volver
                                </a>
                            </div>
                        </form>
                    </div>

                    <?php require_once 'views/layouts/footer.php'; ?>
                </main>
            </div>
        </div>
    </div>

    <script>
        const dropZoneLogo = document.getElementById('dropZoneLogo');
        const logoInput = document.getElementById('logo');
        const logoPreviewContainer = document.getElementById('logoPreviewContainer');
        const existingLogoUrl = "<?= htmlspecialchars($marca['imagen'] ?? '', ENT_QUOTES) ?>";
        let uploadedLogo = null;

        function setDropZoneState(active) {
            if (active) {
                dropZoneLogo.classList.add('border-sky-400', 'bg-sky-50', 'ring-2', 'ring-sky-200');
            } else {
                dropZoneLogo.classList.remove('border-sky-400', 'bg-sky-50', 'ring-2', 'ring-sky-200');
            }
        }

        if (existingLogoUrl) {
            uploadedLogo = { src: existingLogoUrl, name: 'Logo actual', file: null, size: null, existing: true };
        }
        renderLogo();

        dropZoneLogo.addEventListener('dragover', (event) => {
            event.preventDefault();
            setDropZoneState(true);
        });

        dropZoneLogo.addEventListener('dragleave', () => {
            setDropZoneState(false);
        });

        dropZoneLogo.addEventListener('drop', (event) => {
            event.preventDefault();
            setDropZoneState(false);
            handleLogoFile(event.dataTransfer.files);
        });

        logoInput.addEventListener('change', (event) => {
            if (event.target.files.length > 0) {
                handleLogoFile(event.target.files);
            }
        });

        function handleLogoFile(files) {
            const allowedFormats = ['image/jpeg', 'image/png'];
            if (files.length === 0) return;

            const file = files[0];
            if (allowedFormats.includes(file.type)) {
                const reader = new FileReader();
                reader.onload = (event) => {
                    uploadedLogo = {
                        src: event.target.result,
                        name: file.name,
                        size: file.size,
                        file: file
                    };
                    renderLogo();
                    updateLogoInput();
                };
                reader.readAsDataURL(file);
            } else {
                alert(`Formato no permitido: ${file.name}. Usa JPG o PNG.`);
                logoInput.value = '';
                uploadedLogo = existingLogoUrl ? { src: existingLogoUrl, name: 'Logo actual', file: null, size: null, existing: true } : null;
                renderLogo();
            }
        }

        function updateLogoInput() {
            const dataTransfer = new DataTransfer();
            if (uploadedLogo && uploadedLogo.file) {
                dataTransfer.items.add(uploadedLogo.file);
                logoInput.files = dataTransfer.files;
            } else {
                logoInput.value = '';
            }
        }

        function renderLogo() {
            logoPreviewContainer.innerHTML = '';

            if (!uploadedLogo) {
                logoPreviewContainer.innerHTML = '<div class="rounded-2xl border border-dashed border-slate-200 bg-white/70 p-6 text-center text-sm text-slate-500">No hay logo cargado.</div>';
                return;
            }

            const wrapper = document.createElement('div');
            wrapper.className = 'group relative mx-auto max-w-xs overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm';

            const img = document.createElement('img');
            img.src = uploadedLogo.src;
            img.alt = uploadedLogo.name;
            img.className = 'h-48 w-full object-contain bg-slate-50 p-4';

            if (uploadedLogo.existing) {
                const badge = document.createElement('div');
                badge.className = 'absolute left-3 top-3 rounded-full bg-slate-900 px-2 py-1 text-[10px] font-semibold uppercase tracking-widest text-white';
                badge.textContent = 'Actual';
                wrapper.appendChild(badge);
            }

            const overlay = document.createElement('div');
            overlay.className = 'absolute inset-0 flex items-center justify-center gap-2 bg-slate-900/60 opacity-0 transition group-hover:opacity-100';

            const changeBtn = document.createElement('button');
            changeBtn.type = 'button';
            changeBtn.className = 'rounded-full bg-white/90 px-3 py-1 text-xs font-semibold uppercase tracking-widest text-slate-800 shadow';
            changeBtn.textContent = 'Cambiar';
            changeBtn.onclick = () => {
                logoInput.click();
            };

            const deleteBtn = document.createElement('button');
            deleteBtn.type = 'button';
            deleteBtn.className = 'rounded-full bg-rose-500/90 px-3 py-1 text-xs font-semibold uppercase tracking-widest text-white shadow';
            deleteBtn.textContent = 'Eliminar';
            deleteBtn.onclick = () => {
                uploadedLogo = null;
                updateLogoInput();
                renderLogo();
            };

            overlay.appendChild(changeBtn);
            overlay.appendChild(deleteBtn);

            const meta = document.createElement('div');
            meta.className = 'flex items-center justify-between gap-2 border-t border-slate-100 px-4 py-2 text-xs text-slate-600';
            const sizeLabel = uploadedLogo.size ? formatFileSize(uploadedLogo.size) : (uploadedLogo.existing ? 'Actual' : '');
            meta.innerHTML = `<span class="truncate" title="${uploadedLogo.name}">${uploadedLogo.name}</span><span>${sizeLabel}</span>`;

            wrapper.appendChild(img);
            wrapper.appendChild(overlay);
            wrapper.appendChild(meta);
            logoPreviewContainer.appendChild(wrapper);
        }

        function formatFileSize(bytes) {
            if (!bytes) return '';
            const units = ['B', 'KB', 'MB', 'GB'];
            let size = bytes;
            let unitIndex = 0;
            while (size >= 1024 && unitIndex < units.length - 1) {
                size /= 1024;
                unitIndex++;
            }
            return `${size.toFixed(unitIndex === 0 ? 0 : 1)} ${units[unitIndex]}`;
        }
    </script>
</body>

</html>
