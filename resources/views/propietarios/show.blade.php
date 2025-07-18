@extends('layouts.master')

@section('title')
    Propietarios
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">


    <!-- Bootstrap Css -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{ URL::asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css">
@endsection

@section('body')

    <body data-sidebar="dark">
    @endsection

    @section('content')
        @component('components.breadcrumb')
            @slot('page_title')
                Crear Propietarios
            @endslot
            @slot('subtitle')
                Tablas
            @endslot
        @endcomponent

        @include('layouts.notificaciones')
        <!-- Para poder verificar que error tengo
     @dump($errors->all())
     -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        @include('propietarios.form._propietario-show')


                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('assets/js/app.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.1.0/imask.min.js"></script>




        <script>
            $(document).ready(function() {
                var formulario = document.getElementById("FormularioCrearPropietario");
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
