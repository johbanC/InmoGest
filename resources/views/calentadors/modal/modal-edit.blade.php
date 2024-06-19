<!-- Agrega la ventana modal aquí, fuera del bloque PHP -->
<div class="modal fade modalEditar{{$calentador->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('calentadors.update', $calentador) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalle del Calentador {{$calentador->nombre}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" value="{{ old('nombre', isset($calentador) ? $calentador->nombre : '') }}" id="input-nombre" autofocus placeholder="Nombre">
                        @if ($errors->has('nombre'))
                        <div class="invalid-feedback">{{ $errors->first('nombre') }}</div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect waves-light">Actualizar</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
                </div>
            </div>
        </form>
    </div>
</div>
