<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <div class="invoice-title">
                            <h4 class="float-end font-size-16">
                                Fecha de creacion: {{ $propietario->created_at->format('d/m/Y H:i') }}
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
                                    <strong>Propietario</strong><br>
                                    Documento: {{ $propietario->tipoDocumento->acronimo }} -
                                    {{ $propietario->numero_documento }}<br>
                                    Nombre: {{ $propietario->nombre }} {{ $propietario->apellido }}<br>
                                    Telefono: {{ $propietario->telefono }} <br>
                                    Email: {{ $propietario->email }} <br>
                                    Direccion: {{ $propietario->direccion }} <br>
                                </address>
                            </div>



                            <div class="col-md-4">
                                <div class="card-tools">
                                    @if ($ultimoDatoBancario)
                                        <strong>Datos Bancarios</strong><br>
                                        Banco: {{ $ultimoDatoBancario->banco }}<br>
                                        Cuenta: {{ $ultimoDatoBancario->numero_cuenta }}<br>
                                        Tipo de Cuenta: {{ $ultimoDatoBancario->tipo_cuenta }}<br>
                                        Moneda: {{ $ultimoDatoBancario->moneda }}<br>
                                    @else
                                        <span class="text-muted">No hay datos bancarios registrados.</span>
                                    @endif
                                    <!-- Botón para abrir el modal -->
                                    <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modalDatosBancarios">
                                        <i class="fa fa-building"></i>
                                        Carga datos bancarios
                                    </a>
                                </div>
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
                        <h4 class="card-title">Información del Propietario</h4>
                        <p class="card-title-desc" style="color: red">Disponible próximamente. Todos los datos aquí agregados son de prueba
                            para obtener una visualización de cómo podrán ser vistos*</p>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="tab" href="#propiedades" role="tab"
                                    aria-selected="true">
                                    <span class="d-none d-md-block">Propiedades</span>
                                    <span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
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
                                <a class="nav-link" data-bs-toggle="tab" href="#contratos" role="tab"
                                    aria-selected="false">
                                    <span class="d-none d-md-block">Contratos</span>
                                    <span class="d-block d-md-none"><i class="mdi mdi-file-document h5"></i></span>
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
                                <a class="nav-link" data-bs-toggle="tab" href="#historial" role="tab"
                                    aria-selected="false">
                                    <span class="d-none d-md-block">Historial Bancario</span>
                                    <span class="d-block d-md-none"><i class="mdi mdi-history h5"></i></span>
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- Propiedades -->
                            <div class="tab-pane p-3 active show" id="propiedades" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th>Dirección</th>
                                                <th>Tipo</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Aquí puedes recorrer tus propiedades -->
                                            <tr>
                                                <td>1</td>
                                                <td>Apartamento Central</td>
                                                <td>Calle 123 #45-67</td>
                                                <td>Apartamento</td>
                                                <td>Disponible</td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-sm">Ver</a>
                                                    <a href="#" class="btn btn-primary btn-sm">Editar</a>
                                                </td>
                                            </tr>
                                            <!-- ...más filas... -->
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
                                                <td>Inventario Cocina</td>
                                                <td>Nevera, estufa, microondas</td>
                                                <td>Completo</td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-sm">Ver</a>
                                                </td>
                                            </tr>
                                            <!-- ...más filas... -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Contratos -->
                            <div class="tab-pane p-3" id="contratos" role="tabpanel">
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
                                            <!-- ...más filas... -->
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
                                                <td>Cambio de tubería</td>
                                                <td>10/09/2025</td>
                                                <td>Finalizado</td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-sm">Ver</a>
                                                </td>
                                            </tr>
                                            <!-- ...más filas... -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Historial Bancario -->
                            <div class="tab-pane p-3" id="historial" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Banco</th>
                                                <th>Número de Cuenta</th>
                                                <th>Tipo de Cuenta</th>
                                                <th>Moneda</th>
                                                <th>Fecha</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Ejemplo, recorre tu historial de bancos -->
                                            @foreach ($datosBancarios as $i => $dato)
                                                <tr>
                                                    <td>{{ $i + 1 }}</td>
                                                    <td>{{ $dato->banco }}</td>
                                                    <td>{{ $dato->numero_cuenta }}</td>
                                                    <td>{{ $dato->tipo_cuenta }}</td>
                                                    <td>{{ $dato->moneda }}</td>
                                                    <td>{{ $dato->created_at->format('d/m/Y H:i') }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->


<!-- Modal para cargar datos bancarios -->
<div class="modal fade" id="modalDatosBancarios" tabindex="-1" aria-labelledby="modalDatosBancariosLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('datosbancarios.store', $propietario->id) }}">
            @csrf
            <input type="text" name="cliente_id" value="{{ $propietario->id }}" hidden>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDatosBancariosLabel">Cargar Datos Bancarios</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="banco" class="form-label">Banco</label>
                        <select class="form-select" id="banco" name="banco" required>
                            <option value="">Seleccione un banco</option>
                            <option value="Bancolombia">Bancolombia</option>
                            <option value="Banco de Bogotá">Banco de Bogotá</option>
                            <option value="Banco Popular">Banco Popular</option>
                            <option value="Banco AV Villas">Banco AV Villas</option>
                            <option value="Banco Davivienda">Banco Davivienda</option>
                            <option value="Banco de Occidente">Banco de Occidente</option>
                            <option value="Banco Caja Social">Banco Caja Social</option>
                            <option value="Banco Itaú">Banco Itaú</option>
                            <option value="Banco BBVA">Banco BBVA</option>
                            <option value="Banco GNB Sudameris">Banco GNB Sudameris</option>
                            <option value="Banco Pichincha">Banco Pichincha</option>
                            <option value="Banco Falabella">Banco Falabella</option>
                            <option value="Banco Scotiabank Colpatria">Banco Scotiabank Colpatria</option>
                            <option value="Banco Coopcentral">Banco Coopcentral</option>
                            <option value="Banco Serfinanza">Banco Serfinanza</option>
                            <!-- Agrega más bancos si lo necesitas -->
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tipo_cuenta" class="form-label">Tipo de Cuenta</label>
                        <select class="form-select" id="tipo_cuenta" name="tipo_cuenta" required>
                            <option value="">Seleccione tipo de cuenta</option>
                            <option value="Ahorros">Ahorros</option>
                            <option value="Corriente">Corriente</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="numero_cuenta" class="form-label">Número de Cuenta</label>
                        <input type="text" class="form-control" id="numero_cuenta" name="numero_cuenta"
                            value="{{ old('numero_cuenta', $propietario->numero_cuenta) }}"
                            placeholder="123 465798 12" required>
                    </div>
                    <div class="mb-3">
                        <label for="moneda" class="form-label">Moneda</label>
                        <input type="text" class="form-control" id="moneda" name="moneda" value="COP"
                            readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
