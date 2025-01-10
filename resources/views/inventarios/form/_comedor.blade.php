<script>
    var contadorComedores = 1; // Variable global para contar los comedores

    function generarFilas() {
        const items = [
            'PUERTA', 'CHAPA', 'VENTANA', 'VIDRIO', 'PERSIANA',
            'CORTINA VERTICAL', 'LAMPARA', 'PLAFONES', 'TOMAS ELECTRICOS',
            'SUICHES', 'TOMA TELEFONO', 'TOMA PARABOLICA', 'ESTANTERIA',
            'PISO', 'PARED', 'ZOCALO', 'PINTURA'
        ];

        return items.map(item => `
            <tr>
                <th scope="row">${item}</th>
                <td>
                    <input type="text" name="cant[]" class="form-control" placeholder="CANT" required>
                </td>
                <td>
                    <input type="text" name="material[]" class="form-control" placeholder="Material" required>
                </td>
                <td>
                    <select class="form-select" name="estado[]" aria-label="Default select example">
                        <option selected="">Estado</option>
                        <option value="1">Bueno</option>
                        <option value="2">Malo</option>
                        <option value="3">Regular</option>
                    </select>
                </td>
                <td>
                    <input type="text" name="observaciones[]" class="form-control" placeholder="Observaciones" required>
                </td>
            </tr>
        `).join('');
    }

    function agregarComedor() {
        // Incrementamos el contador de comedores
        var numeroComedor = contadorComedores++;

        // Creamos un nuevo comedor
        var nuevoComedor = `

         
            <div class="accordion" id="accordionExample${numeroComedor}">
                <div class="accordion-item border rounded">
                    <h2 class="accordion-header" id="heading${numeroComedor}">
                        <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${numeroComedor}" aria-expanded="false" aria-controls="collapse${numeroComedor}">
                            Comedor #${numeroComedor}
                        </button>
                    </h2>
                    <div id="collapse${numeroComedor}" class="accordion-collapse collapse" aria-labelledby="heading${numeroComedor}" data-bs-parent="#accordionExample${numeroComedor}">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div>
                                        <div class="card">
                                            <div class="card-body">
                                                <h3 class="card-title">Comedor #${numeroComedor}</h3>
                                                <input type="text" name="nombre_area[]" value="comedor ${numeroComedor}" class="form-control" >  
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
                                                            ${generarFilas()}
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
                </div>
            </div>`;
        $('#comedor-container').append(nuevoComedor);
    }

    function eliminarComedor(numeroComedor) {
        $(`#accordionExample${numeroComedor}`).remove();
    }
</script>
