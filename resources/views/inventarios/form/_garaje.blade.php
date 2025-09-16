<script>
    var nextGarajeId = 4000; // Empezamos en 4000 para evitar colisiones con otras áreas
    var garajeCounter = 0;
    var garajes = [];

    function generarFilasGaraje(areaIndex) {
        const items = [
            'PUERTA', 'CHAPA', 'VENTANA', 'VIDRIO', 'LAVAMANOS',
            'GRIFERIA', 'SANITARIO', 'TOALLERO', 'JABONERA',
            'CEPILLERA', 'PORTA PAPEL', 'DUCHA', 'ESPEJO',
            'GABINETES', 'CABINA', 'PISO', 'PARED',
            'ZOCALO', 'TOMAS ELECTRICOS', 'SUCHES', 'LAMPARA',
            'PLAFONES', 'TECHO', 'PINTURA'
        ];

        return items.map((item) => `
            <tr>
                <th scope="row">
                    <input type="text" name="nombre_item[${areaIndex}][]" class="form-control" value="${item}" readonly>
                </th>
                <td>
                    <input type="number" name="cant[${areaIndex}][]" class="form-control" placeholder="Cantidad" required>
                </td>
                <td>
                    <input type="text" name="material[${areaIndex}][]" class="form-control" placeholder="Material" required>
                </td>
                <td>
                    <select class="form-select" name="estado[${areaIndex}][]" aria-label="Estado">
                        <option selected>Estado</option>
                        <option value="1">Bueno</option>
                        <option value="2">Malo</option>
                        <option value="3">Regular</option>
                    </select>
                </td>
                <td>
                    <input type="text" name="observaciones[${areaIndex}][]" class="form-control" placeholder="Observaciones" required>
                </td>
            </tr>
        `).join('');
    }

    function agregarGaraje() {
        garajeCounter++;
        const garajeId = nextGarajeId++;
        garajes.push({id: garajeId, counter: garajeCounter});

        const nuevoGaraje = `
            <div class="accordion" id="accordionGaraje${garajeId}">
                <div class="accordion-item border rounded">
                    <h2 class="accordion-header" id="headingGaraje${garajeId}">
                        <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" 
                                data-bs-target="#collapseGaraje${garajeId}" aria-expanded="false" 
                                aria-controls="collapseGaraje${garajeId}">
                            Garaje #${garajeCounter}
                        </button>
                    </h2>
                    <div id="collapseGaraje${garajeId}" class="accordion-collapse collapse" 
                         aria-labelledby="headingGaraje${garajeId}" data-bs-parent="#accordionGaraje${garajeId}">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Garaje #${garajeCounter}</h3>
                                            <input type="hidden" name="tipo_area[${garajeId}]" value="garaje">
                                            <input type="text" name="nombre_area[${garajeId}]" 
                                                   placeholder="Ingrese el nombre del area" class="form-control" value="Garaje #${garajeCounter}" required>
                                            <p class="card-title-desc">Carga toda la información del Garaje del inmueble</p>
                                            <div class="table-responsive">
                                                <table class="table table-sm m-0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" style="width: 180px;">Item</th>
                                                            <th scope="col" style="width: 90px;">Cantidad</th>
                                                            <th scope="col">Material</th>
                                                            <th scope="col">Estado</th>
                                                            <th scope="col">Observaciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        ${generarFilasGaraje(garajeId)}
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="5">
                                                                <label for="garaje_fotos_${garajeId}" class="form-label">Cargar Imágenes</label><br>
                                                                <input type="file" id="garaje_fotos_${garajeId}" name="fotos[${garajeId}][]" 
                                                                       accept="image/*" class="form-control" multiple
                                                                       onchange="previsualizarImagenesGaraje(${garajeId}, this)">
                                                                <div id="preview_container_garaje_${garajeId}" class="mt-3 d-flex flex-wrap gap-2">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <button type="button" class="btn btn-danger mt-3" 
                                                    onclick="eliminarGaraje(${garajeId})">Eliminar Garaje</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;

        $('#Garaje-container').append(nuevoGaraje);
    }

    function eliminarGaraje(garajeId) {
        $(`#accordionGaraje${garajeId}`).remove();
        garajes = garajes.filter(g => g.id !== garajeId);
        
        garajes.forEach((garaje, index) => {
            garaje.counter = index + 1;
            $(`#accordionGaraje${garaje.id} .accordion-button`).text(`Garaje #${garaje.counter}`);
            $(`#accordionGaraje${garaje.id} .card-title`).text(`Garaje #${garaje.counter}`);
        });
        
        garajeCounter = garajes.length;
    }

    function previsualizarImagenesGaraje(garajeId, input) {
        const container = document.getElementById(`preview_container_garaje_${garajeId}`);
        container.innerHTML = '';

        if (input.files && input.files.length > 0) {
            Array.from(input.files).forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewDiv = document.createElement('div');
                    previewDiv.className = 'position-relative';
                    previewDiv.innerHTML = `
                        <img src="${e.target.result}" alt="Preview" style="max-width: 150px; max-height: 150px; object-fit: cover;" class="border rounded">
                        <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0" 
                                onclick="eliminarImagenGaraje(${garajeId}, ${index}, this)">
                            <i class="fas fa-times"></i>
                        </button>
                    `;
                    container.appendChild(previewDiv);
                };
                reader.readAsDataURL(file);
            });
        }
    }

    function eliminarImagenGaraje(garajeId, index, button) {
        const input = document.getElementById(`garaje_fotos_${garajeId}`);
        const container = document.getElementById(`preview_container_garaje_${garajeId}`);
        
        // Crear un nuevo FileList sin la imagen eliminada
        const dt = new DataTransfer();
        Array.from(input.files).forEach((file, i) => {
            if (i !== index) dt.items.add(file);
        });
        
        input.files = dt.files;
        button.closest('.position-relative').remove();
    }
</script>