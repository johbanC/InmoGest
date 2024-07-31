<style type="text/css">
	.row{
		padding-bottom: 15px;
	}

	/*.row>* {
    width: auto !important;
}*/
</style>

















<!-- 




<div id="inventario">
	
</div>





<script>
	$(document).ready(function() {
		let contador = 1;

		$('#agregarTabla').click(function() {
			var tablaHTML = `
			<div class="habitacion">
			<button type="button" class="toggleTabla">Mostrar/Ocultar Habitación ${contador}</button>
			<button type="button" class="borrarTabla">Borrar Habitación ${contador}</button>
			<table class="tablaHabitacion" style="display: none;">
			<tr>
			<td>Nombre de la Habitación: <input type="text" name="nombreHabitacion[]"></td>
			</tr>
			<tr>
			<td>Área: <input type="text" name="area[]"></td>
			</tr>
			<tr>
			<td>Descripción: <textarea name="descripcion[]"></textarea></td>
			</tr>
			</table>
			</div>
			`;
			$('#inventario').append(tablaHTML);
			contador++;
		});

		$(document).on('click', '.toggleTabla', function() {
			$(this).nextAll('.tablaHabitacion').first().toggle();
		});

		$(document).on('click', '.borrarTabla', function() {
			$(this).parent().remove();
		});
	});
</script>








<p class="d-inline-flex gap-1">
	

	<button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Toggle second element</button>

	<button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Toggle both elements</button>
</p>





<div class="row">
	<div class="col-md-12">
		<div class="collapse multi-collapse" id="sala">
			<div class="card card-body">
				<form id="formularioFichaTecnica" method="POST" action="{{ route('fichastecnicas.store') }}" class="row g-3 needs-validation" novalidate>
					<section>
						@csrf
						<div class="row">
							<div class="col-md-2">
								<label for="input-fecha" class="form-label">Fecha</label><br>
								<input type="text" name="fecha" class="form-control {{ $errors->has('fecha') ? 'is-invalid' : '' }}" id="input-fecha" placeholder="Fecha" value="{{ old('fecha') }}" required autofocus>
								@if ($errors->has('fecha'))
								<div class="invalid-feedback">{{ $errors->first('fecha') }}</div>
								@endif
							</div>						
							
						</div>


						

						<hr style="border: 0.5px solid; opacity: 10%;">

					</section>

				</form>
			</div>
		</div>
	</div>
</div>




-->












<div class="row">
	<div class="col-md-12">
		<div class="collapse multi-collapse" id="multiCollapseExample1">
			<div class="card card-body">
				<form id="formularioFichaTecnica" method="POST" action="{{ route('fichastecnicas.store') }}" class="row g-3 needs-validation" novalidate>
					<section>
						@csrf
						<div class="row">
							<div class="col-md-2">
								<label for="input-fecha" class="form-label">Fecha</label><br>
								<input type="text" name="fecha" class="form-control {{ $errors->has('fecha') ? 'is-invalid' : '' }}" id="input-fecha" placeholder="Fecha" value="{{ date('d - m - Y') }}" required autofocus disabled>
								@if ($errors->has('fecha'))
								<div class="invalid-feedback">{{ $errors->first('fecha') }}</div>
								@endif
							</div>						

							<div class="col-md-4">
								<label for="input-tipo-inmueble" class="form-label">Tipo de Inmueble</label><br>
								<input type="text" name="tipo_inmueble" class="form-control {{ $errors->has('tipo_inmueble') ? 'is-invalid' : '' }}" id="input-tipo-inmueble" placeholder="Tipo de Inmueble" value="{{ old('tipo_inmueble') }}">
								@if ($errors->has('tipo_inmueble'))
								<div class="invalid-feedback">{{ $errors->first('tipo_inmueble') }}</div>
								@endif
							</div>

							<div class="col-md-6">
								<label for="input-direccion" class="form-label">Dirección</label><br>
								<input type="text" name="direccion" class="form-control {{ $errors->has('direccion') ? 'is-invalid' : '' }}" id="input-direccion" placeholder="Dirección" value="{{ old('direccion') }}">
								@if ($errors->has('direccion'))
								<div class="invalid-feedback">{{ $errors->first('direccion') }}</div>
								@endif
							</div>

							<div class="col-md-4">
								<label for="input-arrendador" class="form-label">Arrendador</label><br>
								<input type="text" name="arrendador" class="form-control {{ $errors->has('arrendador') ? 'is-invalid' : '' }}" id="input-arrendador" placeholder="Arrendador" value="{{ old('arrendador') }}">
								@if ($errors->has('arrendador'))
								<div class="invalid-feedback">{{ $errors->first('arrendador') }}</div>
								@endif
							</div>

							<div class="col-md-4">
								<label for="input-inquilino" class="form-label">Inquilino</label><br>
								<input type="text" name="inquilino" class="form-control {{ $errors->has('inquilino') ? 'is-invalid' : '' }}" id="input-inquilino" placeholder="Inquilino" value="{{ old('inquilino') }}">
								@if ($errors->has('inquilino'))
								<div class="invalid-feedback">{{ $errors->first('inquilino') }}</div>
								@endif
							</div>

							<div class="col-md-4">
								<label for="input-propietario" class="form-label">Propietario</label><br>
								<input type="text" name="propietario" class="form-control {{ $errors->has('propietario') ? 'is-invalid' : '' }}" id="input-propietario" placeholder="Propietario" value="{{ old('propietario') }}">
								@if ($errors->has('propietario'))
								<div class="invalid-feedback">{{ $errors->first('propietario') }}</div>
								@endif
							</div>

							<div class="col-md-4">
								<label for="input-numero-llaves" class="form-label">Número de Llaves</label><br>
								<input type="number" name="numero_llaves" class="form-control {{ $errors->has('numero_llaves') ? 'is-invalid' : '' }}" id="input-numero-llaves" placeholder="Número de Llaves" value="{{ old('numero_llaves') }}">
								@if ($errors->has('numero_llaves'))
								<div class="invalid-feedback">{{ $errors->first('numero_llaves') }}</div>
								@endif
							</div>
						</div>


						

						<hr style="border: 0.5px solid; opacity: 10%;">

					</section>

					<button type="submit" id="botonGuardar" class="btn btn-success waves-effect waves-light">Guardar</button>
					<button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">Cerrar</button>

				</form>
			</div>
		</div>
	</div>



	<div class="col">
		<div class="collapse multi-collapse" id="multiCollapseExample2">
			<div class="card card-body">
				Some placeholder content for the second collapse component of this multi-collapse example. This panel is hidden by default but revealed when the user activates the relevant trigger.
			</div>
		</div>
	</div>


</div>

 