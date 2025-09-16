<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="invoice-title">
                            <h4 class="float-end font-size-16">
                                Fecha de creacion: {{ $fiador->created_at->format('d/m/Y H:i') }}
                            </h4>
                            <h3>
                                <img src="{{ URL::asset('assets/images/empresa/Logos_Dream_House_Horizontal_Color_JPG-removebg-preview.png') }}"
                                    alt="logo" height="80" />
                                <!-- aqui deberia de ir el logo de la empresa -->
                            </h3>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <address>
                                    <strong>Fiador</strong><br>
                                    Documento: {{ $fiador->tipoDocumento->acronimo }} -
                                    {{ $fiador->numero_documento }}<br>
                                    Nombre: {{ $fiador->nombre }} {{ $fiador->apellido }}<br>
                                    Telefono: {{ $fiador->telefono }} <br>
                                    Email: {{ $fiador->email }} <br>
                                    Direccion: {{ $fiador->direccion }} <br>
                                </address>
                            </div>
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Información del Fiador</h4>
                        <p class="card-title-desc" style="color: red">Disponible próximamente. Todos los datos aquí agregados son de prueba
                            para obtener una visualización de cómo podrán ser vistos*</p>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="tab" href="#contratos" role="tab"
                                    aria-selected="true">
                                    <span class="d-none d-md-block">Contratos</span>
                                    <span class="d-block d-md-none"><i class="mdi mdi-file-document h5"></i></span>
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- Contratos -->
                            <div class="tab-pane p-3 active show" id="contratos" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tipo Contrato</th>
                                                <th>Inquilino</th>
                                                <th>Fecha Inicio</th>
                                                <th>Fecha Fin</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Fianza - Arrendamiento</td>
                                                <td>Juan Pérez</td>
                                                <td>01/01/2025</td>
                                                <td>31/12/2025</td>
                                                <td>Activo</td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-sm">Ver</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
