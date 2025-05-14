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
                            Limpiar firma
                        </button>
                    </div>
                </div>
                
                <div class="mt-4">
                    <h3 class="signature-pad-title">Foto de la persona que entrega</h3>
                    <input type="file" id="photo-entrega" accept="image/*" class="form-control" capture="user">
                    <img id="preview-entrega" class="photo-preview mt-3" src="" alt="Previsualización de la foto">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="save-signature" class="btn btn-primary waves-effect waves-light">Guardar Firma</button>
            </div>
        </div>
    </div>
</div>

<style>
    /* Estilos para el área de firma */
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
    }

    .photo-preview {
        display: none;
        max-width: 100%;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        margin: 0 auto;
    }

    .signature-controls {
        margin-top: 15px;
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
        signaturePadEntrega.clear(); // Limpiar al redimensionar
    }

    // Botón para limpiar la firma
    var clearButtonEntrega = document.getElementById('clear-entrega');
    clearButtonEntrega.addEventListener('click', function() {
        signaturePadEntrega.clear();
    });

    // Manejo de la foto
    var photoEntrega = document.getElementById('photo-entrega');
    var previewEntrega = document.getElementById('preview-entrega');
    photoEntrega.addEventListener('change', function() {
        var file = photoEntrega.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                previewEntrega.src = e.target.result;
                previewEntrega.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            previewEntrega.src = '';
            previewEntrega.style.display = 'none';
        }
    });

    // Botón para guardar la firma
    document.getElementById('save-signature').addEventListener('click', function() {
        if (signaturePadEntrega.isEmpty()) {
            alert("Por favor, proporcione una firma primero.");
            return;
        }
        
        // Aquí puedes agregar la lógica para guardar la firma
        var dataURL = signaturePadEntrega.toDataURL();
        console.log("Firma guardada:", dataURL);
        
        // Cerrar el modal después de guardar
        $('.bs-example-modal-lg').modal('hide');
    });
});
</script>