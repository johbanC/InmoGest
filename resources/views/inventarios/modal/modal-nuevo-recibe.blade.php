<div class="modal fade bs-example-modal-lg-recibe" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="formularioFirmaDigital_recibe" method="POST" action="{{ route('firmadigital.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="documentable_type" value="App\Models\Inventario">
            <input type="hidden" name="documentable_id" value="{{ $inventario->id }}">
            <input type="hidden" name="codigo" value="{{ $inventario->codigo }}">
            <input type="hidden" name="rol_firmante" value="recibe">
            <input type="hidden" name="nombre_firmante" value="johban clavijo">
            <input type="hidden" name="tipo_documento_firmante" value="CC">
            <input type="hidden" name="numero_documento_firmante" value="123456789">
            <input type="hidden" name="consentimiento" value="1" checked>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Firma de quien recibe</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="signature-pad-container">
                        <h3 class="signature-pad-title">Firma de la persona que recibe</h3>
                        <div class="signature-wrapper">
                            <canvas id="signature-pad-recibe" class="signature-pad"></canvas>
                            <input type="hidden" name="firma_digital_path" id="firma_recibe">
                        </div>
                        <div class="signature-controls text-center mt-3">
                            <button id="clear-recibe" class="btn btn-danger" type="button">Limpiar firma</button>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h3 class="signature-pad-title">Foto de la persona que recibe</h3>
                        <input type="file" id="foto_firmante_recibe" name="foto_firmante" accept="image/*" class="form-control d-none" capture="user">
                        <div class="photo-controls text-center mb-3">
                            <a href="#" id="take-photo_recibe" class="btn btn-primary">Tomar Foto</a>
                            <button id="remove-photo_recibe" class="btn btn-danger" disabled>Eliminar Foto</button>
                        </div>
                        <div id="photo-preview-container-recibe" class="text-center" style="display: none;">
                            <img id="preview-recibe" class="photo-preview" src="" alt="Previsualización de la foto">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary save-signature" data-target="recibe">Guardar Firma</button>
                </div>
            </div>
        </form>
    </div>
</div>