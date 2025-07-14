<script>
    var nextPatioId = 7000; // IDs únicos comenzando en 7000
    var patioCounter = 0;
    var patios = [];

    function generarFilasPatio(areaIndex) {
        const items = [
            'PUERTA', 'CHAPA', 'VENTANA', 'VIDRIO', 'PERSIANA',
            'CORTINA_VERTICAL', 'LAMPARA_EXTERIOR', 'TOMAS_ELECTRICOS_EXTERIORES',
            'INTERRUPTORES', 'PISO_EXTERIOR', 'PARED_EXTERIOR', 'ZOCALO', 
            'PINTURA_EXTERIOR', 'MUEBLES_EXTERIORES', 'DECORACION', 'RIEGO',
            'ILUMINACION_AMBIENTAL', 'BARANDILLA', 'ESCALERAS_EXTERIORES'
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
                    <select class="form-select" name="estado[${areaIndex}][]" aria-label="Estado" required>
                        <option value="" disabled selected>Seleccione</option>
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

    function agregarPatio() {
        patioCounter++;
        const patioId = nextPatioId++;
        patios.push({id: patioId, counter: patioCounter});

        const nuevoPatio = `
            <div class="accordion" id="accordionPatio${patioId}">
                <div class="accordion-item border rounded">
                    <h2 class="accordion-header" id="headingPatio${patioId}">
                        <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" 
                                data-bs-target="#collapsePatio${patioId}" aria-expanded="false" 
                                aria-controls="collapsePatio${patioId}">
                            Patio #${patioCounter}
                        </button>
                    </h2>
                    <div id="collapsePatio${patioId}" class="accordion-collapse collapse" 
                         aria-labelledby="headingPatio${patioId}" data-bs-parent="#accordionPatio${patioId}">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Patio #${patioCounter}</h3>
                                            <input type="hidden" name="tipo_area[${patioId}]" value="patio">
                                            <input type="text" name="nombre_area[${patioId}]" 
                                                   placeholder="Ingrese el nombre del área" class="form-control" value="Patio #${patioCounter}" required>
                                            <p class="card-title-desc">Carga toda la información del patio/zona exterior</p>
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
                                                        ${generarFilasPatio(patioId)}
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="5">
                                                                <label class="form-label">Cargar Imágenes</label><br>
                                                                <input type="file" name="fotos[${patioId}][]" 
                                                                       accept="image/*" class="form-control" multiple>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <button type="button" class="btn btn-danger mt-3" 
                                                    onclick="eliminarPatio(${patioId})">Eliminar Patio</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;

        $('#Patio-container').append(nuevoPatio);
    }

    function eliminarPatio(patioId) {
        $(`#accordionPatio${patioId}`).remove();
        patios = patios.filter(p => p.id !== patioId);
        
        patios.forEach((patio, index) => {
            patio.counter = index + 1;
            $(`#accordionPatio${patio.id} .accordion-button`).text(`Patio #${patio.counter}`);
            $(`#accordionPatio${patio.id} .card-title`).text(`Patio #${patio.counter}`);
        });
        
        patioCounter = patios.length;
    }
</script>