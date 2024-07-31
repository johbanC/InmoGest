<style type="text/css">
	.row{
		padding-bottom: 15px;
	}

	/*.row>* {
    width: auto !important;
}*/

.image-container {
	position: relative;
	display: inline-block;
/*            margin: 5px;
*/        }
	.image-container img {
		max-width: 100%;
		max-height: 150px;
		cursor: pointer;
	}
	.remove-button {
		position: absolute;
		bottom: 10px;
		left: 50%;
		transform: translateX(-50%);
		background-color: red;
		color: white;
		border: none;
		border-radius: 5px;
		cursor: pointer;
		padding: 5px 10px;
	}
	.modal {
		display: none;
		position: fixed;
		z-index: 1;
		padding-top: 10%;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		overflow: auto;
		background-color: rgb(0,0,0);
		background-color: rgba(0,0,0,0.9);
		text-align: center; /* Alinear contenido al centro horizontal */
	}

	.modal-content {
		margin: auto;
		display: block;
		width: 80%;
		max-width: 700px;
		max-height: 80%; /* Ajustar según el tamaño deseado */
	}

	.close {
		position: absolute;
		top: 15px;
		right: 35px;
		color: #fff;
		font-size: 40px;
		font-weight: bold;
		transition: 0.3s;
	}
	.close:hover,
	.close:focus {
		color: #bbb;
		text-decoration: none;
		cursor: pointer;
	}
</style>

<form id="formularioFichaTecnica" method="POST" action="{{ route('fichastecnicas.store') }}" class="row g-3 needs-validation" novalidate  enctype="multipart/form-data">
	<section>
		@csrf
		<div class="row">
			<div class="col-md-4">
				<label for="input-cedula" class="form-label">Cedula</label><br>
				<input type="text" name="cedula" class="form-control {{ $errors->has('cedula') ? 'is-invalid' : '' }}" id="input-cedula" placeholder="Cedula" value="{{ old('cedula') }}" required autofocus>
				@if ($errors->has('cedula'))
				<div class="invalid-feedback">{{ $errors->first('cedula') }}</div>
				@endif
			</div>

			<div class="col-md-4">
				<label for="input-nom_propietario" class="form-label">Nombre del Propietario</label><br>
				<input type="text" name="nom_propietario"  class="form-control {{ $errors->has('nom_propietario') ? 'is-invalid' : '' }}" id="input-propietario" placeholder="Nombre del Propietario" value="{{ old('nom_propietario') }}" required>
				@if ($errors->has('nom_propietario'))
				<div class="invalid-feedback">{{ $errors->first('nom_propietario') }}</div>
				@endif
			</div>

			<div class="col-md-4">
				<label for="input-telefono" class="form-label">Teléfono</label><br>
				<input type="text" name="telefono" class="form-control {{ $errors->has('telefono') ? 'is-invalid' : '' }}" id="input-telefono" placeholder="Teléfono" value="{{ old('telefono') }}">
				@if ($errors->has('telefono'))
				<div class="invalid-feedback">{{ $errors->first('telefono') }}</div>
				@endif
			</div>
		</div>

		<div class="row">	

			<div class="col-md-4">
				<label for="input-nom_propiedad" class="form-label">Nombre Propiedad</label><br>
				<input type="text" name="nom_propiedad" class="form-control {{ $errors->has('nom_propiedad') ? 'is-invalid' : '' }}" id="input-nom_propiedad" placeholder="Ej: Remanso914" value="{{ old('nom_propiedad') }}">
				@if ($errors->has('nom_propiedad'))
				<div class="invalid-feedback">{{ $errors->first('nom_propiedad') }}</div>
				@endif
			</div>

			<div class="col-md-4">
				<label for="input-barrio" class="form-label">Barrio</label><br>
				<input type="text" name="barrio" class="form-control {{ $errors->has('barrio') ? 'is-invalid' : '' }}" id="input-barrio" placeholder="Barrio" value="{{ old('barrio') }}">
				@if ($errors->has('barrio'))
				<div class="invalid-feedback">{{ $errors->first('barrio') }}</div>
				@endif
			</div>

			<div class="col-md-4">
				<label for="input-direccion" class="form-label">Dirección</label><br>
				<input type="text" name="direccion" class="form-control {{ $errors->has('direccion') ? 'is-invalid' : '' }}" id="input-direccion" placeholder="Dirección" value="{{ old('direccion') }}">
				@if ($errors->has('direccion'))
				<div class="invalid-feedback">{{ $errors->first('direccion') }}</div>
				@endif
			</div>

		</div>

		<div class="row">

			<div class="col-md-6">
				<label for="input-administracion" class="form-label">Administración</label><br>
				<input type="text" name="administracion" class="form-control {{ $errors->has('administracion') ? 'is-invalid' : '' }}" id="input-administracion" placeholder="Administración" value="{{ old('administracion') }}">
				@if ($errors->has('administracion'))
				<div class="invalid-feedback">{{ $errors->first('administracion') }}</div>
				@endif
			</div>

			<div class="col-md-6">
				<label for="input-valor" class="form-label">Valor</label><br>
				<input type="text" name="valor" class="form-control {{ $errors->has('valor') ? 'is-invalid' : '' }}" id="input-valor" placeholder="Valor" value="{{ old('valor') }}">
				@if ($errors->has('valor'))
				<div class="invalid-feedback">{{ $errors->first('valor') }}</div>
				@endif
			</div>


		</div>


		<div class="row">


			<div class="col-md-6">
				<label for="tipo_inmuebles_id" class="form-label">Tipo de Inmueble <a href="{{ route('tiposinmuebles.new') }}" target="_black"><i class="fas fa-plus-square text-success" title="Agregar nuevo"></i></a></label><br>
				<select name="tipo_inmuebles_id" id="tipo_inmuebles_id" class="form-select {{ $errors->has('tipo_inmuebles_id') ? 'is-invalid' : '' }}">
					<option value="">Seleccione una opción...</option>
					@foreach ($tipoinmuebles as $id => $nombre)
					<option value="{{ $id }}" {{ old('tipo_inmuebles_id') == $id ? 'selected' : '' }}>
						{{ $nombre }}
					</option>
					@endforeach
				</select>
				@if ($errors->has('tipo_inmuebles_id'))
				<div class="invalid-feedback">{{ $errors->first('tipo_inmuebles_id') }}</div>
				@endif
			</div>



			<div class="col-md-6">
				<label for="tipo_transaccions_id" class="form-label">Tipo de Transacción <a href="{{ route('tipostransaccions.new') }}" target="_black"><i class="fas fa-plus-square text-success" title="Agregar nuevo"></i></a></label><br>
				<select name="tipo_transaccions_id" id="tipo_transaccions_id" class="form-select {{ $errors->has('tipo_transaccions_id') ? 'is-invalid' : '' }}">
					<option value="">Seleccione una opción...</option>
					@foreach ($transacciones as $id => $nombre)
					<option value="{{ $id }}" {{ old('tipo_transaccions_id') == $id ? 'selected' : '' }}>
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
				<input type="text" name="alcobas" class="form-control {{ $errors->has('alcobas') ? 'is-invalid' : '' }}" id="input-alcobas" placeholder="Alcobas" value="{{ old('alcobas') }}">
				@if ($errors->has('alcobas'))
				<div class="invalid-feedback">{{ $errors->first('alcobas') }}</div>
				@endif
			</div>

			<div class="col-md-2">
				<label for="closet" class="form-label">Closet</label><br>
				<input name="closet" id="closet" type="number" class="form-control {{ $errors->has('closet') ? 'is-invalid' : '' }}" placeholder="Closet" value="{{ old('closet') }}">
				@if ($errors->has('closet'))
				<div class="invalid-feedback">{{ $errors->first('closet') }}</div>
				@endif
			</div>

			<div class="col-md-2">
				<label for="baño" class="form-label">Baño</label><br>
				<input name="baño" id="baño" type="number" class="form-control {{ $errors->has('baño') ? 'is-invalid' : '' }}" placeholder="Baño" value="{{ old('baño') }}">
				@if ($errors->has('baño'))
				<div class="invalid-feedback">{{ $errors->first('baño') }}</div>
				@endif
			</div>

			<div class="col-md-2">
				<label for="estrato" class="form-label">Estrato</label><br>
				<input name="estrato" id="estrato" type="number" class="form-control {{ $errors->has('estrato') ? 'is-invalid' : '' }}" placeholder="Estrato" value="{{ old('estrato') }}">
				@if ($errors->has('estrato'))
				<div class="invalid-feedback">{{ $errors->first('estrato') }}</div>
				@endif
			</div>

			<div class="col-md-3">
				<label for="area" class="form-label">Área m2</label><br>
				<input name="area" id="area" type="number" class="form-control {{ $errors->has('area') ? 'is-invalid' : '' }}" placeholder="Área" value="{{ old('area') }}">
				@if ($errors->has('area'))
				<div class="invalid-feedback">{{ $errors->first('area') }}</div>
				@endif
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<label for="piso" class="form-label">Tipo de Piso</label><br>
				<input name="piso" id="piso" type="text" class="form-control {{ $errors->has('piso') ? 'is-invalid' : '' }}" placeholder="Piso" value="{{ old('piso') }}">
				@if ($errors->has('piso'))
				<div class="invalid-feedback">{{ $errors->first('piso') }}</div>
				@endif
			</div>

			
				<div class="col-md-6">
					<label for="calentadors_id" class="form-label">Tipo de Calentador <a href="{{ route('calentadors.new') }}" target="_black"><i class="fas fa-plus-square text-success" title="Agregar nuevo"></i></a></label><br>
					<select name="calentadors_id" id="calentadors_id" class="form-select {{ $errors->has('calentadors_id') ? 'is-invalid' : '' }}">
						<option value="">Seleccione una opción...</option>
						@foreach ($calentador as $id => $nombre)
						<option value="{{ $id }}" {{ old('calentadors_id') == $id ? 'selected' : '' }}>
							{{ $nombre }}
						</option>
						@endforeach
					</select>
					@if ($errors->has('calentadors_id'))
					<div class="invalid-feedback">{{ $errors->first('calentadors_id') }}</div>
					@endif
				</div>

			</div>

			<div class="row">
				<div class="col-md-6">
					<label for="tipo_porterias_id" class="form-label">Tipo de Portería <a href="{{ route('tipoporterias.new') }}" target="_black"><i class="fas fa-plus-square text-success" title="Agregar nuevo"></i></a></label><br>
					<select name="tipo_porterias_id" id="tipo_porterias_id" class="form-select {{ $errors->has('tipo_porterias_id') ? 'is-invalid' : '' }}">
						<option value="">Seleccione una opción...</option>
						@foreach ($tipoporterias as $id => $nombre)
						<option value="{{ $id }}" {{ old('tipo_porterias_id') == $id ? 'selected' : '' }}>
							{{ $nombre }}
						</option>
						@endforeach
					</select>
					@if ($errors->has('tipo_porterias_id'))
					<div class="invalid-feedback">{{ $errors->first('tipo_porterias_id') }}</div>
					@endif
				</div>

				<div class="col-md-6">
					<label for="tipo_cocinas_id" class="form-label">Tipo de Cocina <a href="{{ route('tipococinas.new') }}" target="_black"><i class="fas fa-plus-square text-success" title="Agregar nuevo"></i></a></label><br>
					<select name="tipo_cocinas_id" id="tipo_cocinas_id" class="form-select {{ $errors->has('tipo_cocinas_id') ? 'is-invalid' : '' }}">
						<option value="">Seleccione una opción...</option>
						@foreach ($tipococinas as $id => $nombre)
						<option value="{{ $id }}" {{ old('tipo_cocinas_id') == $id ? 'selected' : '' }}>
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
					<input id="sala_comedor" name="sala_comedor" type="checkbox"  data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
					@if(old('sala_comedor', isset($FichaTecnica) && $FichaTecnica->sala_comedor === 1)) checked @endif switch="none">
					@if ($errors->has('sala_comedor'))
					<div class="invalid-feedback">{{ $errors->first('sala_comedor') }}</div>
					@endif
				</div>

				<div class="col-md-2 col-xs-4">
					<label class="form-label" for="patio" data-on-label="Si" data-off-label="No">Patio</label><br>
					<input id="patio" name="patio" type="checkbox"  data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
					@if(old('patio', isset($FichaTecnica) && $FichaTecnica->patio === 1)) checked @endif switch="none">
					@if ($errors->has('patio'))
					<div class="invalid-feedback">{{ $errors->first('patio') }}</div>
					@endif
				</div>

				<div class="col-md-2 col-xs-4">
					<label class="form-label" for="zona_ropa" data-on-label="Si" data-off-label="No">Zona de ropa</label><br>
					<input id="zona_ropa" name="zona_ropa" type="checkbox"  data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
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
				<div class="col-md-2">
					<label class="form-label" for="red_gas" data-on-label="Si" data-off-label="No">Red de gas</label><br>
					<input id="red_gas" name="red_gas" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
					@if(old('red_gas', isset($FichaTecnica) && $FichaTecnica->red_gas === 1)) checked @endif switch="none">
					@if ($errors->has('red_gas'))
					<div class="invalid-feedback">{{ $errors->first('red_gas') }}</div>
					@endif
				</div>

				<div class="col-md-2">
					<label class="form-label" for="cuarto_util" data-on-label="Si" data-off-label="No">Cuarto Util</label><br>
					<input id="cuarto_util" name="cuarto_util" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
					@if(old('cuarto_util', isset($FichaTecnica) && $FichaTecnica->cuarto_util === 1)) checked @endif switch="none">
					@if ($errors->has('cuarto_util'))
					<div class="invalid-feedback">{{ $errors->first('cuarto_util') }}</div>
					@endif
				</div>

				<div class="col-md-2">
					<label class="form-label" for="ascensor" data-on-label="Si" data-off-label="No">Ascensor</label><br>
					<input id="ascensor" name="ascensor" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
					@if(old('ascensor', isset($FichaTecnica) && $FichaTecnica->ascensor === 1)) checked @endif switch="none">
					@if ($errors->has('ascensor'))
					<div class="invalid-feedback">{{ $errors->first('ascensor') }}</div>
					@endif
				</div>

				<div class="col-md-2">
					<label class="form-label" for="parqueadero" data-on-label="Si" data-off-label="No">Parqueadero</label><br>
					<input id="parqueadero" name="parqueadero" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
					@if(old('parqueadero', isset($FichaTecnica) && $FichaTecnica->parqueadero === 1)) checked @endif switch="none">
					@if ($errors->has('parqueadero'))
					<div class="invalid-feedback">{{ $errors->first('parqueadero') }}</div>
					@endif
				</div>

				<div class="col-md-2">
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
				<div class="col-md-2">
					<label class="form-label" for="salon_social" data-on-label="Si" data-off-label="No">Salon Social</label><br>
					<input id="salon_social" name="salon_social" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
					@if(old('salon_social', isset($FichaTecnica) && $FichaTecnica->salon_social === 1)) checked @endif switch="none">
					@if ($errors->has('salon_social'))
					<div class="invalid-feedback">{{ $errors->first('salon_social') }}</div>
					@endif
				</div>			

				<div class="col-md-2">
					<label class="form-label" for="propiedad_horizontal" data-on-label="Si" data-off-label="No">Propiedad Horizontal</label><br>
					<input id="propiedad_horizontal" name="propiedad_horizontal" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
					@if(old('propiedad_horizontal', isset($FichaTecnica) && $FichaTecnica->propiedad_horizontal === 1)) checked @endif switch="none">
					@if ($errors->has('propiedad_horizontal'))
					<div class="invalid-feedback">{{ $errors->first('propiedad_horizontal') }}</div>
					@endif
				</div>

				<div class="col-md-2">
					<label class="form-label" for="citofono" data-on-label="Si" data-off-label="No">Citofono</label><br>
					<input id="citofono" name="citofono" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
					@if(old('citofono', isset($FichaTecnica) && $FichaTecnica->citofono === 1)) checked @endif switch="none">
					@if ($errors->has('citofono'))
					<div class="invalid-feedback">{{ $errors->first('citofono') }}</div>
					@endif
				</div>

				<div class="col-md-2">
					<label class="form-label" for="unidad" data-on-label="Si" data-off-label="No">Unidad</label><br>
					<input id="unidad" name="unidad" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
					@if(old('unidad', isset($FichaTecnica) && $FichaTecnica->unidad === 1)) checked @endif switch="none">
					@if ($errors->has('unidad'))
					<div class="invalid-feedback">{{ $errors->first('unidad') }}</div>
					@endif
				</div>

				<div class="col-md-2">
					<label class="form-label" for="shut_basura" data-on-label="Si" data-off-label="No">Shut Basura</label><br>
					<input id="shut_basura" name="shut_basura" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
					@if(old('shut_basura', isset($FichaTecnica) && $FichaTecnica->shut_basura === 1)) checked @endif switch="none">
					@if ($errors->has('shut_basura'))
					<div class="invalid-feedback">{{ $errors->first('shut_basura') }}</div>
					@endif
				</div>

				<div class="col-md-2">
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

				<div class="col-md-2">
					<label class="form-label" for="gimnasio" data-on-label="Si" data-off-label="No">Gimnasio</label><br>
					<input id="gimnasio" name="gimnasio" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
					@if(old('gimnasio', isset($FichaTecnica) && $FichaTecnica->gimnasio === 1)) checked @endif switch="none">
					@if ($errors->has('gimnasio'))
					<div class="invalid-feedback">{{ $errors->first('gimnasio') }}</div>
					@endif
				</div>

				<div class="col-md-2">
					<label class="form-label" for="turco" data-on-label="Si" data-off-label="No">Turco</label><br>
					<input id="turco" name="turco" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
					@if(old('turco', isset($FichaTecnica) && $FichaTecnica->turco === 1)) checked @endif switch="none">
					@if ($errors->has('turco'))
					<div class="invalid-feedback">{{ $errors->first('turco') }}</div>
					@endif
				</div>

				<div class="col-md-2">
					<label class="form-label" for="biblioteca" data-on-label="Si" data-off-label="No">Biblioteca</label><br>
					<input id="biblioteca" name="biblioteca" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
					@if(old('biblioteca', isset($FichaTecnica) && $FichaTecnica->biblioteca === 1)) checked @endif switch="none">
					@if ($errors->has('biblioteca'))
					<div class="invalid-feedback">{{ $errors->first('biblioteca') }}</div>
					@endif
				</div>

				<div class="col-md-2">
					<label class="form-label" for="circuito_cerrado" data-on-label="Si" data-off-label="No">Circuito Cerrado</label><br>
					<input id="circuito_cerrado" name="circuito_cerrado" type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger"
					@if(old('circuito_cerrado', isset($FichaTecnica) && $FichaTecnica->circuito_cerrado === 1)) checked @endif switch="none">
					@if ($errors->has('circuito_cerrado'))
					<div class="invalid-feedback">{{ $errors->first('circuito_cerrado') }}</div>
					@endif
				</div>
			</div>
			@php
			$imagenes = old('imagenes', session('imagenes', []));
			@endphp
			<!-- Campo para cargar múltiples imágenes -->
			<div class="row">
				<div class="col-md-12">
					<label for="imagenes" class="form-label">Cargar Imágenes</label><br>
					<input type="file" name="imagenes[]" id="imagenes" accept="image/*" class="form-control {{ $errors->has('imagenes') ? 'is-invalid' : '' }}" multiple onchange="previewImages(event)">
					@if ($errors->has('imagenes'))
					<div class="invalid-feedback">{{ $errors->first('imagenes') }}</div>
					@endif
				</div>
			</div>

			<!-- Contenedor para previsualización de imágenes -->
			<div class="row mt-3" id="preview">
				@if (!empty($imagenes))
				@foreach ($imagenes as $imagen)
				<div class="col-md-3 image-container">
					<img src="{{ $imagen }}" class="img-fluid img-thumbnail" alt="Previsualización" onclick="openModal(this)">
					<button type="button" class="remove-button" onclick="removeImage(this)">Eliminar</button>
				</div>
				@endforeach
				@endif
			</div>

		</section>

		<button type="submit" id="botonGuardar" class="btn btn-success waves-effect waves-light">Guardar</button>
		<button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">Cerrar</button>

	</form>


	<!-- Modal para mostrar la imagen en tamaño grande -->
	<div id="imageModal" class="modal">
		<span class="close" onclick="closeModal()">&times;</span>
		<img class="modal-content" id="modalImage">
	</div>

	<!-- Estilos para el modal -->
	<style>
		.modal {
			display: none; /* Ocultar por defecto */
			position: fixed; /* Fijo en pantalla */
			z-index: 1; /* Sobre todo el contenido */
			padding-top: 10%; /* Espacio en la parte superior */
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			overflow: auto; /* Scroll si es necesario */
			background-color: rgb(0,0,0); /* Color de fondo */
			background-color: rgba(0,0,0,0.9); /* Fondo con opacidad */
		}

		.modal-content {
			margin: auto;
			display: block;
			width: 80%;
			max-width: 700px;
		}

		.close {
			position: absolute;
			top: 15px;
			right: 35px;
			color: #fff;
			font-size: 40px;
			font-weight: bold;
			transition: 0.3s;
		}

		.close:hover,
		.close:focus {
			color: #bbb;
			text-decoration: none;
			cursor: pointer;
		}
	</style>

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
    				colDiv.className = 'col-md-3 image-container';
    				colDiv.innerHTML = '<img src="' + e.target.result + '" class="img-fluid img-thumbnail" alt="Previsualización" onclick="openModal(this)">' +
    				'<button type="button" class="remove-button" onclick="removeImage(this)">Eliminar</button>';
    				previewContainer.appendChild(colDiv);
    			};
    		})(file);

    		reader.readAsDataURL(file);
    	}
    }
}

function removeImage(button) {
	var imageContainer = button.parentElement;
	imageContainer.remove();
}

function openModal(imgElement) {
	var modal = document.getElementById('imageModal');
	var modalImage = document.getElementById('modalImage');
	modal.style.display = 'block';
	modalImage.src = imgElement.src;
}

function closeModal() {
	var modal = document.getElementById('imageModal');
	modal.style.display = 'none';
}

// Cerrar el modal cuando el usuario hace clic fuera de la imagen
window.onclick = function(event) {
	var modal = document.getElementById('imageModal');
	if (event.target == modal) {
		modal.style.display = 'none';
	}
}

</script>