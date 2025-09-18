<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>Certificado de Firma - Inventario {{ $inventario->codigo }}</title>
<style>
  @page { margin: 20mm; }
  body {
    font-family: "Helvetica Neue", Arial, Helvetica, sans-serif;
    font-size: 12px;
    color: #222;
    line-height: 1.3;
    margin: 0;
  }

  .container {
    max-width: 900px;
    margin: 0 auto;
    padding: 14px 18px;
  }

  header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 18px;
  }

  .title {
    font-size: 20px;
    font-weight: 700;
  }

  .doc-details {
    border: 1px solid #ddd;
    padding: 10px;
    width: 48%;
    box-sizing: border-box;
    font-size: 12px;
  }

  .doc-details div { margin-bottom: 6px; }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 12px;
  }

  th, td {
    padding: 8px 10px;
    border: 1px solid #e6e6e6;
    text-align: left;
    vertical-align: middle;
  }

  th {
    background: #f7f7f7;
    font-weight: 600;
  }

  .participants .hash-box,
  .signing .hash-box {
    display: inline-block;
    border: 1px solid #bfbfbf;
    padding: 6px 8px;
    border-radius: 4px;
    background: #fafafa;
    font-family: monospace;
    font-size: 11px;
    max-width: 420px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }

  .signing-events {
    margin-top: 8px;
  }

  .signature-row {
    display: flex;
    gap: 12px;
    align-items: flex-start;
    margin-bottom: 18px;
  }

  .signature-box {
    flex: 1;
    border: 1px solid #ddd;
    padding: 12px;
    border-radius: 6px;
    background: #fff;
  }

  .signature-img {
    width: 160px;
    height: 60px;
    display: block;
    margin-bottom: 6px;
    object-fit: contain;
    border: 0;
  }

  .signature-meta {
    font-size: 11px;
  }

  .valid {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #1e7b33;
    font-weight: 600;
    margin-top: 6px;
  }

  .valid .dot {
    width: 10px;
    height: 10px;
    background: #1e7b33;
    border-radius: 50%;
    box-shadow: 0 0 0 3px rgba(30,123,51,0.08);
  }

  footer {
    font-size: 11px;
    color: #666;
    border-top: 1px solid #e6e6e6;
    padding-top: 8px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-top: 22px;
  }

  .page-number {
    text-align: right;
    font-size: 11px;
    color:#999;
  }

  /* Responsive small */
  @media (max-width: 600px) {
    .doc-details { width: 100%; margin-bottom: 12px; }
    header { flex-direction: column; gap: 10px; }
    .signature-row { flex-direction: column; }
  }
</style>
</head>
<body>
  @php
    use Illuminate\Support\Facades\Storage;
    
    $firmaEntrega = $inventario->firmaEntrega;
    $hashFirmaDigitalEntrega = $firmaEntrega ? $firmaEntrega->firma_digital_path : null;
    
    $firmaRecibe = $inventario->firmaRecibe;
    $hashFirmaDigitalRecibe = $firmaRecibe ? $firmaRecibe->firma_digital_path : null;
  @endphp

  <div class="container">
    <header>
      <div>
        <div class="title">Inventario: {{ $inventario->codigo }}</div>
        <div style="color:#666; font-size:12px;">Certificado de Firmas Digitales</div>
      </div>

      <div class="doc-details" aria-label="Detalles del documento">
        <div><strong>Código:</strong> {{ $inventario->codigo }}</div>
        <div><strong>Tipo Inmueble:</strong> {{ $inventario->tipo_inmueble->nombre }}</div>
        <div><strong>Dirección:</strong> {{ $inventario->direccion }}</div>
        <div><strong>Fecha:</strong> {{ $inventario->fecha }}</div>
      </div>
    </header>

    <!-- Participantes -->
    <section class="participants">
      <h3 style="margin:0 0 8px 0;">Información del Inquilino</h3>
      <table>
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Documento</th>
            <th>Teléfono</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $inventario->cliente->nombre }} {{ $inventario->cliente->apellido }}</td>
            <td>{{ $inventario->cliente->tipoDocumento->acronimo }} {{ $inventario->cliente->numero_documento }}</td>
            <td>{{ $inventario->cliente->telefono }}</td>
            <td>{{ $inventario->cliente->email }}</td>
          </tr>
        </tbody>
      </table>
    </section>

    <!-- Firmas -->
    <section class="signing">
      <h3 style="margin:20px 0 8px 0;">Firmas Digitales</h3>
      
      <!-- Bloque de firmas -->
      <div class="signature-row">
        @if($hashFirmaDigitalEntrega)
        <div class="signature-box">
          <div style="display: flex; gap: 20px; align-items: center; margin-bottom: 15px;">
            @if($firmaEntrega->foto_firmante_path)
            <div style="flex-shrink: 0;">
              <img src="{{ asset('storage/' . $firmaEntrega->foto_firmante_path) }}" 
                   alt="Foto del firmante" 
                   style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%; border: 2px solid #ddd;">
            </div>
            @endif
            <div style="flex-grow: 1;">
              <img class="signature-img" 
                   src="{{ asset('storage/' . $hashFirmaDigitalEntrega) }}" 
                   alt="Firma digital de entrega">
            </div>
          </div>
          <div class="signature-meta">
            <strong>Firma de Entrega:</strong> 
            {{ $firmaEntrega->nombre_firmante }}
          </div>
          @if($firmaEntrega->hash_validacion)
          <div style="margin-top:8px;">
            <span class="hash-box">{{ $firmaEntrega->hash_validacion }}</span>
          </div>
          @endif
          <div class="valid">
            <span class="dot"></span>
            <span>Firma válida</span>
          </div>
        </div>
        @endif

        @if($hashFirmaDigitalRecibe)
        <div class="signature-box">
          <div style="display: flex; gap: 20px; align-items: center; margin-bottom: 15px;">
            @if($firmaRecibe->foto_firmante_path)
            <div style="flex-shrink: 0;">
              <img src="{{ asset('storage/' . $firmaRecibe->foto_firmante_path) }}" 
                   alt="Foto del firmante" 
                   style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%; border: 2px solid #ddd;">
            </div>
            @endif
            <div style="flex-grow: 1;">
              <img class="signature-img" 
                   src="{{ asset('storage/' . $hashFirmaDigitalRecibe) }}" 
                   alt="Firma digital de recepción">
            </div>
          </div>
          <div class="signature-meta">
            <strong>Firma de Recepción:</strong> 
            {{ $firmaRecibe->nombre_firmante }}
          </div>
          @if($firmaRecibe->hash_validacion)
          <div style="margin-top:8px;">
            <span class="hash-box">{{ $firmaRecibe->hash_validacion }}</span>
          </div>
          @endif
          <div class="valid">
            <span class="dot"></span>
            <span>Firma válida</span>
          </div>
        </div>
        @endif
      </div>
    </section>

    <footer>
      <div>Documento generado el {{ now()->format('d/m/Y H:i:s') }}</div>
      <div class="page-number">Página 1 / 1</div>
    </footer>

  </div>
</body>
</html>

