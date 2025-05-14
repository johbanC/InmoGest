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

                                    <div class="col-md-4">

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-primary waves-effect waves-light"
                                                data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Crear
                                                nuevo</button>
                                            @include('inventarios.modal.modal-nuevo')
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="wrapper">
                                            <h3>Firma de la persona que recibe</h3>
                                            <canvas id="signature-pad-recibe" class="signature-pad" width="400"
                                                height="200"></canvas>
                                            <button id="clear-recibe" class="btn btn-danger waves-effect waves-light"
                                                type="button">Limpiar firma</button>
                                            <h3>Foto de la persona que recibe</h3>
                                            <input type="file" id="photo-recibe" accept="image/*" class="form-control"
                                                capture="user">
                                            <img id="preview-recibe" src=""
                                                alt="Previsualización de la foto de quien recibe"
                                                style="display: none; margin-top: 10px; max-width: 100%; border: 1px solid #ddd; border-radius: 5px;">
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


           <script>
// // Initialize the signature pad for "persona que entrega"
// var signaturePadEntrega = new SignaturePad(document.getElementById('signature-pad-entrega'), {
//     backgroundColor: 'rgba(245, 245, 245, 1)', // Fondo gris claro
//     penColor: 'rgb(0, 0, 0)'
// });

// Initialize the signature pad for "persona que recibe"
var signaturePadRecibe = new SignaturePad(document.getElementById('signature-pad-recibe'), {
    backgroundColor: 'rgba(245, 245, 245, 1)', // Fondo gris claro
    penColor: 'rgb(0, 0, 0)'
});

// // Clear button for "persona que entrega"
// var clearButtonEntrega = document.getElementById('clear-entrega');
// clearButtonEntrega.addEventListener('click', function() {
//     console.log('Botón "Limpiar firma" presionado para persona que entrega');
//     signaturePadEntrega.clear();
// });

// Clear button for "persona que recibe"
var clearButtonRecibe = document.getElementById('clear-recibe');
clearButtonRecibe.addEventListener('click', function() {
    console.log('Botón "Limpiar firma" presionado para persona que recibe');
    signaturePadRecibe.clear();
});

// // File input for "persona que entrega"
// var photoEntrega = document.getElementById('photo-entrega');
// var previewEntrega = document.getElementById('preview-entrega');
// photoEntrega.addEventListener('change', function() {
//     var file = photoEntrega.files[0];
//     if (file) {
//         var reader = new FileReader();
//         reader.onload = function(e) {
//             previewEntrega.src = e.target.result;
//             previewEntrega.style.display = 'block';
//         };
//         reader.readAsDataURL(file);
//     } else {
//         previewEntrega.src = '';
//         previewEntrega.style.display = 'none';
//     }
// });

// File input for "persona que recibe"
var photoRecibe = document.getElementById('photo-recibe');
var previewRecibe = document.getElementById('preview-recibe');
photoRecibe.addEventListener('change', function() {
    var file = photoRecibe.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            previewRecibe.src = e.target.result;
            previewRecibe.style.display = 'block';
        };
        reader.readAsDataURL(file);
    } else {
        previewRecibe.src = '';
        previewRecibe.style.display = 'none';
    }
});
</script>
        @endsection
