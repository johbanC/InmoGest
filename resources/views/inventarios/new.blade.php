@extends('layouts.master')

@section('title')
    Fichas Técnicas
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">


    <!-- Bootstrap Css -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{ URL::asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css">

    <link href="{{ URL::asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css">



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
            @slot('page_title')
                Inventario
            @endslot
            @slot('subtitle')
                Inventario
            @endslot
        @endcomponent

        @include('layouts.notificaciones')
        <!-- Para poder verificar que error tengo
                 {{-- @dump($errors->all()) --}}
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
        <script src="{{ URL::asset('assets/libs/select2/select2.min.js') }}"></script>

        <script>
            $(document).ready(function() {
                // Asigna el id al botón finish
                $('a[href="#finish"][role="menuitem"]').attr('id', 'btnGuardarInventario');

                // Evento para deshabilitar y cambiar el texto al hacer clic
                $(document).on('click', '#btnGuardarInventario', function(e) {
                    var $btn = $(this);
                    // Evita múltiples envíos
                    if ($btn.hasClass('disabled')) {
                        e.preventDefault();
                        return false;
                    }
                    $btn.addClass('disabled');
                    $btn.css('pointer-events', 'none');
                    $btn.text('Guardando...');
                });
            });
        </script>

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



        <!-- Select2 CSS y JS ya cargados -->

        <script>
            $(document).ready(function() {
                $('#inquilino_id').select2({
                    placeholder: "Seleccione un inquilino...",
                    allowClear: true,
                    theme: 'bootstrap-5',
                    ajax: {
                        url: '{{ route('api.inquilinos') }}',
                        dataType: 'json',
                        delay: 250,
                        data: function(params) {
                            return {
                                q: params.term
                            };
                        },
                        processResults: function(data) {
                            return {
                                results: data.results
                            };
                        },
                        cache: true
                    },
                    minimumInputLength: 2
                });
            });
        </script>
    @endsection
