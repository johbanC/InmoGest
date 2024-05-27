

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PDF Ficha Tecnica</title>

	

</head>

<style>
	body {
		font-family: 'Poppins', sans-serif;
	}

	table {
		border-collapse: collapse;
		width: 100%;
	}

	th, td {
		border: 1px solid #ddd;
		padding: 8px;
		text-align: left;
	}

	th {
		background-color: #f2f2f2;
	}

	tr:nth-child(even) {
		background-color: #f2f2f2;
	}

	th{
		text-align: center;
	}
</style>
<body>


	<table>
		<thead>
			<tr>
				<th colspan="3">Ficha Tenica {{ $FichaTecnica->nom_propietario }}, {{ $FichaTecnica->nom_propiedad }}</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Cedula: {{ $FichaTecnica->cedula }}</td>
				<td>Nombre Propietario: {{ $FichaTecnica->nom_propietario }}</td>
				<td>Telefono: {{ $FichaTecnica->telefono }}</td>
			</tr>	

			<tr>
				<td>Nombre Propiedad: {{ $FichaTecnica->nom_propiedad }}</td>
				<td>Barrio: {{ $FichaTecnica->barrio }}</td>
				<td>Direccion: {{ $FichaTecnica->direccion }}</td>
			</tr>

			<tr>
				<td>Valor: $ {{ number_format($FichaTecnica->valor, 2, ',', '.') }}</td>
				<td>Administración: $ {{ number_format($FichaTecnica->administracion, 2, ',', '.') }}</td>

				<td>Tipo de Inmueble: 
					@foreach ($tipoinmuebles as $id => $nombre)
					@if ($FichaTecnica->tipo_inmuebles_id == $id)
					{{ $nombre }}
					@endif
					@endforeach
				</td>

			</tr>		

			<tr>
				<td>Tipo de Transacción: 
					@foreach ($transacciones as $id => $nombre)
					@if ($FichaTecnica->tipo_transaccions_id == $id)
					{{ $nombre }}
					@endif
					@endforeach
				</td>
				<td>Alcobas: {{ $FichaTecnica->alcobas }}</td>
				<td>Closet: {{ $FichaTecnica->closet }}</td>
			</tr>

			<tr>
				<td>Baño: {{ $FichaTecnica->baño }}</td>
				<td>Estrato: {{ $FichaTecnica->estrato }}</td>
				<td>Area m2: {{ $FichaTecnica->area }}</td>
			</tr>

			<tr>
				<td>Piso: {{ $FichaTecnica->piso }}</td>
				<td>Tipo de Calentador: 
					@foreach ($calentador as $id => $nombre)
					@if ($FichaTecnica->calentadors_id == $id)
					{{ $nombre }}
					@endif
					@endforeach
				</td>
				<td>Tipo de Cocina: 
					@foreach ($tipococinas as $id => $nombre)
					@if ($FichaTecnica->tipo_cocinas_id == $id)
					{{ $nombre }}
					@endif
				@endforeach</td>

			</tr>

			<tr>
				<td>Tipo de Porteria: 
					@foreach ($tipoporterias as $id => $nombre)
					@if ($FichaTecnica->tipo_porterias_id == $id)
					{{ $nombre }}
					@endif
					@endforeach
				</td>
				<td></td>
				<td></td>

			</tr>

		</tbody>
	</table>

	<br>

	<table>
		<thead>
			<tr>
				<th colspan="3">Detalles</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Vestier: {{ $FichaTecnica->vestier ? 'Si' : 'No' }}</td>
				<td>Balcón: {{ $FichaTecnica->balcon ? 'Si' : 'No' }}</td>
				<td>Sala Comedor: {{ $FichaTecnica->sala_comedor ? 'Si' : 'No' }}</td>
			</tr>

			<tr>
				<td>Patio: {{ $FichaTecnica->patio ? 'Si' : 'No' }}</td>
				<td>Zona de ropa: {{ $FichaTecnica->zona_ropa ? 'Si' : 'No' }}</td>
				<td>Estudio / Estar: {{ $FichaTecnica->estudio_estar ? 'Si' : 'No' }}</td>
			</tr>

			<tr>				
				<td>Red de gas: {{ $FichaTecnica->red_gas ? 'Si' : 'No' }}</td>
				<td>Cuarto Util: {{ $FichaTecnica->cuarto_util ? 'Si' : 'No' }}</td>
				<td>Ascensor: {{ $FichaTecnica->ascensor ? 'Si' : 'No' }}</td>
			</tr>

			<tr>
				<td>Parqueadero: {{ $FichaTecnica->parqueadero ? 'Si' : 'No' }}</td>
				<td>Parqueadero Visitantes: {{ $FichaTecnica->parqueadero_visitantes ? 'Si' : 'No' }}</td>
				<td>Juegos Infantiles: {{ $FichaTecnica->juegos_infantiles ? 'Si' : 'No' }}</td>
			</tr>

			<tr>
				<td>Salon Social: {{ $FichaTecnica->salon_social ? 'Si' : 'No' }}</td>
				<td>Propiedad Horizontal: {{ $FichaTecnica->propiedad_horizontal ? 'Si' : 'No' }}</td>
				<td>Citofono: {{ $FichaTecnica->citofono ? 'Si' : 'No' }}</td>
			</tr>

			<tr>				
				<td>Unidad: {{ $FichaTecnica->unidad ? 'Si' : 'No' }}</td>
				<td>Tipo Porteria: {{ $FichaTecnica->tipo_porteria ? 'Si' : 'No' }}</td>
				<td>Shut Basura: {{ $FichaTecnica->shut_basura ? 'Si' : 'No' }}</td>
			</tr>

			<tr>				
				<td>Jacuzzi: {{ $FichaTecnica->jacuzzi ? 'Si' : 'No' }}</td>
				<td>Gimnasio: {{ $FichaTecnica->gimnasio ? 'Si' : 'No' }}</td>
				<td>Turco: {{ $FichaTecnica->turco ? 'Si' : 'No' }}</td>
			</tr>

			<tr>				
				<td>Biblioteca: {{ $FichaTecnica->biblioteca ? 'Si' : 'No' }}</td>
				<td>Circuito Cerrado: {{ $FichaTecnica->circuito_cerrado ? 'Si' : 'No' }}</td>
				<td></td>
			</tr>




		</tbody>
	</table>




</body>
</html>

