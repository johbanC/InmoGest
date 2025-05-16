<div class="modal fade bs-example-modal-lg-ver-entrega" tabindex="-1" role="dialog" aria-labelledby="modalVerFirmaEntrega" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="modalVerFirmaEntrega">Información de quien entrega</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <div class="modal-body">

                {{-- Sección de la firma digital --}}
                <div class="signature-pad-container">
                    <h3 class="signature-pad-title">Firma de la persona que entrega</h3>

                    @if ($firmaEntrega && $firmaEntrega->firma_digital_path)
                        <div class="text-center mb-3">
                            <img src="{{ asset('storage/' . $firmaEntrega->firma_digital_path) }}" 
                                 alt="Firma digital de quien entrega" 
                                 class="img-fluid border rounded shadow-sm" />
                        </div>
                    @else
                        <p class="text-muted text-center">No hay firma digital registrada.</p>
                    @endif
                </div>

                {{-- Sección de la foto del firmante --}}
                <div class="mt-4">
                    <h3 class="signature-pad-title">Foto de la persona que entrega</h3>

                    @if ($firmaEntrega && $firmaEntrega->foto_firmante_path)
                        <div class="text-center mb-3">
                            <img src="{{ asset('storage/' . $firmaEntrega->foto_firmante_path) }}" 
                                 id="preview-entrega-ver" 
                                 alt="Foto de quien entrega" 
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

