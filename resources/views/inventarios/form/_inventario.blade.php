@dump($errors->all())

<script>
    var areaIndex = 0;
</script>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Crear inventario de la propiedad</h4>


                <form id="form-horizontal" method="POST" class="form-horizontal form-wizard-wrapper" action="{{ route('inventarios.store') }}" novalidate enctype="multipart/form-data">
                    @csrf
                    <h3>Datos Principales</h3>
                    <fieldset>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="inquilino" class="col-lg-3 col-form-label">Nombre del
                                        inquilino</label>
                                    <div class="col-lg-9">
                                        <input id="inquilino" name="inquilino" type="text"
                                            class="form-control" placeholder="Nombre del inquilino" required>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="nombre_propiedad" class="col-lg-3 col-form-label">Nombre de la
                                        propiedad</label>
                                    <div class="col-lg-9">
                                        <input id="nombre_propiedad" name="nombre_propiedad" type="text"
                                            class="form-control" placeholder="Nombre de la propiedad">
                                    </div>
                                </div>
                                <!-- end row -->
                            </div>
                            <!-- end col -->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="input-telefono" class="col-lg-3 col-form-label">Número del
                                        inquilino</label>
                                    <div class="col-lg-9">
                                        <input type="text" id="input-telefono" name="numero_inquilino" class="form-control" placeholder="(000) 000-0000">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="txtEmailInquilino" class="col-lg-3 col-form-label">Email del
                                        inquilino</label>
                                    <div class="col-lg-9">
                                        <input id="txtEmailInquilino" name="txtEmailInquilino" type="email"
                                            class="form-control" placeholder="Email del inquilino">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="direccion" class="col-lg-3 col-form-label">Dirección de la
                                        propiedad</label>
                                    <div class="col-lg-9">
                                        <textarea id="direccion" name="direccion" rows="4" class="form-control"
                                            placeholder="Dirección de la propiedad"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="descripcion" class="col-lg-3 col-form-label">Observación</label>
                                    <div class="col-lg-9">
                                        <textarea id="descripcion" name="descripcion" rows="4" class="form-control" placeholder="Observación"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="tipo_inmuebles_id" class="col-lg-3 col-form-label">Tipo de Inmueble
                                    </label>
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
                                            <div class="invalid-feedback">{{ $errors->first('tipo_inmuebles_id') }}
                                            </div>
                                        @endif
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="nro_llaves" class="col-lg-3 col-form-label">Número de
                                        llaves</label>
                                    <div class="col-lg-9">
                                        <input id="nro_llaves" name="nro_llaves" type="number"
                                            class="form-control" placeholder="Número de llaves">
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
                                    <button type="button" class="btn btn-primary waves-effect waves-light">Agregar
                                        Baño</button>
                                </div>

                                <div class="col-md-3">
                                    <button type="button" class="btn btn-primary waves-effect waves-light">Agregar
                                        Sala</button>
                                </div>

                                <div class="col-md-3">
                                    <button type="button" class="btn btn-primary waves-effect waves-light"
                                        onclick="agregarComedor()">Agregar Comedor</button>

                                </div>
                            </div>

                            <div class="row" style="padding-bottom: 10px">
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-primary waves-effect waves-light">Agregar
                                        Cocina</button>
                                </div>

                                <div class="col-md-3">
                                    <button type="button" class="btn btn-primary waves-effect waves-light">Agregar
                                        Hall O Pasillo</button>
                                </div>

                                <div class="col-md-3">
                                    <button type="button" class="btn btn-primary waves-effect waves-light">Agregar
                                        Patio o Zona de ropa</button>
                                </div>

                                <div class="col-md-3">
                                    <button type="button" class="btn btn-primary waves-effect waves-light">Agregar
                                        Garaja o Cuarto Util</button>
                                </div>
                            </div>

                            <div class="row" style="padding-bottom: 10px">
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-primary waves-effect waves-light">Agregar
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



                    </fieldset>
                    


                    
                </form>
                <!-- end form -->
            </div>
        </div>
    </div>
</div> <!-- row end -->



@section('scripts')
    <!-- form wizard -->
    <script src="{{ URL::asset('assets/libs/jquery-steps/jquery-steps.min.js') }}"></script>

    <!-- form wizard init -->
    <script src="{{ URL::asset('assets/js/pages/form-wizard.init.js') }}"></script>

    <script src="{{ URL::asset('assets/js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.1.0/imask.min.js"></script>

    @include('inventarios.form._comedor')
    @include('inventarios.form._dormitorio')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Crea una instancia de InputMask y aplica la máscara al campo de teléfono
            var telefonoInput = document.getElementById('input-telefono');
            if (telefonoInput) {
                var telefonoMask = IMask(telefonoInput, {
                    mask: '(000) 000-0000'
                });
            }
        });
    </script>
@endsection



