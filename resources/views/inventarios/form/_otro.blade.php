<script>
    var contadorOtros = 0; // Contador global para Otros

    // Generar una fila vacía para ingresar manualmente los datos
    function generarFila(areaIndex) {
        return `
            <tr id="fila-${areaIndex}-${Date.now()}">
                <th scope="row">
                    <input type="text" name="nombre_item[${areaIndex}][]" class="form-control" placeholder="Ingrese el ítem">
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
                <td>
                    <button type="button" class="btn btn-danger btn-sm" onclick="eliminarFila(this)">🗑</button>
                </td>
            </tr>
        `;
    }

    // Agregar una nueva Otro
    function agregarOtro() {
        contadorOtros++; // Incrementar contador
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
                                            <p class="card-title-desc">Carga toda la información de la Otro del inmueble</p>
                                            <div class="table-responsive">
                                                <table class="table table-sm m-0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" style="width: 180px;">Item</th>
                                                            <th scope="col" style="width: 90px;">Cantidad</th>
                                                            <th scope="col">Material</th>
                                                            <th scope="col">Estado</th>
                                                            <th scope="col">Observaciones</th>
                                                            <th scope="col">Acción</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tablaOtro${contadorOtros}">
                                                        ${generarFila(contadorOtros)}
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="6">
                                                                <button type="button" class="btn btn-primary btn-sm" onclick="agregarFila(${contadorOtros})">Agregar Fila</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="6">
                                                                <label for="fotosOtro${contadorOtros}" class="form-label">Cargar Imágenes</label><br>
                                                                <input type="file" name="fotos[${contadorOtros}][]" id="fotosOtro${contadorOtros}" accept="image/*" class="form-control" multiple>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
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

    // Agregar una fila vacía a la tabla de una Otro específica
    function agregarFila(index) {
        $(`#tablaOtro${index}`).append(generarFila(index));
    }

    // Eliminar una fila específica
    function eliminarFila(boton) {
        $(boton).closest("tr").remove();
    }

    // Eliminar una Otro
    function eliminarOtro(index) {
        $(`#accordionOtro${index}`).remove();
    }
</script>
