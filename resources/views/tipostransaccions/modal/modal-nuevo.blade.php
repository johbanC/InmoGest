<!-- Código 2 actualizado -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="formulariotipostransaccion" method="POST" action="{{ route('tipostransaccions.store') }}">
            @csrf

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo tipo de transacción</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control parsley-success {{ $errors->has('nombre') ? 'is-invalid' : '' }}" value="{{ old('nombre') }}" required="" placeholder="Tipo de transacción
" data-parsley-id="5" id="input-nombre" autofocus >
                        @if ($errors->has('nombre'))
                        <div class="invalid-feedback">{{ $errors->first('nombre') }}</div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="botonGuardar" class="btn btn-success waves-effect waves-light">Guardar</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
