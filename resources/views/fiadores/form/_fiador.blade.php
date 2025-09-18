<form id="FormularioCrearPropietario" method="POST" action="{{ route('clientes.storePropietario') }}"
    class="row g-3 needs-validation" novalidate enctype="multipart/form-data">
    @csrf
    <section>
        <div class="row mb-3">
            <div class="col-md-2">
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
            <div class="col-md-2">
                <label for="input-numero_documento" class="form-label">Número de documento</label>
                <input type="text" name="numero_documento"
                    class="form-control {{ $errors->has('numero_documento') ? 'is-invalid' : '' }}"
                    id="input-numero_documento" placeholder="Número de documento" value="{{ old('numero_documento') }}"
                    required>
                @if ($errors->has('numero_documento'))
                    <div class="invalid-feedback">{{ $errors->first('numero_documento') }}</div>
                @endif
            </div>
            <div class="col-md-3">
                <label for="input-nom_propietario" class="form-label">Nombre</label>
                <input type="text" name="nombre"
                    class="form-control {{ $errors->has('nom_propietario') ? 'is-invalid' : '' }}"
                    id="input-propietario" placeholder="Nombre del Propietario" value="{{ old('nom_propietario') }}"
                    required>
                @if ($errors->has('nom_propietario'))
                    <div class="invalid-feedback">{{ $errors->first('nom_propietario') }}</div>
                @endif
            </div>
            <div class="col-md-3">
                <label for="input-ape_propietario" class="form-label">Apellido</label>
                <input type="text" name="apellido"
                    class="form-control {{ $errors->has('ape_propietario') ? 'is-invalid' : '' }}"
                    id="input-ape_propietario" placeholder="Apellido del Propietario" value="{{ old('ape_propietario') }}"
                    required>
                @if ($errors->has('ape_propietario'))
                    <div class="invalid-feedback">{{ $errors->first('ape_propietario') }}</div>
                @endif
            </div>
            <div class="col-md-2">
                <label for="input-telefono" class="form-label">Teléfono</label>
                <input type="text" name="telefono"
                    class="form-control {{ $errors->has('telefono') ? 'is-invalid' : '' }}" id="input-telefono"
                    placeholder="Teléfono" value="{{ old('telefono') }}">
                @if ($errors->has('telefono'))
                    <div class="invalid-feedback">{{ $errors->first('telefono') }}</div>
                @endif
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <label for="input-email" class="form-label">Email</label>
                <input type="email" name="email"
                    class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                    id="input-email" placeholder="Email" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="col-md-9">
                <label for="input-direccion" class="form-label">Dirección</label>
                <input type="text" name="direccion"
                    class="form-control {{ $errors->has('direccion') ? 'is-invalid' : '' }}" id="input-direccion"
                    placeholder="Dirección" value="{{ old('direccion') }}">
                @if ($errors->has('direccion'))
                    <div class="invalid-feedback">{{ $errors->first('direccion') }}</div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <button type="submit" id="botonGuardar" class="btn btn-success mx-2 px-4">Guardar</button>
                <button type="button" class="btn btn-danger mx-2 px-4">Cancelar</button>
            </div>
        </div>
    </section>
</form>


<script>
    // AGREGAR LOS PUNTOS EN EL NÚMERO DE DOCUMENTO Y PERMITIR SOLO NÚMEROS
    document.getElementById('input-numero_documento').addEventListener('input', function(evt) {
        var value = evt.target.value;
        // Eliminar todos los caracteres que no sean números
        value = value.replace(/\D/g, '');
        // Aplicar el formato con puntos
        evt.target.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    });
</script>