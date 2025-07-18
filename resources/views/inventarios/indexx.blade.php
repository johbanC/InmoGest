@extends('layouts.master')

@section('title') Fichas Técnicas @endsection

@section('css')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">


<!-- Bootstrap Css -->
<link href="{{URL::asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
<!-- App Css-->
<link href="{{URL::asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css">

<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />




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
    <!-- @dump($errors->all()) -->


    <div class="row">
        <div class="col-md-2">
            <a class="btn btn-primary btn-lg waves-effect waves-light" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Datos del inmueble</a>
        </div>

        <div class="col-md-2">
            <a class="btn btn-primary btn-lg waves-effect waves-light" data-bs-toggle="collapse" href="#sala" role="button" aria-expanded="false" aria-controls="sala">Sala</a>
        </div>

        <div class="col-md-2">
            <a class="btn btn-primary btn-lg waves-effect waves-light" data-bs-toggle="collapse" href="#comedor" role="button" aria-expanded="false" aria-controls="comedor">Comedor</a>
        </div>

        <div class="col-md-2">
            <div id="">
                <button  class="btn btn-primary btn-lg waves-effect waves-light" type="button" id="agregarTabla">Agregar Habitación</button>
            </div>
        </div>

        <div class="col-md-2">
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Toggle both elements</button>
        </div>


        
    </div>



    <div id="">
        <button  class="btn btn-primary btn-lg waves-effect waves-light" type="button" id="agregarTabla">Agregar Habitación</button>
    </div>


    <br>

    <!-- <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body"> -->


                    @include('inventarios.form._inventario')
                    @include('inventarios.form._sala')
                    @include('inventarios.form._comedor')


               <!--  </div>
            </div>
        </div>
    </div> -->
    @endsection

    @section('scripts')
    <!-- App js -->
    <script src="{{ URL::asset('assets/js/app.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.1.0/imask.min.js"></script>

<script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
<link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />


    <script>


        $(document).ready(function() {
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
        document.addEventListener("DOMContentLoaded", function() {
            var formulario = document.getElementById("formularioFichaTecnica");
            var botonGuardar = document.getElementById("botonGuardar");

            formulario.addEventListener("submit", function() {
            // Deshabilitar el botón después de enviar el formulario
                botonGuardar.disabled = true;
            // Cambiar el texto del botón a "Guardando..."
                botonGuardar.innerHTML = 'Guardando...';
            });
        });
    </script>


    <script>
    // Crea una instancia de InputMask y aplica la máscara al campo de valor y administración
        var valorInput = document.getElementById('input-valor');
        var administracionInput = document.getElementById('input-administracion');

        var valorMask = IMask(valorInput, {
            mask: 'num',
            blocks: {
                num: {
                // Permite hasta 15 dígitos antes del separador decimal
                    mask: Number,
                    thousandsSeparator: '.',
                    radix: ',',
                scale: 2, // Dos dígitos decimales
                signed: false // No se permite un signo de negativo
            }
        },
        lazy: false // Muestra el símbolo de la moneda siempre
    });

        var administracionMask = IMask(administracionInput, {
            mask: 'num',
            blocks: {
                num: {
                // Permite hasta 15 dígitos antes del separador decimal
                    mask: Number,
                    thousandsSeparator: '.',
                    radix: ',',
                scale: 2, // Dos dígitos decimales
                signed: false // No se permite un signo de negativo
            }
        },
        lazy: false // Muestra el símbolo de la moneda siempre
    });
</script>


<script>
    // AGREGAR LOS PUNTOS EN EL NÚMERO DE DOCUMENTO Y PERMITIR SOLO NÚMEROS
    document.getElementById('input-cedula').addEventListener('input', function(evt) {
        var value = evt.target.value;
        // Eliminar todos los caracteres que no sean números
        value = value.replace(/\D/g, '');
        // Aplicar el formato con puntos
        evt.target.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    });
</script>

<script>
    // Crea una instancia de InputMask y aplica la máscara al campo de teléfono
    var telefonoInput = document.getElementById('input-telefono');
    var telefonoMask = IMask(telefonoInput, {
        mask: '(000) 000-0000'
    });
</script>
@endsection
