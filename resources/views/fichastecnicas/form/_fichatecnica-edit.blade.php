

<section>

	

	<div class="row">

		<x-adminlte-input name="cedula" label="Cedula" placeholder="Cedula" fgroup-class="col-md-4"
		type="text" class="{{ $errors->has('cedula') ? 'is-invalid' : '' }}" value="{{ old('cedula', isset($FichaTecnica) ? $FichaTecnica->cedula : '') }}" id="input-cedula" autofocus/>
		@if ($errors->has('cedula'))
		<div class="invalid-feedback">{{ $errors->first('cedula') }}</div>
		@endif


		<x-adminlte-input name="nom_propietario" label="Nombre del Propietario" placeholder="Nombre del Propietario" fgroup-class="col-md-4"
		class="{{ $errors->has('nom_propietario') ? 'is-invalid' : '' }}" value="{{ old('nom_propietario', isset($FichaTecnica) ? $FichaTecnica->nom_propietario : '') }}" />
		@if ($errors->has('nom_propietario'))
		<div class="invalid-feedback">{{ $errors->first('nom_propietario') }}</div>
		@endif

		<x-adminlte-input name="telefono" label="Telefono" placeholder="Telefono" fgroup-class="col-md-4"
		class="{{ $errors->has('telefono') ? 'is-invalid' : '' }}" 
		value="{{ old('telefono', isset($FichaTecnica) ? $FichaTecnica->telefono: '') }}" 
		id="input-telefono"
		/>
		@if ($errors->has('telefono'))
		<div class="invalid-feedback">{{ $errors->first('telefono') }}</div>
		@endif



		<x-adminlte-input name="nom_propiedad" label="Nombre Propiedad" placeholder="Ej: Remanso914" fgroup-class="col-md-4"
		class="{{ $errors->has('nom_propiedad') ? 'is-invalid' : '' }}" value="{{ old('nom_propiedad',isset($FichaTecnica) ? $FichaTecnica->nom_propiedad: '') }}" />
		@if ($errors->has('nom_propiedad'))
		<div class="invalid-feedback">{{ $errors->first('nom_propiedad') }}</div>
		@endif

		<x-adminlte-input name="barrio" label="Barrio" placeholder="Barrio" fgroup-class="col-md-4"
		class="{{ $errors->has('barrio') ? 'is-invalid' : '' }}" value="{{ old('barrio', isset($FichaTecnica) ? $FichaTecnica->barrio: '') }}" />
		@if ($errors->has('barrio'))
		<div class="invalid-feedback">{{ $errors->first('barrio') }}</div>
		@endif

		<x-adminlte-input name="direccion" label="Direccion" placeholder="Direccion" fgroup-class="col-md-4"
		class="{{ $errors->has('direccion') ? 'is-invalid' : '' }}" value="{{ old('direccion', isset($FichaTecnica) ? $FichaTecnica->direccion:'') }}" />
		@if ($errors->has('direccion'))
		<div class="invalid-feedback">{{ $errors->first('direccion') }}</div>
		@endif



		<x-adminlte-input name="valor" label="Valor" placeholder="Valor" fgroup-class="col-md-6"
		class="{{ $errors->has('valor') ? 'is-invalid' : '' }}" 
		value="{{ old('valor', isset($FichaTecnica) ? ($FichaTecnica->valor) : '') }}"
		id="input-valor" />
		@if ($errors->has('valor'))
		<div class="invalid-feedback">{{ $errors->first('valor') }}</div>
		@endif



		<x-adminlte-input name="administracion" label="Administracion" placeholder="Administracion" fgroup-class="col-md-6"
		class="{{ $errors->has('administracion') ? 'is-invalid' : '' }}" 
		value="{{ old('administracion', isset($FichaTecnica) ? ($FichaTecnica->administracion) : '') }}"
		id="input-administracion" />
		@if ($errors->has('administracion'))
		<div class="invalid-feedback">{{ $errors->first('administracion') }}</div>
		@endif


		<x-adminlte-select name="tipo_inmuebles_id" label="Tipo de Inmueble" fgroup-class="col-md-6"
		class="{{ $errors->has('tipo_inmuebles_id') ? 'is-invalid' : '' }}" 
		value="{{ old('tipo_inmuebles_id') }}">
		<option value="">Seleccione una opción...</option>
		@foreach ($tipoinmuebles as $id => $nombre)
		<option value="{{ $id }}" {{ $FichaTecnica->tipo_inmuebles_id == $id ? 'selected' : '' }}>
			{{ $nombre }}
		</option>
		@endforeach
	</x-adminlte-select>
	@if ($errors->has('tipo_inmuebles_id'))
	<div class="invalid-feedback">{{ $errors->first('tipo_inmuebles_id') }}</div>
	@endif






	<x-adminlte-select name="tipo_transaccions_id" label="Tipo de Transacción" fgroup-class="col-md-6"
	class="{{ $errors->has('tipo_transaccions_id') ? 'is-invalid' : '' }}">
	<option value="">Seleccione una opción...</option>
	@foreach ($transacciones as $id => $nombre)
	<option value="{{ $id }}" {{ $FichaTecnica->tipo_transaccions_id == $id ? 'selected' : '' }}>
		{{ $nombre }}
	</option>
	@endforeach
</x-adminlte-select>

@if ($errors->has('tipo_transaccions_id'))
<div class="invalid-feedback">{{ $errors->first('tipo_transaccions_id') }}</div>
@endif






</div>


<div class="row">
	<x-adminlte-input name="alcobas" label="Alcobas" placeholder="Alcobas" fgroup-class="col-md-3"
	type="number" class="{{ $errors->has('alcobas') ? 'is-invalid' : '' }}" value="{{ old('alcobas', isset($FichaTecnica) ? $FichaTecnica->alcobas : '') }}" />
	@if ($errors->has('alcobas'))
	<div class="invalid-feedback">{{ $errors->first('alcobas') }}</div>
	@endif

	<x-adminlte-input name="closet" label="Closet" placeholder="Closet" fgroup-class="col-md-2"
	type="number" class="{{ $errors->has('closet') ? 'is-invalid' : '' }}" value="{{ old('closet', isset($FichaTecnica) ? $FichaTecnica->closet : '') }}" />
	@if ($errors->has('closet'))
	<div class="invalid-feedback">{{ $errors->first('closet') }}</div>
	@endif

	<x-adminlte-input name="baño" label="Baño" placeholder="Baño" fgroup-class="col-md-2"
	type="number" class="{{ $errors->has('baño') ? 'is-invalid' : '' }}" value="{{ old('baño', isset($FichaTecnica) ? $FichaTecnica->baño : '') }}" />
	@if ($errors->has('baño'))
	<div class="invalid-feedback">{{ $errors->first('baño') }}</div>
	@endif

	<x-adminlte-input name="estrato" label="Estrato" placeholder="Estrato" fgroup-class="col-md-2"
	type="number" class="{{ $errors->has('estrato') ? 'is-invalid' : '' }}" value="{{ old('estrato', isset($FichaTecnica) ? $FichaTecnica->estrato : '') }}" />
	@if ($errors->has('estrato'))
	<div class="invalid-feedback">{{ $errors->first('estrato') }}</div>
	@endif

	<x-adminlte-input name="area" label="Area m2" placeholder="Area" fgroup-class="col-md-3"
	type="number" class="{{ $errors->has('area') ? 'is-invalid' : '' }}" value="{{ old('area', isset($FichaTecnica) ? $FichaTecnica->area : '') }}" />
	@if ($errors->has('area'))
	<div class="invalid-feedback">{{ $errors->first('area') }}</div>
	@endif
</div>



<div class="row">

	<x-adminlte-input name="piso" label="Piso" placeholder="Piso" fgroup-class="col-md-6"
	class="{{ $errors->has('piso') ? 'is-invalid' : '' }}" value="{{ old('piso', isset($FichaTecnica) ? $FichaTecnica->piso : '') }}" />
	@if ($errors->has('piso'))
	<div class="invalid-feedback">{{ $errors->first('piso') }}</div>
	@endif

	<x-adminlte-select name="calentadors_id" label="Calentador" fgroup-class="col-md-6"
	class="{{ $errors->has('calentador') ? 'is-invalid' : '' }}" value="{{ old('calentadors_id') }}">
	<option value="">Seleccione una opción...</option>
	@foreach ($calentador as $id => $nombre)
	<option value="{{ $id }}" {{ $FichaTecnica->calentadors_id == $id ? 'selected' : '' }}>
		{{ $nombre }}
	</option>
	@endforeach
</x-adminlte-select>
@if ($errors->has('calentador'))
<div class="invalid-feedback">{{ $errors->first('calentador') }}</div>
@endif

</div>

<div class="row">
	
	<div class="col-md-6">
		<label for="tipo_cocinas_id">Tipo de Porteria <a href="{{ route('tipoporterias.new') }}" target="_black"><i class="fas fa-plus-square text-success" title="Agregar nuevo"></i></a></label>
		<x-adminlte-select name="tipo_porterias_id"
		class="{{ $errors->has('tipo_porterias_id') ? 'is-invalid' : '' }}" value="{{ old('calentadors_id') }}">
		<option value="">Seleccione una opción...</option>
		@foreach ($tipoporterias as $id => $nombre)
		<option value="{{ $id }}" {{ $FichaTecnica->tipo_porterias_id == $id ? 'selected' : '' }}>
			{{ $nombre }}
		</option>
		@endforeach
	</x-adminlte-select>
	@if ($errors->has('tipoporterias'))
	<div class="invalid-feedback">{{ $errors->first('tipoporterias') }}</div>
	@endif
</div>


<div class="col-md-6">
	<label for="tipo_cocinas_id">Tipo de Cocina <a href="{{ route('tipococinas.new') }}" target="_black"><i class="fas fa-plus-square text-success" title="Agregar nuevo"></i></a></label>
	<x-adminlte-select name="tipo_cocinas_id" id="tipo_cocinas_id" 
	class="{{ $errors->has('tipo_cocinas_id') ? 'is-invalid' : '' }}" 
	value="{{ old('tipo_cocinas_id') }}">
	<option value="">Seleccione una opción...</option>
	@foreach ($tipococinas as $id => $nombre)
	<option value="{{ $id }}" {{ $FichaTecnica->tipo_cocinas_id == $id ? 'selected' : '' }}>
		{{ $nombre }}
	</option>
	@endforeach
</x-adminlte-select>
@if ($errors->has('tipo_cocinas_id'))
<div class="invalid-feedback">{{ $errors->first('tipo_cocinas_id') }}</div>
@endif
</div>

</div>


<hr style="border: 0.5px solid; opacity: 10%;">

<div class="row">

	<x-adminlte-input-switch 
	name="vestier" 
	label="Vestier" 
	data-on-text="Si" 
	data-off-text="No" 
	data-on-color="teal" 
	fgroup-class="col-md-2"
	:checked="isset($FichaTecnica) ? $FichaTecnica->vestier === 1 : false" 
	class="{{ $errors->has('vestier') ? 'is-invalid' : '' }}"
	/>
	@if ($errors->has('vestier'))
	<div class="invalid-feedback">{{ $errors->first('vestier') }}</div>
	@endif

	<x-adminlte-input-switch 
	name="balcon" 
	label="Balcón" 
	data-on-text="Si" 
	data-off-text="No" 
	data-on-color="teal" 
	fgroup-class="col-md-2"
	:checked="isset($FichaTecnica) ? $FichaTecnica->balcon === 1 : false" 
	class="{{ $errors->has('balcon') ? 'is-invalid' : '' }}"
	/>
	@if ($errors->has('balcon'))
	<div class="invalid-feedback">{{ $errors->first('balcon') }}</div>
	@endif

	<x-adminlte-input-switch 
	name="sala_comedor" 
	label="Sala Comedor" 
	data-on-text="Si" 
	data-off-text="No" 
	data-on-color="teal" 
	fgroup-class="col-md-2"
	:checked="isset($FichaTecnica) ? $FichaTecnica->sala_comedor === 1 : false" 
	class="{{ $errors->has('sala_comedor') ? 'is-invalid' : '' }}"
	/>
	@if ($errors->has('sala_comedor'))
	<div class="invalid-feedback">{{ $errors->first('sala_comedor') }}</div>
	@endif

	<x-adminlte-input-switch 
	name="patio" 
	label="Patio" 
	data-on-text="Si" 
	data-off-text="No" 
	data-on-color="teal" 
	fgroup-class="col-md-2"
	:checked="isset($FichaTecnica) ? $FichaTecnica->patio === 1 : false" 
	class="{{ $errors->has('patio') ? 'is-invalid' : '' }}"
	/>
	@if ($errors->has('patio'))
	<div class="invalid-feedback">{{ $errors->first('patio') }}</div>
	@endif

	<x-adminlte-input-switch 
	name="zona_ropa" 
	label="Zona de ropa" 
	data-on-text="Si" 
	data-off-text="No" 
	data-on-color="teal" 
	fgroup-class="col-md-2"
	:checked="isset($FichaTecnica) ? $FichaTecnica->zona_ropa === 1 : false" 
	class="{{ $errors->has('zona_ropa') ? 'is-invalid' : '' }}"
	/>
	@if ($errors->has('zona_ropa'))
	<div class="invalid-feedback">{{ $errors->first('zona_ropa') }}</div>
	@endif

</div>



<hr style="border: 0.5px solid; opacity: 10%;">

<div class="row">
	<x-adminlte-input-switch name="estudio_estar" label="Estudio / Estar" data-on-text="Si" data-off-text="No" data-on-color="teal" fgroup-class="col-md-2"
	:checked="isset($FichaTecnica) ? $FichaTecnica->estudio_estar === 1 : false" 
	class="{{ $errors->has('estudio_estar') ? 'is-invalid' : '' }}"/>
	@if ($errors->has('estudio_estar'))
	<div class="invalid-feedback">{{ $errors->first('estudio_estar') }}</div>
	@endif

	<x-adminlte-input-switch name="red_gas" label="Red de gas" data-on-text="Si" data-off-text="No" data-on-color="teal" fgroup-class="col-md-2"
	:checked="isset($FichaTecnica) ? $FichaTecnica->red_gas === 1 : false" 
	class="{{ $errors->has('red_gas') ? 'is-invalid' : '' }}"/>
	@if ($errors->has('red_gas'))
	<div class="invalid-feedback">{{ $errors->first('red_gas') }}</div>
	@endif

	<x-adminlte-input-switch name="cuarto_util" label="Cuarto Util" data-on-text="Si" data-off-text="No" data-on-color="teal" fgroup-class="col-md-2"
	:checked="isset($FichaTecnica) ? $FichaTecnica->cuarto_util === 1 : false" 
	class="{{ $errors->has('cuarto_util') ? 'is-invalid' : '' }}"/>
	@if ($errors->has('cuarto_util'))
	<div class="invalid-feedback">{{ $errors->first('cuarto_util') }}</div>
	@endif

	<x-adminlte-input-switch name="ascensor" label="Ascensor" data-on-text="Si" data-off-text="No" data-on-color="teal" fgroup-class="col-md-2"
	:checked="isset($FichaTecnica) ? $FichaTecnica->ascensor === 1 : false" 
	class="{{ $errors->has('ascensor') ? 'is-invalid' : '' }}"/>
	@if ($errors->has('ascensor'))
	<div class="invalid-feedback">{{ $errors->first('ascensor') }}</div>
	@endif

	<x-adminlte-input-switch name="parqueadero" label="Parqueadero" data-on-text="Si" data-off-text="No" data-on-color="teal" fgroup-class="col-md-2"
	:checked="isset($FichaTecnica) ? $FichaTecnica->parqueadero === 1 : false" 
	class="{{ $errors->has('parqueadero') ? 'is-invalid' : '' }}"/>
	@if ($errors->has('parqueadero'))
	<div class="invalid-feedback">{{ $errors->first('parqueadero') }}</div>
	@endif

	<x-adminlte-input-switch name="parqueadero_visitantes" label="Parqueadero Visitantes" data-on-text="Si" data-off-text="No" data-on-color="teal" fgroup-class="col-md-2"
	:checked="isset($FichaTecnica) ? $FichaTecnica->parqueadero_visitantes === 1 : false" 
	class="{{ $errors->has('parqueadero_visitantes') ? 'is-invalid' : '' }}"/>
	@if ($errors->has('parqueadero_visitantes'))
	<div class="invalid-feedback">{{ $errors->first('parqueadero_visitantes') }}</div>
	@endif
</div>

<hr style="border: 0.5px solid; opacity: 10%;">

<div class="row">
	
	<x-adminlte-input-switch name="juegos_infantiles" label="Juegos Infantiles" data-on-text="Si" data-off-text="No" data-on-color="teal" fgroup-class="col-md-2"
	:checked="isset($FichaTecnica) ? $FichaTecnica->juegos_infantiles === 1 : false" 
	class="{{ $errors->has('juegos_infantiles') ? 'is-invalid' : '' }}"/>
	@if ($errors->has('juegos_infantiles'))
	<div class="invalid-feedback">{{ $errors->first('juegos_infantiles') }}</div>
	@endif

	<x-adminlte-input-switch name="salon_social" label="Salon Social" data-on-text="Si" data-off-text="No" data-on-color="teal" fgroup-class="col-md-2"
	:checked="isset($FichaTecnica) ? $FichaTecnica->salon_social === 1 : false" 
	class="{{ $errors->has('salon_social') ? 'is-invalid' : '' }}"/>
	@if ($errors->has('salon_social'))
	<div class="invalid-feedback">{{ $errors->first('salon_social') }}</div>
	@endif

	


	<x-adminlte-input-switch name="propiedad_horizontal" label="Propiedad Horizontal" data-on-text="Si" data-off-text="No" data-on-color="teal" fgroup-class="col-md-2"
	:checked="isset($FichaTecnica) ? $FichaTecnica->propiedad_horizontal === 1 : false" 
	class="{{ $errors->has('propiedad_horizontal') ? 'is-invalid' : '' }}"/>
	@if ($errors->has('propiedad_horizontal'))
	<div class="invalid-feedback">{{ $errors->first('propiedad_horizontal') }}</div>
	@endif

	<x-adminlte-input-switch name="citofono" label="Citofono" data-on-text="Si" data-off-text="No" data-on-color="teal" fgroup-class="col-md-2"
	:checked="isset($FichaTecnica) ? $FichaTecnica->citofono === 1 : false" 
	class="{{ $errors->has('citofono') ? 'is-invalid' : '' }}"/>
	@if ($errors->has('citofono'))
	<div class="invalid-feedback">{{ $errors->first('citofono') }}</div>
	@endif

	<x-adminlte-input-switch name="unidad" label="Unidad" data-on-text="Si" data-off-text="No" data-on-color="teal" fgroup-class="col-md-2"
	:checked="isset($FichaTecnica) ? $FichaTecnica->unidad === 1 : false" 
	class="{{ $errors->has('unidad') ? 'is-invalid' : '' }}"/>
	@if ($errors->has('unidad'))
	<div class="invalid-feedback">{{ $errors->first('unidad') }}</div>
	@endif

</div>

<hr style="border: 0.5px solid; opacity: 10%;">

<div class="row">

	<x-adminlte-input-switch name="shut_basura" label="Shut Basura" data-on-text="Si" data-off-text="No" data-on-color="teal" fgroup-class="col-md-2"
	:checked="isset($FichaTecnica) ? $FichaTecnica->shut_basura === 1 : false" 
	class="{{ $errors->has('shut_basura') ? 'is-invalid' : '' }}"/>
	@if ($errors->has('shut_basura'))
	<div class="invalid-feedback">{{ $errors->first('shut_basura') }}</div>
	@endif

	<x-adminlte-input-switch name="jacuzzi" label="Jacuzzi" data-on-text="Si" data-off-text="No" data-on-color="teal" fgroup-class="col-md-2"
	:checked="isset($FichaTecnica) ? $FichaTecnica->jacuzzi === 1 : false" 
	class="{{ $errors->has('jacuzzi') ? 'is-invalid' : '' }}"/>
	@if ($errors->has('jacuzzi'))
	<div class="invalid-feedback">{{ $errors->first('jacuzzi') }}</div>
	@endif

	<x-adminlte-input-switch name="gimnasio" label="Gimnasio" data-on-text="Si" data-off-text="No" data-on-color="teal" fgroup-class="col-md-2"
	:checked="isset($FichaTecnica) ? $FichaTecnica->gimnasio === 1 : false" 
	class="{{ $errors->has('gimnasio') ? 'is-invalid' : '' }}"/>
	@if ($errors->has('gimnasio'))
	<div class="invalid-feedback">{{ $errors->first('gimnasio') }}</div>
	@endif

	<x-adminlte-input-switch name="turco" label="Turco" data-on-text="Si" data-off-text="No" data-on-color="teal" fgroup-class="col-md-2"
	:checked="isset($FichaTecnica) ? $FichaTecnica->turco === 1 : false" 
	class="{{ $errors->has('turco') ? 'is-invalid' : '' }}"/>
	@if ($errors->has('turco'))
	<div class="invalid-feedback">{{ $errors->first('turco') }}</div>
	@endif

	<x-adminlte-input-switch name="biblioteca" label="Biblioteca" data-on-text="Si" data-off-text="No" data-on-color="teal" fgroup-class="col-md-2"
	:checked="isset($FichaTecnica) ? $FichaTecnica->biblioteca === 1 : false" 
	class="{{ $errors->has('biblioteca') ? 'is-invalid' : '' }}"/>
	@if ($errors->has('biblioteca'))
	<div class="invalid-feedback">{{ $errors->first('biblioteca') }}</div>
	@endif

	<x-adminlte-input-switch name="circuito_cerrado" label="Circuito Cerrado" data-on-text="Si" data-off-text="No" data-on-color="teal" fgroup-class="col-md-2"
	:checked="isset($FichaTecnica) ? $FichaTecnica->circuito_cerrado === 1 : false" 
	class="{{ $errors->has('circuito_cerrado') ? 'is-invalid' : '' }}"/>
	@if ($errors->has('circuito_cerrado'))
	<div class="invalid-feedback">{{ $errors->first('circuito_cerrado') }}</div>
	@endif
</div>




</section>


<div style="text-align: center;">

	<x-adminlte-button class="btn-flat" type="submit" label="Actualizar" theme="success" icon="fas fa-lg fa-update" style="width: 20%; border-radius: 10px;" />

	<x-adminlte-button class="btn-flat" label="Cancelar" theme="danger" icon="fas fa-lg fa-arrow-left" onclick="window.history.back()"  style="width: 20%; border-radius: 10px;" />
</div>


