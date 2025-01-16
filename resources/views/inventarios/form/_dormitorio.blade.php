<script>
    var contadorDormitorios = 0; // Variable global para contar los Dormitorios

    // Generar filas para los items de cada área (dormitorio)
    function generarFilas(areaIndex) {
        const items = [
            'PUERTA', 'CHAPA', 'VENTANA', 'VIDRIO', 'PERSIANA',
            'CORTINA VERTICAL', 'LAMPARA', 'PLAFONES', 'TOMAS ELECTRICOS',
            'SUICHES', 'TOMA TELEFONO', 'TOMA PARABOLICA', 'ESTANTERIA',
            'PISO', 'PARED', 'ZOCALO', 'PINTURA'
        ];

        return items.map((item) => `
            <tr>
                <th scope="row">
                    <input type="text" name="nombre_item[${areaIndex}][]" class="form-control" value="${item}" placeholder="Material" readonly>
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

    // Agregar un nuevo dormitorio
    function agregarDormitorio() {
        contadorDormitorios++; // Incrementar el contador global
        var nuevoDormitorio = `
            <div class="accordion" id="accordionDormitorio${areaIndex}">
                <div class="accordion-item border rounded">
                    <h2 class="accordion-header" id="headingDormitorio${areaIndex}">
                        <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDormitorio${areaIndex}" aria-expanded="false" aria-controls="collapseDormitorio${areaIndex}">
                            Dormitorio #${contadorDormitorios}
                        </button>
                    </h2>
                    <div id="collapseDormitorio${areaIndex}" class="accordion-collapse collapse" aria-labelledby="headingDormitorio${areaIndex}" data-bs-parent="#accordionDormitorio${areaIndex}">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Dormitorio #${contadorDormitorios}</h3>
                                            <input type="hidden" name="nombre_area[]" value="Dormitorio ${areaIndex + 1}" class="form-control">
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
                                                        ${generarFilas(areaIndex, 'dormitorio')}
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="5">
                                                                <label for="fotos" class="form-label">Cargar Imágenes</label><br>
                                                                <input type="file" name="fotos[${areaIndex}][]" id="fotos" accept="image/*" class="form-control" multiple onchange="previewImages(event)">
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <button type="button" class="btn btn-danger mt-3" onclick="eliminarDormitorio(${areaIndex})">Eliminar Dormitorio</button>
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
        areaIndex++; // Incrementar el contador global
    }

    function eliminarDormitorio(index) {
        $(`#accordionDormitorio${index}`).remove();
    }
</script>