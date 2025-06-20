@extends('layouts.master')

@section('title')
    Fiadores
@endsection

@section('css')
    <!-- DataTables CSS -->
    <link href="{{ asset('assets/libs/datatables/dataTables.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
    <!-- Toastr CSS -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <!-- DataTables Buttons CSS -->
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet">
@endsection

@section('body')

    <body data-sidebar="dark">
    @endsection

    @section('content')
        @component('components.breadcrumb')
            @slot('page_title')
                Fiadores
            @endslot
            @slot('subtitle')
                Tables
            @endslot
        @endcomponent

        <!-- Mensaje de notificaciones -->
        @include('layouts.notificaciones')


        <!-- Para poder verificar que error tengo -->
        {{-- @dump($errors->all()) --}}



        @if (session('status') == 2 or session('status') == 4)
            <div class="alert alert-danger">
                Hubo un error al guardar.
                @if (session('error'))
                    <br>
                    <small>{{ session('error') }}</small>
                @endif
            </div>
        @endif







        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-end align-items-center">
                            <div class="card-tools">
                                {{-- <a href="{{ route('fiadores.new') }}">
                                    <button type="button" class="btn btn-success waves-effect waves-light">
                                        <i class="fa fa-plus"></i> Nuevo Fiador
                                    </button>
                                </a> --}}

                                <button type="button" class="btn btn-success waves-effect waves-light"
                                    data-bs-toggle="modal" data-bs-target="#modalNuevoFiador">
                                    <i class="fa fa-plus"></i> Nuevo Fiador
                                </button>
                                @include('fiadores.modal.modal-nuevo', [
                                    'tipodocumentos' => $tipodocumentos,
                                ])





                            </div>
                        </div>
                        <br>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Nro</th>
                                    <th>Documento</th>
                                    <th>Nombre y Apellido</th>
                                    <th>Telefono</th>
                                    <th>Email</th>
                                    <th>Estatus</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $index => $cliente)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $cliente->TipoDocumento->acronimo }} {{ $cliente->numero_documento }}</td>
                                        <td>{{ $cliente->nombre }} {{ $cliente->apellido }}</td>
                                        <td>{{ $cliente->telefono }}</td>
                                        <td>{{ $cliente->email }}</td>
                                        <td>
                                            @if ($cliente->tipoEstatus->nombre == 'Activo')
                                                <span class="badge bg-success">{{ $cliente->tipoEstatus->nombre }}</span>
                                            @elseif ($cliente->tipoEstatus->nombre == 'Eliminado')
                                                <span class="badge bg-danger">{{ $cliente->tipoEstatus->nombre }}</span>
                                            @elseif ($cliente->tipoEstatus->nombre == 'Inactivo')
                                                <span class="badge bg-warning">{{ $cliente->tipoEstatus->nombre }}</span>
                                            @else
                                                <span class="badge bg-info">{{ $cliente->tipoEstatus->nombre }}</span>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Acciones
                                                    <i class="mdi mdi-chevron-down"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <a class="dropdown-item"
                                                        href="{{ route('fiadores.show', $cliente->id) }}">
                                                        <i class="fa fa-eye"></i> Ver Detalles
                                                    </a>
                                                    <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target=".modalEditar{{ $cliente->id }}">
                                                        <i class="fa fa-pen"></i> Editar
                                                    </button>
                                                    <form action="{{ route('fiadores.destroy', $cliente->id) }}"
                                                        method="POST" style="display:inline;"
                                                        id="formDelete{{ $cliente->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="dropdown-item text-danger"
                                                            onclick="eliminar({{ $cliente->id }})">
                                                            <i class="fa fa-trash"></i> Eliminar
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>


                                        {{-- <td>
                                            <button type="button" class="btn btn-xs btn-default text-primary mx-1 shadow"
                                                data-bs-toggle="modal" data-bs-target=".modalEditar{{ $cliente->id }}"><i
                                                    class="fa fa-lg fa-fw fa-pen"></i></button>
                                            <form id="formDelete{{ $cliente->id }}" method="POST" action="{{ route('cliente.destroy', $cliente->id) }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="eliminar({{ $cliente->id }})" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar">
                                        <i class="fa fa-lg fa-fw fa-trash"></i>
                                    </button>
                                </form>
                                        </td> --}}
                                    </tr>
                                    @include('fiadores.modal.modal-edit')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <!-- Toastr JS -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

        <!-- Required datatable js -->
        <script src="{{ asset('assets/libs/datatables/dataTables.min.js') }}"></script>
        <!-- DataTables Buttons js -->
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <!-- Sweet Alerts js -->
        <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
        <!-- Sweet alert init js-->
        <script src="{{ asset('assets/js/pages/sweet-alerts.init.js') }}"></script>
        <!-- App js -->
        <script src="{{ asset('assets/js/app.js') }}"></script>



        <script>
            function eliminar(id) {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminarlo!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById("formDelete" + id).submit();
                    }
                });
            }

            $(document).ready(function() {
                if ($.fn.dataTable.isDataTable('#datatable-buttons')) {
                    $('#datatable-buttons').DataTable().destroy();
                }
                $('#datatable-buttons').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
            });

            setTimeout(function() {
                var alert = document.querySelector('.alert');
                if (alert) {
                    var alertInstance = bootstrap.Alert.getOrCreateInstance(alert);
                    alertInstance.close();
                }
            }, 3000);
        </script>

        <script>
            // AGREGAR LOS PUNTOS EN EL NÚMERO DE DOCUMENTO Y PERMITIR SOLO NÚMEROS
            document.getElementById('input-numero_documento').addEventListener('input', function(evt) {
                var value = evt.target.value;
                // Eliminar todos los caracteres que no sean números
                value = value.replace(/\D/g, '');
                // Aplicar el formato con puntos
                evt.target.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            });
        </script>



        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var formulario = document.getElementById("FormularioCrearFiador");
                var botonGuardar = document.getElementById("botonGuardar");

                if (formulario && botonGuardar) {
                    formulario.addEventListener("submit", function() {
                        botonGuardar.disabled = true;
                        botonGuardar.innerHTML = 'Guardando...';
                    });
                }
            });
        </script>
    @endsection
