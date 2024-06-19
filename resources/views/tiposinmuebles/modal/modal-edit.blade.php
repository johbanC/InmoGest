<!--  Modal content for the above example -->
<div class="modal fade modalEditar{{$tiposinmueble->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form  id="formulariotipoinmueble" method="POST" action="{{ route('tiposinmuebles.update', $tiposinmueble) }}">
            @csrf
            @method('PUT')

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edita el tipo de inmueble </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control parsley-success {{ $errors->has('nombre') ? 'is-invalid' : '' }}" value="{{ old('nombre', isset($tiposinmueble) ? $tiposinmueble->nombre : '') }}" id="input-nombre" autofocus value="{{ old('nombre') }}" required="" placeholder="Tipo de inmueble" data-parsley-id="5" id="input-nombre" autofocus >
                        @if ($errors->has('nombre'))
                        <div class="invalid-feedback">{{ $errors->first('nombre') }}</div>
                        @endif
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect waves-light">Guardar</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
                            <!-- /.modal -->