@extends('layouts.master')
@section('title')
    Invoice
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
                {{ $inventario->codigo }}
            @endslot
        @endcomponent


        <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12">
                                <div class="invoice-title">
                                    <h4 class="float-end font-size-16">
                                        Inventario # {{ $inventario->codigo }}
                                        <br>
                                        Fecha del inventario : {{ $inventario->fecha }}
                                    </h4>
                                    <h3>
                                        <img src="{{ URL::asset('assets/images/empresa/Logos_Dream_House_Horizontal_Color_JPG-removebg-preview.png') }}"
                                            alt="logo" height="80" />
                                        <!-- aqui deberia de ir el logo de la empresa -->
                                    </h3>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <address>
                                            <strong>Inventario</strong><br>
                                            Codigo: {{ $inventario->codigo }}<br>
                                            Inquilino: {{ $inventario->inquilino }}<br>
                                            Numero: {{ $inventario->numero_inquilino }} <br>
                                            Email: {{ $inventario->email_inquilino }} <br>
                                            Direccion: {{ $inventario->direccion }} <br>
                                            Tipo de inmueble: {{ $inventario->tipo_inmueble->nombre }} <br>

                                        </address>
                                    </div>

                                    @php
                                        $firmaEntrega = $firmas->firstWhere('rol_firmante', 'entrega');
                                        $firmaRecibe = $firmas->firstWhere('rol_firmante', 'recibe');
                                    @endphp

                                    <div class="col-md-4">
                                        <div class="card-tools">
                                            @if ($firmaEntrega)
                                            <button type="button" class="btn btn-secondary waves-effect waves-light"
                                                    data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg-ver-entrega">
                                                    Firma de quien entrega ya registrada
                                                </button> 
                                                @include('inventarios.modal.modal-ver-entrega', [
                                                    'firma' => $firmaEntrega,
                                                ])
                                            @else
                                                <button type="button" class="btn btn-primary waves-effect waves-light"
                                                    data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg-entrega">
                                                    Agregar firma de quien entrega
                                                </button>
                                                @include('inventarios.modal.modal-nuevo-entrega')
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card-tools">
                                            @if ($firmaRecibe)
                                                <button type="button" class="btn btn-secondary waves-effect waves-light"
                                                    data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg-ver-recibe">
                                                    Firma de quien entrega ya registrada
                                                </button> 
                                                @include('inventarios.modal.modal-ver-recibe', [
                                                    'firma' => $firmaRecibe,
                                                ])
                                            @else
                                                <button type="button" class="btn btn-primary waves-effect waves-light"
                                                    data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg-recibe">
                                                    Agregar firma de quien recibe
                                                </button>
                                                @include('inventarios.modal.modal-nuevo-recibe')
                                            @endif
                                        </div>
                                    </div>




                                    {{-- <div class="col-6 text-end">
                                        <address>
                                            <strong>Shipped To:</strong><br>
                                            Kenny Rigdon<br>
                                            1234 Main<br>
                                            Apt. 4B<br>
                                            Springfield, ST 54321
                                        </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mt-4">
                                        <address>
                                            <strong>Payment Method:</strong><br>
                                            Visa ending **** 4242<br>
                                            jsmith@email.com
                                        </address>
                                    </div>
                                    <div class="col-6 mt-4 text-end">
                                        <address>
                                            <strong>Fecha del inventario</strong><br>
                                            {{ $inventario->fecha }}<br><br>
                                        </address>
                                    </div>
                                </div> --}}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <div class="p-2">
                                            <h3 class="font-size-16"><strong>Áreas</strong></h3>
                                        </div>
                                        <div class="accordion" id="areasAccordion">
                                            @foreach ($inventario->areas as $key => $area)
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="heading{{ $key }}">
                                                        <button class="accordion-button {{ $key > 0 ? 'collapsed' : '' }}"
                                                            type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#collapse{{ $key }}"
                                                            aria-expanded="{{ $key === 0 ? 'true' : 'false' }}"
                                                            aria-controls="collapse{{ $key }}">
                                                            {{ $area->nombre_area }}
                                                        </button>
                                                    </h2>
                                                    <div id="collapse{{ $key }}"
                                                        class="accordion-collapse collapse {{ $key === 0 ? 'show' : '' }}"
                                                        aria-labelledby="heading{{ $key }}"
                                                        data-bs-parent="#areasAccordion">
                                                        <div class="accordion-body">
                                                            <!-- Tabla de ítems -->
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th><strong>Item</strong></th>
                                                                            <th class="text-center">
                                                                                <strong>Cantidad</strong>
                                                                            </th>
                                                                            <th class="text-center">
                                                                                <strong>Material</strong>
                                                                            </th>
                                                                            <th class="text-center"><strong>Estado</strong>
                                                                            </th>
                                                                            <th class="text-center">
                                                                                <strong>Observaciones</strong>
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($area->items as $item)
                                                                            <tr>
                                                                                <td>{{ $item->nombre_item }}</td>
                                                                                <td class="text-center">
                                                                                    {{ $item->cantidad }}
                                                                                </td>
                                                                                <td class="text-center">
                                                                                    {{ $item->material }}
                                                                                </td>
                                                                                <td class="text-center">{{ $item->estado }}
                                                                                </td>
                                                                                <td class="text-center">
                                                                                    {{ $item->observacion }}</td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <!-- Galería de imágenes -->
                                                            <div class="row mt-4">
                                                                @foreach ($area->fotos as $foto)
                                                                    <div class="col-md-3 mb-3">
                                                                        <div class="card">
                                                                            <img src="{{ asset($foto->ruta_foto) }}"
                                                                                class="card-img-top"
                                                                                alt="Foto de {{ $area->nombre_area }}">
                                                                            <div class="card-body">
                                                                                <p class="text-center mb-0">
                                                                                    {{ $foto->codigo }}
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="d-print-none mt-4">
                                            <div class="float-end">
                                                <a href="javascript:window.print()"
                                                    class="btn btn-success waves-effect waves-light">
                                                    <i class="fa fa-print"></i> Imprimir
                                                </a>
                                                <a href="#"
                                                    class="btn btn-primary waves-effect waves-light">Enviar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        @endsection
        @section('scripts')
            <script src="{{ URL::asset('assets/js/app.js') }}"></script>
            <script src="{{ URL::asset('assets/js/modals.js') }}"></script>
        @endsection
