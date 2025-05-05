<!-- FORMULARIO SELFIE SIMPLE -->
<form method="POST" action="/guardar-selfie" enctype="multipart/form-data">
    @csrf
    
    <!-- Input de la cámara (oculto) -->
    <input 
        type="file" 
        id="selfieInput" 
        name="selfie" 
        accept="image/*" 
        capture="user" 
        class="d-none"
    >
    
    <!-- Botón para abrir la cámara -->
    <button type="button" id="btnTomarSelfie" class="btn btn-primary mb-3">
        <i class="fas fa-camera"></i> Tomar Selfie
    </button>
    
    <!-- Previsualización (inicialmente oculta) -->
    <div id="previewContainer" class="text-center mb-3" style="display: none;">
        <img id="previewImage" src="#" alt="Selfie" class="img-fluid rounded" style="max-height: 200px;">
        <button type="button" id="btnEliminarSelfie" class="btn btn-danger btn-sm mt-2">
            <i class="fas fa-trash"></i> Eliminar
        </button>
    </div>
    
    <!-- Botón de enviar (oculto inicialmente) -->
    <button type="submit" id="btnGuardar" class="btn btn-success" style="display: none;">
        Guardar Selfie
    </button>
</form>

<!-- Script mínimo -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const btnTomarSelfie = document.getElementById('btnTomarSelfie');
    const selfieInput = document.getElementById('selfieInput');
    const previewContainer = document.getElementById('previewContainer');
    const previewImage = document.getElementById('previewImage');
    const btnEliminarSelfie = document.getElementById('btnEliminarSelfie');
    const btnGuardar = document.getElementById('btnGuardar');
    
    // Abre la cámara al hacer clic en el botón
    btnTomarSelfie.addEventListener('click', function() {
        selfieInput.click();
    });
    
    // Muestra la previsualización al tomar la foto
    selfieInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.style.display = 'block';
                btnGuardar.style.display = 'block';
                btnTomarSelfie.style.display = 'none';
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
    
    // Elimina la foto y permite tomar otra
    btnEliminarSelfie.addEventListener('click', function() {
        selfieInput.value = '';
        previewContainer.style.display = 'none';
        btnGuardar.style.display = 'none';
        btnTomarSelfie.style.display = 'block';
    });
});
</script>