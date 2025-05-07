{{-- filepath: c:\laragon\www\InmoGest\resources\views\inventarios\form\_datos_entrega.blade.php --}}
<style>
    .wrapper {
        position: relative;
        width: 400px;
        height: 200px;
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    img {
        position: absolute;
        left: 0;
        top: 0;
    }

    .signature-pad {
        position: absolute;
        left: 0;
        top: 0;
        width: 400px;
        height: 200px;
        border: 1px solid red;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>

<h1>Draw Over Image</h1>
<div class="wrapper">
    <canvas id="signature-pad" class="signature-pad" width="400" height="200"></canvas>
</div>

<div>
    <button id="clear" type="button">Limpiar firma</button>
</div>

<script>
    // Initialize the signature pad
    var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
        backgroundColor: 'rgba(255, 255, 255, 0)',
        penColor: 'rgb(0, 0, 0)'
    });

    // Get the clear button
    var clearButton = document.getElementById('clear');

    // Clear button event listener
    clearButton.addEventListener('click', function () {
        console.log('Botón "Limpiar firma" presionado'); // Mensaje de depuración
        signaturePad.clear();
    });
</script>