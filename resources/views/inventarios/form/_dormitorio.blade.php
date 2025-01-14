

<script>
    var contadorDormitorios = 1;  // Variable global para contar los Dormitorios
    var contadorComedores = 1;    // Variable global para contar los Comedores

    function generarFilas(areaIndex, tipo) {
        const items = [
            'PUERTA', 'CHAPA', 'VENTANA', 'VIDRIO', 'PERSIANA',
            'CORTINA VERTICAL', 'LAMPARA', 'PLAFONES', 'TOMAS ELECTRICOS',
            'SUICHES', 'TOMA TELEFONO', 'TOMA PARABOLICA', 'ESTANTERIA',
            'PISO', 'PARED', 'ZOCALO', 'PINTURA'
        ];

        return items.map((item, itemIndex) => `
        <tr>
            <th scope="row">${item}</th>
            <td>
                <input type="number" name="cant[${tipo}][${areaIndex}][]" class="form-control" placeholder="Cantidad" required>
            </td>
            <td>
                <input type="text" name="material[${tipo}][${areaIndex}][]" class="form-control" placeholder="Material" required>
            </td>
            <td>
                <select class="form-select" name="estado[${tipo}][${areaIndex}][]" aria-label="Estado">
                    <option selected>Estado</option>
                    <option value="1">Bueno</option>
                    <option value="2">Malo</option>
                    <option value="3">Regular</option>
                </select>
            </td>
            <td>
                <input type="text" name="observaciones[${tipo}][${areaIndex}][]" class="form-control" placeholder="Observaciones" required>
            </td>
        </tr>
    `).join('');
    }

    // Función para agregar Dormitorio
    function agregarDormitorio() {
        var numeroDormitorio = contadorDormitorios++;  // Incrementar el contador de dormitorios

        var nuevoDormitorio = `
        <div class="accordion" id="accordionDormitorio${numeroDormitorio}">
            <div class="accordion-item border rounded">
                <h2 class="accordion-header" id="headingDormitorio${numeroDormitorio}">
                    <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDormitorio${numeroDormitorio}" aria-expanded="false" aria-controls="collapseDormitorio${numeroDormitorio}">
                        Dormitorio #${numeroDormitorio}
                    </button>
                </h2>
                <div id="collapseDormitorio${numeroDormitorio}" class="accordion-collapse collapse" aria-labelledby="headingDormitorio${numeroDormitorio}" data-bs-parent="#accordionDormitorio${numeroDormitorio}">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Dormitorio #${numeroDormitorio}</h3>
                                        <input type="text" name="nombre_area[]" value="Dormitorio ${numeroDormitorio}" class="form-control">  
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
                                                    ${generarFilas(numeroDormitorio - 1, 'dormitorio')} <!-- Pasar el índice del área y el tipo -->
                                                </tbody>
                                            </table>
                                        </div>
                                        <button type="button" class="btn btn-danger mt-3" onclick="eliminarDormitorio(${numeroDormitorio})">Eliminar Dormitorio</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>`;

        $('#Dormitorio-container').append(nuevoDormitorio);
    }

    function eliminarDormitorio(numeroDormitorio) {
        $(`#accordionDormitorio${numeroDormitorio}`).remove();
    }

    // Función para agregar Comedor
    function agregarComedor() {
        var numeroComedor = contadorComedores++;  // Incrementar el contador de comedores

        var nuevoComedor = `
        <div class="accordion" id="accordionComedor${numeroComedor}">
            <div class="accordion-item border rounded">
                <h2 class="accordion-header" id="headingComedor${numeroComedor}">
                    <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseComedor${numeroComedor}" aria-expanded="false" aria-controls="collapseComedor${numeroComedor}">
                        Comedor #${numeroComedor}
                    </button>
                </h2>
                <div id="collapseComedor${numeroComedor}" class="accordion-collapse collapse" aria-labelledby="headingComedor${numeroComedor}" data-bs-parent="#accordionComedor${numeroComedor}">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Comedor #${numeroComedor}</h3>
                                        <input type="text" name="nombre_area[]" value="Comedor ${numeroComedor}" class="form-control">  
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
                                                    ${generarFilas(numeroComedor - 1, 'comedor')} <!-- Pasar el índice del área y el tipo -->
                                                </tbody>
                                            </table>
                                        </div>
                                        <button type="button" class="btn btn-danger mt-3" onclick="eliminarComedor(${numeroComedor})">Eliminar Comedor</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>`;

        $('#Comedor-container').append(nuevoComedor);
    }

    function eliminarComedor(numeroComedor) {
        $(`#accordionComedor${numeroComedor}`).remove();
    }
</script>




