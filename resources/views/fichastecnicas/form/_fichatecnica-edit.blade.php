<style type="text/css">
	.row{
		padding-bottom: 15px;
	}

	/*.row>* {
    width: auto !important;
}*/


button#botonActualizar {
	width: -webkit-fill-available;
	margin-top: 15px;
}
</style>
<form action="{{ route('fichastecnicas.update', $fichatecnica) }}" method="POST" id="formularioFichaTecnica">
	@csrf
	@method('PUT')

	<section>
		<div class="row">
			<div class="col-md-4">
				<label for="input-cedula" class="form-label">Cedula</label><br>
				<input type="text" name="cedula" class="form-control {{ $errors->has('cedula') ? 'is-invalid' : '' }}" id="input-cedula" placeholder="Cedula" value="{{ old('cedula', isset($FichaTecnica) ? $FichaTecnica->cedula : '') }}" required autofocus>
				@if ($errors->has('cedula'))
				<div class="invalid-feedback">{{ $errors->first('cedula') }}</div>
				@endif
			</div>

			<div class="col-md-4">
				<label for="input-nom_propietario" class="form-label">Nombre del Propietario</label><br>
				<input type="text" name="nom_propietario" class="form-control {{ $errors->has('nom_propietario') ? 'is-invalid' : '' }}" id="input-nom_propietario" placeholder="Nombre del Propietario" value="{{ old('nom_propietario', isset($FichaTecnica) ? $FichaTecnica->nom_propietario : '') }}" required autofocus>
				@if ($errors->has('nom_propietario'))
				<div class="invalid-feedback">{{ $errors->first('nom_propietario') }}</div>
				@endif
			</div>

			<div class="col-md-4">
				<label for="input-telefono" class="form-label">Telefono</label><br>
				<input type="text" name="telefono" class="form-control {{ $errors->has('telefono') ? 'is-invalid' : '' }}" id="input-telefono" placeholder="Telefono" value="{{ old('telefono', isset($FichaTecnica) ? $FichaTecnica->telefono : '') }}" required autofocus>
				@if ($errors->has('telefono'))
				<div class="invalid-feedback">{{ $errors->first('telefono') }}</div>
				@endif
			</div>
		</div>

		<div class="row">

			<div class="col-md-4">
				<label for="input-nom_propiedad" class="form-label">Nombre Propiedad</label><br>
				<input type="text" name="nom_propiedad" class="form-control {{ $errors->has('nom_propiedad') ? 'is-invalid' : '' }}" id="input-nom_propiedad" placeholder="Ej: Remanso914" value="{{ old('nom_propiedad', isset($FichaTecnica) ? $FichaTecnica->nom_propiedad : '') }}" required autofocus>
				@if ($errors->has('nom_propiedad'))
				<div class="invalid-feedback">{{ $errors->first('nom_propiedad') }}</div>
				@endif
			</div>


			<div class="col-md-4">
				<label for="input-barrio" class="form-label">Barrio</label><br>
				<input type="text" name="barrio" class="form-control {{ $errors->has('barrio') ? 'is-invalid' : '' }}" id="input-barrio" placeholder="Barrio" value="{{ old('barrio', isset($FichaTecnica) ? $FichaTecnica->barrio : '') }}" required autofocus>
				@if ($errors->has('barrio'))
				<div class="invalid-feedback">{{ $errors->first('barrio') }}</div>
				@endif
			</div>


			<div class="col-md-4">
				<label for="input-direccion" class="form-label">Direccion</label><br>
				<input type="text" name="direccion" class="form-control {{ $errors->has('direccion') ? 'is-invalid' : '' }}" id="input-direccion" placeholder="Direccion" value="{{ old('direccion', isset($FichaTecnica) ? $FichaTecnica->direccion : '') }}" required autofocus>
				@if ($errors->has('direccion'))
				<div class="invalid-feedback">{{ $errors->first('direccion') }}</div>
				@endif
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<label for="input-administracion" class="form-label">Administracion</label><br>
				<input type="text" name="administracion" class="form-control {{ $errors->has('administracion') ? 'is-invalid' : '' }}" id="input-administracion" placeholder="Administracion" value="{{ old('administracion', isset($FichaTecnica) ? $FichaTecnica->administracion : '') }}" required autofocus>
				@if ($errors->has('administracion'))
				<div class="invalid-feedback">{{ $errors->first('administracion') }}</div>
				@endif
			</div>

			<div class="col-md-6">
				<label for="input-valor" class="form-label">Valor</label><br>
				<input type="text" name="valor" class="form-control {{ $errors->has('valor') ? 'is-invalid' : '' }}" id="input-valor" placeholder="Valor" value="{{ old('valor', isset($FichaTecnica) ? $FichaTecnica->valor : '') }}" required autofocus>
				@if ($errors->has('valor'))
				<div class="invalid-feedback">{{ $errors->first('valor') }}</div>
				@endif
			</div>
		</div>

		<div class="row">

			<div class="col-md-6">
				<label for="tipo_inmuebles_id" class="form-label">Tipo de Inmueble <a href="{{ route('tiposinmuebles.new') }}" target="_blank"><i class="fas fa-plus-square text-success" title="Agregar nuevo"></i></a></label><br>
				<select name="tipo_inmuebles_id" id="tipo_inmuebles_id" class="form-select {{ $errors->has('tipo_inmuebles_id') ? 'is-invalid' : '' }}" value="{{ old('tipo_inmuebles_id') }}">
					<option value="">Seleccione una opción...</option>
					@foreach ($tipoinmuebles as $id => $nombre)
					<option value="{{ $id }}" {{ $FichaTecnica->tipo_inmuebles_id == $id ? 'selected' : '' }}>
						{{ $nombre }}
					</option>
					@endforeach
				</select>
				@if ($errors->has('tipo_inmuebles_id'))
				<div class="invalid-feedback">{{ $errors->first('tipo_inmuebles_id') }}</div>
				@endif
			</div>


			<div class="col-md-6">
				<label for="tipo_transaccions_id" class="form-label">Tipo de Transacción <a href="{{ route('tipostransaccions.new') }}" target="_blank"><i class="fas fa-plus-square text-success" title="Agregar nuevo"></i></a></label><br>
				<select name="tipo_transaccions_id" id="tipo_transaccions_id" class="form-select {{ $errors->has('tipo_transaccions_id') ? 'is-invalid' : '' }}">
					<option value="">Seleccione una opción...</option>
					@foreach ($transacciones as $id => $nombre)
					<option value="{{ $id }}" {{ $FichaTecnica->tipo_transaccions_id == $id ? 'selected' : '' }}>
						{{ $nombre }}
					</option>
					@endforeach
				</select>
				@if ($errors->has('tipo_transaccions_id'))
				<div class="invalid-feedback">{{ $errors->first('tipo_transaccions_id') }}</div>
				@endif
			</div>

		</div>



		<div class="row">
			<div class="col-md-3">
				<label for="input-alcobas" class="form-label">Alcobas</label><br>
				<input type="number" name="alcobas" class="form-control {{ $errors->has('alcobas') ? 'is-invalid' : '' }}" id="input-alcobas" placeholder="Alcobas" value="{{ old('alcobas', isset($FichaTecnica) ? $FichaTecnica->alcobas : '') }}" required autofocus>
				@if ($errors->has('alcobas'))
				<div class="invalid-feedback">{{ $errors->first('alcobas') }}</div>
				@endif
			</div>


			<div class="col-md-2">
				<label for="input-closet" class="form-label">Closet</label><br>
				<input type="number" name="closet" class="form-control {{ $errors->has('closet') ? 'is-invalid' : '' }}" id="input-closet" placeholder="Closet" value="{{ old('closet', isset($FichaTecnica) ? $FichaTecnica->closet : '') }}" required autofocus>
				@if ($errors->has('closet'))
				<div class="invalid-feedback">{{ $errors->first('closet') }}</div>
				@endif
			</div>


			<div class="col-md-2">
				<label for="input-baño" class="form-label">Baño</label><br>
				<input type="number" name="baño" class="form-control {{ $errors->has('baño') ? 'is-invalid' : '' }}" id="input-baño" placeholder="Baño" value="{{ old('baño', isset($FichaTecnica) ? $FichaTecnica->baño : '') }}" required autofocus>
				@if ($errors->has('baño'))
				<div class="invalid-feedback">{{ $errors->first('baño') }}</div>
				@endif
			</div>


			<div class="col-md-2">
				<label for="input-estrato" class="form-label">Estrato</label><br>
				<input type="number" name="estrato" class="form-control {{ $errors->has('estrato') ? 'is-invalid' : '' }}" id="input-estrato" placeholder="Estrato" value="{{ old('estrato', isset($FichaTecnica) ? $FichaTecnica->estrato : '') }}" required autofocus>
				@if ($errors->has('estrato'))
				<div class="invalid-feedback">{{ $errors->first('estrato') }}</div>
				@endif
			</div>


			<div class="col-md-3">
				<label for="input-area" class="form-label">Area m2</label><br>
				<input type="number" name="area" class="form-control {{ $errors->has('area') ? 'is-invalid' : '' }}" id="input-area" placeholder="Area" value="{{ old('area', isset($FichaTecnica) ? $FichaTecnica->area : '') }}" required autofocus>
				@if ($errors->has('area'))
				<div class="invalid-feedback">{{ $errors->first('area') }}</div>
				@endif
			</div>

		</div>

		<div class="row">
			<div class="col-md-6">
				<label for="input-piso" class="form-label">Piso</label><br>
				<input type="text" name="piso" class="form-control {{ $errors->has('piso') ? 'is-invalid' : '' }}" id="input-piso" placeholder="Piso" value="{{ old('piso', isset($FichaTecnica) ? $FichaTecnica->piso : '') }}" required autofocus>
				@if ($errors->has('piso'))
				<div class="invalid-feedback">{{ $errors->first('piso') }}</div>
				@endif
			</div>


			<div class="col-md-6">
				<label for="calentadors_id" class="form-label">Calentador<!--  --></label><br>
				<select name="calentadors_id" id="calentadors_id" class="form-select {{ $errors->has('calentador') ? 'is-invalid' : '' }}" value="{{ old('calentadors_id') }}">
					<option value="">Seleccione una opción...</option>
					@foreach ($calentador as $id => $nombre)
					<option value="{{ $id }}" {{ $FichaTecnica->calentadors_id == $id ? 'selected' : '' }}>
						{{ $nombre }}
					</option>
					@endforeach
				</select>
				@if ($errors->has('calentador'))
				<div class="invalid-feedback">{{ $errors->first('calentador') }}</div>
				@endif
			</div>


		</div>

		<div class="row">	
			<div class="col-md-6">
				<label for="tipo_porterias_id" class="form-label">Tipo de Porteria <a href="{{ route('tipoporterias.new') }}" target="_blank"><i class="fas fa-plus-square text-success" title="Agregar nuevo"></i></a></label><br>
				<select name="tipo_porterias_id" id="tipo_porterias_id" class="form-select {{ $errors->has('tipo_porterias_id') ? 'is-invalid' : '' }}" value="{{ old('tipo_porterias_id') }}">
					<option value="">Seleccione una opción...</option>
					@foreach ($tipoporterias as $id => $nombre)
					<option value="{{ $id }}" {{ $FichaTecnica->tipo_porterias_id == $id ? 'selected' : '' }}>
						{{ $nombre }}
					</option>
					@endforeach
				</select>
				@if ($errors->has('tipo_porterias_id'))
				<div class="invalid-feedback">{{ $errors->first('tipo_porterias_id') }}</div>
				@endif
			</div>


			<div class="col-md-6">
				<label for="tipo_cocinas_id" class="form-label">Tipo de Cocina <a href="{{ route('tipococinas.new') }}" target="_blank"><i class="fas fa-plus-square text-success" title="Agregar nuevo"></i></a></label><br>
				<select name="tipo_cocinas_id" id="tipo_cocinas_id" class="form-select {{ $errors->has('tipo_cocinas_id') ? 'is-invalid' : '' }}" value="{{ old('tipo_cocinas_id') }}">
					<option value="">Seleccione una opción...</option>
					@foreach ($tipococinas as $id => $nombre)
					<option value="{{ $id }}" {{ $FichaTecnica->tipo_cocinas_id == $id ? 'selected' : '' }}>
						{{ $nombre }}
					</option>
					@endforeach
				</select>
				@if ($errors->has('tipo_cocinas_id'))
				<div class="invalid-feedback">{{ $errors->first('tipo_cocinas_id') }}</div>
				@endif
			</div>

		</div>

		<hr style="border: 0.5px solid; opacity: 10%;">

		<div class="row">
			<div class="col-md-2 col-xs-4">
				<label class="form-label" for="vestier" data-on-label="Si" data-off-label="No">Vestier</label><br>
				<input id="vestier" name="vestier" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
				@if(old('vestier', isset($FichaTecnica) && $FichaTecnica->vestier === 1)) checked @endif switch="none">
				@if ($errors->has('vestier'))
				<div class="invalid-feedback">{{ $errors->first('vestier') }}</div>
				@endif
			</div>

			<div class="col-md-2 col-xs-4">
				<label class="form-label" for="balcon" data-on-label="Si" data-off-label="No">Balcón</label><br>
				<input id="balcon" name="balcon" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
				@if(old('balcon', isset($FichaTecnica) && $FichaTecnica->balcon === 1)) checked @endif switch="none">
				@if ($errors->has('balcon'))
				<div class="invalid-feedback">{{ $errors->first('balcon') }}</div>
				@endif
			</div>

			<div class="col-md-2 col-xs-4">
				<label class="form-label" for="sala_comedor" data-on-label="Si" data-off-label="No">Sala Comedor</label><br>
				<input id="sala_comedor" name="sala_comedor" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
				@if(old('sala_comedor', isset($FichaTecnica) && $FichaTecnica->sala_comedor === 1)) checked @endif switch="none">
				@if ($errors->has('sala_comedor'))
				<div class="invalid-feedback">{{ $errors->first('sala_comedor') }}</div>
				@endif
			</div>

			<div class="col-md-2 col-xs-4">
				<label class="form-label" for="patio" data-on-label="Si" data-off-label="No">Patio</label><br>
				<input id="patio" name="patio" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
				@if(old('patio', isset($FichaTecnica) && $FichaTecnica->patio === 1)) checked @endif switch="none">
				@if ($errors->has('patio'))
				<div class="invalid-feedback">{{ $errors->first('patio') }}</div>
				@endif
			</div>

			<div class="col-md-2 col-xs-4">
				<label class="form-label" for="zona_ropa" data-on-label="Si" data-off-label="No">Zona de ropa</label><br>
				<input id="zona_ropa" name="zona_ropa" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
				@if(old('zona_ropa', isset($FichaTecnica) && $FichaTecnica->zona_ropa === 1)) checked @endif switch="none">
				@if ($errors->has('zona_ropa'))
				<div class="invalid-feedback">{{ $errors->first('zona_ropa') }}</div>
				@endif
			</div>

			<div class="col-md-2 col-xs-4">
				<label class="form-label" for="estudio_estar" data-on-label="Si" data-off-label="No">Estudio / Estar</label><br>
				<input id="estudio_estar" name="estudio_estar" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
				@if(old('estudio_estar', isset($FichaTecnica) && $FichaTecnica->estudio_estar === 1)) checked @endif switch="none">
				@if ($errors->has('estudio_estar'))
				<div class="invalid-feedback">{{ $errors->first('estudio_estar') }}</div>
				@endif
			</div>
		</div>

		<hr style="border: 0.5px solid; opacity: 10%;">

		<div class="row">
			<div class="col-md-2 col-xs-4">
				<label class="form-label" for="red_gas" data-on-label="Si" data-off-label="No">Red de gas</label><br>
				<input id="red_gas" name="red_gas" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
				@if(old('red_gas', isset($FichaTecnica) && $FichaTecnica->red_gas === 1)) checked @endif switch="none">
				@if ($errors->has('red_gas'))
				<div class="invalid-feedback">{{ $errors->first('red_gas') }}</div>
				@endif
			</div>

			<div class="col-md-2 col-xs-4">
				<label class="form-label" for="cuarto_util" data-on-label="Si" data-off-label="No">Cuarto Util</label><br>
				<input id="cuarto_util" name="cuarto_util" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
				@if(old('cuarto_util', isset($FichaTecnica) && $FichaTecnica->cuarto_util === 1)) checked @endif switch="none">
				@if ($errors->has('cuarto_util'))
				<div class="invalid-feedback">{{ $errors->first('cuarto_util') }}</div>
				@endif
			</div>

			<div class="col-md-2 col-xs-4">
				<label class="form-label" for="ascensor" data-on-label="Si" data-off-label="No">Ascensor</label><br>
				<input id="ascensor" name="ascensor" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
				@if(old('ascensor', isset($FichaTecnica) && $FichaTecnica->ascensor === 1)) checked @endif switch="none">
				@if ($errors->has('ascensor'))
				<div class="invalid-feedback">{{ $errors->first('ascensor') }}</div>
				@endif
			</div>

			<div class="col-md-2 col-xs-4">
				<label class="form-label" for="parqueadero" data-on-label="Si" data-off-label="No">Parqueadero</label><br>
				<input id="parqueadero" name="parqueadero" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
				@if(old('parqueadero', isset($FichaTecnica) && $FichaTecnica->parqueadero === 1)) checked @endif switch="none">
				@if ($errors->has('parqueadero'))
				<div class="invalid-feedback">{{ $errors->first('parqueadero') }}</div>
				@endif
			</div>

			<div class="col-md-2 col-xs-4">
				<label class="form-label" for="parqueadero_visitantes" data-on-label="Si" data-off-label="No">Parqueadero Visitantes</label><br>
				<input id="parqueadero_visitantes" name="parqueadero_visitantes" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
				@if(old('parqueadero_visitantes', isset($FichaTecnica) && $FichaTecnica->parqueadero_visitantes === 1)) checked @endif switch="none">
				@if ($errors->has('parqueadero_visitantes'))
				<div class="invalid-feedback">{{ $errors->first('parqueadero_visitantes') }}</div>
				@endif
			</div>

			<div class="col-md-2 col-xs-4">
				<label class="form-label" for="juegos_infantiles" data-on-label="Si" data-off-label="No">Juegos Infantiles</label><br>
				<input id="juegos_infantiles" name="juegos_infantiles" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
				@if(old('juegos_infantiles', isset($FichaTecnica) && $FichaTecnica->juegos_infantiles === 1)) checked @endif switch="none">
				@if ($errors->has('juegos_infantiles'))
				<div class="invalid-feedback">{{ $errors->first('juegos_infantiles') }}</div>
				@endif
			</div>
		</div>


		<hr style="border: 0.5px solid; opacity: 10%;">

		<div class="row">	
			<div class="col-md-2 col-xs-4">
				<label class="form-label" for="salon_social" data-on-label="Si" data-off-label="No">Salón Social</label><br>
				<input id="salon_social" name="salon_social" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
				@if(old('salon_social', isset($FichaTecnica) && $FichaTecnica->salon_social === 1)) checked @endif switch="none">
				@if ($errors->has('salon_social'))
				<div class="invalid-feedback">{{ $errors->first('salon_social') }}</div>
				@endif
			</div>

			<div class="col-md-2 col-xs-4">
				<label class="form-label" for="propiedad_horizontal" data-on-label="Si" data-off-label="No">Propiedad Horizontal</label><br>
				<input id="propiedad_horizontal" name="propiedad_horizontal" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
				@if(old('propiedad_horizontal', isset($FichaTecnica) && $FichaTecnica->propiedad_horizontal === 1)) checked @endif switch="none">
				@if ($errors->has('propiedad_horizontal'))
				<div class="invalid-feedback">{{ $errors->first('propiedad_horizontal') }}</div>
				@endif
			</div>

			<div class="col-md-2 col-xs-4">
				<label class="form-label" for="citofono" data-on-label="Si" data-off-label="No">Citófono</label><br>
				<input id="citofono" name="citofono" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
				@if(old('citofono', isset($FichaTecnica) && $FichaTecnica->citofono === 1)) checked @endif switch="none">
				@if ($errors->has('citofono'))
				<div class="invalid-feedback">{{ $errors->first('citofono') }}</div>
				@endif
			</div>

			<div class="col-md-2 col-xs-4">
				<label class="form-label" for="unidad" data-on-label="Si" data-off-label="No">Unidad</label><br>
				<input id="unidad" name="unidad" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
				@if(old('unidad', isset($FichaTecnica) && $FichaTecnica->unidad === 1)) checked @endif switch="none">
				@if ($errors->has('unidad'))
				<div class="invalid-feedback">{{ $errors->first('unidad') }}</div>
				@endif
			</div>

			<div class="col-md-2 col-xs-4">
				<label class="form-label" for="shut_basura" data-on-label="Si" data-off-label="No">Shut Basura</label><br>
				<input id="shut_basura" name="shut_basura" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
				@if(old('shut_basura', isset($FichaTecnica) && $FichaTecnica->shut_basura === 1)) checked @endif switch="none">
				@if ($errors->has('shut_basura'))
				<div class="invalid-feedback">{{ $errors->first('shut_basura') }}</div>
				@endif
			</div>

			<div class="col-md-2 col-xs-4">
				<label class="form-label" for="jacuzzi" data-on-label="Si" data-off-label="No">Jacuzzi</label><br>
				<input id="jacuzzi" name="jacuzzi" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
				@if(old('jacuzzi', isset($FichaTecnica) && $FichaTecnica->jacuzzi === 1)) checked @endif switch="none">
				@if ($errors->has('jacuzzi'))
				<div class="invalid-feedback">{{ $errors->first('jacuzzi') }}</div>
				@endif
			</div>
		</div>


		<hr style="border: 0.5px solid; opacity: 10%;">

		<div class="row">	

			

			<div class="col-md-2 col-xs-4">
				<label class="form-label" for="gimnasio" data-on-label="Si" data-off-label="No">Gimnasio</label><br>
				<input id="gimnasio" name="gimnasio" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
				@if(old('gimnasio', isset($FichaTecnica) && $FichaTecnica->gimnasio === 1)) checked @endif switch="none">
				@if ($errors->has('gimnasio'))
				<div class="invalid-feedback">{{ $errors->first('gimnasio') }}</div>
				@endif
			</div>

			<div class="col-md-2 col-xs-4">
				<label class="form-label" for="turco" data-on-label="Si" data-off-label="No">Turco</label><br>
				<input id="turco" name="turco" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
				@if(old('turco', isset($FichaTecnica) && $FichaTecnica->turco === 1)) checked @endif switch="none">
				@if ($errors->has('turco'))
				<div class="invalid-feedback">{{ $errors->first('turco') }}</div>
				@endif
			</div>

			<div class="col-md-2 col-xs-4">
				<label class="form-label" for="biblioteca" data-on-label="Si" data-off-label="No">Biblioteca</label><br>
				<input id="biblioteca" name="biblioteca" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
				@if(old('biblioteca', isset($FichaTecnica) && $FichaTecnica->biblioteca === 1)) checked @endif switch="none">
				@if ($errors->has('biblioteca'))
				<div class="invalid-feedback">{{ $errors->first('biblioteca') }}</div>
				@endif
			</div>

			<div class="col-md-2 col-xs-4">
				<label class="form-label" for="circuito_cerrado" data-on-label="Si" data-off-label="No">Circuito Cerrado</label><br>
				<input id="circuito_cerrado" name="circuito_cerrado" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
				@if(old('circuito_cerrado', isset($FichaTecnica) && $FichaTecnica->circuito_cerrado === 1)) checked @endif switch="none">
				@if ($errors->has('circuito_cerrado'))
				<div class="invalid-feedback">{{ $errors->first('circuito_cerrado') }}</div>
				@endif
			</div>
		</div>
		

		<!-- Contenedor para previsualización de imágenes -->
		<div class="row mt-3" id="preview"></div>

		<button type="submit" id="botonActualizar" class="btn btn-warning waves-effect waves-light">Actualizar</button>
	</form>


	<hr style="border: 0.5px solid; opacity: 10%;">
	<h3>Imágenes Actuales</h3>

	<!-- Contenedor para mostrar las imágenes actuales -->
	<div class="row">
		@foreach($imagenes as $image)
		<div class="col-md-3 mb-4">
			<div class="card">
				<img src="{{ asset('/' . $image->url) }}" class="card-img-top img-fluid img-thumbnail" alt="Imagen" onclick="openModal(this)">
				<div class="card-body text-center">
					<button class="btn btn-danger" id="btn-eliminar" onclick="eliminarImagen({{ $image->id }})">Eliminar</button>
				</div>
			</div>
		</div>
		@endforeach
	</div>

	<!-- Modal para mostrar la imagen en tamaño grande -->
	<div id="imageModal" class="modal fade" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="imageModalLabel">Imagen</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<img class="img-fluid" id="modalImage" alt="Imagen">
				</div>
			</div>
		</div>
	</div>

	<hr style="border: 0.5px solid; opacity: 10%;">

	<!-- Botón para abrir el modal -->
	<button type="button" class="btn btn-primary w-100 waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addImagesModal">
		Agregar Imágenes
	</button>

	<!-- Modal para agregar imágenes -->
	<div class="modal fade" id="addImagesModal" tabindex="-1" aria-labelledby="addImagesModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg"> <!-- Agregué la clase modal-lg aquí -->
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addImagesModalLabel">Agregar Imágenes</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="{{ route('file.addImages', [$fichatecnica->id, $image->carpeta]) }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="mb-3">
							<label for="imagenes" class="form-label">Seleccionar Imágenes</label>
							<input type="hidden" name="" value="{{ $fichatecnica->id }}">
							<input type="hidden" name="" value="{{ $image->carpeta }}">
							<input type="file" name="imagenes[]" id="imagenes" class="form-control" multiple>
							<div id="preview-container"></div>
						</div>
						<button type="submit" class="btn btn-primary">Guardar Imágenes</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<style>
		#preview-container {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
		}

		#preview-container img {
			margin: 10px;
			height: 200px;
		}

		#preview-container .remove-button {
			font-size: 12px;
			color: #red;
			cursor: pointer;
		}
	</style>

	<!--... resto del código... -->

	<div id="preview-container"></div>

	<script>
		const input = document.getElementById('imagenes');
		const previewContainer = document.getElementById('preview-container');

		input.addEventListener('change', (e) => {
			const files = input.files;
			previewContainer.innerHTML = '';

			for (let i = 0; i < files.length; i++) {
				const file = files[i];
				const reader = new FileReader();

				reader.onload = (e) => {
					const img = document.createElement('img');
					img.src = e.target.result;
					img.height = 200;

					const removeButton = document.createElement('button');
					removeButton.className = 'remove-button btn btn-danger';
					removeButton.textContent = 'Remover';

					removeButton.addEventListener('click', () => {
          // Eliminar la imagen correspondiente
						img.remove();
						removeButton.remove();
					});

					const imageContainer = document.createElement('div');
					imageContainer.appendChild(img);
					imageContainer.appendChild(removeButton);

					previewContainer.appendChild(imageContainer);
				};

				reader.readAsDataURL(file);
			}
		});
	</script>





	<!-- Scripts de Bootstrap -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

	<script>
		function previewImages(event) {
			var files = event.target.files;
			var previewContainer = document.getElementById('preview');
		previewContainer.innerHTML = ''; // Limpiar cualquier previsualización existente

		for (var i = 0; i < files.length; i++) {
			var file = files[i];

			if (file.type.match('image.*')) {
				var reader = new FileReader();

				reader.onload = (function(theFile) {
					return function(e) {
						var colDiv = document.createElement('div');
						colDiv.className = 'col-md-3 mb-4';
						colDiv.innerHTML = '<div class="card">' +
						'<img src="' + e.target.result + '" class="card-img-top img-fluid img-thumbnail" alt="Previsualización" onclick="openModal(this)">' +
						'<div class="card-body text-center">' +
						'<button type="button" class="btn btn-danger btn-eliminar" id="btn-eliminar" onclick="removeImage(this)">Eliminar</button>' +
						'</div>' +
						'</div>';
						previewContainer.appendChild(colDiv);

						// Verificar el número total de imágenes después de agregar
						checkDeleteButton();
					};
				})(file);

				reader.readAsDataURL(file);
			}
		}
	}

	function checkDeleteButton() {
        // Contar los botones con el id 'btn-eliminar'
		var botonesEliminar = document.querySelectorAll('#btn-eliminar');
		console.log('Número de botones "Eliminar":', botonesEliminar.length);

        // Deshabilitar el botón si solo hay uno
		if (botonesEliminar.length === 1) {
            botonesEliminar[0].disabled = true; // Deshabilitar el único botón
        } else {
            // Habilitar todos los botones si hay más de uno
        	botonesEliminar.forEach(function(button) {
        		button.disabled = false;
        	});
        }
    }

    // Llamar a checkDeleteButton inicialmente para verificar el estado de los botones
    checkDeleteButton();

    function removeImage(button) {
		var imageContainer = button.closest('.col-md-3'); // Cambiar a .col-md-3 para eliminar el contenedor correcto
		imageContainer.remove(); // Eliminar el contenedor de la imagen

		// Llamar a checkDeleteButton para actualizar el estado del botón de eliminar
		checkDeleteButton();
	}

	function openModal(imgElement) {
		var modal = new bootstrap.Modal(document.getElementById('imageModal'));
		var modalImage = document.getElementById('modalImage');
		modalImage.src = imgElement.src;
		modal.show();
	}

	function eliminarImagen(imageId) {
		if (confirm('¿Estás seguro de que quieres eliminar esta imagen?')) {
			// Realizar la petición para eliminar la imagen
			fetch(`/eliminar-imagen/${imageId}`, {
				method: 'DELETE',
				headers: {
					'X-CSRF-TOKEN': '{{ csrf_token() }}',
					'Content-Type': 'application/json'
				}
			}).then(response => {
				if (response.ok) {
					location.reload();
				} else {
					alert('Error al eliminar la imagen.');
				}
			});
		}
	}
</script>
