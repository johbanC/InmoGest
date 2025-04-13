<script>
    var contadorBanos = 0; // Variable global para contar los Banos

    // Generar filas para los items de cada área (Bano)
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

    // Agregar un nuevo Bano
    function agregarBano() {
        contadorBanos++; // Incrementar el contador global
        var nuevoBano = `
            <div class="accordion" id="accordionBano${areaIndex}">
                <div class="accordion-item border rounded">
                    <h2 class="accordion-header" id="headingBano${areaIndex}">
                        <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBano${areaIndex}" aria-expanded="false" aria-controls="collapseBano${areaIndex}">
                            Baño #${contadorBanos}
                        </button>
                    </h2>
                    <div id="collapseBano${areaIndex}" class="accordion-collapse collapse" aria-labelledby="headingBano${areaIndex}" data-bs-parent="#accordionBano${areaIndex}">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Baño #${contadorBanos}</h3>
                                            <input type="text" name="nombre_area[]"  placeholder="Ingrese el nombre del area" class="form-control" required>
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
                                                        ${generarFilas(areaIndex, 'Bano')}
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
                                            <button type="button" class="btn btn-danger mt-3" onclick="eliminarBano(${areaIndex})">Eliminar Bano</button>
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
        areaIndex++; // Incrementar el contador global
    }

    function eliminarBano(index) {
        $(`#accordionBano${index}`).remove();
    }

    //Tambien va a tocar restar para poder que los indices cuadren entre todos
</script>