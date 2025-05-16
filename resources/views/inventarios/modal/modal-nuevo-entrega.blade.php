<div class="modal fade bs-example-modal-lg-entrega" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="formularioFirmaDigital_entrega" method="POST" action="{{ route('firmadigital.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="documentable_type" value="App\Models\Inventario">
            <input type="hidden" name="documentable_id" value="{{ $inventario->id }}">
            <input type="hidden" name="codigo" value="{{ $inventario->codigo }}">
            <input type="hidden" name="rol_firmante" value="entrega">
            <input type="hidden" name="nombre_firmante" value="Stiven Luna">
            <input type="hidden" name="tipo_documento_firmante" value="CC">
            <input type="hidden" name="numero_documento_firmante" value="1127352358">
            <input type="checkbox" name="consentimiento" value="1" checked>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Firma de quien entrega</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="signature-pad-container">
                        <h3 class="signature-pad-title">Firma de la persona que entrega</h3>
                        <div class="signature-wrapper">
                            <canvas id="signature-pad-entrega" class="signature-pad"></canvas>
                            <input type="hidden" name="firma_digital_path" id="firma_entrega">
                        </div>
                        <div class="signature-controls text-center mt-3">
                            <button id="clear-entrega" class="btn btn-danger" type="button">Limpiar firma</button>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h3 class="signature-pad-title">Foto de la persona que entrega</h3>
                        <input type="file" id="foto_firmante_entrega" name="foto_firmante" accept="image/*" class="form-control d-none" capture="user">
                        <div class="photo-controls text-center mb-3">
                            <a href="#" id="take-photo_entrega" class="btn btn-primary">Tomar Foto</a>
                            <button id="remove-photo_entrega" class="btn btn-danger" disabled>Eliminar Foto</button>
                        </div>
                        <div id="photo-preview-container-entrega" class="text-center" style="display: none;">
                            <img id="preview-entrega" class="photo-preview" src="" alt="Previsualización de la foto">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary save-signature" data-target="entrega">Guardar Firma</button>
                </div>
            </div>
        </form>
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
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
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