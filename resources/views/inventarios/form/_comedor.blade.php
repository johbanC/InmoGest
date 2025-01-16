<script>
    var contadorComedores = 1; // Variable global para contar los comedores

    function generarFilas(areaIndex) {
    const items = [
        'PUERTA', 'CHAPA', 'VENTANA', 'VIDRIO', 'PERSIANA',
        'CORTINA VERTICAL', 'LAMPARA', 'PLAFONES', 'TOMAS ELECTRICOS',
        'SUICHES', 'TOMA TELEFONO', 'TOMA PARABOLICA', 'ESTANTERIA',
        'PISO', 'PARED', 'ZOCALO', 'PINTURA'
    ];

    return items.map((item, itemIndex) => `
    <tr>
        <th scope="row">
            <input type="text" name="nombre_item[]" class="form-control" value="${item}" placeholder="Material">    
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
    var numeroComedor = contadorComedores++; // Esto debe incrementar correctamente
var nuevoComedor = `
<input type="hidden" name="nombre_area[]" value="Comedor ${numeroComedor}" class="form-control">
    <div class="accordion" id="accordionComedor${numeroComedor}">
        <div class="accordion-item border rounded">
            <h2 class="accordion-header" id="heading${numeroComedor}">
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
    
                                    <p class="card-title-desc">Carga toda la información de la sala del inmueble</p>
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
                                                ${generarFilas(numeroComedor - 1)} <!-- Usar numeroComedor aquí -->
                                            </tbody>

                                            <tfoot>
                                                <tr>
                                                    <td colspan="5">
                                                        <label for="fotos" class="form-label">Cargar Imágenes</label><br>
                                                        <input type="file" name="fotos[${numeroComedor}][]" id="fotos" accept="image/*" class="form-control" multiple onchange="previewImages(event)">
                                                    </td>
                                                </tr>
                                            </tfoot>
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

    $('#comedor-container').append(nuevoComedor);
}


    function eliminarComedor(numeroComedor) {
        $(`#accordionComedor${numeroComedor}`).remove();
    }
</script>
