<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <div class="invoice-title">
                            <h4 class="float-end font-size-16">
                                Fecha de creacion: {{ $cliente->created_at->format('d/m/Y H:i') }}
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
                                    Documento: {{ $cliente->tipoDocumento->acronimo }} -
                                    {{ $cliente->numero_documento }}<br>
                                    Nombre: {{ $cliente->nombre }} {{ $cliente->apellido }}<br>
                                    Telefono: {{ $cliente->telefono }} <br>
                                    Email: {{ $cliente->email }} <br>
                                    Direccion: {{ $cliente->direccion }} <br>
                                </address>
                            </div>



                            <div class="col-md-4">
                                <div class="card-tools">
                                    <strong>Datos Bancarios</strong><br>
                                    Banco: {{ $cliente->banco }}<br>
                                    Cuenta: {{ $cliente->numero_cuenta }}<br>
                                    Tipo de Cuenta: {{ $cliente->tipo_cuenta }}<br>
                                    Moneda: {{ $cliente->moneda }}<br>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card-tools">

                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div>

                            <div class="card">
                                <div class="card-body">

                                    
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
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Casa Campestre</td>
                                                        <td>Vereda El Lago, Km 5</td>
                                                        <td>Casa</td>
                                                        <td>Ocupada</td>
                                                        <td>
                                                            <a href="#" class="btn btn-info btn-sm">Ver</a>
                                                            <a href="#" class="btn btn-primary btn-sm">Editar</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Local Comercial</td>
                                                        <td>Av. Principal #10-20</td>
                                                        <td>Local</td>
                                                        <td>Disponible</td>
                                                        <td>
                                                            <a href="#" class="btn btn-info btn-sm">Ver</a>
                                                            <a href="#" class="btn btn-primary btn-sm">Editar</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <p>No hay propiedades registradas para este propietario.</p>
                                    






                                </div>
                            </div>
                            <div class="d-print-none mt-4">
                                <div class="float-end">
                                    <a href="javascript:window.print()"
                                        class="btn btn-success waves-effect waves-light">
                                        <i class="fa fa-print"></i> Imprimir
                                    </a>
                                    <a href="#" class="btn btn-primary waves-effect waves-light">Enviar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
