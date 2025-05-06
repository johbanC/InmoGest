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


                <form id="form-horizontal" method="POST" class="form-horizontal form-wizard-wrapper" action="{{ route('inventarios.store') }}" novalidate enctype="multipart/form-data">
                    @csrf
                    <h3>Datos Principales</h3>
                    <fieldset>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="inquilino" class="col-lg-3 col-form-label">Nombre del inquilino <strong class="required"></strong></label>
                                    <div class="col-lg-9">
                                        <input id="inquilino" name="inquilino" type="text"
                                            class="form-control {{ $errors->has('inquilino') ? 'is-invalid' : '' }}" 
                                            placeholder="Nombre del inquilino" value="{{ old('inquilino') }}">
                                        @if ($errors->has('inquilino'))
                                            <div class="invalid-feedback">{{ $errors->first('inquilino') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="nombre_propiedad" class="col-lg-3 col-form-label">Nombre de la propiedad <strong class="required"></strong></label>
                                    <div class="col-lg-9">
                                        <input id="nombre_propiedad" name="nombre_propiedad" type="text"
                                            class="form-control {{ $errors->has('nombre_propiedad') ? 'is-invalid' : '' }}" 
                                            placeholder="Nombre de la propiedad" value="{{ old('nombre_propiedad') }}">
                                        @if ($errors->has('nombre_propiedad'))
                                            <div class="invalid-feedback">{{ $errors->first('nombre_propiedad') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <!-- end row -->
                            </div>
                            <!-- end col -->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="input-telefono" class="col-lg-3 col-form-label">Número del inquilino <strong class="required"></strong></label>
                                    <div class="col-lg-9">
                                        <input type="text" id="input-telefono" name="numero_inquilino" 
                                            class="form-control {{ $errors->has('numero_inquilino') ? 'is-invalid' : '' }}" 
                                            placeholder="(000) 000-0000" value="{{ old('numero_inquilino') }}">
                                        @if ($errors->has('numero_inquilino'))
                                            <div class="invalid-feedback">{{ $errors->first('numero_inquilino') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="txtEmailInquilino" class="col-lg-3 col-form-label">Email del inquilino <strong class="required"></strong></label>
                                    <div class="col-lg-9">
                                        <input id="email_inquilino" name="email_inquilino" type="email"
                                            class="form-control {{ $errors->has('email_inquilino') ? 'is-invalid' : '' }}" 
                                            placeholder="Email del inquilino" value="{{ old('email_inquilino') }}">
                                        @if ($errors->has('email_inquilino'))
                                            <div class="invalid-feedback">{{ $errors->first('email_inquilino') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="direccion" class="col-lg-3 col-form-label">Dirección de la propiedad <strong class="required"></strong></label>
                                    <div class="col-lg-9">
                                        <textarea id="direccion" name="direccion" rows="4" 
                                            class="form-control {{ $errors->has('direccion') ? 'is-invalid' : '' }}" 
                                            placeholder="Dirección de la propiedad">{{ old('direccion') }}</textarea>
                                        @if ($errors->has('direccion'))
                                            <div class="invalid-feedback">{{ $errors->first('direccion') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="descripcion" class="col-lg-3 col-form-label">Observación</label>
                                    <div class="col-lg-9">
                                        <textarea id="descripcion" name="descripcion" rows="4" 
                                            class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" 
                                            placeholder="Observación">{{ old('descripcion') }}</textarea>
                                        @if ($errors->has('descripcion'))
                                            <div class="invalid-feedback">{{ $errors->first('descripcion') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="tipo_inmuebles_id" class="col-lg-3 col-form-label">Tipo de Inmueble <strong class="required"></strong></label>
                                    <div class="col-lg-9">
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
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="nro_llaves" class="col-lg-3 col-form-label">Número de llaves</label>
                                    <div class="col-lg-9">
                                        <input id="nro_llaves" name="nro_llaves" type="number"
                                            class="form-control {{ $errors->has('nro_llaves') ? 'is-invalid' : '' }}" 
                                            placeholder="Número de llaves" value="{{ old('nro_llaves') }}">
                                        @if ($errors->has('nro_llaves'))
                                            <div class="invalid-feedback">{{ $errors->first('nro_llaves') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>


                    <h3>Inventario</h3>
                    <fieldset>
                        <section>
                            <div class="row" style="padding-bottom: 10px">
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-primary waves-effect waves-light" onclick="agregarDormitorio()">Agregar
                                        Dormitorio</button>
                                </div>

                                <div class="col-md-3">
                                    <button type="button" class="btn btn-primary waves-effect waves-light" onclick="agregarBano()">Agregar
                                        Baño</button>
                                </div>

                                <div class="col-md-3">
                                    <button type="button" class="btn btn-primary waves-effect waves-light" onclick="agregarSala()">Agregar
                                        Sala</button>
                                </div>

                                <div class="col-md-3">
                                    <button type="button" class="btn btn-primary waves-effect waves-light"
                                        onclick="agregarComedor()">Agregar Comedor</button>

                                </div>
                            </div>

                            <div class="row" style="padding-bottom: 10px">
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-primary waves-effect waves-light" onclick="agregarCocina()">Agregar
                                        Cocina</button>
                                </div>

                                <div class="col-md-3">
                                    <button type="button" class="btn btn-primary waves-effect waves-light" onclick="agregarHall_Pasillo()">Agregar
                                        Hall O Pasillo</button>
                                </div>

                                <div class="col-md-3">
                                    <button type="button" class="btn btn-primary waves-effect waves-light" onclick="agregarPatio()">Agregar
                                        Patio o Zona de ropa</button>
                                </div>

                                <div class="col-md-3">
                                    <button type="button" class="btn btn-primary waves-effect waves-light" onclick="agregarGaraje()">Agregar
                                        Garaje o Cuarto Util</button>
                                </div>
                            </div>

                            <div class="row" style="padding-bottom: 10px">
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-primary waves-effect waves-light" onclick="agregarOtro()">Agregar
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


                    <h3>Datos de entrega</h3>
                    <fieldset>
                        <section>
                            <div class="row" style="padding-bottom: 10px">                              
                                   
                                    @include('inventarios.form._datos_entrega')
                                

                            </div>
                        </section>
                                



                    </fieldset>
                    


                    
                </form>
                <!-- end form -->
            </div>
        </div>
    </div>
</div> <!-- row end -->




  

