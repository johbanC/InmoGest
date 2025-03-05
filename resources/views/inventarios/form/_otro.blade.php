<script>
    var contadorOtros = 0; // Contador global para "Otros"
    var areaIndex = 0; // Índice de áreas

    // Agregar un nuevo "Otro"
    function agregarOtro() {
        contadorOtros++; // Incrementar el contador global de "Otros"
        var nuevoOtro = `
            <div class="accordion" id="accordionOtro${contadorOtros}">
                <div class="accordion-item border rounded">
                    <h2 class="accordion-header" id="headingOtro${contadorOtros}">
                        <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOtro${contadorOtros}" aria-expanded="false" aria-controls="collapseOtro${contadorOtros}">
                            Otro #${contadorOtros}
                        </button>
                    </h2>
                    <div id="collapseOtro${contadorOtros}" class="accordion-collapse collapse" aria-labelledby="headingOtro${contadorOtros}" data-bs-parent="#accordionOtro${contadorOtros}">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Otro #${contadorOtros}</h3>
                                            <input type="text" name="nombre_area[]" placeholder="Ingrese el nombre del área" class="form-control" required>
                                            <p class="card-title-desc">Carga toda la información del Otro del inmueble</p>
                                            
                                            <div class="table-responsive">
                                                <table class="table table-sm m-0" id="tablaOtro${contadorOtros}">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Item</th>
                                                            <th scope="col">Cantidad</th>
                                                            <th scope="col">Material</th>
                                                            <th scope="col">Estado</th>
                                                            <th scope="col">Observaciones</th>
                                                            <th scope="col">Acción</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>

                                            <button type="button" class="btn btn-primary mt-3" onclick="agregarFila(${contadorOtros})">Agregar Ítem</button>

                                            <label for="fotos" class="form-label mt-3">Cargar Imágenes</label>
                                            <input type="file" name="fotos[${contadorOtros}][]" accept="image/*" class="form-control" multiple onchange="previewImages(event)">

                                            <button type="button" class="btn btn-danger mt-3" onclick="eliminarOtro(${contadorOtros})">Eliminar Otro</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;

        $('#Otro-container').append(nuevoOtro);
    }

    // Agregar una fila a la tabla específica de "Otro"
    function agregarFila(otroIndex) {
        var nuevaFila = `
            <tr id="filaOtro${otroIndex}-${Date.now()}">
                <td>
                    <input type="text" name="nombre_item[${otroIndex}][]" class="form-control" placeholder="Nombre del Ítem" required>
                </td>
                <td>
                    <input type="number" name="cant[${otroIndex}][]" class="form-control" placeholder="Cantidad" required>
                </td>
                <td>
                    <input type="text" name="material[${otroIndex}][]" class="form-control" placeholder="Material" required>
                </td>
                <td>
                    <select class="form-select" name="estado[${otroIndex}][]" aria-label="Estado">
                        <option selected>Estado</option>
                        <option value="1">Bueno</option>
                        <option value="2">Malo</option>
                        <option value="3">Regular</option>
                    </select>
                </td>
                <td>
                    <input type="text" name="observaciones[${otroIndex}][]" class="form-control" placeholder="Observaciones" required>
                </td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm" onclick="eliminarFila(this)">X</button>
                </td>
            </tr>
        `;

        $(`#tablaOtro${otroIndex} tbody`).append(nuevaFila);
    }

    // Eliminar una fila específica
    function eliminarFila(button) {
        $(button).closest('tr').remove();
    }

    // Eliminar una sección completa de "Otro"
    function eliminarOtro(index) {
        $(`#accordionOtro${index}`).remove();
    }
</script>
