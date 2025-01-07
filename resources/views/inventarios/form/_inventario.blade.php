<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Crear inventario de la propiedad</h4>


                <form id="form-horizontal" class="form-horizontal form-wizard-wrapper" action="{{ route('inventarios.store') }}" novalidate enctype="multipart/form-data">
                    @csrf
                    <h3>Datos Principales</h3>
                    <fieldset>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="txtNombreInquilino" class="col-lg-3 col-form-label">Nombre del
                                        inquilino</label>
                                    <div class="col-lg-9">
                                        <input id="txtNombreInquilino" name="txtNombreInquilino" type="text"
                                            class="form-control" placeholder="Nombre del inquilino" required>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="txtNombrePropiedad" class="col-lg-3 col-form-label">Nombre de la
                                        propiedad</label>
                                    <div class="col-lg-9">
                                        <input id="txtNombrePropiedad" name="txtNombrePropiedad" type="text"
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
                                    <label for="txtNumeroInquilino" class="col-lg-3 col-form-label">Número del
                                        inquilino</label>
                                    <div class="col-lg-9">
                                        <input id="txtNumeroInquilino" name="txtNumeroInquilino" type="text"
                                            class="form-control" placeholder="Número del inquilino">
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
                                    <label for="txtDireccionPropiedad" class="col-lg-3 col-form-label">Dirección de la
                                        propiedad</label>
                                    <div class="col-lg-9">
                                        <textarea id="txtDireccionPropiedad" name="txtDireccionPropiedad" rows="4" class="form-control"
                                            placeholder="Dirección de la propiedad"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="txtObservacion" class="col-lg-3 col-form-label">Observación</label>
                                    <div class="col-lg-9">
                                        <textarea id="txtObservacion" name="txtObservacion" rows="4" class="form-control" placeholder="Observación"></textarea>
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
                                    <label for="txtNumeroLlaves" class="col-lg-3 col-form-label">Número de
                                        llaves</label>
                                    <div class="col-lg-9">
                                        <input id="txtNumeroLlaves" name="txtNumeroLlaves" type="text"
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
                                    <button type="button" class="btn btn-primary waves-effect waves-light">Agregar
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







                    </fieldset>


                    <h3>Bank Details</h3>
                    <fieldset>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="txtNameCard" class="col-lg-3 col-form-label">Name on Card</label>
                                    <div class="col-lg-9">
                                        <input id="txtNameCard" name="txtNameCard" type="text"
                                            class="form-control" placeholder="Enter card name">
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="ddlCreditCardType" class="col-lg-3 col-form-label">Credit Card
                                        Type</label>
                                    <div class="col-lg-9">
                                        <select id="ddlCreditCardType" name="ddlCreditCardType" class="form-select">
                                            <option value="">--Please Select--</option>
                                            <option value="AE">American Express</option>
                                            <option value="VI">Visa</option>
                                            <option value="MC">MasterCard</option>
                                            <option value="DI">Discover</option>
                                        </select>
                                    </div>
                                    <!-- end col -->
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="txtCreditCardNumber" class="col-lg-3 col-form-label">Credit Card
                                        Number</label>
                                    <div class="col-lg-9">
                                        <input id="txtCreditCardNumber" name="txtCreditCardNumber" type="text"
                                            class="form-control" placeholder="Enter credit card number">
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="txtCardVerificationNumber" class="col-lg-3 col-form-label">Card
                                        Verification Number</label>
                                    <div class="col-lg-9">
                                        <input id="txtCardVerificationNumber" name="txtCardVerificationNumber"
                                            type="text" class="form-control"
                                            placeholder="Enter verification number">
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="txtExpirationDate" class="col-lg-3 col-form-label">Expiration
                                        Date</label>
                                    <div class="col-lg-9">
                                        <input id="txtExpirationDate" name="txtExpirationDate" type="text"
                                            class="form-control" placeholder="DD /MM /YYYY">
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </fieldset>
                    <h3>Confirm Detail</h3>
                    <fieldset>
                        <div class="p-3">
                            <div class="">
                                <input type="checkbox" class="form-check-input me-2" id="customCheck1">
                                <label class="form-label" for="customCheck1">I agree with the Terms and
                                    Conditions.</label>
                            </div>
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



    @include('inventarios.form._comedor')


       
@endsection



