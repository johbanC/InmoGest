<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Firma de quien entrega</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="signature-pad-container">
                    <h3 class="signature-pad-title">Firma de la persona que entrega</h3>
                    <div class="signature-wrapper">
                        <canvas id="signature-pad-entrega" class="signature-pad"></canvas>
                    </div>
                    <div class="signature-controls text-center mt-3">
                        <button id="clear-entrega" class="btn btn-danger waves-effect waves-light" type="button">
                            <i class="fas fa-eraser me-1"></i> Limpiar firma
                        </button>
                    </div>
                </div>
                
                <div class="mt-4">
                    <h3 class="signature-pad-title">Foto de la persona que entrega</h3>
                    <input type="file" id="photo-entrega" accept="image/*" class="form-control d-none" capture="user">
                    
                    <div class="photo-controls text-center mb-3">
                        <button id="take-photo" class="btn btn-primary waves-effect waves-light me-2">
                            <i class="fas fa-camera me-1"></i> Tomar Foto
                        </button>
                        <button id="remove-photo" class="btn btn-danger waves-effect waves-light" disabled>
                            <i class="fas fa-trash-alt me-1"></i> Eliminar Foto
                        </button>
                    </div>
                    
                    <div id="photo-preview-container" class="text-center" style="display: none;">
                        <img id="preview-entrega" class="photo-preview" src="" alt="Previsualización de la foto">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i> Cerrar
                </button>
                <button type="button" id="save-signature" class="btn btn-primary waves-effect waves-light">
                    <i class="fas fa-save me-1"></i> Guardar Firma
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    /* Estilos mejorados para el área de firma y foto */
    .signature-pad-container {
        width: 100%;
        border: 2px dashed #ccc;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
        background-color: #f9f9f9;
    }

    .signature-pad-title {
        font-weight: 600;
        margin-bottom: 15px;
        color: #495057;
        text-align: center;
    }

    .signature-wrapper {
        width: 100%;
        position: relative;
        background-color: #f5f5f5;
        border: 1px solid #dee2e6;
        border-radius: 5px;
        overflow: hidden;
    }

    .signature-pad {
        width: 100% !important;
        height: 200px;
        display: block;
        touch-action: none;
    }

    .photo-preview {
        max-width: 100%;
        max-height: 300px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .photo-controls {
        margin: 15px 0;
    }

    #photo-preview-container {
        padding: 10px;
        background-color: #f8f9fa;
        border-radius: 5px;
        margin-top: 10px;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Inicializar el canvas de firma
    var canvas = document.getElementById('signature-pad-entrega');
    var signaturePadEntrega = new SignaturePad(canvas, {
        backgroundColor: 'rgba(255, 255, 255, 1)',
        penColor: 'rgb(0, 0, 0)',
        minWidth: 1,
        maxWidth: 3,
        throttle: 16
    });

    // Elementos del DOM para la foto
    var photoInput = document.getElementById('photo-entrega');
    var takePhotoBtn = document.getElementById('take-photo');
    var removePhotoBtn = document.getElementById('remove-photo');
    var photoPreviewContainer = document.getElementById('photo-preview-container');
    var photoPreview = document.getElementById('preview-entrega');

    // Ajustar el tamaño del canvas al abrir el modal
    $('.bs-example-modal-lg').on('shown.bs.modal', function () {
        resizeCanvas();
    });

    // Ajustar el tamaño del canvas al cambiar el tamaño de la ventana
    window.addEventListener('resize', function() {
        resizeCanvas();
    });

    function resizeCanvas() {
        var ratio = Math.max(window.devicePixelRatio || 1, 1);
        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = canvas.offsetHeight * ratio;
        canvas.getContext("2d").scale(ratio, ratio);
    }

    // Botón para limpiar la firma
    var clearButtonEntrega = document.getElementById('clear-entrega');
    clearButtonEntrega.addEventListener('click', function() {
        signaturePadEntrega.clear();
    });

    // Botón para tomar foto - activa el input file
    takePhotoBtn.addEventListener('click', function() {
        photoInput.click();
    });

    // Cuando se selecciona una foto
    photoInput.addEventListener('change', function() {
        var file = photoInput.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                photoPreview.src = e.target.result;
                photoPreviewContainer.style.display = 'block';
                removePhotoBtn.disabled = false;
            };
            reader.readAsDataURL(file);
        }
    });

    // Botón para eliminar foto
    removePhotoBtn.addEventListener('click', function() {
        photoInput.value = ''; // Limpia el input file
        photoPreview.src = '';
        photoPreviewContainer.style.display = 'none';
        removePhotoBtn.disabled = true;
    });

    // Botón para guardar la firma
    document.getElementById('save-signature').addEventListener('click', function() {
        if (signaturePadEntrega.isEmpty()) {
            alert("Por favor, proporcione una firma primero.");
            return;
        }
        
        if (!photoInput.files[0]) {
            alert("Por favor, tome una foto.");
            return;
        }
        
        // Aquí puedes agregar la lógica para guardar la firma y foto
        var signatureData = signaturePadEntrega.toDataURL();
        console.log("Firma guardada:", signatureData);
        console.log("Foto:", photoInput.files[0]);
        
        // Cerrar el modal después de guardar
        $('.bs-example-modal-lg').modal('hide');
    });
});
</script>