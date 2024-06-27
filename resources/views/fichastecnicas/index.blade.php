@extends('layouts.master')

@section('title') Fichas Técnicas @endsection

@section('css')
<!-- Toastr CSS -->
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

<!-- SweetAlert2 CSS -->
<link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">

<!-- CSS de Bootstrap -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">

<!-- CSS de DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">

<!-- CSS de DataTables Buttons -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.bootstrap5.css">


@endsection 

@section('body')
<body data-sidebar="dark">
    @endsection

    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Fichas Técnicas @endslot
    @slot('subtitle') Tablas @endslot
    @endcomponent

    @include('layouts.notificaciones')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end align-items-center">
                        <div class="card-tools">
                            <a href="{{ route('fichastecnicas.new') }}">
                                <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Crear Nuevo</button>

                            </a>



                        </div>
                    </div>
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Nombre del propietario</th>
                                <th>Nombre de la propiedad</th>
                                <th>Barrio</th>
                                <th>Valor</th>
                                <th>Asesor</th>
                                <th>Acciones</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fichastecnicas as $index => $fichatecnica)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $fichatecnica->nom_propietario }}</td>
                                <td>{{ $fichatecnica->nom_propiedad }}</td>
                                <td>{{ $fichatecnica->barrio }}</td>
                                <td>{{ number_format($fichatecnica->valor, 2, ',', '.') }}</td>
                                <td>{{ $fichatecnica->user->name }}</td>
                                <td>
                                    <!-- <button type="button" class="btn btn-xs btn-default text-primary mx-1 shadow" data-bs-toggle="modal" data-bs-target=".modalEditar{{ $fichatecnica->id }}"><i class="fa fa-lg fa-fw fa-pen"></i></button> -->

                                    <a href="{{ route('fichastecnicas.edit', $fichatecnica->id) }}">
                                        <button type="button" class="btn btn-xs btn-default text-primary mx-1 shadow"><i class="fa fa-lg fa-fw fa-pen"></i></button>

                                    </a>
                                    
                                    <form id="formDelete{{ $fichatecnica->id }}" method="POST" action="{{ route('fichastecnicas.destroy', $fichatecnica->id) }}" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="eliminar({{ $fichatecnica->id }})" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar">
                                            <i class="fa fa-lg fa-fw fa-trash"></i>
                                        </button>
                                    </form>

                                    <a href="{{ route('fichastecnicas.pdf', $fichatecnica) }}" target="_black">
                                        <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                            <i class="fa fa-lg fa-fw fa-file-pdf"></i>
                                        </button>
                                    </a>

                                </td>
                            </tr>
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

    <!-- Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
    
    <!-- DataTables Buttons -->
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.bootstrap5.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.colVis.min.js"></script>


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
    // Verificar si la tabla ya está inicializada y destruirla si es necesario
    if ($.fn.dataTable.isDataTable('#datatable-buttons')) {
        $('#datatable-buttons').DataTable().destroy();
    }

    // Inicializar la tabla con opciones de idioma y botones
    var table = new DataTable('#datatable-buttons', {
        language: {
            url: '//cdn.datatables.net/plug-ins/2.0.8/i18n/es-MX.json'
        },
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

    var formulario = document.getElementById("formulariotipococina");
    var botonGuardar = document.getElementById("botonGuardar");

    if (formulario) {
        formulario.addEventListener("submit", function() {
            // Deshabilitar el botón después de enviar el formulario
            botonGuardar.disabled = true;
            // Cambiar el texto del botón a "Guardando..."
            botonGuardar.innerHTML = 'Guardando...';
        });
    }
});

    </script>

    <script>
    // Configurar un temporizador para ocultar la alerta después de 5 segundos (5000 milisegundos)
        setTimeout(function() {
            var alert = document.querySelector('.alert');
            if (alert) {
            // Usar el método de Bootstrap para cerrar la alerta
                var alertInstance = bootstrap.Alert.getOrCreateInstance(alert);
                alertInstance.close();
            }
        }, 3000);
    </script>
    @endsection
