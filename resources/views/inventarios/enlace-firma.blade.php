<!DOCTYPE html>
<html>
<head>
    <title>Enlace de Firma Remota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>Enlace para firma remota</h4>
            </div>
            <div class="card-body">
                <p><strong>Inventario ID:</strong> {{ $inventario->id }}</p>
                <p><strong>Rol:</strong> {{ $rol }}</p>
                <p><strong>Enlace (expira en 30 minutos):</strong></p>
                
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="enlaceFirma" value="{{ $url }}" readonly>
                    <button class="btn btn-outline-secondary" onclick="copiarEnlace()">Copiar</button>
                </div>
                
                <a href="{{ $url }}" class="btn btn-primary" target="_blank">Ir al enlace</a>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>

    <script>
        function copiarEnlace() {
            const enlace = document.getElementById('enlaceFirma');
            enlace.select();
            document.execCommand('copy');
            alert('Enlace copiado al portapapeles');
        }
    </script>
</body>
</html>