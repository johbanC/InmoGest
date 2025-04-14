<script>
    var nextBanoId = 1; // Para IDs únicos que no cambian
    var banoCounter = 0; // Para la numeración visible (Baño #1, Baño #2)
    var banos = []; // Array para registrar todos los baños existentes

    function generarFilas(areaIndex) {
        const items = [
            'PUERTA', 'CHAPA', 'VENTANA', 'VIDRIO', 'LAVAMANOS',
            'GRIFERIA', 'SANITARIO', 'TOALLERO', 'JABONERA',
            'CEPILLERA', 'PORTA PAPEL', 'DUCHA', 'ESPEJO',
            'GABINETES', 'CABINA', 'PISO', 'PARED',
            'ZOCALO', 'TOMAS ELECTRICOS', 'SUCHES', 'LAMPARA',
            'PLAFONES', 'TECHO', 'PINTURA'
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

    function agregarBano() {
        banoCounter++;
        const banoId = nextBanoId++;
        banos.push({id: banoId, counter: banoCounter});

        const nuevoBano = `
            <div class="accordion" id="accordionBano${banoId}">
                <div class="accordion-item border rounded">
                    <h2 class="accordion-header" id="headingBano${banoId}">
                        <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" 
                                data-bs-target="#collapseBano${banoId}" aria-expanded="false" 
                                aria-controls="collapseBano${banoId}">
                            Baño #${banoCounter}
                        </button>
                    </h2>
                    <div id="collapseBano${banoId}" class="accordion-collapse collapse" 
                         aria-labelledby="headingBano${banoId}" data-bs-parent="#accordionBano${banoId}">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Baño #${banoCounter}</h3>
                                            <input type="text" name="nombre_area[${banoId}]" 
                                                   placeholder="Ingrese el nombre del area" class="form-control" required>
                                            <p class="card-title-desc">Carga toda la información del Bano del inmueble</p>
                                            <div class="table-responsive">
                                                <table class="table table-sm m-0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" style="width: 180px;">Item</th>
                                                            <th scope="col" style="width: 90px;">Cantidad</th>
                                                            <th scope="col">Material</th>
                                                            <th scope="col">Estado</th>
                                                            <th scope="col">Observaciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        ${generarFilas(banoId)}
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="5">
                                                                <label for="fotos" class="form-label">Cargar Imágenes</label><br>
                                                                <input type="file" name="fotos[${banoId}][]" id="fotos" 
                                                                       accept="image/*" class="form-control" multiple 
                                                                       onchange="previewImages(event)">
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <button type="button" class="btn btn-danger mt-3" 
                                                    onclick="eliminarBano(${banoId})">Eliminar Bano</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;

        $('#bano-container').append(nuevoBano);
    }

    function eliminarBano(banoId) {
        // Eliminar el baño del DOM
        $(`#accordionBano${banoId}`).remove();
        
        // Eliminar el baño del registro
        banos = banos.filter(b => b.id !== banoId);
        
        // Reenumerar los baños visibles
        banos.forEach((bano, index) => {
            bano.counter = index + 1;
            $(`#accordionBano${bano.id} .accordion-button`).text(`Baño #${bano.counter}`);
            $(`#accordionBano${bano.id} .card-title`).text(`Baño #${bano.counter}`);
        });
        
        // Actualizar el contador visible
        banoCounter = banos.length;
    }
</script>