<script src="https://unpkg.com/imask"></script>

<!-- Modal content for Nuevo Fiador -->
<div class="modal fade bs-example-modal-lg" id="modalNuevoFiador" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg"> 
        <div class="modal-content">
            <form id="FormularioCrearFiador" method="POST" action="{{ route('fiadores.store') }}"
                class="needs-validation" novalidate enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Nuevo Fiador</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <section>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="tipo_documento_id" class="form-label">Tipo de Documento</label>
                                <select name="tipo_documento_id" id="tipo_documento_id"
                                    class="form-select {{ $errors->has('tipo_documento_id') ? 'is-invalid' : '' }}">
                                    <option value="">Seleccione una opción...</option>
                                    @foreach ($tipodocumentos as $tipodocumento)
                                        <option value="{{ $tipodocumento->id }}"
                                            {{ old('tipo_documento_id') == $tipodocumento->id ? 'selected' : '' }}>
                                            {{ $tipodocumento->acronimo }} - {{ $tipodocumento->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('tipo_documento_id'))
                                    <div class="invalid-feedback">{{ $errors->first('tipo_documento_id') }}</div>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label for="input-numero_documento" class="form-label">Número de documento</label>
                                <input type="text" name="numero_documento"
                                    class="form-control {{ $errors->has('numero_documento') ? 'is-invalid' : '' }}"
                                    id="input-numero_documento" placeholder="Número de documento"
                                    value="{{ old('numero_documento') }}" required>
                                @if ($errors->has('numero_documento'))
                                    <div class="invalid-feedback">{{ $errors->first('numero_documento') }}</div>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label for="input-nombre" class="form-label">Nombre</label>
                                <input type="text" name="nombre"
                                    class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}"
                                    id="input-nombre" placeholder="Nombre del Fiador" value="{{ old('nombre') }}"
                                    required>
                                @if ($errors->has('nombre'))
                                    <div class="invalid-feedback">{{ $errors->first('nombre') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="input-apellido" class="form-label">Apellido</label>
                                <input type="text" name="apellido"
                                    class="form-control {{ $errors->has('apellido') ? 'is-invalid' : '' }}"
                                    id="input-apellido" placeholder="Apellido del Fiador"
                                    value="{{ old('apellido') }}" required>
                                @if ($errors->has('apellido'))
                                    <div class="invalid-feedback">{{ $errors->first('apellido') }}</div>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label for="input-telefono" class="form-label">Teléfono</label>
                                <input type="text" name="telefono"
                                    class="form-control {{ $errors->has('telefono') ? 'is-invalid' : '' }}"
                                    id="input-telefono" placeholder="Teléfono" value="{{ old('telefono') }}">
                                @if ($errors->has('telefono'))
                                    <div class="invalid-feedback">{{ $errors->first('telefono') }}</div>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label for="input-email" class="form-label">Email</label>
                                <input type="email" name="email"
                                    class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                    id="input-email" placeholder="Email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="input-direccion" class="form-label">Dirección</label>
                                <input type="text" name="direccion"
                                    class="form-control {{ $errors->has('direccion') ? 'is-invalid' : '' }}"
                                    id="input-direccion" placeholder="Dirección" value="{{ old('direccion') }}">
                                @if ($errors->has('direccion'))
                                    <div class="invalid-feedback">{{ $errors->first('direccion') }}</div>
                                @endif
                            </div>
                        </div>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="botonGuardar" class="btn btn-success px-4">Guardar</button>
                    <button type="button" class="btn btn-danger px-4" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#modalNuevoFiador').on('shown.bs.modal', function() {
            var telefonoInput = document.getElementById('input-telefono');
            console.log('Modal abierto. Input:', telefonoInput);
            if (telefonoInput && !telefonoInput.dataset.masked) {
                IMask(telefonoInput, {
                    mask: '(000) 000-0000'
                });
                telefonoInput.dataset.masked = "true";
                console.log('IMask aplicado');
            }
        });
    });
</script>
