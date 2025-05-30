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

<!-- CSS de DataTables Responsive -->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">

<!-- CSS de DataTables Buttons -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.bootstrap5.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/filepond/4.31.1/filepond.min.css" integrity="sha512-TtQdiqlFBF4xOf9GCawalT4FQ7qihYm+EMYxpor3WzndeGC+NflmNd/P5AN8vvRH4XqTjoNrIeJRbZcifEMbWA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style type="text/css">
    .text-pdf {
      color: #AD0B00; /* Color similar to Adobe PDF */
  }
</style>
@endsection


@section('body')
<body data-sidebar="dark">
    @endsection

    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Fichas Técnicas @endslot
    @slot('subtitle') Ficha Tecnica @endslot
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
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap table-sm" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>ID</th>
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
                                <td>{{ $fichatecnica->id }}</td>
                                <td>{{ $fichatecnica->nom_propietario }}</td>
                                <td>{{ $fichatecnica->nom_propiedad }}</td>
                                <td>{{ $fichatecnica->barrio }}</td>
                                <td>$ {{ number_format($fichatecnica->valor, 2, ',', '.') }}</td>
                                <td>{{ $fichatecnica->user->name }}</td>
                                <td>
                                    <!-- <button type="button" class="btn btn-xs btn-default text-primary mx-1 shadow" data-bs-toggle="modal" data-bs-target=".modalEditar{{ $fichatecnica->id }}"><i class="fa fa-lg fa-fw fa-pen"></i></button> -->

                                    <a href="{{ route('fichastecnicas.show', $fichatecnica->id) }}">
                                        <button type="button" class="btn btn-xs btn-default text-primary mx-1 shadow"><i class="fa fa-lg fa-fw fa-eye"></i></button>
                                    </a>

                                    <a href="{{ route('fichastecnicas.edit', $fichatecnica->id) }}">
                                        <button type="button" class="btn btn-xs btn-default text-primary mx-1 shadow"><i class="fa fa-lg fa-fw fa-pen"></i></button>

                                    </a>
                                    
                                    <!-- <form id="formDelete{{ $fichatecnica->id }}" method="POST" action="{{ route('fichastecnicas.destroy', $fichatecnica->id) }}" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="eliminar({{ $fichatecnica->id }})" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar">
                                            <i class="fa fa-lg fa-fw fa-trash"></i>
                                        </button>
                                    </form> -->

                                    <a href="{{ route('fichastecnicas.pdf', $fichatecnica) }}" target="_black">
                                        <button class="btn btn-xs btn-default mx-1 shadow" title="Ver Pdf">
                                            <i class="fa fa-lg fa-fw fa-file-pdf text-pdf"></i>
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

    <!-- DataTables Responsive JS -->
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.dataTables.js"></script>


    <!-- DataTables Buttons -->
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.bootstrap5.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.colVis.min.js"></script>

    <!-- Archivo de internacionalización -->
    <script src="https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"></script>

    <!-- Sweet Alerts js -->
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Sweet alert init js -->
    <script src="{{ asset('assets/js/pages/sweet-alerts.init.js') }}"></script>
    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/filepond/4.31.1/filepond.min.js" integrity="sha512-UlakzTkpbSDfqJ7iKnPpXZ3HwcCnFtxYo1g95pxZxQXrcCLB0OP9+uUaFEj5vpX7WwexnUqYXIzplbxq9KSatw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


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
        // Inicializar la tabla con opciones de idioma y botones
            var table = $('#datatable-buttons').DataTable({
                responsive: true,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/2.0.8/i18n/es-CO.json'
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

    // Configurar un temporizador para ocultar la alerta después de 3 segundos (3000 milisegundos)
        setTimeout(function() {
            var alert = document.querySelector('.alert');
            if (alert) {
            // Usar el método de Bootstrap para cerrar la alerta
                var alertInstance = bootstrap.Alert.getOrCreateInstance(alert);
                alertInstance.close();
            }
        }, 3000);


        $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#datatable-buttons tfoot th').each( function () {
        var title = $('#datatable-buttons thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#datatable-buttons').DataTable();
 
    // Apply the search
    table.columns().eq( 0 ).each( function ( colIdx ) {
        $( 'input', table.column( colIdx ).footer() ).on( 'keyup change', function () {
            table
                .column( colIdx )
                .search( this.value )
                .draw();
        } );
    } );
} );






    </script>
    @endsection
