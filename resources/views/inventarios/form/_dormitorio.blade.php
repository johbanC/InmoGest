<script>
    var contadorDormitorios = 1; // Variable global para contar los Dormitorios

    function generarFilas(areaIndex) {
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

    function agregarDormitorio() {
        var numeroDormitorio = contadorDormitorios++;

        var nuevoDormitorio = `
        <div class="accordion" id="accordionExample${numeroDormitorio}">
            <div class="accordion-item border rounded">
                <h2 class="accordion-header" id="heading${numeroDormitorio}">
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
                                        <input type="hidden" name="nombre_area[]" value="Dormitorio ${numeroDormitorio}" class="form-control">  
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
                                                    ${generarFilas(numeroDormitorio - 1)} <!-- Pasar el índice del área -->
                                                </tbody>

                                                <tfoot>
                                                    <tr>
                                                        <td colspan="5">
                                                            
                
                                                            <label for="fotos" class="form-label">Cargar Imágenes</label><br>
                                                            <input type="file" name="fotos[]" id="fotos" accept="image/*" class="form-control {{ $errors->has('fotos') ? 'is-invalid' : '' }}" multiple onchange="previewImages(event)">
                                                            @if ($errors->has('fotos'))
                                                            <div class="invalid-feedback">{{ $errors->first('fotos') }}</div>
                                                            @endif
                
            
                                                        </td>
                                                    </tr>
                                                    </tfoot>
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
</script>
