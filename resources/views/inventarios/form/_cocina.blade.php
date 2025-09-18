<script>
    var nextCocinaId = 1000; // Empezamos en 1000 para evitar colisiones con baños
    var cocinaCounter = 0;
    var cocinas = [];

    function generarFilasCocina(areaIndex) {
        const items = [
            'TIPO DE COCINA', 'PUERTA', 'CHAPA', 'VENTANA', 'VIDRIO', 'BARRA AMERICANA', 'GABINETES', 
            'LAVAPLATOS', 'MEZCLADOR', 'CANILLAS', 'ESTUFA', 'HORNO', 'LÁMPARA', 'TOMA ELÉCTRICO', 
            'SWICHES', 'TRIFILAR', 'BIFILAR', 'TOMA TELÉFONO', 'TIMBRE', 'CAJA DE FRENCES', 'CAMPANA EXTRACTORA', 
            'DESPENSA', 'PISO', 'PARED', 'ZÓCALO', 'PINTURA', 'TECHO', 'LLAVES DE PASO GAS'
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

    function agregarCocina() {
        cocinaCounter++;
        const cocinaId = nextCocinaId++;
        cocinas.push({id: cocinaId, counter: cocinaCounter});

        const nuevaCocina = `
            <div class="accordion" id="accordionCocina${cocinaId}">
                <div class="accordion-item border rounded">
                    <h2 class="accordion-header" id="headingCocina${cocinaId}">
                        <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" 
                                data-bs-target="#collapseCocina${cocinaId}" aria-expanded="false" 
                                aria-controls="collapseCocina${cocinaId}">
                            Cocina #${cocinaCounter}
                        </button>
                    </h2>
                    <div id="collapseCocina${cocinaId}" class="accordion-collapse collapse" 
                         aria-labelledby="headingCocina${cocinaId}" data-bs-parent="#accordionCocina${cocinaId}">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Cocina #${cocinaCounter}</h3>
                                            <input type="hidden" name="tipo_area[${cocinaId}]" value="cocina">
                                            <input type="text" name="nombre_area[${cocinaId}]" 
                                                   placeholder="Ingrese el nombre del area" class="form-control" value="Cocina #${cocinaCounter}" required>
                                            <p class="card-title-desc">Carga toda la información de la Cocina del inmueble</p>
                                            <div class="table-responsive">
                                                <table class="table table-sm m-0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Item</th>
                                                            <th scope="col">Cantidad</th>
                                                            <th scope="col">Material</th>
                                                            <th scope="col">Estado</th>
                                                            <th scope="col">Observaciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        ${generarFilasCocina(cocinaId)}
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="5">
                                                                <label for="cocina_fotos_${cocinaId}" class="form-label">Cargar Imágenes</label><br>
                                                                <input type="file" id="cocina_fotos_${cocinaId}" name="fotos[${cocinaId}][]" 
                                                                       accept="image/*" class="form-control" multiple
                                                                       onchange="previsualizarImagenesCocina(${cocinaId}, this)">
                                                                <div id="preview_container_cocina_${cocinaId}" class="mt-3 d-flex flex-wrap gap-2">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <button type="button" class="btn btn-danger mt-3" 
                                                    onclick="eliminarCocina(${cocinaId})">Eliminar Cocina</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;

        $('#Cocina-container').append(nuevaCocina);
    }

    function eliminarCocina(cocinaId) {
        $(`#accordionCocina${cocinaId}`).remove();
        cocinas = cocinas.filter(c => c.id !== cocinaId);
        
        cocinas.forEach((cocina, index) => {
            cocina.counter = index + 1;
            $(`#accordionCocina${cocina.id} .accordion-button`).text(`Cocina #${cocina.counter}`);
            $(`#accordionCocina${cocina.id} .card-title`).text(`Cocina #${cocina.counter}`);
        });
        
        cocinaCounter = cocinas.length;
    }

    function previsualizarImagenesCocina(cocinaId, input) {
        const container = document.getElementById(`preview_container_cocina_${cocinaId}`);
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
                                onclick="eliminarImagenCocina(${cocinaId}, ${index}, this)">
                            <i class="fas fa-times"></i>
                        </button>
                    `;
                    container.appendChild(previewDiv);
                };
                reader.readAsDataURL(file);
            });
        }
    }

    function eliminarImagenCocina(cocinaId, index, button) {
        const input = document.getElementById(`cocina_fotos_${cocinaId}`);
        const container = document.getElementById(`preview_container_cocina_${cocinaId}`);
        
        // Crear un nuevo FileList sin la imagen eliminada
        const dt = new DataTransfer();
        Array.from(input.files).forEach((file, i) => {
            if (i !== index) dt.items.add(file);
        });
        
        input.files = dt.files;
        button.closest('.position-relative').remove();
    }
</script>