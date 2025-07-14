<script>
    var nextOtroId = 6000; // IDs únicos comenzando en 6000
    var otroCounter = 0;
    var otros = [];

    // Agregar un nuevo "Otro"
    function agregarOtro() {
        otroCounter++;
        const otroId = nextOtroId++;
        otros.push({id: otroId, counter: otroCounter});

        const nuevoOtro = `
            <div class="accordion" id="accordionOtro${otroId}">
                <div class="accordion-item border rounded">
                    <h2 class="accordion-header" id="headingOtro${otroId}">
                        <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" 
                                data-bs-target="#collapseOtro${otroId}" aria-expanded="false" 
                                aria-controls="collapseOtro${otroId}">
                            Otro #${otroCounter}
                        </button>
                    </h2>
                    <div id="collapseOtro${otroId}" class="accordion-collapse collapse" 
                         aria-labelledby="headingOtro${otroId}" data-bs-parent="#accordionOtro${otroId}">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Otro #${otroCounter}</h3>
                                            <input type="hidden" name="tipo_area[${otroId}]" value="otro">
                                            <input type="text" name="nombre_area[${otroId}]" 
                                                   placeholder="Ingrese el nombre del área" class="form-control" value="Otro #${otroCounter}" required>
                                            <p class="card-title-desc">Carga toda la información adicional del inmueble</p>
                                            
                                            <div class="table-responsive">
                                                <table class="table table-sm m-0" id="tablaOtro${otroId}">
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

                                            <button type="button" class="btn btn-primary mt-3" 
                                                    onclick="agregarFilaOtro(${otroId})">Agregar Ítem</button>

                                            <label for="fotos" class="form-label mt-3">Cargar Imágenes</label>
                                            <input type="file" name="fotos[${otroId}][]" 
                                                   accept="image/*" class="form-control" multiple>

                                            <button type="button" class="btn btn-danger mt-3" 
                                                    onclick="eliminarOtro(${otroId})">Eliminar Otro</button>
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
    function agregarFilaOtro(otroId) {
        const timestamp = Date.now();
        const filaId = `filaOtro${otroId}-${timestamp}`;
        
        const nuevaFila = `
            <tr id="${filaId}">
                <td>
                    <input type="text" name="nombre_item[${otroId}][]" class="form-control" placeholder="Nombre del Ítem" required>
                </td>
                <td>
                    <input type="number" name="cant[${otroId}][]" class="form-control" placeholder="Cantidad" required>
                </td>
                <td>
                    <input type="text" name="material[${otroId}][]" class="form-control" placeholder="Material" required>
                </td>
                <td>
                    <select class="form-select" name="estado[${otroId}][]" aria-label="Estado" required>
                        <option value="" selected disabled>Estado</option>
                        <option value="1">Bueno</option>
                        <option value="2">Malo</option>
                        <option value="3">Regular</option>
                    </select>
                </td>
                <td>
                    <input type="text" name="observaciones[${otroId}][]" class="form-control" placeholder="Observaciones" required>
                </td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm" 
                            onclick="document.getElementById('${filaId}').remove()">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
        `;

        $(`#tablaOtro${otroId} tbody`).append(nuevaFila);
    }

    // Eliminar una sección completa de "Otro"
    function eliminarOtro(otroId) {
        $(`#accordionOtro${otroId}`).remove();
        otros = otros.filter(o => o.id !== otroId);
        
        // Reenumerar los "Otros" restantes
        otros.forEach((otro, index) => {
            otro.counter = index + 1;
            $(`#accordionOtro${otro.id} .accordion-button`).text(`Otro #${otro.counter}`);
            $(`#accordionOtro${otro.id} .card-title`).text(`Otro #${otro.counter}`);
        });
        
        otroCounter = otros.length;
    }
</script>