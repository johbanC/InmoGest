<script>
    var nextHallPasilloId = 5000; // IDs únicos comenzando en 5000
    var hallPasilloCounter = 0;
    var hallPasillos = [];

    function generarFilasHallPasillo(areaIndex) {
        const items = [
            'PUERTA', 'CHAPA', 'VENTANA', 'VIDRIO', 'PERSIANA',
            'CORTINA VERTICAL', 'LAMPARA', 'PLAFONES', 'TOMAS ELECTRICOS',
            'SUICHES', 'TOMA TELEFONO', 'TOMA PARABOLICA', 'ESTANTERIA',
            'PISO', 'PARED', 'ZOCALO', 'PINTURA', 'CUADROS', 'ESPEJOS'
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

    function agregarHallPasillo() {
        hallPasilloCounter++;
        const hallPasilloId = nextHallPasilloId++;
        hallPasillos.push({id: hallPasilloId, counter: hallPasilloCounter});

        const nuevoHallPasillo = `
            <div class="accordion" id="accordionHallPasillo${hallPasilloId}">
                <div class="accordion-item border rounded">
                    <h2 class="accordion-header" id="headingHallPasillo${hallPasilloId}">
                        <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" 
                                data-bs-target="#collapseHallPasillo${hallPasilloId}" aria-expanded="false" 
                                aria-controls="collapseHallPasillo${hallPasilloId}">
                            Hall/Pasillo #${hallPasilloCounter}
                        </button>
                    </h2>
                    <div id="collapseHallPasillo${hallPasilloId}" class="accordion-collapse collapse" 
                         aria-labelledby="headingHallPasillo${hallPasilloId}" data-bs-parent="#accordionHallPasillo${hallPasilloId}">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Hall/Pasillo #${hallPasilloCounter}</h3>
                                            <input type="hidden" name="tipo_area[${hallPasilloId}]" value="hall_pasillo">
                                            <input type="text" name="nombre_area[${hallPasilloId}]" 
                                                   placeholder="Ingrese el nombre del área" class="form-control" value=" Hall/Pasillo #${hallPasilloCounter}" required>
                                            <p class="card-title-desc">Carga toda la información del Hall/Pasillo del inmueble</p>
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
                                                        ${generarFilasHallPasillo(hallPasilloId)}
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="5">
                                                                <label for="hall_pasillo_fotos_${hallPasilloId}" class="form-label">Cargar Imágenes</label><br>
                                                                <input type="file" id="hall_pasillo_fotos_${hallPasilloId}" name="fotos[${hallPasilloId}][]" 
                                                                       accept="image/*" class="form-control" multiple
                                                                       onchange="previsualizarImagenesHallPasillo(${hallPasilloId}, this)">
                                                                <div id="preview_container_hall_pasillo_${hallPasilloId}" class="mt-3 d-flex flex-wrap gap-2">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <button type="button" class="btn btn-danger mt-3" 
                                                    onclick="eliminarHallPasillo(${hallPasilloId})">Eliminar Hall/Pasillo</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;

        $('#hall_pasillo-container').append(nuevoHallPasillo);
    }

    function eliminarHallPasillo(hallPasilloId) {
        $(`#accordionHallPasillo${hallPasilloId}`).remove();
        hallPasillos = hallPasillos.filter(h => h.id !== hallPasilloId);
        
        hallPasillos.forEach((hallPasillo, index) => {
            hallPasillo.counter = index + 1;
            $(`#accordionHallPasillo${hallPasillo.id} .accordion-button`).text(`Hall/Pasillo #${hallPasillo.counter}`);
            $(`#accordionHallPasillo${hallPasillo.id} .card-title`).text(`Hall/Pasillo #${hallPasillo.counter}`);
        });
        
        hallPasilloCounter = hallPasillos.length;
    }

    function previsualizarImagenesHallPasillo(hallPasilloId, input) {
        const container = document.getElementById(`preview_container_hall_pasillo_${hallPasilloId}`);
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
                                onclick="eliminarImagenHallPasillo(${hallPasilloId}, ${index}, this)">
                            <i class="fas fa-times"></i>
                        </button>
                    `;
                    container.appendChild(previewDiv);
                };
                reader.readAsDataURL(file);
            });
        }
    }

    function eliminarImagenHallPasillo(hallPasilloId, index, button) {
        const input = document.getElementById(`hall_pasillo_fotos_${hallPasilloId}`);
        const container = document.getElementById(`preview_container_hall_pasillo_${hallPasilloId}`);
        
        // Crear un nuevo FileList sin la imagen eliminada
        const dt = new DataTransfer();
        Array.from(input.files).forEach((file, i) => {
            if (i !== index) dt.items.add(file);
        });
        
        input.files = dt.files;
        button.closest('.position-relative').remove();
    }
</script>