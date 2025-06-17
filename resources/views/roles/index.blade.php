@extends('layouts.master')

@section('title')
    Roles
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
                Roles
            @endslot
            @slot('subtitle')
                Tables
            @endslot
        @endcomponent

        @include('layouts.notificaciones')

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-end align-items-center">
                            <div class="card-tools">
                                <a href="{{ route('roles.create') }}">
                                    <button type="button" class="btn btn-success waves-effect waves-light">
                                        <i class="fa fa-plus"></i> Nuevo Rol
                                    </button>
                                </a>
                            </div>
                        </div>
                        <br>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Nro</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $index => $role)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('roles.permisos', $role->id) }}"
                                                    class="btn btn-sm btn-info">
                                                    <i class="fa fa-key"></i> Permisos
                                                </a>
                                                <a href="{{ route('roles.edit', $role->id) }}"
                                                    class="btn btn-sm btn-warning">
                                                    <i class="fa fa-pen"></i> Editar
                                                </a>

                                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                                    style="display:inline-block;" id="formDelete{{ $role->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        onclick="eliminar({{ $role->id }})">
                                                        <i class="fa fa-trash"></i> Eliminar
                                                    </button>
                                                </form>
                                            </div>
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
    @endsection
