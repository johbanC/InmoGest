@extends('layouts.master')

@section('title') Fichas Técnicas @endsection

@section('css')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">


<!-- Bootstrap Css -->
<link href="{{URL::asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
<!-- App Css-->
<link href="{{URL::asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css">



<style>
    .required:after {
        content: " *";
        color: red;
    }
</style>

@endsection 

@section('body')
<body data-sidebar="dark">
    @endsection

    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Inventario @endslot
    @slot('subtitle') Inventario @endslot
    @endcomponent

    @include('layouts.notificaciones')
    <!-- Para poder verificar que error tengo
 @dump($errors->all())
 -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


                    @include('inventarios.form._inventario')


                </div>
            </div>
        </div>
    </div>
    @endsection

   

    @section('scripts')
    <!-- Librerías externas -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('assets/libs/jquery-steps/jquery-steps.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-wizard.init.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.1.0/imask.min.js"></script>

    <!-- Scripts específicos del inventario -->
    @include('inventarios.form._comedor')
    @include('inventarios.form._dormitorio')
    @include('inventarios.form._bano')
    @include('inventarios.form._sala')
    @include('inventarios.form._cocina')
    @include('inventarios.form._hall_pasillo')
    @include('inventarios.form._patio')
    @include('inventarios.form._garaje')
    @include('inventarios.form._otro')

 

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const botonGuardar = document.getElementById("botonGuardar");

            // Botón de guardar desactivado tras submit
            const formularios = [
                document.getElementById("form-horizontal"),
                document.getElementById("formularioFichaTecnica")
            ];

            formularios.forEach(form => {
                if (form) {
                    form.addEventListener("submit", function () {
                        botonGuardar.disabled = true;
                        botonGuardar.innerHTML = 'Guardando...';
                    });
                }
            });

            // Máscara para teléfono
            const telefonoInput = document.getElementById('input-telefono');
            if (telefonoInput) {
                IMask(telefonoInput, {
                    mask: '(000) 000-0000'
                });
            }

            // Máscara para valor
            const valorInput = document.getElementById('input-valor');
            if (valorInput) {
                IMask(valorInput, {
                    mask: Number,
                    thousandsSeparator: '.',
                    radix: ',',
                    scale: 2,
                    signed: false
                });
            }

            // Máscara para administración
            const administracionInput = document.getElementById('input-administracion');
            if (administracionInput) {
                IMask(administracionInput, {
                    mask: Number,
                    thousandsSeparator: '.',
                    radix: ',',
                    scale: 2,
                    signed: false
                });
            }

            // Formato para cédula
            const cedulaInput = document.getElementById('input-cedula');
            if (cedulaInput) {
                cedulaInput.addEventListener('input', function (evt) {
                    let value = evt.target.value.replace(/\D/g, '');
                    evt.target.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                });
            }
        });
    </script>





@endsection



