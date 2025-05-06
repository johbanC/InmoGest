<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba de Firmas y Selfies</title>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
</head>
<body>
    <!-- Selfie de quien entrega -->
    <div>
        <label for="selfie_entrega">Selfie de quien entrega</label>
        <input type="file" id="selfie_entrega" name="selfie_entrega" accept="image/*" capture="user">
    </div>

    <!-- Firma de quien entrega -->
    <div>
        <label for="firma_entrega">Firma de quien entrega</label>
        <canvas id="firma_entrega" class="border" width="400" height="200"></canvas>
        <button type="button" id="limpiar_firma_entrega">Limpiar Firma</button>
        <input type="hidden" id="firma_entrega_input" name="firma_entrega">
    </div>

    <!-- Selfie de quien recibe -->
    <div>
        <label for="selfie_recibe">Selfie de quien recibe</label>
        <input type="file" id="selfie_recibe" name="selfie_recibe" accept="image/*" capture="user">
    </div>

    <!-- Firma de quien recibe -->
    <div>
        <label for="firma_recibe">Firma de quien recibe</label>
        <canvas id="firma_recibe" class="border" width="400" height="200"></canvas>
        <button type="button" id="limpiar_firma_recibe">Limpiar Firma</button>
        <input type="hidden" id="firma_recibe_input" name="firma_recibe">
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Firma de quien entrega -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Firma de quien entrega <strong class="required"></strong></label>
            <div class="signature-container border rounded p-2 bg-light">
                <canvas id="signature-pad-entrega" width="400" height="200" style="width: 100%; touch-action: none;"></canvas>
                <div class="buttons mt-2">
                    <button type="button" id="clear-entrega" class="btn btn-sm btn-secondary">Limpiar</button>
                    <input type="hidden" name="firma_entrega" id="firma-entrega-data">
                    <input type="hidden" name="nombre_firma_entrega" id="nombre-firma-entrega" 
                           value="entrega_{{ auth()->user()->name ?? 'invitado' }}_{{ date('YmdHis') }}">
                </div>
                @error('firma_entrega')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <!-- Firma de quien recibe -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Firma de quien recibe <strong class="required"></strong></label>
            <div class="signature-container border rounded p-2 bg-light">
                <canvas id="signature-pad-recibe" width="400" height="200" style="width: 100%; touch-action: none;"></canvas>
                <div class="buttons mt-2">
                    <button type="button" id="clear-recibe" class="btn btn-sm btn-secondary">Limpiar</button>
                    <input type="hidden" name="firma_recibe" id="firma-recibe-data">
                    <input type="hidden" name="nombre_firma_recibe" id="nombre-firma-recibe" 
                           value="recibe_{{ auth()->user()->name ?? 'invitado' }}_{{ date('YmdHis') }}">
                </div>
                @error('firma_recibe')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Configuración para las firmas
        const setupSignaturePad = (canvasId, hiddenInputId) => {
            const canvas = document.getElementById(canvasId);
            const signaturePad = new SignaturePad(canvas, {
                backgroundColor: 'rgb(255, 255, 255)',
                penColor: 'rgb(0, 0, 0)',
                minWidth: 1,
                maxWidth: 3
            });
            
            // Ajustar tamaño
            const resizeCanvas = () => {
                const ratio = Math.max(window.devicePixelRatio || 1, 1);
                canvas.width = canvas.offsetWidth * ratio;
                canvas.height = canvas.offsetHeight * ratio;
                canvas.getContext("2d").scale(ratio, ratio);
            };
            resizeCanvas();
            
            // Manejar redimensionamiento
            window.addEventListener('resize', resizeCanvas);
            
            // Botón de limpiar
            document.getElementById(`clear-${canvasId.split('-')[2]}`).addEventListener('click', () => {
                signaturePad.clear();
                document.getElementById(hiddenInputId).value = '';
                // Actualizar nombre al limpiar
                document.getElementById(`nombre-${hiddenInputId.split('-')[1]}`).value = 
                    `${canvasId.split('-')[2]}_${new Date().toISOString().replace(/[:.]/g, '-')}`;
            });
            
            return signaturePad;
        };
        
        const padEntrega = setupSignaturePad('signature-pad-entrega', 'firma-entrega-data');
        const padRecibe = setupSignaturePad('signature-pad-recibe', 'firma-recibe-data');
        
        // Manejar envío del formulario
        document.getElementById('form-horizontal').addEventListener('submit', function(e) {
            // Validar firmas
            if(padEntrega.isEmpty() || padRecibe.isEmpty()) {
                e.preventDefault();
                alert('Ambas firmas son requeridas');
                return;
            }
            
            // Asignar datos de firma
            document.getElementById('firma-entrega-data').value = padEntrega.toDataURL('image/png');
            document.getElementById('firma-recibe-data').value = padRecibe.toDataURL('image/png');
            
            // Opcional: Validación adicional
            if(!document.getElementById('firma-entrega-data').value || 
               !document.getElementById('firma-recibe-data').value) {
                e.preventDefault();
                alert('Error al procesar las firmas');
            }
        });
    });
    </script>
    @endpush

    <script>
        window.addEventListener('load', () => {
            // Inicializar Signature Pad para la firma de quien entrega
            const canvasEntrega = document.getElementById('firma_entrega');
            if (canvasEntrega) {
                const signaturePadEntrega = new SignaturePad(canvasEntrega);
                document.getElementById('limpiar_firma_entrega').addEventListener('click', () => {
                    signaturePadEntrega.clear();
                });
                canvasEntrega.addEventListener('mouseup', () => {
                    document.getElementById('firma_entrega_input').value = signaturePadEntrega.toDataURL();
                });
            }

            // Inicializar Signature Pad para la firma de quien recibe
            const canvasRecibe = document.getElementById('firma_recibe');
            if (canvasRecibe) {
                const signaturePadRecibe = new SignaturePad(canvasRecibe);
                document.getElementById('limpiar_firma_recibe').addEventListener('click', () => {
                    signaturePadRecibe.clear();
                });
                canvasRecibe.addEventListener('mouseup', () => {
                    document.getElementById('firma_recibe_input').value = signaturePadRecibe.toDataURL();
                });
            }
        });
    </script>
</body>
</html>