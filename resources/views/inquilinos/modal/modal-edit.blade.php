<!-- Modal para editar inquilino -->
<div class="modal fade modalEditar{{ $cliente->id }}" tabindex="-1" role="dialog"
    aria-labelledby="modalEditarInquilinoLabel{{ $cliente->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="formularioEditarInquilino{{ $cliente->id }}" method="POST"
            action="{{ route('inquilinos.update', $cliente) }}">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarInquilinoLabel{{ $cliente->id }}">Editar Inquilino</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">

                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label class="form-label">Tipo de Cliente</label>
                            <select name="tipo_cliente_id"
                                class="form-select {{ $errors->has('tipo_cliente_id') ? 'is-invalid' : '' }}">
                                <option value="">Seleccione...</option>
                                @foreach ($tipoclientes as $tipo)
                                    <option value="{{ $tipo->id }}"
                                        {{ old('tipo_cliente_id', $cliente->tipo_cliente_id) == $tipo->id ? 'selected' : '' }}>
                                        {{ $tipo->acronimo }} - {{ $tipo->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('tipo_cliente_id'))
                                <div class="invalid-feedback">{{ $errors->first('tipo_cliente_id') }}</div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Estatus</label>
                            <select name="tipo_estatus_id"
                                class="form-select {{ $errors->has('tipo_estatus_id') ? 'is-invalid' : '' }}">
                                <option value="">Seleccione...</option>
                                @foreach ($tipoestatus as $estatus)
                                    <option value="{{ $estatus->id }}"
                                        {{ old('tipo_estatus_id', $cliente->tipo_estatus_id) == $estatus->id ? 'selected' : '' }}>
                                        {{ $estatus->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('tipo_estatus_id'))
                                <div class="invalid-feedback">{{ $errors->first('tipo_estatus_id') }}</div>
                            @endif
                        </div>
                    </div>
                    <hr>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Tipo de Documento</label>
                            <select name="tipo_documento_id"
                                class="form-select {{ $errors->has('tipo_documento_id') ? 'is-invalid' : '' }}">
                                <option value="">Seleccione...</option>
                                @foreach ($tipodocumentos as $doc)
                                    <option value="{{ $doc->id }}"
                                        {{ old('tipo_documento_id', $cliente->tipo_documento_id) == $doc->id ? 'selected' : '' }}>
                                        {{ $doc->acronimo }} - {{ $doc->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('tipo_documento_id'))
                                <div class="invalid-feedback">{{ $errors->first('tipo_documento_id') }}</div>
                            @endif
                        </div>



                        <div class="col-md-4">
                            <label class="form-label">Número de Documento</label>
                            <input type="text" name="numero_documento"
                                class="form-control {{ $errors->has('numero_documento') ? 'is-invalid' : '' }}"
                                value="{{ old('numero_documento', $cliente->numero_documento) }}" required>
                            @if ($errors->has('numero_documento'))
                                <div class="invalid-feedback">{{ $errors->first('numero_documento') }}</div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre"
                                class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}"
                                value="{{ old('nombre', $cliente->nombre) }}" required>
                            @if ($errors->has('nombre'))
                                <div class="invalid-feedback">{{ $errors->first('nombre') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Apellido</label>
                            <input type="text" name="apellido"
                                class="form-control {{ $errors->has('apellido') ? 'is-invalid' : '' }}"
                                value="{{ old('apellido', $cliente->apellido) }}" required>
                            @if ($errors->has('apellido'))
                                <div class="invalid-feedback">{{ $errors->first('apellido') }}</div>
                            @endif
                        </div>


                        <div class="col-md-4">
                            <label class="form-label">Teléfono</label>
                            <input type="text" name="telefono"
                                class="form-control {{ $errors->has('telefono') ? 'is-invalid' : '' }}"
                                value="{{ old('telefono', $cliente->telefono) }}">
                            @if ($errors->has('telefono'))
                                <div class="invalid-feedback">{{ $errors->first('telefono') }}</div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Email</label>
                            <input type="email" name="email"
                                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                value="{{ old('email', $cliente->email) }}">
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                    </div>



                    <div class="row mb-1">
                        <div class="col-md-12">
                            <label class="form-label">Dirección</label>
                            <input type="text" name="direccion"
                                class="form-control {{ $errors->has('direccion') ? 'is-invalid' : '' }}"
                                value="{{ old('direccion', $cliente->direccion) }}">
                            @if ($errors->has('direccion'))
                                <div class="invalid-feedback">{{ $errors->first('direccion') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </form>
    </div>
</div>
