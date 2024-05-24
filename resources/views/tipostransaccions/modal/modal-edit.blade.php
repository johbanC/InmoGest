<!-- Código 2 actualizado -->
<!-- Agrega la ventana modal aquí, fuera del bloque PHP -->
<div class="modal fade modalEditar{{$tipostransaccion->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="formulariotipostransaccion" method="POST" action="{{ route('tipostransaccions.update', $tipostransaccion) }}">
            @csrf
            @method('PUT')

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar tipo de transacción</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control parsley-success {{ $errors->has('nombre') ? 'is-invalid' : '' }}" value="{{ old('nombre', isset($tipostransaccion) ? $tipostransaccion->nombre : '') }}" id="input-nombre" autofocus required="" placeholder="Nombre" data-parsley-id="5">
                        @if ($errors->has('nombre'))
                        <div class="invalid-feedback">{{ $errors->first('nombre') }}</div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect waves-light">Actualizar</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
