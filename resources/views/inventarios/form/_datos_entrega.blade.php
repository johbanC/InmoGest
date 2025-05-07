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
  width:400px;
  height:200px;
  border: 1px solid red;
}
</style>

<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>

<h1>
    Draw over image
  </h1>
  <div class="wrapper">
    
    <canvas id="signature-pad" class="signature-pad" width=400 height=200></canvas>
  </div>
  <div>
    <button id="save">Save</button>
    <button id="clear">Clear</button>
  </div>

<script>
    var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
  backgroundColor: 'rgba(255, 255, 255, 0)',
  penColor: 'rgb(0, 0, 0)'
});
var saveButton = document.getElementById('save');
var cancelButton = document.getElementById('clear');

saveButton.addEventListener('click', function (event) {
  var data = signaturePad.toDataURL('image/png');

// Send data to server instead...
  window.open(data);
});

cancelButton.addEventListener('click', function (event) {
  signaturePad.clear();
});
</script>