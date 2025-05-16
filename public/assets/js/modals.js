document.addEventListener('DOMContentLoaded', function () {
    const modals = ['entrega', 'recibe'];

    modals.forEach(modal => {
        const canvas = document.getElementById(`signature-pad-${modal}`);
        console.log(`Canvas para modal ${modal}:`, canvas); 

        if (!canvas) {
            console.warn(`No se encontró el canvas para ${modal}`);
            return; // No continuar si no existe el canvas
        }

        const signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgba(255, 255, 255, 1)',
            penColor: 'rgb(0, 0, 0)',
            minWidth: 1,
            maxWidth: 3,
            throttle: 16
        });

        const photoInput = document.getElementById(`foto_firmante_${modal}`);
        const takePhotoBtn = document.getElementById(`take-photo_${modal}`);
        const removePhotoBtn = document.getElementById(`remove-photo_${modal}`);
        const photoPreviewContainer = document.getElementById(`photo-preview-container-${modal}`);
        const photoPreview = document.getElementById(`preview-${modal}`);
        const saveBtn = document.querySelector(`.save-signature[data-target="${modal}"]`);
        const form = document.getElementById(`formularioFirmaDigital_${modal}`);

        // Confirmar que todos los elementos existan
        if (!photoInput || !takePhotoBtn || !removePhotoBtn || !photoPreviewContainer || !photoPreview || !saveBtn || !form) {
            console.warn(`Faltan elementos para modal ${modal}`);
            return;
        }

        $(`.bs-example-modal-lg-${modal}`).on('shown.bs.modal', function () {
            resizeCanvas();
            console.log(`Modal ${modal} mostrado y canvas redimensionado`);
        });

        window.addEventListener('resize', resizeCanvas);

        function resizeCanvas() {
            const ratio = Math.max(window.devicePixelRatio || 1, 1);
            canvas.width = canvas.offsetWidth * ratio;
            canvas.height = canvas.offsetHeight * ratio;
            canvas.getContext("2d").scale(ratio, ratio);
        }

        document.getElementById(`clear-${modal}`).addEventListener('click', function () {
            signaturePad.clear();
        });

        takePhotoBtn.addEventListener('click', function (e) {
            e.preventDefault();
            photoInput.click();
        });

        photoInput.addEventListener('change', function () {
            const file = photoInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    photoPreview.src = e.target.result;
                    photoPreviewContainer.style.display = 'block';
                    removePhotoBtn.disabled = false;
                };
                reader.readAsDataURL(file);
            }
        });

        removePhotoBtn.addEventListener('click', function () {
            photoInput.value = '';
            photoPreview.src = '';
            photoPreviewContainer.style.display = 'none';
            removePhotoBtn.disabled = true;
        });

        saveBtn.addEventListener('click', function () {
            if (signaturePad.isEmpty()) {
                alert("Por favor, proporcione una firma primero.");
                return;
            }

            if (!photoInput.files[0]) {
                alert("Por favor, tome una foto.");
                return;
            }

            const signatureData = signaturePad.toDataURL();
            const inputFirma = document.getElementById(`firma_${modal}`);
            inputFirma.value = signatureData;

            form.submit();
        });
    });
});
