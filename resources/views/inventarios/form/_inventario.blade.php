@dump($errors->all())



<script>
    var areaIndex = 0;
</script>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Crear inventario de la propiedad</h4>
                <p>Los campos que contengan <strong class="required"></strong> son <strong>obligatorios</strong></p>


                <form id="form-horizontal" method="POST" class="form-horizontal form-wizard-wrapper"
                    action="{{ route('inventarios.store') }}" novalidate enctype="multipart/form-data">
                    @csrf
                    <h3>Datos Principales</h3>
                    <fieldset>
                        <div class="row">
                            <!-- Seleccionar Inquilino con botón plus -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inquilino_id" class="form-label d-flex align-items-center">
                                        Seleccionar Inquilino
                                    </label>
                                    <select class="form-select" id="inquilino_id" name="cliente_id"
                                        style="width: 100%">
                                        <option value="">Seleccione un inquilino...</option>
                                        @foreach ($inquilinos as $inquilino)
                                            <option value="{{ $inquilino->id }}">
                                                {{ $inquilino->tipoDocumento->acronimo ?? '' }}
                                                {{ $inquilino->numero_documento }} - {{ $inquilino->nombre }}
                                                {{ $inquilino->apellido }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- Nombre de la propiedad -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nombre_propiedad" class="form-label">Nombre de la propiedad <strong
                                            class="required"></strong></label>
                                    <input id="nombre_propiedad" name="nombre_propiedad" type="text"
                                        class="form-control {{ $errors->has('nombre_propiedad') ? 'is-invalid' : '' }}"
                                        placeholder="Nombre de la propiedad" value="{{ old('nombre_propiedad') }}">
                                    @if ($errors->has('nombre_propiedad'))
                                        <div class="invalid-feedback">{{ $errors->first('nombre_propiedad') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Dirección de la propiedad -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="direccion" class="form-label">Dirección de la propiedad <strong
                                            class="required"></strong></label>
                                    <textarea id="direccion" name="direccion" rows="4"
                                        class="form-control {{ $errors->has('direccion') ? 'is-invalid' : '' }}" placeholder="Dirección de la propiedad">{{ old('direccion') }}</textarea>
                                    @if ($errors->has('direccion'))
                                        <div class="invalid-feedback">{{ $errors->first('direccion') }}</div>
                                    @endif
                                </div>
                            </div>
                            <!-- Observación -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Observación</label>
                                    <textarea id="descripcion" name="descripcion" rows="4"
                                        class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" placeholder="Observación">{{ old('descripcion') }}</textarea>
                                    @if ($errors->has('descripcion'))
                                        <div class="invalid-feedback">{{ $errors->first('descripcion') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Tipo de Inmueble -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tipo_inmuebles_id" class="form-label">Tipo de Inmueble <strong
                                            class="required"></strong></label>
                                    <select name="tipo_inmuebles_id" id="tipo_inmuebles_id"
                                        class="form-select {{ $errors->has('tipo_inmuebles_id') ? 'is-invalid' : '' }}">
                                        <option value="">Seleccione una opción...</option>
                                        @foreach ($tipoinmuebles as $id => $nombre)
                                            <option value="{{ $id }}"
                                                {{ old('tipo_inmuebles_id') == $id ? 'selected' : '' }}>
                                                {{ $nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('tipo_inmuebles_id'))
                                        <div class="invalid-feedback">{{ $errors->first('tipo_inmuebles_id') }}</div>
                                    @endif
                                </div>
                            </div>
                            <!-- Número de llaves -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nro_llaves" class="form-label">Número de llaves</label>
                                    <input id="nro_llaves" name="nro_llaves" type="number"
                                        class="form-control {{ $errors->has('nro_llaves') ? 'is-invalid' : '' }}"
                                        placeholder="Número de llaves" value="{{ old('nro_llaves') }}">
                                    @if ($errors->has('nro_llaves'))
                                        <div class="invalid-feedback">{{ $errors->first('nro_llaves') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </fieldset>


                    <h3>Inventario</h3>
                    <fieldset>
                        <section>
                            <div class="row" style="padding-bottom: 10px">
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-primary waves-effect waves-light"
                                        onclick="agregarDormitorio()">Agregar
                                        Dormitorio</button>
                                </div>

                                <div class="col-md-3">
                                    <button type="button" class="btn btn-primary waves-effect waves-light"
                                        onclick="agregarBano()">Agregar
                                        Baño</button>
                                </div>

                                <div class="col-md-3">
                                    <button type="button" class="btn btn-primary waves-effect waves-light"
                                        onclick="agregarSala()">Agregar
                                        Sala</button>
                                </div>

                                <div class="col-md-3">
                                    <button type="button" class="btn btn-primary waves-effect waves-light"
                                        onclick="agregarComedor()">Agregar Comedor</button>

                                </div>
                            </div>

                            <div class="row" style="padding-bottom: 10px">
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-primary waves-effect waves-light"
                                        onclick="agregarCocina()">Agregar
                                        Cocina</button>
                                </div>

                                <div class="col-md-3">
                                    <button type="button" class="btn btn-primary waves-effect waves-light"
                                        onclick="agregarHall_Pasillo()">Agregar
                                        Hall O Pasillo</button>
                                </div>

                                <div class="col-md-3">
                                    <button type="button" class="btn btn-primary waves-effect waves-light"
                                        onclick="agregarPatio()">Agregar
                                        Patio o Zona de ropa</button>
                                </div>

                                <div class="col-md-3">
                                    <button type="button" class="btn btn-primary waves-effect waves-light"
                                        onclick="agregarGaraje()">Agregar
                                        Garaje o Cuarto Util</button>
                                </div>
                            </div>

                            <div class="row" style="padding-bottom: 10px">
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-primary waves-effect waves-light"
                                        onclick="agregarOtro()">Agregar
                                        Otros</button>
                                </div>
                            </div>

                        </section>

                        <hr>

                        <div id="comedor-container">
                            <!-- Aquí se agregarán los nuevos comedores -->

                        </div>

                        <div id="dormitorio-container">
                            <!-- Aquí se agregarán los nuevos dormitorios -->

                        </div>

                        <div id="bano-container">
                            <!-- Aquí se agregarán los nuevos Baño -->

                        </div>

                        <div id="sala-container">
                            <!-- Aquí se agregarán los nuevos Baño -->

                        </div>

                        <div id="Cocina-container">
                            <!-- Aquí se agregarán los nuevos Baño -->

                        </div>

                        <div id="Hall_Pasillo-container">
                            <!-- Aquí se agregarán los nuevos Baño -->

                        </div>

                        <div id="Patio-container">
                            <!-- Aquí se agregarán los nuevos Baño -->

                        </div>

                        <div id="Garaje-container">
                            <!-- Aquí se agregarán los nuevos Baño -->

                        </div>

                        <div id="Otro-container">
                            <!-- Aquí se agregarán los nuevos Baño -->

                        </div>



                    </fieldset>


                    {{-- <h3>Datos de entrega</h3>
                    <fieldset>
                        <section>
                            <div class="row" style="padding-bottom: 10px">

                                @include('inventarios.form._datos_entrega')


                            </div>
                        </section>




                    </fieldset> --}}




                </form>
                <!-- end form -->
            </div>
        </div>
    </div>
</div> <!-- row end -->
