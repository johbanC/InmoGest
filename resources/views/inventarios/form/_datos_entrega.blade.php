<style>
    .signature-pad {
        border: 1px solid #000;
        border-radius: 5px;
        background-color: rgba(255, 255, 255, 0.5);
        margin-bottom: 10px;
        width: 100%;
        max-width: 400px;
        height: auto;
    }

    .wrapper {
        text-align: center;
        margin-bottom: 20px;
    }

    .btn {
        margin-top: 10px;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>

<h1>Draw Over Image</h1>

<div class="col-md-6">
    <div class="wrapper">
        <h3>Firma de la persona que entrega</h3>
        <canvas id="signature-pad-entrega" class="signature-pad" width="400" height="200"></canvas>
        <button id="clear-entrega" class="btn btn-danger waves-effect waves-light" type="button">Limpiar firma</button>
        <h3>Foto de la persona que entrega</h3>
        <input type="file" id="photo-entrega" accept="image/*" class="form-control" capture="user">
        <img id="preview-entrega" src="" alt="Previsualización de la foto de quien entrega" style="display: none; margin-top: 10px; max-width: 100%; border: 1px solid #ddd; border-radius: 5px;">
    </div>
</div>

<div class="col-md-6">
    <div class="wrapper">
        <h3>Firma de la persona que recibe</h3>
        <canvas id="signature-pad-recibe" class="signature-pad" width="400" height="200"></canvas>
        <button id="clear-recibe" class="btn btn-danger waves-effect waves-light" type="button">Limpiar firma</button>
        <h3>Foto de la persona que recibe</h3>
        <input type="file" id="photo-recibe" accept="image/*" class="form-control" capture="user">
        <img id="preview-recibe" src="" alt="Previsualización de la foto de quien recibe" style="display: none; margin-top: 10px; max-width: 100%; border: 1px solid #ddd; border-radius: 5px;">
    </div>
</div>

<script>
    // Initialize the signature pad for "persona que entrega"
    var signaturePadEntrega = new SignaturePad(document.getElementById('signature-pad-entrega'), {
        backgroundColor: 'rgba(255, 255, 255, 0)',
        penColor: 'rgb(0, 0, 0)'
    });

    // Initialize the signature pad for "persona que recibe"
    var signaturePadRecibe = new SignaturePad(document.getElementById('signature-pad-recibe'), {
        backgroundColor: 'rgba(255, 255, 255, 0)',
        penColor: 'rgb(0, 0, 0)'
    });

    // Clear button for "persona que entrega"
    var clearButtonEntrega = document.getElementById('clear-entrega');
    clearButtonEntrega.addEventListener('click', function () {
        console.log('Botón "Limpiar firma" presionado para persona que entrega');
        signaturePadEntrega.clear();
    });

    // Clear button for "persona que recibe"
    var clearButtonRecibe = document.getElementById('clear-recibe');
    clearButtonRecibe.addEventListener('click', function () {
        console.log('Botón "Limpiar firma" presionado para persona que recibe');
        signaturePadRecibe.clear();
    });

    // File input for "persona que entrega"
    var photoEntrega = document.getElementById('photo-entrega');
    var previewEntrega = document.getElementById('preview-entrega');
    photoEntrega.addEventListener('change', function () {
        var file = photoEntrega.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                previewEntrega.src = e.target.result;
                previewEntrega.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            previewEntrega.src = '';
            previewEntrega.style.display = 'none';
        }
    });

    // File input for "persona que recibe"
    var photoRecibe = document.getElementById('photo-recibe');
    var previewRecibe = document.getElementById('preview-recibe');
    photoRecibe.addEventListener('change', function () {
        var file = photoRecibe.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                previewRecibe.src = e.target.result;
                previewRecibe.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            previewRecibe.src = '';
            previewRecibe.style.display = 'none';
        }
    });
</script>