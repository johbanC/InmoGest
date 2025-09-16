<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <div class="invoice-title">
                            <h4 class="float-end font-size-16">
                                Fecha de creacion: {{ $inquilino->created_at->format('d/m/Y H:i') }}
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
                                    <strong>Inquilino</strong><br>
                                    Documento: {{ $inquilino->tipoDocumento->acronimo }} -
                                    {{ $inquilino->numero_documento }}<br>
                                    Nombre: {{ $inquilino->nombre }} {{ $inquilino->apellido }}<br>
                                    Telefono: {{ $inquilino->telefono }} <br>
                                    Email: {{ $inquilino->email }} <br>
                                    Direccion: {{ $inquilino->direccion }} <br>
                                </address>
                            </div>



                            <div class="col-md-4">
                                {{-- <div class="card-tools">
                                    <strong>Datos Bancarios</strong><br>
                                    Banco: {{ $inquilino->banco }}<br>
                                    Cuenta: {{ $inquilino->numero_cuenta }}<br>
                                    Tipo de Cuenta: {{ $inquilino->tipo_cuenta }}<br>
                                    Moneda: {{ $inquilino->moneda }}<br>
                                </div> --}}
                            </div>

                            <div class="col-md-4">
                                <div class="card-tools">

                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Información del Inquilino</h4>
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
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#inventarios" role="tab"
                                    aria-selected="false">
                                    <span class="d-none d-md-block">Inventarios</span>
                                    <span class="d-block d-md-none"><i class="mdi mdi-archive h5"></i></span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#reparaciones" role="tab"
                                    aria-selected="false">
                                    <span class="d-none d-md-block">Reparaciones</span>
                                    <span class="d-block d-md-none"><i class="mdi mdi-tools h5"></i></span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#pagos" role="tab"
                                    aria-selected="false">
                                    <span class="d-none d-md-block">Pagos</span>
                                    <span class="d-block d-md-none"><i class="mdi mdi-cash h5"></i></span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#novedades" role="tab"
                                    aria-selected="false">
                                    <span class="d-none d-md-block">Novedades</span>
                                    <span class="d-block d-md-none"><i class="mdi mdi-alert-circle h5"></i></span>
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
                                                <th>Fecha Inicio</th>
                                                <th>Fecha Fin</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Arrendamiento</td>
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
                            <!-- Inventarios -->
                            <div class="tab-pane p-3" id="inventarios" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre Inventario</th>
                                                <th>Descripción</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Inventario Entrega</td>
                                                <td>Inventario inicial de entrega del inmueble</td>
                                                <td>Completo</td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-sm">Ver</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Reparaciones -->
                            <div class="tab-pane p-3" id="reparaciones" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Descripción</th>
                                                <th>Fecha</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Reparación de grifo</td>
                                                <td>15/09/2025</td>
                                                <td>Pendiente</td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-sm">Ver</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Pagos -->
                            <div class="tab-pane p-3" id="pagos" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Concepto</th>
                                                <th>Fecha</th>
                                                <th>Monto</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Arriendo Septiembre</td>
                                                <td>05/09/2025</td>
                                                <td>$1,200,000</td>
                                                <td>Pagado</td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-sm">Ver</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Novedades -->
                            <div class="tab-pane p-3" id="novedades" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tipo</th>
                                                <th>Descripción</th>
                                                <th>Fecha</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Queja</td>
                                                <td>Ruido excesivo</td>
                                                <td>14/09/2025</td>
                                                <td>En proceso</td>
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
                            <div class="d-print-none mt-4">
                                <div class="float-end">
                                    {{-- <a href="javascript:window.print()"
                                        class="btn btn-success waves-effect waves-light">
                                        <i class="fa fa-print"></i> Imprimir
                                    </a>
                                    <a href="#" class="btn btn-primary waves-effect waves-light">Enviar</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
