@extends('adminlte::page')

@section('content_header')
<!-- <h1>Tipo de inmuebles</h1> -->
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tipo de Inmuebles</h3>
        <div class="card-tools">

            <x-adminlte-button label="Crear nuevo" theme="primary" data-toggle="modal" data-target="#modalCrearNuevo" class="bg" icon="fas fa-utensils"/>
            @include('tiposinmuebles.modal.modal-nuevo')

        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">        

        <table id="example1" head-theme="light" theme="light" class="table table-bordered table-striped table-hover">
            <!-- <table id="example1" class="table table-bordered table-striped "> -->
            <thead>
                <tr>
                    <th>Nro</th>
                    <th>Tipo de Inmueble</th>
                    <th>Acciones</th> 
                </tr>
            </thead>
            <tbody>
                @foreach($tiposinmuebles as $index => $tiposinmueble)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $tiposinmueble->nombre }}</td>
                    <td>
                        <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar" data-toggle="modal" data-target="#modalEditar{{ $tiposinmueble->id }}">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </button>
                        <form id="formDelete{{ $tiposinmueble->id }}" method="POST" action="{{ route('tiposinmuebles.destroy', $tiposinmueble->id) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="eliminar({{ $tiposinmueble->id }})" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>
                        </form>

                    </td>
                </tr>
                @include('tiposinmuebles.modal.modal-edit')
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
        var formulario = document.getElementById("formulariotipoinmueble");
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
