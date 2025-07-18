<!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" id="modalCrearNuevo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="formularioTipodocumento" method="POST" action="{{ route('tipodocumentos.store') }}">
            @csrf

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar nueva tipo de Documento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control parsley-success {{ $errors->has('nombre') ? 'is-invalid' : '' }}" value="{{ old('nombre') }}" required="" placeholder="Nombre" data-parsley-id="5" id="input-nombre" autofocus>
                        @if ($errors->has('nombre'))
                        <div class="invalid-feedback">{{ $errors->first('nombre') }}</div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Acronimo</label>
                        <input type="text" name="acronimo" class="form-control parsley-success {{ $errors->has('acronimo') ? 'is-invalid' : '' }}" value="{{ old('acronimo') }}" required="" placeholder="Nombre" data-parsley-id="5" id="input-acronimo" autofocus>
                        @if ($errors->has('acronimo'))
                        <div class="invalid-feedback">{{ $errors->first('acronimo') }}</div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Descripcion</label>
                        <input type="text" name="descripcion" class="form-control parsley-success {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" value="{{ old('descripcion') }}" placeholder="Nombre" data-parsley-id="5" id="input-descripcion" autofocus>
                        @if ($errors->has('descripcion'))
                        <div class="invalid-feedback">{{ $errors->first('descripcion') }}</div>
                        @endif
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" id="botonGuardar" class="btn btn-success waves-effect waves-light">Crear</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
