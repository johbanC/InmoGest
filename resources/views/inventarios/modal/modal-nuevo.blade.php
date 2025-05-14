<style>
    /* Estilos para las áreas de firma */
    .signature-pad-container {
        border: 2px dashed #ccc;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 15px;
        background-color: #f8f8f8;
    }

    .signature-pad {
        background-color: #f5f5f5;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .signature-pad-title {
        font-weight: bold;
        margin-bottom: 5px;
        color: #555;
    }

    .wrapper{
        text-align: center
    }
</style>


<!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="formularioTipococina" method="POST" action="{{ route('tipococinas.store') }}">
            @csrf

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar nueva tipo de Cocina </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="wrapper">
                            <h3>Firma de la persona que entrega</h3>
                            <canvas id="signature-pad-entrega" class="signature-pad" width="750"
                                height="200"></canvas>
                                <br>
                            <button id="clear-entrega" class="btn btn-danger waves-effect waves-light"
                                type="button">Limpiar firma</button>
                            <h3>Foto de la persona que entrega</h3>
                            <input type="file" id="photo-entrega" accept="image/*" class="form-control"
                                capture="user">
                            <img id="preview-entrega" src="" alt="Previsualización de la foto de quien entrega"
                                style="display: none; margin-top: 10px; max-width: 100%; border: 1px solid #ddd; border-radius: 5px;">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="botonGuardar"
                        class="btn btn-success waves-effect waves-light">Guardar</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal"
                        aria-label="Close">Cerrar</button>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<script>
    // Initialize the signature pad for "persona que entrega"
    var signaturePadEntrega = new SignaturePad(document.getElementById('signature-pad-entrega'), {
        backgroundColor: 'rgba(245, 245, 245, 1)', // Fondo gris claro
        penColor: 'rgb(0, 0, 0)'
    });

    // Clear button for "persona que entrega"
    var clearButtonEntrega = document.getElementById('clear-entrega');
    clearButtonEntrega.addEventListener('click', function() {
        console.log('Botón "Limpiar firma" presionado para persona que entrega');
        signaturePadEntrega.clear();
    });

    // File input for "persona que entrega"
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
</script>
