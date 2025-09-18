@extends('layouts.firmasremotas')
@section('title')
    Inventario
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

    @include('layouts.notificaciones')

    <style>
        /* Estilos mejorados para el área de firma y foto */
        .signature-pad-container {
            width: 100%;
            border: 2px dashed #ccc;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
        }

        .signature-pad-title {
            font-weight: 600;
            margin-bottom: 15px;
            color: #495057;
            text-align: center;
        }

        .signature-wrapper {
            width: 100%;
            position: relative;
            background-color: #f5f5f5;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            overflow: hidden;
        }

        .signature-pad {
            width: 100% !important;
            height: 200px;
            display: block;
            touch-action: none;
        }

        .photo-preview {
            max-width: 100%;
            max-height: 300px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .photo-controls {
            margin: 15px 0;
        }

        #photo-preview-container {
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 5px;
            margin-top: 10px;
        }

        /* Estilos para el modal de imágenes mejorado */
        #imageModal .modal-content {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
        }
        
        #imageModal .modal-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #e9ecef;
            padding: 12px 20px;
        }
        
        #imageModal .modal-body {
            max-height: 70vh;
            overflow: auto;
            padding: 0;
        }
        
        #imageModal .modal-footer {
            border-top: 1px solid #e9ecef;
            padding: 12px 20px;
        }
        
        .image-container {
            transition: transform 0.2s ease;
        }
        
        .image-container:hover {
            transform: translateY(-5px);
            cursor: pointer;
        }
        
        .img-thumbnail {
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .img-thumbnail:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            opacity: 0.9;
        }
        
        /* Efecto de zoom suave al hacer hover en las miniaturas */
        .card-img-top {
            transition: transform 0.3s ease;
            height: 180px;
            object-fit: cover;
        }
        
        .card:hover .card-img-top {
            transform: scale(1.03);
        }
        
        /* Estilos para las tarjetas de imágenes */
        .card {
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .card:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
        }
        
        .card-body {
            padding: 10px;
        }

        /* Estilos responsivos */
        @media (max-width: 768px) {
            .col-md-4 {
                margin-bottom: 20px;
            }
            
            .signature-pad {
                height: 150px;
            }
            
            .btn {
                width: 100%;
                margin-bottom: 10px;
            }
            
            #imageModal .modal-dialog {
                margin: 10px;
            }
        }
    </style>

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
                                </h3>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <address>
                                        <strong>Inventario</strong><br>
                                        Codigo: {{ $inventario->codigo }}<br>
                                        Numero de documento: {{ $inventario->cliente->tipoDocumento->acronimo ?? '' }}
                                        {{ $inventario->cliente->numero_documento }}<br>
                                        Inquilino: {{ $inventario->cliente->nombre }}
                                        {{ $inventario->cliente->apellido }}<br>
                                        Numero: {{ $inventario->cliente->telefono }} <br>
                                        Email: {{ $inventario->cliente->email }} <br>
                                        Direccion: {{ $inventario->direccion }} <br>
                                        Tipo de inmueble: {{ $inventario->tipo_inmueble->nombre }} <br>
                                    </address>
                                </div>

                                @php
                                    $firmaEntrega = $firmas->firstWhere('rol_firmante', 'entrega');
                                    $firmaRecibe = $firmas->firstWhere('rol_firmante', 'recibe');
                                @endphp

                                <div class="col-md-4">
                                    {{-- <div class="card-tools">
                                        @if ($firmaEntrega)
                                            <button type="button" class="btn btn-secondary waves-effect waves-light"
                                                data-bs-toggle="modal"
                                                data-bs-target=".bs-example-modal-lg-ver-entrega">
                                                Ver firma de quien entrega
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
                                    </div> --}}
                                </div>

                                <div class="col-md-4">
                                    <div class="card-tools">
                                        @if ($firmaRecibe)
                                            <button type="button" class="btn btn-secondary waves-effect waves-light"
                                                data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg-ver-recibe">
                                                Ver firma de quien recibe
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
                            </div>
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
                                                                    <th class="text-center"><strong>Cantidad</strong></th>
                                                                    <th class="text-center"><strong>Material</strong></th>
                                                                    <th class="text-center"><strong>Estado</strong></th>
                                                                    <th class="text-center"><strong>Observaciones</strong></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($area->items as $item)
                                                                    <tr>
                                                                        <td>{{ $item->nombre_item }}</td>
                                                                        <td class="text-center">{{ $item->cantidad }}</td>
                                                                        <td class="text-center">{{ $item->material }}</td>
                                                                        <td class="text-center">{{ $item->estado }}</td>
                                                                        <td class="text-center">{{ $item->observacion }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    
                                                    <!-- Galería de imágenes -->
                                                    <div class="row mt-4">
                                                        @foreach ($area->fotos as $foto)
                                                            <div class="col-md-3 mb-3 image-container">
                                                                <div class="card h-100">
                                                                    <img src="{{ asset($foto->ruta_foto) }}"
                                                                        class="card-img-top img-fluid"
                                                                        alt="Foto de {{ $area->nombre_area }}"
                                                                        onclick="openModal(this)">
                                                                    <div class="card-body">
                                                                        <p class="text-center mb-0">{{ $foto->codigo }}</p>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para mostrar la imagen en tamaño grande - Versión mejorada -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Vista previa de imagen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center p-0">
                    <img class="img-fluid" id="modalImage">
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <a id="downloadImage" href="#" class="btn btn-primary" download>
                        <i class="fas fa-download me-1"></i> Descargar
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ URL::asset('assets/js/app.js') }}"></script>
    <!-- Agregar Font Awesome para el icono de descarga -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

    <script>
        // Función genérica para inicializar los pads de firma
        function initializeSignaturePad(modalType) {
            const canvas = document.getElementById(`signature-pad-${modalType}`);
            if (!canvas) {
                console.warn(`No se encontró el canvas para ${modalType}`);
                return null;
            }

            const signaturePad = new SignaturePad(canvas, {
                backgroundColor: 'rgba(255, 255, 255, 1)',
                penColor: 'rgb(0, 0, 0)',
                minWidth: 1,
                maxWidth: 3,
                throttle: 16
            });

            const photoInput = document.getElementById(`foto_firmante_${modalType}`);
            const takePhotoBtn = document.getElementById(`take-photo_${modalType}`);
            const removePhotoBtn = document.getElementById(`remove-photo_${modalType}`);
            const photoPreviewContainer = document.getElementById(`photo-preview-container-${modalType}`);
            const photoPreview = document.getElementById(`preview-${modalType}`);
            const saveBtn = document.querySelector(`.save-signature[data-target="${modalType}"]`);
            const form = document.getElementById(`formularioFirmaDigital_${modalType}`);
            const clearBtn = document.getElementById(`clear-${modalType}`);

            // Confirmar que todos los elementos existan
            if (!photoInput || !takePhotoBtn || !removePhotoBtn || !photoPreviewContainer || 
                !photoPreview || !saveBtn || !form || !clearBtn) {
                console.warn(`Faltan elementos para modal ${modalType}`);
                return null;
            }

            // Redimensionar canvas cuando se muestra el modal
            $(`.bs-example-modal-lg-${modalType}`).on('shown.bs.modal', function() {
                resizeCanvas();
            });

            function resizeCanvas() {
                const ratio = Math.max(window.devicePixelRatio || 1, 1);
                canvas.width = canvas.offsetWidth * ratio;
                canvas.height = canvas.offsetHeight * ratio;
                canvas.getContext("2d").scale(ratio, ratio);
                
                // Si ya había una firma, volver a dibujarla después de redimensionar
                if (!signaturePad.isEmpty()) {
                    const data = signaturePad.toData();
                    signaturePad.clear();
                    signaturePad.fromData(data);
                }
            }

            clearBtn.addEventListener('click', function() {
                signaturePad.clear();
            });

            takePhotoBtn.addEventListener('click', function(e) {
                e.preventDefault();
                photoInput.click();
            });

            photoInput.addEventListener('change', function() {
                const file = photoInput.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        photoPreview.src = e.target.result;
                        photoPreviewContainer.style.display = 'block';
                        removePhotoBtn.disabled = false;
                    };
                    reader.readAsDataURL(file);
                }
            });

            removePhotoBtn.addEventListener('click', function() {
                photoInput.value = '';
                photoPreview.src = '';
                photoPreviewContainer.style.display = 'none';
                removePhotoBtn.disabled = true;
            });

            saveBtn.addEventListener('click', function() {
                if (signaturePad.isEmpty()) {
                    alert("Por favor, proporcione una firma primero.");
                    return;
                }

                if (!photoInput.files[0]) {
                    alert("Por favor, tome una foto.");
                    return;
                }

                const signatureData = signaturePad.toDataURL();
                const inputFirma = document.getElementById(`firma_${modalType}`);
                inputFirma.value = signatureData;

                // Deshabilitar botón para evitar múltiples envíos
                saveBtn.disabled = true;
                saveBtn.innerHTML = 'Guardando...';
                
                form.submit();
            });

            return signaturePad;
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Inicializar ambos pads de firma
            initializeSignaturePad('entrega');
            initializeSignaturePad('recibe');

            // Manejar el parámetro 'destino' de la URL
            const params = new URLSearchParams(window.location.search);
            const destino = params.get('destino');
            if (destino) {
                const destinoInput = document.querySelector('input[name="destino"]');
                if (destinoInput) {
                    destinoInput.value = destino;
                }
            }
        });

        // Función para abrir el modal con la imagen
        function openModal(imgElement) {
            const modal = new bootstrap.Modal(document.getElementById('imageModal'));
            const modalImage = document.getElementById('modalImage');
            const downloadLink = document.getElementById('downloadImage');
            
            modalImage.src = imgElement.src;
            downloadLink.href = imgElement.src;
            downloadLink.download = 'imagen-inventario-' + new Date().getTime() + '.jpg';
            
            modal.show();
        }
    </script>
@endsection