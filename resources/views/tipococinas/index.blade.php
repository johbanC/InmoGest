@extends('layouts.master')

@section('title') Data tables @endsection

@section('css')
<!-- DataTables CSS -->
<link href="{{ URL::asset('assets/libs/datatables/dataTables.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
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
    @slot('page_title') Tipo de imnuebles @endslot
    @slot('subtitle') Tables @endslot
    @endcomponent

    <!-- Mensaje de notificaciones -->
    @include('layouts.notificaciones')



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end align-items-center">
                        <div class="card-tools">

                            <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Crear nuevo</button>
                            @include('tipococinas.modal.modal-nuevo')

                        </div>
                    </div>
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Nombre cocinas</th>
                                <th>Acciones</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tipococinas as $index => $tipococina)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $tipococina->nombre }}</td>
                                <td>
                                    <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar" data-toggle="modal" data-target="#modalEditar{{ $tipococina->id }}">
                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </button>
                                    <form id="formDelete{{ $tipococina->id }}" method="POST" action="{{ route('tipococinas.destroy', $tipococina->id) }}" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="eliminar({{ $tipococina->id }})" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar">
                                            <i class="fa fa-lg fa-fw fa-trash"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                            @include('tipococinas.modal.modal-edit')
                            @endforeach
                        </tbody>
                    </table>
                </div>


                <!-- /.card-body -->
                <div class="card-footer">

                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->

            @stop

            @section('footer')

            <strong>Derechos de autor © 2024 <a href="#">InmoGest</a>.</strong>
            Todos los derechos reservados.
            <div class="float-right d-none d-sm-inline-block">
                <b>Versión</b> 1.0.0 Beta
            </div>

            @stop

            @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">




            @stop


            @section('js')


            <script>
                $(function () {
                    $("#example1").DataTable({
                        "responsive": true,
                        "lengthChange": false,
                        "autoWidth": false,
                        "buttons": ["csv", "excel", "pdf", "print"],
                    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                });
            </script>



            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            </script>


            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var formulario = document.getElementById("formularioTipococina");
                    var botonGuardar = document.getElementById("botonGuardar");

                    formulario.addEventListener("submit", function() {
            // Deshabilitar el botón después de enviar el formulario
                        botonGuardar.disabled = true;
            // Cambiar el texto del botón a "Guardando..."
                        botonGuardar.innerHTML = 'Guardando...';
                    });
                });
            </script>

            @if(session('status'))
            <script>
             toastr.{{session('status')['type']}}("{{ session('status')['message'] }}", "{{ session('status')['title'] }}");
         </script>
         @endif

         @stop
