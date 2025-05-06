<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba de Firmas y Selfies</title>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
    <style>
        canvas {
            touch-action: none; /* Desactiva el comportamiento táctil predeterminado (scroll/zoom) */
        }
    </style>
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="text-center mb-4">Prueba de Firmas y Selfies</h1>

        <!-- Selfie de quien entrega -->
        <div class="mb-4">
            <label for="selfie_entrega" class="form-label">Selfie de quien entrega</label>
            <input type="file" id="selfie_entrega" name="selfie_entrega" accept="image/*" capture="user" class="form-control">
        </div>

        <!-- Firma de quien entrega -->
        <div class="mb-4">
            <label for="firma_entrega" class="form-label">Firma de quien entrega</label>
            <canvas id="firma_entrega" class="border border-secondary rounded" width="400" height="200"></canvas>
            <button type="button" id="limpiar_firma_entrega" class="btn btn-danger mt-2">Limpiar Firma</button>
            <input type="hidden" id="firma_entrega_input" name="firma_entrega">
        </div>

        <!-- Selfie de quien recibe -->
        <div class="mb-4">
            <label for="selfie_recibe" class="form-label">Selfie de quien recibe</label>
            <input type="file" id="selfie_recibe" name="selfie_recibe" accept="image/*" capture="user" class="form-control">
        </div>

        <!-- Firma de quien recibe -->
        <div class="mb-4">
            <label for="firma_recibe" class="form-label">Firma de quien recibe</label>
            <canvas id="firma_recibe" class="border border-secondary rounded" width="400" height="200"></canvas>
            <button type="button" id="limpiar_firma_recibe" class="btn btn-danger mt-2">Limpiar Firma</button>
            <input type="hidden" id="firma_recibe_input" name="firma_recibe">
        </div>
    </div>

    <script>
        window.addEventListener('load', () => {
            // Función para inicializar SignaturePad con soporte táctil y redimensionamiento
            const initializeSignaturePad = (canvasId, clearButtonId, hiddenInputId) => {
                const canvas = document.getElementById(canvasId);
                const signaturePad = new SignaturePad(canvas);

                // Ajustar tamaño del canvas para dispositivos móviles
                const resizeCanvas = () => {
                    const ratio = Math.max(window.devicePixelRatio || 1, 1);
                    canvas.width = canvas.offsetWidth * ratio;
                    canvas.height = canvas.offsetHeight * ratio;
                    canvas.getContext('2d').scale(ratio, ratio);
                };
                resizeCanvas();

                // Redimensionar el canvas al cambiar el tamaño de la ventana
                window.addEventListener('resize', resizeCanvas);

                // Limpiar la firma
                document.getElementById(clearButtonId).addEventListener('click', () => {
                    signaturePad.clear();
                    document.getElementById(hiddenInputId).value = '';
                });

                // Guardar la firma en formato Base64 al soltar el lápiz o el dedo
                canvas.addEventListener('mouseup', () => {
                    document.getElementById(hiddenInputId).value = signaturePad.toDataURL();
                });
                canvas.addEventListener('touchend', () => {
                    document.getElementById(hiddenInputId).value = signaturePad.toDataURL();
                });

                return signaturePad;
            };

            // Inicializar SignaturePad para la firma de quien entrega
            initializeSignaturePad('firma_entrega', 'limpiar_firma_entrega', 'firma_entrega_input');

            // Inicializar SignaturePad para la firma de quien recibe
            initializeSignaturePad('firma_recibe', 'limpiar_firma_recibe', 'firma_recibe_input');
        });
    </script>
</body>
</html>