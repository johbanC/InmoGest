<section>	

	<div class="row">

		<x-adminlte-input  name="nombre" label="Nombre" placeholder="Nombre" fgroup-class="col-md-4"
		type="text" class="{{ $errors->has('nombre') ? 'is-invalid' : '' }}" value="{{ old('nombre', isset($TipoInmueble) ? $TipoInmueble->nombre : '') }}" id="input-nombre" autofocus />
		@if ($errors->has('nombre'))
		<div class="invalid-feedback">{{ $errors->first('nombre') }}</div>
		@endif

	</div>

</section>





