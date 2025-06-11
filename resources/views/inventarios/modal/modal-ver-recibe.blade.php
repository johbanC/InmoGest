<div class="modal fade bs-example-modal-lg-ver-recibe" tabindex="-1" role="dialog" aria-labelledby="modalVerFirmaRecibe" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="modalVerFirmaRecibe">Información de quien recibe</h5>                
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <div class="modal-body">

                {{-- Sección de la firma digital --}}
                <div class="signature-pad-container">
                    <h5 class="signature-pad-title">Firma realizada de forma: {{ $firmaRecibe->ubicacion }}</h5>
                    <h3 class="signature-pad-title">Firma de la persona que recibe</h3>

                    @if ($firmaRecibe && $firmaRecibe->firma_digital_path)
                        <div class="text-center mb-3">
                            <img src="{{ asset('storage/' . $firmaRecibe->firma_digital_path) }}" 
                                 alt="Firma digital de quien recibe" 
                                 class="img-fluid border rounded shadow-sm" />
                        </div>
                    @else
                        <p class="text-muted text-center">No hay firma digital registrada.</p>
                    @endif
                </div>

                {{-- Sección de la foto del firmante --}}
                <div class="mt-4">
                    <h3 class="signature-pad-title">Foto de la persona que recibe</h3>

                    @if ($firmaRecibe && $firmaRecibe->foto_firmante_path)
                        <div class="text-center mb-3">
                            <img src="{{ asset('storage/' . $firmaRecibe->foto_firmante_path) }}" 
                                 id="preview-recibe-ver" 
                                 alt="Foto de quien recibe" 
                                 class="photo-preview" />
                        </div>
                    @else
                        <p class="text-muted text-center">No hay foto registrada.</p>
                    @endif
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>

