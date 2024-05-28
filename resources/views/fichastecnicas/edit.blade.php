@extends('layouts.master')

@section('title') Nueva Ficha Tecnica @endsection

@section('css')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

<!-- Bootstrap Css -->
<link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css">
<!-- App Css-->
<link href="{{ URL::asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css">

<style type="text/css">
    tr td .form-group {
        margin-bottom: 0px;
    }
</style>
@endsection

@section('body')
<body data-sidebar="dark">
    @endsection

    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Nueva Ficha Tecnica @endslot
    @slot('subtitle') @endslot
    @endcomponent

    @include('layouts.notificaciones')
    <!-- @dump($errors->all()) -->
    <br>

    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ficha Tecnica</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body" style="display: block;">
                    <form action="{{ route('fichastecnicas.update', $fichatecnica) }}" method="POST" id="formularioFichaTecnica">
                        @csrf
                        @method('PUT')
                        
                        @include('fichastecnicas.form._fichatecnica-edit')
                        
                        <button type="submit" id="botonGuardar" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    @endsection

   
    @section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.1.0/imask.min.js"></script>

    <!-- App js -->
    <script src="{{ URL::asset('assets/js/app.js') }}"></script>

    <script>
        $(document).ready(function() {
            var formulario = document.getElementById("formularioFichaTecnica");
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
