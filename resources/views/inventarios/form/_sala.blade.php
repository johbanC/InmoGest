<script>
    // Configuración para salas
    var nextSalaId = 8000; // IDs únicos comenzando en 6000
    var salaCounter = 0;
    var salas = [];

    function generarFilasSala(areaIndex) {
        const items = [
            'PUERTA_PRINCIPAL', 'VENTANA_SALA', 'PERSIANAS', 'CORTINAS', 
            'LÁMPARA_CENTRAL', 'LÁMPARAS_SECUNDARIAS', 'TOMAS_ELÉCTRICOS', 
            'INTERRUPTORES', 'PISO_SALA', 'PAREDES', 'ZÓCALOS', 'PINTURA', 
            'SOFÁ', 'SILLONES', 'MESAS_CENTRO', 'ESTANTERÍA', 'CUADROS', 
            'DECORACIÓN', 'AIRE_ACONDICIONADO', 'VENTILADOR'
        ];

        return items.map((item) => `
            <tr>
                <th scope="row">
                    <input type="text" name="nombre_item[${areaIndex}][]" class="form-control" value="${item}" readonly>
                </th>
                <td>
                    <input type="number" name="cant[${areaIndex}][]" class="form-control" placeholder="Cantidad" required>
                </td>
                <td>
                    <input type="text" name="material[${areaIndex}][]" class="form-control" placeholder="Material" required>
                </td>
                <td>
                    <select class="form-select" name="estado[${areaIndex}][]" aria-label="Estado" required>
                        <option value="" disabled selected>Seleccione</option>
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

    function agregarSala() {
        salaCounter++;
        const salaId = nextSalaId++;
        salas.push({id: salaId, counter: salaCounter});

        const nuevaSala = `
            <div class="accordion" id="accordionSala${salaId}">
                <div class="accordion-item border rounded">
                    <h2 class="accordion-header" id="headingSala${salaId}">
                        <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" 
                                data-bs-target="#collapseSala${salaId}" aria-expanded="false" 
                                aria-controls="collapseSala${salaId}">
                            Sala #${salaCounter}
                        </button>
                    </h2>
                    <div id="collapseSala${salaId}" class="accordion-collapse collapse" 
                         aria-labelledby="headingSala${salaId}" data-bs-parent="#accordionSala${salaId}">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Sala #${salaCounter}</h3>
                                            <input type="hidden" name="tipo_area[${salaId}]" value="sala">
                                            <input type="text" name="nombre_area[${salaId}]" 
                                                   placeholder="Ingrese el nombre del área" class="form-control" value="Sala #${salaCounter}" required>
                                            <p class="card-title-desc">Carga toda la información de la sala</p>
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
                                                        ${generarFilasSala(salaId)}
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="5">
                                                                <label class="form-label">Cargar Imágenes</label><br>
                                                                <input type="file" name="fotos[${salaId}][]" 
                                                                       accept="image/*" class="form-control" multiple>
                                                                <div class="image-preview mt-2" id="previewSala${salaId}"></div>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <button type="button" class="btn btn-danger mt-3" 
                                                    onclick="eliminarSala(${salaId})">
                                                <i class="fas fa-trash-alt me-1"></i> Eliminar Sala
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;

        $('#sala-container').append(nuevaSala);
    }

    function eliminarSala(salaId) {
        $(`#accordionSala${salaId}`).remove();
        salas = salas.filter(s => s.id !== salaId);
        
        salas.forEach((sala, index) => {
            sala.counter = index + 1;
            $(`#accordionSala${sala.id} .accordion-button`).text(`Sala #${sala.counter}`);
            $(`#accordionSala${sala.id} .card-title`).text(`Sala #${sala.counter}`);
        });
        
        salaCounter = salas.length;
    }

    // Función opcional para previsualizar imágenes
    function previewImages(event, salaId) {
        const preview = document.getElementById(`previewSala${salaId}`);
        preview.innerHTML = '';
        
        if (event.target.files.length > 0) {
            Array.from(event.target.files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('img-thumbnail', 'me-2', 'mb-2');
                    img.style.maxHeight = '100px';
                    preview.appendChild(img);
                }
                reader.readAsDataURL(file);
            });
        }
    }
</script>