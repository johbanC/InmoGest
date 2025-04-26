<script>
    var nextComedorId = 2000; // Empezamos en 2000 para evitar colisiones con otras áreas
    var comedorCounter = 0;
    var comedores = [];

    function generarFilasComedor(areaIndex) {
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

    function agregarComedor() {
        comedorCounter++;
        const comedorId = nextComedorId++;
        comedores.push({id: comedorId, counter: comedorCounter});

        const nuevoComedor = `
            <div class="accordion" id="accordionComedor${comedorId}">
                <div class="accordion-item border rounded">
                    <h2 class="accordion-header" id="headingComedor${comedorId}">
                        <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" 
                                data-bs-target="#collapseComedor${comedorId}" aria-expanded="false" 
                                aria-controls="collapseComedor${comedorId}">
                            Comedor #${comedorCounter}
                        </button>
                    </h2>
                    <div id="collapseComedor${comedorId}" class="accordion-collapse collapse" 
                         aria-labelledby="headingComedor${comedorId}" data-bs-parent="#accordionComedor${comedorId}">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Comedor #${comedorCounter}</h3>
                                            <input type="hidden" name="tipo_area[${comedorId}]" value="comedor">
                                            <input type="text" name="nombre_area[${comedorId}]" 
                                                   placeholder="Ingrese el nombre del area" class="form-control" required>
                                            <p class="card-title-desc">Carga toda la información del Comedor del inmueble</p>
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
                                                        ${generarFilasComedor(comedorId)}
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="5">
                                                                <label for="comedor_fotos" class="form-label">Cargar Imágenes</label><br>
                                                                <input type="file" name="fotos[${comedorId}][]" 
                                                                       accept="image/*" class="form-control" multiple>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <button type="button" class="btn btn-danger mt-3" 
                                                    onclick="eliminarComedor(${comedorId})">Eliminar Comedor</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;

        $('#comedor-container').append(nuevoComedor);
    }

    function eliminarComedor(comedorId) {
        $(`#accordionComedor${comedorId}`).remove();
        comedores = comedores.filter(c => c.id !== comedorId);
        
        comedores.forEach((comedor, index) => {
            comedor.counter = index + 1;
            $(`#accordionComedor${comedor.id} .accordion-button`).text(`Comedor #${comedor.counter}`);
            $(`#accordionComedor${comedor.id} .card-title`).text(`Comedor #${comedor.counter}`);
        });
        
        comedorCounter = comedores.length;
    }
</script>