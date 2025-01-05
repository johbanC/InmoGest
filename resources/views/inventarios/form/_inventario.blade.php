<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Crear inventario de la propiedad</h4>

                <form id="form-horizontal" class="form-horizontal form-wizard-wrapper">
                    <h3>Datos Principales</h3>
                    <fieldset>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="txtNombreInquilino" class="col-lg-3 col-form-label">Nombre del
                                        inquilino</label>
                                    <div class="col-lg-9">
                                        <input id="txtNombreInquilino" name="txtNombreInquilino" type="text"
                                            class="form-control" placeholder="Nombre del inquilino">
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


                    <h3>Company Document</h3>
                    <fieldset>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="txtFirstNameShipping" class="col-lg-3 col-form-label">PAN Card</label>
                                    <div class="col-lg-9">
                                        <input id="txtFirstNameShipping" name="txtFirstNameShipping" type="text"
                                            class="form-control" placeholder="Enter pancard number">
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="txtLastNameShipping" class="col-lg-3 col-form-label">VAT/TIN
                                        No.</label>
                                    <div class="col-lg-9">
                                        <input id="txtLastNameShipping" name="txtLastNameShipping" type="text"
                                            class="form-control" placeholder="Enter tin number">
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="txtCompanyShipping" class="col-lg-3 col-form-label">CST No.</label>
                                    <div class="col-lg-9">
                                        <input id="txtCompanyShipping" name="txtCompanyShipping" type="text"
                                            class="form-control" placeholder="Enter csr number">
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="txtEmailAddressShipping" class="col-lg-3 col-form-label">Service Tax
                                        No.</label>
                                    <div class="col-lg-9">
                                        <input id="txtEmailAddressShipping" name="txtEmailAddressShipping"
                                            type="text" class="form-control" placeholder="Service tax number">
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="txtCityShipping" class="col-lg-3 col-form-label">Company UIN</label>
                                    <div class="col-lg-9">
                                        <input id="txtCityShipping" name="txtCityShipping" type="text"
                                            class="form-control" placeholder="Enter uin pin">
                                    </div>
                                </div>
                                <!-- end row -->
                            </div>
                            <!-- end col -->
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="txtStateProvinceShipping"
                                        class="col-lg-3 col-form-label">Declaration</label>
                                    <div class="col-lg-9">
                                        <input id="txtStateProvinceShipping" name="txtStateProvinceShipping"
                                            type="text" class="form-control">
                                    </div>
                                </div>
                                <!-- end row -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
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
    <script src="{{ URL::asset('assets/libs/jquery-steps//jquery-steps.min.js') }}"></script>

    <!-- form wizard init -->
    <script src="{{ URL::asset('assets/js/pages/form-wizard.init.js') }}"></script>

    <script src="{{ URL::asset('assets/js/app.js') }}"></script>
@endsection
