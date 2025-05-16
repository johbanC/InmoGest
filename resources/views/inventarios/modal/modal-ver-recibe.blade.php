<div class="modal fade bs-example-modal-lg-ver-recibe" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Firma de quien recibe</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <div class="signature-pad-container">
                    <h3 class="signature-pad-title">Firma de la persona que recibe</h3>

                    @if ($firmaRecibe && $firmaRecibe->firma_digital_path)
                        <div class="text-center mb-3">
                            <img src="{{ asset('storage/' . $firmaRecibe->firma_digital_path) }}" 
                                 alt="Firma digital de quien recibe" style="max-width: 100%; height: auto;"/>
                        </div>
                    @else
                        <p class="text-muted text-center">No hay firma digital registrada.</p>
                    @endif
                </div>

                <div class="mt-4">
                    <h3 class="signature-pad-title">Foto de la persona que recibe</h3>

                    @if ($firmaRecibe && $firmaRecibe->foto_firmante_path)
                        <div class="text-center mb-3">
                            <img src="{{ asset('storage/' . $firmaRecibe->foto_firmante_path) }}" 
                                 alt="Foto de quien recibe" style="max-width: 100%; height: auto;"/>
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
