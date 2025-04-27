<script>
    var nextDormitorioId = 3000; // Empezamos en 3000 para evitar colisiones con otras áreas
    var dormitorioCounter = 0;
    var dormitorios = [];

    function generarFilasDormitorio(areaIndex) {
        const items = [
            'PUERTA', 'CHAPA', 'VENTANA', 'VIDRIO', 'PERSIANA',
            'CORTINA VERTICAL', 'LAMPARA', 'PLAFONES', 'TOMAS ELECTRICOS',
            'SUICHES', 'TOMA TELEFONO', 'TOMA PARABOLICA', 'ESTANTERIA',
            'PISO', 'PARED', 'ZOCALO', 'PINTURA'
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

    function agregarDormitorio() {
        dormitorioCounter++;
        const dormitorioId = nextDormitorioId++;
        dormitorios.push({id: dormitorioId, counter: dormitorioCounter});

        const nuevoDormitorio = `
            <div class="accordion" id="accordionDormitorio${dormitorioId}">
                <div class="accordion-item border rounded">
                    <h2 class="accordion-header" id="headingDormitorio${dormitorioId}">
                        <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" 
                                data-bs-target="#collapseDormitorio${dormitorioId}" aria-expanded="false" 
                                aria-controls="collapseDormitorio${dormitorioId}">
                            Dormitorio #${dormitorioCounter}
                        </button>
                    </h2>
                    <div id="collapseDormitorio${dormitorioId}" class="accordion-collapse collapse" 
                         aria-labelledby="headingDormitorio${dormitorioId}" data-bs-parent="#accordionDormitorio${dormitorioId}">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Dormitorio #${dormitorioCounter}</h3>
                                            <input type="hidden" name="tipo_area[${dormitorioId}]" value="dormitorio">
                                            <input type="text" name="nombre_area[${dormitorioId}]" 
                                                   placeholder="Ingrese el nombre del area" class="form-control" required>
                                            <p class="card-title-desc">Carga toda la información del dormitorio del inmueble</p>
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
                                                        ${generarFilasDormitorio(dormitorioId)}
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="5">
                                                                <label for="dormitorio_fotos" class="form-label">Cargar Imágenes</label><br>
                                                                <input type="file" name="fotos[${dormitorioId}][]" 
                                                                       accept="image/*" class="form-control" multiple>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <button type="button" class="btn btn-danger mt-3" 
                                                    onclick="eliminarDormitorio(${dormitorioId})">Eliminar Dormitorio</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;

        $('#dormitorio-container').append(nuevoDormitorio);
    }

    function eliminarDormitorio(dormitorioId) {
        $(`#accordionDormitorio${dormitorioId}`).remove();
        dormitorios = dormitorios.filter(d => d.id !== dormitorioId);
        
        dormitorios.forEach((dormitorio, index) => {
            dormitorio.counter = index + 1;
            $(`#accordionDormitorio${dormitorio.id} .accordion-button`).text(`Dormitorio #${dormitorio.counter}`);
            $(`#accordionDormitorio${dormitorio.id} .card-title`).text(`Dormitorio #${dormitorio.counter}`);
        });
        
        dormitorioCounter = dormitorios.length;
    }
</script>